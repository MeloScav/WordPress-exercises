<?php get_header(); ?>

<h1>Voir tous nos biens</h1>

<!-- Display articles -->
<?php
// Check if we have articles
if (have_posts()) :
?>
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part('parts/card', 'post') ?>
            </div>
        <?php endwhile; ?>
    </div>

    <?php mytheme_pagination(); ?>

<?php else : ?>
    <h1>Pas d'articles</h1>

<?php endif; ?>

<?php get_footer(); ?>