<?php

class YoutubeWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('youtube_widget', 'Youtube Widget');
    }

    // Display the content of widget
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $youtube = $instance['youtube'] ?? '';
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . esc_attr($youtube) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>';
        echo $args['after_widget'];
    }

    // Generating the form
    public function form($instance)
    {
        $title = $instance['title'] ?? '';
        $youtube = $instance['youtube'] ?? '';
        // $title = isset($instance['title']) ? $instance['title'] : '';
?>

        <p>
            <label for="<?= $this->get_field_id('title'); ?>">Titre :</label>
            <input class="widefat" type="text" name="<?= $this->get_field_name('title'); ?>" value="<?= esc_attr($title); ?>" id="<?= $this->get_field_id('title'); ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('youtube'); ?>">Id Youtube :</label>
            <input class="widefat" type="text" name="<?= $this->get_field_name('youtube'); ?>" value="<?= esc_attr($youtube); ?>" id="<?= $this->get_field_id('youtube'); ?>">
        </p>

<?php
    }

    // Update database information
    public function update($newInstance, $oldInstance)
    {
        return $newInstance;
    }
}
