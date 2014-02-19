<?php /* Smarty version 2.6.27, created on 2013-06-05 01:55:33
         compiled from intro.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'exp', 'intro.html', 50, false),array('function', 'pager', 'intro.html', 69, false),array('function', 'the_url', 'intro.html', 115, false),array('function', 'get_cache', 'intro.html', 129, false),array('modifier', 'date_format', 'intro.html', 56, false),array('block', 'product', 'intro.html', 114, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_intro']),'cur' => 'space_index')));
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
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row widget space_content">


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="eleven columns" id="content">


              
              <div class="row" style="margin-right: 0;">
    <div style="width: 100%;padding-left: 0" class="eleven columns">

	<div id="container">


<h3 style="padding-left: 10px; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_space_intro']; ?>
</h3>
		
<div class="row" style="padding-left: 20px; padding-top: 0;">                
                <img style="float: left; margin-right: 20px;border: solid 1px #ccc; width: 150px" src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
">
                
              <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</h3>
              
              <p><?php echo $this->_tpl_vars['COMPANY']['description']; ?>
</p>
              
              <br>
              <br style="clear: both">
		
		
		<div class="right_barintro">
				
		<div class="text">
			<ul>
				<li><p><span><?php echo $this->_tpl_vars['_boss_name']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['boss_name']; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_main_prod']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['main_prod']; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_main_market']; ?>
</span></p><p><?php echo smarty_function_exp(array('data' => ($this->_tpl_vars['options']['main_market']),'vars' => ($this->_tpl_vars['COMPANY']['main_market']),'sep' => "&nbsp;&nbsp;"), $this);?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_company_property']; ?>
</span></p><p><?php echo $this->_tpl_vars['options']['economic_type'][$this->_tpl_vars['COMPANY']['property']]; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_manage_type']; ?>
</span></p><p><?php echo smarty_function_exp(array('data' => ($this->_tpl_vars['options']['manage_type']),'vars' => ($this->_tpl_vars['COMPANY']['manage_type']),'sep' => "&nbsp;&nbsp;"), $this);?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_main_biz_place']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['main_biz_place']; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_reg_fund']; ?>
</span></p><p><?php echo $this->_tpl_vars['options']['reg_fund'][$this->_tpl_vars['COMPANY']['reg_fund']]; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_year_annual']; ?>
</span></p><p><?php echo $this->_tpl_vars['options']['year_annual'][$this->_tpl_vars['COMPANY']['year_annual']]; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_found_date']; ?>
</span></p><p><?php echo ((is_array($_tmp=$this->_tpl_vars['COMPANY']['found_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_reg_address']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['reg_address']; ?>
</p></li>
			</ul>
		</div>
		</div>
</div>  
			

			
		
		<div class="clear"></div>


						<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 20), $this);?>
</div></p>

</div>
    </div>

</div>
                  
              </div>



</div>



</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

















<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_product']),'cur' => 'space_product')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="wrapper">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "banner.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="content">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="rightbarcontact">
					<div class="playercontact">
					<div class="playerheadcontact"><span class="playlistcontact"><?php echo $this->_tpl_vars['_space_product']; ?>
</span><span class="player_head_concontact"></span><img src="<?php echo $this->_tpl_vars['SpaceUrl']; ?>
images/contactus_13.jpg" /></div>
					<div class="clear"></div>
					<div class="player_concontact clearfix">
						<ul>
					<?php $this->_tag_stack[] = array('product', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'typeid' => ($_GET['typeid']),'row' => 12)); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<li><a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
attachment/<?php echo $this->_tpl_vars['item']['picture']; ?>
.small.jpg" width="80" height="80" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
"></a><p><?php echo $this->_tpl_vars['item']['name']; ?>
</p></li>
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
						</ul>
						<div class="clear"></div>
						<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total'])), $this);?>
</div></p>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_intro']),'cur' => 'space_intro')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_get_cache(array('var' => 'options','name' => 'typeoption'), $this);?>

<div class="wrapper">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "banner.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="content">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="right_barintro">
				<div class="pic"><img src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
" /><p><span><?php echo $this->_tpl_vars['_space_intro']; ?>
</span><br /><br />    <?php echo $this->_tpl_vars['COMPANY']['description']; ?>
</p>
		<div class="clear"></div></div>
		<div class="text">
			<ul>
				<li><p><span><?php echo $this->_tpl_vars['_boss_name']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['boss_name']; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_main_prod']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['main_prod']; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_main_market']; ?>
</span></p><p><?php echo smarty_function_exp(array('data' => ($this->_tpl_vars['options']['main_market']),'vars' => ($this->_tpl_vars['COMPANY']['main_market']),'sep' => "&nbsp;&nbsp;"), $this);?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_company_property']; ?>
</span></p><p><?php echo $this->_tpl_vars['options']['economic_type'][$this->_tpl_vars['COMPANY']['property']]; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_manage_type']; ?>
</span></p><p><?php echo smarty_function_exp(array('data' => ($this->_tpl_vars['options']['manage_type']),'vars' => ($this->_tpl_vars['COMPANY']['manage_type']),'sep' => "&nbsp;&nbsp;"), $this);?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_main_biz_place']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['main_biz_place']; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_reg_fund']; ?>
</span></p><p><?php echo $this->_tpl_vars['options']['reg_fund'][$this->_tpl_vars['COMPANY']['reg_fund']]; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_year_annual']; ?>
</span></p><p><?php echo $this->_tpl_vars['options']['year_annual'][$this->_tpl_vars['COMPANY']['year_annual']]; ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_found_date']; ?>
</span></p><p><?php echo ((is_array($_tmp=$this->_tpl_vars['COMPANY']['found_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</p></li>
				<li><p><span><?php echo $this->_tpl_vars['_reg_address']; ?>
</span></p><p><?php echo $this->_tpl_vars['COMPANY']['reg_address']; ?>
</p></li>
			</ul>
		</div>
		</div>
		<div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>