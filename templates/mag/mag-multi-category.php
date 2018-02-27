<?php 
	global $redux_demo;
	$betubeMagMainCat = $redux_demo['betube_mag_main_cat'];
	$betubeMagMainCatDesc = $redux_demo['betube_mag_main_cat_des'];
	$betubeMagMultiCategories = $redux_demo['betube_mag_multi_categories'];
	$betubeIconColor = '';
	function betube_mag_tabber_content($catID){
		?>
		<div class="tabs-panel tab-content" data-content="<?php echo $catID; ?>">
			<div class="row">
			<?php
			global $paged, $wp_query, $wp, $post;
			$betubeIconColor = '';
			$arags = array(
				'post_type' => 'post',
				'posts_per_page' => 5,
				'cat' => $catID,
			);
			$count = 1;
			$itemClass = '';
			$wp_query = new WP_Query($arags);
			//print_r($wp_query);
			$totalPost = $wp_query->post_count;						
			while ($wp_query->have_posts()) : $wp_query->the_post();
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
				$beTubedateFormat = get_option( 'date_format' );		
					if($count == 1){
						?>
						<div class="large-6 medium-6 columns">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-280">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>
									<span class="betube_mag__item_icon">
										<i class="<?php echo betube_post_format_display($post_ID); ?>"></i>
									</span>
									<a href="<?php the_permalink(); ?>" class="hover-posts">
									</a>
								</div>
								<figcaption>
									<h5>
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post_ID); ?>
									</p>
									<p class="description_text">
										<?php echo get_the_excerpt(); ?>
									</p>
								</figcaption>
							</figure>
						</div>
						<?php
					}
					if($count == 2){
						echo '<div class="large-6 medium-6 columns">';
					}
					if($count != 1){
					?>
					<div class="Media align-top margin-bottom-10">
						<div class="Media-figure">
							<figure class="betube_mag__item margin-bottom-0">
								<div class="betube_mag__item_img margin-bottom-0 height height-100" style="width: 100px;">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts">
									</a>
								</div>
							</figure>
						</div>
						<div class="Media-body">
							<span class="betube_mag__item_list_cat" style="background:<?php echo $betubeIconColor; ?>;">
								<?php echo $betubepostCatgory[0]->name; ?>
							</span>
							<h5 class="betube_mag__item_list_heading">
								<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							</h5>
							<p class="betube_mag__item_list_description"> <?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?>  <i class="fa fa-clock-o"></i> <?php echo get_the_date($beTubedateFormat, $post_ID); ?></p>
						</div>
					</div>
					<?php 
					}					
					if($totalPost > 5 || $totalPost == 5){
						if($count == 5) :							
							echo '</div>';
							$count = 0;
						endif;
					}elseif($totalPost < 5){
						if($totalPost == $count){								
							echo '</div>';
							$count = 0;
						}
					}
				
			?>
			<?php $count++; ?>						
			<?php endwhile; ?>
			<?php //wp_reset_postdata(); ?>
			<?php //wp_reset_query();?>
			</div>
		</div>		
	<?php }
