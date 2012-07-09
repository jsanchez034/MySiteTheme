<?php /* Template Name: Fun Stuff */ ?>

<?php get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo CONTAINER_CLASSES; ?>">
    <?php roots_main_before(); ?>
      <div id="main" class="<?php echo FULLWIDTH_CLASSES; ?>" role="main">
	  <div class="pad20">
        <?php roots_loop_before(); ?>
			
			<div class="btn-group filter">
				<button class="btn btn-success"><span class="all">All</span></button>
				<?php
					$terms = get_terms('fun-filter', $args);
					$count = count($terms);
					$i=0;
					if ($count > 0) {
						foreach ($terms  as $term) {
						$i++;
						$term_list  .= '<button class="btn btn-success"><span class="'.  $term->slug .'">' . $term->name . '</span></button>';

							if ($count  != $i)
							{
								$term_list .= ' ';
							}
							else
							{
								$term_list .= '';
							}
						}
						echo $term_list;
					}
				?>
			</div>
			<div class="clearfix"></div>
			<?php
				$wpbp = new WP_Query(array(
						'post_type' =>  'fun-stuff',
						'posts_per_page'  =>'-1'
					)
				);
			?>
			<div class="work-grid-offset">
				<ul class="filterable-grid clearfix">
				  <?php if ($wpbp->have_posts()) : while  ($wpbp->have_posts()) : $wpbp->the_post(); ?>
					<?php $terms = get_the_terms( get_the_ID(), 'filter' ); ?>
					<?php $link = get_permalink(); ?>
					<li data-id="id-<?php echo $count; ?>"  data-type="<?php if (!empty($terms)) { foreach ($terms as $term) { echo  strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } }?>">
						<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>
							<div class="imgcont">
								<?php  the_post_thumbnail('fun-stuff'); ?>
								<p class="excpt"><?php echo  substr(get_the_excerpt(),0,300) . '...' . "<br/><a  href='{$link}'>" .__('Learn More','roots') . " >></a>"; ?></p>
							</div>
						<?php endif;  ?>
						<p class="title"><a  href="<?php echo $link; ?>"><?php echo  get_the_title(); ?></a></p>
					</li>
				  <?php $count++; ?>
				  <?php endwhile; endif; ?>
				  <?php wp_reset_query(); ?>
				</ul>
			</div>
        <?php roots_loop_after(); ?>
		<div class="clearfix"></div>
	  </div>
      </div><!-- /#main -->
    <?php roots_main_after(); ?>
    </div><!-- /#content -->
  <?php roots_content_after(); ?>
<?php get_footer(); ?>