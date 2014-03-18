<?php /* Smarty version 2.6.27, created on 2014-03-18 16:12:48
         compiled from default/studypost/ajaxStudypictureDetail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/ajaxStudypictureDetail.html', 101, false),array('function', 'formhash', 'default/studypost/ajaxStudypictureDetail.html', 103, false),array('modifier', 'truncate', 'default/studypost/ajaxStudypictureDetail.html', 125, false),)), $this); ?>
<div class="offer_content_inner" style="">
			 
			<div class="left-offerbox">
				<a href="javascript:void(0)">
					<?php $_from = $this->_tpl_vars['member']['slides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
					    <img src="<?php echo $this->_tpl_vars['item']; ?>
" rel="<?php echo $this->_tpl_vars['key']; ?>
" />
					<?php endforeach; endif; unset($_from); ?>								
				</a>
				<span class="next">.</span>
				<span class="previous">.</span>
			</div>
			
			<div class="right-offerbox">
				<div class="member-title">
						
						
			<?php if ($this->_tpl_vars['company']): ?>
						
					<div class="avatar">
						<a class="pic" target="_blank" href="<?php echo $this->_tpl_vars['company']['url']; ?>
"><img src="<?php echo $this->_tpl_vars['company']['logo']; ?>
" /></a>
						<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
							<a class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>" onclick="getChatbox(<?php echo $this->_tpl_vars['Trade']['member_id']; ?>
, false)" href="javascript:void(0)">Tin nhắn</a>
						<?php else: ?>
							<a onclick="" href="#login-box" class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?> comment_but">Nhắn tin</a>
						<?php endif; ?>
					</div>
					<h2><a target="_blank" href="<?php echo $this->_tpl_vars['company']['url']; ?>
"><?php echo $this->_tpl_vars['company']['shop_name']; ?>
</a></h2>
					
					<?php if ($this->_tpl_vars['company']['link_man']): ?>
						<p>
							<label>Liên hệ</label>:
							<?php echo $this->_tpl_vars['company']['link_man']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['company']['contact_mobile']): ?>
						<p>
							<label>Di động</label>:
							<?php echo $this->_tpl_vars['company']['contact_mobile']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['company']['contact_email']): ?>
						<p>
							<label>Email</label>:
							<?php echo $this->_tpl_vars['company']['contact_email']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['company']['address']): ?>
						<p>
							<label>Địa chỉ</label>:
							<?php echo $this->_tpl_vars['member']['address']; ?>

						</p>
					<?php endif; ?>
			<?php else: ?>
			
						<div class="avatar">
						<img src="<?php echo $this->_tpl_vars['member']['photo']; ?>
" />
						<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
							<a class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>" onclick="getChatbox(<?php echo $this->_tpl_vars['member']['id']; ?>
, false)" href="javascript:void(0)">Tin nhắn</a>
						<?php else: ?>
							<a onclick="" href="#login-box" class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?> comment_but">Nhắn tin</a>
						<?php endif; ?>
					</div>
					<h2><?php echo $this->_tpl_vars['member']['first_name']; ?>
 <?php echo $this->_tpl_vars['member']['last_name']; ?>
</h2>
					
					<?php if ($this->_tpl_vars['member']['mobile']): ?>
						<p>
							<label>Điện thoại</label>:
							<?php echo $this->_tpl_vars['member']['mobile']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['member']['email']): ?>
						<p>
							<label>Email</label>:
							<?php echo $this->_tpl_vars['member']['email']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['member']['address']): ?>
						<p>
							<label>Địa chỉ</label>:
							<?php echo $this->_tpl_vars['member']['address']; ?>

						</p>
					<?php endif; ?>
			<?php endif; ?>
						
						
					
						
				</div>
				<br style="clear: both" />
				
				<div class="detail-comments">
					<h4><?php echo $this->_tpl_vars['_comments']; ?>
 (<span class="comment_count"><?php echo $this->_tpl_vars['comments_count']; ?>
</span>)</h4>
					
					<div class="comments-box">
					
						<div class="comments_list">
							
						</div>
					
						<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
							<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postoffercomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
								<img src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.png  <?php endif; ?> <?php endif; ?>" />
								<?php echo smarty_function_formhash(array(), $this);?>

								<input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['Trade']['id']; ?>
" />
								<textarea id="comment" name="data[content]"></textarea>
								
								<!--<input type="button" id="postcmm" value="<?php echo $this->_tpl_vars['_send']; ?>
" onclick="postComment()" />-->
							</form>
						<?php else: ?>
							<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postoffercomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
									<img src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.png  <?php endif; ?> <?php endif; ?>" />
									<?php echo smarty_function_formhash(array(), $this);?>

									<input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['Trade']['id']; ?>
" />
									<input type="hidden" id="guest_name" name="data[guest_name]" value="" />
									<input type="hidden" id="guest_email" name="data[guest_email]" value="" />
									<input type="hidden" id="guest_isedit" name="guest_isedit" value="0" />
									<textarea id="comment" name="data[content]"></textarea> <span class="guest_info"></span>
							</form>
						<?php endif; ?>
					
					</div>
				</div>
				
				<div class="detail-info">
					<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['Trade']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</h4>
					<div class="description">
						<?php echo $this->_tpl_vars['Trade']['content']; ?>

					</div>
				</div>
			</div>
			 
		</div>

<?php echo '
<script>
	if ($.cookie("guest_name") && $.cookie("guest_email")) {
			$(\'input[name="box_guest_name"]\').val($.cookie("guest_name"));
			$(\'input[name="box_guest_email"]\').val($.cookie("guest_email"));
		}
		if($(\'input[name="box_guest_name"]\').val() != \'\' && $(\'input[name="box_guest_name"]\').val() != \'\')
		{
			$(\'#guest_name\').val($(\'input[name="box_guest_name"]\').val());
			$(\'#guest_email\').val($(\'input[name="box_guest_email"]\').val());
			$(\'.guest_info\').html(\'<strong>\'+$(\'#guest_name\').val()+\'</strong> (\'+$(\'#guest_email\').val()+\') | <a class="change_guest_info" href="javascript:void(0)">Chỉnh sửa</a> - <a class="delete_guest_info" href="javascript:void(0)">Thoát</a>\');
		}
</script>
'; ?>