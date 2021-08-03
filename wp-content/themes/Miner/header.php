<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo miner_title(); echo ' - ' ; bloginfo('title'); ?></title>
  <?php wp_head(); ?>
</head>
<body>
<div class="header">
  <div class="header-left">
    <a href="<?php echo '/index.php'; ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpeg" alt="header">
    </a>
  </div>
  <!-- <div class="header-right">
    <ul>
      <li><a href="<?php echo '/index.php/about'; ?>">关于</a></li>
      <li><a href="<?php echo '/index.php/connect'; ?>">联系</a></li>
    </ul>
  </div> -->

  <?php wp_nav_menu(array(
    'theme_location' => 'menu',
    'container'       => 'div',
    'container_class' => 'header-right',
    'menu_class'      => 'list-menu',
    'menu_id'         => 'list-menu'
  )); ?>

</div>