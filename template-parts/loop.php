<article id="post-<?php the_ID(); ?>" <?php post_class('card-blog'); ?>>  
    <div class="wp-block-post-featured-image">
        <?php giconmes_post_thumbnail(); ?>
    </div>

    <div class="wp-block-post-date">
		<?php giconmes_posted_on();?>
	</div><!-- .entry-meta -->

    <div class="wp-block-post-title">
        <h2 class="text-h5 mb-0"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </div> 
    <div class="wp-block-post-excerpt">
        <p><?php echo get_the_excerpt();?></p>
    </div>
</article>