<?php
/**
 * Meal Planner
 *
 * @package   Meal_Planner
 * @author    Gary Jones
 * @link      http://gamajo.com/meal-planner
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 */

/**
 * Recipe type taxonomy.
 *
 * @package Meal_Planner
 * @author  Gary Jones
 */
class Meal_Planner_Taxonomy_Recipe_Type extends Gamajo_Taxonomy {
	/**
	 * Taxonomy ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $taxonomy = 'mp_recipe_type';

	/**
	 * Return taxonomy default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                       => __( 'Recipe Types', 'meal-planner' ),
			'singular_name'              => __( 'Recipe Type', 'meal-planner' ),
			'menu_name'                  => __( 'Recipe Types', 'meal-planner' ),
			'edit_item'                  => __( 'Edit Recipe Type', 'meal-planner' ),
			'update_item'                => __( 'Update Recipe Type', 'meal-planner' ),
			'add_new_item'               => __( 'Add New Recipe Type', 'meal-planner' ),
			'new_item_name'              => __( 'New Recipe Type Name', 'meal-planner' ),
			'parent_item'                => __( 'Parent Recipe Type', 'meal-planner' ),
			'parent_item_colon'          => __( 'Parent Recipe Type:', 'meal-planner' ),
			'all_items'                  => __( 'All Recipe Types', 'meal-planner' ),
			'search_items'               => __( 'Search Recipe Types', 'meal-planner' ),
			'popular_items'              => __( 'Popular Recipe Types', 'meal-planner' ),
			'separate_items_with_commas' => __( 'Separate recipe types with commas', 'meal-planner' ),
			'add_or_remove_items'        => __( 'Add or remove recipe types', 'meal-planner' ),
			'choose_from_most_used'      => __( 'Choose from the most used recipe types', 'meal-planner' ),
			'not_found'                  => __( 'No recipe types found.', 'meal-planner' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'recipe_type' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		return $args;
	}
}
