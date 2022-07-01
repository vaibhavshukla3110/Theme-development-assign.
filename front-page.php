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
    get_template_part( 'template-parts/content', 'features' );
?>

<!-- Gallery section -->
<section class="gallery">
    <div class="container">
        <div class="gallery-title-area">
            <h2>D'SIGN IN THE SOUL</h2>
            <button onclick="designfly_goto_portfolio()" class="gallery-view-all">View all</button>
        </div>
        <hr>
        <?php get_template_part('template-parts/content','portfolio'); ?>
        <hr>
    </div>
</section>

<script type="text/javascript">
    const designfly_goto_portfolio = () => window.location.href = '<?php echo get_site_url(); ?>/portfolio';
</script>

<?php get_footer(); ?>
