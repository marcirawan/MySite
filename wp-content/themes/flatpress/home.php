<?php
/**
 * Front Page
 *
 * Note: You can overwrite home.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes
 *
 * @file           home.php
 * @package        FlatPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 0.0.1
 * @link           N/A
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

        <div class="hero-unit">
            <div class="row-fluid">

                <?php 
                   echo do_shortcode('[rotatingtweets screen_name="marcnesia" official_format="0" show_follow="1" no_show_count="1" ]');
                   if(of_get_option('home_hero_area', 'no entry')) {
                   // echo '<p>'; 
                    echo of_get_option('home_hero_area', 'no entry');
                   // echo '</p>'; 
                  } 
            ?>
        </div>
        </div><!-- end of .hero-unit -->   

<div class="latest-posts">  
<?php
    //$limit = get_option('posts_per_page');
    $limit = 4;
    query_posts('showposts=' . $limit );
    $wp_query->is_archive = true; $wp_query->is_home = false;
    ?> 

<?php while (have_posts()) : the_post(); ?>
        
          <div class="span3">
              <div class="post-img">
                 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                        </a>
              </div>

            </div>
           <div class="span8">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
                
                <div class="post-meta">
                <?php 
                    printf( __( '<i class="icon-time"></i> %2$s <i class="icon-user"></i> %3$s', 'responsive' ),'meta-prep meta-prep-author',
		            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			            get_permalink(),
			            esc_attr( get_the_time() ),
			            get_the_date()
		            ),
		            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			            get_author_posts_url( get_the_author_meta( 'ID' ) ),
			        sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
			            get_the_author()
		                )
			        );
		        ?>
				    <!--<?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments <i class="icon-arrow-down"></i>', 'responsive'), __('1 Comment <i class="icon-arrow-down"></i>', 'responsive'), __('% Comments <i class="icon-arrow-down"></i>', 'responsive')); ?>
                        </span>
                    <?php endif; ?> -->
                </div><!-- end of .post-meta -->
                
                <div class="post-entry">
                    <?php the_excerpt(); ?>
                     <?php custom_link_pages(array(
                            'before' => '<div class="pagination"><ul>' . __(''),
                            'after' => '</ul></div>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;'),
                            'previouspagelink' => __('&larr;'),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>
                </div><!-- end of .post-entry -->
                
                <div class="post-data">
				    <?php the_tags(__('Tags:', 'responsive') . ' ', ' ', '<br />'); ?> 
                </div><!-- end of .post-data -->             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>             
            </div><!-- end of #post-<?php the_ID(); ?> -->
            </div>
            <?php comments_template( '', true ); ?>
            
        <?php endwhile; ?> 
</div>

 <!--<div class="span3">
        
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('home-widget-1')) : ?>
            
            <div class="tile">
                <img class="tile-image big-illustration" alt="" src="<?php echo get_stylesheet_directory_uri() ?>/images/illustrations/compass.png">
                <h3 class="tile-title">Responsive</h3>
                <p>Flat UI integrated into a responsive WordPress theme!</p>
                <a class="btn btn-large btn-block" href="#">Button</a>
            </div>

			<?php endif; //end of home-widget-1 ?>

        <?php responsive_widgets_end(); // responsive after widgets hook ?>
        </div> --><!-- end of .span3 -->
<?php get_footer(); ?>