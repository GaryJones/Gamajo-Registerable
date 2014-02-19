<?php
/**
 * Gamajo Post Type
 *
 * @package   Gamajo_Registerable
 * @author    Gary Jones
 * @link      http://gamajo.com/registerable
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 */

/**
 * Register a post type.
 *
 * @package Gamajo_Registerable
 * @author  Gary Jones
 */
abstract class Gamajo_Post_Type implements Gamajo_Registerable {
	protected $post_type;
	protected $args;

	public function register() {
		register_post_type( $this->post_type, $this->args );
	}

	public function unregister() {
		global $wp_post_types;
		if ( isset( $wp_post_types[ $this->post_type ] ) ) {
			unset( $wp_post_types[ $this->post_type ] );
		}
	}

	public function set_args( $args = null ) {
		$this->args = wp_parse_args( $args, $this->default_args() );
	}

	public function get_args() {
		return $this->args;
	}

	public function get_post_type() {
		return $this->post_type;
	}

	abstract public function messages();
	abstract protected function default_args();

}
