<?php /* Smarty version 2.6.27, created on 2013-09-23 09:27:42
         compiled from ads.html */ ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_self_advertising'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
      <div class="hint"><?php echo $this->_tpl_vars['_ads_list']; ?>
</div> 
	<table cellspacing="0" id="dataTable" class="datas">
		<thead>
		<tr>
			<td><p align="left"><?php echo $this->_tpl_vars['_ads_title']; ?>
</p></td>
			<td><?php echo $this->_tpl_vars['_details']; ?>
</td>
			<td><?php echo $this->_tpl_vars['_price_description_strip']; ?>
</td>
			<td><?php echo $this->_tpl_vars['_operation']; ?>
</td>
		</tr>
		</thead>
		<tbody>
			  <?php $_from = $this->_tpl_vars['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
              <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
		      <td><?php echo $this->_tpl_vars['item']['description']; ?>
</td>
		      <td><?php echo $this->_tpl_vars['item']['price']; ?>
</td>
		      <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=buy&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_apply']; ?>
</a></td>
			  </tr>
              <?php endforeach; else: ?>
              <tr><td colspan="4"><div align="center"><?php echo $this->_tpl_vars['_no_datas_now']; ?>
</div></td></tr>
			  <?php endif; unset($_from); ?>
		</tbody>
	</table>
	<div id="footer" style="margin-top: 40px;"></div>	
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>