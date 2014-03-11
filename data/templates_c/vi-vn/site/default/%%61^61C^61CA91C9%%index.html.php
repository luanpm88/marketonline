<?php /* Smarty version 2.6.27, created on 2014-03-11 11:41:26
         compiled from default/job/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get', 'default/job/index.html', 60, false),array('function', 'the_url', 'default/job/index.html', 88, false),array('function', 'pager', 'default/job/index.html', 99, false),array('modifier', 'count', 'default/job/index.html', 61, false),array('block', 'job', 'default/job/index.html', 86, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_hr']),'nav_id' => 9)));
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





<div class="row">
  <div class="fifteen columns">

    <div id="page-title">

    <a class="back" href="javascript:history.back()"></a>
    <div class="subtitle">
        <?php echo $this->_tpl_vars['_job_head']; ?>

    </div>
   
    
	<h1 class="page-title"><?php echo $this->_tpl_vars['_job_head']; ?>
</h1>

    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/job/postitem.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    


    
    
  </div>

  
  </div>
</div>



<div class="row">
    
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
		
		
		
		<div class="works-list">
			<h3>Danh sách tuyển dụng</h3>
			<table width="98%" style="">
			  <tbody><tr class="job-table-list-head">
			    <th width="40%" align="left">Tên công việc</th>
			    <th width="35%" align="left">Nhà tuyển dụng</th>
			    <th width="15%" align="left">Nơi làm việc</th>
			    <!--<th width="15%" align="left">Mức lương</th>-->
			    <th width="15%" align="left">Hạn nộp</th>
			  </tr>
				
			<?php $this->_tag_stack[] = array('job', array('row' => 20,'status' => 1,'start' => ($_GET['pos']),'keyword' => ($_GET['keyword']),'indust' => ($_GET['indust']),'type' => ($_GET['type']),'area' => ($this->_tpl_vars['area_string']))); $_block_repeat=true;smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<tr>
					<td><a href="<?php echo smarty_function_the_url(array('module' => 'jobs','id' => ($this->_tpl_vars['job']['id'])), $this);?>
"><?php echo $this->_tpl_vars['job']['name']; ?>
</td>
					<td><a href="<?php if ($this->_tpl_vars['job']['membertype_id'] == 5): ?><?php echo smarty_function_the_url(array('module' => 'jobs','id' => ($this->_tpl_vars['job']['id'])), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['job']['space_url']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['job']['companyname']; ?>
</a></td>
					<td><a class="job_city_link" href="javascript:void(0)" rel="<?php echo $this->_tpl_vars['job']['city_id']; ?>
"><?php echo $this->_tpl_vars['job']['area']; ?>
</a></td>
					<!--<td><?php echo $this->_tpl_vars['job']['salary']; ?>
</td>-->
					<td><?php echo $this->_tpl_vars['job']['expired_dates']; ?>
</td>
				</tr>				
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