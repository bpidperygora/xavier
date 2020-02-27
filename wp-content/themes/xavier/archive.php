<?php
get_header();
?>

 <?php if ( get_post_type() == 'banks' ): ?>
	<?php get_template_part( 'archives/banks', get_post_format() ); ?>
 <?php endif; ?>


<?php
get_footer();
?>