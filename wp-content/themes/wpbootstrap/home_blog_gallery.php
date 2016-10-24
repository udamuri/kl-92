<div class="panel panel-default">
  	<div class="panel-heading">Blog</div>
  	<ul class="list-group">
	<?php


	$args = array( 'posts_per_page' => 5, 'offset'=> 1, 'category' => 3 );

	$myposts = get_posts( $args );
	foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<li class="list-group-item">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
	<?php endforeach; 
	wp_reset_postdata();?>

	</ul>
</div>