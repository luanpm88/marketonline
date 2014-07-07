<?php /* Smarty version 2.6.27, created on 2014-07-04 14:47:58
         compiled from news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'news.html', 25, false),array('modifier', 'truncate', 'news.html', 44, false),array('modifier', 'strip_tags', 'news.html', 46, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_companynews'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem'; ?>
<?php if ($this->_tpl_vars['typeid'] == 9): ?>20<?php else: ?>13<?php endif; ?><?php echo '\').addClass(\'mActive\');
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
     <div class="offer_info_title"><h2><?php if ($this->_tpl_vars['typeid'] == 9): ?><?php echo $this->_tpl_vars['_comnote']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['page_title']; ?>
<?php endif; ?></h2></div>
      <div class="hint"><span class="btn_hint"><a href="news.php?do=edit<?php if ($this->_tpl_vars['typeid'] == 9): ?>&typeid=9<?php endif; ?>" class="btn_publish"><?php echo $this->_tpl_vars['_post_companynews']; ?>
</a></span><?php echo $this->_tpl_vars['_add_news_show']; ?>
</div>  
		<form name="newsfrm" action="<?php echo $_SERVER['PHP_SELF']; ?>
<?php if ($this->_tpl_vars['typeid'] == 9): ?>?typeid=9<?php endif; ?>" method="post">
		    
		<?php echo smarty_function_formhash(array(), $this);?>

            <table class="bglist">
                <tr>
                  <th><input name="newsidAll" type="checkbox" id="check_all" title="<?php echo $this->_tpl_vars['_all_select']; ?>
"></th>
                  <th width="60%" style="text-align: left"><?php echo $this->_tpl_vars['_title']; ?>
</th>
                  <!--<th><?php echo $this->_tpl_vars['_category']; ?>
</th>
                  <th><?php echo $this->_tpl_vars['_state']; ?>
</th>-->
                  <th width="20%"><?php echo $this->_tpl_vars['_time']; ?>
</th>
                  <th width="20%"><?php echo $this->_tpl_vars['_operation']; ?>
</th>
                </tr>
				<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <tr align="center" class="bggray">
                  <td><input name="newsid[]" type="checkbox" id="newsid[]" rel="checkk_item" value="<?php echo $this->_tpl_vars['item']['CompanynewsId']; ?>
"></td>
                  <td style="text-align: left">
		    <time>
			<span class="day"><?php echo $this->_tpl_vars['item']['created_d']; ?>
/<?php echo $this->_tpl_vars['item']['created_f']; ?>
</span>
			<span class="mounth"><?php echo $this->_tpl_vars['item']['created_y']; ?>
</span>
			<span class="time"><?php echo $this->_tpl_vars['item']['created_time']; ?>
</span>
		    </time>
		    <a href="news.php?do=edit&id=<?php echo $this->_tpl_vars['item']['CompanynewsId']; ?>
<?php if ($this->_tpl_vars['typeid'] == 9): ?>&typeid=9<?php endif; ?>"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['CompanynewsTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 120) : smarty_modifier_truncate($_tmp, 120)); ?>
</strong></a>
		    <br />
		    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>

		  </td>
                <!--<td><?php echo $this->_tpl_vars['CompanynewsTypes'][$this->_tpl_vars['item']['type_id']]; ?>
</td>
                  <td><?php echo $this->_tpl_vars['CheckStatus'][$this->_tpl_vars['item']['status']]; ?>
</td>-->
                  <td><?php echo $this->_tpl_vars['item']['pubdate']; ?>
</td>
                  <td><a href="news.php?do=edit&id=<?php echo $this->_tpl_vars['item']['CompanynewsId']; ?>
<?php if ($this->_tpl_vars['typeid'] == 9): ?>&typeid=9<?php endif; ?>"><?php echo $this->_tpl_vars['_modify']; ?>
</a>
		  <br />
		  <a target="_blank" href="<?php echo $this->_tpl_vars['COMPANYINFO']['space_url']; ?>
/news/detail-<?php echo $this->_tpl_vars['item']['CompanynewsId']; ?>
.htmls<?php if ($this->_tpl_vars['typeid'] == 9): ?>?typeid=9<?php endif; ?>"><?php echo $this->_tpl_vars['_preview']; ?>
</a>
		  </td>
                </tr>
				<?php endforeach; else: ?>
				<?php endif; unset($_from); ?>
            </table>
            <table class="room_pages">
          <tr>
            <td><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
          </tr>
          </table>
            <table class="trade_line">
                <tr>
                  <td height="1" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/index_trade_line.gif"></td>
                </tr>
          
          <tr align="center" valign="bottom">
            <td height="40"><input name="del" type="submit" id="delete" value="<?php echo $this->_tpl_vars['_delete_select']; ?>
"></td>
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
