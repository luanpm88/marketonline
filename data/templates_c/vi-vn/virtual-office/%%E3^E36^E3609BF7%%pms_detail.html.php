<?php /* Smarty version 2.6.27, created on 2013-09-19 14:05:09
         compiled from pms_detail.html */ ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_view_message'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem16\').addClass(\'mActive\');
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
     <div class="blank"></div>
	  <form name="message_frm" id="MessageFrm" action="pms.php?do=send&to=<?php echo $this->_tpl_vars['item']['cache_from_username']; ?>
" method="post">
         <table class="offer_info_content">
          <?php if ($_GET['type']): ?>
		<tr>
		    <th class="circle_left"><?php echo $this->_tpl_vars['_receiver']; ?>
</th>
		    <td class="circle_right"><?php echo $this->_tpl_vars['item']['cache_to_username']; ?>
</td>
		</tr>
	    <?php else: ?>
		<tr>
		    <th class="circle_left"><?php echo $this->_tpl_vars['_sender']; ?>
</th>
		    <td class="circle_right"><?php echo $this->_tpl_vars['item']['cache_from_username']; ?>
</td>
		</tr>
	    <?php endif; ?>
           <tr>
              <th><?php echo $this->_tpl_vars['_time_n']; ?>
</th>
              <td><?php echo $this->_tpl_vars['item']['pubdate']; ?>
</td>
            </tr>
           <tr>
              <th><?php echo $this->_tpl_vars['_theme_n']; ?>
</th>
              <td><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
             </tr>
          <tr>
			  <th><?php echo $this->_tpl_vars['_content']; ?>
</th>
			  <td><?php echo $this->_tpl_vars['item']['content']; ?>
</td>
          </tr>
          <tr>
			  <th class="circle_bottomleft"></th>
			  <td class="circle_bottomright">
				<?php if (! $_GET['type']): ?><input type="submit" value=" <?php echo $this->_tpl_vars['_reply']; ?>
 " name="submit">&nbsp;<?php endif; ?>
				<input type="button" value=" <?php echo $this->_tpl_vars['_back']; ?>
 " name="back" onclick="window.location='pms.php<?php if ($_GET['type']): ?>?type=sent<?php endif; ?>';"></td>
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