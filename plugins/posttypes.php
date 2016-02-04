<?php
/**
 *  Plugin Name: Capability Custom Post Types
 *  Description: A plugin that adds custom post types and taxonomies
 *  Version: 0.1
 *  Author: Jordan Passmore
 *  License: GPL2
 * 
 * Copyright 2015-2016 Jordan Passmore
 * 
 * Capability Custom Post Types is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *  
 * Capability Custom Post Types is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *  
 */

function capability_custom_posttypes() {
     $labels = array(
        'name'               => 'Team Members',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Team Members',
        'name_admin_bar'     => 'Team Member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team Member',
        'new_item'           => 'New Team Member',
        'edit_item'          => 'Edit Team Member',
        'view_item'          => 'View Team Member',
        'all_items'          => 'All Team Members',
        'search_items'       => 'Search Team Members',
        'parent_item_colon'  => 'Parent Team Members:',
        'not_found'          => 'No team members found.',
        'not_found_in_trash' => 'No team members found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team_members' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'thumbnail', 'custom-fields' )
    );
    register_post_type( 'team_member', $args );
}

add_action( 'init', 'capability_custom_posttypes' );

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    capability_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

/* Taxonomies for Capabilities */

function capability_custom_taxonomies() {
    
    /* Service Category */
    $service_category_labels = array(
        'name'              => 'Service Categories',
        'singular_name'     => 'Service Category',
        'search_items'      => 'Search Service Categories',
        'all_items'         => 'All Service Categories',
        'parent_item'       => 'Parent Service Category',
        'parent_item_colon' => 'Parent Service Category:',
        'edit_item'         => 'Edit Service Category',
        'update_item'       => 'Update Service Category',
        'add_new_item'      => 'Add New Service Category',
        'new_item_name'     => 'New Service Category Name',
        'menu_name'         => 'Service Categories',
    );
    
    $service_category_args = array(
        'labels'            => $service_category_labels,
        'rewrite'           => array( 'slug' => 'service-categories'),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    
    register_taxonomy( 'service-category', array( 'team_member' ), $service_category_args );
    
    /* Counties */
    
    $service_county_labels = array(
        'name'                       => 'Service Counties',
        'singular_name'              => 'Service County',
        'search_items'               => 'Search Service Counties',
        'popular_items'              => 'Popular Service Counties',
        'all_items'                  => 'All Service Counties',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Service County',
        'update_item'                => 'Update Service County',
        'add_new_item'               => 'Add New Service County',
        'new_item_name'              => 'New Service County Name',
        'separate_items_with_commas' => 'Separate service counties with commas',
        'add_or_remove_items'        => 'Add or remove service counties',
        'choose_from_most_used'      => 'Choose from the most used service counties',
        'not_found'                  => 'No service counties found.',
        'menu_name'                  => 'Service Counties',
    );

    $service_county_args = array(
        'hierarchical'          => false,
        'labels'                => $service_county_labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'service-counties' ),
    );

    register_taxonomy( 'service-county', array( 'team_member' ), $service_county_args );
}

add_action( 'init', 'capability_custom_taxonomies');