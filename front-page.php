<?php
/**
 * To display homepage
 *
 * @package none
 */

get_header();
?>

<section class="banner">
    <div class="banner-content">
        <span>
            <h1 class="banner-title">Gearing up the ideas</h1>
            <p class="banner-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus alias, illo tempora recusandae consequatur molestias quis cumque iure, repudiandae earum, asperiores perspiciatis officia mollitia.</p>
        </span>
    </div>
</section>

<?php
    get_template_part( 'content', 'features' );
?>

<!-- Gallery section -->
<section class="gallery">
    <div class="container">
        <div class="gallery-title-area">
            <h1>D'SIGN IN THE SOUL</h1>
            <button onclick="designfly__goto__portfolio" class="gallery-view-all">View all</button>
        </div>
        <hr>
        <div class="photo-gallery">
            <?php

            if( is_front_page()){

                $portfolio_query_options = array(
                    'post_type'   => 'portfolio',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                );

                $portfolio_query = new WP_Query( $portfolio_query_options );
                    if($portfolio_query->have_posts(  )){
                        while ( $portfolio_query->have_posts()) {
                            $portfolio_query->the_post();
            ?>
                    <div>
                        <a href="<?php the_permalink(); ?>">
                            <img class="gallery-image" src="<?php the_post_thumbnail_url(); ?>" alt="portfolio-thumbnail">
                        </a>
                    </div>
            <?php
                        }
                    }
                }
            else {

                if( have_posts() ){
                    while( have_posts()){
                        the_post();
            ?>
                    <div>
                        <a href="<php the_permalink(); ?>">
                            <img class="gallery_img" src="<?php the_post_thumbnail_url() ?>" alt="portfolio-thumbnail">
                        </a>
                    </div>
            <?php
                    }
                }
            }    
            ?>
        </div>
        <hr>
    </div>
</section>



<?php get_footer(); ?>
