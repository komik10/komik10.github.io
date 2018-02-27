<?php 
$betubeIconColor = '';
global $redux_demo;
$betubeMagFavorite = $redux_demo['betube_mag_favorite_on'];
$betubeMagFavoriteCatsList = $redux_demo['betube_mag_favorite_cats_list'];
$betubeMagFavAdv = $redux_demo['betube_mag_favorite_adv'];
function beTube_mag_favorite_cats_content($favoriteCatID){
	?>
	<div class="large-6 medium-6 columns">
		<div class="Media Media--reverse borderBottom">
			<div class="Media-body">
				<div class="betube_mag__heading">
					<?php 
					$tag = $favoriteCatID;
					$betubeMagCatFields = get_option(BETUBE_CATEGORY_FIELDS);
					if (isset($betubeMagCatFields[$tag])) {
						$betubeIconCode = $betubeMagCatFields[$tag]['category_icon_code'];
						$betubeIconColor = $betubeMagCatFields[$tag]['category_icon_color'];
						$betubeCatIMG = $betubeMagCatFields[$tag]['category_image'];
					}
					?>
					<div class="betube_mag__heading_icon" style="background:<?php echo $betubeIconColor; ?>;">
						<i class="<?php echo $betubeIconCode; ?>"></i>
					</div>
					<div class="betube_mag__heading_head">
						<h3><?php echo get_cat_name($favoriteCatID) ?></h3>
						<?php echo category_description($favoriteCatID); ?>
					</div>
				</div>
			</div>
		</div>	
		<?php 
			global $paged, $wp_query, $wp, $post;
			$arags = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'cat' => $favoriteCatID,
			);
			$count = 1;
			$wp_query = new WP_Query($arags);
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
		?>
		<?php if($count == 1){?>
			<figure class="betube_mag__item">
				<div class="betube_mag__item_img height height-280">
					<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
					<span class="betube_mag__item_cat" style="background:<?php echo $betubeIconColor; ?>;">
						<?php echo $betubepostCatgory[0]->name; ?>
					</span>
					<span class="betube_mag__item_icon">
						<i class="<?php echo betube_post_format_display($post_ID); ?>"></i>
					</span>
					<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
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
		<?php }else{ ?>
			<div class="Media align-top margin-bottom-10">
				<div class="Media-figure">
					<figure class="betube_mag__item margin-bottom-0">
						<div class="betube_mag__item_img margin-bottom-0 height height-100" style="width: 100px;">
							<img src="<?php echo esc_url($thumbURL); ?>" alt="<?php echo $altTag; ?>"/>
							<span class="betube_mag__item_icon"><i class="<?php echo betube_post_format_display($post_ID); ?>"></i></span>
							<a href="<?php the_permalink(); ?>" class="hover-posts"></a>
						</div>
					</figure>
				</div>
				<div class="Media-body">
					<span class="betube_mag__item_list_cat" style="background:<?php echo $betubeIconColor; ?>;"><?php echo $betubepostCatgory[0]->name; ?></span>
					<h5 class="betube_mag__item_list_heading"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>				
					<p class="betube_mag__item_list_description"> <?php esc_html_e( 'BY', 'betube' ); ?> : <?php the_author_posts_link(); ?>  <i class="fa fa-clock-o"></i> <?php echo get_the_date($beTubedateFormat, $post_ID); ?></p>
				</div>
			</div>
		<?php } ?>
		<?php $count++; ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query();?>
	</div><!--large-6-->
	<?php
}
if($betubeMagFavorite == 1){	
?>
<section class="betube_mag content borderBottom">	
		<?php 
			$count = 1;
			foreach($betubeMagFavoriteCatsList as $favoriteCatID){
				if($count == 1){
					echo '<div class="row">';
				}
				echo beTube_mag_favorite_cats_content($favoriteCatID);
				if($count == 2){
					echo '</div>';
					$count = 0;
				}				
				$count++;
			}
		?>
</section>
<?php if(!empty($betubeMagFavAdv)){?>
<section class="betube_mag content advertisement text-center">
	<?php echo $betubeMagFavAdv; ?>
</section><!-- /.advertisement -->
<?php } ?>
<?php } ?>