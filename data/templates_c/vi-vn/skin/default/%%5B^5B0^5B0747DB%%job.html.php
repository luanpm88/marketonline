<?php /* Smarty version 2.6.27, created on 2014-04-08 16:29:30
         compiled from job.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'job.html', 2, false),array('function', 'pager', 'job.html', 68, false),array('block', 'job', 'job.html', 44, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_news']),'cur' => 'space_index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_get_cache(array('var' => 'options','name' => 'typeoption'), $this);?>

<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row widget space_content">


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="eleven columns" id="content">


              
              <div class="row" style="margin-right: 0;">
    <div style="width: 100%;padding-left: 0" class="">

	<div id="container">
	<div class="works-list" id="">
	      
	      <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_job']; ?>
</h3>
	      
	      
	      <table width="98%" cellspacing="1">
	<tbody><tr class="table_th" style="color: #fff;">
	  <th width="22%" align="left"><?php echo $this->_tpl_vars['_job_name']; ?>
</th>
	  <th width="34%" align="left"><?php echo $this->_tpl_vars['_company']; ?>
</th>
	  <th width="14%" align="left"><?php echo $this->_tpl_vars['_work_station']; ?>
</th>
	  <th width="15%" align="left"><?php echo $this->_tpl_vars['_salary_scope']; ?>
</th>
	  <th width="30%" align="left"><?php echo $this->_tpl_vars['_publish_date_deadline']; ?>
</th>
	</tr>
		
		<?php $this->_tag_stack[] = array('job', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 10,'status' => 1,'start' => ($_GET['pos']))); $_block_repeat=true;smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				
				
				<tr>
						<td>
								<?php echo $this->_tpl_vars['job']['link']; ?>

						</td>
						<td><?php echo $this->_tpl_vars['job']['companyname']; ?>
</td>
						<td><?php echo $this->_tpl_vars['job']['area']; ?>
</td>
						<td><?php if ($this->_tpl_vars['job']['salary']): ?><?php echo $this->_tpl_vars['job']['salary']; ?>
 <?php echo $this->_tpl_vars['job']['salary_currency']; ?>
<?php else: ?>Thương lượng<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['job']['expired_dates']; ?>
</td>
				</tr>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>	
		
	
	
	
	
      </tbody></table>
	      
						

	      
        </div>
	<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total'])), $this);?>
</div></p>
</div>
    </div>

</div>
                  
              </div>



</div>



</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

