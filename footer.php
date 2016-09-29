<?php 
	wp_reset_query();
	if (get_field('hide_footer_blocks') !== true) {
		get_template_blocks(get_field('footer_template_block', 'option'));
	}
?>
</div><!-- main content end -->



<footer class="footer">
  <div class="container">
    
<ul class="upper-footer-nav"><li>
  <a href="<?php echo site_url() ?>/about-us" class=""><span>About Us</span></a>
  <ul><li>
  <a href="<?php echo site_url() ?>/about-us/meet-the-team" class=""><span>Meet The Team</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/about-us/global-reach" class=""><span>Global Reach</span></a>
  
</li><li>
  <a href="https://wwctrialscareers.silkroad.com/" class=""><span>Careers</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/about-us/in-the-news" class=""><span>In The News</span></a>
  
</li></ul>
</li><li>
  <a href="<?php echo site_url() ?>/therapeutic-areas" class=""><span>Therapeutic Areas</span></a>
  <ul><li>
  <a href="<?php echo site_url() ?>/therapeutic-areas/neuroscience" class=""><span>Neuroscience</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/therapeutic-areas/cardiovascular" class=""><span>Cardiovascular</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/therapeutic-areas/inflammation" class=""><span>Inflammation</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/therapeutic-areas/rare-disease" class=""><span>Rare Disease</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/therapeutic-areas/other-therapeutic-expertise" class=""><span>Other Therapeutic Expertise</span></a>
  
</li></ul>
</li><li>
  <a href="<?php echo site_url() ?>/solutions" class=""><span>Solutions</span></a>
  <ul><li>
  <a href="<?php echo site_url() ?>/solutions/bioanalytical-sciences" class=""><span>Bioanalytical Sciences</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/solutions/phase-i-iia-clinical-trials" class=""><span>Phase I-IIA Clinical Trials</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/solutions/phase-iib-iiib-clinical-trials" class=""><span>Phase IIB-IIIB Clinical Trials</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/solutions/phase-iv-clinical-trials" class=""><span>Phase IV Clinical Trials</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/solutions/rater-services" class=""><span>Rater Services</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/solutions/technology" class=""><span>Technology</span></a>
  
</li></ul>
</li><li>
  <a href="<?php echo site_url() ?>/resources/resource-library/" class=""><span>Resources</span></a>
  <ul><li>
  <a href="<?php echo site_url() ?>/resources/resource-library" class=""><span>Resource Library</span></a>
  
</li><li>
  <a href="<?php echo site_url() ?>/resources/assay-methods-search" class=""><span>Assay Methods Search</span></a>
  
</li></ul>
</li><li>
  <a href="javascript:void(0);" class="hidden"><span>Connect</span></a>
  <ul><li>
  <a href="https://www.facebook.com/worldwideclinicaltrials" class="fa fa-facebook"><span>Facebook</span></a>
  
</li><li>
  <a href="https://twitter.com/worldwidetrials" class="fa fa-twitter"><span>Twitter</span></a>
  
</li><li>
  <a href="https://www.linkedin.com/company/worldwide-clinical-trials-inc-?trk=top_nav_home" class="fa fa-linkedin"><span>LinkedIn</span></a>
  
</li></ul>
</li></ul>

			<ul class="lower-footer-nav">
				<li>
					<span>&copy; Worldwide Clinical Trials 2016</span>
				</li>
				<li>
					<a href="<?php echo site_url('privacy-statement-terms-of-use') ?>" >Privacy Statement & Terms of Use</a>
				</li><li>
					<a href="<?php echo site_url('ethics-compliance') ?>" >Ethics & Compliance</a>
				</li><li>
					<a href="<?php echo site_url('sitemap') ?>">Sitemap</a>
				</li>
			</ul>

		</div>
	</footer>

<?php wp_footer() ?>

<script type="text/javascript">var BASE = "<?php echo home_url() ?>";</script>

</body>
</html>