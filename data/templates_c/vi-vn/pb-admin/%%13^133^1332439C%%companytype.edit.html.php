<?php /* Smarty version 2.6.27, created on 2014-08-14 11:39:13
         compiled from companytype.edit.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_yellow_page']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_yellow_page']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="company.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a href="companytype.php"><span><?php echo $this->_tpl_vars['_types']; ?>
</span></a></li>
	<li><a class="btn1" href="companytype.php?do=edit"><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</a></li>
        <li><a href="albumtype.php"><?php echo $this->_tpl_vars['_album_category']; ?>
</a></li>
    </ul>
</div>
<div class="info">
  <form method="post" id="EditFrm" name="edit_frm">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />
  <input type="hidden" name="do" value="save" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> Tên Nhóm</th>
        <td class="paddingT15 wordSpacing5">
		<input name="companytype[name]" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" />
	</td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" value="<?php echo $this->_tpl_vars['_save']; ?>
" name="save" />
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