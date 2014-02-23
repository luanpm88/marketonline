<?php /* Smarty version 2.6.27, created on 2013-12-19 08:21:32
         compiled from default%5Cjob/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\job/list.html', 15, false),array('function', 'pager', 'default\\job/list.html', 18, false),array('modifier', 'date_format', 'default\\job/list.html', 15, false),array('block', 'company', 'default\\job/list.html', 29, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']),'nav_id' => 9)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="wrapper">
	<div class="content">
		<div class="tips"><span><?php echo $this->_tpl_vars['position']; ?>
</span></div>
        <div class="blank6"></div>
		<div class="job_list_left fl">
           <div class="title_bar_s4">
              <span class="title_top_s4"><span></span></span>
              <h3><?php echo $this->_tpl_vars['_hr_information']; ?>
</h3>
           </div>
			<div class="job_list_c">
				<ul>
					<li class="title"><h3 class="fl"><span><?php echo $this->_tpl_vars['_hr_jobs']; ?>
</span></h3><em class="fl"><span><?php echo $this->_tpl_vars['_hr_company']; ?>
</span></em><p class="fl"><?php echo $this->_tpl_vars['_jobs_area_n']; ?>
</p><p class="fl"><?php echo $this->_tpl_vars['_post_time_n']; ?>
</p></li>
                    <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Items']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['Items']['iteration']++;
?>
					<li><h3 class="fl"><a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['userid'])), $this);?>
" title=""><?php echo $this->_tpl_vars['item']['name']; ?>
</a></h3><em class="fl co"><a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['userid'])), $this);?>
"><?php echo $this->_tpl_vars['item']['companyname']; ?>
</a></em><p class="fl"><?php echo $this->_tpl_vars['item']['work_station']; ?>
</p><p class="fl"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['pubdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</p></li>
                    <?php endforeach; endif; unset($_from); ?>
			  </ul>
			<div><div class="pagination2"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total'])), $this);?>
</div></div>
			</div>
		</div>
		<div class="job_good fr">
           <div class="title_bar_s4">
              <span class="title_top_s4"><span></span></span>
              <h3><?php echo $this->_tpl_vars['_recommended_company']; ?>
</h3>
           </div>

			<div class="job_good_c cb">
				<ul>
                	<?php $this->_tag_stack[] = array('company', array('type' => 'commend')); $_block_repeat=true;smarty_block_company($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
					<li><?php echo $this->_tpl_vars['company']['link']; ?>
</li>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_company($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			  </ul>
			</div>
		</div>
		<div class="blank6"></div>
		</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>