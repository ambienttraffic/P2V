<div id="sidebar">
<?php 
/* reset query to get is_home to work */
wp_reset_query();
if (have_posts()) { ?>
<?php if ( is_home() ) { ?> <div id="description"><?php bloginfo('description'); ?></div> <?php } ?>
<?php } ?>



<!--BEGIN 'MORE FROM THIS CATEGORY'-->		
	<?php
		if ( is_single() ) :
		global $post;
		$categories = get_the_category();
		foreach ($categories as $category) :
   		$posts = get_posts('numberposts=4&exclude=' . $GLOBALS['current_id'] . '&category='. $category->term_id);
		if(count($posts) > 1) {
	?>
	
	<div class="widget">
	<h3><?php _e('More in','Mimbo'); ?> '<?php echo $category->name; ?>'</h3>
	<ul>
	
	<?php foreach($posts as $post) : ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endforeach; ?>
	
	</ul>
	</div>
	
	<?php } ?>

<?php endforeach; ?>
<?php endif; ?>


<!--END-->




<!--BEGIN SUBPAGE MENU-->

<?php if (is_page()) { ?>
<?php include_once (TEMPLATEPATH . "/childnav.php"); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if ($children) { ?>  
		<div class="widget" id="subnav">
					<h3 class="widgettitle">In This Section</h3>
					<div class="textwidget">
					<ul class="subpages">
					<?php if ($section_overview) {echo $section_overview;} ?>
					<?php echo $children; ?>
					</ul>
					</diV>
			</div>
				<?php } ?>
				
	<?php endwhile; ?>
	<?php endif; ?>
<?php } ;?>

<!--END SUBPAGE MENU-->



<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Mimbo Sidebar') ) : ?><?php endif; ?>
 	


</div><!--END SIDEBAR-->