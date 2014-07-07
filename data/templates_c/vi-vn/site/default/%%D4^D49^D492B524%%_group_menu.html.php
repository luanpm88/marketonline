<?php /* Smarty version 2.6.27, created on 2014-06-13 16:08:33
         compiled from default/studypost/_group_menu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/_group_menu.html', 24, false),)), $this); ?>
<div class="group-menu">
    <ul>                
        <li><a class="group-menu-item" href="#group-announce-box">Thông báo</a></li>
        <li><a class="group-menu-item" href="#group-intro-box">Giới thiệu</a></li>
        <li><a class="group-menu-item" href="#group-event-box">Sự kiện</a></li>
    </ul>
</div>

<div id="group-announce-box" style="display: none" class="group-box">
    <h1>Thông báo</h1>
    
    <div class="group-announce-content">
        <?php if ($this->_tpl_vars['group']['announce']): ?>
            <?php echo $this->_tpl_vars['group']['announce']; ?>

        <?php else: ?>
            Hiện chưa có thông tin...<br />
        <?php endif; ?>
        <br />
    </div>
    
    <?php if ($this->_tpl_vars['pb_userid'] == 1030 || $this->_tpl_vars['pb_userid'] == $this->_tpl_vars['group_leader']['id']): ?>
        <a onclick="$(this).hide();$('.group-announce-content').hide();$('.announce-iframe').removeClass('hidez');setTimeout('$.fancybox.update()',1000);" href="javascript:void(0)" style="display: block;text-align: right">(Cập nhật)</a>
        
        <iframe onload='javascript:resizeIframe(this);' class="announce-iframe hidez" src="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
index.php?do=studypost&action=group_info_edit&type=announce&group_id=<?php echo $this->_tpl_vars['group']['id']; ?>
" style="width:760px;height: 100%;" height="100%" width="100%">
        </iframe>
    <?php endif; ?>
</div>

<div id="group-intro-box" style="display: none" class="group-box">
    <h1>Giới thiệu</h1>
    <div class="group-intro-content">
        <?php if ($this->_tpl_vars['group']['intro']): ?>
            <?php echo $this->_tpl_vars['group']['intro']; ?>

        <?php else: ?>
            Hiện chưa có thông tin...<br />
        <?php endif; ?>
        <br />
    </div>
    <?php if ($this->_tpl_vars['pb_userid'] == 1030 || $this->_tpl_vars['pb_userid'] == $this->_tpl_vars['group_leader']['id']): ?>
        <a onclick="$(this).hide();$('.group-intro-content').hide();$('.intro-iframe').removeClass('hidez');setTimeout('$.fancybox.update()',1000);" href="javascript:void(0)" style="display: block;text-align: right">(Cập nhật)</a>
        
        <iframe onload='javascript:resizeIframe(this);' class="intro-iframe hidez" src="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
index.php?do=studypost&action=group_info_edit&type=intro&group_id=<?php echo $this->_tpl_vars['group']['id']; ?>
" style="width:760px;height: 300px;">
        </iframe>
    <?php endif; ?>
</div>

<div id="group-event-box" style="display: none" class="group-box">
    <h1>Sự kiện</h1>
    <div class="group-event-content">
        <?php if ($this->_tpl_vars['group']['event']): ?>
            <?php echo $this->_tpl_vars['group']['event']; ?>

        <?php else: ?>
            Hiện chưa có thông tin...<br />
        <?php endif; ?>
        <br />
    </div>
    <?php if ($this->_tpl_vars['pb_userid'] == 1030 || $this->_tpl_vars['pb_userid'] == $this->_tpl_vars['group_leader']['id']): ?>
        <a onclick="$(this).hide();$('.group-event-content').hide();$('.event-iframe').removeClass('hidez');setTimeout('$.fancybox.update()',1000);" href="javascript:void(0)" style="display: block;text-align: right">(Cập nhật)</a>
        
        <iframe onload='javascript:resizeIframe(this);' class="event-iframe hidez" src="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
index.php?do=studypost&action=group_info_edit&type=event&group_id=<?php echo $this->_tpl_vars['group']['id']; ?>
" style="width:760px;height: 300px;">
        </iframe>
    <?php endif; ?>
</div>

<?php echo '
<script>
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + \'px\';        
    }
</script>
'; ?>
