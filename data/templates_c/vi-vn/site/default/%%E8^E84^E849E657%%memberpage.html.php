<?php /* Smarty version 2.6.27, created on 2014-04-28 10:14:33
         compiled from default%5Cstudypost/memberpage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\studypost/memberpage.html', 35, false),array('function', 'formhash', 'default\\studypost/memberpage.html', 50, false),array('modifier', 'truncate', 'default\\studypost/memberpage.html', 228, false),)), $this); ?>
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
        <div class="study-member-box">
            <div class="member-right">
                <div class="member-pics-album">
                    <div class="main">
                        <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id'] && $this->_tpl_vars['member']['studypics']['main']['id']): ?>
                            <a onclick="return confirm('Bạn có chắc muốn xóa hình này!')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'del_studypic','id' => ($this->_tpl_vars['member']['studypics']['main']['id'])), $this);?>
" class="del_main_pic" rel="<?php echo $this->_tpl_vars['member']['studypics']['main']['id']; ?>
">x</a>
                        <?php endif; ?>
                        
                        
                            <img class="avatar" src="<?php echo $this->_tpl_vars['member']['studypics']['main']['name_medium']; ?>
" width="400" height="400" onclick="getStudypictureDetail(<?php echo $this->_tpl_vars['member']['id']; ?>
, <?php echo $this->_tpl_vars['member']['studypics']['main']['id']; ?>
)" />

                        
                        <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id']): ?>
                            <div class="upload_studymemberpagepics">
                                <a class="but" href="javascript::void(0)" onclick="$('#uploadpics-but').trigger('click')">+ Tải ảnh</a>
                            </div>
                            <div id="upload_logo" class="hide">
                                <div class="upload_logo">                                    
                                    <iframe name="uploadpics" id="uploadpics" style="display: none"></iframe>
                                    <form id="uploadpics_form" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=studypost&action=upload_picture" enctype="multipart/form-data">
                                      <?php echo smarty_function_formhash(array(), $this);?>

                                    
                                    
                                      <p><input accept="image/*" type="file" name="upload_picture" id="uploadpics-but" onchange="$('#uploadpics_form').submit()" /></p>
                                      
                                      
                                      <input type="submit" class="checkout_but" style="padding: 3px 50px; margin-left: 10px;" value="<?php echo $this->_tpl_vars['_upload']; ?>
" /><br>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($this->_tpl_vars['member']['studypics']['thumbs']): ?>
                        <div class="thumbs">
                            <span class="nav next">></span>
                            <span class="nav prev"><</span>
                            <div class="inner_slider">
                                <?php $_from = $this->_tpl_vars['member']['studypics']['thumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <span class="img_item_out"><div class="img_item">
                                        <img class="avatar" src="<?php echo $this->_tpl_vars['item']['name_small']; ?>
" width="400" height="400" onclick="getStudypictureDetail(<?php echo $this->_tpl_vars['member']['id']; ?>
, <?php echo $this->_tpl_vars['item']['id']; ?>
)" />                                        
                                    </div>
                                    <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id']): ?><a onclick="return confirm('Bạn có chắc muốn xóa hình này!')" class="del_pic" rel="<?php echo $this->_tpl_vars['item']['id']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'del_studypic','id' => ($this->_tpl_vars['item']['id'])), $this);?>
">x</a><?php endif; ?>
                                    </span>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                            
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="member-left">
                <?php if ($this->_tpl_vars['friend_request']): ?>
                        <div class="friend_requests">
                            <strong><?php echo $this->_tpl_vars['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['member']['last_name']; ?>
</strong> muốn kết bạn với bạn
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'acceptFriend','id' => ($this->_tpl_vars['member']['id'])), $this);?>
">Đồng ý</a>
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'rejectFriend','id' => ($this->_tpl_vars['member']['id'])), $this);?>
">Từ chối</a>
                        </div>
                    <?php endif; ?>
                <div class="member-left-top-bound">
                    
                    
                    <div class="member-left-top">
                        <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id']): ?>
                            <iframe name="upload" id="upload" style="display: none"></iframe>
                            <form style="display: none" name="productaddfrm" id="Frm2_logo" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=studypost&action=change_logo_home" enctype="multipart/form-data">
                              <?php echo smarty_function_formhash(array(), $this);?>

                              <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
                            
                              <p><input type="file" name="upload_logo" id="changelogo-but" onchange="$('#Frm2_logo').submit()" /></p>
                              
                            </form>
                        <?php endif; ?>
                        
                        <div class="out_studyava">
                            <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id']): ?>
                                <a class="changestudyava" onclick="$('#changelogo-but').trigger('click')" href="javascript:void(0)">Thay hình đại diện</a>
                            <?php endif; ?>
                            
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['member']['id'])), $this);?>
">
                                <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>"/>
                            </a>
                        </div>
                        
                        <h4><?php echo $this->_tpl_vars['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['member']['last_name']; ?>
</h4>
                        <?php if ($this->_tpl_vars['member']['school_name']): ?><p class="school"><label>Trường </label>:&nbsp; <?php echo $this->_tpl_vars['member']['school_name']; ?>
</p><?php endif; ?>
                        <?php if ($this->_tpl_vars['member']['class']): ?><p><label>Lớp </label>:&nbsp; <?php echo $this->_tpl_vars['member']['class']; ?>
</p><?php endif; ?>
                        <?php if ($this->_tpl_vars['member']['gender']): ?><p><label>Giới tính </label>:&nbsp; <?php if ($this->_tpl_vars['member']['gender'] == 1): ?>Name<?php else: ?>Nữ<?php endif; ?></p><?php endif; ?>
                        <?php if ($this->_tpl_vars['member']['address']): ?><p><label>Địa chỉ </label>:&nbsp; <?php echo $this->_tpl_vars['member']['address']; ?>
</p><?php endif; ?>
                        <?php if ($this->_tpl_vars['member']['mobile']): ?><p><label>Điện thoại </label>:&nbsp; <?php echo $this->_tpl_vars['member']['mobile']; ?>
</p><?php endif; ?>
                        <?php if ($this->_tpl_vars['member']['email']): ?><p><label>Email </label>:&nbsp; <?php echo $this->_tpl_vars['member']['email']; ?>
</p><?php endif; ?>
                    </div>
                    <div class="controls">
                        <div class="friend_menu">
                            <?php if ($this->_tpl_vars['pb_userid'] != $this->_tpl_vars['member']['id'] && ! $this->_tpl_vars['friend_request'] && ! $this->_tpl_vars['is_friend']): ?>
                                <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                                        <?php if (! $this->_tpl_vars['Friended']): ?>
                                                <a onclick="studyfriend(<?php echo $this->_tpl_vars['member']['id']; ?>
, this)" href="javascript:void(0)" class="kkkmember">Kết bạn</a>
                                        <?php else: ?>
                                                <a onclick="studyfriend(<?php echo $this->_tpl_vars['member']['id']; ?>
, this)" class="del_addfriend kkkmember" href="javascript:void(0)">Đã gửi lời mời kết bạn</a>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?php if (! $this->_tpl_vars['Friended']): ?>
                                            <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php">Kết bạn</a>
                                        <?php else: ?>
                                            <a class="comment_but del_addfriend" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php">Đã gửi Lời mời kết bạn</a>
                                        <?php endif; ?>                                
                                <?php endif; ?>
                            <?php elseif ($this->_tpl_vars['is_friend']): ?>
                                <a class="" href="javascript:void(0)">
                                    <img class="friend_checked" src="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
/templates/default/image/check_list.png" />
                                    Bạn bè
                                </a>
                            <?php endif; ?>
                            
                            
                                <div class="friend_menu_items<?php if ($this->_tpl_vars['Friended'] || $this->_tpl_vars['is_friend']): ?> active<?php endif; ?>">
                                    <div class="friend_menu_items_inner">
                                        <span class="pointer_topmenu">.</span>
                                        <ul>
                                            <li>
                                                <?php if ($this->_tpl_vars['is_friend']): ?>
                                                    <a class="" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'rejectFriend','id' => ($this->_tpl_vars['member']['id'])), $this);?>
">Hủy kết bạn</a>
                                                <?php endif; ?>
                                                <?php if (! $this->_tpl_vars['is_friend']): ?>
                                                    <a class="" href="javascript:void(0)" onclick="studyfriend(<?php echo $this->_tpl_vars['member']['id']; ?>
, $('.kkkmember'))">Hủy kết bạn</a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            
                            
                        </div>    
                            
                        
                        <?php if ($this->_tpl_vars['pb_userid'] != $this->_tpl_vars['member']['id']): ?>
                            <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                                <a href="javascript::void(0)" onclick="getChatboxNew('<?php echo $this->_tpl_vars['member']['id']; ?>
x6', false)" class="skin_chat_with_owner comment_but <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>">Tin nhắn</a>
                            <?php else: ?>
                                <a title="" class="skin_chat_with_owner comment_but <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>" href="#login-box" onclick="">Tin nhắn</a>
                            <?php endif; ?>
                            
                            
                            <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                                    <?php if (! $this->_tpl_vars['Followed']): ?>
                                            <a onclick="studyfollow(<?php echo $this->_tpl_vars['member']['id']; ?>
, this)" href="javascript:void(0)"><?php echo $this->_tpl_vars['_follow']; ?>
</a>
                                    <?php else: ?>
                                            <a onclick="studyfollow(<?php echo $this->_tpl_vars['member']['id']; ?>
, this)" href="javascript:void(0)"><?php echo $this->_tpl_vars['_followed']; ?>
</a>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?php if (! $this->_tpl_vars['Followed']): ?>
                                        <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php"><?php echo $this->_tpl_vars['_follow']; ?>
</a>
                                    <?php else: ?>
                                        <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php"><?php echo $this->_tpl_vars['_followed']; ?>
</a>
                                    <?php endif; ?>                                
                            <?php endif; ?>
                        <?php endif; ?>
                    
                    </div>
                
                </div>
                
                <div class="member-left-bottom">
                    <h2>Tự giới thiệu</h2>
                </div>                
                
            </div>
            
            <br style="clear: both" />
        </div>
    </div>
    <div class="row">
        <div class="facelike_main">
            
            <div id="facelike_col1">
                
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_joined_groups.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                
            </div>
            
            <div id="facelike_col2">
                <div class="col2-top">
                    
                    
                    
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