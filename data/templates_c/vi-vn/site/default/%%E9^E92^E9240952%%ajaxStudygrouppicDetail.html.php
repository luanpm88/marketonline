<?php /* Smarty version 2.6.27, created on 2014-06-06 12:45:19
         compiled from default/studypost/ajaxStudygrouppicDetail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/ajaxStudygrouppicDetail.html', 12, false),array('function', 'formhash', 'default/studypost/ajaxStudygrouppicDetail.html', 78, false),)), $this); ?>
<div class="offer_content_inner" style="">
    
			
			<div class="left-offerbox">
			    <?php if ($this->_tpl_vars['pb_userid'] == 1030 || $this->_tpl_vars['pb_userid'] == $this->_tpl_vars['group']['leader_id']): ?>
				<div class="" style="position: absolute">
				    <a class="overbox_del_studymempic" href="javascript:void(0)" title="Xóa hình này">X</a>
				</div>
			    <?php endif; ?>
				<a href="javascript:void(0)">					
					<?php $_from = $this->_tpl_vars['group']['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
					    <img del-url="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'del_studygroupbanner','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" rel="<?php echo $this->_tpl_vars['item']['id']; ?>
" />					    	
					<?php endforeach; endif; unset($_from); ?>								
				</a>
				<span class="next">.</span>
				<span class="previous">.</span>
			</div>
			
			<div class="right-offerbox">
				<div class="member-title">
						
						
					<div class="avatar">
						<a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
">
						    <img src="<?php echo $this->_tpl_vars['group']['logo']; ?>
" />
						</a>
					</div>
					<h2><a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
"><?php echo $this->_tpl_vars['group']['subject_name']; ?>
 (<?php echo $this->_tpl_vars['group']['school_name']; ?>
)</a></h2>
					
					<p><label style="width:95px;">Thành viên</label><label class="two_points">:</label> <?php echo $this->_tpl_vars['group']['member_count']; ?>
</p>
					<p><label style="width:95px;">Quản trị viên</label><label class="two_points">:</label>
						<a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['group_leader']['id'])), $this);?>
"><?php echo $this->_tpl_vars['group_leader']['first_name']; ?>
 <?php echo $this->_tpl_vars['group_leader']['last_name']; ?>
</a>
					</p>
					
					
		
				</div>
				<br style="clear: both" />
				
				<div class="pic_description">
				    <?php $_from = $this->_tpl_vars['group']['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
					<div class="pic_description_item" rel="<?php echo $this->_tpl_vars['item']['id']; ?>
">					
					    <div class="content" style="margin-top: 0px;margin-bottom: 10px;word-wrap: break-word;"><?php echo $this->_tpl_vars['item']['description']; ?>
</div>
					    
					    <?php if ($this->_tpl_vars['pb_userid'] == 1030 || $this->_tpl_vars['pb_userid'] == $this->_tpl_vars['group']['leader_id']): ?>
						<div class="pic_description_form">
						    <form class="picdes fhide" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postStudygrouppicDescription'), $this);?>
" method="post">
							<textarea name="description" style="height:110px"><?php if ($this->_tpl_vars['item']['description']): ?><?php echo $this->_tpl_vars['item']['description_raw']; ?>
<?php else: ?>Thêm mô tả cho hình ảnh<?php endif; ?></textarea>
							<input type="button" class="close" value="Hủy" />
							<input type="button" class="save" value="Hoàn thành" />
						    </form>
						    <h4><a href="javascript:void(0)">
						    <?php if ($this->_tpl_vars['item']['description']): ?>
							Sửa mô tả cho hình ảnh
						    <?php else: ?>
							Thêm mô tả cho hình ảnh
						    <?php endif; ?>
						    </a></h4>
						    
						</div>
					    <?php endif; ?>
					    
					    
					    <br style="clear: both" />
				
					    <div class="detail-comments">
						    <h4><?php echo $this->_tpl_vars['_comments']; ?>
 (<span class="comment_count"><?php echo $this->_tpl_vars['item']['comments']['count']; ?>
</span>)</h4>
						    
						    <div class="comments-box">
						    
							    <div class="comments_list">
								    
							    </div>
						    
							    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
								    <form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postStudygrouppicComment'), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
									    <img src="<?php echo $this->_tpl_vars['pb_userinfo']['photo']; ?>
" />
									    <?php echo smarty_function_formhash(array(), $this);?>

									    <input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
									    <textarea id="icomment" name="data[content]" class="studymemberpic_textarea"></textarea>
									    
									    <!--<input type="button" id="postcmm" value="<?php echo $this->_tpl_vars['_send']; ?>
" onclick="postComment()" />-->
								    </form>
							    <?php else: ?>
								<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postStudygrouppicComment'), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
								    <input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
								    <a class="comment_but" href="#login-box">Gửi bình luận</a>
								</form>
							    <?php endif; ?>
						    
						    </div>
					    </div>
					    
					    
					</div>
					
					
					
				    <?php endforeach; endif; unset($_from); ?>
				    
				    
				</div>
				
				
			</div>
			 
		</div>