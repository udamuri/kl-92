<?php
/*
http://blog.teamtreehouse.com/responsive-wordpress-bootstrap-theme-tutorial
Theme Name: WP Bootstrap
*/

?>

<?php get_header(); ?>

<div class="container">
<?php if(!is_home()) {?>
<div class="row">
	<div class="col-md-12">
		<?php custom_breadcrumbs();?>
	</div>
</div>
<?php }  ?>

<!-- home -->
<?php if( is_home() ) { ?>
	<div class="row">
		<div class="col-md-12">
			<?php get_template_part('slide');?>
		</div>
	</div>
<?php } ?>
<!-- end home -->

<?php if ( have_posts()  && ! is_home())  {  ?>
	<div class="row">
		<div class="col-md-8">
			<?php if ( is_home() && ! is_front_page() ) { ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php } ?>

			<?php
				// Start the loop.
			 	global $query_string;
       			query_posts ('posts_per_page=2');
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					'next_text'          => __( 'Next page', 'twentyfifteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
				) );
			?>
		</div>
		<div class="col-md-4">

			<div class="panel panel-default">
			  <div class="panel-body">
				    <form action="<?php echo home_url( '/' );?>" method="get" class="form-inline-1">
				    	<fieldset>
							<div class="input-group">
								<input type="text" name="s" id="search" placeholder="<?php _e("Search","wpbootstrap"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"><?php _e("Search","wpbootstrap"); ?></button>
								</span>
							</div>
					    </fieldset>
					</form>
			  </div>
			</div>

			<?php $pages = get_pages();	?>
			<?php if(count($pages) > 0) { ?>
			<div class="panel panel-default">
			  <div class="panel-heading">Pages</div>
			   	<ul class="list-group">
			    	<?php
			    		foreach ( $pages as $page ) {
			    			echo '<li class="list-group-item"><a href="'.get_page_link( $page->ID ).'">'.$page->post_title.'</a></li>';
			    		}
			    	?>
			  	</ul>
			</div>
			<?php }?>

			<?php 
				$args = array(
				    'type'            => 'monthly',
				    'limit'           => '',
				    'format'          => 'custom', 
				    'before'          => '<li class="list-group-item" >',
				    'after'           => '</li>',
				    'show_post_count' => false,
				    'echo'            => 1,
				    'order'           => 'DESC'
				);
			?>
			<div class="panel panel-default">
			  <div class="panel-heading">Archives</div>
			   	<ul class="list-group">
			   		<?php wp_get_archives( $args );?>
			   	</ul>
			   </div>
			</div>

			<?php
				$categories = get_categories( array(
				    'orderby' => 'name',
				    'parent'  => 0
				) );
			?>

		</div>
	</div>
<?php } else if(! have_posts()  && ! is_home()) { 
	get_template_part('empty'); } 
?>

</div>
<?php get_footer(); ?>