<?php
/**
 * Template name: Edit Post
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage betube
 * @since betube 1.0
 */

if ( !is_user_logged_in() ) {
	wp_redirect( home_url() ); exit;
} else { 

}
$postContent = '';
global $current_user;
$query = new WP_Query(array('post_type' => 'post', 'posts_per_page' =>'-1') );
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	if(isset($_GET['post'])) {	
		if($_GET['post'] == $post->ID)
		{
			
			if($author != $userID) {
				wp_redirect( home_url() ); exit;
			}
			$title = get_the_title();
			$content = get_the_content();
			$posttags = get_the_tags($current_post);
			if ($posttags) {
			  foreach($posttags as $tag) {
				$tags_list = $tag->name . ' '; 
			  }
			}
			$postcategory = get_the_category( $current_post );
			$category_id = $postcategory[0]->cat_ID;
			$post_category_type = get_post_meta($post->ID, 'post_category_type', true);
			$betubeVideoLayout = get_post_meta($post->ID, 'jtheme_video_layout', true);
			$betubeVideoLink = get_post_meta($post->ID, 'jtheme_video_url', true);
			$betubeVideoLink2 = get_post_meta($post->ID, 'single_video_link_second', true);
			$betubeVideoLink3 = get_post_meta($post->ID, 'single_video_link_third', true);
			
			if ( has_post_thumbnail() ) {		
				$post_thumbnail = get_the_post_thumbnail($current_post, 'thumbnail');		
			} 
		}
	}

endwhile; endif;
wp_reset_query();
$postTitleError = '';
$post_priceError = '';
$catError = '';
if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
	if(trim($_POST['postTitle']) === '') {
		$postTitleError = 'Please enter a title.';
		$hasError = true;
	} else {
		$postTitle = trim($_POST['postTitle']);
	}
	if(trim($_POST['cat']) === '-1') {
		$catError = 'Please select a category.';
		$hasError = true;
	} 
	if($hasError != true) {
		if(is_super_admin() ){
			$beTubepostStatus = 'publish';
		}elseif(!is_super_admin()){		
			if($redux_demo['post-options-edit-on'] == 1){
				$beTubepostStatus = 'pending';
			}else{
				$beTubepostStatus = 'publish';
			}
		}
		$post_information = array(
			'ID' => $current_post,
			'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
			'post_content' => strip_tags($_POST['video-body'], '<a><h1><h2><h3><strong><b><ul><li><i><a>'),
			'post-type' => 'post',
			'post_category' => array($mCatID),
	        'tags_input'    => explode(',', $_POST['post_tags']),
	        'comment_status' => 'open',
	        'ping_status' => 'open',
			'post_status' => $beTubepostStatus
		);
		$post_id = wp_insert_post($post_information);
		update_post_meta($post_id, 'post_category_type', esc_attr( $_POST['post_category_type'] ) );
		update_post_meta($post_id, 'jtheme_video_layout', $betubeVideoLayout, $allowed);
		/*Duration*/
		$permalink = get_permalink( $post_id );		
		global $post;
		if (isset($_POST['att_remove'])) {
			foreach ($_POST['att_remove'] as $att_id){
				wp_delete_attachment($att_id);
			}
		}		
		wp_redirect( $permalink ); exit;
	}
} 

get_header();

<div class="row">
<?php get_footer(); ?>