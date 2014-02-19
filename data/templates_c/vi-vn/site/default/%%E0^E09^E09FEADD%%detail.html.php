<?php /* Smarty version 2.6.27, created on 2014-01-14 11:06:40
         compiled from default%5Cemployee/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'employee', 'default\\employee/detail.html', 276, false),array('function', 'the_url', 'default\\employee/detail.html', 279, false),array('function', 'pager', 'default\\employee/detail.html', 293, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Hồ sơ: ".($this->_tpl_vars['item']['expected_position']),'nav_id' => 9)));
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
   
    
	<h1 class="page-title">Hồ sơ: <?php echo $this->_tpl_vars['item']['expected_position']; ?>
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
			<h4>Cấp bậc</h4>
		      <ul class="list-hot-cat">
				<li rel="0" <?php if (! $_GET['type']): ?>class="active"<?php endif; ?>><a href="javascript:void(0)">Tất cả</a></li>

				<?php $_from = $this->_tpl_vars['JobProficiencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					<li <?php if ($_GET['type'] == $this->_tpl_vars['key_level1']): ?>class="active"<?php endif; ?> rel="<?php echo $this->_tpl_vars['key_level1']; ?>
"><a href="javascript:void(0)"><?php echo $this->_tpl_vars['level1']; ?>
</a></li>			 
				<?php endforeach; endif; unset($_from); ?>
			
		      </ul>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		<!--<h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_job_name']; ?>
: <?php echo $this->_tpl_vars['item']['name']; ?>
</h3>-->
	      
	      
	      <h3>Hồ sơ: <?php echo $this->_tpl_vars['item']['expected_position']; ?>
</h3>
	      
	      

 <table width="100%" class="TableInfo" style="border-color: #aaa; margin-top: 10px;padding: 5px;">
    
				<tbody>
					
					
					<tr>
					<td colspan="2" class="left_com_infotd" style="max-width: none;width: 835px">
					    
					    
					    <div class="company-info">
								
								<div class="columns logo logoz">
								    <a href="javascript:void(0)">
									<img src="<?php echo $this->_tpl_vars['memberinfo']['photo']; ?>
"></a>
								</div>
		    
		    <div class="text left_com_info">
			    <h3><?php echo $this->_tpl_vars['memberinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['memberinfo']['last_name']; ?>
</h3>
			   <!-- <p><label>Họ và Tên</label>: &nbsp;<?php echo $this->_tpl_vars['memberinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['memberinfo']['last_name']; ?>
</p>-->
			    <p><label>Giới tính</label>: &nbsp;<?php if ($this->_tpl_vars['memberinfo']['gender']): ?>Nam<?php else: ?>Nữ<?php endif; ?></p>
			    <p><label>Địa chỉ</label>: &nbsp;<?php echo $this->_tpl_vars['memberinfo']['address']; ?>
</p>
			    <p><label>Điện thoại</label>: &nbsp;<?php echo $this->_tpl_vars['memberinfo']['mobile']; ?>
</p>
			    <p><label>Email</label>: &nbsp;<?php echo $this->_tpl_vars['memberinfo']['email']; ?>
</p>
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
						<h3>Thông tin chi tiết</h3>
					</td>
				</tr>
				
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Số năm kinh nghiệm</strong></p></th>
					<td valign="top">
						<?php if ($this->_tpl_vars['item']['newgrad']): ?>
						    Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc
						<?php else: ?>
						    <?php echo $this->_tpl_vars['item']['years_experience']; ?>
 năm
						<?php endif; ?>
					</td>
				</tr>			
				
				<?php if ($this->_tpl_vars['item']['languages']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Trình độ ngoại ngữ</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['languages']; ?>

					</td>
				</tr>
				<?php endif; ?>
				
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Cấp bậc mong muốn</strong></p></th>
					<td valign="top">
						<a class="joblevel_link" href="javascript:void(0)" rel="<?php echo $this->_tpl_vars['item']['joblevel_id']; ?>
"><?php echo $this->_tpl_vars['options']['job_proficiency'][$this->_tpl_vars['item']['joblevel_id']]; ?>
</a>
					</td>
				</tr>
				
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Nơi làm việc</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['areas']; ?>

					</td>
				</tr>
				
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Ngành nghề</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['jobindusts']; ?>

					</td>
				</tr>
				
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Mức lương mong muốn</strong></p></th>
					<td valign="top">
						<?php if ($this->_tpl_vars['item']['salary']): ?>
						    <?php echo $this->_tpl_vars['item']['salary']; ?>
 <?php echo $this->_tpl_vars['item']['salary_currency']; ?>
/tháng
						<?php else: ?>
						    Thương lượng
						<?php endif; ?>
					</td>
				</tr>
				
				<?php if ($this->_tpl_vars['item']['career_objective']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Mục tiêu nghề nghiệp</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['career_objective']; ?>

					</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['career_highlight']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Thành tích nổi bật</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['career_highlight']; ?>

					</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['employeeexperience']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Kinh nghiệm làm việc</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['employeeexperience']; ?>

					</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['employeeeducation']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Học vấn và bằng cấp</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['employeeeducation']; ?>

					</td>
				</tr>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['item']['skills']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Kỹ năng nổi bật</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['skills']; ?>

					</td>
				</tr>
				<?php endif; ?>
				    
				<?php if ($this->_tpl_vars['item']['employeereference']): ?>
				<tr>
					<th width="190px" align="left" valign="top"><p><strong>Thông tin tham khảo</strong></p></th>
					<td valign="top">
						<?php echo $this->_tpl_vars['item']['employeereference']; ?>

					</td>
				</tr>
				<?php endif; ?>
				
				
				
				
			</tbody>
 </table>

		
		
		
		
		
		<div class="works-list">
			<h3>Hồ sơ liên quan</h3>
			<table width="98%" style="">
			  <tbody><tr class="job-table-list-head">
			    <th width="40%" align="left">Vị trí mong muốn</th>
			    <th width="35%" align="left">Cấp bậc</th>
			    <th width="30%" align="left">Nơi làm việc</th>
			    <!--<th width="15%" align="left">Mức lương</th>-->
			    <!--<th width="15%" align="left">Hạn nộp</th>-->
			  </tr>
				
			<?php $this->_tag_stack[] = array('employee', array('row' => 10,'status' => 1,'showed' => 1,'searched' => 1,'start' => ($_GET['pos']),'keyword' => ($_GET['keyword']),'indust' => ($this->_tpl_vars['item']['jobindusts']),'type' => ($this->_tpl_vars['item']['jobtype_id']),'area' => ($_GET['area']))); $_block_repeat=true;smarty_block_employee($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['job']['id'] != $this->_tpl_vars['item']['id']): ?>
					<tr>
					    <td><a href="<?php echo smarty_function_the_url(array('module' => 'employees','id' => ($this->_tpl_vars['job']['id'])), $this);?>
"><?php echo $this->_tpl_vars['job']['expected_position']; ?>
</td>
					    <td><a class="joblevel_link" rel="<?php echo $this->_tpl_vars['job']['joblevel_id']; ?>
" href="javascript:void(0)"><?php echo $this->_tpl_vars['job']['joblevel']; ?>
</a></td>
					    <td>
						<?php echo $this->_tpl_vars['job']['areas']; ?>

					    </td>
					    <!--<td><?php echo $this->_tpl_vars['job']['salary']; ?>
</td>-->
					    <!--<td><?php echo $this->_tpl_vars['job']['expired_dates']; ?>
</td>-->
				    </tr>	
				<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_employee($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			  
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