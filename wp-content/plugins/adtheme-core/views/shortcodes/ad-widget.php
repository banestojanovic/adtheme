<?php
/**
 * Template: Shortcodes | Ad Widget
 *
 * @since 1.0.0
 * @var $ads
 */
?>
<?php if ( ! empty( $ads ) ) : ?>
	<section class="listings">

		<?php foreach ( $ads as $ad ) : ?>
			<article>
				<h3><?php echo esc_html( $ad->post_title ); ?></h3>
				<p><?php echo wp_kses_post( $ad->post_content ); ?></p>
			</article>
		<?php endforeach; ?>

	</section>
<?php endif; ?>
