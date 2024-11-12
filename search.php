<?php get_header(); ?>
        <main>
          <div class="Qb Rb J Sb Fb Tb">
            <div class="m kb bd Fb">
				<?php if (have_posts()) :?>
				 <?php while (have_posts()) : the_post();?>
					 <?php
					if (has_post_thumbnail()) {
						// 如果有图片，显示以下内容
					?>
					<article class="m Vb Wb Xb Yb Zb ac bc cc vf">
						<a class="Ic if wf xf yf zf Af Bf Cf Df" href="<?php the_permalink()?>">
							<picture>
								<source srcset="<?php echo get_the_post_thumbnail_url(null, array(240, 240));?>" media="(max-width: 480px)">
								<img class="Ic if wf xf Bf Cf Df Ef sc Hb Ff Gf Hf If Jf" src="<?php echo get_the_post_thumbnail_url(null, array(240, 240));?>" alt="<?php the_title();?>" loading="lazy">
							</picture>
						</a>
						<div class="m F G H I kb Bb">
							<h3 class="s t Fb v c">
								<a class="Lb Mc" href="<?php the_permalink()?>"><?php the_title();?></a>
							</h3>
							<div class="Fb Jc Cb"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240,"...");?></div>
							<div class="Kb">
								<time><?php the_time('Y')?>-<?php the_time('m')?>-<?php the_time('d')?></time>
								<span class="s id u jd kd"></span>
								<?php the_category(', ');?>
							</div>
						</div>
					</article>
					<?php
					} else {
						// 如果没有图片，显示以下内容
					?>
					<article class="m Vb Wb Xb Yb Zb ac bc cc vf">
						<div class="m F G H I kb Bb">
							<h3 class="s t Fb v c">
								<a class="Lb Mc" href="<?php the_permalink()?>"><?php the_title();?></a>
							</h3>
							<div class="Fb Jc Cb"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240,"...");?></div>
							<div class="Kb">
								<time><?php the_time('Y')?>-<?php the_time('m')?>-<?php the_time('d')?></time>
								<span class="s id u jd kd"></span>
								<?php the_category(', ');?>
							</div>
						</div>
					</article>
					<?php
					}
					?>

			    <?php endwhile;?>
					<?php else :?>
						<p>没有找到相关结果。</p>
					<?php endif;?>
            </div>
				<?php
					global $wp_query;

					$total_pages = $wp_query->max_num_pages; // 获取当前查询结果的总页数
					$current_page = max(1, get_query_var('paged')); // 获取当前页码

					$prev_page = $current_page - 1;
					$next_page = $current_page + 1;

					if ($total_pages > 1) {
						echo '<div class="m n cd Cc s Sb Fb Tb">';
						if ($current_page > 1) {
							echo '<a class="dd n o ed Bc Ab Lb Vb M b N q Wb Xb Yb Zb cc fd" href="'. esc_url(get_pagenum_link($prev_page)). '">&lt;</a>';
						}
						$start_page = max(1, $current_page - 2);
						$end_page = min($start_page + 4, $total_pages);
						for ($i = $start_page; $i <= $end_page; $i++) {
							$is_active = ($i == $current_page)? 'active' : '';
							$class_str = ($i == $total_pages && $next_page > $total_pages)? 'dd n o ed Bc Ab Lb Vb M b N q Wb Xb Yb Zb cc fd' : 'dd n o ed Bc Ab Lb Vb M b N q Wb Xb Yb Zb cc fd';
							if ($i == $current_page) {
								$class_str.=' current-page'; // 添加当前页的类
							}
							echo '<a class="'.$class_str.'" href="'. esc_url(get_pagenum_link($i)). '">'.$i.'</a>';
						}
						if ($current_page < $total_pages) {
							echo '<a class="dd n o ed Bc Ab Lb Vb M b N q Wb Xb Yb Zb cc fd" href="'. esc_url(get_pagenum_link($next_page)). '">&gt;</a>';
						}
						echo '</div>';
					}
				?>
			</main>
		  </div>
		  <div class="mc Nc Oc Pc">
			<a class="Lb Ic Qc Rc Sc Tc Uc Wb Xb Yb Zb Vc Wc Xc cc" href=#>
			  <i class="a E Kf Lf Mf Nf Of Pf Qf Rf Sf Tf Uf Vf Wf Xf Yf Zf ag bg cg dg"></i>
			</a>
		  </div>
<?php get_footer(); ?>