<?php 
  // use this wherever you'd like to reference your menu in your template.
  $args = array(
  	'theme_location'  => 'your-theme-location-goes-here',
        'container'       => 'none',
	'menu_class'      => 'pure-menu-list',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => 'Simple_Pure_Walker'
  );  
  wp_nav_menu( $args ); 
?>
