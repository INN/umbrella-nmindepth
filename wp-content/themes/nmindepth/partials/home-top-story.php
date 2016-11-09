<?php
/**
 * The partial for a single post on the homepage in the upper right section of two stories.
 */
global $shown_ids;
$shown_ids[] = $post->ID;

if ( has_post_thumbnail( $post->ID ) ) { ?>
	<article class="photo-hero">
		<div class="featured-container">
			<a href="<?php echo esc_attr(get_permalink()); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full'); ?></a>
			<div class="featured-container-caption">
				<h2 class="has-photo"><a href="<?php echo get_permalink(); ?>" class="has-photo"><?php echo get_the_title(); ?></a></h2>
				<span class="byline"><?php largo_byline( true, false ); ?></span>
				<p class="excerpt"><?php echo $post->post_excerpt; ?></p>
			</div>
		</div>
	</article>
<?php } else { ?>
	<article class="type-hero">
		<h5 class="top-tag">Featured</h5>
		<h2 class="big-headline"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
		<span class="byline"><?php largo_byline( true, false ); ?></span>
		<p class="excerpt"><?php echo $post->post_excerpt; ?></p>
	</article>

<?php }
