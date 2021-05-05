<?php get_header(); ?>
<h1>Bonjour tout le monde</h1>
<?php
// wp_title();
?>

<!-- Display articles -->
<?php
// Check if we have articles
if (have_posts()) :
?>
    <ul>
        <?php while (have_posts()) : the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
                -
                <?php the_author(); ?>
            </li>
        <?php endwhile ?>
    </ul>

<?php else : ?>
    <h2>Pas d'articles</h2>

<?php endif; ?>

<?php get_footer(); ?>