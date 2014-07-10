<?php /* Smarty version 2.6.27, created on 2014-07-09 11:51:30
         compiled from buyerorder_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'buyerorder_detail.html', 143, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_view_message'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem7\').addClass(\'mActive\');
	});
</script>
'; ?>


<div class="wrap clearfix">
    <div class="sidebar">
       <div class="sidebar_menu">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </div>
    </div>
     <div class="main_content">
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_order_detail']; ?>
</h2></div>
     <div class="blockBStore">
            <h3><?php echo $this->_tpl_vars['_buyer_information']; ?>
</h3>
            <div class="contStore" style="clear: both;">
              <div class="formProfile box-profile">		
		
		<p>
			<span><?php echo $this->_tpl_vars['_fullname']; ?>
:<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['fullname']; ?>

		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_mobile']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['mobile']; ?>

		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_email']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['email']; ?>

		</p>
		
			
		
		<p>
			<span><?php echo $this->_tpl_vars['_address']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['address']; ?>

		</p>
   
                
		
                
              </div>
	      
            </div>
          </div>
    <div class="blockBStore">
            <h3><?php echo $this->_tpl_vars['_receiver_information']; ?>
</h3>
            <div class="contStore" style="clear: both;">
              <div class="formProfile box-profile">		
		
		<p>
			<span><?php echo $this->_tpl_vars['_fullname']; ?>
:<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['receiver_fullname']; ?>

		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_mobile']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['receiver_mobile']; ?>

		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_email']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['receiver_email']; ?>

		</p>
		
			
		
		<p>
			<span><?php echo $this->_tpl_vars['_address']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Info']['receiver_address']; ?>

		</p>
   
                
		
                
              </div>
	      
            </div>
          </div>
    
    <div class="blockBStore">
            <h3><?php echo $this->_tpl_vars['_seller']; ?>
</h3>
            <div class="contStore" style="clear: both;">
              <div class="formProfile box-profile">		
		
		<p>
			<span><?php echo $this->_tpl_vars['_space_name']; ?>
:<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Seller']['space_name']; ?>

		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_mobile']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Seller']['mobile']; ?>

		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_email']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Seller']['email']; ?>

		</p>
		
			
		
		<p>
			<span><?php echo $this->_tpl_vars['_address']; ?>
<b class="red-bold"></b>&nbsp;</span>
			<?php echo $this->_tpl_vars['Seller']['address']; ?>

		</p>
   
                
		
                
              </div>
	      
            </div>
          </div>
     <div class="blank"></div>
     <br />
     <h3><?php echo $this->_tpl_vars['_product_list']; ?>
</h3>
	  <table class="news">
					<tr>
						<th><?php echo $this->_tpl_vars['_picture']; ?>
</th>
						<th><?php echo $this->_tpl_vars['_product']; ?>
</th>
						
						<th><?php echo $this->_tpl_vars['_quantity']; ?>
</th>
						<th><?php echo $this->_tpl_vars['_unit_price']; ?>
 (VNĐ)</th>
						<th><?php echo $this->_tpl_vars['_sum_price']; ?>
 (VNĐ)</th>					
						
					</tr>
					
						
													
							<?php $_from = $this->_tpl_vars['StickyItems']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sticky']):
?>
							<tr>
							<td class="offer_img"><img height="60" src="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
<?php echo $this->_tpl_vars['sticky']['image']; ?>
" border=0 alt="<?php echo $this->_tpl_vars['sticky']['title']; ?>
"></td>
							<td class="title_link">
								<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['sticky']['p_id']),'product_name' => ($this->_tpl_vars['sticky']['p_name'])), $this);?>
" title="<?php echo $this->_tpl_vars['sticky']['p_name']; ?>
"><?php echo $this->_tpl_vars['sticky']['p_name']; ?>
</a>
								
							</td>
							
							<td align=center><?php echo $this->_tpl_vars['sticky']['quantity']; ?>

								</td>
							<td align=right><?php echo $this->_tpl_vars['sticky']['p_price']; ?>
</td>
							<td align=right><?php echo $this->_tpl_vars['sticky']['p_total']; ?>
</td>
							
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							
							<tr>
								<td colspan=4 align=right><?php echo $this->_tpl_vars['_total']; ?>
</td>
								<td align=right><?php echo $this->_tpl_vars['StickyItems']['total']; ?>
 (VNĐ)</td>
							</tr>
							
						
					
				</table>
	  <a class="button" href="buyerorder.php">Về danh sách</a>
   </div>
     
   </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>