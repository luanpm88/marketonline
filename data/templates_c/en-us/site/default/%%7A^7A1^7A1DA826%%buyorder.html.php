<?php /* Smarty version 2.6.27, created on 2013-06-01 06:50:54
         compiled from emails/buyorder.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'emails/buyorder.html', 128, false),)), $this); ?>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_order_detail']; ?>
</h2></div>
     <div>
     <div class="blockBStore" style="float: left; margin-right: 30px; width: 30%">
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
    <div class="blockBStore" style="float: left; margin-right: 30px; width: 30%">
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
    
    <div class="blockBStore" style="float: left; width: 30%">
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
    
    </div>
     <div class="blank"></div>
     <br style="clear: both" />
     <h3><?php echo $this->_tpl_vars['_list_items']; ?>
</h3>
	  <table class="news" width="100%" border="1" cellpadding="5" cellspacing="0">
					<tr>
						<th style="width: 70px !important"><?php echo $this->_tpl_vars['_picture']; ?>
</th>
						<th width="37%"><?php echo $this->_tpl_vars['_product']; ?>
</th>
						
						<th width="14%"><?php echo $this->_tpl_vars['_quantity']; ?>
</th>
						<th width="20%"><?php echo $this->_tpl_vars['_unit_price']; ?>
</th>
						<th width="20%"><?php echo $this->_tpl_vars['_sum_price']; ?>
</th>					
						
					</tr>
					
						
													
							<?php $_from = $this->_tpl_vars['StickyItems']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sticky']):
?>
							<tr>
							<td class="offer_img" style="line-height: 100%"><img width="78" src="<?php echo $this->_tpl_vars['sticky']['image']; ?>
" border=0 alt="<?php echo $this->_tpl_vars['sticky']['title']; ?>
"></td>
							<td class="title_link">
								<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['sticky']['p_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['sticky']['p_name']; ?>
"><?php echo $this->_tpl_vars['sticky']['p_name']; ?>
</a>
								
							</td>
							
							<td align=center><?php echo $this->_tpl_vars['sticky']['quantity']; ?>

								</td>
							<td align=right><?php echo $this->_tpl_vars['sticky']['p_price']; ?>
 VNĐ</td>
							<td align=right><?php echo $this->_tpl_vars['sticky']['p_total']; ?>
 VNĐ</td>
							
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							
							<tr>
								<td colspan=4 align=right><?php echo $this->_tpl_vars['_total']; ?>
</td>
								<td align=right><?php echo $this->_tpl_vars['StickyItems']['total']; ?>
 VNĐ</td>
							</tr>
							
						
					
				</table>