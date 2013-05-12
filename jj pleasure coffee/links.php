<?php
/** Template Name: Links
 * Created by IntelliJ IDEA.
 * User: Yyy
 * Date: 13-4-25
 * Time: 下午9:34
 * To change this template use File | Settings | File Templates.
 */

get_header(); ?>

<div id="primary" class="block">
    <div id="content" role="main">

        <div id="linkcat">
            <ul id="bookmarks">
                <?php wp_list_bookmarks('title_li=&categorize=1&orderby=rand'); ?>
            </ul>

        </div>

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>