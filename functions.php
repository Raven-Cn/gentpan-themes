<?php

//开启缩略图功能
add_theme_support( 'post-thumbnails' );

//字数统计 
function cnwper_count_words ($text) {
	global $post;
	if ( '' == $text ) {
		$text = $post->post_content;
		if (mb_strlen($output, 'UTF-8') < mb_strlen($text, 'UTF-8')) $output .= '<span class="word-count">共' . mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8') .'字</span>';
		return $output;
	}
}

//注册导航
function custom_nav_setup() {
    register_nav_menus(array(
        'custom_nav' => __('Custom Navigation', 'your_text_domain')
    ));
}
add_action('after_setup_theme', 'custom_nav_setup');

//导航元素
class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = implode(' ', $item->classes);
        $output.= '<a class="m me Db o Lb Ab Re Se Te Ue Rd" href="'. $item->url. '">'. $item->title. '</a>';
    }
}

//绑定分类标签元素
function custom_color_category_links($thelist) {
    $new_list = '';
    $categories = explode('</a>, <a href=', $thelist);
    foreach ($categories as $category) {
        if (strpos($category, 'href=') === false) {
            $new_list.= $category;
        } else {
            $new_list.= '<a style="color:#c9d1d9;" href="'. substr($category, strpos($category, 'href="') + 6);
        }
    }
    return $new_list;
}
add_filter('the_category', 'custom_color_category_links');

//绑定上一条标签元素
function custom_previous_post_link_color($output) {
    return str_replace('<a ', '<a style="color:#c9d1d9;" ', $output);
}
add_filter('previous_post_link', 'custom_previous_post_link_color');

//绑定下一条标签元素
function custom_next_post_link_color($output) {
    return str_replace('<a ', '<a style="color:#c9d1d9;" ', $output);
}
add_filter('next_post_link', 'custom_next_post_link_color');

//调用分类
function get_categories_with_count() {
    $categories = get_categories();
    $category_data = array();
    foreach ($categories as $category) {
        $category_data[$category->name] = $category->count;
    }
    return $category_data;
}

//调用标签
function get_top_five_tags() {
    $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number' => 5));
    $other_tags = get_tags(array('exclude' => wp_list_pluck($tags, 'term_id')));
    $tag_data = array_merge($tags, $other_tags);
    return $tag_data;
}

function archives_list_SHe() {
     global $wpdb,$month;
     $lastpost = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC LIMIT 1");
     $output = get_option('SHe_archives_'.$lastpost);
     if(empty($output)){
         $output = '';
         $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'SHe_archives_%'");
         $q = "SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM $wpdb->posts p WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
         $monthresults = $wpdb->get_results($q);
         if ($monthresults) {
             foreach ($monthresults as $monthresult) {
             $thismonth    = zeroise($monthresult->month, 2);
             $thisyear    = $monthresult->year;
             $q = "SELECT ID, post_date, post_title, comment_count FROM $wpdb->posts p WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_date AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC";
             $postresults = $wpdb->get_results($q);
             if ($postresults) {
                 $text = sprintf('%s %d', $month[zeroise($monthresult->month,2)], $monthresult->year);
                 $postcount = count($postresults);
                 $output .= '<ul class="archives-list"><li><span class="archives-yearmonth">' . $text . ' &nbsp;(' . count($postresults) . '&nbsp;篇文章)</span><ul class="archives-monthlisting">' . "\n";
             foreach ($postresults as $postresult) {
                 if ($postresult->post_date != '0000-00-00 00:00:00') {
                 $url = get_permalink($postresult->ID);
                 $arc_title    = $postresult->post_title;
                 if ($arc_title)
                     $text = wptexturize(strip_tags($arc_title));
                 else
                     $text = $postresult->ID;
                     $title_text = 'View this post, &quot;' . wp_specialchars($text, 1) . '&quot;';
                     $output .= '<li>' . mysql2date('d日', $postresult->post_date) . ':&nbsp;' . "<a href='$url' title='$title_text'>$text</a>";
                     $output .= '&nbsp;(' . $postresult->comment_count . ')';
                     $output .= '</li>' . "\n";
                 }
                 }
             }
             $output .= '</ul></li></ul>' . "\n";
             }
         update_option('SHe_archives_'.$lastpost,$output);
         }else{
             $output = '<div class="errorbox">Sorry, no posts matched your criteria.</div>' . "\n";
         }
     }
     echo $output;
 }
 
// 添加主题选项页面
function custom_theme_options_page() {
    add_menu_page(
        '主题设置', // 页面标题
        '主题设置', // 菜单标题
        'manage_options', // 权限要求
        'custom-theme-options', // 菜单 slug
        'custom_theme_options_page_callback', // 回调函数来显示页面内容
        'dashicons-admin-generic', // 菜单图标（这里使用一个通用的图标，你可以更改）
        60 // 菜单顺序
    );
}
add_action('admin_menu', 'custom_theme_options_page');

// 主题选项页面的回调函数，显示设置表单
function custom_theme_options_page_callback() {
    // 检查用户是否有合适的权限
    if (!current_user_can('manage_options')) {
        return;
    }
    // 处理表单提交
    if (isset($_POST['update_custom_theme_options'])) {
        // 验证并保存 logo、描述和关键词
        if (isset($_POST['site_logo'])) {
            update_option('site_logo', esc_url($_POST['site_logo']));
        }
        if (isset($_POST['site_description'])) {
            update_option('site_description', sanitize_text_field($_POST['site_description']));
        }
        if (isset($_POST['site_keywords'])) {
            update_option('site_keywords', sanitize_text_field($_POST['site_keywords']));
        }
		if (isset($_POST['site_donate'])) {
            update_option('site_donate', sanitize_text_field($_POST['site_donate']));
        }
        echo '<div class="updated"><p>设置已更新。</p></div>';
    }
    // 获取当前存储的选项值
    $site_logo = get_option('site_logo');
    $site_description = get_option('site_description');
    $site_keywords = get_option('site_keywords');
	$site_donate = get_option('site_donate');
   ?>
    <div class="wrap">
        <h1>主题设置</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="site_logo">网站 logo（URL）</label></th>
                    <td><input type="text" name="site_logo" id="site_logo" value="<?php echo esc_attr($site_logo);?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="site_description">网站描述</label></th>
                    <td><textarea name="site_description" id="site_description"><?php echo esc_textarea($site_description);?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="site_keywords">网站关键词</label></th>
                    <td><input type="text" name="site_keywords" id="site_keywords" value="<?php echo esc_attr($site_keywords);?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="site_donate">捐赠（地址）</label></th>
                    <td><input type="text" name="site_donate" id="site_donate" value="<?php echo esc_attr($site_donate);?>" /></td>
                </tr>
            </table>
            <?php submit_button('保存设置', 'primary', 'update_custom_theme_options');?>
        </form>
    </div>
    <?php
}