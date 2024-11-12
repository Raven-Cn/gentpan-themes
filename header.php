<!DOCTYPE html>
<html lang="zh-CN" class="dark">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width">
    <title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description');?><?php } ?>
	<?php if ( is_tag() ) { ?><?php single_tag_title(); ?><?php $paged = get_query_var('paged'); if ( $paged > 1 ) printf('– 第 %s 页 ',$paged); ?> - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_category() ) { ?><?php single_cat_title(); ?><?php $paged = get_query_var('paged'); if ( $paged > 1 ) printf('– 第 %s 页 ',$paged); ?> - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_page() ) { ?><?php single_post_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_single() ) { ?><?php echo trim(wp_title('',0)); ?><?php if (get_query_var('page')) { echo ' - 第'; echo get_query_var('page'); echo '页';}?> - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_search() ) { ?>"<?php echo $s; ?>"的搜索结果 - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_404() ) { ?>404页面 - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_author() ) { ?>文章列表 - <?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_month() || is_day() ) { ?><?php the_time('Y - F'); ?> - <?php bloginfo('name'); ?><?php } ?>
	</title>
	<?php if (is_home())
	{
	$description = get_option('site_description');
	$keywords = get_option('site_keywords');
	}
	elseif (is_category())
	{
	$description = get_option('site_description');
	$keywords = single_cat_title('', false);
	}
	elseif (is_page_template())
	{
	$description = get_option('site_description');
	$keywords = get_option('site_keywords');
	}
	elseif (is_page())
	{
	$description = get_option('site_description');
	$keywords = get_option('site_keywords');
	}
	elseif (is_tag())
	{
	$description = get_option('site_description');
    $keywords = single_tag_title('', false);
	}
	elseif (is_single())
	{
     if ($post->post_excerpt) {$description = $post->post_excerpt;} 
	 else {$description = substr(strip_tags($post->post_content),0,240);}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
	}
	?></title>
    <meta name="keywords" content="<?php echo $keywords ?>" />
	<meta name="description" content="<?php echo $description?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/88bfc1ec10138035.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/d7033cd71835a0bf.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen"/>
	<!-- CSS -->
	<link href="https://artalk.gentpan.com/dist/Artalk.css" rel="stylesheet" />
	<!-- JS -->
	<script src="https://artalk.gentpan.com/dist/Artalk.js"></script>
  </head>
  <body>
  <?php wp_head(); ?>
  <div class="loading-bar"></div>
    <div id="__next">
      <div class="lc mc k nc K oc pc qc">
        <div class="sc rc tc" style="opacity:0;width:0%">
          <div class="h xc sc tc uc vc wc" style="left:-5.5%"></div>
        </div>
      </div>
      <div>
        <nav class="m Bb Vb Cc cc Pc E rd Le Me Ne Oe Pe Qe" role="navigation">
          <a class="m me Db o Ub d Lb Ab Re Se Te Ue Fd" href="<?php $home_url = home_url(); echo $home_url; ?>">
		  <?php $site_logo = get_option('site_logo'); if ($site_logo) { ?> <img src="<?php echo esc_url($site_logo);?>" style="width: 32px; margin: 0 10px;"><?php } ?>
            <span style="color:#fff;"><?php bloginfo('name'); ?></span></a>
          <div class="m We ac wd xd yd zd Bd Cd Dd">
			<?php
			if (has_nav_menu('custom_nav')) {
				wp_nav_menu(array(
					'theme_location' => 'custom_nav',
					'walker' => new Custom_Nav_Walker(),
					'container' => false, // 不使用额外容器
					'items_wrap' => '%3$s', // 只显示菜单项
					'fallback_cb' => false
				));
			}
			?>
            <a class="m me Db o Lb Ab Re Se Te Ue Rd" href="/feed">
              <i class="a E Kf Lf Mf Nf Rh de ee Pf Of Sf Sh Th Uh Vh fg Wh Xh Yh Zh ai Gg bi Ig ci di ei fi gi hi ii ji ki Eh Fh Gh Hh li Mh mi ni oi pi qi ri si"></i>
            </a>
            <a class="m me Db o Lb Ab Re Se Te Ue Rd" href="/search">
              <i class="hg a Rh Lf Kf E Mf Nf Pf Sf Xf Wg Xg ag Tf Uf Vf Wf Sh Th Uh Vh ti ui vi wi xi Gg Ig yi Eh zi Ai Bi Ci"></i>
            </a>
          </div>
        </nav>