<?php

namespace MyApp\CarbonFields;

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provides Carbon Fields integration.
 */
class CarbonFieldsServiceProvider implements ServiceProviderInterface {
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
		add_action( 'after_setup_theme', [ $this, 'bootstrapCarbonFields' ], 100 );
		add_filter( 'carbon_fields_map_field_api_key', [ $this, 'filterCarbonFieldsGoogleMapsKey' ] );
		add_action( 'carbon_fields_register_fields', [ $this, 'registerFields' ] );
		add_action( 'widgets_init', [ $this, 'registerWidgets' ] );
	}

	/**
	 * Bootstrap Carbon Fields.
	 *
	 * @return void
	 */
	public function bootstrapCarbonFields() {
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * Filter the Google Maps API key Carbon Fields use.
	 *
	 * @return string
	 */
	public function filterCarbonFieldsGoogleMapsKey() {
		return carbon_get_theme_option( 'crb_google_maps_api_key' );
	}

	/**
	 * Register Carbon Fields fields.
	 *
	 * @return void
	 */
	public function registerFields() {
		$this->registerThemeOptions();
		$this->registerPostMeta();
		$this->registerTermMeta();
		$this->registerUserMeta();

		// ad post meta.
		$this->registerAdMeta();
	}

	protected function registerAdMeta() {
		Container::make( 'post_meta', __( 'Ad Information', 'adtheme-core' ) )
		         ->where( 'post_type', '=', 'ad' )
		         ->add_fields( [
					 Field::make( 'text', 'ad-subtitle', esc_html__( 'Ad Subtitle', 'adtheme-core' ) )
		         ] );
	}

	/**
	 * Register Theme Options fields.
	 *
	 * @return void
	 */
	protected function registerThemeOptions() {
		Container::make( 'theme_options', __( 'Theme Options', 'adtheme-core' ) )
		         ->set_page_file( 'my_app-theme-options.php' )
		         ->add_fields( array(
			         Field::make( 'text', 'ad-slug', __( 'Ad Slug', 'adtheme-core' ) )
			         ->set_default_value( 'ad' ),
		         ) );
	}

	/**
	 * Register Post Meta fields.
	 *
	 * @return void
	 */
	protected function registerPostMeta() {
		Container::make( 'post_meta', __( 'Custom Data', 'adtheme-core' ) )
		         ->where( 'post_type', '=', 'page' )
		         ->add_fields( array() );
	}

	/**
	 * Register Term Meta fields.
	 *
	 * @return void
	 */
	protected function registerTermMeta() {
		/*
		Container::make( 'term_meta', __( 'Custom Data', 'my_app' ) )
			->where( 'term_taxonomy', '=', 'category' )
			->add_fields( array(
				Field::make( 'image', 'crb_img' ),
			));
		*/
	}

	/**
	 * Register User Meta fields.
	 *
	 * @return void
	 */
	protected function registerUserMeta() {
		/*
		Container::make( 'user_meta', __( 'Custom Data', 'my_app' ) )
			->add_fields( array(
				Field::make( 'image', 'crb_img' ),
			));
		*/
	}

	/**
	 * Register Widgets.
	 *
	 * @return void
	 */
	public function registerWidgets() {
		register_widget( \MyApp\Widgets\Carbon_Rich_Text_Widget::class );
	}
}
