<?php
/*
Template Name: tag
*/
?>
<?php get_header(); ?> 
        <main>
          <div class="Qb Rb J Sb Fb Tb">
            <header class="Vb Wb Xb Yb Zb ac bc cc F G H I Fb">
              <h1 class="Ub s t u v">标签</h1></header>
            <div class="Vb Wb Xb Yb Zb ac bc cc F x H z">
			  <?php
				$tags = get_top_five_tags();
				if ($tags) {
					echo '<div class="tag-container">';
					foreach ($tags as $tag) {
						$class = in_array($tag, array_slice(get_top_five_tags(), 0, 5))? 'top-tag' : 'normal-tag';
						echo '<a href="'. esc_url(get_tag_link($tag->term_id)). '" class="a Cb Ab M Nb N Ob Pb Mb">'. esc_html($tag->name). '</a>';
					}
					echo '</div>';
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



