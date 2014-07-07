<?php /* Smarty version 2.6.27, created on 2014-07-03 16:53:36
         compiled from offer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'offer.html', 39, false),array('function', 'pager', 'offer.html', 95, false),array('block', 'offer', 'offer.html', 56, false),array('modifier', 'truncate', 'offer.html', 57, false),array('modifier', 'pl', 'offer.html', 71, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_offer']),'cur' => 'space_index')));
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
    <div style="width: 100%;padding-left: 0; padding-right: 0" class="eleven columns">

	<div id="container">
	<div role="main" id="offer_list_page">







<div class="nntype">
    
	    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename']),'do' => 'offer','typeid' => 16), $this);?>
" <?php if ($this->_tpl_vars['Type']['id'] == 16): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_supply_corp']; ?>
</a>
	    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename']),'do' => 'offer','typeid' => 14), $this);?>
" <?php if ($this->_tpl_vars['Type']['id'] == 14): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_buy_offer']; ?>
</a>
	    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename']),'do' => 'offer','typeid' => 9), $this);?>
" <?php if ($this->_tpl_vars['Type']['id'] == 9): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_sell_offer']; ?>
</a>
	    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename']),'do' => 'offer','typeid' => 10), $this);?>
" <?php if ($this->_tpl_vars['Type']['id'] == 10): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_supply_offer']; ?>
</a>
	    
</div>

<div class="works-list offer_list">

<table width="98%" cellspacing="1">
	<tbody><tr class="table_th" style="color: #fff;">
	  <th width="15%" align="left"><?php echo $this->_tpl_vars['_picture']; ?>
</th>
	  <th width="52%" align="left"><?php echo $this->_tpl_vars['_title']; ?>
</th>
	  <th width="15%" align="left"><?php echo $this->_tpl_vars['_created_date']; ?>
</th>
	  <th width="15%" align="left"><?php echo $this->_tpl_vars['_contact']; ?>
</th>
	</tr>
		
<?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 10,'typeid' => $this->_tpl_vars['Type']['id'])); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						<!--<li><a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo $this->_tpl_vars['item']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" width="80" height="80" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"></a><p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</p></li>-->
						
						
						
						
						
						<tr>
								<td class="product" style="padding: 5px">
										<div class="imgoutz">
										<img alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
">
										</div>
								</td>
						<td style="padding: 6px 10px;">
								<a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a>
								<p style="margin-bottom: 0;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 350) : smarty_modifier_truncate($_tmp, 350)); ?>
</p>
						</td>
						
		

						<td><?php echo $this->_tpl_vars['item']['pubdate']; ?>
</td>
						<td>
								<a href="<?php echo $this->_tpl_vars['Menus']['contact']; ?>
"><span class="im_pms"><?php echo $this->_tpl_vars['_send_message']; ?>
</span></a>								
						</td>
				</tr>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>	
				
				
						
				
				
			
		
	
	
	
	
      </tbody></table>
</div>
	<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 10), $this);?>
</div></p>
</div>
	
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
