<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register widgets and sidebars.
 */
class ContentTypesServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		add_action( 'init', [ $this, 'registerPostTypes' ] );
		add_action( 'init', [ $this, 'registerTaxonomies' ] );
	}

	/**
	 * Register post types.
	 *
	 * @return void
	 */
	public function registerPostTypes() {
		// phpcs:disable
		$labels = [
			'name'                  => _x( 'Ads', 'Post type general name', 'adtheme-core' ),
			'singular_name'         => _x( 'Ad', 'Post type singular name', 'adtheme-core' ),
			'menu_name'             => _x( 'Ads', 'Admin Menu text', 'adtheme-core' ),
			'name_admin_bar'        => _x( 'Ad', 'Add New on Toolbar', 'adtheme-core' ),
			'add_new'               => __( 'Add New', 'adtheme-core' ),
			'add_new_item'          => __( 'Add New Ad', 'adtheme-core' ),
			'new_item'              => __( 'New Ad', 'adtheme-core' ),
			'edit_item'             => __( 'Edit Ad', 'adtheme-core' ),
			'view_item'             => __( 'View Ad', 'adtheme-core' ),
			'all_items'             => __( 'All Ads', 'adtheme-core' ),
			'search_items'          => __( 'Search Ads', 'adtheme-core' ),
			'parent_item_colon'     => __( 'Parent Ads:', 'adtheme-core' ),
			'not_found'             => __( 'No ads found.', 'adtheme-core' ),
			'not_found_in_trash'    => __( 'No ads found in Trash.', 'adtheme-core' ),
			'featured_image'        => _x( 'Ad Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'adtheme-core' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'adtheme-core' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'adtheme-core' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'adtheme-core' ),
			'archives'              => _x( 'Ad archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'adtheme-core' ),
			'insert_into_item'      => _x( 'Insert into book', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'adtheme-core' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'adtheme-core' ),
			'filter_items_list'     => _x( 'Filter ads list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'adtheme-core' ),
			'items_list_navigation' => _x( 'Ads list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'adtheme-core' ),
			'items_list'            => _x( 'Ads list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'adtheme-core' ),
		];

		$labels = apply_filters( 'adtheme_ad_post_type_labels', $labels );

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => carbon_get_theme_option( 'ad-slug' ) ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'comments' ],
		);

		$args = apply_filters( 'adtheme_ad_post_type_args', $args );
		register_post_type( 'ad', $args );
		// phpcs:enable
	}

	/**
	 * Register taxonomies.
	 *
	 * @return void
	 */
	public function registerTaxonomies() {
		// phpcs:disable
		$labels = [
			'name'              => _x( 'Category', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Category', 'textdomain' ),
			'all_items'         => __( 'All Category', 'textdomain' ),
			'parent_item'       => __( 'Parent Category', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
			'edit_item'         => __( 'Edit Category', 'textdomain' ),
			'update_item'       => __( 'Update Category', 'textdomain' ),
			'add_new_item'      => __( 'Add New Category', 'textdomain' ),
			'new_item_name'     => __( 'New Category Name', 'textdomain' ),
			'menu_name'         => __( 'Category', 'textdomain' ),
		];

		$labels = apply_filters( 'adtheme_ad_taxonomy_category_labels', $labels );

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => carbon_get_theme_option( 'ad-category-slug' ) ],
		];

		$args = apply_filters( 'adtheme_ad_taxonomy_category_args', $args );

		register_taxonomy( 'ad-category', [ 'ad' ], $args );

		$labels = [
			'name'              => _x( 'Location', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Locations', 'textdomain' ),
			'all_items'         => __( 'All Locations', 'textdomain' ),
			'parent_item'       => __( 'Parent Location', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Location:', 'textdomain' ),
			'edit_item'         => __( 'Edit Location', 'textdomain' ),
			'update_item'       => __( 'Update Location', 'textdomain' ),
			'add_new_item'      => __( 'Add New Location', 'textdomain' ),
			'new_item_name'     => __( 'New Location Name', 'textdomain' ),
			'menu_name'         => __( 'Location', 'textdomain' ),
		];

		$labels = apply_filters( 'adtheme_ad_location_category_labels', $labels );

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'location' ],
		];

		$args = apply_filters( 'adtheme_ad_location_category_args', $args );

		register_taxonomy( 'ad-location', [ 'ad' ], $args );
		// phpcs:enable
	}
}
