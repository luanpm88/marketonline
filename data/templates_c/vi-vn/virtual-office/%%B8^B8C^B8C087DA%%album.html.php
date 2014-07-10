<?php /* Smarty version 2.6.27, created on 2014-07-09 13:21:07
         compiled from album.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'album.html', 53, false),array('modifier', 'truncate', 'album.html', 53, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_company_album'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$(\'a[rel*=lightbox]\').colorbox({maxWidth:600,opacity:0.1});
})
</script>
'; ?>


<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem12\').addClass(\'mActive\');
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
     <div class="offer_info_title"><h2>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 3): ?><?php echo $this->_tpl_vars['_album_company']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 1): ?><?php echo $this->_tpl_vars['_album_shop']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?><?php echo $this->_tpl_vars['_album_person']; ?>
<?php endif; ?>
     </h2></div>
      <div class="hint"><span class="btn_hint"><a href="album.php?do=edit" class="btn_publish"><?php echo $this->_tpl_vars['_update_album']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a></span></div>
      <br />
	<table cellspacing="0" id="dataTable" class="datas">
		<thead>
		<tr>
			<td width="10%"><?php echo $this->_tpl_vars['_picture']; ?>
</td>
			<td><?php echo $this->_tpl_vars['_details']; ?>
</td>
			<td width="11%"><?php echo $this->_tpl_vars['_operation']; ?>
</td>
		</tr>
		</thead>
		<tbody>
          
		    <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		    <tr>
		    <td><a rel="lightbox" id="uploadpic_hover" href="<?php echo $this->_tpl_vars['item']['image']; ?>
" class="cboxElement"><img id="uploadpic" class="img_album" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="" border="0" width="160" style="padding: 6px; border: 1px solid #CCC; background-color: #FFF;"/></a></td>
		    <td valign="top">
			    <p><strong><?php echo $this->_tpl_vars['item']['title']; ?>
</strong></p>
		      <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 310) : smarty_modifier_truncate($_tmp, 310)); ?>
</p>
		    </td>
				  <td><a href="album.php?do=edit&id=<?php echo $this->_tpl_vars['item']['attachment_id']; ?>
"><?php echo $this->_tpl_vars['_modify']; ?>
</a><br /><a onClick="return window.confirm('<?php echo $this->_tpl_vars['_ok_image_delete']; ?>
')" href="album.php?do=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></td>
		    </tr>
		    <?php endforeach; else: ?>
		    <tr><td style="padding: 10px;" colspan="3"><div align="center"><?php echo $this->_tpl_vars['_no_image_now']; ?>
</div></td></tr>
		    <?php endif; unset($_from); ?>
	  
		</tbody>
	</table>
	<div id="footer" style="margin-top: 40px;"><?php echo $this->_tpl_vars['ByPages']; ?>
</div>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>