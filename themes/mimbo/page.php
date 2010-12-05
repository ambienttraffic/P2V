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
		<?php // If a page has a related_category in a custom field (use the slug), output the latest 10 posts from the related category ?>
        <?php 
		$relatedcategory = get_post_meta($post->ID, related_category, true);
		
		if ($relatedcategory!=""){?>
			<?php $temp_query = $wp_query; ?>
			<?php query_posts('category_name=' . $relatedcategory . '&posts_per_page=10'); ?>
			<ul class="archive-list clearfloat">
			<?php while (have_posts()) : the_post();
			include (TEMPLATEPATH . '/archivelist.php'); 
			endwhile; ?>
			</ul>
			<?php // Get the ID of a given category
				$idObj = get_category_by_slug($relatedcategory); 
				$categoryid = $idObj->term_id;
			?>
			<a href="<?php echo get_category_link($categoryid);?>">More &raquo;</a>
			<?php $wp_query = $temp_query; ?>
			
		<?php }?>
        
		<?php endwhile; endif; ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>