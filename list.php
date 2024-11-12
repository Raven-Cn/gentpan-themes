<?php
/*
Template Name: category
*/
?>
<?php get_header(); ?> 
		 <main>
          <div class="Qb Rb J Sb Fb Tb">
            <header class="Vb Wb Xb Yb Zb ac bc cc Fb F G H I">
              <h1 class="Ub s t u v">分类</h1></header>
				<div class="m Vb Wb Xb Yb Zb ac bc cc F G H I kb yb">
	             <?php
					$category_data = get_categories_with_count();
					if (!empty($category_data)) {
						foreach ($category_data as $category_name => $post_count) {
							$category_link = get_category_link(get_cat_ID($category_name));
							echo '';
							echo '<a href="'. esc_url($category_link). '" style="color:#c9d1d9;"><span>'. esc_html($category_name). '</span>';
							echo '<span class="Cb Db" style="float: right;">[ '. $post_count. ' ]</span></a>';
							echo '';
						}
					}
				 ?>
                </div>
         </div>
        </main>
      </div>
      <div class="mc Nc Oc Pc">
        <a class="Lb Ic Qc Rc Sc Tc Uc Wb Xb Yb Zb Vc Wc Xc cc" href=#>
          <i class="a E Kf Lf Mf Nf Of Pf Qf Rf Sf Tf Uf Vf Wf Xf Yf Zf ag bg cg dg"></i>
        </a>
      </div>
<?php get_footer(); ?>



