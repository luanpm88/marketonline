<?php /* Smarty version 2.6.27, created on 2014-03-31 10:13:47
         compiled from default%5Cstudypost/ajaxStudypictureDetail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\studypost/ajaxStudypictureDetail.html', 12, false),array('function', 'formhash', 'default\\studypost/ajaxStudypictureDetail.html', 85, false),)), $this); ?>
<div class="offer_content_inner" style="">
    
			
			<div class="left-offerbox">
			    <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id']): ?>
				<div class="" style="position: absolute">
				    <a class="overbox_del_studymempic" href="javascript:void(0)" title="Xóa hình này">X</a>
				</div>
			    <?php endif; ?>
				<a href="javascript:void(0)">					
					<?php $_from = $this->_tpl_vars['member']['studypics']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
					    <img del-url="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'del_studypic','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" src="<?php echo $this->_tpl_vars['item']['name_origin']; ?>
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
						<a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['member']['id'])), $this);?>
">
						    <img src="<?php echo $this->_tpl_vars['member']['photo']; ?>
" />
						</a>
						<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
							<a class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>" onclick="box(<?php echo $this->_tpl_vars['member']['id']; ?>
, false, <?php echo $this->_tpl_vars['member']['membertype_id']; ?>
)" href="javascript:void(0)">Tin nhắn</a>
						<?php else: ?>
							<a onclick="" href="#login-box" class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?> comment_but">Nhắn tin</a>
						<?php endif; ?>
					</div>
					<h2><a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['member']['id'])), $this);?>
"><?php echo $this->_tpl_vars['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['member']['last_name']; ?>
</a></h2>
					
					<?php if ($this->_tpl_vars['member']['school_name']): ?><p class=""><label>Trường </label><label class="two_points">:</label> <?php echo $this->_tpl_vars['member']['school_name']; ?>
</p><?php endif; ?>
					<?php if ($this->_tpl_vars['member']['class']): ?><p><label>Lớp </label><label class="two_points">:</label> <?php echo $this->_tpl_vars['member']['class']; ?>
</p><?php endif; ?>
					<?php if ($this->_tpl_vars['member']['gender']): ?><p><label>Giới tính </label><label class="two_points">:</label> <?php if ($this->_tpl_vars['member']['gender'] == 1): ?>Name<?php else: ?>Nữ<?php endif; ?></p><?php endif; ?>
					<?php if ($this->_tpl_vars['member']['address']): ?><p><label>Địa chỉ </label><label class="two_points">:</label> <?php echo $this->_tpl_vars['member']['address']; ?>
</p><?php endif; ?>
					<?php if ($this->_tpl_vars['member']['mobile']): ?><p><label>Điện thoại </label><label class="two_points">:</label> <?php echo $this->_tpl_vars['member']['mobile']; ?>
</p><?php endif; ?>
					<?php if ($this->_tpl_vars['member']['email']): ?><p><label>Email </label><label class="two_points">:</label> <?php echo $this->_tpl_vars['member']['email']; ?>
</p><?php endif; ?>
					
					
		
				</div>
				<br style="clear: both" />
				
				<div class="pic_description">
				    <?php $_from = $this->_tpl_vars['member']['studypics']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
					<div class="pic_description_item" rel="<?php echo $this->_tpl_vars['item']['id']; ?>
">					
					    <div class="content" style="margin-top: 0px;margin-bottom: 10px;word-wrap: break-word;"><?php echo $this->_tpl_vars['item']['description']; ?>
</div>
					    
					    <?php if ($this->_tpl_vars['pb_userid'] == $this->_tpl_vars['member']['id']): ?>
						<div class="pic_description_form">
						    <form class="picdes fhide" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postStudymemberimageDescription'), $this);?>
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
								    <form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postStudymemberimageComment'), $this);?>
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
								<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'postStudymemberimageComment'), $this);?>
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