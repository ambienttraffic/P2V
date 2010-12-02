<?php get_header(); ?>

	<div id="content">


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
		
					
		<h2 class="pagetitle"><?php the_title(); ?></h2>
			<div class="entry clearfloat">
				<?php the_content(); ?>

				<?php wp_link_pages(array(
				'before' => '<p><strong> '.__('Pages:','Mimbo').' </strong>', 
				'after' => '</p>', 
				'next_or_number' => 'number')); 
				?>

			</div>
		</div>
        <?php edit_post_link(__('Edit this entry','Mimbo'), '<p>', ' &raquo;</p>'); ?>
		<?php // If a page has a related_category in a custom field, output the latest 10 posts from the related category ?>
        <?php 
		$relatedcategory = get_post_meta($post->ID, related_category, true);
		
		if ($relatedcategory!=""){?>
			<?php $temp_query = $wp_query; ?>
			<?php query_posts('category_name=' . $relatedcategory . '&posts_per_page=10'); ?>

			<?php while (have_posts()) : the_post(); ?>
			<div class="clearfloat recent-excerpts">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h4>
	<p class="date"><?php the_time('n/d/y'); ?> &bull; </p>
				<?php the_excerpt(); ?>
			</div>
			<?php endwhile; 
			// Get the ID of a given category
			    $category_id = get_cat_ID($relatedcategory);
			?>
			<a href="<?php echo get_category_link($category_id);?>">More &raquo;</a>
			<?php $wp_query = $temp_query; ?>
			
		<?php }?>
        
		<?php endwhile; endif; ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>