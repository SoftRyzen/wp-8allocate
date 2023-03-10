<?php

add_action('after_setup_theme', 'rb_child_theme_setup');
function rb_child_theme_setup()
{
    load_child_theme_textdomain('setech', get_stylesheet_directory() . '/languages');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 11);
function my_theme_enqueue_styles()
{
    wp_enqueue_style('child-style', get_stylesheet_uri());
}

function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

add_filter('aioseop_title', 'dd_rewrite_custom_titles');

function dd_rewrite_custom_titles($title)
{
    global $post;
    $title_aioseop = get_post_meta($post->ID, "_aioseop_title", true);
    if (strlen($title_aioseop) > 0) {
        $title = $title_aioseop;
    } else {
        $title = $post->post_title . ' | 8allocate';
    }
    return $title;
}

add_filter('aioseop_description', 'filter_aioseop_description');

function filter_aioseop_description($description)
{
    global $post;
    $description_aioseop = get_post_meta($post->ID, "_aioseop_description", true);

    if (strlen($description_aioseop) > 0) {
        $description = $description_aioseop;
    } else {
        if ($post->post_type == 'post') {
            $description = $post->post_title . ' &#11088; Find out latest research-based IT articles, findings, trends and tips by industry and technology at our blog &#11088; Join in to discover what we do and how.';
        } else {
            $description = $post->post_title . ' &#11088; Our team provides custom software development services to customers around the world. We are proud to be one of the fastest growing companies in our industry.';
        }
    }
    return $description;
}


function get_group_field(string $group, string $field, $post_id = 0)
{
    $group_data = get_field($group, $post_id);
    if (is_array($group_data) && array_key_exists($field, $group_data)) {
        return $group_data[$field];
    }
    return null;
}

add_filter('bcn_after_fill', 'my_static_breadcrumb_adder');
function my_static_breadcrumb_adder($breadcrumb_trail)
{
    global $post;
    if ($post->post_type === 'post') {
        if ($breadcrumb_trail->breadcrumbs[count($breadcrumb_trail->breadcrumbs) - 2]->get_id() === 1) {
            $new_breadcrumb = new bcn_breadcrumb('Blog', NULL, array('blog'), '/blog/', NULL, true);
            array_splice($breadcrumb_trail->breadcrumbs, 1, 1, array($new_breadcrumb));
        }
    }
}

?>
