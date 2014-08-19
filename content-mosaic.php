<?php
/**
 * @package whimsy
 */
?>
<?php $args = array(
	'post_type' => 'posts',
	'posts_per_page' => -1
); ?>

<?php $my_query = new WP_Query($args); ?>

<?php if($my_query->have_posts()): ?>

	<?php while($my_query->have_posts()): ?>

	<?php $my_query->the_post(); ?>

	<?php $category_classes = ''; ?>

	<?php $categories = get_the_terms($post->ID , 'my-custom-taxonomy'); ?>

	<?php if($categories){
		foreach($categories as $category){
			$category_classes .= ' '.$category->slug;
		};
	}; ?>

	<a class="mix<?php echo $category_classes; ?>" href="<?php the_permalink(); ?>">
		... target content ...
	</a>

	<?php endwhile; ?>

<?php endif; ?>