<?php get_header(); ?>

<main id="site-content" role="main">

<?php if ( is_front_page() && is_home() ): ?>

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
}
?>
<?php get_template_part( 'template-parts/pagination' ); ?>

<?php elseif ( is_front_page() ): ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="front-page-content section-inner">
<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>
	
<?php
$enable_home_recent_card = get_theme_mod( 'enable_home_recent_card', true );
if ( true === $enable_home_recent_card ):
?>
<div class="top-recent-entry-card">
<div class="section-inner">
<h2>News</h2>
<div class="entry-card-wrapper">
<?php $the_query = new WP_Query( 'posts_per_page=3&post_type=post' );
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
<?php wp_reset_postdata(); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php
$enable_home_recent_list = get_theme_mod( 'enable_home_recent_list', true );
if ( true === $enable_home_recent_list ):
?>
<div class="top-recent-entry-list">
<div class="section-inner">
<h2>News</h2>
<ul class="entry-list-wrapper">
<?php $the_query = new WP_Query( 'posts_per_page=3&post_type=post' );
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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

<?php  elseif ( is_home() ): ?>

<?php endif; ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
