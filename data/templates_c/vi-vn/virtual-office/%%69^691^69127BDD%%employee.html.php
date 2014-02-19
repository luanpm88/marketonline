<?php /* Smarty version 2.6.27, created on 2014-01-08 16:05:48
         compiled from employee.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'employee.html', 25, false),array('function', 'cycle', 'employee.html', 39, false),)), $this); ?>
<?php $this->assign('page_title', "Hồ sơ ứng viên"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem32\').addClass(\'mActive\');
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
     <div class="hint"><span class="btn_hint"><a href="employee.php?do=edit"  class="btn_publish">Tạo hồ sơ mới</a></span><h3>Danh sách hồ sơ</h3></div>
        
		<form name="TradeFrm" method="post" action="<?php echo $_ENV['PHP_SELF']; ?>
">
		<?php echo smarty_function_formhash(array(), $this);?>

	    <table class="bglist">
              <tr>
                <th width="32%" style="text-align: left">Tiêu đề</th>
		<th>Trạng thái</th>
		<th>Đăng tin</th>
		<th>Tìm kiếm</th>
                <th width="17%" align="center"><strong><?php echo $this->_tpl_vars['_created_date']; ?>
</strong></th>
                
                <th width="17%" align="center"><strong><?php echo $this->_tpl_vars['_operation']; ?>
</strong></th>
                </tr>
              <tr>
		     
			  <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#F3F3F3,#ffffff"), $this);?>
">
              <td height="25" style="text-align: left">
		<a href="employee.php?do=step2&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_self"><?php echo $this->_tpl_vars['item']['expected_position']; ?>
</a>
	      </td>
	      <td align="center" valign="middle"><?php if ($this->_tpl_vars['item']['status']): ?><span class="finished">Đã hoàn tất</span><?php else: ?><span class="notfinished">Đang soạn</span><?php endif; ?></td>
	      
			<td>
				<?php if ($this->_tpl_vars['item']['status']): ?>
					<?php if ($this->_tpl_vars['item']['showed'] == 1): ?>
					    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=setShowed&type=down&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Hủy đăng tin">
						<img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/published.png">
					    </a>
					<?php else: ?>
					    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=setShowed&type=up&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Đăng tin">
						<img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/unpublished.png">
					    </a>
					<?php endif; ?>
				<?php endif; ?>
			</td>
				  
			<td>
				<?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['showed']): ?>
					<?php if ($this->_tpl_vars['item']['searched'] == 1): ?>
					    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=setSearched&type=down&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Không cho phép tìm kiếm">
						<img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/published.png">
					    </a>
					<?php else: ?>
					    <a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=setSearched&type=up&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="Cho phép tìm kiếm">
						<img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/unpublished.png">
					    </a>
					<?php endif; ?>
				<?php endif; ?>
			</td>
	      
		      <td align="center" valign="middle"><?php echo $this->_tpl_vars['item']['pubdate']; ?>
</td>
		      <td align="center" valign="bottom"><a href="employee.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_self">Chỉnh sửa</a>&nbsp;|&nbsp;<a onclick="return confirm('<?php echo $this->_tpl_vars['_delete_confirm']; ?>
')" href="employee.php?do=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></td>
		      </tr>
              <?php endforeach; else: ?>
              <tr><td colspan="6"><div align="center"><?php echo $this->_tpl_vars['_no_datas_now']; ?>
</div></td></tr>
			  <?php endif; unset($_from); ?>

          </table>
          <table>
          <tr>
            <td height="40" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
		</form>

</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>