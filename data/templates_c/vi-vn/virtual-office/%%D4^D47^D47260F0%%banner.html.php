<?php /* Smarty version 2.6.27, created on 2014-04-28 08:33:42
         compiled from banner.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'banner.html', 10, false),array('modifier', 'date_format', 'banner.html', 63, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_ad_pic'])); ?>
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
<script>
var allows_maximum_input = "<?php echo $this->_tpl_vars['_allows_maximum_input']; ?>
";
var can_also_enter = "<?php echo $this->_tpl_vars['_can_also_enter']; ?>
";
</script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>


<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem30\').addClass(\'mActive\');
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
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 3): ?><?php echo $this->_tpl_vars['_ad_pic']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 1): ?><?php echo $this->_tpl_vars['_ad_pic']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?><?php echo $this->_tpl_vars['_ad_pic']; ?>
<?php endif; ?>
     </h2></div>
<div class="hint"><span class="btn_hint"><a href="banner.php?do=edit" class="btn_publish"><?php echo $this->_tpl_vars['_add_site_advertising']; ?>
</a></span></div>




<div class="tdare" style="clear:both">
  <form name="list_frm" id="ListFrm" action="" method="post">
  <table width="100%" cellspacing="0" class="dataTable bglist" summary="<?php echo $this->_tpl_vars['_data_zone']; ?>
">
    <thead>
		<tr>
		  <!--<th class="firstCell" wid><input type="checkbox" name="idAll" id="idAll" onclick="pbCheckAll(this,'id[]');" title="<?php echo $this->_tpl_vars['_select_switch']; ?>
"></th>-->
		  <th width="10%"><?php echo $this->_tpl_vars['_screenshot']; ?>
</th>
		  <th style="text-align: left"><label for="idAll"><?php echo $this->_tpl_vars['_the_title']; ?>
</label></th>
		  <!--<th><?php echo $this->_tpl_vars['_position']; ?>
</th>-->
		  <!--<th><?php echo $this->_tpl_vars['_if_online']; ?>
</th>-->
		  <!--<th><?php echo $this->_tpl_vars['_position']; ?>
</th>-->
		  <th><?php echo $this->_tpl_vars['_published']; ?>
</th>
		  <th><?php echo $this->_tpl_vars['_status']; ?>
</th>
		  
		  <th><?php echo $this->_tpl_vars['_clicks']; ?>
</th>
		  <th><?php echo $this->_tpl_vars['_action']; ?>
</th>
		</tr>
    </thead>
    <tbody>
		<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr class="tatr2">
		  <!--<td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>-->
		  <td><?php if ($this->_tpl_vars['item']['is_image'] == 1): ?><a href="<?php echo $this->_tpl_vars['item']['src']; ?>
" rel="lightbox"><img class="double-border" src="<?php echo $this->_tpl_vars['item']['src']; ?>
" width="150" /></a><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['start_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
<?php echo $this->_tpl_vars['_arrive_to']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
<?php endif; ?></td>
		  <td style="text-align: left;vertical-align: top"><label for="item_<?php echo $this->_tpl_vars['item']['id']; ?>
"><strong><?php echo $this->_tpl_vars['item']['title']; ?>
</strong></label>
		  <br />
		  <?php echo $this->_tpl_vars['_position']; ?>
: <?php echo $this->_tpl_vars['item']['industry_names']; ?>

		  
		  </td>
		  <!--<td><a title="<?php echo $this->_tpl_vars['_click_and_search']; ?>
" href="ad.php?do=search&adzone_id=<?php echo $this->_tpl_vars['item']['adzone_id']; ?>
"><?php echo $this->_tpl_vars['item']['adzone']; ?>
</a></td>-->
		 <!-- <td><?php echo $this->_tpl_vars['AdsStatus'][$this->_tpl_vars['item']['state']]; ?>
</td>-->
		<!-- <td><?php echo $this->_tpl_vars['item']['industry_names']; ?>
</td>-->
		<td>
			<?php if ($this->_tpl_vars['item']['status']): ?>
					<?php if ($this->_tpl_vars['item']['state'] == 1): ?>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=state&type=down&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_web_down_shelves']; ?>
">
					    <img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/published.png">
					</a>
				    <?php else: ?>
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=state&type=up&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_goods_on_shelves']; ?>
">
					    <img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/unpublished.png">
					</a>
				    <?php endif; ?>
			<?php endif; ?>
		</td>
		  <td><?php if ($this->_tpl_vars['item']['status']): ?><span class="stt_valid"><?php echo $this->_tpl_vars['_checkouted']; ?>
</span><?php else: ?><span class="stt_invalid"><?php echo $this->_tpl_vars['_nocheckout']; ?>
</span><?php endif; ?></td>
		  
		  <td><?php echo $this->_tpl_vars['item']['clicked']; ?>
</td>
		  <td class="handler">
          <ul id="handler_icon">
            <li><a class="btn_delete" href="banner.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
&adzone_id=<?php echo $this->_tpl_vars['item']['adzone_id']; ?>
&do=del<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_delete']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></li>
            <?php if (! $this->_tpl_vars['item']['status']): ?><li><a class="btn_edit" href="banner.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_edit']; ?>
"><?php echo $this->_tpl_vars['_edit']; ?>
</a></li><?php endif; ?>
          </ul>      
          </td>
		</tr>
		<?php endforeach; else: ?>
		<tr class="no_data info">
		  <td colspan="7"><?php echo $this->_tpl_vars['_no_datas']; ?>
</td>
		</tr>
		<?php endif; unset($_from); ?>
    </tbody>
	</table>
	<div id="dataFuncs" title="<?php echo $this->_tpl_vars['_action_zone']; ?>
">
    <!--<div class="left paddingT15" id="batchAction">
      <input type="submit" name="del" value="<?php echo $this->_tpl_vars['_delete']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="down" value="<?php echo $this->_tpl_vars['_set_offline']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="up" value="<?php echo $this->_tpl_vars['_set_online']; ?>
" class="formbtn batchButton"/>
    </div>-->
    <div class="pageLinks"><?php echo $this->_tpl_vars['ByPages']; ?>
</div>
    <div class="clear"/>
    </div>
	</form>
</div>


</div>
  </div>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>