<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

    <main>

    </main>

<?php
endwhile;
else :
	get_template_part( '404' );
endif;
?>
<?php get_footer(); ?>
