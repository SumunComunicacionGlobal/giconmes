<?php

/**
 * Vertical Tabs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tab--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>

<?php if( have_rows('tabs') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="tabs-block mb-6">
        <?php while( have_rows('tabs') ): the_row(); ?>
        <button class="tabs-btn">
            <span>
                <div class="screen-reader-text"><?php esc_html_e( 'Open', 'giconmes' ); ?></div>
            </span>
            <?php the_sub_field('tabs_title'); ?>
        </button>

        <div class="tabs-content active">
            <div class="mt-1 mb-2"><?php the_sub_field('tabs_content'); ?></div>
        </div>

        <?php endwhile; ?>
    </div>
<?php endif; ?>

<script>

</script>