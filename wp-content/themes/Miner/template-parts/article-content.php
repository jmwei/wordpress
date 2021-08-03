<!-- 文章列表：展示 -->

<ul class="sitemap-list">
  <?php while ( have_posts() ) { the_post(); ?>
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
  <?php }; ?>
</ul>

<div class="blog-page">
    <?php $arr = array(
        'mid_size' => 3, // 当前页码数的 两边 显示几个页码
        'prev_text'          => __('« 上一页'),
        'next_text'          => __('下一页 »'),
        'type'               => 'plain',
        );
        the_posts_pagination($arr);
    ?>
</div>
