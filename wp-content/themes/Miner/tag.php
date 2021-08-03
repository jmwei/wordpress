<!-- 标签文章：展示 -->

<?php get_header(); ?>

<div class="blog-content">
    <div class="blog-content-left">
        <?php get_template_part( 'template-parts/blog-sidebar'); ?>
    </div>

    <div class="blog-content-right">
        <h1 class="cat-title"><?php single_tag_title(); ?></h1>
        
        <?php get_template_part( 'template-parts/article-content'); ?>
    </div>
</div>

<?php get_footer(); ?>
