<?php
/**
 * Gamajo Registerable Interface
 *
 * @package   Gamajo_Registerable
 * @author    Gary Jones
 * @link      http://gamajo.com/registerable
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 */

/**
 * Register something like post types or taxonomy.
 *
 * @package Gamajo_Registerable
 * @author  Gary Jones
 */
interface Gamajo_Registerable {
	public function register();
	public function unregister();
	public function set_args( $args = null );
	public function get_args();
}
