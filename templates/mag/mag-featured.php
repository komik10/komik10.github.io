<?php 
	global $redux_demo;
	$betubeGalleryCheck = '';
	$betubeVideoCheck = '';
	$betubeAudioCheck = '';
	$betubeFeaturedPostTitle = '';
	$betubeFeaturedPostDesc = '';
	$betubeFeaturedPostIcon = '';
	$betubeFeaturedPostIconColor = '';
	$betubeFeaturedPostType = $redux_demo['betube_featured_posts_type'];	
	$betubeFeaturedAdv = $redux_demo['betube_featured_posts_adv'];	
	$betubeGalleryCheck = $betubeFeaturedPostType['image'];
	$betubeVideoCheck = $betubeFeaturedPostType['video'];
	$betubeAudioCheck = $betubeFeaturedPostType['audio'];
	$betubeFeaturedPostTitle = $redux_demo['betube_featured_posts_title'];
	$betubeFeaturedPostDesc = $redux_demo['betube_featured_posts_desc'];
	$betubeFeaturedPostIcon = $redux_demo['betube_featured_posts_icon'];
	$betubeFeaturedPostIconColor = $redux_demo['betube_featured_posts_icon_color'];
?>
<section class="betube_mag content">
	<div class="row">
		<div class="columns">
			<div class="Media Media--reverse borderBottom main_heading">
				<div class="betube_mag__heading_right Media-figure">
					<ul class="tabs menu icon-top" data-tabs>
						<li class="tabs-title is-active">
							<a href="" data-tab="1" aria-selected="true">
								<i class="fa fa-align-left"></i><?php esc_html_e( 'All', 'betube' ); ?>
							</a>
						</li>
						<?php if($betubeAudioCheck == 1){?>
						<li class="tabs-title">
							<a data-tab="2" href="" aria-selected="false">
								<i class="fa fa-newspaper-o"></i><?php esc_html_e( 'Audio', 'betube' ); ?>
							</a>
						</li>
						<?php } ?>
						<?php if($betubeVideoCheck == 1){?>
						<li class="tabs-title">
							<a data-tab="3" href="" aria-selected="false">
								<i class="fa fa-video-camera"></i><?php esc_html_e( 'Videos', 'betube' ); ?>
							</a>
						</li>
						<?php } ?>
						<?php if($betubeGalleryCheck == 1){?>
						<li class="tabs-title">
							<a data-tab="4" href="" aria-selected="false">
								<i class="fa fa-camera-retro"></i><?php esc_html_e( 'gallery', 'betube' ); ?>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div><!--betube_mag__heading_right-->
				<div class="Media-body">
					<div class="betube_mag__heading">
						<div class="betube_mag__heading_icon" style="background:<?php echo $betubeFeaturedPostIconColor; ?>;">
							<i class="<?php echo $betubeFeaturedPostIcon; ?>"></i>
						</div>
						<div class="betube_mag__heading_head">
							<h3><?php echo $betubeFeaturedPostTitle; ?></h3>
							<p><?php echo $betubeFeaturedPostDesc; ?></p>
						</div>
					</div>
				</div><!--Media-body-->
			</div>
		</div><!--columns-->
	</div><!--row-->
	<div class="row">
		<div class="columns">
			<div class="tabs-content">
				<div class="tabs-panel tab-content active" data-content="1">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => 10,	
							'meta_query' => array(
							array(
								'key' => 'featured_post',
								'value' => '1',
								'compare' => '=='
								)
							),
						);
						//print_r($arags);
						$count = 1;
						$itemClass = '';
						$wp_query = new WP_Query($arags);
						$totalPost = $wp_query->post_count;						
						while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
						<?php 
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 3) :							
							echo '<div class="row padding-x-10">';
						endif;
						
						if($count == 1 || $count == 2) :
							get_template_part( 'templates/mag/mag-loop-big' );
						endif;
						
						if($count == 3 || $count == 4 || $count == 5) :
							get_template_part( 'templates/mag/mag-loop-small' );
						endif;
						
						if($count == 2) :
							echo '</div>';
						endif;
						if($totalPost > 5 || $totalPost == 5){
							if($count == 5) :
								echo '</div>';
								echo '</div>';
								$count = 0;
							endif;
						}elseif($totalPost < 5){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';
								$count = 0;
							}
						}
						
						?>
						<?php $count++; ?>						
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php wp_reset_query(); ?>
					</div><!--owl-carousel-->
					<!--carousel button-->
					<div class="custom__button_carousel text-right">
						<!--custom__button_carousel_prev-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
						<?php } ?>
						<!--custom__button_carousel_prev-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--custom__button_carousel_next-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
						<?php } ?>
						<!--custom__button_carousel_next-->
					</div>
					<!--carousel button-->
				</div><!--tabs-panel-->
				<!--Audio Posts-->
				<?php if($betubeAudioCheck == 1):?>
				<div class="tabs-panel tab-content" data-content="2">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => 10,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-audio'
								)
							),
							'meta_query' => array(
							array(
								'key' => 'featured_post',
								'value' => '1',
								'compare' => '=='
								)
							),
						);
						$count = 1;
						$itemClass = '';
						$wp_query = new WP_Query($arags);
						$totalPost = $wp_query->post_count;						
						while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
						<?php 
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 3) :							
							echo '<div class="row padding-x-10">';
						endif;
						
						if($count == 1 || $count == 2) :
							get_template_part( 'templates/mag/mag-loop-big' );
						endif;
						
						if($count == 3 || $count == 4 || $count == 5) :
							get_template_part( 'templates/mag/mag-loop-small' );
						endif;
						
						if($count == 2) :
							echo '</div>';
						endif;
						if($totalPost > 5 || $totalPost == 5){
							if($count == 5) :
								echo '</div>';
								echo '</div>';
								$count = 0;
							endif;
						}elseif($totalPost < 5){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';
								$count = 0;
							}
						}
						
						?>
						<?php $count++; ?>						
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php wp_reset_query(); ?>
						<!--carousel button-->
						<div class="custom__button_carousel text-right">
							<!--custom__button_carousel_prev-->
							<?php if(is_rtl()){?>
							<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
							<?php }else{ ?>
							<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
							<?php } ?>
							<!--custom__button_carousel_prev-->
							<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
							<!--custom__button_carousel_next-->
							<?php if(is_rtl()){?>
							<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
							<?php }else{ ?>
							<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
							<?php } ?>
							<!--custom__button_carousel_next-->
						</div>
						<!--carousel button-->
					</div>		
					<?php endif;?>
				<!--Audio Posts-->
				<!--Video Posts-->
				<?php if($betubeVideoCheck == 1):?>
				<div class="tabs-panel tab-content" data-content="3">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => 10,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-video'
								)
							),
							'meta_query' => array(
							array(
								'key' => 'featured_post',
								'value' => '1',
								'compare' => '=='
								)
							),
						);
						$count = 1;
						$itemClass = '';
						$wp_query = new WP_Query($arags);
						$totalPost = $wp_query->post_count;						
						while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
						<?php 
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 3) :							
							echo '<div class="row padding-x-10">';
						endif;
						
						if($count == 1 || $count == 2) :
							get_template_part( 'templates/mag/mag-loop-big' );
						endif;
						
						if($count == 3 || $count == 4 || $count == 5) :
							get_template_part( 'templates/mag/mag-loop-small' );
						endif;
						
						if($count == 2) :
							echo '</div>';
						endif;
						if($totalPost > 5 || $totalPost == 5){
							if($count == 5) :
								echo '</div>';
								echo '</div>';
								$count = 0;
							endif;
						}elseif($totalPost < 5){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';
								$count = 0;
							}
						}
						
						?>
						<?php $count++; ?>						
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php wp_reset_query(); ?>
					</div><!--owl-carousel-->
					<!--carousel button-->
					<div class="custom__button_carousel text-right">
						<!--custom__button_carousel_prev-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
						<?php } ?>
						<!--custom__button_carousel_prev-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--custom__button_carousel_next-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
						<?php } ?>
						<!--custom__button_carousel_next-->
					</div>
					<!--carousel button-->
				</div>
				<?php endif; ?>
				<!--Video Posts-->
				<!--Gallery Posts-->
				<?php if($betubeGalleryCheck == 1):?>
				<div class="tabs-panel tab-content" data-content="4">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => 10,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-image'
								)
							),
							'meta_query' => array(
							array(
								'key' => 'featured_post',
								'value' => '1',
								'compare' => '=='
								)
							),
						);
						$count = 1;
						$itemClass = '';
						$wp_query = new WP_Query($arags);
						$totalPost = $wp_query->post_count;						
						while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
						<?php 
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 3) :							
							echo '<div class="row padding-x-10">';
						endif;
						
						if($count == 1 || $count == 2) :
							get_template_part( 'templates/mag/mag-loop-big' );
						endif;
						
						if($count == 3 || $count == 4 || $count == 5) :
							get_template_part( 'templates/mag/mag-loop-small' );
						endif;
						
						if($count == 2) :
							echo '</div>';
						endif;
						if($totalPost > 5 || $totalPost == 5){
							if($count == 5) :
								echo '</div>';
								echo '</div>';
								$count = 0;
							endif;
						}elseif($totalPost < 5){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';
								$count = 0;
							}
						}
						
						?>
						<?php $count++; ?>						
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php wp_reset_query(); ?>
					</div><!--owl-carousel-->
					<!--carousel button-->
					<div class="custom__button_carousel text-right">
						<!--custom__button_carousel_prev-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
						<?php } ?>
						<!--custom__button_carousel_prev-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--custom__button_carousel_next-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev"><i class="fa fa-chevron-left"></i></a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_next"><i class="fa fa-chevron-right"></i></a>
						<?php } ?>
						<!--custom__button_carousel_next-->
					</div>
					<!--carousel button-->
				</div>
				<?php endif; ?>
				<!--Gallery Posts-->
			</div><!--tabs-content-->
		</div><!--columns-->
	</div><!--row-->
</section><!--betube_mag content-->
<!-- advertisement -->
<?php if(!empty($betubeFeaturedAdv)){?>
	<section class="betube_mag content advertisement text-center">
		<?php echo $betubeFeaturedAdv; ?>
	</section><!-- /.advertisement -->
<?php } ?>