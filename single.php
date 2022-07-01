<?php
get_header();

if(have_posts()){
    while(have_posts()){
        the_post();
    }
}

get_template_part( 'template-parts/content', 'features' );
?>

<div class="container">
    <div class="row">
        <div class="blog-column">
            <h2 class="blog-heading"><?php the_title(); ?></h2>
            <div class="single-blog-details">
                <span class="single-blog-post-details">by <?php the_author(); ?></a> on <?php the_date(); ?></span>
                <span class="single-blog-post-details single-blog-post-comments"><?php comments_number(); ?></span>
            </div>
            <hr style="height: 1px; background-color: #62585f;">
            <p class="single-blog-post-text"><?php the_content(); ?></p>
            <hr style="height: 1px; background-color: #62585f;">
            <?php comments_template() ?>
        </div>
        <?php get_template_part('template-parts/content','sidebar'); ?>
    </div>
</div>

<?php get_footer(); ?>
