<?php
/**
*Template Name: About Page
*/
get_header(); ?>

<?php


 if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container-fluid home-container">
<div class="row container-row">
    <div class="side-column-left col-1" >
        <div class="grid-cell-left-1 bg_color_red" ></div>
        <div class="grid-cell-left-2 bg_color_white" ></div>
        <div class="grid-cell-left-3 bg_color_black"></div>
        <div class="grid-cell-left-4 bg_color_rose"></div>
        <div class="grid-cell-left-5 bg_color_white"></div>
        <div class="grid-cell-left-6 bg_color_green"></div>
        <div class="grid-cell-left-7 bg_color_rose"></div>
        <div class="grid-cell-left-8 bg_color_red"></div>
        <div class="grid-cell-left-9 bg_color_white"></div>
        <div class="grid-cell-left-10 bg_color_rose last"></div>        
    </div>
    <div class="content-column col-10">
        <?php the_content(); ?>
    </div>
    <div class="side-column-right col-1">
    <div class="grid-cell-right-1 bg_color_rose"></div>
    <div class="grid-cell-right-2 bg_color_blue"></div>
    <div class="grid-cell-right-3 bg_color_rose"></div>
    <div class="grid-cell-right-4 bg_color_green"></div>
    <div class="grid-cell-right-5 bg_color_red"></div>
    <div class="grid-cell-right-6 bg_color_rose"></div>
    <div class="grid-cell-right-7 bg_color_white"></div>
    <div class="grid-cell-right-8 bg_color_blue last"></div>
    </div>
</div>

</div>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>