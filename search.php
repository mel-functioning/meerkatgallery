<?php
/**
 * The search page for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="search-page">

      <h2>Your Search Results</h2>
      <p>You searched for "<?php echo esc_html( get_search_query( false ) ); ?>".</p>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <p>We found the following posts that match your query:</p>
        <div class="the-searched-post">
      		<div class="searched-thumbnail">
      			<a href="<?php the_permalink(); ?>">
      				<?php the_post_thumbnail( 'thumbnail' ); ?>
      			</a>
      		</div><!-- .searched-thumbnail -->

      		<div class="thumbnail-overlay">
      			<div class="searched-content">
      				<h3><?php the_title(); ?></h3>
              <div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
      			</div><!-- .searched-content" -->
      		</div><!-- .thumbnail-overlay -->
        </div><!-- .the-searched-post -->

      <?php
      $GLOBALS[ 'search_post_id' ] = get_the_ID();
  endwhile;


      the_posts_pagination( array(
      	'mid_size'  => 2,
      	'prev_text' => __( 'Back', 'textdomain' ),
      	'next_text' => __( 'Next', 'textdomain' ),
      ) );


      else : ?>
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
        <div class="search-search">
          <?php get_search_form(); ?>
        </div>
      <?php endif; ?>


    </main>



    </div><!-- .wrapper - close for full black BG -->
    <aside class="cat-list">
      <div class="wrapper">
        <h2>Browse by Media</h2>
        <div class="cat-list-flex">
        <?php get_template_part('content', 'cat-list');  ?>
        </div><!-- .cat-list-flex -->
      </div><!-- .wrapper -->
    </aside>
    <div class="wrapper">


    <aside class="sticky-posts-bg-none">
        <h2>Featured Artworks</h2>
        <div class="sticky-posts">
          <?php get_template_part('content', 'sticky'); ?>
        </div><!-- .sticky-posts -->
    </aside>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer();
