<?php get_header(); ?>

    <section>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
                <article>
					<?php the_post(); ?>

                    <h2>
						<?php the_title(); ?>
                    </h2>
                </article>

			<?php endwhile; ?>
		<?php endif; ?>
    </section>

<?php get_footer(); ?>