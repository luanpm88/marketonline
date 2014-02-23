<?php /* Smarty version 2.6.27, created on 2013-06-08 03:12:24
         compiled from job_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'job_detail.html', 2, false),array('function', 'pager', 'job_detail.html', 55, false),array('modifier', 'date_format', 'job_detail.html', 45, false),)), $this); ?>
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
	      
	      <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_job_name']; ?>
: <?php echo $this->_tpl_vars['item']['name']; ?>
</h3>
	      
	      
	      <div class="rightbarcontact">
			    <div class="company_job">
                    
                        <p><strong><?php echo $this->_tpl_vars['_require_gender']; ?>
</strong><?php echo $this->_tpl_vars['options']['gender'][$this->_tpl_vars['item']['require_gender_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_job_peoples']; ?>
</strong><?php echo $this->_tpl_vars['item']['peoples']; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_require_education']; ?>
</strong><?php echo $this->_tpl_vars['options']['education'][$this->_tpl_vars['item']['require_education_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_require_age']; ?>
</strong><?php echo $this->_tpl_vars['item']['require_age']; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_salary_scope']; ?>
</strong><?php echo $this->_tpl_vars['options']['salary'][$this->_tpl_vars['item']['salary_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_work_station']; ?>
</strong><?php echo $this->_tpl_vars['item']['work_station']; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_work_type']; ?>
</strong><?php echo $this->_tpl_vars['options']['work_type'][$this->_tpl_vars['item']['worktype_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_publish_date']; ?>
</strong><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_job_content']; ?>
</strong><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
                   </div>
			</div>
			<div class="clear"></div>
	      
						

	      
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


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['item']['name']),'cur' => 'space_hr')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_get_cache(array('var' => 'options','name' => 'typeoption'), $this);?>

<div class="wrapper">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "banner.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="content">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="rightbarcontact">
			    <div class="company_job">
                    <p class="title"><?php echo $this->_tpl_vars['_job_name']; ?>
<?php echo $this->_tpl_vars['item']['name']; ?>
</p>
                        <p><strong><?php echo $this->_tpl_vars['_require_gender']; ?>
</strong><?php echo $this->_tpl_vars['options']['gender'][$this->_tpl_vars['item']['require_gender_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_job_peoples']; ?>
</strong><?php echo $this->_tpl_vars['item']['peoples']; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_require_education']; ?>
</strong><?php echo $this->_tpl_vars['options']['education'][$this->_tpl_vars['item']['require_education_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_require_age']; ?>
</strong><?php echo $this->_tpl_vars['item']['require_age']; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_salary_scope']; ?>
</strong><?php echo $this->_tpl_vars['options']['salary'][$this->_tpl_vars['item']['salary_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_work_station']; ?>
</strong><?php echo $this->_tpl_vars['item']['work_station']; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_work_type']; ?>
</strong><?php echo $this->_tpl_vars['options']['work_type'][$this->_tpl_vars['item']['worktype_id']]; ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_publish_date']; ?>
</strong><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</p>
						<p><strong><?php echo $this->_tpl_vars['_job_content']; ?>
</strong><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
                   </div>
			</div>
			<div class="clear"></div>
		</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>