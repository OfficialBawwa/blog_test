<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogar
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$axil_options = Helper::axil_get_options();
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
if ($axil_options['axil_preloader'] !== 'no'){
    get_template_part('template-parts/header/preloader');
}
?>
<div class="main-content">
<?php get_template_part('template-parts/header/header', 'main');