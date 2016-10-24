<?php

?>
<?php if(in_category('gallery')) { ?>
<?php

$arrData = catch_first_image();

$arrImg = $arrData['img'];
$arrContent = $arrData['content'];
if(count($arrImg))
{
	$html = '';
	$i = 0;
	foreach ($arrImg as  $value) {
		$i++;
		$src = 'data-src="'.$value.'"';
		$_src = 'src=""';
		$act = '';
		if($i == 1)
		{
			$act = 'active';
			$src = 'src="'.$value.'"';
			$_src = '';
		}
		$html .= '<div class="item '.$act.'">
                <div class="small">
                    <img class="lazy" '.$src.'  '.$_src.' alt="" >
                    <div class="carousel-caption">
                        <p></p>
                    </div>
                </div>
              </div>';	
	}
}

?>

<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <div id="carousel-data-<?php the_ID(); ?>" class="carousel slide carousel-slide" data-interval="false" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
               	<?php echo $html;?>
            </div>

            <a class="left carousel-control" href="#carousel-data-<?php the_ID(); ?>" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-data-<?php the_ID(); ?>" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="panel-gallery-body panel-body">
        <p><?php the_title();?></p>
        <p><?php echo $arrContent;?></p>
    </div>
    <div class="panel-footer">
        <span class="glyphicon glyphicon-time">&nbsp;</span><?php echo get_the_date('', $post->ID); ?>
        <?php edit_post_link( '<span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit', '', '', '', 'btn btn-primary btn-sm pull-right' );?>
    	<div class="clearfix"></div>
    </div>
  </div>
</div>

<?php }else{ ?>
<main class="col-md-12">
	<article id="post-<?php the_ID(); ?>" class="article">
		<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		</header><!-- .entry-header -->
		<hr>
			<span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo get_the_date('', $post->ID); ?>
		<hr>
		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading %s', 'twentyfifteen' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
			?>
		</div><!-- .entry-content -->

		<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

		<footer class="entry-footer">
			<hr>
			<?php edit_post_link( '<span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit', '', '', '', 'btn btn-primary btn-sm' );?>
		</footer>
	</article>
</main>
<?php } ?>