<main>
    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-5 mb-5">List of all Bank's</h1>
			<?php
			$args          = array(
				'post_type'      => array( 'banks' ),
				'post_status'    => 'publish',
				'posts_per_page' => '-1',
				'orderby'        => 'date',
			);
			$products_loop = new WP_Query( $args );
			if ( $products_loop->have_posts() ) :
				while ( $products_loop->have_posts() ) : $products_loop->the_post();
					$title       = get_the_title();
					$description = get_the_content();
					$rating      = get_field( 'bank_rating' );
					$capital     = get_field( 'capitalization' );
					$link        = get_field( 'link_for_the_bank' );
                    $link_to_bank= get_permalink();
					?>

                    <div class="col-12 col-md-4 mb-5 flex flex-column">
                        <h2><a href="<?=$link_to_bank?>"><?=$title?></a></h2>
                        <div class="bank_info">
                            <p><?=$rating?></p>
                            <p><?=$capital?></p>
                            <a href="<?=$link?>" target="_blank"> Go to the bank</a>
                        </div>
                    </div>

                <?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>

        </div>
    </div>
</main>

