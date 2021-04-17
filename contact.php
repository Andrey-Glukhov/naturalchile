<?php
/**
*Template Name: Contact Page
*/
get_header(); ?>

<?php $q_home = new WP_Query( array( 'page_id' => 10 ) );

if ($q_home -> have_posts() ) : while ( $q_home -> have_posts() ) : $q_home -> the_post(); ?>

<div class="container-fluid home-container">
    <div class="row">
        <div class="col-12 page_title">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-1 col-1 contact-grid-left">
        <div class="contact-cell-left-1 bg_color_black" ></div>
        <div class="contact-cell-left-2 bg_color_red" ></div>
        <div class="contact-cell-left-3 bg_color_white"></div>
        <div class="contact-cell-left-4 bg_color_rose"></div>
        <div class="contact-cell-left-5 bg_color_green"></div>
        <div class="contact-cell-left-6 bg_color_blue"></div>
        <div class="contact-cell-left-7 bg_color_black"></div>
        </div>
        <div class="col-md-8 col-sm-10 col-10 contact_formcol">
            <?php the_content(); ?>
        </div>
        <div class="col-md-2 col-sm-1 col-1 contact-grid-right">
        <div class="contact-cell-right-1 bg_color_white" ></div>
        <div class="contact-cell-right-2 bg_color_blue" ></div>
        <div class="contact-cell-right-3 g_color_green"></div>
        <div class="contact-cell-right-4 g_color_green"></div>
        <div class="contact-cell-right-5 bg_color_rose"></div>
        <div class="contact-cell-right-6 bg_color_red"></div>
        <div class="contact-cell-right-7 bg_color_black"></div>

        </div>
    </div>



</div>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>