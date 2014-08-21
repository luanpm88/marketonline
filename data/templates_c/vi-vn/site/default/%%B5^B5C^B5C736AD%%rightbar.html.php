<?php /* Smarty version 2.6.27, created on 2014-08-14 16:35:33
         compiled from default/job/rightbar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'announce', 'default/job/rightbar.html', 13, false),array('function', 'the_url', 'default/job/rightbar.html', 15, false),)), $this); ?>
<div class="banner-box">
			<div class="banner-img size300x250">
						<a target="_blank" rel="nofollow" href="http://truonghaiauto.com.vn/" tooltip="Banner bottom right Auto Truong Hai" tooltipenable="true">
							<img alt="Banner bottom right Auto Truong Hai" src="http://kinhdoanhtiepthi.vn/images/banners/bannerauto336-280.gif">
						</a>
						<!--Nơi đặt quảng cáo<br /><span></span>-->
			</div>			
		</div>
		
		<section class="widget-1 widget-first widget widget_nav_menu job-left-section" id="nav_menu-2"><div class="widget-inner">
			<h3>Kiến thức bổ sung</h3><ul class="menu" id="menu-features-list">

			<?php $this->_tag_stack[] = array('announce', array('row' => 10,'typeid' => 3)); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['announce']['status']): ?>
					<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'announce','id' => ($this->_tpl_vars['announce']['id'])), $this);?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
				<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		    
		    </ul></div>
		</section>
		
		<section class="widget-1 widget-first widget widget_nav_menu job-left-section" id="nav_menu-2"><div class="widget-inner">
			<h3>Tài liệu khác</h3><ul class="menu" id="menu-features-list">
			

			<?php $this->_tag_stack[] = array('announce', array('row' => 10,'typeid' => 4)); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['announce']['status']): ?>
					<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'announce','id' => ($this->_tpl_vars['announce']['id'])), $this);?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
				<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		    
		    </ul></div>
		</section>
		
		<section class="widget-1 widget-first widget widget_nav_menu job-left-section" id="nav_menu-2"><div class="widget-inner">
			<h3>Mẫu đơn xin việc</h3><ul class="menu" id="menu-features-list">

			<?php $this->_tag_stack[] = array('announce', array('row' => 10,'typeid' => 5)); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['announce']['status']): ?>
					<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'announce','id' => ($this->_tpl_vars['announce']['id'])), $this);?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
				<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		    
		    </ul></div>
		</section>
		
		<div class="banner-box">
			<div class="banner-img size300x120">Nơi đặt quảng cáo<br /><span></span></div>			
			<div class="banner-img size300x120">Nơi đặt quảng cáo<br /><span></span></div>
			<div class="banner-img size300x120">Nơi đặt quảng cáo<br /><span></span></div>
		</div>
		
		<!--<div class="banner-box">
			<div class="banner-img size100x320">Nơi đặt quảng cáo<br /><span>100x320</span></div>
			<div class="banner-img size100x320">Nơi đặt quảng cáo<br /><span>100x320</span></div>
		</div>-->