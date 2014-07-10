<?php /* Smarty version 2.6.27, created on 2014-07-07 16:26:16
         compiled from brand.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'brand.html', 29, false),array('modifier', 'nl2br', 'brand.html', 35, false),array('modifier', 'truncate', 'brand.html', 35, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_brands'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem'; ?>
<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>23<?php else: ?>6<?php endif; ?><?php echo '\').addClass(\'mActive\');
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
      <div class="hint"><span class="btn_hint"><a href="brand.php?do=edit<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>&type=service<?php endif; ?>" class="btn_publish"><?php echo $this->_tpl_vars['_add_brand']; ?>
</a></span><?php echo $this->_tpl_vars['_add_your_brands']; ?>
</div>               
     <table class="bglist" >
	<tr>
	    <th width="9%"><?php echo $this->_tpl_vars['_sample_image']; ?>
</th>
	    <th style="text-align: left"><?php echo $this->_tpl_vars['_content']; ?>
</th>
	</tr>
          <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
          <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#F1F1F1,#ffffff"), $this);?>
">
          <th width="10%" style="border-bottom: solid 1px #fff;background: #D8EADA"><a href="brand.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: underline;"><img style="padding: 6px; border: 1px solid #CCC; background-color: #FFF;" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="" border="0" width="80" height="80" /></a></th>
          <td style="border-bottom: solid 1px #fff">
          <div id="certs" align="left">
            <ul>
            <li><strong><?php echo $this->_tpl_vars['item']['name']; ?>
</strong></li>
            <li><?php echo $this->_tpl_vars['_description']; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</li>
            <li style="list-style:none"><a href="brand.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: underline;"><?php echo $this->_tpl_vars['_modify']; ?>
</a>&nbsp;<a href="brand.php?do=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" style="text-decoration: underline;"><?php echo $this->_tpl_vars['_delete']; ?>
</a></li>
            </ul>
          </div>
          </td>
          </tr>
          <?php endforeach; else: ?>
          <tr><td colspan="2"><div align="center"><?php echo $this->_tpl_vars['_no_datas_now']; ?>
</div></td></tr>
          <?php endif; unset($_from); ?>
      </table>				
     <table class="room_pages">
          <tr>
            <td><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
          </tr>
     </table> 
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>