<main>
    <div class="container">
        <div class="row flex-row">
            <h1 class="col-12 mt-5 mb-5"><?=get_the_title()?></h1>
            <div class="col-12 bank_info flex align-items-center justify-content-between mb-5">
                <p>Raring: <?=get_field('bank_rating')?></p>
                <p>Capitalization: <?=get_field('capitalization')?></p>
                <a href="<?=$link?>" target="_blank"> Go to the bank</a>
            </div>
            <div class="col-12 col-md-8">
                <?php
                global $post;
                $content = $post->post_content;
                echo $content
                ?>
            </div>
            <div class="col-12 col-md-4">
                <?=get_sidebar()?>
            </div>
        </div>
    </div>
</main>