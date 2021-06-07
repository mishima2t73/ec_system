<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WordPress
* @subpackage Primary_of_WP
* @since 1.0.0
*/

get_header();
?>

<main id="site-content" role="main">

<?php
$archive_title    = '';
$archive_subtitle = '';
if ( is_search() ) {
global $wp_query;
$archive_title = sprintf(
'%1$s %2$s',
'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
'&ldquo;' . get_search_query() . '&rdquo;'
);
if ( $wp_query->found_posts ) {
$archive_subtitle = sprintf(
/* translators: %s: Number of search results */
_n(
'We found %s result for your search.',
'We found %s results for your search.',
$wp_query->found_posts,
'twentytwenty'
),
number_format_i18n( $wp_query->found_posts )
);
} else {
$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
}
} elseif ( ! is_home() ) {
$archive_title    = get_the_archive_title();
$archive_subtitle = get_the_archive_description();
}
if ( $archive_title || $archive_subtitle ) {
?>
<?php
}
?>

<?php if ( 'full' === get_theme_mod( 'blog_content', 'full' )): ?>

<?php
if ( have_posts() ) {

$i = 0;

while ( have_posts() ) {
$i++;
if ( $i > 1 ) {
echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
}
the_post();

get_template_part( 'template-parts/content', get_post_type() );

}
} elseif ( is_search() ) {
?>

<div class="no-search-results-form section-inner thin">

<?php
get_search_form(
array(
'label' => __( 'search again', 'twentytwenty' ),
)
);
?>

</div><!-- .no-search-results -->

<?php
}
?>

<?php elseif ( 'card' === get_theme_mod( 'blog_content', 'card' )): ?>
<?php if ( is_home() ): ?>
<header class="entry-header has-text-align-center header-footer-group">
<div class="entry-header-inner section-inner medium">
<h1 class="entry-title"><?php global $post;
$PageTitile = $post->post_title; single_post_title(); ?></h1>
</div><!-- .entry-header-inner -->
</header>
<?php else: ?>
<header class="entry-header has-text-align-center header-footer-group">

<div class="entry-header-inner section-inner medium">

<?php if ( $archive_title ) { ?>
<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
<?php } ?>

<?php if ( $archive_subtitle ) { ?>
<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
<?php } ?>

</div><!-- .archive-header-inner -->

</header><!-- .archive-header -->
<?php endif; ?>
<div class="recent-entry-card">
<div class="section-inner">
<div class="entry-card-wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="entry-card-item">
<a href="<?php the_permalink(); ?>" class="entry-card-thumb">
<?php if (has_post_thumbnail()): ?><?php the_post_thumbnail(); ?><?php else: ?><img src="<?php echo get_stylesheet_directory_uri() ?>/images/no-img.png" alt="No image"><?php endif; ?>
</a>
<span class="entryt-card-date"><?php the_time('Y.m.d'); ?></span>
<span class="entryt-card-cat"><?php the_category(', '); ?></span>
<h3 class="entry-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
<a href="<?php the_permalink(); ?>" class="entry-card-more">続きを読む</a>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
</div>
</div>

<?php elseif ( 'list' === get_theme_mod( 'blog_content', 'list' )): ?>
<?php if ( is_home() ): ?>
<header class="entry-header has-text-align-center header-footer-group">
<div class="entry-header-inner section-inner medium">
<h1 class="entry-title"><?php global $post;
$PageTitile = $post->post_title; single_post_title(); ?></h1>
</div><!-- .entry-header-inner -->
</header>
<?php else: ?>
<header class="entry-header has-text-align-center header-footer-group">

<div class="entry-header-inner section-inner medium">

<?php if ( $archive_title ) { ?>
<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
<?php } ?>

<?php if ( $archive_subtitle ) { ?>
<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
<?php } ?>

</div><!-- .archive-header-inner -->

</header><!-- .archive-header -->
<?php endif; ?>
<div class="recent-entry-list">
<div class="section-inner">
<ul class="entry-list-wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li class="entry-list-item">
<span class="entryt-list-date"><?php the_time('Y.m.d'); ?></span>
<span class="entryt-list-cat"><?php the_category(', '); ?></span>
<a href="<?php the_permalink(); ?>" class="entry-list-title"><?php the_title(); ?></a>
</li>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</ul>
</div>
</div>

<?php endif; ?>

<?php get_template_part( 'template-parts/pagination' ); ?>


</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
