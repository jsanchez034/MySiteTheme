<?php  
  
    function post_type() {  
		$labels = array(
			'name' => __( 'Work'),
			'singular_name' => __('Work'),
			'rewrite' => array(
				'slug' => __( 'work' )
			),
			'add_new' => _x('Add Item', 'work'),
			'edit_item' => __('Edit Work Item'),
			'new_item' => __('New Work Item'),
			'view_item' => __('View Work'),
			'search_items' => __('Search Work'),
			'not_found' =>  __('No Work Items Found'),
			'not_found_in_trash' => __('No Work Items Found In Trash'),
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
		
		register_post_type(__( 'work' ), $args);
		
    }
		
	function work_messages($messages)
	{
		$messages[__( 'work' )] =
			array(
				0 => '',
				1 => sprintf(('Work Updated. <a href="%s">View Work</a>'), esc_url(get_permalink($post_ID))),
				2 => __('Custom Field Updated.'),
				3 => __('Custom Field Deleted.'),
				4 => __('Work Updated.'),
				5 => isset($_GET['revision']) ? sprintf( __('Work Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
				6 => sprintf(__('Work Published. <a href="%s">View Work</a>'), esc_url(get_permalink($post_ID))),
				7 => __('Work Saved.'),
				8 => sprintf(__('Work Submitted. <a target="_blank" href="%s">Preview Work</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
				9 => sprintf(__('Work Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Work</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
				10 => sprintf(__('Work Draft Updated. <a target="_blank" href="%s">Preview Work</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
			);
		return $messages;

	}
	
	function work_filter() {
		register_taxonomy(
			__( "filter" ),
			array(__( "work" )),
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
	
	
	add_action( 'init', 'post_type' );
	add_action( 'init', 'work_filter', 0 );
	add_filter( 'post_updated_messages', 'work_messages' );

	
?>