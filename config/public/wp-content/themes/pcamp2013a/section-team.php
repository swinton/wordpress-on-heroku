<div id="global_team"> 

	<section id="team" class="cat"> <!-- MEET TEAM -->

		<div class="title">
			<?php echo get_option('wps_title_thumbnail_page'); ?>
		</div>
		<h1>
			<?php echo get_option('wps_title_intro_2'); ?>
		</h1>

		<table id="buttons_team"> <!-- TABS -->
			<tr>
				<?php
					$number_tabs_team = get_option('wps_number_tabs_team');
					for($i=1; $i<=$number_tabs_team; ++$i){
						$nameTab = get_option('wps_tab_'.$i.'_team');
						$currentTab = str_replace(" ", "_", $nameTab);
						echo '<td><div id="'.$currentTab.'" class="button_team">'.get_option('wps_tab_'.$i.'_team').'</td>';
					}
				?>
			</tr>
		</table> <!-- END TABS -->

		<?php
			for($i=1; $i<=$number_tabs_team; ++$i){
				$blog_title = get_template_directory_uri();
				$nameTab = get_option('wps_tab_'.$i.'_team');
				$currentTab = str_replace(" ", "_", $nameTab);
				echo '<div id="members-'.$currentTab.'" class="members"><ul class="lb-album">';
				$number_members = get_option('wps_number_members_tab_'.$i.'_team');
				for($j=1; $j<=$number_members; ++$j){
					if($j==1){
						$k=$j+1;
						$l=$number_members;
					} else if($j==$number_members){
						$k=1;
						$l=$j-1;
					} else {
						$k=$j+1;
						$l=$j-1;
					}
					echo '<li>
							<div class="p-member"><span class="img-member" style="background-image:url('.get_option('wps_tab_'.$i.'_member_'.$j.'_picture').')"></span><span class="hover-zoom"><a href="#image-'.$i.''.$j.'"><img src="'.$blog_title.'/images/icon-oeil.png" alt=""></a></span><span class="hover-mail"><a href="mailto:'.get_option('wps_tab_'.$i.'_mail_member_'.$j.'').'" target="blank"><img src="'.$blog_title.'/images/icon-send.png" alt=""></a></span></div>
							<div class="description-member">
								<h3>'.get_option('wps_tab_'.$i.'_name_member_'.$j.'').'</h3>
								<div class="sub_title">'.get_option('wps_tab_'.$i.'_job_member_'.$j.'').'</div>
								<p>'.get_option('wps_tab_'.$i.'_description_member_'.$j.'').'</p>
							</div>
							<div class="lb-overlay" id="image-'.$i.''.$j.'">
								<img src="'.get_option('wps_tab_'.$i.'_member_'.$j.'_picture').'" alt="image'.$j.'" />
								<div>
									<a href="#image-'.$i.''.$l.'" class="lb-prev"></a>
									<a href="#image-'.$i.''.$k.'" class="lb-next"></a>
								</div>
									<a href="#page" class="lb-close"></a>
							</div>
						</li>';
				}
				echo "</ul></div>";
			}
		?>
		<div class="cb"></div>
	
	<?php $contact_visible = get_option('wps_active_contact_page');
				if($contact_visible){ ?>
	<div id="contact_team">
		<p><a id="team_contact" href="#contact"><?php echo get_option('wps_link_text_thumbnail'); ?></a></p>
	</div>
	<?php } ?>


	</section> <!-- END MEET TEAM -->

</div>
<div class="cb"></div>