<?php get_header(); ?>
<main>
          <article class="Vb Wb Xb Yb Zb ac bc cc Qb Rb J Sb Fb Tb">
            <?php
				$thumbnail_url = get_the_post_thumbnail_url(null, array(240, 240));
				if ($thumbnail_url) {
				?>
					<img class="K Gb Hb" src="<?php echo $thumbnail_url;?>" alt="<?php the_title();?>">
				<?php
				}
				?>
            <header class="s t u v M x y z">
              <h1 class="C t D v A B"><?php the_title(); ?></h1>
              <div class="M Ib N Jb Kb">
                <time><?php the_time('Y-m-d'); ?></time>
                <span class="s id u jd kd"></span>
                <?php the_category(', ') ?>
                <span class="s id u jd kd"></span>
                <span><?php echo cnwper_count_words($text); ?></span></div>
            </header>
            <section class="s t u v se x H z Dc" id=post_markdown__nRdJ1>
              <p><?php the_content(__('阅读全文')); ?></p>
             
            </section>
            <div class="E Ge w x He z de ee">
              <div class=d><?php the_title(); ?></div>
              <div>
                <a class="Cb Ie Ud Mb" href=<?php the_permalink() ?>><?php the_permalink() ?></a></div>
              <div class="m Je J">
                <div class="m kb Db pd Fb">
                  <div class=Ke>无责任编辑</div>
                  <div>
                   <?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></div>
                </div>
                <div class="m kb Db pd Fb">
                  <div class=Ke>发布时间</div>
                  <time><?php $timestamp = get_the_time('U'); $date_format = 'M jS, Y'; echo date($date_format, $timestamp); ?></time></div>
                <div class="m kb Db pd Fb">
                  <div class=Ke>版权协议</div>
                  <div>
                    <a class="Lb Ab Mb" href="/license.txt" target=_blank rel="license noopener noreferrer">WTFPL</a></div>
                </div>
              </div>
              <i class="a h Nf Zg ah bh ch dh eh fh gh hh ih R f S T jh kh lh mh Pf Sf nh oh ph qh Tf Uf Vf Wf rh sh th uh vh wh xh yh zh Gg Ig Ah Bh Ch Dh Eh Fh Gh Hh Ih Jh Kh Lh Mh Nh Oh Ph Qh"></i>
            </div>
            <div class="Jc F x H z">
              <?php $tags = get_the_tags(); if ($tags) { foreach ($tags as $tag) { echo '<a class="tag" href="'.get_tag_link($tag->term_id).'"># '.$tag->name.'</a>    '; } } ?></div>
          </article>
		  <?php $site_donate = get_option('site_donate'); if ($site_donate) { ?>
          <div class="Vb Wb Xb Yb Zb ac bc cc F x H z Qb Rb J Sb Fb Tb Bc Jc">
            <div>喜欢这篇文章？为什么不考虑打赏一下作者呢？</div>
            <a class="Vc Vd te Zd ae be ce Ab ue zc ve mb a Cc" href="<?php echo esc_attr($site_donate);?>" target=_blank rel="noopener noreferrer">爱发电</a></div><?php } ?>
			<div class="m Qb Rb J Sb Fb Tb we xe">
			  <div class="m ye ze Ae Be Ce ">
			  <?php if (get_previous_post()) { previous_post_link('<a class="prev-post-link">上一篇 ：%link</a>'); } else { echo "上一篇 ：已经是第一篇了"; }; ?>
			  </div>
			  <div class="m ye ze Ae De Ee">
				<?php if (get_next_post()) { next_post_link('<a class="next-post-link">下一篇 ：%link</a>'); } else { echo "下一篇：已经是最后一篇了"; }; ?>
			  </div>
			</div>
          <div class="Vb Wb Xb Yb Zb ac bc cc F x H z Qb Rb J Sb Fb Tb">
		  <div id="Comments"></div>
			<script>
			 Artalk.init({
			   el:        '#Comments',
			   pageKey:   '<?= addslashes(get_permalink()) ?>',
			   pageTitle: '<?= addslashes(get_the_title()) ?>',
			   server:    'https://artalk.gentpan.com',
			   site:      'gentpan',
			 })
			</script>
		  </div>
        </main>
      </div>
      <div class="mc Nc Oc Pc">
        <a class="Lb Ic Qc Rc Sc Tc Uc Wb Xb Yb Zb Vc Wc Xc cc" href=#>
          <i class="a E Kf Lf Mf Nf Of Pf Qf Rf Sf Tf Uf Vf Wf Xf Yf Zf ag bg cg dg"></i>
        </a>
      </div>
<?php get_footer(); ?>