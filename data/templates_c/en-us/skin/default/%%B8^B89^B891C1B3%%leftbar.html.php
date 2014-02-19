<?php /* Smarty version 2.6.27, created on 2013-06-28 03:48:08
         compiled from leftbar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'leftbar.html', 10, false),)), $this); ?>
<aside class="four columns" id="left-sidebar">
	      
	      <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_product_sort']; ?>
</h3>
		    <div class="scrollbarleft">
			<ul>
				<?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
					<li>
						<?php if ($this->_tpl_vars['item0']['sub']): ?><?php else: ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?><a <?php if ($this->_tpl_vars['level']['0'] == $this->_tpl_vars['item0']['id']): ?>class="active"<?php endif; ?> title="<?php echo $this->_tpl_vars['item0']['typename']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($this->_tpl_vars['item0']['id']),'userid' => ($_GET['userid'])), $this);?>
"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a>
						<?php if ($this->_tpl_vars['item0']['sub']): ?><img src="images/xpand.jpg"/><?php endif; ?>
						<ul <?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['level']['0']): ?>style="display: block"<?php endif; ?>>
						<?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['level_1']['iteration']++;
?>
							<li>
								<?php if ($this->_tpl_vars['item1']['sub']): ?><?php else: ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?><a <?php if ($this->_tpl_vars['level']['1'] == $this->_tpl_vars['item1']['id']): ?>class="active"<?php endif; ?> title="<?php echo $this->_tpl_vars['item1']['typename']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($this->_tpl_vars['item1']['id']),'userid' => ($_GET['userid'])), $this);?>
"><?php echo $this->_tpl_vars['item1']['name']; ?>
</a>
								<?php if ($this->_tpl_vars['item1']['sub']): ?><img src="images/xpand.jpg"/><?php endif; ?>
								<ul <?php if ($this->_tpl_vars['item1']['id'] == $this->_tpl_vars['level']['1']): ?>style="display: block"<?php endif; ?>>
								<?php $_from = $this->_tpl_vars['item1']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['item2']):
        $this->_foreach['level_2']['iteration']++;
?>
									<li>
										<?php if ($this->_tpl_vars['item2']['sub']): ?><?php else: ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?><a <?php if ($this->_tpl_vars['level']['2'] == $this->_tpl_vars['item2']['id']): ?>class="active"<?php endif; ?> title="<?php echo $this->_tpl_vars['item2']['typename']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($this->_tpl_vars['item2']['id']),'userid' => ($_GET['userid'])), $this);?>
"><?php echo $this->_tpl_vars['item2']['name']; ?>
</a>
										<?php if ($this->_tpl_vars['item2']['sub']): ?><img src="images/xpand.jpg"/><?php endif; ?>
										<ul <?php if ($this->_tpl_vars['item2']['id'] == $this->_tpl_vars['level']['2']): ?>style="display: block"<?php endif; ?>>
										<?php $_from = $this->_tpl_vars['item2']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_3'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_3']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key3'] => $this->_tpl_vars['item3']):
        $this->_foreach['level_3']['iteration']++;
?>
											<li>
												<?php if ($this->_tpl_vars['item3']['sub']): ?><?php else: ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?><a <?php if ($this->_tpl_vars['level']['3'] == $this->_tpl_vars['item3']['id']): ?>class="active"<?php endif; ?> title="<?php echo $this->_tpl_vars['item3']['typename']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($this->_tpl_vars['item3']['id']),'userid' => ($_GET['userid'])), $this);?>
"><?php echo $this->_tpl_vars['item3']['name']; ?>
</a>
											</li>
										<?php endforeach; endif; unset($_from); ?>
										</ul>
									</li>
								<?php endforeach; endif; unset($_from); ?>
								</ul>
							</li>
						<?php endforeach; endif; unset($_from); ?>
						</ul>
					</li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
			</div>
		</div>
	      </section>
              
              
              
              <section style="display: none" id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_friend_links']; ?>
</h3>
                    
                    <?php if ($this->_tpl_vars['Links']): ?>
				<ul>
					<?php $_from = $this->_tpl_vars['Links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spacelink'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spacelink']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spacelink']):
        $this->_foreach['spacelink']['iteration']++;
?>
					<li><a href="<?php echo $this->_tpl_vars['spacelink']['url']; ?>
"><?php echo $this->_tpl_vars['spacelink']['title']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
				<?php endif; ?>
		</div></section>
	      
	      
	      <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_friend_links']; ?>
</h3>
                    
				<?php if ($this->_tpl_vars['Friends']): ?>
				<ul>
					<?php $_from = $this->_tpl_vars['Friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spacelink'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spacelink']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spacelink']):
        $this->_foreach['spacelink']['iteration']++;
?>
					<li><a href="space/?userid=<?php echo $this->_tpl_vars['spacelink']['username']; ?>
&do=" target="_blank"><?php echo $this->_tpl_vars['spacelink']['username']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
				<?php endif; ?>

		</div></section>
	      
	      <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_follow']; ?>
</h3>
                    
				<?php if ($this->_tpl_vars['FollowFriends']): ?>
				<ul>
					<?php $_from = $this->_tpl_vars['FollowFriends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spacelink'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spacelink']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spacelink']):
        $this->_foreach['spacelink']['iteration']++;
?>
					<li><a href="space/?userid=<?php echo $this->_tpl_vars['spacelink']['username']; ?>
&do=" target="_blank"><?php echo $this->_tpl_vars['spacelink']['name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
				<?php endif; ?>

		</div></section>
              
<!--              <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_contact_method']; ?>
</h3>
                    
                    <p>
			<?php echo $this->_tpl_vars['_contact_people']; ?>
 <?php echo $this->_tpl_vars['COMPANY']['link_man']; ?>
  </p>
			<p><?php echo $this->_tpl_vars['_address']; ?>
 <?php echo $this->_tpl_vars['COMPANY']['address']; ?>
</p>
                        <p><?php echo $this->_tpl_vars['_phone']; ?>
 <?php echo $this->_tpl_vars['COMPANY']['tel']; ?>
</p>
                        <p><?php echo $this->_tpl_vars['_fax']; ?>
 <?php echo $this->_tpl_vars['COMPANY']['fax']; ?>
</p>
                        
                      
                    
                    
		</div></section>-->
              
</aside>
