<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

    <main>
        <div class="container">
            <div class="row mh-100-vh align-content-center">
                <div class="col-12 text-align-center">
	                <?=get_the_content()?>
                </div>
            </div>
        </div>
    </main>

<?php
endwhile;
else :
	get_template_part( '404' );
endif;
?>
<?php get_footer(); ?>
