<?php /* Smarty version 2.6.27, created on 2014-03-31 10:59:53
         compiled from default%5Cstudypost/school.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default\\studypost/school.html', 42, false),array('function', 'the_url', 'default\\studypost/school.html', 60, false),array('modifier', 'truncate', 'default\\studypost/school.html', 70, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Thị trường Mua-Bán, Phân phối Sản phẩm/Dịch vụ")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/verytopmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="application/x-javascript">

    $(document).ready(function() {
        
        $(window).scrollTop(120);
        
    });
    
    $(document).scroll(function() {

        moveLeftBar(200);
        
    });
    
    $(window).resize(function() {    
        
        var minnn = $(window).height();
        if ($(window).height() < $(\'#facelike_col1\').height()) {
            minnn = $(\'#facelike_col1\').height();
        }
        $(\'#facelike_col2\').css("min-height",minnn+200);
        //$(window).scrollTop(200);
     
    });
    
</script>
'; ?>


<div class="outpage_box">
    <div class="row">
        <div class="facelike_main">
            
            <div id="facelike_col1">
                <div class="school-top-left-info">
                    <iframe name="upload" id="upload" style="display: none"></iframe>
                        <form style="display: none" name="productaddfrm" id="Frm2_logo" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=studypost&action=change_school_logo" enctype="multipart/form-data">
                          <?php echo smarty_function_formhash(array(), $this);?>

                          <input type="hidden" name="school_id" value="<?php echo $this->_tpl_vars['school']['id']; ?>
" />
                          <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
                        
                          <p><input type="file" name="upload_logo" id="changelogo-but" onchange="$('#Frm2_logo').submit()" /></p>
                          
                        </form>
                        
                        <div class="logo_out_hover">
                            <?php if ($this->_tpl_vars['pb_userid'] == 1030): ?>
                                <a class="changesschoollogo" onclick="$('#changelogo-but').trigger('click')" href="javascript:void(0)">
                                    <?php if ($this->_tpl_vars['school']['logo_origin']): ?>
                                        Thay logo
                                    <?php else: ?>
                                        Thêm logo
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['school']['id'])), $this);?>
"><img src="<?php echo $this->_tpl_vars['school']['logo']; ?>
" /></a>
                        </div>
                        
                    <h1><a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['school']['id'])), $this);?>
"><?php echo $this->_tpl_vars['school']['name']; ?>
</a></h1>                    
                </div>
                
                <div class="school_list" style="display: none">
                    <ul>
                        <li class="<?php if ($_GET['action'] == 'school'): ?>active<?php endif; ?>">
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['school']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['school']['name']; ?>
">
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['school']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['school']['member_count']; ?>
</div>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_joined_groups.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
            </div>
            
            <div id="facelike_col2">
                <div class="col2-top">
                    <div class="col2-top-banner">
                        
                        <ul class="school_banners">
                            <?php if ($this->_tpl_vars['school']['no_banner']): ?>
                                <li><a href="javascript:void(0)"><img src="<?php echo $this->_tpl_vars['school']['no_banner']; ?>
" /></a></li>
                            <?php else: ?>
                                <?php $_from = $this->_tpl_vars['school']['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li>
                                        <?php if ($this->_tpl_vars['pb_userid'] == 1030): ?><a class="del_schoolbanner" onclick="return confirm('Bạn có chắc muốn xóa hình này!')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'del_schoolbanner','id' => ($this->_tpl_vars['item']['id'])), $this);?>
">x</a><?php endif; ?>
                                        <a href="javascript:void(0)" onclick="getSchoolpictureDetail(<?php echo $this->_tpl_vars['school']['id']; ?>
,<?php echo $this->_tpl_vars['item']['id']; ?>
)"><img src="<?php echo $this->_tpl_vars['item']['banner']; ?>
" /></a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>
                        </ul>
                        <span class="studybanner_nav next">></span>
                        <span class="studybanner_nav prev"><</span>
                        
                        
                        
                        
                        
                        <div class="banner-school-info">
                            <?php if ($this->_tpl_vars['school']['address']): ?><p><?php echo $this->_tpl_vars['school']['address']; ?>
</p><?php endif; ?>
                            <?php if ($this->_tpl_vars['school']['phone']): ?><p><label>Điện thoại:</label> <?php echo $this->_tpl_vars['school']['phone']; ?>
</p><?php endif; ?>
                            <?php if ($this->_tpl_vars['school']['email']): ?><p><label>Email:</label> <a href="mailto:<?php echo $this->_tpl_vars['school']['email']; ?>
"><?php echo $this->_tpl_vars['school']['email']; ?>
</a></p><?php endif; ?>
                            <?php if ($this->_tpl_vars['school']['website']): ?><p><label>Website:</label> <?php echo $this->_tpl_vars['school']['website']; ?>
</p><?php endif; ?>
                        </div>
                    </div>
                    <div class="main_controls">
                        
                        <?php if ($this->_tpl_vars['pb_userid'] == 1030): ?>
                        
                            <iframe name="upload" id="upload" style="display: none"></iframe>
                            <form style="display: none" name="productaddfrm" id="Frm2_banner" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=studypost&action=change_school_banner" enctype="multipart/form-data">
                              <?php echo smarty_function_formhash(array(), $this);?>

                              <input type="hidden" name="school_id" value="<?php echo $this->_tpl_vars['school']['id']; ?>
" />
                              <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
                            
                              <p><input type="file" name="upload_logo" id="changebanner-but" onchange="$('#Frm2_banner').submit()" /></p>
                              
                            </form>
                            <a class="changesschoolbanner" onclick="$('#changebanner-but').trigger('click')" href="javascript:void(0)">
                                Thêm hình banner
                            </a>
                            
                        <?php endif; ?>
                        
                    </div>
                </div>
                <div class="col2-bottom">
                    <div class="col2-bottom-left">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_main_content.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    <div class="col2-bottom-right">
                        <div class="school_list">
                            <h4>Trường</h4>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_other_school_list.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <ul class="group_list">
                                <li class="<?php if ($_GET['action'] == 'school'): ?>active<?php endif; ?>">
                                    <a class="logo" style="background-image:url('<?php echo $this->_tpl_vars['WebRootUrl']; ?>
/<?php echo $this->_tpl_vars['school']['logo']; ?>
')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['school']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['school']['name']; ?>
">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['school']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                        <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['school']['member_count']; ?>
</div>
                                    </a>
                                </li>
                            </ul>
                            
                            <ul class="group_list">
                                <?php $_from = $this->_tpl_vars['school_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li class="<?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['school']['id']): ?>active<?php endif; ?>" style="display: none">
                                        <a class="logo" style="background-image:url('<?php echo $this->_tpl_vars['WebRootUrl']; ?>
/<?php echo $this->_tpl_vars['item']['logo']; ?>
')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['school_name']; ?>
">
                                            <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                            <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['item']['member_count']; ?>
</div>
                                        </a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_rightbar_groups.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer_none.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>