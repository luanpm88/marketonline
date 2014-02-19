<?php /* Smarty version 2.6.27, created on 2013-05-14 01:40:55
         compiled from productsort.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_product_center']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_product_center']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="product.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
		<li><a class="btn1" href="productsort.php"><span><?php echo $this->_tpl_vars['_category']; ?>
</span></a></a></li>
		<li><a href="productcategory.php"><?php echo $this->_tpl_vars['_product']; ?>
<?php echo $this->_tpl_vars['_sorts']; ?>
</a></a></li>
		<li><a href="brand.php"><?php echo $this->_tpl_vars['_brands']; ?>
</a></a></li>
		<li><a href="brandtype.php"><?php echo $this->_tpl_vars['_brands']; ?>
<?php echo $this->_tpl_vars['_sorts']; ?>
</a></a></li>
		<li><a href="price.php"><?php echo $this->_tpl_vars['_prices']; ?>
</a></a></li>
    </ul>
</div>
<div class="info">
  <form method="post" id="EditFrm" name="edit_frm">
  <input type="hidden" name="do" value="save" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_one_line_one_category']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><textarea style="width:250px;height:100px;" name="data[sort]" id="dataSort"><?php echo $this->_tpl_vars['sorts']; ?>
</textarea>
		<label class="field_notice"><?php echo $this->_tpl_vars['_press_enter_add_new']; ?>
</label></td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" value="<?php echo $this->_tpl_vars['_save']; ?>
" />
		</td>

      </tr>
    </table>
  </form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>