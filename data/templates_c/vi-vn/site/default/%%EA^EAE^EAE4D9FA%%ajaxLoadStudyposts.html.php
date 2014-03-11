<?php /* Smarty version 2.6.27, created on 2014-03-11 09:34:46
         compiled from default/studypost/ajaxLoadStudyposts.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/ajaxLoadStudyposts.html', 83, false),array('function', 'formhash', 'default/studypost/ajaxLoadStudyposts.html', 84, false),)), $this); ?>
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
                        <a href="javascript:void(0)" rel="stats">Bình luận</a>
                    </li>
                </ul>
                
                <div class="comment_list">
                   
                    <?php if ($this->_tpl_vars['item']['more']): ?>
                        <div class="comment_item view_morecomment">
                            <a href="javascript:void(0)">
                                Xem them binh luan khac
                            </a>
                            <span class="count_current_comment" style="display: none">4</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($this->_tpl_vars['item']['comments']): ?>
                        <?php $_from = $this->_tpl_vars['item']['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_comment'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_comment']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment_key'] => $this->_tpl_vars['comment']):
        $this->_foreach['level_comment']['iteration']++;
?>
                        <div class="comment_item is_item" rel="<?php echo $this->_tpl_vars['comment']['id']; ?>
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
                </div>
                
                <div class="stats_content" class="tab_item">
                    <form id="sudypostcomment_form_<?php echo $this->_tpl_vars['item']['id']; ?>
" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postcomment'), $this);?>
" method="post" >
                        <?php echo smarty_function_formhash(array(), $this);?>

                        <input type="hidden" name="comment[studypost_id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
                        <input type="hidden" name="comment[star]" value="0" />
                        
                        <?php if (! $this->_tpl_vars['item']['comment_with_star']): ?>
                            <div class="stars post_star">
                                <span class="star" rel="0"></span>
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
                                <span class="result" value="0"></span>
                            </div>
                        <?php endif; ?>
                            
                        <div class="editor">
                            <textarea name="comment[content]"></textarea>
                        </div>
                        <div class="actions">
                            <button class="send-button">Gửi bình luận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>