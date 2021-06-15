<?php

class AgencyMenuPage
{

    const GROUP = 'agency_options';

    public static function register()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    public static function registerScripts($suffix)
    {
        if ($suffix === 'settings_page_agency_options') {
            wp_register_style(
                'flatpickr',
                'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css',
                [],
                false
            );
            wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true);
            wp_enqueue_script(
                'mytheme_admin',
                get_template_directory_uri() . '/assets/admin.js',
                ['flatpickr'],
                false,
                true
            );
            wp_enqueue_style('flatpickr');
        }
    }

    public static function registerSettings()
    {
        register_setting(self::GROUP, 'agency_schedule');
        register_setting(self::GROUP, 'agency_date');
        add_settings_section('agency_options_section', 'Paramètres', function () {
            echo "Vous pouvez ici gérer les paramètres liés à l'agence immobilière";
        }, self::GROUP);
        add_settings_field('agency_options_schedule', "Horaire d'ouverture", function () {
?>
            <textarea name="agency_schedule" cols="30" rows="10" style="width:100%">
            <?= esc_html(get_option('agency_schedule')); ?>
            </textarea>
        <?php
        }, self::GROUP, 'agency_options_section');

        add_settings_field('agency_options_date', "Date d'ouverture", function () {
        ?>
            <input class="mytheme_datepicker" name="agency_date" cols="30" rows="10" value="<?= esc_attr(get_option('agency_date')); ?>">
        <?php
        }, self::GROUP, 'agency_options_section');
    }

    public static function addMenu()
    {
        add_options_page(
            "Gestion de l'agence",
            "Agence",
            "manage_options",
            self::GROUP,
            [self::class, 'render']
        );
    }

    public static function render()
    {
        ?>
        <h1>Gestion de l'agence</h1>

        <form action="options.php" method="post">
            <?php
            settings_fields(self::GROUP);
            do_settings_sections(self::GROUP);
            submit_button();
            ?>
        </form>
<?php
    }
}
