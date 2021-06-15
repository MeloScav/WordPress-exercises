<?php get_header(); ?>


<form>
    <div class="form-row align-items-center">
        <div class="col-auto">
            <input type="search" name="s" class="form-control mb-2" value="<?= get_search_query(); ?>" placeholder="Votre recherche">
        </div>
        <div class="col-auto">
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="sponso" value="1" id="autoSizingCheck" <?= checked('1', get_query_var('sponso')); ?>>
                <label class="form-check-label" for="autoSizingCheck">
                    Articles sponsorisés seulement
                </label>
            </div>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
        </div>
    </div>
</form>


<h1 class="mb-4">Résultat pour votre recherche "<?= get_search_query(); ?>"</h1>

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