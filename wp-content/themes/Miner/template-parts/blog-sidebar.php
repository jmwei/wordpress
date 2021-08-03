<!-- 文章侧边栏：展示 -->

<?php if ( is_active_sidebar( 'left-sidebar' ) ) { ?>
  <ul id="left-sidebar">
    <?php dynamic_sidebar('left-sidebar'); ?>
  </ul>
<?php } ?>