<?php
/**
 * Meal Planner
 *
 * @package   Meal_Planner
 * @author    Gary Jones
 * @link      http://gamajo.com/meal-planner
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 * @version   1.0.1
 */

/**
 * Recipe post type.
 *
 * @package Meal_Planner
 * @author  Gary Jones
 */
class Meal_Planner_Post_Type_Recipe extends Gamajo_Post_Type {
	/**
	 * Post type ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $post_type = 'mp_recipe';

	/**
	 * Return post type default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                  => _x( 'Recipes', 'post type general name', 'meal-planner' ),
			'singular_name'         => _x( 'Recipe', 'post type singular name', 'meal-planner' ),
			'menu_name'             => _x( 'Recipes', 'admin menu', 'meal-planner' ),
			'name_admin_bar'        => _x( 'Recipe', 'add new on admin bar', 'meal-planner' ),
			'add_new'               => _x( 'Add New', 'mp_recipe', 'meal-planner' ),
			'add_new_item'          => __( 'Add New Recipe', 'meal-planner' ),
			'new_item'              => __( 'New Recipe', 'meal-planner' ),
			'edit_item'             => __( 'Edit Recipe', 'meal-planner' ),
			'view_item'             => __( 'View Recipe', 'meal-planner' ),
			'all_items'             => __( 'All Recipes', 'meal-planner' ),
			'search_items'          => __( 'Search Recipes', 'meal-planner' ),
			'parent_item_colon'     => __( 'Parent Recipe:', 'meal-planner' ),
			'not_found'             => __( 'No recipes found.', 'meal-planner' ),
			'not_found_in_trash'    => __( 'No recipes found in Trash.', 'meal-planner' ),
			'filter_items_list'     => __( 'Filter recipes list', 'meal-planner' ),
			'items_list_navigation' => __( 'Recipes list navigation', 'meal-planner' ),
			'items_list'            => __( 'Recipes list', 'meal-planner' ),
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

	/**
	 * Return post type updated messages.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type updated messages.
	 */
	public function messages() {
		$post = get_post();

		$revision = $this->get_revision_input();

		$messages = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Recipe updated.', 'meal-planner' ),
			2  => __( 'Custom field updated.', 'meal-planner' ),
			3  => __( 'Custom field deleted.', 'meal-planner' ),
			4  => __( 'Recipe updated.', 'meal-planner' ),
			/* translators: %s: date and time of the revision */
			5  => $revision ? sprintf( __( 'Recipe restored to revision from %s', 'meal-planner' ), wp_post_revision_title( $revision, false ) ) : false,
			6  => __( 'Recipe published.', 'meal-planner' ),
			7  => __( 'Recipe saved.', 'meal-planner' ),
			8  => __( 'Recipe submitted.', 'meal-planner' ),
			9  => sprintf(
				__( 'Recipe scheduled for: <strong>%1$s</strong>.', 'meal-planner' ),
				/* translators: Publish box date format, see http://php.net/date */
				date_i18n( __( 'M j, Y @ G:i', 'meal-planner' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Recipe draft updated.', 'meal-planner' ),
			'view'    => __( 'View recipe', 'meal-planner' ),
			'preview' => __( 'Preview recipe', 'meal-planner' ),
		);

		$messages = $this->maybe_add_message_links( $messages, $post );

		return $messages;
	}
}
