<?php get_header(); ?>

<?php if ( get_post_type() == 'post' ): ?>
	<?php get_template_part( 'loops/single-post', get_post_format() ); ?>
<?php else: ?>
	<?php if ( get_post_type() == 'banks' ): ?>
		<?php get_template_part( 'loops/banks', get_post_format() ); ?>
	<?php endif; ?>


<?php endif; ?>

<?php get_footer(); ?>
