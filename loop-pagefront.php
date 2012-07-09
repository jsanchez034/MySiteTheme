<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
  <?php roots_post_before(); ?>
    <?php roots_post_inside_before(); ?>
	<div class="hero-unit">
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>
	  <p>
		<a href="work" class="btn btn-success btn-large"><?php _e('My Work','roots'); ?></a>
	  </p>
      <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	</div>
    <?php roots_post_inside_after(); ?>
  <?php roots_post_after(); ?>
<?php endwhile; /* End loop */ ?>