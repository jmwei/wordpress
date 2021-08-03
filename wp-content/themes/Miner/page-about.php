
<?php get_header(); ?>

<div class="blog-content">
    <div class="blog-content-left">
        <?php get_template_part( 'template-parts/blog-sidebar'); ?>
    </div>

    <div class="blog-content-right">
        <?php $posts = get_posts( "numberposts=10000" ); ?>  
        <?php if( $posts ) : ?>  

        <ul class="sitemap-list">
        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>  
        <li>
            <?php if(has_post_thumbnail()): ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
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
            <div class="article-excerpt">
                <?php the_excerpt(); ?>
                <a class="article-more" href="<?php the_permalink(); ?>">阅读更多>></a>
            </div>
        </li>
        <?php endforeach; ?> 
        </ul>
        <?php endif; ?>

    </div>
</div>

</div>

<?php get_footer(); ?>




