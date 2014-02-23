<?php /* Smarty version 2.6.27, created on 2014-01-14 10:31:43
         compiled from job_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'job_detail.html', 2, false),array('function', 'pager', 'job_detail.html', 222, false),array('block', 'job', 'job_detail.html', 196, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['item']['name']),'cur' => 'space_index')));
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
	      <h6><a href="<?php echo $this->_tpl_vars['Menus']['job']; ?>
"><?php echo $this->_tpl_vars['_space_hr']; ?>
</a></h6>
	      <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_job_name']; ?>
: <?php echo $this->_tpl_vars['item']['name']; ?>
</h3>
	      
	      
	      
	      
	      

 <table width="98%" class="TableInfo" style="border-color: #aaa">
    
				<tbody>

				    <tr>
					<th width="20%" align="left"><?php echo $this->_tpl_vars['_require_gender']; ?>
</th>
					<td>
						<span class="JobName"><?php echo $this->_tpl_vars['options']['gender'][$this->_tpl_vars['item']['require_gender_id']]; ?>
</span>
					</td>
				</tr>
				    <tr>
					<th align="left"><?php echo $this->_tpl_vars['_education']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['options']['education'][$this->_tpl_vars['item']['require_education_id']]; ?>
																	
																										</td>
				</tr>
				<tr>
						<th align="left"><?php echo $this->_tpl_vars['_job_category']; ?>
</th>
						<td>
							<?php echo $this->_tpl_vars['item']['industry']; ?>
						</td>
					</tr>
				
				<tr>
						<th align="left"><?php echo $this->_tpl_vars['_job_nature']; ?>
</th>
						<td>
							<?php echo $this->_tpl_vars['options']['work_type'][$this->_tpl_vars['item']['worktype_id']]; ?>
						</td>
				</tr>
				    
				 <tr>
						<th align="left"><?php echo $this->_tpl_vars['_work_station']; ?>
</th>
						<td><?php echo $this->_tpl_vars['item']['area']; ?>
</td>
					</tr>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_require_age']; ?>
</th>
					<td>
					<?php echo $this->_tpl_vars['item']['require_age']; ?>

											</td>
				</tr>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_exper']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['item']['exper']; ?>
																	
					</td>
				</tr>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_salary_scope']; ?>
</th>
					<td><?php if ($this->_tpl_vars['item']['salary']): ?><?php echo $this->_tpl_vars['item']['salary']; ?>
 <?php echo $this->_tpl_vars['item']['salary_currency']; ?>
/tháng<?php else: ?>Thương lượng<?php endif; ?></td>
				</tr>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_testtime']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['testtime']; ?>
					</td>
				</tr>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_job_number']; ?>
 (<?php echo $this->_tpl_vars['_peoples']; ?>
)</th>
					<td>
						<?php echo $this->_tpl_vars['item']['peoples']; ?>
					</td>
				</tr>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_publish_date_deadline']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['expired_dates']; ?>
</td>
				</tr>
				
				
				
				
				<tr>
					<th align="left" valign="top"><?php echo $this->_tpl_vars['_job_description']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['content']; ?>
					</td>
				</tr>
				
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_skills']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['skills']; ?>
					</td>
				</tr>
				
				
				

				
				
				<tr style="display: none">
					<th align="left"><?php echo $this->_tpl_vars['_salary_scope']; ?>
</th>
					<td>
					<?php echo $this->_tpl_vars['options']['salary'][$this->_tpl_vars['item']['salary_id']]; ?>

										<br>
																																																										</td>
				</tr>

									
				
				<tr style="display: none">
						<th align="left"><?php echo $this->_tpl_vars['_work_type']; ?>
</th>
						<td>
							<?php echo $this->_tpl_vars['options']['work_type'][$this->_tpl_vars['item']['worktype_id']]; ?>
						</td>
					</tr>
									
				<!--<tr>
					<th align="left"><?php echo $this->_tpl_vars['_require_education']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['options']['education'][$this->_tpl_vars['item']['require_education_id']]; ?>
																	
																										</td>
				</tr>-->
				
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_job_other']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['item']['job_other']; ?>
																	
																										</td>
				</tr>
				
				
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_rprofile']; ?>
</th>
					<td>
					<?php echo $this->_tpl_vars['item']['rprofile']; ?>

											</td>
				</tr>
				
				
				
				
			</tbody>
 </table>

  
  

  

	      
	      
	      
	     
	      
						

	      
        </div>
	
	
	
	
	
	<div class="works-list" id="">
	      
	      <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_other_job']; ?>
</h3>
	      
	      
	      <table width="98%" cellspacing="1">
	<tbody><tr class="table_th" style="color: #fff;">
	  <th width="20%" align="left"><?php echo $this->_tpl_vars['_job_name']; ?>
</th>
	  <th width="34%" align="left"><?php echo $this->_tpl_vars['_company']; ?>
</th>
	  <th width="16%" align="left"><?php echo $this->_tpl_vars['_work_station']; ?>
</th>
	  <th width="15%" align="left"><?php echo $this->_tpl_vars['_salary_scope']; ?>
</th>
	  <th width="30%" align="left"><?php echo $this->_tpl_vars['_publish_date_deadline']; ?>
</th>
	</tr>
		
		<?php $this->_tag_stack[] = array('job', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 10,'status' => 1)); $_block_repeat=true;smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<?php if ($this->_tpl_vars['item']['id'] != $this->_tpl_vars['job']['id']): ?>
				
				<tr>
						<td>
								<?php echo $this->_tpl_vars['job']['link']; ?>

						</td>
						<td><?php echo $this->_tpl_vars['job']['companyname']; ?>
</td>
						<td><?php echo $this->_tpl_vars['job']['area']; ?>
</td>
						<td><?php echo $this->_tpl_vars['job']['salary']; ?>
</td>
						<td><?php echo $this->_tpl_vars['job']['expired_dates']; ?>
</td>
				</tr>
				
			<?php endif; ?>
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
