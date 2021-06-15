</div>
<footer>
    <?php
    wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto'
    ])
    ?>

    <div>
        <?= get_option('agency_schedule'); ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>