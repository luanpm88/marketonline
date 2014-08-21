<?php /* Smarty version 2.6.27, created on 2014-08-14 15:19:33
         compiled from ad.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ad.html', 119, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$(\'a[rel*=lightbox]\').colorbox() 
})
</script>
'; ?>



<?php echo '
<script>
	$(document).ready(function() {
		$(\'.btn_paid\').click(function() {			
			if($(this).parent().find(\'input[name=months]\').val() != \'\' && $(this).parent().find(\'input[name=amount]\').val() != \'\') {
				if(confirm(\''; ?>
<?php echo $this->_tpl_vars['_checkout_confirm']; ?>
<?php echo '\')) {
					$(\'#paid_form input[name=id]\').val($(this).parent().find(\'input[name=id]\').val());
					$(\'#paid_form input[name=months]\').val($(this).parent().find(\'input[name=months]\').val());
					$(\'#paid_form input[name=amount]\').val($(this).parent().find(\'input[name=amount]\').val());
					$(\'#paid_form\').submit();
				}
			}
			else
			{
				alert("Chọn số tháng và số tiền!");
			}
		});
	});
</script>
'; ?>


<form id="paid_form" action="ad.php" method="get" style="position: absolute;top: -9000px">
	<input type="hidden" name="do" value="paid" />
	<input type="hidden" name="id" value="" />
	<input placeholder="tháng" type="text" name="months" style="float: left;width: 35px;margin-right: 5px;text-align: right" />
	<input placeholder="số tiền" type="text" name="amount" style="float: left;width: 100px;margin-right: 5px;text-align: right" />
	<a class="btn_paid check<?php echo $this->_tpl_vars['item']['id']; ?>
" href="#" title="<?php echo $this->_tpl_vars['_paid']; ?>
" onclick=""><?php echo $this->_tpl_vars['_paid']; ?>
</a>
</form>



<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_ads']; ?>
 &raquo; <?php echo $this->_tpl_vars['_ads']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_ads']; ?>
</h3> 
    <ul class="subnav">
		<li><a class="btn1" href="ad.php"><span><?php echo $this->_tpl_vars['_management']; ?>
</span></a></li>
        <li><a href="ad.php?do=edit"><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</a></li>
    </ul>
</div>
<div class="mrightTop"> 
    <div class="fontr"> 
        <form name="search_frm" id="SearchFrm" method="get"> 
        <input type="hidden" name="do" value="search" />
             <div>
		
		<?php if ($this->_tpl_vars['company_zone'] == 1): ?>
			<select onchange="$('#SearchFrm').submit()" name="company_industry_id" id="">
				<option value="">Chọn chuyên mục</option>
				<?php $_from = $this->_tpl_vars['CompanyTopLevel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
					<option value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['item']['id'] == $_GET['company_industry_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			<select onchange="$('#SearchFrm').submit()" name="membergroup_id" id="">
				<option value="">Chọn Nhóm</option>
				<option <?php if (1 == $_GET['membergroup_id']): ?>selected="selected"<?php endif; ?> value="1">Cửa hàng</option>
				<option <?php if (2 == $_GET['membergroup_id']): ?>selected="selected"<?php endif; ?> value="2">Cá nhân</option>
				<option <?php if (3 == $_GET['membergroup_id']): ?>selected="selected"<?php endif; ?> value="3">Công ty</option>
			</select>
		<?php endif; ?>
		
		<?php if ($_GET['adzone_id'] == 7): ?>
			<select onchange="$('#SearchFrm').submit()" name="industry_id" id="dataParentId">
				<option value="0">Chọn chuyên mục</option>
				<option value="-1" <?php if ($_GET['industry_id'] == "-1"): ?>selected="selected"<?php endif; ?>>Tất cả</option>
				<?php echo $this->_tpl_vars['CacheItems']; ?>

			</select>
		<?php endif; ?>
                <select onchange="$('#SearchFrm').submit()" class="querySelect" name="adzone_id" id="AdzoneId">
			<option value="0"><?php echo $this->_tpl_vars['_pls_select']; ?>
<?php echo $this->_tpl_vars['_adzone']; ?>
</option>
			<?php $_from = $this->_tpl_vars['Adzones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				<option <?php if ($_GET['adzone_id'] == $this->_tpl_vars['item']['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
		<select onchange="$('#SearchFrm').submit()" class="querySelect" name="status" id="AdStatus">
			<option value="">Trạng thái</option>
			<option <?php if ($_GET['status'] == '1'): ?>selected="selected"<?php endif; ?> value="1">Đã kích hoạt</option>
			<option <?php if ($_GET['status'] == '0'): ?>selected="selected"<?php endif; ?> value="0">Chưa kích hoạt</option>
		</select>
                <!--<input type="submit" class="formbtn" value="<?php echo $this->_tpl_vars['_searching']; ?>
" /> -->
            </div> 
        </form> 
    </div> 
    <div class="fontr"></div> 
</div> 
<div class="tdare">
  <form name="list_frm" id="ListFrm" action="" method="post">
  <table width="100%" cellspacing="0" class="dataTable" summary="<?php echo $this->_tpl_vars['_data_zone']; ?>
">
    <thead>
		<tr>
			<th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="pbCheckAll(this,'id[]');" title="<?php echo $this->_tpl_vars['_select_switch']; ?>
"></th>
			<th><?php echo $this->_tpl_vars['_screenshot']; ?>
</th>
			<th width="20%"><label for="idAll"><?php echo $this->_tpl_vars['_the_title']; ?>
</label></th>
			<th width="20%"><?php echo $this->_tpl_vars['_position']; ?>
</th>
			<th width="10%">state</th>
			<th width="10%">status</th>		  
			<th>Thứ tự</th>
			<th style="text-align: center" width="5%">clicks</th>
			<th><?php echo $this->_tpl_vars['_action']; ?>
</th>
		</tr>
    </thead>
    <tbody>
		<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr class="tatr2">
		  <td class="firstCell" style="padding-right: 20px"><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
		  <td style="padding-right: 10px;"><?php if ($this->_tpl_vars['item']['is_image'] == 1): ?><a href="<?php echo $this->_tpl_vars['item']['src']; ?>
" rel="lightbox"><img class="double-border" src="<?php echo $this->_tpl_vars['item']['src']; ?>
" width="150" /></a><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['start_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
<?php echo $this->_tpl_vars['_arrive_to']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
<?php endif; ?></td>
		  <td><label for="item_<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</label>
		  <br /><a target="_blank" href="http://marketonline.vn/<?php echo $this->_tpl_vars['item']['cache_spacename']; ?>
"><?php echo $this->_tpl_vars['item']['cache_spacename']; ?>
</a>
		  <br /><small><?php echo $this->_tpl_vars['item']['industry_names']; ?>
</small>
		  <br /><?php echo $this->_tpl_vars['item']['target_url']; ?>
</td>
		  <td><a title="<?php echo $this->_tpl_vars['_click_and_search']; ?>
" href="ad.php?do=search&adzone_id=<?php echo $this->_tpl_vars['item']['adzone_id']; ?>
"><?php echo $this->_tpl_vars['item']['adzone']; ?>
</a></td>
		  <td>
			<?php if ($this->_tpl_vars['item']['state']): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?>
		  </td>
		  <td>
			<?php if ($this->_tpl_vars['item']['status']): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?>
		  </td>		  
		  <td><input name="order[<?php echo $this->_tpl_vars['item']['id']; ?>
]" value="<?php echo $this->_tpl_vars['item']['display_order']; ?>
" style="text-align: right;width: 50px;margin-right: 20px;" /></td>
		  <td style="text-align: center;color: red"><strong><?php echo $this->_tpl_vars['item']['clicked']; ?>
</strong></td>
		  <td class="handler">
          <ul id="handler_icon">
            <li><a class="btn_delete" href="ad.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
&adzone_id=<?php echo $this->_tpl_vars['item']['adzone_id']; ?>
&do=del<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_delete']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></li>
            <li><a class="btn_edit" href="ad.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_edit']; ?>
"><?php echo $this->_tpl_vars['_edit']; ?>
</a></li>
		<?php if (! $this->_tpl_vars['item']['status']): ?>
			<li style="height: auto;display: block;width:auto">
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
				<input placeholder="tháng" type="text" name="months" style="float: left;width: 100px;margin-right: 5px;text-align: right" />
				<input placeholder="số tiền" type="text" name="amount" style="float: left;width: 100px;margin-right: 5px;text-align: right" />
				<br /><a class="btn_paid check<?php echo $this->_tpl_vars['item']['id']; ?>
" href="#checkout" title="<?php echo $this->_tpl_vars['_paid']; ?>
" onclick=""><?php echo $this->_tpl_vars['_paid']; ?>
</a>
			</li>
		<?php elseif ($this->_tpl_vars['item']['lastcheck']['id']): ?>
			<li style="height: auto;display: block;width:auto">
				Ngày thanh toán: <strong><?php echo $this->_tpl_vars['item']['lastcheck']['created']; ?>
 +<?php echo $this->_tpl_vars['item']['lastcheck']['months']; ?>
</strong><br/>				
				Ngày hết hạn: <strong <?php if ($this->_tpl_vars['item']['lastcheck']['warning']): ?>style="color:red"<?php endif; ?>><?php echo $this->_tpl_vars['item']['lastcheck']['deadline']; ?>
</strong>
				<br/>Amount: <br /> <strong><?php echo $this->_tpl_vars['item']['lastcheck']['amount']; ?>
</strong>
			</li>
		<?php endif; ?>
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
    <div class="left paddingT15" id="batchAction">
      <input type="submit" name="del" value="<?php echo $this->_tpl_vars['_delete']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="down" value="<?php echo $this->_tpl_vars['_set_offline']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="up" value="<?php echo $this->_tpl_vars['_set_online']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="saveorder" value="Lưu thứ tự" class="formbtn batchButton"/>
    </div>
    <div class="pageLinks"><?php echo $this->_tpl_vars['ByPages']; ?>
</div>
    <div class="clear"/>
    </div>
	</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>