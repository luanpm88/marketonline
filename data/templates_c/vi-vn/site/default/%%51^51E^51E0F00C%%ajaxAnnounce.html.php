<?php /* Smarty version 2.6.27, created on 2014-03-31 10:02:57
         compiled from default%5Cproduct/ajaxAnnounce.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'default\\product/ajaxAnnounce.html', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['Items']): ?><?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
<div class="announce-box">
    <span class="ann_close">x</span>
    <div class="announce-box-content">
                    <img src="<?php echo $this->_tpl_vars['item']['company_logo']; ?>
" />
                    <p class="content"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
                    <!--<p class="timeinbox">"<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
"</p>-->
                    <p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>
                    
    </div>

</div><?php endforeach; endif; unset($_from); ?>
<?php echo '
<script>
    $(\'.announce-box .ann_close\').click(function(){
                        $(this).parent().fadeOut();
    });
</script>
'; ?>

<?php endif; ?>