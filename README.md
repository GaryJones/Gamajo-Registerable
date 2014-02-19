# Gamajo_Registerable

Register WordPress post types and taxonomies using object-orientated design.

## Description

Most implementation of registering post types and taxonomies in WordPress might use classes, but these are little more than poor namespaces. Multiple post types and taxonomies are either all registered via methods in the same class, or contain duplicate code across multiple classes. I wanted to dive into how registration could be structured using something that is closer to real OOP.

The code seen here is in working use on a live project.

## Requirements
 * PHP 5.2+

## Installation

This isn't a WordPress plugin on its own, so the usual instructions don't apply. Instead:

1. Copy the `gamajo` files into your plugin. It can be into a file in the plugin root, or better, an `includes` directory.
2. Ensure the classes and interfaces are available. You can `require_once` each file, if the structural element doesn't exist, or just use an autoloader (renaming anything as needed if following PSR-0/4).

## Usage

The `meal-planner` files are examples - concrete objects of a post type and taxonomy. The only thing you need to populate for each new post type or taxonomy are the default args, and the messages. At this point, we've only created a specific post type or taxonomy class - since the class isn't instantiated, WordPress won't actually register anything.

__@todo Information about how to set up a registration handler.__

## License

GPL-2.0+, so feel free to amend and use in any personal or commercial projects.

## Credits

Built by [Gary Jones](https://twitter.com/GaryJ)  
Copyright 2013 [Gamajo Tech](http://gamajo.com/)
