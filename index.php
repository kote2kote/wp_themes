<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/style.min.css" rel="stylesheet" media="screen">
	<!-- <title>Easiest WP</title> -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <h1>kote2_study</h1>
  <p><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
  <p><?php bloginfo( 'description' ); ?></p>



  <?php if ( has_nav_menu( 'global' ) ) : ?>
    <?php wp_nav_menu( array(
      'theme_location'  => 'global',
      'menu_id'         => 'global-menu',
      'container'       => 'nav',
      'container_class' => 'global-nav',
    ) ); ?>
  <?php endif; ?>




  <!--WPループ ここから-->
  <?php if ( have_posts() ) : ?>
    <!--投稿がある場合、ループ前に一度だけ実行-->
    <ul>

      <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <!--繰り返し処理-->
        <li>
          <div>
            投稿時間：<time datetime="<?php echo get_the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time>
            <!--サムネ-->
            <?php if ( has_post_thumbnail() ) : ?>
              <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'easiestwp-thumbnail' ); ?></a></p>
            <?php endif; ?>

          </div>
          <div>
            <p><?php the_category( ', ' ); ?></p>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_tags(); ?></p>
          </div>
        </li>

      <?php endwhile; ?>
　　<!--投稿がある場合、ループ後に一度だけ実行-->
    </ul>

  <?php else : ?>
    <!--投稿がない場合、一度だけ実行-->
    <p>投稿がありません。</p>

  <?php endif; ?>
　<!--WPループ ここあで-->


　<!--ページネーション　吐き出されるタグの違いを見て-->
<?php the_posts_pagination(); ?>
<p>ああ</p>
<?php the_posts_pagination( array(
  'prev_text' => '<img class="arrow" src="' . get_theme_file_uri() . '/images/arrow-left.png" srcset="' . get_theme_file_uri() . '/images/arrow-left@2x.png 2x" alt="前へ">',
  'next_text' => '<img class="arrow" src="' . get_theme_file_uri() . '/images/arrow-right.png" srcset="' . get_theme_file_uri() . '/images/arrow-right@2x.png 2x" alt="次へ">',
) ); ?>



<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
  <ul class="side-column">
    <?php dynamic_sidebar( 'sidebar' ); ?>
  </ul>
<?php endif; ?>


<?php if ( is_active_sidebar( 'footer' ) ) : ?>
  <ul class="footer-widgets">
    <?php dynamic_sidebar( 'footer' ); ?>
  </ul>
<?php endif; ?>




	<?php wp_footer(); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/script.min.js"></script>
</body>
</html>
