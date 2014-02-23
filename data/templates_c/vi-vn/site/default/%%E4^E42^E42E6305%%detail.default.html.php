<?php /* Smarty version 2.6.27, created on 2013-12-25 11:30:32
         compiled from default%5Cdetail.default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'default\\detail.default.html', 43, false),array('modifier', 'number_format', 'default\\detail.default.html', 66, false),array('block', 'news', 'default\\detail.default.html', 80, false),array('block', 'announce', 'default\\detail.default.html', 93, false),array('function', 'the_url', 'default\\detail.default.html', 95, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['item']['title']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div id="body-wrapper" class="article_content">
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">            
                        <p><?php echo $this->_tpl_vars['item']['typename']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['item']['title']; ?>
                   </h1>

        

    </div>
    <div class="fifteen columns"><div class="line" style="margin-bottom: 10px;padding-top: 0"></div></div>
</div>


<div class="row">
	<div id="job-content">
		
		
		<!--<div class="tips"><span><?php echo $this->_tpl_vars['position']; ?>
</span></div>-->
	    <div class="news_all clearfix">
	      <div class="news_all_left">
	       <div class="news_title">
		<div class="title_bar_s4">
		  <span class="title_top_s4"><span></span></span>
		  <!--<h2><span><?php echo $this->_tpl_vars['item']['title']; ?>
</span>
		  <p><?php echo $this->_tpl_vars['_source']; ?>
<span class="gray"><?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['source'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_G']['site_name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_G']['site_name'])); ?>
</span> <?php echo $this->_tpl_vars['_post_time']; ?>
<span class="gray">(<?php echo $this->_tpl_vars['item']['pubdate']; ?>
)</span><?php echo $this->_tpl_vars['_categories']; ?>
<span class="gray link-underline"><?php echo $this->_tpl_vars['item']['typename']; ?>
</span><?php echo $this->_tpl_vars['_font_size']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
&nbsp;<a href="javascript:void(false);" onclick="doZoom(16);"><?php echo $this->_tpl_vars['_large']; ?>
</a>&nbsp;<a href="javascript:void(false);" onclick="doZoom(14)"><?php echo $this->_tpl_vars['_middle']; ?>
</a>&nbsp;<a href="javascript:void(false);" onclick="doZoom(10)"><?php echo $this->_tpl_vars['_small']; ?>
</a></p>
		  </h2>-->
	       </div>
	       </div>
		<div class="news_all_left_con">
			  <div id="quoteFlash"></div>
			  <div class="clear"></div>
			  <?php if ($this->_tpl_vars['item']['picture']): ?>
			  <p class="left1"><img src="<?php echo $this->_tpl_vars['item']['image_url']; ?>
" /></p>
			  <?php endif; ?>
			  
		    
		    
		    
		  <div id="content"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
			  <div class="clear"></div>
			  
			  <div id="news_info" style="display: none">
			  <?php if ($this->_tpl_vars['item']['attach_hashid']): ?>[<a href="misc.php?do=download&aid=<?php echo $this->_tpl_vars['item']['attach_hashid']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/download.gif" border="0" /><?php echo $this->_tpl_vars['_download_attach']; ?>
</a>] <?php endif; ?>
			  <?php if ($this->_tpl_vars['item']['tag']): ?>[<?php echo $this->_tpl_vars['_tags']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
<?php echo $this->_tpl_vars['item']['tag_link']; ?>
] <?php endif; ?>
			  <?php if ($this->_tpl_vars['item']['download_article']): ?>[<a href="index.php?do=standard&action=downloadtxt&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/document.gif" border="0" /><?php echo $this->_tpl_vars['_download_article']; ?>
</a>]<?php endif; ?>
			  <!--[<a href="javascript:window.close()"><?php echo $this->_tpl_vars['_close_widow']; ?>
</a>]-->
			  <a class="print_but" href="javascript: window.print();"><?php echo $this->_tpl_vars['_print_page']; ?>
</a>
			  <?php if ($this->_tpl_vars['item']['clicked']): ?><?php echo $this->_tpl_vars['_views']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['clicked'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
<?php endif; ?>
		    </div>
			  
		    <div class="announce_navbar" style="display: none"><span><b><?php echo $this->_tpl_vars['_prev_record']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</b> <?php echo $this->_tpl_vars['item']['prev_link']; ?>
</a> </span><span><b><?php echo $this->_tpl_vars['_next_record']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</b> <?php echo $this->_tpl_vars['item']['next_link']; ?>
 </span></div>
		  
		</div>
	      </div>
	      <!--<div class="all_right">
	       <div class="title_bar_s4">
		  <span class="title_top_s4"><span></span></span>
		  <h3><?php echo $this->_tpl_vars['_related_info']; ?>
</h3>
	       </div>
		<div class="all_right_con">
		  <ul class="news_list">
		  <?php $this->_tag_stack[] = array('news', array('row' => 10,'titlelen' => 32,'typeid' => $this->_tpl_vars['item']['type_id'],'name' => 'r')); $_block_repeat=true;smarty_block_news($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		    <li> <?php echo $this->_tpl_vars['r']['link']; ?>
</li>
		  <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_news($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		  </ul>
		</div>
	      </div>-->
	      <div class="clear"></div>
	    </div>
		
		<div class="fifteen columns" style="padding: 0"><div class="line" style="margin-bottom: 10px;"></div></div>
		<section class="widget-1 widget-first widget widget_nav_menu job-left-section relate_announce" id="nav_menu-2"><div class="widget-inner">
			<h3>Bài liên quan</h3><ul class="menu" id="menu-features-list">
			
			<?php $this->_tag_stack[] = array('announce', array('row' => 10,'typeid' => $this->_tpl_vars['item']['announcetype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['announce']['status']): ?>
					<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a href="<?php echo smarty_function_the_url(array('module' => 'announce','id' => ($this->_tpl_vars['announce']['id'])), $this);?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
				<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		    
		    </ul></div>
		</section>
		
		
	</div>
	<div id="job-sidebar">
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/job/rightbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
		
	</div>
</div>


<div class="row">
	
	
	<div class="wrapper">
	  <div class="content">
	    
	  </div>
	</div>

</div>


</div>
  </div>






<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>