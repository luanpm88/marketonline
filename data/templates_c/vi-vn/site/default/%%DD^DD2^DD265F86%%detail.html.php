<?php /* Smarty version 2.6.27, created on 2014-07-04 13:41:52
         compiled from default%5Cjob/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get', 'default\\job/detail.html', 69, false),array('function', 'the_url', 'default\\job/detail.html', 116, false),array('function', 'pager', 'default\\job/detail.html', 364, false),array('modifier', 'count', 'default\\job/detail.html', 70, false),array('block', 'job', 'default\\job/detail.html', 349, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_job_name']).": ".($this->_tpl_vars['item']['name']),'nav_id' => 9)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>

<div id="body-wrapper" >
<div id="body-wrapper-padding" class="job_page">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php echo '
    <script>
	jQuery(document).ready(function($) {		
	    if($(\'.works-list tr\').length < 2)
	    {
		$(\'.works-list\').remove();
	    }
	});
    </script>
'; ?>



<div class="row">
  <div class="fifteen columns">

    <div id="page-title">

    <a class="back" href="javascript:history.back()"></a>
    <div class="subtitle">
        <?php echo $this->_tpl_vars['_job_head']; ?>

    </div>
   
    
	<h1 class="page-title"><?php echo $this->_tpl_vars['_job_name']; ?>
: <?php echo $this->_tpl_vars['item']['name']; ?>
</h1>

	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/job/postitem.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
    
  </div>

  
  </div>
</div>



<div class="row" style="margin-top: 5px;">
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/job/jobsearchbox.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
</div>

<div class="row">
	<div id="job-content">
		
		
		
		<div id="TopWorkCategory">
			<h4>Đối tượng tuyển dụng</h4>
		      <ul class="list-hot-cat">
				<li rel="0" <?php if (! $_GET['type']): ?>class="active"<?php endif; ?>><a href="javascript:void(0)">Tất cả</a></li>
				<?php echo smarty_function_get(array('from' => 'type','name' => 'jobtype','var' => 'Items'), $this);?>

				<?php if (count($this->_tpl_vars['Items']) == 0): ?>
				<?php echo smarty_function_get(array('var' => 'IndustryList','from' => 'industry'), $this);?>

				<?php else: ?>
				<?php $this->assign('IndustryList', ($this->_tpl_vars['Items'])); ?>
				<?php endif; ?>
				<?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['IndustryList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['IndustryList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['industry_item']):
        $this->_foreach['IndustryList']['iteration']++;
?>
					<li <?php if ($_GET['type'] == $this->_tpl_vars['industry_item']['id']): ?>class="active"<?php endif; ?> rel="<?php echo $this->_tpl_vars['industry_item']['id']; ?>
"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['industry_item']['name']; ?>
</a></li>			 
				<?php endforeach; endif; unset($_from); ?>
			
		      </ul>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		<!--<h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_job_name']; ?>
: <?php echo $this->_tpl_vars['item']['name']; ?>
</h3>-->
	      
	      
	      <h3><?php echo $this->_tpl_vars['_job_name']; ?>
: <?php echo $this->_tpl_vars['item']['name']; ?>
</h3>
	      
	      

 <table width="100%" class="TableInfo" style="border-color: #aaa; margin-top: 10px;padding: 5px;">
    
				<tbody>
					
					
					<tr>
					<td colspan="2" class="left_com_infotd" style="max-width: none;width: 835px">
					    
					    
					    <div class="company-info">
								
								<div class="columns logo logoz">
								    <?php if ($this->_tpl_vars['companyinfo']['membertype_id'] == 5): ?>
									<img src="<?php echo $this->_tpl_vars['companyinfo']['logosmall']; ?>
">
								    <?php else: ?>
									<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['companyinfo']['cache_spacename'])), $this);?>
"><img src="<?php echo $this->_tpl_vars['companyinfo']['logosmall']; ?>
"></a>
								    <?php endif; ?>								    
								</div>
		    
		    <div class="text left_com_info">
			    <h3>
				<?php if ($this->_tpl_vars['companyinfo']['membertype_id'] == 5): ?>
				    <?php echo $this->_tpl_vars['companyinfo']['name']; ?>

				<?php else: ?>
				    <a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['companyinfo']['cache_spacename'])), $this);?>
"><?php echo $this->_tpl_vars['companyinfo']['name']; ?>
</a>
				<?php endif; ?>
			    </h3>
			    <p><label><?php echo $this->_tpl_vars['_address']; ?>
</label> <?php echo $this->_tpl_vars['companyinfo']['address']; ?>
</p>
			    <?php if ($this->_tpl_vars['companyinfo']['tel']): ?><p><label><?php echo $this->_tpl_vars['_phone']; ?>
</label> <?php echo $this->_tpl_vars['companyinfo']['tel']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['companyinfo']['fax']): ?><p><label><?php echo $this->_tpl_vars['_fax']; ?>
</label> <?php echo $this->_tpl_vars['companyinfo']['fax']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['companyinfo']['email']): ?><p><label><?php echo $this->_tpl_vars['_email']; ?>
</label> <?php echo $this->_tpl_vars['companyinfo']['email']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['companyinfo']['site_url_name']): ?><p><label><?php echo $this->_tpl_vars['_company_home']; ?>
</label> <a target="_blank" rel="nofollow" href="http://<?php echo $this->_tpl_vars['companyinfo']['site_url_name']; ?>
"><?php echo $this->_tpl_vars['companyinfo']['site_url_name']; ?>
</a></p><?php endif; ?>			
		    </div>
								
								
								
								
								
								
								<!--<span class="company-logo">
						    <img height="100" width="200" border="0" src="http://images.vietnamworks.com/pictureofcompany/11/7984646.gif" class="logoEmployer" alt="Employer's logo - Công Ty TNHH Panasonic Appliances Việt Nam " style="float: left; margin: 20px;">&nbsp; </span>
								      <h2 class="company-name" itemprop="name"><a href="http://www.vietnamworks.com/viec-lam-tai-cong-ty-tnhh-panasonic-appliances-viet-nam-e544254-vn" class="unlink">Công Ty TNHH Panasonic Appliances Việt Nam </a></h2>
									  <span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
						  <span class="company-address" itemprop="addressLocality">Lô B6 &ndash; KCN Thăng Long, Đông Anh, Hà Nội\Lô G2 &ndash; KCN Thăng Long II, Yên Mỹ, Hưng Yên</span>
						  </span>
				
				
						     
									    
									<p>Số điện thoại: 08 996 3433 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Số fax: 08 996 3433 <br>Qui mô công ty: 500-999                                            <br>
						    Tên người liên hệ: <strong>Phòng Nhân sự</strong></p>
				-->
						
						</div>					    
					    
					</td>
				    </tr>
					
					
				<tr>					
					<td colspan="2" class="job-table-head" style="max-width: none;width: 835px">
						<h3>Thông tin tuyển dụng</h3>
					</td>
				</tr>
					
				<?php if ($this->_tpl_vars['item']['require_gender_id']): ?>
				<tr>
					<th width="190px" align="left"><?php echo $this->_tpl_vars['_require_gender']; ?>
</th>
					<td>
						<span class="JobName"><?php echo $this->_tpl_vars['options']['gender'][$this->_tpl_vars['item']['require_gender_id']]; ?>
</span>
					</td>
				</tr>
				<?php endif; ?>
				    
				<?php if ($this->_tpl_vars['item']['require_education_id']): ?>    
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_education']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['options']['education'][$this->_tpl_vars['item']['require_education_id']]; ?>
																	
																										</td>
				</tr>
				<?php endif; ?>
				    
				<?php if ($this->_tpl_vars['item']['industry']): ?>
				<tr>
						<th align="left"><?php echo $this->_tpl_vars['_job_category']; ?>
</th>
						<td>
							<?php echo $this->_tpl_vars['item']['industry']; ?>
						</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['worktype_id']): ?>
				<tr>
						<th align="left"><?php echo $this->_tpl_vars['_job_nature']; ?>
</th>
						<td>
							<?php echo $this->_tpl_vars['options']['work_type'][$this->_tpl_vars['item']['worktype_id']]; ?>
						</td>
				</tr>
				<?php endif; ?>
				    
				<?php if ($this->_tpl_vars['item']['area']): ?>
				 <tr>
						<th align="left"><?php echo $this->_tpl_vars['_work_station']; ?>
</th>
						<td><?php if ($this->_tpl_vars['item']['work_address']): ?><?php echo $this->_tpl_vars['item']['work_address']; ?>
, <?php endif; ?><?php echo $this->_tpl_vars['item']['area']; ?>
</td>
				</tr>
				<?php endif; ?>
				 
				
				<?php if ($this->_tpl_vars['item']['require_age']): ?>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_require_age']; ?>
</th>
					<td>
					<?php echo $this->_tpl_vars['item']['require_age']; ?>

											</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['exper']): ?>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_exper']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['item']['exper']; ?>
																	
					</td>
				</tr>
				<?php endif; ?>
				
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_salary_scope']; ?>
</th>
					<td><?php if ($this->_tpl_vars['item']['salary']): ?><?php echo $this->_tpl_vars['item']['salary']; ?>
 <?php echo $this->_tpl_vars['item']['salary_currency']; ?>
/tháng<?php else: ?>Thương lượng<?php endif; ?></td>
				</tr>
				
				<?php if ($this->_tpl_vars['item']['testtime']): ?>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_testtime']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['testtime']; ?>
					</td>
				</tr>
				<?php endif; ?>
				
				
				<?php if ($this->_tpl_vars['item']['peoples']): ?>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_job_number']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['item']['peoples']; ?>
 <?php echo $this->_tpl_vars['_peoples']; ?>
	</td>
				</tr>
				<?php endif; ?>
				
				
				<?php if ($this->_tpl_vars['item']['expired_dates']): ?>
				<tr>
					<th align="left"><?php echo $this->_tpl_vars['_publish_date_deadline']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['expired_dates']; ?>
</td>
				</tr>
				<?php endif; ?>
				
				
				<?php if ($this->_tpl_vars['item']['content']): ?>
				<tr>
					<th align="left" valign="top" width="18%"><?php echo $this->_tpl_vars['_job_description']; ?>
</th>
					<td><?php echo $this->_tpl_vars['item']['content']; ?>
					</td>
				</tr>
				<?php endif; ?>
				
				
				<?php if ($this->_tpl_vars['item']['skills']): ?>
				    <tr>
					    <th align="left" valign="top"><?php echo $this->_tpl_vars['_skills']; ?>
</th>
					    <td><?php echo $this->_tpl_vars['item']['skills']; ?>
					</td>
				    </tr>
				<?php endif; ?>
				
				

				
				
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
				
				
				<?php if ($this->_tpl_vars['item']['job_other']): ?>
				<tr>
					<th align="left" valign="top"><?php echo $this->_tpl_vars['_job_other']; ?>
</th>
					<td>
						<?php echo $this->_tpl_vars['item']['job_other']; ?>
																	
																										</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['rprofile']): ?>
				<tr>
					<th align="left" valign="top"><?php echo $this->_tpl_vars['_rprofile']; ?>
</th>
					<td>
					<?php echo $this->_tpl_vars['item']['rprofile']; ?>

											</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['contact_name']): ?>
				    <tr>
					    <th align="left" valign="top">Thông tin liên hệ nộp hồ sơ</th>
					    <td>
						<div class="text left_com_info job_contact_detail" style="">
							<p><?php if ($this->_tpl_vars['item']['contact_gender'] == 1): ?>Mr.<?php elseif ($this->_tpl_vars['item']['contact_gender'] == 2): ?>Mrs.<?php endif; ?> <?php echo $this->_tpl_vars['item']['contact_name']; ?>
<?php if ($this->_tpl_vars['item']['contact_position']): ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $this->_tpl_vars['_chucvu']; ?>
: <?php echo $this->_tpl_vars['item']['contact_position']; ?>
</p><?php endif; ?>
							<?php if ($this->_tpl_vars['item']['contact_mobile']): ?><p><?php echo $this->_tpl_vars['_mobile_number']; ?>
: <?php echo $this->_tpl_vars['item']['contact_mobile']; ?>
</p><?php endif; ?>
							<?php if ($this->_tpl_vars['item']['contact_email']): ?><p><?php echo $this->_tpl_vars['_email']; ?>
: <?php echo $this->_tpl_vars['item']['contact_email']; ?>
</p><?php endif; ?>							
						</div>
					    </td>
				    </tr>
				<?php endif; ?>
				
				
			</tbody>
 </table>

		
		
		
		
		<div class="works-list">
			<h3>Tuyển dụng liên quan</h3>
			<table width="98%" style="">
			  <tbody><tr class="job-table-list-head">
			    <th width="40%" align="left">Tên công việc</th>
			    <th width="35%" align="left">Nhà tuyển dụng</th>
			    <th width="15%" align="left">Nơi làm việc</th>
			    <!--<th width="15%" align="left">Mức lương</th>-->
			    <th width="15%" align="left">Hạn nộp</th>
			  </tr>
				
			<?php $this->_tag_stack[] = array('job', array('row' => 10,'status' => 1,'start' => ($_GET['pos']),'keyword' => ($_GET['keyword']),'indust' => ($this->_tpl_vars['item']['jobindusts']),'type' => ($this->_tpl_vars['item']['jobtype_id']),'area' => ($this->_tpl_vars['area_string']))); $_block_repeat=true;smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['job']['id'] != $this->_tpl_vars['item']['id']): ?>
					<tr>
						<td><a href="<?php echo smarty_function_the_url(array('module' => 'jobs','id' => ($this->_tpl_vars['job']['id']),'title' => ($this->_tpl_vars['job']['name'])), $this);?>
"><?php echo $this->_tpl_vars['job']['name']; ?>
</td>
						<td><a href="<?php if ($this->_tpl_vars['job']['membertype_id'] == 5): ?><?php echo smarty_function_the_url(array('module' => 'jobs','id' => ($this->_tpl_vars['job']['id']),'title' => ($this->_tpl_vars['job']['name'])), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['job']['space_url']; ?>
<?php endif; ?>" target="_blank"><?php echo $this->_tpl_vars['job']['companyname']; ?>
</a></td>
						<td><a class="job_city_link" href="javascript:void(0)" rel="<?php echo $this->_tpl_vars['job']['city_id']; ?>
"><?php echo $this->_tpl_vars['job']['area']; ?>
</a></td>
						<!--<td><?php echo $this->_tpl_vars['job']['salary']; ?>
</td>-->
						<td><?php echo $this->_tpl_vars['job']['expired_dates']; ?>
</td>
					</tr>
				<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			  
			</tbody></table>
			
			<div id="pagenav">
				<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 20), $this);?>
</div></p>
			</div>
			
			  
		      </div>
		
		
		
		
		
		
		
		
		
		
		
	</div>
	<div id="job-sidebar">
		
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/job/rightbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
		
		
		
	</div>
</div>





<script>
var app_language = '<?php echo $this->_tpl_vars['AppLanguage']; ?>
';
var area_id1 = 0;
var area_id2 = 0;
var area_id3 = 0;
</script>
<script src="scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="scripts/script_area.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>