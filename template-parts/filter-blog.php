<div id="filter-blog" class="container mt-6 mb-4">
    <div>
        <button class="toggle-filter-blog text-h6 uppercase">
            <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/filter.svg' ); ?>
            <span class="pl-05"><?php esc_html_e( 'Filtrar por:', 'giconmes' ); ?></span>
        </button>
        <div id="filter-blog--container">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('filter-blog')) : ?>
            <?php endif; ?>
        </div>
    </div>
</div>