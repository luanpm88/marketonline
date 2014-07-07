<?php /* Smarty version 2.6.27, created on 2014-07-04 13:46:38
         compiled from news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'companynews', 'news.html', 34, false),array('modifier', 'truncate', 'news.html', 45, false),array('function', 'pager', 'news.html', 53, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_news']),'cur' => 'space_index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
	<div class="" id="">
	      
	      <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['_latest_news']; ?>
</h3>
	      
	      
		<?php $this->_tag_stack[] = array('companynews', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 10)); $_block_repeat=true;smarty_block_companynews($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						
						<article class="mini">
                    <time datetime="2012-11-23T10:15:44+00:00">
             <span class="day"><?php echo $this->_tpl_vars['companynews']['created_d']; ?>
/<?php echo $this->_tpl_vars['companynews']['created_f']; ?>
</span>
             <span class="mounth"><?php echo $this->_tpl_vars['companynews']['created_y']; ?>
</span>
             <span class="time"><?php echo $this->_tpl_vars['companynews']['created_time']; ?>
</span>
           </time>
                    <div class="entry-content">
            <?php echo $this->_tpl_vars['companynews']['link']; ?>


            <p><?php echo ((is_array($_tmp=$this->_tpl_vars['companynews']['content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 400) : smarty_modifier_truncate($_tmp, 400)); ?>
</p>
          </div>
        </article>

	
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_companynews($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	      
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