?>
<section class="betube_mag content borderBottom">
	<div class="row">
		<div class="columns">
			<div class="Media Media--reverse borderBottom main_heading">
				<div class="betube_mag__heading_right Media-figure">
					<ul class="tabs menu icon-top" data-tabs id="example-tabs">
						<li class="tabs-title is-active">
							<a href="" data-tab="<?php echo $betubeMagMainCat; ?>" aria-selected="true">
								<?php esc_html_e( 'All', 'betube' ); ?>
							</a>
						</li>
					<?php if(!empty($betubeMagMultiCategories)){?>	
					<?php 
					$count = 1;
					$displayCat = array();
					foreach($betubeMagMultiCategories as $singleMagCat){
					?>
						<li class="tabs-title is-active">
							<a href="" data-tab="<?php echo $singleMagCat; ?>" aria-selected="false">
								<?php echo get_cat_name($singleMagCat) ?>
							</a>
						</li>
					<?php
					$count++;
					$displayCat[] .= $singleMagCat;
					if($count == 5){ break;}
					}					
					$betubeMagMoreCats = array_diff($betubeMagMultiCategories, $displayCat);
					if(!empty($betubeMagMoreCats)){
						$i = 0;
					?>
						<li class="tabs-title" data-toggle="example-dropdown-1">
							<a data-tab="6" href="" aria-selected="false">
								<?php esc_html_e( 'More', 'betube' ); ?>
							</a>
							<ul class="dropdown-pane" id="example-dropdown-1" data-dropdown data-hover="true" data-hover-pane="true">
								<?php foreach($betubeMagMoreCats as $singleMoreCat){?>
								<li class="tabs-title betube_float_none">
									<a data-tab="<?php echo $singleMoreCat; ?>" href="" aria-selected="false">
										<?php echo get_cat_name($singleMoreCat) ?>
									</a>
								</li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
					<?php } ?>
					</ul>
				</div>
				
				<!--betube_mag__heading_right-->
				<div class="Media-body">
					<div class="betube_mag__heading">
						<div class="betube_mag__heading_icon" style="background: #9c27b0;">
							<i class="fa fa-cubes"></i>
						</div>
						<div class="betube_mag__heading_head">
							<h3><?php echo get_cat_name($betubeMagMainCat) ?></h3>
							<p><?php echo $betubeMagMainCatDesc; ?></p>
						</div>
					</div>
				</div><!--Media-body-->
			</div><!--Media-->
		</div><!--columns-->
	</div><!--row-->
	<div class="tabs-content">
		<div class="tabs-panel tab-content active" data-content="<?php echo $betubeMagMainCat; ?>">
			<div class="row">
				<?php 
				global $paged, $wp_query, $wp;
				$arags = array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'cat' => $betubeMagMainCat,
				);
				$count = 1;
				$itemClass = '';
				$wp_query = new WP_Query($arags);
				//print_r($wp_query);
				$totalPost = $wp_query->post_count;						
				while ($wp_query->have_posts()) : $wp_query->the_post();
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
					$beTubedateFormat = get_option( 'date_format' );
					if($count == 1){
						?>
						<div class="large-6 medium-6 columns">
							<figure class="betube_mag__item">
								<div class="betube_mag__item_img height height-280">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
										<?php echo $betubepostCatgory[0]->name; ?>
									</span>
									<span class="betube_mag__item_icon">
										<i class="<?php echo betube_post_format_display($post_ID); ?>"></i>
									</span>
									<a href="<?php the_permalink(); ?>" class="hover-posts">
									</a>
								</div>
								<figcaption>
									<h5>
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</h5>
									<p>
										<?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?> 
										<i class="fa fa-clock-o"></i>
										<?php $beTubedateFormat = get_option( 'date_format' );?>
										<?php echo get_the_date($beTubedateFormat, $post_ID); ?>
									</p>
									<p class="description_text">
										<?php echo get_the_excerpt(); ?>
									</p>
								</figcaption>
							</figure>
						</div>
						<?php
					}
					if($count == 2){
						echo '<div class="large-6 medium-6 columns">';
					}
					if($count != 1){
					?>
					<div class="Media align-top margin-bottom-10">
						<div class="Media-figure">
							<figure class="betube_mag__item margin-bottom-0">
								<div class="betube_mag__item_img margin-bottom-0 height height-100" style="width: 100px;">
									<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
									<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
									<a href="<?php the_permalink(); ?>" class="hover-posts">
									</a>
								</div>
							</figure>
						</div>
						<div class="Media-body">
							<span class="betube_mag__item_list_cat" style="background:<?php echo $betubeIconColor; ?>;">
								<?php echo $betubepostCatgory[0]->name; ?>
							</span>
							<h5 class="betube_mag__item_list_heading">
								<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							</h5>
							<p class="betube_mag__item_list_description"> <?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?>  <i class="fa fa-clock-o"></i> <?php echo get_the_date($beTubedateFormat, $post_ID); ?></p>
						</div>
					</div>
					<?php 
					}
					if($count == 5 || $count == $totalPost){
						echo '</div>';
						break;
					}
				?>
				<?php $count++; ?>						
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php wp_reset_query(); ?>
			</div>
		</div><!--Tabs-panel-->
		<?php 
		if($betubeMagMultiCategories):
		foreach($betubeMagMultiCategories as $catid){			
			betube_mag_tabber_content($catid);			
		}
		endif;
		?>
	</div><!--tabs-content-->
	
</section>