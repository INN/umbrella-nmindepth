<?php
/**
 * Top Story (powered by Top Story Prominence Term)
 * --------------------------------------------------
 */
function zone_homepage_top_story() {
	global $post;
	$preserve = $post;

	// Display the first featured post.
	$post = largo_home_single_top();

	ob_start();

	get_template_part( 'partials/home', 'top-story' );

	$post = $preserve;
	return ob_get_clean();
}

function zone_homepage_two_stories() {
	global $post;
	$preserve = $post;

	// Display the first featured post.
	$posts = largo_home_featured_stories( 2 );

	ob_start();
	foreach ( $posts as $post ) {
		get_template_part( 'partials/home', 'second-story' );
	}

	$post = $preserve;
	return ob_get_clean();
}
