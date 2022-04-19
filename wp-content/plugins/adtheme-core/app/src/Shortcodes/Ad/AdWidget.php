<?php

namespace MyApp\Shortcodes\Ad;

use Elementor\Widget_Base;

class AdWidget extends Widget_Base {

	public function get_name() {
		return 'adtheme--ad-widget';
	}

	public function get_title() {
		return esc_html__( 'Ad Widget', 'adtheme' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'oembed', 'url', 'link' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'feed_section',
			[
				'label' => esc_html__( 'Feed', 'elementor-oembed-widget' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Posts per page', 'elementor-oembed-widget' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'default'     => 10,
				'placeholder' => 10,
			]
		);

		$this->add_control(
			'category',
			[
				'label'   => esc_html__( 'Choose Category', 'elementor-oembed-widget' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Not Set', 'adtheme-core' ),
					4  => __( 'Phones', 'adtheme-core' ),
					8  => __( 'Nekretnine', 'adtheme-core' ),
					6  => __( 'Vehicles', 'adtheme-core' ),
				],
				'default' => '',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$args = [
			'post_type'      => 'ad',
			'posts_per_page' => $settings['posts_per_page'] ?? 10,
		];

		if ( ! empty( $settings['category'] ) ) {
			$args['tax_query'][] = [
				'taxonomy' => 'ad-category',
				'terms'    => $settings['category'],
				'field'    => 'term_id',
			];
		}

		$ads = get_posts( $args );

		$params = [
			'ads' => $ads,
		];

		\MyApp::render( 'shortcodes/ad-widget', $params );
	}

}
