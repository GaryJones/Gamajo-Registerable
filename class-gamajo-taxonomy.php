<?php
/**
 * Gamajo Taxonomy
 *
 * @package   Gamajo_Registerable
 * @author    Gary Jones
 * @link      http://gamajo.com/registerable
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 */

/**
 * Register a taxonomy.
 *
 * @package Gamajo_Registerable
 * @author  Gary Jones
 */
abstract class Gamajo_Taxonomy implements Gamajo_Registerable {
	protected $taxonomy;
	protected $args;

	/**
	 * Register a taxonomy.
	 *
	 * Setting the object type explicitly to null registers the taxonomy but doesn't associate it with any objects, so
	 * it won't be directly available within the Admin UI. You will need to manually register it using the 'taxonomy'
	 * parameter (passed through $args) when registering a custom post_type (see register_post_type()), or using
	 * register_taxonomy_for_object_type().
	 *
	 * @param  array|string $object_type Optional. Name of the object type. Default is null.
	 */
	public function register( $object_type = null ) {
		register_taxonomy( $this->taxonomy, $object_type, $this->args );
	}

	public function unregister() {
		global $wp_taxonomies;
		if ( taxonomy_exists( $this->taxonomy ) ) {
			unset( $wp_taxonomies[ $this->taxonomy ] );
		}
		// Alternatively:
		// register_taxonomy( $this->taxonomy, null );
	}

	public function set_args( $args = null ) {
		$this->args = wp_parse_args( $args, $this->default_args() );
	}

	public function get_args() {
		return $this->args;
	}

	public function get_taxonomy() {
		return $this->taxonomy;
	}

	abstract protected function default_args();
}
