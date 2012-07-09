<?php /*
Template Name: ListPostsOfCat
*/ ?>

<?php get_header(); ?>
<?php roots_content_before(); ?>

<?php 
		global $data;
		$image_width = 66;
		$image_height = 66;
		
		add_filter('excerpt_more', 'new_excerpt_more');
		function new_excerpt_more() { 
			return "";
		}
	
?>

 <div id="content" class="<?php echo CONTAINER_CLASSES; ?>">
 	<?php roots_sidebar_before(); ?>
	  <aside id="sidebar" class="<?php echo SIDEBAR_CLASSES; ?>" role="complementary">
        <?php roots_sidebar_inside_before(); ?>
        <?php get_sidebar(); ?>
        <?php roots_sidebar_inside_after(); ?>
      </aside><!-- /#sidebar -->
    <?php roots_sidebar_after(); ?>
	<?php roots_main_before(); ?>
    <div id="main" class="<?php echo MAIN_CLASSES; ?>" role="main">
	  <div class="pad20 clearfix">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; else: endif; ?>

		<?php query_posts('post_status=publish,future');?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $postind = $wp_query->current_post + 1; ?>
			<?php if ($postind % 2 <> 0) { ?><div class="row"> <?php }?>
			<div class="span4 tpost <?php echo ($postind % 2 <> 0) ? 'tpleft': 'tpright' ;?>">
				<div class="well">
				  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				  <?php roots_entry_meta(); ?>
				  <div class="excerpt">
					<?php $post_image_url = (has_post_thumbnail()) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'full') : '/img/60x60.gif'; ?>
					<img width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" class="wp-post-image" alt="<?php echo the_title(); ?>" src="<?php echo get_template_directory_uri(); echo (has_post_thumbnail()) ? $post_image_url[0] : $post_image_url; ?>" />	
					<?php the_excerpt(); ?>
				  </div>
				  <p class="readmo"><a href="<?php the_permalink(); ?>"><?echo _('Read the full post') . ' &rarr;'; ?></a></p>
				</div>
			</div>
			<?php if ($postind % 2 == 0 || $postind == $wp_query->post_count) { ?></div> <?php }?>
			<?php endwhile; else: endif; ?>
	 </div>
	</div><!-- /#main -->
    <?php roots_main_after(); ?>
 </div><!-- #/content -->
  <?php roots_content_after(); ?>
<?php get_footer(); ?>