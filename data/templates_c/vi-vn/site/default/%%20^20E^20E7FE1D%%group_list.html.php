<?php /* Smarty version 2.6.27, created on 2014-04-05 08:03:20
         compiled from default/studypost/group_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/group_list.html', 55, false),array('function', 'pager', 'default/studypost/group_list.html', 79, false),array('modifier', 'truncate', 'default/studypost/group_list.html', 68, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Học Tập",'nav_id' => 9)));
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
		<div id="TopStudytypeCategory">
		      <ul class="list-studytype-cat">
                                <li rel=""><a href="<?php echo smarty_function_the_url(array('module' => 'studypost'), $this);?>
">Trường</a></li>
                                <li rel="" class="active"><a href="<?php echo smarty_function_the_url(array('module' => 'studypost','type' => 'group'), $this);?>
">Môn học</a></li>
                                <li rel=""><a href="<?php echo smarty_function_the_url(array('module' => 'studypost','type' => 'learner'), $this);?>
">Học viên</a></li>
		      </ul>
		</div>
		
                <div class="studypage-content">
                    <div id="other-school-list" class="school_list main_list">
                        <ul class="group_list">
                            <?php $_from = $this->_tpl_vars['group_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['item']['id'])), $this);?>
'" class="school_list_box <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['school']['id']): ?>active<?php endif; ?>">
                                        <a class="head-title">
                                            <img src="<?php echo $this->_tpl_vars['item']['logo']; ?>
" />
                                            <span><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['subject_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</span>
					    <span><?php echo $this->_tpl_vars['item']['school_name']; ?>
</span>
                                        </a>
                                        <?php if ($this->_tpl_vars['item']['address']): ?><p><?php echo $this->_tpl_vars['item']['address']; ?>
</p><?php endif; ?>
                                        <?php if ($this->_tpl_vars['item']['member_count']): ?><p><label>Thành viên:</label> <?php echo $this->_tpl_vars['item']['member_count']; ?>
</p><?php endif; ?>
                                        
                                    </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
		    <div id="pagenav">
		      <p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 20), $this);?>
</div></p>
		    </div>
                    <br style="clear: both" />
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