<?php

/**
 * Custom Post Type Setting
 *
 * @package Shin
 */

namespace SHIN_THEME\Inc;

use SHIN_THEME\Inc\Traits\Singleton;

class Custom_Post_Type
{
  use Singleton;

  protected function __construct()
  {
    //load all class in here
    $this->set_hooks();
  }

  protected function set_hooks()
  {
    //Change Footer Text in Admin

    add_action('init', [$this, 'create_new_custom_post_type']);

    add_action('init',  [$this, 'create_custom_taxonomies']);

    add_action('restrict_manage_posts',  [$this, 'filter_backend_by_taxonomies']);
  }

  /**
   *
   * @package Shin
   *
   * Init create post_type 
   */

  function shin_create_post_type($args)
  {
    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $rewrite = (isset($args['rewrite'])) ? $args['rewrite'] : $args['slug'];
    $icon = $args['icon'] ? $args['icon'] : "dashicons-star-filled";
    $supports = isset($args['supports']) ? $args['supports'] : array('title', 'editor', 'revisions', 'thumbnail', 'author', 'excerpt', 'custom-fields');
    $public = isset($args['public']) ? $args['public'] : true;
    $capabilities = isset($args['capabilities']) ? $args['capabilities'] : array();
    $hierarchical = isset($args['hierarchical']) ? $args['hierarchical'] : array();
    $menu_position = isset($args['menu_position']) ? $args['menu_position'] : 5;
    $show_ui = isset($args['show_ui']) ? $args['show_ui'] : true;

    register_post_type($post_type, array(
      'label'               => __($post_type, 'Shin'),
      'labels' => array(
        'name' => __($name, 'shin'),
        'singular_name' => __($single, 'shin'),
        'add_new' => __('Add New ' . $single, 'shin'),
        'add_new_item' => __('Add New ' . $single, 'shin'),
        'edit_item' => __('Edit ' . $single, 'shin'),
        'new_item' => __('New' . $single, 'shin'),
        'all_items' => __('All ' . $name, 'shin'),
        'view_item' => __('View ' . $single, 'shin'),
        'search_items' => __('Filter By ' . $name, 'shin'),
        'not_found' => __('Not Found ' . $single, 'shin'),
        'not_found_in_trash' => __('Not Found ' . $single . ' In Trash', 'shin'),
        'parent_item_colon' => '',
        'menu_name' => __($name, 'shin')
      ),
      'public' => $public,
      'menu_icon' => $icon,
      'exclude_from_search' => false,
      'menu_position'       => $menu_position,
      'has_archive' => true,
      'taxonomies' => array($post_type),
      'rewrite' => array('slug' => $rewrite),
      'publicly_queryable' => $public,
      'supports' => $supports,
      'capabilities' => $capabilities,
      'hierarchical'        => $hierarchical,
      'show_ui'             => $show_ui,
      'show_in_menu'        => $show_ui,
      'show_in_nav_menus'   => $show_ui,
      'show_in_admin_bar'   => $show_ui,
    ));

    if (!is_array($args) || !isset($args['taxonomy']) || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $taxonomy_slug = isset($args['taxonomy']['name']) ? slugify($args['taxonomy']['name'])  : '';
    $taxonomy_name = isset($args['taxonomy']['name']) ? $args['taxonomy']['name']  : '';
    $taxonomy_hierarchical = isset($args['taxonomy']['hierarchical']) ? $args['taxonomy']['hierarchical'] : false;
    $taxonomy_show_ui = isset($args['taxonomy']['show_ui']) ? $args['taxonomy']['show_ui'] : true;
    $taxonomy_single = isset($args['taxonomy']['single']) ? $args['taxonomy']['single'] : '';

    register_taxonomy($taxonomy_slug,  $post_type, array(
      'hierarchical' => $taxonomy_hierarchical,
      'show_ui' => $taxonomy_show_ui,
      'show_admin_column' => true,
      'labels' => array(
        'name' => _x($taxonomy_name, 'shin'),
        'singular_name' => _x($taxonomy_single, 'shin'),
        'search_items' =>  __('Search' . $taxonomy_name),
        'all_items' => __('All ' . $taxonomy_name),
        'parent_item' => __('Parent ' . $taxonomy_single),
        'parent_item_colon' => __('Parent' . $taxonomy_single . ':'),
        'edit_item' => __('Edit ' . $taxonomy_single),
        'update_item' => __('Update Categories'),
        'add_new_item' => __('Add New Categories'),
        'new_item_name' => __('New Categories Name'),
        'menu_name' => __('Categories ' . $taxonomy_single),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => $taxonomy_slug, // This controls the base slug that will display before each term
        'with_front' => false, // Don't display the category base before "/Propertys/"
        'hierarchical' => true // This will allow URL's like "/Propertys/boston/cambridge/"
      ),
    ));
  }

  /**
   *
   * @package Shin
   *
   * Create post_type callback
   */

  function create_new_custom_post_type()
  {
    $args = array(
      array(
        "post_type" => 'properties',
        "name" => "Properties",
        "single" => "Properties",
        "slug" => "properties",
        "hierarchical" => true,
        "show_ui" => true,
        'menu_position'       => 4,
        "icon" => "dashicons-lightbulb",
        "taxonomy" => array(
          "name" => "Categories Properties",
          "single" => "Properties",
          "hierarchical" => true
        )
      ),
      array(
        "post_type" => 'jobs',
        "name" => "Jobs",
        "single" => "Jobs",
        "slug" => "jobs",
        "hierarchical" => true,
        "show_ui" => true,
        'menu_position'       => 4,
        "icon" => "dashicons-admin-network",
        "taxonomy" => array(
          "name" => "Categories Jobs",
          "single" => "Jobs",
          "hierarchical" => true
        )
      ),
      array(
        "post_type" => 'promotions',
        "name" => "Promotions",
        "single" => "Promotions",
        "slug" => "promotions",
        "hierarchical" => true,
        "show_ui" => true,
        'menu_position'       => 4,
        "icon" => "dashicons-admin-multisite",
        "taxonomy" => array(
          "name" => "Categories Promotions",
          "single" => "Promotions",
          "hierarchical" => true
        )
      ),

    );
    foreach ($args as $arg) {
      if (isset($arg['post_type'])) {
        $this->shin_create_post_type($arg);
      }
    }
  }

  /**
   *
   * @package Shin
   *
   * Init create taxonomy
   */

  function shin_create_taxonomy($args)
  {
    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['taxonomy']) return;

    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $taxonomy = $args['taxonomy'];
    $rewrite = (isset($args['rewrite'])) ? $args['rewrite'] : $taxonomy;
    $labels = array(
      'name' => __($name, 'shin'),
      'singular_name' => __($single, 'shin'),
      'search_items' => __('Filter By ' . $name, 'shin'),
      'popular_items' => __('Popular ' . $name, 'shin'),
      'all_items' => __('All ' . $name, 'shin'),
      'parent_item' => null,
      'parent_item_colon' => null,
      'edit_item' => __('Edit ' . $single, 'shin'),
      'update_item' => __('Update ' . $single, 'shin'),
      'add_new_item' => __('Add New ' . $single, 'shin'),
      'new_item_name' => __('Add New ' . $single, 'shin'),
      'menu_name' => __($name, 'shin'),

    );
    $args = array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => $rewrite['slug']),
      'supports' => array('title', 'editor', 'thumbnail')

    );
    register_taxonomy($taxonomy, $post_type, $args);
  }

  /**
   *
   * @package Shin
   *
   * Create taxonomy callback
   */

  function create_custom_taxonomies()
  {
    $args = array(
      array(
        "post_type" => array('properties'),
        "name" => "Categories Properties",
        "single" => "Category Properties",
        "taxonomy" => "categories_properties",
        'taxonomies' => array('category', 'post_tag'),
        'rewrite' => array('slug' => 'categories_properties')
      ),
      array(
        "post_type" => array('properties'),
        "name" => "Property City",
        "single" => "Property City",
        "taxonomy" => "property_city",
        'taxonomies' => array('category', 'post_tag'),
        'rewrite' => array('slug' => 'property-city')
      ),
      array(
        "post_type" => array('promotions'),
        "name" => "Categories Promotions",
        "single" => "Category Promotions",
        "taxonomy" => "categories_promotions",
        'taxonomies' => array('category', 'post_tag'),
        'rewrite' => array('slug' => 'categories_promotions')
      )
    );
    foreach ($args as $arg) {
      if (!empty($arg['post_type'])) {
        $this->shin_create_taxonomy($arg);
      }
    }
  }

  function filter_backend_by_taxonomies($post_type)
  {

    if ('properties' !== $post_type)
      return;

    $taxonomies = array('categories_properties');


    foreach ($taxonomies as $taxonomy_slug) {
      $taxonomy_obj = get_taxonomy($taxonomy_slug);
      $taxonomy_name = $taxonomy_obj->labels->name;
      $terms = get_terms($taxonomy_slug);
      echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
      echo '<option value="">' . sprintf(esc_html__('Show All %s', 'text_domain'), $taxonomy_name) . '</option>';
      foreach ($terms as $term) {
        printf(
          '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
          $term->slug,
          ((isset($_GET[$taxonomy_slug]) && ($_GET[$taxonomy_slug] == $term->slug)) ? ' selected="selected"' : ''),
          $term->name,
          $term->count
        );
      }
      echo '</select>';
    }
  }
}
