<?php wp_enqueue_style( 'footer.min.css' ); ?>
<footer class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
