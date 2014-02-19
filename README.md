# Gamajo_Registerable

Register WordPress post types and taxonomies using object-orientated design.

## Description

Most implementation of registering post types and taxonomies in WordPress might use classes, but these are little more than poor namespaces. Multiple post types and taxonomies are either all registered via methods in the same class, or contain duplicate code across multiple classes. I wanted to dive into how registration could be structured using something that is closer to real OOP.

The code seen here is in working use on a live project.

## Structure

 * `Gamajo_Registerable` - interface for different things that are registerable. Methods include `register()`, `unregister()`, `set_args()` and `get_args()`.
 * `Gamajo_Post_Type` - abstract class for registering post types. Implements `Gamajo_Registerable`, so required methods say how a post type should be registered, unregistered and how arguments should be handled. Includes abstract methods for `default_args()` and `messages()` which will contain implementation for specific post types.
 * `Gamajo_Taxonomy` - abstract class for registering taxonomies.  Implements `Gamajo_Registerable`, so required methods say how a taxonomy should be registered, unregistered and how arguments should be handled. Includes abstract methods for `default_args()` which will contain implementation for specific taxonomies. There is a little duplication here between this and `Gamajo_Post_type` - either the `Gamajo_Registerable` could be changed from an interface to an abstract class to accommodate the common method implementations, or traits could be used if the minimum PHP version was increased from 5.2.
 * `{Prefix}_Post_Type_{post type}` e.g. `Meal_Planner_Post_Type_Recipe` - specific implementation of a post type, which extends `Gamajo_Post_Type`. Only defines the `$post_type` property, and the `default_args()` and `messages()` methods.
 * * `{Prefix}_Taxonomy_{taxonomy}` e.g. `Meal_Planner_Taxonomy_Recipe_Type` - specific implementation of a taxonomy, which extends `Gamajo_Taxonomy`. Only defines the `$taxonomy` property, and the `default_args()` method.

If you register multiple post types and taxonomies, you can see that only multiple classes that extend the abstract classes are needed, with specific details, creating immutable objects. The boilerplate of registering, unregistering and handling arguments don't need to be repeated.

## Requirements
 * PHP 5.2+

## Installation

This isn't a WordPress plugin on its own, so the usual instructions don't apply. Instead:

1. Copy the `gamajo` files into your plugin. It can be into a file in the plugin root, or better, an `includes` directory.
2. Ensure the classes and interfaces are available. You can `require_once` each file, if the structural element doesn't exist, or just use an autoloader (renaming anything as needed if following PSR-0/4).

## Usage

The `meal-planner` files are examples - concrete objects of a post type and taxonomy. The only thing you need to populate for each new post type or taxonomy are the default args, and the messages. At this point, we've only created a specific post type or taxonomy class - since the class isn't instantiated, WordPress won't actually register anything.

_@todo Information about how to set up a registration handler._

## Contribute

Issues and Pull Requests welcomed against the 'develop' branch. All code should follow the WordPress coding standards and be fully documented.

## License

GPL-2.0+, so feel free to amend and use in any personal or commercial projects.

## Credits

Built by [Gary Jones](https://twitter.com/GaryJ)  
Copyright 2013 [Gamajo Tech](http://gamajo.com/)
