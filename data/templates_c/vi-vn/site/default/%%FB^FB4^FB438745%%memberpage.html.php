<?php /* Smarty version 2.6.27, created on 2014-03-10 16:08:03
         compiled from default/studypost/memberpage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/memberpage.html', 112, false),array('modifier', 'truncate', 'default/studypost/memberpage.html', 113, false),)), $this); ?>
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
        
        $(\'#facelike_col2\').css("min-height",$(window).height()+200);
        
    });
    
</script>
'; ?>


<div class="outpage_box">
    <div class="row">
        <div class="study-member-box">
            <div class="member-right">
                <div class="member-pics-album">
                    <div class="main">
                        <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="400" height="400" />
                    </div>
                    <div class="thumbs">
                        <span class="nav next">></span>
                        <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="400" height="400" />
                        <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="400" height="400" />
                        <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="400" height="400" />
                        <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="400" height="400" />
                        <span class="nav prev"><</span>
                    </div>
                </div>
            </div>
            <div class="member-left">
                <div class="member-left-top">
                    <img class="avatar" src="<?php if ($this->_tpl_vars['member']['photo']): ?> <?php echo $this->_tpl_vars['member']['photo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>"/>
                    <h4><?php echo $this->_tpl_vars['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['member']['last_name']; ?>
</h4>
                    <?php if ($this->_tpl_vars['member']['school_name']): ?><p class="school"><label>Trường </label>: <?php echo $this->_tpl_vars['member']['school_name']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['member']['class']): ?><p><label>Lớp </label>: <?php echo $this->_tpl_vars['member']['class']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['member']['gender']): ?><p><label>Giới tính </label>: <?php if ($this->_tpl_vars['member']['gender'] == 1): ?>Name<?php else: ?>Nữ<?php endif; ?></p><?php endif; ?>
                    <?php if ($this->_tpl_vars['member']['address']): ?><p><label>Địa chỉ </label>: <?php echo $this->_tpl_vars['member']['address']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['member']['mobile']): ?><p><label>Điện thoại </label>: <?php echo $this->_tpl_vars['member']['mobile']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['member']['email']): ?><p><label>Email </label>: <?php echo $this->_tpl_vars['member']['email']; ?>
</p><?php endif; ?>
                </div>
                <div class="controls">
                    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                            <?php if (! $this->_tpl_vars['Friended']): ?>
                                    <a onclick="studyfriend(<?php echo $this->_tpl_vars['member']['id']; ?>
, this)" href="javascript:void(0)">Kết bạn</a>
                            <?php else: ?>
                                    <a onclick="studyfriend(<?php echo $this->_tpl_vars['member']['id']; ?>
, this)" href="javascript:void(0)">Đã gửi lời mời kết bạn</a>
                            <?php endif; ?>
                    <?php else: ?>
                            <?php if (! $this->_tpl_vars['Friended']): ?>
                                <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php">Kết bạn</a>
                            <?php else: ?>
                                <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php">Đã gửi lời mời kết bạn</a>
                            <?php endif; ?>                                
                    <?php endif; ?>
                    
                    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                        <a href="javascript::void(0)" onclick="getChatbox(<?php echo $this->_tpl_vars['member']['id']; ?>
, false)" class="skin_chat_with_owner comment_but <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>">Chat</a>
                    <?php else: ?>
                        <a title="" class="skin_chat_with_owner comment_but <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>" href="#login-box" onclick="">Chat</a>
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