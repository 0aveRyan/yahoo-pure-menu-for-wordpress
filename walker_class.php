<?php 
/**
 * This class should go into your theme's functions.php file */

class Simple_Pure_Walker extends Walker {
  public function walk( $items ) {
    $list = array ();
	foreach ( $items as $item ) {
		$classes = $item->classes;
		$printclasses = esc_attr( implode( ' ', $classes ) );
		if ( $item->current )
			$list[] = "<li class='pure-menu-item pure-menu-selected'><a href='$item->url' class='$printclasses pure-menu-link'>$item->title</a>";
		else
			$list[] = "<li class='pure-menu-item'><a href='$item->url' class='$printclasses pure-menu-link'>$item->title</a>";
    }
  return join( "\n", $list );
  }
} 
?>