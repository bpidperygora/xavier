<?php
/*
All the functions are in the PHP files in the `functions/` folder.
*/

if ( ! defined('ABSPATH') ) {
  exit;
}
require get_template_directory() . '/functions/cleanup.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/acf.php';
require get_template_directory() . '/functions/custom-post-type.php';
require get_template_directory() . '/functions/widgets.php';
require get_template_directory() . '/functions/custom-widget.php';
