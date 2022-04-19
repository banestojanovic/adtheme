<?php
namespace MyApp\Shortcodes;

use MyApp\Shortcodes\Ad\AdWidget;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

class ShortcodeServiceProvider implements ServiceProviderInterface {
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
		add_action( 'elementor/widgets/register', [ $this, 'registerWidgets' ] );
	}

	public function registerWidgets( $widgets ) {
		$widgets->register( new AdWidget() );
	}

}
