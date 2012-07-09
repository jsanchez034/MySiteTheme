<?php

// Custom functions 

include("work-post-types.php"); 
include("funstuff-post-types.php"); 

// Add meta box for glyph selection for page menu items
add_action('admin_init','glyph_box_init');

// meta box functions for adding the meta box and saving the data
function glyph_box_init() {
	// create our custom meta box
	add_meta_box('glyph-meta',__('Menu Glypgh','roots'), 'glyph_meta_box','page','side','default');
	// hook to save our meta box data when the post is saved
	add_action('save_post','glyph_save_meta_box');

}

function glyph_meta_box($post,$box) {
	//retrieve the saved glyph
	$theglyph = get_post_meta($post->ID,'_glyhp_icon',true);

	//custom meta box form for glyph
	echo '<p>' . __('Menu Glyph Icon','roots') . '</p>' . '<input type="text" name="glyhp_icon" value="'.esc_attr($theglyph).'" size="25" />';
}

function glyph_save_meta_box($post_id) {
	//check if revision don't save
	if ( !wp_is_post_revision( $post_id ) ) {
		//process form data if $_POST is set
		if(isset($_POST['glyhp_icon'])) {
			update_post_meta($post_id,'_glyhp_icon', esc_attr($_POST['glyhp_icon']));
		
		}
	}
}

//Work Custom Post Type Func.
if ( function_exists( 'add_theme_support' ) )
{
	add_theme_support(  'post-thumbnails' );
	set_post_thumbnail_size( 56, 56, true );
}

add_image_size( 'work', 300, 169, true ); 
add_image_size( 'fun-stuff', 300, 169, true ); 

// Work Page -- Register our scripts
function register_js()
{
	if ( !is_admin() )
	{
		wp_register_script( 'quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js', 'jquery' );
		wp_register_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery' );

		wp_enqueue_script( 'quicksand' );
		wp_enqueue_script( 'easing' );
	}
}

add_action('init', 'register_js');  

?>