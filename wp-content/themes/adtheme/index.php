<?php get_header(); ?>

    <section>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ): ?>
				<?php the_post(); ?>

                <article>
					<?php the_title(); ?>
                </article>

			<?php endwhile; ?>
		<?php endif; ?>
    </section>

<?php get_footer(); ?>