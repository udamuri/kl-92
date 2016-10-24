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