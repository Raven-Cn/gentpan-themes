<?php get_header(); ?> 
        <main>
          <div class="Qb Rb J Sb Fb Tb">
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="Vb Wb Xb Yb Zb ac bc cc F G H I Fb">
              <h1 class="Ub s t u v"><?php the_title(); ?></h1></header>
            <div class="Vb Wb Xb Yb Zb ac bc cc F x H z">
			  <?php the_content(__('Read More')); ?>
			  </div>
			  <?php endwhile; endif; ?>
          </div>
        </main>
      </div>
      <div class="mc Nc Oc Pc">
        <a class="Lb Ic Qc Rc Sc Tc Uc Wb Xb Yb Zb Vc Wc Xc cc" href=#>
          <i class="a E Kf Lf Mf Nf Of Pf Qf Rf Sf Tf Uf Vf Wf Xf Yf Zf ag bg cg dg"></i>
        </a>
      </div>
<?php get_footer(); ?>


