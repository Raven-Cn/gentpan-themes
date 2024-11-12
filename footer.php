<?php wp_footer(); ?>
<div class="mc Nc Oc Pc">
        <a class="Lb Ic Qc Rc Sc Tc Uc Wb Xb Yb Zb Vc Wc Xc cc" href="#">
          <i class="a E Kf Lf Mf Nf Of Pf Qf Rf Sf Tf Uf Vf Wf Xf Yf Zf ag bg cg dg"></i>
        </a>
      </div>
      <footer class="yc zc Ac mb Cb Vb Bc Cc cc Dc Ec Fc Gc Hc">
        <div class="Ic Jc Kc Lc">
          <div>Copyright © 2019 - 2024  <a class="Lb Mc Mb Pb" href="<?php $home_url = home_url(); echo $home_url; ?>"><?php bloginfo('name'); ?></a>
            </div>
          <div>Powered by
            <!-- -->
            <a class="zb Mc Mb" href="https://wordpress.org/" target="_blank" rel="noopener noreferer nofollow">Wordpress</a>
 <a class="zb Mc Mb" href="https://www.gentpan.com/wp-admin/" target="_blank" rel="noopener noreferer nofollow"><i class="fa fa-wordpress" aria-hidden="true"></i>
</a>
            <span class="s id u jd kd"></span>
            Designed by <a class="zb Mc Mb" href="https://baoshuo.ren/" target="_blank">Baoshuo</a></div>
        </div>
      </footer>
    </div>
	<script>
		window.addEventListener('load', function() {
		  const loadingBar = document.querySelector('.loading-bar');
		  let width = 0;
		  const interval = setInterval(function() {
			width++;
			loadingBar.style.width = width + '%';
			if (width >= 100) {
			  clearInterval(interval);
			  loadingBar.style.display = 'none';
			}
		  }, 30);
		});

		window.addEventListener('load', function() {
		  NProgress.done();
		});
	</script>
  </body>
</html>