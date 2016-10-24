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
	<hr>
	<div class="row">
		<div class="col-md-8">
			<?php get_template_part('home_blog_gallery');?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('home_info');?>
		</div>
	</div>
<?php } ?>
<!-- end home -->
<?php if ( (have_posts()  && ! is_home()) )  {  ?>
	<div class="row">
		<div class="col-md-8">
			<?php if ( is_home() && ! is_front_page() ) { ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php } ?>

			<?php
				global $query_string;
			 	global $page;
			 	global $cat;
			 	global $p;
			 	global $s;

			  	if (empty($page)) {
			    	$page = 1;
			  	}

			  	$arr = array( 
					'posts_per_page' => 9,
					'paged' => $page,
					'order' => 'DESC' );

			  	if(!empty($cat))
			  	{
			  		$arr['cat'] = $cat;
			  	}

			  	if(!empty($p))
			  	{
			  		$arr['p'] = $p;
			  	}

			  	if(!empty($s))
			  	{
			  		$arr['s'] = $s;
			  	}
			  	//var_dump($arr);
				query_posts( $arr );

				// Start the loop.
				echo '<div class="row">';
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				// End the loop.
				endwhile;
				echo '</div>';

				echo '<div class="clearfix"></div>';
				// Previous/next page navigation.
				if (function_exists("sa_bootstrap_paginate_links"))
				{
				    sa_bootstrap_paginate_links();
				}
				wp_reset_query();
			?>
		</div>
		<div class="col-md-4">
			<?php get_template_part('right_page'); ?>
		</div>
	</div>
<?php } else if(! have_posts()  && ! is_home()) { 
	get_template_part('empty'); } 
?>

</div>
<?php get_footer(); ?>