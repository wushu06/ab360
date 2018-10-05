<!-- page -->
<?php
// Page
get_header(); ?>

        <?php

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        get_page_structure( 'blocks' );



    }
}
?>

<?php

get_footer();