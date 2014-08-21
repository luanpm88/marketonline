<?php /* Smarty version 2.6.27, created on 2014-08-21 10:17:32
         compiled from default%5Ccompany/search.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\company/search.html', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Thương hiệu - MarketOnline.vn",'nav_id' => ($this->_tpl_vars['nav_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div id="body-wrapper" >
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
  <div class="fifteen columns" style="padding-left: 0">

    <div id="page-title" class="connect_ptitle" style="padding-left: 110px">

    <div class="super-main-category mainproductpage company">
		<div class="show-but">
			Chuyên mục chính
			
		</div>
		<a href="<?php echo smarty_function_the_url(array('module' => 'companies'), $this);?>
" class="show-but current-but market">
			.			
		</a>
		<br style="clear:both" />
		<div class="main-cat-content-out">
			<span class="pointer_topmenuz">.</span>
			<div class="main-cat-content"></div>
		</div>
	</div>
    
    

    <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="<?php echo smarty_function_the_url(array('module' => 'offer_main'), $this);?>
">Thương hiệu</a></div>

    <h1 class="page-title">Thương hiệu <?php if ($this->_tpl_vars['industry']): ?>- <?php echo $this->_tpl_vars['industry']['name']; ?>
<?php endif; ?></h1>
    
  </div>

  </div>
</div>



<div class="row company-container">
		
	
	
      <div class="row" style="margin: 0">
	<div style="margin-top: 0px;padding-left: 4px;" class="fifteen columns">
      
	  <span style="margin-right: 20px" class="icon back"></span>
	      <h2 class="block-title">
		  <span class="keyword-announce">
                        Tìm thương hiệu theo từ khóa '<strong><?php echo $_GET['keyword']; ?>
</strong>'
		  </span>
	      </h2>
	</div>
      </div>
      
      
	<div style="float: right; width: 300px; margin-top: -50px" id="searchleft_innerbox">
	    <form action="<?php echo smarty_function_the_url(array('module' => 'companies','action' => 'search'), $this);?>
" method="get">
		<input type="hidden" name="do" value="company" />
		<input type="hidden" name="action" value="search" />
		<input type="text" placeholder="Tìm kiếm" name="keyword" style="float: left">
		<input type="submit" value="Tìm kiếm">
	    </form>
	</div>
      
        <div class="works-list">
                
                <div class="pagination-list company-pagination">
                    <?php echo $this->_tpl_vars['pagination']; ?>

                </div>
                <br style="clear:both" />
                
                <div class="pagination-list company-pagination">
                    <ul>
                        <li class="first"><a rel="1" href="javascript:void(0)">&lt;&lt;</a></li>
                        <li class="prev"><a rel="4" href="javascript:void(0)">&lt;</a></li>
                        <li class="num"><a rel="1" href="javascript:void(0)">1</a></li>
                        <li class="num"><a rel="2" href="javascript:void(0)">2</a></li>
                        <li class="num"><a rel="3" href="javascript:void(0)">3</a></li>
                        <li class="next"><a rel="6" href="javascript:void(0)">&gt;</a></li>
                        <li class="last"><a rel="42" href="javascript:void(0)">&gt;&gt;</a></li>
                    </ul>
                </div>
                <br style="clear:both" />
          
              <ul style="height: 230px;" class="filterable-grid">
                  
                  <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                      <li data-type="dentity motion sites web-design " data-id="id-1" class="item">
                          <div class="half odd">
                              <div class="pic"><img title="<?php echo $this->_tpl_vars['item']['name']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" style="margin:0 0;" src="<?php echo $this->_tpl_vars['item']['logo']; ?>
"></div>
                              
                              <a target="_blank" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" href="<?php echo $this->_tpl_vars['item']['href']; ?>
"></a>
                          </div>
                            <div class="description-bottom">
                                  <div class="title">				      
                                      <h4><a target="_blank" title="<?php echo $this->_tpl_vars['item']['name']; ?>
" href="<?php echo $this->_tpl_vars['item']['href']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></h4>
                                  </div>
                            </div>
                      </li>
                  <?php endforeach; endif; unset($_from); ?>
                    
              </ul>
        </div>
  
</div>




















</div>
  </div>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


