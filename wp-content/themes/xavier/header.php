<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="version" content="1.0.0"/>
    <meta name="language" content="<?php language_attributes(); ?>"/>
    	<?php if ( have_rows( 'head_scripts', 'options' ) ) :
			$i = 1;
			while ( have_rows( 'head_scripts', 'options' ) ) : the_row(); ?>
				<?php if ( get_sub_field( 'enable_disable' ) ): ?>
    				<?php echo get_sub_field( 'head_script' ) ?>
    			<?php endif; ?>
    			<?php $i ++; endwhile; ?>
    	<?php endif; ?>
	<?php wp_head(); ?>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, user-scalable=0, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible"/>
    <meta name="theme-color" content="#243E95"/>
    <meta name="msapplication-navbutton-color" content="#243E95"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#243E95"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!--    <link rel="icon" type="image/png" href="/favicon/favicon-32x32.png" sizes="32x32">-->
    <!--    <link rel="icon" type="image/png" href="/favicon/favicon-16x16.png" sizes="16x16">-->
</head>

<body <?php body_class(); ?>>

