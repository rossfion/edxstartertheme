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
 * @subpackage EdxStarter
 * @since EdxStarter 20201002-1
 */
get_header();
?>
<main id="site-content" class="page">

    <div class="site-content-container">

        <?php if ( have_posts() ) { ?>

            <div class="post-content">

                <?php if ( ! is_singular() ) { ?>

                    <h3 class="page-title"><?php the_archive_title(); ?></h3>
                    <p class="page-description"><?php the_archive_description(); ?></p>

                <?php } ?>

                <?php while (have_posts()) {
                    the_post(); ?>

                    <article <?php post_class( 'entry' ); ?> id="post-<?php the_ID(); ?>">

                        <?php if (has_post_thumbnail()) { ?>
                            <a class="post-featured-image-link" href="<?php echo esc_url ( get_the_permalink() ); ?>">
                                <div class="post-featured-image" style="background: url( '<?php echo esc_url ( get_the_post_thumbnail_url() ); ?>' );"></div>
                            </a>

                        <?php } ?>

                        <header class="entry-header">

                            <?php
                            if ( is_single() ) {

                                edxstarter_entry_header();
                                the_title( '<h1 class="entry-title">', '</h1>' );

                                if ( has_excerpt() ) {
                                    ?>
                                    <div class="entry-intro">
                                        <?php the_excerpt(); ?>					   </div>

                                    <hr class="post-divider" />

                                    <?php
                                        }
                                       } elseif ( is_singular() ) {
                                            the_title( '<h1 class="entry-title">', '</h1>' );
                                        } else {
                                            the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url (get_permalink() ) . '">', '</a></h2>' );
                                        }
                                    ?>

                        </header>

                        <div class="entry-content">
                            <?php
                                if ( is_singular() ) {
                                    the_content();
                                } else {
                                    the_excerpt();
                                }
                            ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer footer-meta entry-meta">
                            <?php if ( is_single() ) { ?>
                                <hr class="post-divider" />
                            <?php } ?>
                            <?php edxstarter_entry_footer(); ?>
                        </footer>

                    </article>

                    <?php
                    } // endwhile
                ?>

            </div><!-- .post-content -->

            <?php
            } // endif
        ?>

        <?php get_sidebar(); ?>

        <div class="pagination">
            <?php
            the_posts_pagination(
                    array(
                        'prev_text' => '<i class="fas fa-caret-left"></i><span class="screen-reader-text">' . __('Previous page', 'edxstarter') . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __('Next page', 'edxstarter') . '</span><i class="fas fa-caret-right"></i>',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'edxstarter') . ' </span>',
                    )
            );
            ?>

        </div><!-- .pagination -->
    </div><!-- .site-content-container -->
</main>

<?php get_footer(); ?>
 
