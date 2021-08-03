<!-- 文章详情：展示 -->

<?php get_header(); ?>

<div class="blog-content">
    <div class="blog-content-left">
        <?php get_template_part( 'template-parts/blog-sidebar'); ?>
    </div>

    <div class="blog-content-right">
        <ul class="sitemap-list">
        <?php while ( have_posts() ) { the_post(); ?>
            <li>
                <a class="article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <div class="article-meta">
                    <?php echo get_the_date('Y年m月d日'); ?> /
                    <?php 
                        $cat = get_the_category();
                        $separator = '、';
                        $output = '';
                        foreach ( $cat as $c ) {
                            $output .= $c->cat_name.$separator;
                        }
                        echo trim($output, $separator)
                    ?> /
                    <?php the_author(); ?>
                </div>
                <?php the_content(); ?>

                <div class="article-page">
                    <div class="article-page-left"><?php previous_post_link('&laquo; %link'); ?></div>
                    <div class="article-page-right"><?php next_post_link('%link &raquo;'); ?></div>
                </div>
                
                </div>
            </li>
        <?php }; ?>
        </ul>
    </div>

</div>    

<?php get_footer(); ?>
 