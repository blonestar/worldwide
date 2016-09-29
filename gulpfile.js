/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors Ahmad Awais, @digisavvy, @desaiuditd, @jb510, @dmassiani and @Maxlopez
 * @package neat
 * @forks _s & some-like-it-neat
 */


 var url = 'http://worldwide.dev';

// Load plugins
	var gulp     = require('gulp'),
		browserSync  = require('browser-sync'), // Asynchronous browser loading on .scss file changes
		reload       = browserSync.reload,
		autoprefixer = require('gulp-autoprefixer'), // Autoprefixing magic
		minifycss    = require('gulp-uglifycss'),
		filter       = require('gulp-filter'),
		uglify       = require('gulp-uglify'),
		imagemin     = require('gulp-imagemin'),
		newer        = require('gulp-newer'),
		rename       = require('gulp-rename'),
		concat       = require('gulp-concat'),
		notify       = require('gulp-notify'),
		cmq          = require('gulp-combine-media-queries'),
		runSequence  = require('gulp-run-sequence'),
		sass         = require('gulp-sass'),
		plugins      = require('gulp-load-plugins')({ camelize: true }),
		ignore       = require('gulp-ignore'), // Helps with ignoring files and directories in our run tasks
		rimraf       = require('gulp-rimraf'), // Helps with removing files and directories in our run tasks
		zip          = require('gulp-zip'), // Using to zip up our packaged theme into a tasty zip file that can be installed in WordPress!
		plumber      = require('gulp-plumber'), // Helps prevent stream crashing on errors
		cache        = require('gulp-cache'),
		sourcemaps   = require('gulp-sourcemaps');

	var gutil  = require('gulp-util');
	var argv   = require('minimist')(process.argv);
	var gulpif = require('gulp-if');
	var prompt = require('gulp-prompt');
	var rsync  = require('gulp-rsync');
	var combineMq = require('gulp-combine-mq');

/**
 * Browser Sync
 *
 * Asynchronous browser syncing of assets across multiple devices!! Watches for changes to js, image and php files
 * Although, I think this is redundant, since we have a watch task that does this already.
*/
gulp.task('browser-sync', function() {
	var files = [
					'**/*.php',
					'**/*.{png,jpg,gif}'
				];
	browserSync.init(files, {

		// Read here http://www.browsersync.io/docs/options/
		proxy: 'worldwide.dev',

		// port: 8080,

		// Tunnel the Browsersync server through a random Public URL
		// tunnel: true,

		// Attempt to use the URL "http://my-private-site.localtunnel.me"
	//	tunnel: "strides",

		// Inject CSS changes
		injectChanges: true

	});
});



/**
 * Styles
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 *
 * Sass output styles: https://web-design-weekly.com/2014/06/15/different-sass-output-styles/
*/
gulp.task('styles', function () {
 	gulp.src('./scss/*.scss')
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			sourceComments: 'map',
			//sourceMap: 'scss',
			//outputStyle: 'compressed',
			//outputStyle: 'compact',
			//outputStyle: 'nested'
			outputStyle: 'expanded',
			precision: 3
		}))
		.pipe(sourcemaps.write({includeContent: false}))
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(autoprefixer('last 2 version', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(sourcemaps.write('.'))
		.pipe(plumber.stop())
		.pipe(gulp.dest('./css'))
		.pipe(filter('**/*.css')) // Filtering stream to only css files
		//s.pipe(cmq()) // Combines Media Queries
		.pipe(combineMq({ beautify: true })) // Combines Media Queries
		.pipe(reload({stream:true})) // Inject Styles when style file is created
		.pipe(rename({ suffix: '.min' }))
		.pipe(minifycss({
			maxLineLen: 80
		}))
		.pipe(gulp.dest('./css'))
		.pipe(reload({stream:true})) // Inject Styles when min style file is created
		.pipe(notify({ message: 'Styles task complete', onLast: true }))
});






/**
 * Scripts: Custom
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
*/

gulp.task('scriptsJs', function() {
	return 	gulp.src('./js/*.js')
				.pipe('./js/!.min.js')
				.pipe(concat('custom.js'))
				//.pipe(gulp.dest('./js'))
				.pipe(rename( {
					basename: "custom",
					suffix: '.min'
				}))
				.pipe(uglify())
				.pipe(gulp.dest('./js/'))
				.pipe(notify({ message: 'Custom scripts task complete', onLast: true }));
});





