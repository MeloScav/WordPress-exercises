<?php get_header(); ?>
<!-- Display articles -->
<?php
// Check if we have articles
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <h1><?php the_title() ?></h1>

        <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') : ?>
            <div class="alert alert-info">
                Cet article est sponsorisé.
            </div>
        <?php endif ?>

        <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width: 100%; height:auto;">

        <?php the_content() ?>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>