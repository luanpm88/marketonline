<?php /* Smarty version 2.6.27, created on 2014-06-06 11:00:45
         compiled from default/studypost/ajaxLoadStudypostComments.html */ ?>
                    <?php if ($this->_tpl_vars['more']): ?>
                        <div class="comment_item view_morecomment">
                            <a href="javascript:void(0)">
                                Xem them binh luan khac
                            </a>
                            <span class="count_current_comment" style="display: none">4</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($this->_tpl_vars['comments']): ?>
                        <?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_comment'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_comment']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment_key'] => $this->_tpl_vars['comment']):
        $this->_foreach['level_comment']['iteration']++;
?>
                        <div class="comment_item  is_item" rel="<?php echo $this->_tpl_vars['comment']['id']; ?>
">
                            
                            <?php if ($this->_tpl_vars['pb_userinfo']['id'] == $this->_tpl_vars['comment']['member_id']): ?>
                                <div class="box_controls">
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này?')" class="commentbox_delete_but" href="javascript:void(0)">Xóa</a>
                                    <a style="display: none" class="commentbox_edit_but" href="javascript:void(0)">Chỉnh sửa</a>
                                </div>
                            <?php endif; ?>
                            
                            <img src="<?php echo $this->_tpl_vars['comment']['member']['photo']; ?>
" />
                            <h2><?php echo $this->_tpl_vars['comment']['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['comment']['member']['last_name']; ?>
</h2>
                            
                            <?php if ($this->_tpl_vars['comment']['star'] > 0): ?>
                            <div class="starshover">
                                <div class="stars">
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 1): ?> light<?php endif; ?>" rel="1"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 2): ?> light<?php endif; ?>" rel="2"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 3): ?> light<?php endif; ?>" rel="3"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 4): ?> light<?php endif; ?>" rel="4"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 5): ?> light<?php endif; ?>" rel="5"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 6): ?> light<?php endif; ?>" rel="6"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 7): ?> light<?php endif; ?>" rel="7"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 8): ?> light<?php endif; ?>" rel="8"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 9): ?> light<?php endif; ?>" rel="9"></span>
                                    <span class="star<?php if ($this->_tpl_vars['comment']['star'] >= 10): ?> light<?php endif; ?>" rel="10"></span>
                                    <span class="result" value="0"></span>                            
                                </div>
                                <div class="over_points"><?php echo $this->_tpl_vars['comment']['star']; ?>
</div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="comment_content">
                                <?php echo $this->_tpl_vars['comment']['content']; ?>

                            </div>
                            <div class="box_moreinfo">
                                <?php echo $this->_tpl_vars['comment']['created']; ?>

                            </div>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>