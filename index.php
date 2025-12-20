<?php

/**
 * Main template file
 * 
 * @package TestT3
 */
get_header();
?>


<div class="container mx-auto min-h-screen">

    <?php get_template_part('src/components/hero'); ?>
    <?php get_template_part('src/components/home'); ?>
</div>

<?php get_footer();
