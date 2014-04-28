<?php /* Smarty version 2.6.27, created on 2014-04-28 12:59:46
         compiled from default%5Cstudypost/group.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default\\studypost/group.html', 45, false),array('function', 'the_url', 'default\\studypost/group.html', 64, false),array('modifier', 'truncate', 'default\\studypost/group.html', 148, false),)), $this); ?>
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
        
        $(window).scrollTop(152);
    
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
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_top_user_info.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
                <div class="school-top-left-info group_left_top">
                    <iframe name="upload" id="upload" style="display: none"></iframe>
                        <form style="display: none" name="productaddfrm" id="Frm2_logo" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=studypost&action=change_group_logo" enctype="multipart/form-data">
                          <?php echo smarty_function_formhash(array(), $this);?>

                          <input type="hidden" name="group_id" value="<?php echo $this->_tpl_vars['group']['id']; ?>
" />
                          <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
                        
                          <p><input accept="image/*" type="file" name="upload_logo" id="changelogo-but" onchange="$('#Frm2_logo').submit()" /></p>
                          
                        </form>
                        
                        <div class="logo_out_hover">
                            <?php if ($this->_tpl_vars['pb_userid'] == 1030): ?>
                                <a class="changesgrouplogo" onclick="$('#changelogo-but').trigger('click')" href="javascript:void(0)">
                                    <?php if ($this->_tpl_vars['group']['logo_origin']): ?>
                                        Thay logo
                                    <?php else: ?>
                                        Thêm logo
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                            <div class="box-group-info">
                                <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
"><img src="<?php echo $this->_tpl_vars['group']['logo']; ?>
" /></a>
                                <div class="box2">
                                    <div class="box-top"><label>Thành viên</label><?php echo $this->_tpl_vars['group']['member_count']; ?>
</div>
                                    <div class="box-bottom"><label>Quản trị viên</label>
                                        <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['group_leader']['id'])), $this);?>
"><?php echo $this->_tpl_vars['group_leader']['first_name']; ?>
 <?php echo $this->_tpl_vars['group_leader']['last_name']; ?>
</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <h1><?php echo $this->_tpl_vars['group']['name']; ?>
</h1>                    
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
                            <?php if ($this->_tpl_vars['group']['no_banner']): ?>
                                <li><a href="javascript:void(0)"><!--<img src="<?php echo $this->_tpl_vars['group']['no_banner']; ?>
" />--></a></li>
                            <?php else: ?>
                                <?php $_from = $this->_tpl_vars['group']['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li>
                                        <?php if ($this->_tpl_vars['pb_userid'] == 1030): ?><a class="del_schoolbanner" onclick="return confirm('Bạn có chắc muốn xóa hình này!')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'del_studygroupbanner','id' => ($this->_tpl_vars['item']['id'])), $this);?>
">x</a><?php endif; ?>
                                        <a href="javascript:void(0)" onclick="getStudygrouppictureDetail(<?php echo $this->_tpl_vars['group']['id']; ?>
,<?php echo $this->_tpl_vars['item']['id']; ?>
)"><img src="<?php echo $this->_tpl_vars['item']['banner']; ?>
" /></a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>
                        </ul>
                        <span class="studybanner_nav next">></span>
                        <span class="studybanner_nav prev"><</span>
                        
                        
                        <div class="banner-school-info banner-group-info">
                            <h2><?php echo $this->_tpl_vars['group']['subject_name']; ?>
</h2>
                            <h3><?php echo $this->_tpl_vars['group']['school_name']; ?>
</h3>
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
                        <?php if ($this->_tpl_vars['belongToGroup']): ?>
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'leave_group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
">Rời khỏi nhóm</a>
                        <?php endif; ?>
                        
                        <?php if ($this->_tpl_vars['pb_userid'] == 1030): ?>
                            <iframe name="upload" id="upload" style="display: none"></iframe>
                            <form style="display: none" name="productaddfrm" id="Frm2_banner" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=studypost&action=change_group_banner" enctype="multipart/form-data">
                              <?php echo smarty_function_formhash(array(), $this);?>

                              <input type="hidden" name="group_id" value="<?php echo $this->_tpl_vars['group']['id']; ?>
" />
                              <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
                            
                              <p><input type="file" name="upload_logo" id="changebanner-but" onchange="$('#Frm2_banner').submit()" /></p>
                              
                            </form>
                            <a class="changesgroupbanner" onclick="$('#changebanner-but').trigger('click')" href="javascript:void(0)">
                                <?php if ($this->_tpl_vars['school']['banner_origin']): ?>
                                    Thay hình banner
                                <?php else: ?>
                                    Thêm hình banner
                                <?php endif; ?>
                                
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
                            
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_rightbar_groups.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            
                            <?php if ($this->_tpl_vars['pb_userinfo']['id'] == 1030): ?>
                                <h4>Thành viên chờ duyệt</h4>
                                <?php if ($this->_tpl_vars['groups_count'] > 5): ?>
                                    <div class="title_more_group_button" onclick="$('.rightbar_grouplist .group_item').css('display','block');$(this).remove()" href="">Xem thêm</div>
                                <?php endif; ?>
                                <ul class="group_list rightbar_grouplist waiting_list">
                                    <?php $_from = $this->_tpl_vars['waiting_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_key'] => $this->_tpl_vars['mem']):
        $this->_foreach['level_group']['iteration']++;
?>
                                        <li class="group_item">
                                            <div  <?php if ($this->_tpl_vars['mem']['photo']): ?>style="background:url(<?php echo $this->_tpl_vars['mem']['info']['photo']; ?>
) no-repeat scroll 0 0 / 42px auto rgba(0, 0, 0, 0)"<?php endif; ?> class="logo" onclick="" title="<?php echo $this->_tpl_vars['mem']['info']['first_name']; ?>
 <?php echo $this->_tpl_vars['mem']['info']['last_name']; ?>
">
                                                <strong onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['mem']['info']['id'])), $this);?>
'"><?php echo $this->_tpl_vars['mem']['info']['first_name']; ?>
 <?php echo $this->_tpl_vars['mem']['info']['last_name']; ?>
</strong>
                                                <p><?php echo $this->_tpl_vars['mem']['info']['school_name']; ?>
</p>
                                                <div class="action">
                                                    <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group_accept','id' => ($this->_tpl_vars['mem']['info']['id']),'group_id' => ($this->_tpl_vars['mem']['studygroup_id'])), $this);?>
">Duyệt</a>
                                                    <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group_reject','id' => ($this->_tpl_vars['mem']['info']['id']),'group_id' => ($this->_tpl_vars['mem']['studygroup_id'])), $this);?>
">Bỏ qua</a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ul>
                            <?php endif; ?>
                            
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