/**
 * Clean gulp cache
 */
 gulp.task('clear', function () {
   cache.clearAll();
 });


 /**
  * Clean tasks for zip
  *
  * Being a little overzealous, but we're cleaning out the build folder, codekit-cache directory and annoying DS_Store files and Also
  * clearing out unoptimized image files in zip as those will have been moved and optimized
 */

 gulp.task('cleanup', function() {
 	return 	gulp.src(['./assets/bower_components', '**/.sass-cache','**/.DS_Store'], { read: false }) // much faster
		 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
		 		.pipe(rimraf({ force: true }))
		 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });
 gulp.task('cleanupFinal', function() {
 	return 	gulp.src(['./assets/bower_components','**/.sass-cache','**/.DS_Store'], { read: false }) // much faster
		 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
		 		.pipe(rimraf({ force: true }))
		 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });




 /**
  * Zipping build directory for distribution
  *
  * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
 */
 gulp.task('buildZip', function () {
 	// return 	gulp.src([build+'/**/', './.jshintrc','./.bowerrc','./.gitignore' ])
 	return 	gulp.src(build+'/**/')
		 		.pipe(zip(project+'.zip'))
		 		.pipe(gulp.dest('./'))
		 		.pipe(notify({ message: 'Zip task complete', onLast: true }));
 });


 // ==== TASKS ==== //
 /**
  * Gulp Default Task
  *
  * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
  *
 */

 // Package Distributable Theme
// gulp.task('build', function(cb) {
 //	runSequence('styles', 'cleanup', 'buildZip','cleanupFinal', cb);
 //});


 // Watch Task
 gulp.task('default', ['styles', 'browser-sync'], function () {
 	//gulp.watch('./assets/img/raw/**/*', ['images']); 
 	gulp.watch('./scss/*.scss', ['styles']);
 	gulp.watch('./js/*.js', ['scriptsJs', browserSync.reload]);

 });
 
 

 var ftp          = require('vinyl-ftp');


// ### Vinyl FTP
gulp.task('deploy', function() {
  var conn = ftp.create( {
    host:     '147.75.128.123',
    user:     'bojan@pthdev.com',
    password: 'bokica',
    parallel: 10,
    log:      gutil.log
  });
  var globs = [
    '*',
    '*.php',
    //'dist/**',
    //'lang/**',
   // 'templates/*.php',
    'inc/**',
    'img/**',
    'js/**',
    'template-blocks/**',
    'templates/**',
    'css/*.css',
    'scss/*.scss',
    //'../../uploads/**',
    //'../../plugins/**',
    '!.git',
    '!*.json',
    '!*.md',
    '!*.xml',
    '!assets',
    '!bower_components',
    '!dist/scripts/jquery.js',
    '!dist/scripts/jquery.js.map',
    '!dist/scripts/main.js',
    '!dist/scripts/main.js.map',
    '!dist/scripts/modernizr.js',
    '!dist/scripts/modernizr.js.map',
    '!dist/styles/editor-style.css',
    '!dist/styles/editor-style.css.map',
    '!dist/styles/main.css',
    '!dist/styles/main.css.map',
    '!gulpfile.js',
    '!node_modules',
    '!node_modules/**',
  ];
  // using base = '.' will transfer everything to /public_html correctly
  // turn off buffering in gulp.src for best performance
  return gulp.src( globs, { base: '.', buffer: false } )
    .pipe( conn.newer( '/public_html/worldwide.com/wp-content/themes/worldwide' ) ) // only upload newer files
    .pipe( conn.dest( '/public_html/worldwide.com/wp-content/themes/worldwide' ) );
});

// ### Vinyl FTP
gulp.task('deploy-full', function() {
  var conn = ftp.create( {
    host:     '147.75.128.123',
    user:     'bojan@pthdev.com',
    password: 'bokica',
    parallel: 10,
    log:      gutil.log
  });
  var globs = [
    '*',
    '*.php',
    //'dist/**',
    //'lang/**',
   // 'templates/*.php',
    'inc/**',
    'img/**',
    'js/**',
    'template-blocks/**',
    'templates/**',
    'css/*.css',
    'scss/*.scss',
    '../../uploads/**',
    '../../plugins/**',
    '!.git',
    '!*.json',
    '!*.md',
    '!*.xml',
    '!assets',
    '!bower_components',
    '!dist/scripts/jquery.js',
    '!dist/scripts/jquery.js.map',
    '!dist/scripts/main.js',
    '!dist/scripts/main.js.map',
    '!dist/scripts/modernizr.js',
    '!dist/scripts/modernizr.js.map',
    '!dist/styles/editor-style.css',
    '!dist/styles/editor-style.css.map',
    '!dist/styles/main.css',
    '!dist/styles/main.css.map',
    '!gulpfile.js',
    '!node_modules',
    '!node_modules/**',
  ];
  // using base = '.' will transfer everything to /public_html correctly
  // turn off buffering in gulp.src for best performance
  return gulp.src( globs, { base: '.', buffer: false } )
    .pipe( conn.newer( '/public_html/worldwide.com/wp-content/themes/worldwide' ) ) // only upload newer files
    .pipe( conn.dest( '/public_html/worldwide.com/wp-content/themes/worldwide' ) );
});

// ### Build
// `gulp build` - Run all the build tasks but don't clean up beforehand.
// Generally you should be running `gulp` instead of `gulp build`.
gulp.task('build', function(callback) {
  runSequence('styles',
              'scripts',
			  'buildZip',
              ['fonts', 'images'],
             // 'deploy',
              callback);
});
 
 



function throwError(taskName, msg) {
  throw new gutil.PluginError({
      plugin: taskName,
      message: msg
    });
}
	
	
	