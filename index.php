<?php

namespace own_parent;

/*
*	
*	@param array
*	@param array
*	@return array
*/
function get_pages( $pages, $r ){
	$page = get_post( $r['post_id'] );
	$page->post_title = '(self)';

	array_unshift( $pages, $page );
	
	return $pages;
}
add_filter( 'get_pages', __NAMESPACE__.'\get_pages', 10, 2 );

/*
*
*	@param array
*	@param WP_Post
*	@return
*/
function page_attributes_dropdown_pages_args( $dropdown_args, \WP_Post $post ){
	// these are both strings
	$dropdown_args['post_id'] = (int) $post->ID;
	
	return $dropdown_args;
}
add_filter( 'page_attributes_dropdown_pages_args', __NAMESPACE__.'\page_attributes_dropdown_pages_args', 10, 2 );

/*
*
*	@param int
*	@param int
*	@return int
*/
function wp_insert_post_parent( $post_parent, $post_id ){
	if( $post_parent == $post_id )
		remove_filter( 'wp_insert_post_parent', 'wp_check_post_hierarchy_for_loops', 10, 2 );
		
	return $post_parent;
}
add_filter( 'wp_insert_post_parent', __NAMESPACE__.'\wp_insert_post_parent', 9, 2 );