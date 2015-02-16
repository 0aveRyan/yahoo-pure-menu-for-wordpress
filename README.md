# WordPress Nav Walker for Yahoo Pure Menu
With Yahoo [Pure](https://github.com/yahoo/pure) v0.6.0, a rewritten Menu component solves many headaches (props [@jamesalley](https://github.com/jamesalley))!

However, this menu relies on custom classes defined on both line items and anchor links, something the default ```wp_nav_menu()``` Walker doesn't do.

This is a simple walker class to add to your functions.php and snippet to use for instances of ```wp_nav_menu()```. This doesn't spit out the default bloat of classes WordPress usually adds to line items, but that's a feature in my book. Modify and extend as needed.

## Paste into theme's functions.php

```php
class Simple_Pure_Walker extends Walker {
  public function walk( $elements ) {
	$list = array ();
	foreach ( $elements as $item ) {
		if ( $item->current )
			$list[] = "<li class='pure-menu-item pure-menu-selected'><a href='$item->url' class='pure-menu-link'>$item->title</a>";
		else
			$list[] = "<li class='pure-menu-item'><a href='$item->url' class='pure-menu-link'>$item->title</a>";
    }
  return join( "\n", $list );
  }
}
```


## Boilerplate wp_nav_menu function

Paste this snippet to output menu wrapped in ```<ul>```. Strips the default div container, allowing you to still define an anchor with a .pure-menu-heading class (see below). You might need to define other attributes found [here in WordPress Codex](http://codex.wordpress.org/Function_Reference/wp_nav_menu). *You must define either a $menu or $theme_location.*

```php
<?php
$args = array(
    'container'       => 'none',
	'menu_class'      => 'pure-menu-list',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => 'Simple_Pure_Walker'
);
wp_nav_menu( $args ); ?>
```

### Menu Tip

Don't add a "Home" link in WordPress Dashboard Menu Builder. To mimic Pure documentation site, paste this below your ```<div class="pure-menu">```

```
<a class="pure-menu-heading" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
```
