<?php /* Smarty version 2.6.27, created on 2013-10-21 16:08:51
         compiled from default%5Clist.default.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\list.default.html', 11, false),array('function', 'pager', 'default\\list.default.html', 31, false),array('modifier', 'pl', 'default\\list.default.html', 17, false),array('modifier', 'truncate_multi', 'default\\list.default.html', 17, false),array('modifier', 'default', 'default\\list.default.html', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="wrapper">
  <div class="content clearfix">
    <div class="tips"><span><?php echo $this->_tpl_vars['position']; ?>
</span></div>
    <div class="blank6"></div>
    <div class="companylistconleft">
        <div class="base_title">
          <h2><span class="corner_t_l"></span><span class="corner_t_m title_mouse"><?php echo $this->_tpl_vars['_search_result']; ?>
</span><span class="corner_t_r"></span></h2> 
	    </div>
        <div class="base_list_box box_bord">
           <div class="base_list_head"><strong><?php echo $this->_tpl_vars['_puglish_time']; ?>
</strong><a href="<?php echo smarty_function_the_url(array('module' => 'list','extra' => "filter,2592000|action,lists"), $this);?>
"><?php echo $this->_tpl_vars['_this_month']; ?>
</a><a href="<?php echo smarty_function_the_url(array('module' => 'list','extra' => "filter,604800|action,lists"), $this);?>
"><?php echo $this->_tpl_vars['_this_week']; ?>
</a><a href="<?php echo smarty_function_the_url(array('module' => 'list','extra' => "filter,86400|action,lists"), $this);?>
"><?php echo $this->_tpl_vars['_today_hours']; ?>
</a></div>
           <div class="base_list_content clearfix">	
           <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['items']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['items']['iteration']++;
?>
                <div class="base_list clearfix">
                    <?php if ($this->_tpl_vars['item']['picture']): ?><div class="base_list_img"><img src="<?php echo $this->_tpl_vars['item']['image']; ?>
" /></div><?php endif; ?>
                    <div class="base_list_info">
                      <span class="title title_link"><a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => ($this->_tpl_vars['module'])), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)))) ? $this->_run_mod_handler('truncate_multi', true, $_tmp, 80) : smarty_modifier_truncate_multi($_tmp, 80)); ?>
</a></span>
                      <p> <?php echo $this->_tpl_vars['item']['digest']; ?>
</p>
                      <div class="update_time"><em><?php echo $this->_tpl_vars['_update_time']; ?>
(<?php echo $this->_tpl_vars['item']['pubdate']; ?>
)</em>
					  <?php if ($this->_tpl_vars['item']['typename']): ?>
					  <?php echo $this->_tpl_vars['_categories']; ?>
[<a href="<?php echo smarty_function_the_url(array('module' => 'list','extra' => "typeid,".($this->_tpl_vars['item']['type_id'])), $this);?>
"><?php echo $this->_tpl_vars['item']['typename']; ?>
</a>]
					  <?php endif; ?>
					  </div>
					  <?php if ($this->_tpl_vars['item']['clicked']): ?>
                      <div class="txt_source"><span class="fr link-underline"><a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => ($this->_tpl_vars['module'])), $this);?>
"><?php echo $this->_tpl_vars['_visit_full_content']; ?>
...</a></span><?php echo $this->_tpl_vars['item']['clicked']; ?>
 <?php echo $this->_tpl_vars['_visited']; ?>
&nbsp;<?php echo $this->_tpl_vars['_source']; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['source'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_G']['site_name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_G']['site_name'])); ?>
</div>
					  <?php endif; ?>
                  </div>
                 </div>
                 <hr class="hr_dashed" />
               <?php endforeach; endif; unset($_from); ?>
                <div class="pagination2"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total'])), $this);?>
</div>
           </div>
        </div>
    </div>
    <div class="companylistconright">
      <div class="lookcompany">
        <div class="recommendcompanytop"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/lhighs.gif" /><?php echo $this->_tpl_vars['_category_nav']; ?>
</div>
        <div class="companylistseecon">
          <ul>
          	<?php $_from = $this->_tpl_vars['SubCats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item1']):
?>
            <li><a href="<?php echo smarty_function_the_url(array('module' => 'list','extra' => "typeid,".($this->_tpl_vars['item1']['id'])), $this);?>
"><?php echo $this->_tpl_vars['item1']['name']; ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      <div class="lookcompany" style="margin-top:10px;">
       <div class="companylistseecon" >
        <form action="<?php echo smarty_function_the_url(array('module' => 'search','do' => 'news'), $this);?>
" method="get" id="NewsSearchFrm"><input type="text" name="q" value="" class="input"/><input type="button" value="<?php echo $this->_tpl_vars['_search']; ?>
" onclick="$('#NewsSearchFrm').submit();" class="submit"/></form></div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  </div>
<script>
$("#SearchFrm").attr("action","<?php echo smarty_function_the_url(array('module' => 'search'), $this);?>
");
$("#topMenuNews").addClass("lcur");
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>