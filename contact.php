<?php
/**
*Template Name: Contact Page
*/
get_header(); ?>
<?php $q_home = new WP_Query( array( 'page_id' => 10 ) );

if ($q_home -> have_posts() ) : while ( $q_home -> have_posts() ) : $q_home -> the_post(); ?>

<div class="container-fluid home-container">
    <div class="row">
        <div class="col-12">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-1 col-1">

        </div>
        <div class="col-md-8 col-sm-10 col-10 contact_formcol">
            <?php the_content(); ?>
        </div>
        <div class="col-md-2 col-sm-1 col-1">

        </div>
    </div>



</div>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>