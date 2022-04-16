<?php get_header(); ?>

<?php the_title(); ?>

<?php the_content(); ?>

<?php $post = get_post( 17 ); ?>
<?php dump( $post );?>


<?php get_footer(); ?>
