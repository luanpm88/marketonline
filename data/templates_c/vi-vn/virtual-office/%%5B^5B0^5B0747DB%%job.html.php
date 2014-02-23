<?php /* Smarty version 2.6.27, created on 2013-12-25 16:20:13
         compiled from job.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'job.html', 25, false),array('function', 'cycle', 'job.html', 37, false),array('modifier', 'truncate', 'job.html', 38, false),array('modifier', 'strip_tags', 'job.html', 38, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_company_job'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem14\').addClass(\'mActive\');
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
     <div class="hint"><span class="btn_hint"><a href="job.php?do=edit"  class="btn_publish"><?php echo $this->_tpl_vars['_post_job']; ?>
</a></span><h3><?php echo $this->_tpl_vars['_job_list']; ?>
</h3></div>
        
		<form name="TradeFrm" method="post" action="<?php echo $_ENV['PHP_SELF']; ?>
">
		<?php echo smarty_function_formhash(array(), $this);?>

	    <table class="bglist">
              <tr>
                <th width="32%"><p align="left"><strong><?php echo $this->_tpl_vars['_job_title']; ?>
</strong></p></th>
                <th width="17%" align="center"><strong><?php echo $this->_tpl_vars['_created_date']; ?>
</strong></th>
                <th width="17%" align="center" ><strong><?php echo $this->_tpl_vars['_due_date']; ?>
</strong></th>
                <th width="17%" align="center" ><strong><?php echo $this->_tpl_vars['_status']; ?>
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
              <td height="25" style="text-align: left"><a href="job.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_self"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 65) : smarty_modifier_truncate($_tmp, 65)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></td>
		      <td align="center" valign="middle"><?php echo $this->_tpl_vars['item']['pubdate']; ?>
</td>
		      <td align="center" valign="middle"><?php echo $this->_tpl_vars['item']['expire_date']; ?>
</td>
		      <td align="center" valign="middle"><?php echo $this->_tpl_vars['CheckStatus'][$this->_tpl_vars['item']['status']]; ?>
</td>
		      <td align="center" valign="bottom"><a href="job.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_self"><?php echo $this->_tpl_vars['_modify']; ?>
</a>&nbsp;|&nbsp;<a href="job.php?do=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></td>
		      </tr>
              <?php endforeach; else: ?>
              <tr><td colspan="5"><div align="center"><?php echo $this->_tpl_vars['_no_datas_now']; ?>
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