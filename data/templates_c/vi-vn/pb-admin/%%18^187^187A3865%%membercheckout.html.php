<?php /* Smarty version 2.6.27, created on 2014-04-11 16:19:11
         compiled from membercheckout.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'membercheckout.html', 22, false),array('modifier', 'pl', 'membercheckout.html', 122, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_member_center']; ?>
 &raquo; <?php echo $this->_tpl_vars['_member']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_member']; ?>
</h3> 
    <ul class="subnav">
		<li><a class="btn1" href="member.php"><span><?php echo $this->_tpl_vars['_management']; ?>
</span></a></li>
        <li><a href="member.php?do=edit"><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</a></li>
        <li><a href="membertype.php"><?php echo $this->_tpl_vars['_sorts']; ?>
</a></li>        
        <li><a href="memberemail.php"><?php echo $this->_tpl_vars['_email_addr']; ?>
</a></li>        
    </ul>
</div>
<div class="mrightTop"> 
    <div class="fontr"> 
        <form name="search_frm" id="SearchFrm" method="get"> 
        <input type="hidden" name="do" value="search" />
             <div> 
				<?php echo $this->_tpl_vars['_cp_username']; ?>
 <input class="queryInput" type="text" name="member[name]" id="member_name" value="<?php echo $_GET['member']['name']; ?>
" /> 
                <select class="querySelect" name="groupid" id="Groupid">
				<option value="-1"><?php echo $this->_tpl_vars['_membership_type']; ?>
</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MembergroupOptions'],'selected' => $_GET['groupid']), $this);?>

				</select>
				<select name="member[status]" id="member_status">
				<option value="-1"><?php echo $this->_tpl_vars['_checked_status']; ?>
</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MemberStatus'],'selected' => $_GET['member']['status']), $this);?>

				</select>
                <input type="submit" name="search" id="Search" class="formbtn" value="<?php echo $this->_tpl_vars['_searching']; ?>
" /> 
            </div> 
        </form> 
    </div> 
    <div class="fontr"></div> 
</div> 
<div class="tdare">
  <form name="list_frm" id="ListFrm" action="" method="post">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />
  <table width="100%" cellspacing="0" class="dataTable" summary="<?php echo $this->_tpl_vars['_data_zone']; ?>
" id="dataZone">
		<thead>
			<tr>
			  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="pbCheckAll(this,'id[]');" title="<?php echo $this->_tpl_vars['_select_switch']; ?>
"></th>
			  <th><label for="idAll"><?php echo $this->_tpl_vars['_cp_username']; ?>
</label></th>
			  <th>Người giới thiệu</th>
			  <th>Khách hàng (đã giới thiệu)</th>
			   <th style="text-align: center;"><?php echo $this->_tpl_vars['_checkout']; ?>
</th>
			  <th><?php echo $this->_tpl_vars['_action']; ?>
</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
			  <th colspan="11"><div class="pageLinks"><?php echo $this->_tpl_vars['ByPages']; ?>
</div></th>
			</tr>
		<tfoot>
		<tbody>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<tr class="tatr2">
			  <td class="firstCell" valign="top"><?php if ($this->_tpl_vars['item']['candelete']): ?><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php endif; ?></td>
			  <td valign="top"><label for="item_<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['username']; ?>
</label><br><span style="color:gray;" title="<?php echo $this->_tpl_vars['item']['NickName']; ?>
"><small><?php echo $this->_tpl_vars['item']['NickName']; ?>
</small></span></td>
			  <td valign="top">
				<?php if ($this->_tpl_vars['item']['parent']): ?><a href="#"><?php echo $this->_tpl_vars['item']['parent']['username']; ?>
 (<?php echo $this->_tpl_vars['item']['parent']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['parent']['last_name']; ?>
)</a><?php endif; ?>
			  </td>
			  <td>
				<?php if ($this->_tpl_vars['item']['members']): ?>
				<table class="bglist" width="100%" style="background: #fff;padding: 5px;border: solid 1px #aaa">
					<tr align="center">
			    
					  <th style="text-align: left"><?php echo $this->_tpl_vars['_username']; ?>
</th>
					  <th style="text-align: left"><?php echo $this->_tpl_vars['_name']; ?>
</th>

					  <th><?php echo $this->_tpl_vars['_status_link']; ?>
</th>
					  <th><?php echo $this->_tpl_vars['_checkout']; ?>
</th>
					  <th>Thời gian</th>
					  <!--<th><?php echo $this->_tpl_vars['_action_link']; ?>
</th>-->
					</tr>
						    <?php $_from = $this->_tpl_vars['item']['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemc']):
?>

					<tr align="center" class="bggray">
			    
					  <td style="text-align: left"><?php echo $this->_tpl_vars['itemc']['username']; ?>
</td>
					  <td style="text-align: left"><?php echo $this->_tpl_vars['itemc']['info']['first_name']; ?>
 <?php echo $this->_tpl_vars['itemc']['info']['last_name']; ?>
</td>

					  <td style="text-align: center"><?php if ($this->_tpl_vars['itemc']['company_status'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
					  <td style="text-align: center"><?php if ($this->_tpl_vars['itemc']['checkout'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
					  <td><?php echo $this->_tpl_vars['itemc']['senddate']; ?>
</td>

					</tr>
					<?php endforeach; endif; unset($_from); ?>
				    </table>
				<?php endif; ?>

			  </td>
			  <td  style="text-align: center;padding-top: 10px" valign="top"><?php if ($this->_tpl_vars['item']['checkout'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
			  <td class="handler" valign="top">
              <ul id="handler_icon">
                <?php if ($this->_tpl_vars['item']['candelete']): ?><li><a class="btn_delete" href="member.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
&do=del<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_delete']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></li><?php endif; ?>
                <li><a class="btn_edit" href="member.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_edit']; ?>
"><?php echo $this->_tpl_vars['_edit']; ?>
</a></li>
		<li style="width: auto"><a class="btn_paid" href="member.php?do=paid&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_paid']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['_checkout_confirm']; ?>
')"><?php echo $this->_tpl_vars['_paid']; ?>
<br /></a></li>
		<li style="width: auto"><a class="btn_paid" href="member.php?do=unpaid&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo $this->_tpl_vars['addParams']; ?>
" title="<?php echo $this->_tpl_vars['_unpaid']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['_delete_checkout_confirm']; ?>
')"><?php echo $this->_tpl_vars['_unpaid']; ?>
</a></li>
              </ul>
              </td>
			</tr>
			<?php endforeach; else: ?>
			<tr class="no_data info">
			  <td colspan="11"><?php echo $this->_tpl_vars['_no_datas']; ?>
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
		<select name="pb_action" id="PbAction" class="actionsel" onchange="javascript:document.list_frm.submit()">
		<option value="0"><?php echo $this->_tpl_vars['_pls_select']; ?>
<?php echo $this->_tpl_vars['_action']; ?>
</option>
		<optgroup label="<?php echo $this->_tpl_vars['_checked_status']; ?>
">
		<option value="status_1"><?php echo $this->_tpl_vars['_check_passed']; ?>
</option>
		<option value="status_3"><?php echo $this->_tpl_vars['_no_verify_passing']; ?>
</option>
		<option value="status_0"><?php echo $this->_tpl_vars['_check_invalid']; ?>
</option>
		<option value="status_4"><?php echo $this->_tpl_vars['_forbid']; ?>
</option>
		<option value="status_2"><?php echo $this->_tpl_vars['_moderated']; ?>
</option>
		</optgroup>
		<optgroup label="<?php echo $this->_tpl_vars['_setting']; ?>
 <?php echo $this->_tpl_vars['_membership_type']; ?>
">
		<?php $_from = $this->_tpl_vars['Membertypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['usertype'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['usertype']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['usertype']['iteration']++;
?>
		<option value="membertype_<?php echo $this->_tpl_vars['key1']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item1'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)); ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
		</optgroup>
		<optgroup label="<?php echo $this->_tpl_vars['_setting']; ?>
 <?php echo $this->_tpl_vars['_member_group']; ?>
">
		<?php $_from = $this->_tpl_vars['MembergroupOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MembergroupOptions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MembergroupOptions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['item2']):
        $this->_foreach['MembergroupOptions']['iteration']++;
?>
		<option value="membergroup_<?php echo $this->_tpl_vars['key2']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item2'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)); ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
		</optgroup>
		</select>
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