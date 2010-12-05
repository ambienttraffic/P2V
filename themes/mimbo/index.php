<?php get_header(); ?>



<div id="content">
	<div id="slideshowcontrols">
		<a id="prev" href="#">&laquo;</a><a id="next" href="#">&raquo;</a>
		</div>
<div class="slideshow">
 <?php
	
	$stickyposts = array('post__in'=>get_option('sticky_posts'));
	query_posts($stickyposts);
	while (have_posts()) { the_post(); 
		//GETS ALL STICKY POSTS
	?>
	        
    <div id="lead" class="clearfloat">
	<div id="lead-text">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	    <?php the_title(); ?></a></h2>
	</div>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=620&amp;h=375&amp;src='); ?></a>
    <!--
	<div id="lead-text">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php the_title(); ?></a> <span class="commentcount"> (<?php comments_popup_link('0', '1', '%'); ?>)</span></h2>
    
   
    <p class="date"><?php the_time('n/d/y'); ?> &bull; </p>
	<?php the_excerpt(); ?>
	</div>-->
			</div><!--END LEAD/STICKY POSTS-->
		<?php
		}
		?>
		</div> <!-- END FEATURED AREA -->
	
		<div id="pullquote">
			<div id="pullquote-text"><?php echo get_post_meta('1915', 'pullquote', 'true');?></div>
			<div id="pullquote-author"><?php echo get_post_meta('1915', 'pullquote_author', 'true');?></div>
		</div>
		
		<div id="more-posts">
		<h3>In the Media</h3>
		<?php
		wp_reset_query();
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts( 'paged=$page&post_per_page=4&cat=9' );
		while (have_posts()) { the_post(); 
		?>
			
		<div class="clearfloat recent-excerpts">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">

<?php if ( comments_open() ) : ?><?php comments_popup_link( '0', '1', '%', 'comments-link', 'Comments are off for this post'); ?></a><?php endif; ?>
<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
</h4>

<p class="date"><?php the_time('n/d/y'); ?> &bull; </p>
			<?php the_excerpt(); ?>
		</div>
		<?php
		}
		?>
		<div class="recent-excerpts"><a href="<?php echo get_option('home'); ?>/about/in-the-media">More Media &raquo;</a></div>
	</div><!--END RECENT/OLDER POSTS-->
	
    
	<div id="featured-cats"> 
	<h3>Recent Matches</h3>

		<?php
        $display_categories = get_option('openbook_cats');
        foreach ($display_categories as $category) { 
        $showposts = get_option('openbook_featured_posts');	
        query_posts("showposts=$showposts&cat=$category");
        ?>

<h5><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?>&raquo;</a></h5>

        <ul>
        <?php while (have_posts()) : the_post(); ?>
        <li class="clearfloat"><p class="date"><?php the_time('n/d/y'); ?> &bull; </p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
	<?php } ?>
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 5,
	  interval: 6000,
	  width: 150,
	  height: 500,
	  theme: {
	    shell: {
	      background: '#d2dbe3',
	      color: '#3b4c5b'
	    },
	    tweets: {
	      background: '#ffffff',
	      color: '#787878',
	      links: '#cf3a3c'
	    }
	  },
	  features: {
	    scrollbar: false,
	    loop: false,
	    live: false,
	    hashtags: true,
	    timestamp: true,
	    avatars: false,
	    behavior: 'all'
	  }
	}).render().setUser('PETS2VETS').start();
	</script>
    
</div><!--END FEATURED CATS-->

	
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
