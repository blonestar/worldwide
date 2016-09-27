<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-3 logo-zone-wrapper">
				<a href="<?php echo home_url() ?>" class="logo">
					<?php

						$args = array(
						   'post_type' => 'attachment',
						   'numberposts' => 1,
						   'post_status' => null,
						   'include' => get_field('logo', 'option'),
						   'orderby' => 'menu_order',
						   'order' => 'ASC',
						  );

						$logo_attachment = get_posts( $args );
					?>
					<?php echo wp_get_attachment_image($logo_attachment[0]->ID, array('', ''), false, array('title' => apply_filters('the_title', $logo_attachment[0]->post_title) )) ?>
				</a>


			</div>
			<div class="col-xs-8 col-sm-9 nav-zones-wrapper">
				<div class="nav-icon fa fa-bars"></div>
				<?php
					wp_nav_menu( array(
						'menu' => 'Top Menu',
						'menu_class' => 'top-nav',
						'container' => 'div',
						'container_class' => 'top-nav-zone',
					) );
				?>
				<div class="primary-nav-zone">
					<div class="nav-extras">
						<a href="/request-proposal/" class="btn btn-default btn-sm">
							Request Proposal
						</a>
						<span class="search-toggle fa fa-search"></span>
					</div>
					<div class="header-search">
						<span class="fa fa-times search-close"></span>
						<div id="p_lt_ctl03_SmartSearchBox_pnlSearch" class="searchBox" onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;p_lt_ctl03_SmartSearchBox_btnSearch&#39;)">

							<label for="p_lt_ctl03_SmartSearchBox_txtWord" id="p_lt_ctl03_SmartSearchBox_lblSearch" style="display:none;">Search for:</label>
							<input type="hidden" name="p$lt$ctl03$SmartSearchBox$txtWord_exWatermark_ClientState" id="p_lt_ctl03_SmartSearchBox_txtWord_exWatermark_ClientState" /><input name="p$lt$ctl03$SmartSearchBox$txtWord" type="text" maxlength="1000" id="p_lt_ctl03_SmartSearchBox_txtWord" class="form-control" />
							<input type="submit" name="p$lt$ctl03$SmartSearchBox$btnSearch" value="Search" id="p_lt_ctl03_SmartSearchBox_btnSearch" class="btn btn-default" />

							<div id="p_lt_ctl03_SmartSearchBox_pnlPredictiveResultsHolder" class="predictiveSearchHolder">

							</div>

						</div>
					</div>
					<?php
						wp_nav_menu( array(
							'menu' => 'Main Menu',
							'container' => 'nav',
							'container_class' => 'primary-nav',
							'walker' => new Walker_Worldwide_Menu()
							
						) );
					?>
					<nav class="mobile-nav">
						<div class="root-nav">
							<div class="scroll-wrapper">
								<div class="section-title"><a href="/">Home</a></div>
								<div class="nav-icon fa fa-bars open"></div>
								<ul><li>
										<a href="/about-us" class=" "><span>About Us</span></a>
										<div class="sub-nav">
											<div class="scroll-wrapper">
												<div class="section-title"><span>About Us</span></div>
												<div class="back"><span>Back</span></div>
												<ul>
													<li><a href="/about-us">About Us</a></li>
													<li>
														<a href="/about-us/meet-the-team" class=" "><span>Meet The Team</span></a>

													</li><li>
														<a href="/about-us/global-reach" class=" "><span>Global Reach</span></a>

													</li><li>
														<a href="https://wwctrialscareers.silkroad.com/" class=" "><span>Careers</span></a>

													</li><li>
														<a href="/about-us/in-the-news" class=" "><span>In The News</span></a>

													</li></ul>
											</div>
										</div>
									</li><li>
										<a href="/therapeutic-areas" class=" "><span>Therapeutic Areas</span></a>
										<div class="sub-nav">
											<div class="scroll-wrapper">
												<div class="section-title"><span>Therapeutic Areas</span></div>
												<div class="back"><span>Back</span></div>
												<ul>
													<li><a href="/therapeutic-areas">Therapeutic Areas</a></li>
													<li>
														<a href="/therapeutic-areas/neuroscience" class=" "><span>Neuroscience</span></a>

													</li><li>
														<a href="/therapeutic-areas/cardiovascular" class=" "><span>Cardiovascular</span></a>

													</li><li>
														<a href="/therapeutic-areas/inflammation" class=" "><span>Inflammation</span></a>

													</li><li>
														<a href="/therapeutic-areas/rare-disease" class=" "><span>Rare Disease</span></a>

													</li><li>
														<a href="/therapeutic-areas/other-therapeutic-expertise" class=" "><span>Other Therapeutic Expertise</span></a>

													</li></ul>
											</div>
										</div>
									</li><li>
										<a href="/solutions" class=" "><span>Solutions</span></a>
										<div class="sub-nav">
											<div class="scroll-wrapper">
												<div class="section-title"><span>Solutions</span></div>
												<div class="back"><span>Back</span></div>
												<ul>
													<li><a href="/solutions">Solutions</a></li>
													<li>
														<a href="/solutions/bioanalytical-sciences" class=" "><span>Bioanalytical Sciences</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Bioanalytical Sciences</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/solutions/bioanalytical-sciences">Bioanalytical Sciences</a></li>
																	<li>
																		<a href="/resources/assay-methods-search/" class=" "><span>Method Development / Validation</span></a>

																	</li><li>
																		<a href="/solutions/bioanalytical-sciences/lc-ms-ms" class=" "><span>LC - MS / MS</span></a>

																	</li><li>
																		<a href="/solutions/bioanalytical-sciences/protein-binding" class=" "><span>Protein Binding</span></a>

																	</li><li>
																		<a href="/solutions/phase-i-iia-clinical-trials/ame-services/" class=" "><span>AME</span></a>

																	</li></ul>
															</div>
														</div>
													</li><li>
														<a href="/solutions/phase-i-iia-clinical-trials" class=" "><span>Phase I-IIA Clinical Trials</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Phase I-IIA Clinical Trials</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/solutions/phase-i-iia-clinical-trials">Phase I-IIA Clinical Trials</a></li>
																	<li>
																		<a href="/solutions/phase-i-iia-clinical-trials/bioequivalence" class=" "><span>Bioequivalence</span></a>

																	</li><li>
																		<a href="/solutions/phase-i-iia-clinical-trials/ame-services" class=" "><span>AME Services</span></a>

																	</li><li>
																		<a href="http://www.healthystudies.com/" class=" "><span>Subject Recruitment</span></a>

																	</li><li>
																		<a href="/solutions/phase-i-iia-clinical-trials/pharmacokinectics-pharmacodynamics" class=" "><span>Pharmacokinectics / Pharmacodynamics</span></a>

																	</li><li>
																		<a href="/solutions/phase-i-iia-clinical-trials/center-and-facilities" class=" "><span>Center and Facilities</span></a>

																	</li></ul>
															</div>
														</div>
													</li><li>
														<a href="/solutions/phase-iib-iiib-clinical-trials" class=" "><span>Phase IIB-IIIB Clinical Trials</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Phase IIB-IIIB Clinical Trials</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/solutions/phase-iib-iiib-clinical-trials">Phase IIB-IIIB Clinical Trials</a></li>
																	<li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/patient-recruitment-retention" class=" "><span>Patient Recruitment &amp; Retention</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/feasibility-protocol-development" class=" "><span>Feasibility &amp; Protocol Development</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/project-management" class=" "><span>Project Management</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/medical-monitoring" class=" "><span>Medical Monitoring</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/clinical-monitoring-site-management" class=" "><span>Clinical Monitoring &amp; Site Management</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/data-management" class=" "><span>Data Management</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/medical-writing" class=" "><span>Medical Writing</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/regulatory-affairs" class=" "><span>Regulatory Affairs</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/quality-assurance" class=" "><span>Quality Assurance</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/drug-supply-depots" class=" "><span>Drug &amp; Supply Depots</span></a>

																	</li><li>
																		<a href="/solutions/phase-iib-iiib-clinical-trials/drug-safety" class=" "><span>Drug Safety</span></a>

																	</li></ul>
															</div>
														</div>
													</li><li>
														<a href="/solutions/phase-iv-clinical-trials" class=" "><span>Phase IV Clinical Trials</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Phase IV Clinical Trials</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/solutions/phase-iv-clinical-trials">Phase IV Clinical Trials</a></li>
																	<li>
																		<a href="/solutions/phase-iv-clinical-trials/product-safety-pharmacovigilance" class=" "><span>Product Safety &amp; Pharmacovigilance</span></a>

																	</li><li>
																		<a href="/solutions/phase-iv-clinical-trials/registries-observational-studies" class=" "><span>Registries &amp; Observational Studies</span></a>

																	</li><li>
																		<a href="/solutions/phase-iv-clinical-trials/outcomes,-epidemiology-risk-management" class=" "><span>Outcomes, Epidemiology &amp; Risk Management</span></a>

																	</li></ul>
															</div>
														</div>
													</li><li>
														<a href="/solutions/rater-services" class=" "><span>Rater Services</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Rater Services</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/solutions/rater-services">Rater Services</a></li>
																	<li>
																		<a href="/solutions/rater-services/rater-reliability-analytics" class=" "><span>Rater Reliability Analytics</span></a>

																	</li><li>
																		<a href="/solutions/rater-services/rater-reliability-technologies" class=" "><span>Rater Reliability Technologies</span></a>

																	</li><li>
																		<a href="/solutions/rater-services/rater-training-and-certification" class=" "><span>Rater Training and Certification</span></a>

																	</li><li>
																		<a href="/solutions/rater-services/scale-management" class=" "><span>Scale Management</span></a>

																	</li><li>
																		<a href="/solutions/rater-services/rater-surveillance" class=" "><span>Rater Surveillance</span></a>

																	</li></ul>
															</div>
														</div>
													</li><li>
														<a href="/solutions/technology" class=" "><span>Technology</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Technology</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/solutions/technology">Technology</a></li>
																	<li>
																		<a href="/solutions/technology/trial-management-technologies" class=" "><span>Trial Management Technologies</span></a>

																	</li><li>
																		<a href="/solutions/rater-services/rater-reliability-technologies/" class=" "><span>Rater Reliability Technologies</span></a>

																	</li><li>
																		<a href="/solutions/technology/interactive-web-voice-response-system" class=" "><span>Interactive Web / Voice Response System</span></a>
																		<div class="sub-nav">
																			<div class="scroll-wrapper">
																				<div class="section-title"><span>Interactive Web / Voice Response System</span></div>
																				<div class="back"><span>Back</span></div>
																				<ul>
																					<li><a href="/solutions/technology/interactive-web-voice-response-system">Interactive Web / Voice Response System</a></li>
																					<li>
																						<a href="/solutions/technology/interactive-web-voice-response-system/ixrs-helpdesk" class=" "><span>IxRS Helpdesk</span></a>

																					</li></ul>
																			</div>
																		</div>
																	</li><li>
																		<a href="/solutions/technology/biostatistics" class=" "><span>Biostatistics</span></a>

																	</li></ul>
															</div>
														</div>
													</li></ul>
											</div>
										</div>
									</li><li>
										<a href="/resources/resource-library/" class=" "><span>Resources</span></a>
										<div class="sub-nav">
											<div class="scroll-wrapper">
												<div class="section-title"><span>Resources</span></div>
												<div class="back"><span>Back</span></div>
												<ul>
													<li><a href="/resources">Resources</a></li>
													<li>
														<a href="/resources/resource-library" class=" "><span>Resource Library</span></a>
														<div class="sub-nav">
															<div class="scroll-wrapper">
																<div class="section-title"><span>Resource Library</span></div>
																<div class="back"><span>Back</span></div>
																<ul>
																	<li><a href="/resources/resource-library">Resource Library</a></li>
																	<li>
																		<a href="/resources/resource-library" class=" "><span>All</span></a>

																	</li><li>
																		<a href="/resources/resource-library/articles" class=" "><span>Articles</span></a>

																	</li><li>
																		<a href="/resources/resource-library/posters" class=" "><span>Posters</span></a>

																	</li><li>
																		<a href="/resources/resource-library/case-studies" class=" "><span>Case Studies</span></a>
																		<div class="sub-nav">
																			<div class="scroll-wrapper">
																				<div class="section-title"><span>Case Studies</span></div>
																				<div class="back"><span>Back</span></div>
																				<ul>
																					<li><a href="/resources/resource-library/case-studies">Case Studies</a></li>
																					<li>
																						<a href="/resources/resource-library/case-studies/neurology-case-study-problem-solving-for-uninterr" class=" "><span>Neurology Case Study: Problem Solving for Uninterrupted Trial Progress</span></a>

																					</li><li>
																						<a href="/resources/resource-library/case-studies/respiratory-case-study-idiopathic-pulmonary-fibro" class=" "><span>Respiratory Case Study: Idiopathic Pulmonary Fibrosis</span></a>

																					</li></ul>
																			</div>
																		</div>
																	</li><li>
																		<a href="/resources/resource-library/infographics" class=" "><span>Infographics</span></a>

																	</li><li>
																		<a href="/resources/resource-library/fact-sheets" class=" "><span>Fact Sheets</span></a>
																		<div class="sub-nav">
																			<div class="scroll-wrapper">
																				<div class="section-title"><span>Fact Sheets</span></div>
																				<div class="back"><span>Back</span></div>
																				<ul>
																					<li><a href="/resources/resource-library/fact-sheets">Fact Sheets</a></li>
																					<li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-neurology-clinical-trials" class=" "><span>Expertise in Neurology Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-cardiovascular-clinical-trials" class=" "><span>Expertise in Cardiovascular Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-immune-mediated-inflammatory-disorder" class=" "><span>Expertise in Immune-Mediated Inflammatory Disorder Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-multiple-sclerosis-clinical-trials" class=" "><span>Expertise in Multiple Sclerosis Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-oncology-clinical-trials" class=" "><span>Expertise in Oncology Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-psychiatry-clinical-trials" class=" "><span>Expertise in Psychiatry Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-rare-disease-clinical-trials" class=" "><span>Expertise in Rare Disease Clinical Trials</span></a>

																					</li><li>
																						<a href="/resources/resource-library/fact-sheets/expertise-in-respiratory-clinical-trials" class=" "><span>Expertise in Respiratory Clinical Trials</span></a>

																					</li></ul>
																			</div>
																		</div>
																	</li><li>
																		<a href="/resources/resource-library/videos" class=" "><span>Videos</span></a>

																	</li><li>
																		<a href="/resources/resource-library/webinars" class=" "><span>Webinars</span></a>

																	</li><li>
																		<a href="/resources/resource-library/white-papers" class=" "><span>White Papers</span></a>

																	</li></ul>
															</div>
														</div>
													</li><li>
														<a href="/resources/assay-methods-search" class=" "><span>Assay Methods Search</span></a>

													</li></ul>
											</div>
										</div>
									</li><li>
										<a href="/blog" class=" "><span>Blog</span></a>

									</li><li>
										<a href="javascript:void(0);" class="hidden "><span>Connect</span></a>
										<div class="sub-nav">
											<div class="scroll-wrapper">
												<div class="section-title"><span>Connect</span></div>
												<div class="back"><span>Back</span></div>
												<ul>
													<li><a href="/connect">Connect</a></li>
													<li>
														<a href="https://www.facebook.com/worldwideclinicaltrials" class="fa fa-facebook "><span>Facebook</span></a>

													</li><li>
														<a href="https://twitter.com/worldwidetrials" class="fa fa-twitter "><span>Twitter</span></a>

													</li><li>
														<a href="https://www.linkedin.com/company/worldwide-clinical-trials-inc-?trk=top_nav_home" class="fa fa-linkedin "><span>LinkedIn</span></a>

													</li></ul>
											</div>
										</div>
									</li><li>
										<a href="/about-us/contact-us" class=" "><span>Contact Us</span></a>

									</li><li>
										<a href="https://wwctrialscareers.silkroad.com/" class=" "><span>Careers</span></a>

									</li><li>
										<a href="/events" class=" "><span>Events</span></a>

									</li><li>
										<a href="http://www.healthystudies.com/" class=" "><span>Healthy Studies</span></a>

									</li><li>
										<a href="/investigators" class=" "><span>Investigators</span></a>

									</li><li>
										<a href="/client-login" class=" "><span>Client Login</span></a>

									</li><li>
										<a href="/privacy-statement-terms-of-use" class=" "><span>Privacy Statement &amp; Terms of Use</span></a>
										<div class="sub-nav">
											<div class="scroll-wrapper">
												<div class="section-title"><span>Privacy Statement & Terms of Use</span></div>
												<div class="back"><span>Back</span></div>
												<ul>
													<li><a href="/privacy-statement-terms-of-use">Privacy Statement & Terms of Use</a></li>
													<li>
														<a href="/privacy-statement-terms-of-use/cookie-policy" class=" "><span>Cookie Policy</span></a>

													</li><li>
														<a href="/privacy-statement-terms-of-use/safe-harbor-privacy-statement" class=" "><span>Safe Harbor Privacy Statement</span></a>

													</li></ul>
											</div>
										</div>
									</li><li>
										<a href="/ethics-compliance" class=" "><span>Ethics &amp; Compliance</span></a>

									</li><li>
										<a href="/sitemap" class=" "><span>Sitemap</span></a>

									</li><li>
										<a href="https://gate.wwctrials.com/" class=" "><span>WCT Employee Links</span></a>

									</li><li>
										<a href="/request-proposal" class=" "><span>Request Proposal</span></a>

									</li></ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>

