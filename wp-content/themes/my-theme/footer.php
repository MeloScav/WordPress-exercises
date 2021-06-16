</div>
<footer>
    <?php
    wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto'
    ]);

    // the_widget(YoutubeWidget::class, ['title' => 'Salut', 'youtube' => 'OqUy7IOYt6g']);
    the_widget(YoutubeWidget::class, ['youtube' => 'OqUy7IOYt6g'], ['before_widget' => '', 'after_widget' => '']);
    ?>

    <div>
        <?= get_option('agency_schedule'); ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>