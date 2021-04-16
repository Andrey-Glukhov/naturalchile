<?php
/**
*Template Name: Home Page
*/
get_header(); ?>

<?php


 if (have_posts() ) : while ( have_posts() ) : he_post(); ?>
<div class="container-fluid home-container">

        <?php the_content(); ?>
   
</div>

</div>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

