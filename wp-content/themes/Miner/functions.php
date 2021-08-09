<?php

function miner_setup() {
  /*********** 开启导航菜单功能: https://www.wpdaxue.com/register_nav_menus-and-wp_nav_menu.html
  参数：register_nav_menu($location, $description);
  $location：导航菜单的位置。
  $description：导航菜单的描述。
  示例：register_nav_menu('menu', '导航菜单');
  调用方式：
    <?php 
      if(function_exists('wp_nav_menu')) {
          wp_nav_menu(array( 'theme_location' => 'menu','container_id'=>'menu') ); 
      }
    ?>
  ***********/
  register_nav_menus(
    array(
      'menu' => __( '导航菜单', 'Miner' )
    )
  );

  /*********** 文章编写：设置特色图片
    Enable support for Post Thumbnails on posts and pages.
    @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
  ***********/
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'miner_setup' );

function miner_register_scripts() {
  /*********** 加载CSS样式
    参数：wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    $handle 样式表名称。
    $src 样式文件所在的位置，其余参数是可选的。
    $deps 指的是此样式表是否依赖于另一个样式表。如果设置了此项，则除非首先加载其依赖的样式表，否则不会加载此样式表。
    $ver：版本号。
    $media：可以指定要加载此样式表的媒体类型，例如 ‘all’, ‘screen’, ‘print’ 或 ‘handheld’。
    示例：wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/style.css', false, '1.1', 'all');
  ***********/
  wp_enqueue_style( 'mainCss', get_template_directory_uri() . '/style.css');
  wp_enqueue_style( 'customCss', get_template_directory_uri() . '/assets/css/custom.css');

  /*********** 加载JavaScript脚本
    参数：wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
    $handle：脚本的名称。
    $src：脚本文件所在的位置。
    $deps：依赖的脚本数组，例如 jQuery。
    $ver：脚本的版本号。
    $in_footer：是一个布尔数（true / false），它允许您将脚本放在 HTML 文档的页脚中，而不是放在 <head> 中，这样它就不会延迟加载 DOM 树。
    示例：wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
  ***********/
}
add_action( 'wp_enqueue_scripts', 'miner_register_scripts' );


function miner_widgets_init() {
  /*********** 开启小工具功能: https://www.wpdaxue.com/register_sidebar.html
    参数：register_sidebar( $args );
    默认值： None
    name - 侧边栏的名字（默认是 'Sidebar' 加 数字 ID）
    id - 侧边栏 ID，必须全部小写，不带空格（默认是一个自动递增的数字 ID）
    description - 用来说明侧边栏是什么，在哪里显示的文字。会在小工具管理界面显示。（默认为空）
    class - 分配到小工具 HTML输出 中的CSS选择器名字（默认为空）
    before_widget - 在每个小工具前面输出的 HTML代码（默认： '<li id="%1$s" class="widget %2$s">'）注：使用sprintf的变量替换
    after_widget - 在每个小工具后面输出的 HTML代码（默认： "</li>\n"）
    before_title - 在标题前输出的 HTML代码（默认： <h2 class="widgettitle">）
    after_title - 在标题后输出的 HTML代码 （默认："</h2>\n"）
  ***********/
  register_sidebar(array(
    'name' => __( 'BLOG侧边栏' ),
    'id' => 'left-sidebar',
    'description' => __( '用于显示博客侧边栏信息' ),
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>'
  ));
}
add_action( 'widgets_init', 'miner_widgets_init' );

function miner_title(){
  /*********** 设置浏览器Title显示信息
  示例：echo miner_title();
  ***********/
  if ( is_home() ) { 
    return '首页';
  }elseif ( is_search() ) {
    return '搜索结果页面';
  }elseif ( is_single() ) {
    return trim(wp_title('',0));
  }elseif ( is_page() ) {
    return trim(wp_title('',0));
  }elseif ( is_category()) {
    return single_cat_title('',false);
  }elseif ( is_month() ) { 
    return the_time('F');
  }elseif (is_tag()) { 
    return single_tag_title('', false);
  }
}

?>