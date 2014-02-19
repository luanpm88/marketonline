<?php /* Smarty version 2.6.27, created on 2013-06-13 11:53:07
         compiled from offer.setting.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'offer.setting.html', 30, false),array('modifier', 'default', 'offer.setting.html', 30, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="../scripts/jquery/facebox/facebox.js" type="text/javascript"></script>
<link href="../scripts/jquery/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$.facebox.settings.loadingImage = SiteUrl+\'images/facebox/loading.gif\'; 
	$.facebox.settings.closeImage = SiteUrl+\'images/facebox/closelabel.gif\'; 
	$(\'a[rel*=facebox]\').facebox() 
})
</script>
'; ?>

<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_offer']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_offer']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="offer.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a class="btn1" href="offer.php?do=setting"><span><?php echo $this->_tpl_vars['_setting']; ?>
</span></a></li>
		<li><a href="offertype.php"><?php echo $this->_tpl_vars['_sorts']; ?>
</a></li>
    </ul>
</div>
<div class="info">
  <form method="post" id="EditFrm" action="offer.php" name="edit_frm">
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_expires_approach']; ?>
</th>
        <td class="paddingT15 wordSpacing5">          
		<?php echo smarty_function_html_radios(array('name' => 'data[setting][offer_expire_method]','options' => $this->_tpl_vars['SettingStatus'],'selected' => ((is_array($_tmp=@$this->_tpl_vars['item']['OFFER_EXPIRE_METHOD'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)),'separator' => '<br />'), $this);?>

        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_top_time_to_spend_points']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input type="text" name='data[setting][offer_moderate_point]' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['OFFER_MODERATE_POINT'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_resent_the_minimum_number_of_days']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input type="text" name='data[setting][offer_refresh_lower_day]' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['OFFER_REFRESH_LOWER_DAY'])) ? $this->_run_mod_handler('default', true, $_tmp, 3) : smarty_modifier_default($_tmp, 3)); ?>
" /><?php echo $this->_tpl_vars['_days']; ?>
</td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_update_interval']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input type="text" name='data[setting][offer_update_lower_hour]' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['OFFER_UPDATE_LOWER_HOUR'])) ? $this->_run_mod_handler('default', true, $_tmp, 24) : smarty_modifier_default($_tmp, 24)); ?>
" /><?php echo $this->_tpl_vars['_hours']; ?>
</td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_data_filtering']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => 'data[setting][offer_filter]','options' => $this->_tpl_vars['AskAction'],'selected' => ((is_array($_tmp=@$this->_tpl_vars['item']['OFFER_FILTER'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ' '), $this);?>
<label class="field_notice"><?php echo $this->_tpl_vars['_filtering_the_same_user_information']; ?>
</label></td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" name="setting" value="<?php echo $this->_tpl_vars['_save_setting']; ?>
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