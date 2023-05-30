<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="row">
    <!-- Do the left sidebar check -->
    <main class="site-main" id="main">

        <section class="text-center bg navyblue-bg">
            <div class="container">
                <div class="default-content">
                    <h2 class="title-yellow"><?php the_title(); ?></h2>
                    <p class="title-white"><?php _e('Posted On: ','bizink'); the_date(); ?></p>
                </div>
            </div>
        </section>

        <section class="blog-content my-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php get_footer();
