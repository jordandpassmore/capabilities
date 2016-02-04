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
    register_taxonomy(
            'service-category',
            'team_member',
            array(
                'label'             => 'Service Category',
                'rewrite'           => array( 'slug' => 'service-categories'),
                'hierarchical'      => true,
            )
    );
    
    /* Counties */
    register_taxonomy(
            'service-county',
            'team_member',
            array(
                'label'             => 'Service Counties',
                'rewrite'           => array( 'slug' => 'service-counties'),
                'hierarchical'      => false,
            )
    );
}

add_action( 'init', 'capability_custom_taxonomies');