</header>

<div class="main-content">

<?php

$post_id = get_the_ID();
if (is_tax()) {
	//$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
	$post_id = 'resources_tax_'.get_queried_object()->term_id;
	
}

//echo get_queried_object()->slug;

$header_type = get_field('header_type', $post_id); ?>
<?php if ($header_type == 'image' && ! is_front_page()) { ?>
<?php $header_image = get_field('header_image', $post_id); ?>
<?php //print_r($header_image); ?>
<div class="hero-image-webpart hero-sm dark-image mobile-scaled">
	<div class="img-bg" style="background-image:url(<?php echo $header_image['url'] ?>); height: <?php echo $header_image['height'] ?>px"></div>
	<?php if (get_field('header_text', $post_id)) { ?>
	<div class="container">
		<div class="hero-content">
			<?php the_field('header_text', $post_id) ?>
		</div>
	</div>
	<?php } ?>
</div>

<?php } else if ($header_type == 'video') { ?>
<div class="about-video-hero">
	<div id="p_lt_ctl05_pageplaceholder_p_lt_ctl00_HeroVideoWithContent_divHero" class="hero-video-webpart">
		<div id="p_lt_ctl05_pageplaceholder_p_lt_ctl00_HeroVideoWithContent_divImg" class="img-bg"></div>
		<video src="<?php echo get_field('header_video') ?>" id="p_lt_ctl05_pageplaceholder_p_lt_ctl00_HeroVideoWithContent_videoHero" muted="" autoplay="" loop=""></video>
		<?php if (get_field('header_play_video_url')) { ?>
		<div class="container">
			<div id="p_lt_ctl05_pageplaceholder_p_lt_ctl00_HeroVideoWithContent_divContentRow" class="row hero-content">
				<div class="col-sm-8 col-sm-push-2">
					<div id="p_lt_ctl05_pageplaceholder_p_lt_ctl00_HeroVideoWithContent_divCopy">
						<p>&nbsp;</p>
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<a class="btn btn-default btn-lg" data-target=".video-modal" data-title="About Worldwide Clinical Trials" data-toggle="modal" href="<?php echo get_field('header_play_video_url') ?>"><span class="fa fa-play"></span>&nbsp;Full Video</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php } ?>

<?php if ( ! get_field('hide_breadcrumbs') && ! is_front_page() && ! is_404()) { ?>
<div class="container-wrapper standard-container-wrapper breadcrumbs">
  <div class="container" typeof="BreadcrumbList" vocab="http://schema.org/">
    <!--<span  class="CMSBreadCrumbsCurrentItem">Breadcrumbs goes here...</span>-->
	<!--<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">-->
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
		?>
	<!--</div>-->
  </div>
</div>
<?php } ?>