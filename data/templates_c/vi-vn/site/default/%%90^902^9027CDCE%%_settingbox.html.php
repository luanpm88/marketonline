<?php /* Smarty version 2.6.27, created on 2014-06-13 09:38:10
         compiled from default/_settingbox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/_settingbox.html', 8, false),)), $this); ?>
            <a href="javascript:void(0)" class="setting"><img style="border: none" src="templates/default/image/setting-icon_small_w.png" width="20" height="20" /></a>
	    <div id="settingbox" style="display: none">
		<ul>
                    
                    <?php if ($this->_tpl_vars['pb_userinfo']['other_types']): ?>
                        <?php if ($this->_tpl_vars['pb_company']): ?>
                            <li <?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == 1 || $this->_tpl_vars['pb_userinfo']['current_type'] == 2 || $this->_tpl_vars['pb_userinfo']['current_type'] == 3): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename']),'change_current_type' => ($this->_tpl_vars['pb_userinfo']['membertype_id'])), $this);?>
">
                                    <?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

		    <?php $_from = $this->_tpl_vars['pb_userinfo']['other_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeitem_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeitem_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['typeitemkey0'] => $this->_tpl_vars['typeitem']):
        $this->_foreach['typeitem_0']['iteration']++;
?>
			<?php if ($this->_tpl_vars['typeitem']['membertype_id'] == 6): ?>
                            <li <?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == $this->_tpl_vars['typeitem']['membertype_id']): ?>class="active"<?php endif; ?>>                                
                                <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','change_current_type' => ($this->_tpl_vars['typeitem']['membertype_id'])), $this);?>
">
                                    <?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>

                                </a>
                            </li>
                        <?php endif; ?>
		    <?php endforeach; endif; unset($_from); ?>
		    
		    		    
		    <?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == 6): ?>
			<!--<li class="sline">.</li>-->
			<li>
			    <a href="<?php echo smarty_function_the_url(array('module' => 'studypost'), $this);?>
">Diễn đàn Dạy và Học</a>
			</li>
		    <?php endif; ?>
		    <li><a target="_blank" href="redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li class="sline">.</li>
		    <li><a href="logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
</a></li>
		</ul>
		<span class="pointer_topmenu">.</span>
	    </div>