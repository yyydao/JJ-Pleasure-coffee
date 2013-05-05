<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?>

<div id="secondary" class="widget-area block" role="complementary" xmlns="http://www.w3.org/1999/html">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<?php /*aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'toolbox' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'toolbox' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside */ ?>

                <aside id="sidebar-aside" class="aside">
                    <?php if(is_home()) {?>
                    <section class="aside-post">
                        <?php
                            // Get the ID of a given category
                            $category_id = get_cat_ID( 'asides' );

                            // Get the URL of this category
                            $category_link = get_category_link( $category_id );
                            ?>

                            <!-- Print a link to this category -->
                            <h3><a href="<?php echo esc_url( $category_link ); ?>" tiptitle="短文模式">水池的碎碎念</a></h3>
                            <?php
                            /*判断当前的文章是否是aside类型
                            */
                        ?>
                        <?php
                            $args = array(
                                'post_type'=>'post',
                                'post_status'=>'publish',
                                'order' =>'DESC',
                                'tax_query'=>array(
                                    array(
                                        'taxonomy'=>'post_format',
                                        'field'=>'slug',
                                        'terms'=>array('post-format-aside')
                                    )
                                )
                            );
                            $the_query = new WP_Query($args);
                            while($the_query->have_posts()):
                                $the_query->the_post();
                                get_template_part( 'content-aside', get_post_format() );
                                endwhile;
                            wp_reset_postdata();
                        ?>
                    </section>
                    <?php }?>


                    <?php if(is_single()):  ?>
                    <section class="aside-meta">

                        <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php toolbox_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>
                        <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $categories_list = get_the_category_list( __( ', ', 'toolbox' ) );
                        if ( $categories_list && toolbox_categorized_blog() ) :
                            ?>
                            <span class="cat-links">
				            <?php printf( __( 'Posted in %1$s', 'toolbox' ), $categories_list ); ?>
			                </span>
                            <span class="sep"> | </span>
                        <?php endif; // End if categories ?>

                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $tags_list = get_the_tag_list( '', __( ', ', 'toolbox' ) );
                        if ( $tags_list ) :
                            ?>
                            <span class="tag-links">
				            <?php printf( __( 'Tagged %1$s', 'toolbox' ), $tags_list ); ?>
			                </span>
                            <span class="sep"> | </span>
                            <?php endif; // End if $tags_list ?>
                        <?php endif; // End if 'post' == get_post_type() ?>

                    <?php endif; ?>
                    <div class="entry-meta">
                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $category_list = get_the_category_list( __( ', ', 'toolbox' ) );

                        /* translators: used between list items, there is a space after the comma */
                        $tag_list = get_the_tag_list( '', ', ' );

                        if ( ! toolbox_categorized_blog() ) {
                            // This blog only has 1 category so we just need to worry about tags in the meta text
                            if ( '' != $tag_list ) {
                                $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'toolbox' );
                            } else {
                                $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'toolbox' );
                            }

                        } else {
                            // But this blog has loads of categories so we should probably display them here
                            if ( '' != $tag_list ) {
                                $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'toolbox' );
                            } else {
                                $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'toolbox' );
                            }

                        } // end check for categories on this blog

                        printf(
                            $meta_text,
                            $category_list,
                            $tag_list,
                            get_permalink(),
                            the_title_attribute( 'echo=0' )
                        );
                        ?>
                    </div>
                    </section>
                </aside>


			<?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->


		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>