<?php
/*
Template Name: searchs
*/
?>
<?php get_header(); ?>
        <main>
          <div class="Qb Rb J Sb Fb Tb">
            <header class="Vb Wb Xb Yb Zb ac bc cc Fb F G H I">
              <h1 class="Ub s t u v">搜索</h1>
				<form method="get" class="searchbox" action="<?php bloginfo('url'); ?>/" onsubmit="return handleSearchSubmit(event)">
					<input class="M b N q J K L O e P Q R f S T U V W X Y Z ab bb cb db eb fb gb hb ib jb" name="s" type="text" placeholder="搜搜也精彩..."  onblur="if (this.value == '') {this.value = '';}" value="<?php echo $_GET['s']?$_GET['s']:''?>">
					<input type="submit" value="搜索" class="search-btn" style="display:none;"> <!-- 隐藏提交按钮 -->
				</form>
				<script>
					function handleSearchSubmit(event) {
						var input = document.querySelector('input[name="q"]');
						if (event.keyCode === 13 && input.value) { // 13是回车键的键码，检查是否按回车键且输入框有值
							window.location.href = '/search?q=' + encodeURIComponent(input.value);
							return false; // 阻止表单默认提交行为
						}
						return true;
					}
				</script>
			  </header>
            <div class="Vb Wb Xb Yb Zb ac bc cc E F G H I">
              <div class=Fb>这是
                <b><?php bloginfo('name'); ?></b>的站内搜索引擎。</div>
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