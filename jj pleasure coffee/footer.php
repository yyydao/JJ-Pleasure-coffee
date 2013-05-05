<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?>

	</div><!-- #main -->
</div><!-- #page -->
<footer>
        <div id="modules">
                <section>
                <div class="inner" id="footer-pages">
                    <h4>Pages - 页面一览</h4>
                    <p>
                        <?php // dropdown without submit form
                        $select = wp_dropdown_pages('show_option_none=选择一个页面&selected=0&echo=0');
                        $select = preg_replace("/<select/", "<select onchange='document.location.href=this.options[this.selectedIndex].value;'", $select);
                        $select = preg_replace('/value="([^>]*)"/', 'value="?page_id=$1"', $select);
                        echo $select;
                        ?>
                    </p>
                    <h4>Search - 搜索本站</h4>
                    <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="search-form">
                            <span id="input_label"><label for="s">Search</label></span>
                            <span id="input_field"><input type="text" name="s" id="s" size="14" maxlength="30" /></span>
                            <span id="input_button"><input type="submit" name="submit" value="启航!" /></span>
                        </div>
                    </form>
                </div>
                </section>
                <section>
                <div class="inner" id="categories">
                    <h4>Categories - 文章分类</h4>
                    <ul>
                        <?php wp_list_categories('orderby=name&show_count=1&title_li='); ?>
                    </ul>

                    <h4>Archives - 过往岁月</h4>
                    <p>
                        <select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
                            <option value="">选择一个月份</option>
                            <?php wp_get_archives('format=option&type=monthly&show_post_count=1') ?>
                        </select>
                    </p>
                </div>
                </section>
                <section>
                <div class="inner" id="tags">
                    <h4>Tag Clouds - 标签海</h4>
                    <div><p><?php wp_tag_cloud('largest=18&number=30&format=flat&orderby=count&order=DESC'); ?></p></div>
                </div>
                </section>
                <section>
                <div class="inner" id="meta">
                    <h4>Share - 订阅分享</h4>
                    <div>
                        <p><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe via RSS 2.0 订阅本站"><img src="<?php bloginfo('template_directory'); ?>/img/b_13.png" alt="Subscribe via RSS 2.0 订阅本站" width="80" height="15" /></a> <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS 订阅本站留言'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/b_11.png" alt="<?php _e('The latest comments to all posts in RSS 订阅本站留言'); ?>" width="80" height="15" /></a></p>
                        <p><a href="http://del.icio.us/post?url=<?php bloginfo('url'); ?>&amp;title=<?php bloginfo('name'); ?>" title="This is Del.icio.us !"><img src="<?php bloginfo('template_directory'); ?>/img/b_02.png" alt="This is Del.icio.us !" width="80" height="15" /></a> <a href="http://www.bloglines.com/sub/<?php bloginfo('rss2_url'); ?>" title="Subscribe with Bloglines"><img src="<?php bloginfo('template_directory'); ?>/img/b_05.png" alt="Subscribe with Bloglines" width="80" height="15" /></a></p>
                        <p><a href="http://www.zhuaxia.com/add_channel.php?url=<?php bloginfo('rss2_url'); ?>" title="通过抓虾订阅"><img src="<?php bloginfo('template_directory'); ?>/img/b_01.gif" alt="通过抓虾订阅" width="80" height="15" /></a> <a href="http://www.google.com/reader/view/feed/<?php bloginfo('rss2_url'); ?>" title="Subscribe with Google Reader"><img src="<?php bloginfo('template_directory'); ?>/img/b_15.png" alt="Subscribe with Google Reader" width="80" height="15" /></a></p>
                    </div>
                    <h4 class="center margin">Meta - 管理功能</h4>
                    <div class="center">
                        <p><?php wp_register('',' / '); ?><?php wp_loginout(); ?></p>
                        <?php wp_meta(); ?>
                    </div>
                </div>
                </section>
            </div>
		<div id="colophon" role="contentinfo">
			<?php do_action( 'toolbox_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/') ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'toolbox' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'toolbox' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme Based on: %1$s','toolbox'), '<a  href="http://automattic.com/" rel="designer">Toolbox</a>' ); ?>
            <?php printf(__('Theme : %1$s redesigned by %2$s.','toolbox' ),'进击的愉悦咖啡','<a href="http://www.708fountain.com/" rel="designer">Dao</a>' ); ?>
		</div><!-- #colophon -->
</footer><!--#footer-->


<?php wp_footer(); ?>

</body>
</html>