# Yahoo! Pure Menu for WordPress
[Yahoo! Pure](https://github.com/yahoo/pure) has a completely rewritten menu component for v0.6.0 (props [@jamesalley](https://github.com/jamesalley))!

However, the new menu relies on selectors on both line items and anchor links, something the default ```wp_nav_menu()``` Walker doesn't do.

This is a simple walker class to add to your functions.php and snippet to use for instances of ```wp_nav_menu()```.

This walker is currently in development, and is missing key functionality like listening to target and link attributes defined in WordPress Dashboard.

## Paste into theme's functions.php

Snippet found in ```walker_class.php``` should be pasted into your theme's ```functions.php``` file!

## Boilerplate wp_nav_menu() template tag

Paste snippet found in ```example_template_tag.php``` to output menu wrapped in ```<ul>``` with proper Pure selector. 

Strips the default ```<div>``` container, allowing you to still define an anchor with a ```.pure-menu-heading``` class (see below). 

You might need to define other attributes found [here in WordPress Codex](http://codex.wordpress.org/Function_Reference/wp_nav_menu). 
*You must define either a $menu or $theme_location.*

### Menu Tip

Don't add a "Home" link in WordPress Dashboard Menu Builder. To mimic Pure documentation site, paste this below your ```<div class="pure-menu">```

```
<a class="pure-menu-heading" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
```
