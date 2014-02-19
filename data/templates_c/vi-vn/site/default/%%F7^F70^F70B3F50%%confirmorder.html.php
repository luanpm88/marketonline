<?php /* Smarty version 2.6.27, created on 2014-01-15 12:17:01
         compiled from default%5Cproduct/confirmorder.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/confirmorder.html', 132, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']),'nav_id' => ($this->_tpl_vars['nav_id']))));
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
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p></p>
        </div>
        <h1 class="page-title"><?php echo $this->_tpl_vars['_confirm_order']; ?>
</h1>

        <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product']; ?>
</a> </div>

    </div>





<div class="orderdetail_form_ut" style="clear: both">
    <div class="orderdetail_form">
	<div class="cart_content" style="clear: both">

    <div class="blank6"></div>
    
    <div class="blockBStore">
            <h3><?php echo $this->_tpl_vars['_buyer_information']; ?>
</h3>
            <div class="contStore" style="clear: both;padding-right: 30px">
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
            <div class="contStore" style="clear: both;padding-right: 20px">
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
    
    <div class="detailtopcon clearfix" style="clear: both;">
		<h3><?php echo $this->_tpl_vars['_products']; ?>
</h3>
		
		<div class="qiugouleftcon carttable">
			<form name="offer_list_frm" id="cart" method="GET">
				<input type='hidden' name="do" value="product" />
				<input type='hidden' name="action" value="confirmorder" />
				
				<table>
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
					
						
													
							<?php $_from = $this->_tpl_vars['StickyItems']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sticky_offer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sticky_offer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sticky']):
        $this->_foreach['sticky_offer']['iteration']++;
?>
							<tr>
							<td class="offer_img"><img src="<?php echo $this->_tpl_vars['sticky']['image']; ?>
" border=0 alt="<?php echo $this->_tpl_vars['sticky']['title']; ?>
"></td>
							<td class="title_link">
								<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['sticky']['p_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['sticky']['p_name']; ?>
"><?php echo $this->_tpl_vars['sticky']['p_name']; ?>
</a>
								
							</td>
							
							<td align=center><?php echo $this->_tpl_vars['sticky']['quantity']; ?>

								</td>
							<td align=right style="text-align: right;"><?php echo $this->_tpl_vars['sticky']['p_price']; ?>
</td>
							<td align=right style="text-align: right;"><?php echo $this->_tpl_vars['sticky']['p_total']; ?>
</td>
							
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<tr>
								<td colspan=4 align=right style="text-align: right;"><?php echo $this->_tpl_vars['_total']; ?>
</td>
								<td align=right style="text-align: right;"><?php echo $this->_tpl_vars['StickyItems']['total']; ?>
 VNĐ</td>
							</tr>
							<tr>
								<td colspan=5 align=right style="text-align: right;">
																		
										<input name="checkout" class="checkout_but"  type="submit" value="<?php echo $this->_tpl_vars['_confirm_order']; ?>
" />
									
										
								</td>								
							</tr>
						
					
				</table>
			</form>
		</div>
		
	</div>	
    <div class="blank6"></div>
</div>
</div>
</div>
	
	
	
	
	
	
</div>






</div>
  </div>




	
	
	
	
	
	
	
<script>
$("#SearchFrm").attr("action","<?php echo smarty_function_the_url(array('module' => 'search'), $this);?>
");
$("#hdModule").val("product");
$("#topMenuProduct").addClass("lcur");
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>