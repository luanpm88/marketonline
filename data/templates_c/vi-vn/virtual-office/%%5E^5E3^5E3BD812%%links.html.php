<?php /* Smarty version 2.6.27, created on 2014-07-10 12:22:32
         compiled from links.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'links.html', 100, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_sms'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem15\').addClass(\'mActive\');
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
     <div class="main_content link_manage">
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     
     <div class="offer_info_title">
	
	<h2><?php echo $this->_tpl_vars['_link_manage']; ?>
</h2></div>
<div class="hint"><span class="btn_hint"><a href="pms.php?do=send" class="btn_publish"><?php echo $this->_tpl_vars['_send_message']; ?>
</a></span><?php echo $this->_tpl_vars['_sms_tips']; ?>
</div>



	  
	  
	  <!--<h1><?php echo $this->_tpl_vars['_agent']; ?>
 (<?php echo $this->_tpl_vars['CountAgent']; ?>
/10)</h1>
	  <table class="bglist">
            <tr align="center">

              <th style="text-align: left"><?php echo $this->_tpl_vars['_username']; ?>
</th>
	      <th style="text-align: left"><?php echo $this->_tpl_vars['_name']; ?>
</th>
	      <th style="text-align: left"><?php echo $this->_tpl_vars['_email']; ?>
</th>
	      <th style="text-align: left"><?php echo $this->_tpl_vars['_phone']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_status_link']; ?>
</th>
	      <th><?php echo $this->_tpl_vars['_checkout']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_created_link']; ?>
</th>
            </tr>-->
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<?php if ($this->_tpl_vars['item']['type_id'] == 2): ?>
            <!--<tr align="center" class="bggray">

              <td style="text-align: left"><?php echo $this->_tpl_vars['item']['username']; ?>
</td>
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['info']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['info']['last_name']; ?>
</td>
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['email']; ?>
</td>
	       <td style="text-align: left"><?php echo $this->_tpl_vars['item']['mobile']; ?>
</td>
              <td><?php if ($this->_tpl_vars['item']['company_status'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
	      <td><?php if ($this->_tpl_vars['item']['checkout'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
              <td><?php echo $this->_tpl_vars['item']['senddate']; ?>
</td>

            </tr>-->
	     <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
            <!--<tr align="center" class="bggray">
              <td colspan="7"><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
            </tr>
        </table>  -->
	  
	  
	  
	  <h1><?php echo $this->_tpl_vars['_customer']; ?>
</h1>
	  <table class="bglist">
            <tr align="center">

              <!--<th style="text-align: left"><?php echo $this->_tpl_vars['_username']; ?>
</th>-->
	      <th width="26%" style="text-align: left"><?php echo $this->_tpl_vars['_name']; ?>
</th>
	      <th width="35%" style="text-align: left"><?php echo $this->_tpl_vars['_email']; ?>
</th>
	      <th style="text-align: left"><?php echo $this->_tpl_vars['_phone']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_status_link']; ?>
</th>
	      <th><?php echo $this->_tpl_vars['_checkout']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_created_link']; ?>
</th>

            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<?php if ($this->_tpl_vars['item']['type_id'] == 3): ?>
            <tr align="center" class="bggray">

              <!--<td style="text-align: left"><?php echo $this->_tpl_vars['item']['username']; ?>
</td>-->
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['info']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['info']['last_name']; ?>
</td>
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['email']; ?>
</td>
	       <td style="text-align: left"><?php echo $this->_tpl_vars['item']['mobile']; ?>
</td>
              <td><?php if ($this->_tpl_vars['item']['company_status'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
	      <td><?php if ($this->_tpl_vars['item']['checkout'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
              <td><?php echo $this->_tpl_vars['item']['senddate']; ?>
</td>

            </tr>
	     <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
            <!--<tr align="center" class="bggray">
              <td colspan="7"><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
            </tr>-->
        </table>
	  
	  
	<form name="pmsfrm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <h1><?php echo $this->_tpl_vars['_new_member']; ?>
</h1>
       <table class="bglist">
            <tr align="center">

              <!--<th style="text-align: left"><?php echo $this->_tpl_vars['_username']; ?>
</th>-->
	      <th width="26%" style="text-align: left"><?php echo $this->_tpl_vars['_name']; ?>
</th>
	      <th width="35%" style="text-align: left"><?php echo $this->_tpl_vars['_email']; ?>
</th>
	      <th style="text-align: left"><?php echo $this->_tpl_vars['_phone']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_status_link']; ?>
</th>
	      <th><?php echo $this->_tpl_vars['_checkout']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_created_link']; ?>
</th>
	      <!--<th><?php echo $this->_tpl_vars['_action_link']; ?>
</th>-->
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<?php if ($this->_tpl_vars['item']['type_id'] == 1): ?>
            <tr align="center" class="bggray">

              <!--<td style="text-align: left"><?php echo $this->_tpl_vars['item']['username']; ?>
</td>-->
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['info']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['info']['last_name']; ?>
</td>
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['email']; ?>
</td>
	       <td style="text-align: left"><?php echo $this->_tpl_vars['item']['mobile']; ?>
</td>
              <td><?php if ($this->_tpl_vars['item']['company_status'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
	      <td><?php if ($this->_tpl_vars['item']['checkout'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
              <td><?php echo $this->_tpl_vars['item']['senddate']; ?>
</td>
	      <!--<td>		
		<?php if ($this->_tpl_vars['item']['company_status'] == 1 && $this->_tpl_vars['item']['checkout'] == 0 && $this->_tpl_vars['countAgent'] < 10): ?>
		    <a class="btn_agent" href="link.php?do=setAgent&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_set_agent']; ?>
"><?php echo $this->_tpl_vars['_set_agent']; ?>
</a>
		<?php endif; ?>
	      </td>-->
            </tr>
	    
		    <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
            <!--<tr align="center" class="bggray">
              <td colspan="8"><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
            </tr>-->
        </table>  
</form>
	  
   </div>
   </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>