<?php

include_once get_template_directory() . '/homepages/homepage-class.php';
include_once get_stylesheet_directory() . '/homepages/zones/nmin-zones.php';

class nminHomepageLayout extends Homepage {

	function __construct( $options=array() ) {
		$suffix = (LARGO_DEBUG) ? '' : '.min';

		$defaults = array(
			'name' => __( 'New Mexico In-Depth Homepage', 'nmin' ),
			'type' => 'nmin',
			'description' => __( 'Custom front page layout for investigative reporting outfit in New Mexico', 'nmin' ),
			'template' => get_stylesheet_directory() . '/homepages/templates/nmin_template.php',
			'assets' => array(
				array( 'nmin-homepage', get_stylesheet_directory_uri().'/homepages/assets/css/nmin_homepage' . $suffix . '.css' )
			),
			'prominenceTerms' => array(
				array(
					'name' 			=> __( 'Top Story', 'largo' ),
					'description' 	=> __( 'Add this label to a post to make it the Top Story on the homepage', 'largo' ),
					'slug' 			=> 'top-story'
				)
			)
		);

		$options = array_merge( $defaults, $options );
		$this->init();
		$this->load($options);
	}

	function hp_top_story() {
		return zone_homepage_top_story();
	}

	function hp_two_stories() {
		return zone_homepage_two_stories();
	}
}

/**
 * Register the homepage layout, unregister other ones
 * @since Largo 0.5.4
 */
function nmin_custom_homepage_layouts() {
	$unregister = array(
		'HomepageBlog',
		'TopStories',
		'Slider',
		'LegacyThreeColumn'
	);

	foreach ( $unregister as $layout )
		unregister_homepage_layout( $layout );

	register_homepage_layout( 'nminHomepageLayout' );
}
add_action( 'init', 'nmin_custom_homepage_layouts', 10 );

/**
 * Register widget areas for the homepage
 * @since Largo 0.5.4
 */
function nmin_homepage_widget_areas() {

	$sidebars = array(
		array(
			'name' => 'Homepage Bottom',
			'id' => 'hp-bottom',
			'description' => __('Widget zone for below featured section', 'nmin'),
			'before_widget' => '<aside class="span4 hp-bottom">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		)
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}

	unregister_sidebar( 'homepage-bottom' );

}
add_action( 'widgets_init', 'nmin_homepage_widget_areas', 999 );
