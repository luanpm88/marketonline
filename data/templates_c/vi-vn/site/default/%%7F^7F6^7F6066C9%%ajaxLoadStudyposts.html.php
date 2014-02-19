<?php /* Smarty version 2.6.27, created on 2014-02-19 12:37:31
         compiled from default%5Cstudypost/ajaxLoadStudyposts.html */ ?>
<?php if ($this->_tpl_vars['List']): ?>
    <?php $_from = $this->_tpl_vars['List']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level_0']['iteration']++;
?>
        <div class="studypost_box" rel="<?php echo $this->_tpl_vars['item']['id']; ?>
">
            <?php if ($this->_tpl_vars['pb_userinfo']['id'] == $this->_tpl_vars['item']['member_id']): ?>
                <div class="box_controls">
                    <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này?')" class="box_delete_but" href="javascript:void(0)">Xóa</a>
                    <a class="box_edit_but" href="javascript:void(0)">Chỉnh sửa</a>
                </div>
            <?php endif; ?>
            <div class="box_header">
                <img src="<?php echo $this->_tpl_vars['item']['member']['photo']; ?>
" />
                <h2><?php echo $this->_tpl_vars['item']['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['member']['last_name']; ?>
</h2>
                <div class="box_moreinfo">
                    Ngày đăng: <?php echo $this->_tpl_vars['item']['created']; ?>

                </div>
            </div>
            <div class="box_content">
                <div class="inner-content"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
                <div class="editor">
                    
                </div>
            </div>
            <div class="stats">
                <ul class="stats_header">
                    <li>
                        <a href="javascript:void(0)" rel="stats">Đánh giá</a>
                    </li>
                </ul>
                <div id="stats_content">
                    <div class="post_star">
                        <span class="star" rel="1"></span>
                        <span class="star" rel="2"></span>
                        <span class="star" rel="3"></span>
                        <span class="star" rel="4"></span>
                        <span class="star" rel="5"></span>
                        <span class="star" rel="6"></span>
                        <span class="star" rel="7"></span>
                        <span class="star" rel="8"></span>
                        <span class="star" rel="9"></span>
                        <span class="star" rel="10"></span>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>