<?php /* Smarty version 2.6.27, created on 2013-05-21 09:27:20
         compiled from standardtype.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_standards']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_standards']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="standard.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
		<li><a class="btn1" href="standard.php?do=type"><span><?php echo $this->_tpl_vars['_types']; ?>
</span></a></li>
    </ul>
</div>
<div class="info">
  <form method="post" id="EditFrm" action="standard.php" name="edit_frm">
  <input type="hidden" name="do" value="save_standardtype" />
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