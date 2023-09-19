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
$class_name = 'tabs-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
?>

<?php if( have_rows('tabs') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr( $class_name ); ?>  mb-6">
        <div>
        <?php while( have_rows('tabs') ): the_row(); ?>
            <button class="tabs-btn">
                <span>
                    <div class="screen-reader-text"><?php esc_html_e( 'Open', 'giconmes' ); ?></div>
                </span>
                <?php the_sub_field('tabs_title'); ?>
            </button>
        <?php endwhile; ?>
        </div>
        <div>
            <?php $i = 0; while( have_rows('tabs') ): the_row(); $i++; ?>
                <div class="tabs-content <?php if( $i ==1 ){ echo "active"; } ?>">
                    <div class="mt-1 mb-2"><?php the_sub_field('tabs_content'); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<script>

var tabs = Array.from(document.querySelectorAll( "#<?php echo $id; ?> .tabs-btn"));
var tabContents = Array.from(document.querySelectorAll( "#<?php echo $id; ?> .tabs-content"));
var tabsTemp = tabs;

tabs.forEach ((tab, index) => {
    tab.addEventListener('click', () => {
        tabContents.forEach(content => {
            content.classList.remove('active');
        });
        tabsTemp.forEach(tabTemp => {
            tabTemp.classList.remove('active');
        });

        tabContents[index].classList.add('active');
        tab.classList.add('active');
    });
});

var tabsNoAnimation = document.querySelectorAll( "#metodologia #<?php echo $id; ?> .tabs-btn");
var tabNoAnimationContents = document.querySelectorAll( "#metodologia  #<?php echo $id; ?> .tabs-content");
var tabsNoAnimationTemp = tabsNoAnimation;

tabsNoAnimation.forEach ((tab, index) => {
    tab.addEventListener('mouseover', () => {
        tabNoAnimationContents.forEach(content => {
            content.classList.remove('active');
        });
        tabsNoAnimationTemp.forEach(tabTemp => {
            tabTemp.classList.remove ('active');
        });
        tabNoAnimationContents[index].classList.add('active');
        tab.classList.add('active');
    });
});


</script>
