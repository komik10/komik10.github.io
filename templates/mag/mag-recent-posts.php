<?php 
global $redux_demo;
$betubeGalleryCheck = '';
$betubeVideoCheck = '';
$betubeAudioCheck = '';
$betubeAllPosts = $redux_demo['all-video-page-link'];
$betubeMagRecPostTitle = $redux_demo['betube_mag_recent_posts'];
$betubeMagRecPostDesc = $redux_demo['betube_mag_recent_posts_desc'];
$betubeMagRecPostIcon = $redux_demo['betube_mag_recent_posts_icon'];
$betubeMagRecPostCount = $redux_demo['betube_mag_recent_posts_count'];
$betubeMagRecPostColor = $redux_demo['betube_mag_recent_posts_color'];
$betubeMagRecPostCatsList = $redux_demo['betube_mag_recent_posts_cat_list'];
$betubeMagRecPostTypes = $redux_demo['betube_mag_recent_posts_type'];
$betubeGalleryCheck = $betubeMagRecPostTypes['image'];
$betubeVideoCheck = $betubeMagRecPostTypes['video'];
$betubeAudioCheck = $betubeMagRecPostTypes['audio'];
?>
<section class="betube_mag content betube__recent">
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
						<div class="betube_mag__heading_icon" style="background:<?php echo $betubeMagRecPostColor; ?>;">
							<i class="<?php echo $betubeMagRecPostIcon; ?>"></i>
						</div>
						<div class="betube_mag__heading_head">
							<h3><?php echo $betubeMagRecPostTitle; ?></h3>
							<p><?php echo $betubeMagRecPostDesc; ?></p>
						</div>
					</div>
				</div><!--Media-body-->
			</div>
		</div><!--columns-->
	</div><!--row-->
	<div class="row">
		<div class="columns">
			<div class="tabs-content">
				<!--All Recent Posts -->
				<div class="tabs-panel tab-content active" data-content="1">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 5,
						);
						$count = 1;
						$wp_query = new WP_Query($args);
						$totalPost = $wp_query->post_count;	
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$betubeIconColor = '';
							$betubepostCatgory = get_the_category( $post->ID );
							if ($betubepostCatgory[0]->category_parent == 0){
								$tag = $betubepostCatgory[0]->cat_ID;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['category_image'];
								}
							}elseif($betubepostCatgory[1]->category_parent == 0){
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}else{
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}
							$user_ID = $post->post_author;
							$authorName = get_the_author_meta('display_name', $user_ID );
							$thumbURL = betube_thumb_url($post->ID);
							$altTag = betube_thumb_alt($post->ID);
							$post_ID = $post->ID;
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 1) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-280">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>									
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div><!--betube_mag__item_img-->
								<figcaption>									
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
									<p class="description_text">
										<?php echo get_the_excerpt(); ?>			
									</p>
								</figcaption>
							</figure>
						</div><!--large-6-->
						<?php
						endif;
						if($count == 2) :
							echo '<div class="large-6 medium-6 columns">';
							echo '<div class="row padding-x-10">';
						endif;
						if($count == 2 || $count == 3 || $count == 4 || $count == 5) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-150">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>	
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div>
								<figcaption>
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
								</figcaption>
							</figure>
						</div>
						<?php
						endif;
						if($totalPost > 2){
							if($count == 5) :
								echo '</div>';
								echo '</div>';								
							endif;
						}elseif($totalPost < 2){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';								
							}
						}
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
						$count++;
						endwhile;
						wp_reset_postdata();
						wp_reset_query();
						?>
					</div><!--owl-carousel-->
					<!--Tab Button-->
					<div class="custom__button_carousel text-right">
						<!--Pre btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php } ?>
						<!--Pre btn-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--Next btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php }else{?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php } ?>
						<!--Next btn-->
						<a href="<?php echo $betubeAllPosts; ?>" class="betube_mag__view_all"><?php esc_html_e( 'View All', 'betube' ); ?></a>
					</div>
					<!--Tab Button-->
				</div><!--tabs-panel-->				
				<!--All Recent Posts -->
				<!--All Audio Posts -->
				<?php if($betubeAudioCheck == 1) :?>
				<div class="tabs-panel tab-content" data-content="2">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => $betubeMagRecPostCount,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-audio'
								)
							)
						);
						$count = 1;
						$wp_query = new WP_Query($args);
						$totalPost = $wp_query->post_count;	
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$betubeIconColor = '';
							$betubepostCatgory = get_the_category( $post->ID );
							if ($betubepostCatgory[0]->category_parent == 0){
								$tag = $betubepostCatgory[0]->cat_ID;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['category_image'];
								}
							}elseif($betubepostCatgory[1]->category_parent == 0){
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}else{
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}
							$user_ID = $post->post_author;
							$authorName = get_the_author_meta('display_name', $user_ID );
							$thumbURL = betube_thumb_url($post->ID);
							$altTag = betube_thumb_alt($post->ID);
							$post_ID = $post->ID;
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 1) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-280">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>									
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div><!--betube_mag__item_img-->
								<figcaption>									
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
									<p class="description_text">
										<?php echo get_the_excerpt(); ?>				
									</p>
								</figcaption>
							</figure>
						</div><!--large-6-->
						<?php
						endif;
						if($count == 2) :
							echo '<div class="large-6 medium-6 columns">';
							echo '<div class="row padding-x-10">';
						endif;
						if($count == 2 || $count == 3 || $count == 4 || $count == 5) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-150">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>	
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div>
								<figcaption>
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
								</figcaption>
							</figure>
						</div>
						<?php
						endif;
						if($totalPost > 2){
							if($count == 5) :
								echo '</div>';
								echo '</div>';								
							endif;
						}elseif($totalPost < 2){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';								
							}
						}
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
						$count++;
						endwhile;
						wp_reset_postdata();
						wp_reset_query();
						?>
					</div><!--owl-carousel-->
					<!--Tab Button-->
					<div class="custom__button_carousel text-right">
						<!--Pre btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php } ?>
						<!--Pre btn-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--Next btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php }else{?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php } ?>
						<!--Next btn-->
						<a href="<?php echo $betubeAllPosts; ?>" class="betube_mag__view_all"><?php esc_html_e( 'View All', 'betube' ); ?></a>
					</div>
					<!--Tab Button-->
				</div><!--tabs-panel-->
				<?php endif;?>
				<!--All Audio Posts -->
				<!--All Video Posts-->
				<?php if($betubeVideoCheck == 1) :?>
				<div class="tabs-panel tab-content" data-content="3">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => $betubeMagRecPostCount,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-video'
								)
							)
						);
						$count = 1;
						$wp_query = new WP_Query($args);
						$totalPost = $wp_query->post_count;	
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$betubeIconColor = '';
							$betubepostCatgory = get_the_category( $post->ID );
							if ($betubepostCatgory[0]->category_parent == 0){
								$tag = $betubepostCatgory[0]->cat_ID;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['category_image'];
								}
							}elseif($betubepostCatgory[1]->category_parent == 0){
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}else{
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}
							$user_ID = $post->post_author;
							$authorName = get_the_author_meta('display_name', $user_ID );
							$thumbURL = betube_thumb_url($post->ID);
							$altTag = betube_thumb_alt($post->ID);
							$post_ID = $post->ID;
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 1) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-280">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>									
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div><!--betube_mag__item_img-->
								<figcaption>									
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
									<p class="description_text">
										<?php echo get_the_excerpt(); ?>				
									</p>
								</figcaption>
							</figure>
						</div><!--large-6-->
						<?php
						endif;
						if($count == 2) :
							echo '<div class="large-6 medium-6 columns">';
							echo '<div class="row padding-x-10">';
						endif;
						if($count == 2 || $count == 3 || $count == 4 || $count == 5) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-150">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>	
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div>
								<figcaption>
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
								</figcaption>
							</figure>
						</div>
						<?php
						endif;
						if($totalPost > 2){
							if($count == 5) :
								echo '</div>';
								echo '</div>';								
							endif;
						}elseif($totalPost < 2){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';								
							}
						}
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
						$count++;
						endwhile;
						wp_reset_postdata();
						wp_reset_query();
						?>
					</div><!--owl-carousel-->
					<!--Tab Button-->
					<div class="custom__button_carousel text-right">
						<!--Pre btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php } ?>
						<!--Pre btn-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--Next btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php }else{?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php } ?>
						<!--Next btn-->
						<a href="<?php echo $betubeAllPosts; ?>" class="betube_mag__view_all"><?php esc_html_e( 'View All', 'betube' ); ?></a>
					</div>
					<!--Tab Button-->
				</div><!--tabs-panel-->
				<?php endif;?>
				<!--All Video Posts-->
				<!--All Gallery Posts-->
				<?php if($betubeGalleryCheck == 1) :?>
				<div class="tabs-panel tab-content" data-content="4">
					<div class="owl-carousel betube_mag__carousel_post" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover="true" data-car-length="1" data-items="1" data-dots="false" data-loop="false" data-merge="true" data-auto-height="true" data-auto-width="false" data-margin="0" data-responsive-small="1" data-responsive-medium="1" data-rewind="true" data-right="<?php if(is_rtl()){ echo 'true';}else{echo 'false';}?>">
						<?php 
						global $paged, $wp_query, $wp;
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => $betubeMagRecPostCount,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-image'
								)
							)
						);
						$count = 1;
						$wp_query = new WP_Query($args);
						$totalPost = $wp_query->post_count;	
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$betubeIconColor = '';
							$betubepostCatgory = get_the_category( $post->ID );
							if ($betubepostCatgory[0]->category_parent == 0){
								$tag = $betubepostCatgory[0]->cat_ID;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['category_image'];
								}
							}elseif($betubepostCatgory[1]->category_parent == 0){
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}else{
								$tag = $betubepostCatgory[0]->category_parent;
								$tag_extra_fields = get_option(BETUBE_CATEGORY_FIELDS);
								if (isset($tag_extra_fields[$tag])) {
									$betubeIconCode = $tag_extra_fields[$tag]['category_icon_code'];
									$betubeIconColor = $tag_extra_fields[$tag]['category_icon_color'];
									$betubeCatIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}
							$user_ID = $post->post_author;
							$authorName = get_the_author_meta('display_name', $user_ID );
							$thumbURL = betube_thumb_url($post->ID);
							$altTag = betube_thumb_alt($post->ID);
							$post_ID = $post->ID;
						if($count == 1) :
							echo '<div class="item">';
							echo '<div class="row">';
						endif;
						if($count == 1) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-280">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>									
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div><!--betube_mag__item_img-->
								<figcaption>									
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
									<p class="description_text">
										<?php echo get_the_excerpt(); ?>				
									</p>
								</figcaption>
							</figure>
						</div><!--large-6-->
						<?php
						endif;
						if($count == 2) :
							echo '<div class="large-6 medium-6 columns">';
							echo '<div class="row padding-x-10">';
						endif;
						if($count == 2 || $count == 3 || $count == 4 || $count == 5) :
						?>
						<div class="large-6 medium-6 columns end">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-150">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>	
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
								</div>
								<figcaption>
									<h5 class="betube_mag__item_list_heading">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post->ID); ?>
									</p>
								</figcaption>
							</figure>
						</div>
						<?php
						endif;
						if($totalPost > 2){
							if($count == 5) :
								echo '</div>';
								echo '</div>';								
							endif;
						}elseif($totalPost < 2){
							if($totalPost == $count){
								echo '</div>';
								echo '</div>';								
							}
						}
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
						$count++;
						endwhile;
						wp_reset_postdata();
						wp_reset_query();
						?>
					</div><!--owl-carousel-->
					<!--Tab Button-->
					<div class="custom__button_carousel text-right">
						<!--Pre btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php }else{ ?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php } ?>
						<!--Pre btn-->
						<span class="num_carousel_post" data-sep="<?php esc_html_e( 'of', 'betube' ); ?>"></span>
						<!--Next btn-->
						<?php if(is_rtl()){?>
						<a href="#" class="custom__button_carousel_prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<?php }else{?>
						<a href="#" class="custom__button_carousel_next">
							<i class="fa fa-chevron-right"></i>
						</a>
						<?php } ?>
						<!--Next btn-->
						<a href="<?php echo $betubeAllPosts; ?>" class="betube_mag__view_all"><?php esc_html_e( 'View All', 'betube' ); ?></a>
					</div>
					<!--Tab Button-->
				</div><!--tabs-panel-->
				<?php endif;?>
				<!--All Gallery Posts-->
			</div><!--tabs-content-->
		</div><!--columns-->
	</div><!--row-->
</section>