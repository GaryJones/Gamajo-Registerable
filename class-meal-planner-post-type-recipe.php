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
 * Recipe post type.
 *
 * @package Meal_Planner
 * @author  Gary Jones
 */
class Meal_Planner_Post_Type_Recipe extends Gamajo_Post_Type {
	protected $post_type = 'mp_recipe';

	protected function default_args() {
		$labels = array(
			'name'               => __( 'Recipes', 'meal-planner' ),
			'singular_name'      => __( 'Recipe', 'meal-planner' ),
			'add_new'            => _x( 'Add New', 'recipe', 'meal-planner' ),
			'add_new_item'       => __( 'Add New Recipe', 'meal-planner' ),
			'edit_item'          => __( 'Edit Recipe', 'meal-planner' ),
			'new_item'           => __( 'New Recipe', 'meal-planner' ),
			'view_item'          => __( 'View Recipe', 'meal-planner' ),
			'search_items'       => __( 'Search Recipes', 'meal-planner' ),
			'not_found'          => __( 'No recipes found', 'meal-planner' ),
			'not_found_in_trash' => __( 'No recipes found in trash', 'meal-planner' ),
		);

		$supports = array(
			'title',
			'thumbnail',
			'revisions',
			'author',
		);

		$args = array(
			'labels'               => $labels,
			'supports'             => $supports,
			'public'               => true,
			'show_in_nav_menus'    => false,
			'rewrite'              => array( 'slug' => 'recipe', ),
			'menu_position'        => 7,
			'has_archive'          => 'recipes',
		);

		return $args;
	}

	public function messages() {
		global $post, $post_ID;
		return array(
			0 => '', // Unused. Messages start at index 1.
			1 => sprintf( __( 'Recipe updated. <a href="%s">View recipe</a>', 'meal-planner' ), esc_url( get_permalink( $post_ID ) ) ),
			2 => __( 'Custom field updated.', 'meal-planner' ),
			3 => __( 'Custom field deleted.', 'meal-planner' ),
			4 => __( 'Recipe updated.', 'meal-planner' ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision'] ) ? sprintf( __( 'Recipe restored to revision from %s', 'meal-planner' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __( 'Recipe published. <a href="%s">View recipe</a>', 'meal-planner' ), esc_url( get_permalink( $post_ID ) ) ),
			7 => __( 'Recipe saved.', 'meal-planner' ),
			8 => sprintf( __( 'Recipe submitted. <a target="_blank" href="%s">Preview recipe</a>', 'meal-planner' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
			9 => sprintf( __( 'Recipe scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview recipe</a>', 'meal-planner' ),
				// translators: Publish box date format, see http://php.net/date
				date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
			10 => sprintf( __( 'Recipe draft updated. <a target="_blank" href="%s">Preview recipe</a>', 'meal-planner' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		);
	}
}
