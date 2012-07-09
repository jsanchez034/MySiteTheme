<?php  
  
    function fun_stuff_post_type() {  
		$labels = array(
			'name' => __( 'Fun Stuff'),
			'singular_name' => __('Fun Stuff'),
			'rewrite' => array(
				'slug' => __( 'fun-stuff' )
			),
			'add_new' => _x('Add Item', 'fun'),
			'edit_item' => __('Edit Fun Stuff Item'),
			'new_item' => __('New Fun Stuff Item'),
			'view_item' => __('View Fun Stuff'),
			'search_items' => __('Search Fun Stuff'),
			'not_found' =>  __('No Fun Stuff Items Found'),
			'not_found_in_trash' => __('No Fun Stuff Items Found In Trash'),
			'parent_item_colon' => ''
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt'
			)
		);
		
		register_post_type(__( 'fun-stuff' ), $args);
		
    }
		
	function fun_stuff_messages($messages)
	{
		$messages[__( 'fun-stuff' )] =
			array(
				0 => '',
				1 => sprintf(('Fun Stuff Updated. <a href="%s">View Fun Stuff</a>'), esc_url(get_permalink($post_ID))),
				2 => __('Custom Field Updated.'),
				3 => __('Custom Field Deleted.'),
				4 => __('Fun Stuff Updated.'),
				5 => isset($_GET['revision']) ? sprintf( __('Fun Stuff Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
				6 => sprintf(__('Fun Stuff Published. <a href="%s">View Fun Stuff</a>'), esc_url(get_permalink($post_ID))),
				7 => __('Fun Stuff Saved.'),
				8 => sprintf(__('Fun Stuff Submitted. <a target="_blank" href="%s">Preview Fun Stuff</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
				9 => sprintf(__('Fun Stuff Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Fun Stuff</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
				10 => sprintf(__(' Draft Updated. <a target="_blank" href="%s">Preview Fun Stuff</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
			);
		return $messages;

	}
	
	function fun_stuff_filter() {
		register_taxonomy(
			__( "fun-filter" ),
			array(__( "fun-stuff" )),
			array(
				"hierarchical" => true,
				"label" => __( "Filter" ),
				"singular_label" => __( "Filter" ),
				"rewrite" => array(
					'slug' => 'filter',
					'hierarchical' => true
				)
			)
		);
	
	}
	
	
	add_action( 'init', 'fun_stuff_post_type' );
	add_action( 'init', 'fun_stuff_filter', 0 );
	add_filter( 'post_updated_messages', 'fun_stuff_messages' );

	
?>