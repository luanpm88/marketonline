<?php /* Smarty version 2.6.27, created on 2014-02-17 10:11:56
         compiled from leftbar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'leftbar.html', 11, false),)), $this); ?>
<aside class="four columns leftbar_space" id="left-sidebar">
	      <?php if ($this->_tpl_vars['tree']): ?>
	      <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_product_category']; ?>
</h3>
		    <div class="scrollbarleft">
			<ul>
			    <?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
					  <?php if (true): ?>
					      <li style="padding-left: <?php echo $this->_tpl_vars['item0']['padding']; ?>
px<?php if ($this->_tpl_vars['item0']['hide']): ?>;display: none<?php endif; ?>" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954 plevel<?php echo $this->_tpl_vars['item0']['lpad']; ?>
 <?php if ($this->_tpl_vars['item0']['member_id'] == $_GET['memberid'] && $this->_tpl_vars['item0']['id'] == $_GET['typeid']): ?> active<?php endif; ?>" id="menu-item-954">
						<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['id']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($this->_tpl_vars['item0']['id']),'member_id' => ($this->_tpl_vars['item0']['member_id']),'userid' => ($_GET['userid'])), $this);?>
">
						  <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span><?php echo $this->_tpl_vars['item0']['name']; ?>
 
						</a>
					      </li>
					   <?php endif; ?>
			    <?php endforeach; endif; unset($_from); ?>
			</ul>
			</div>
		</div>
	      </section>
              <?php endif; ?>
              
              
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
	      
	       <?php if ($this->_tpl_vars['pb_username'] == 'Shop Yen' && $this->_tpl_vars['COMPANY']['id'] != 479): ?>
			    <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products kkleft">
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
						      <li><a href="<?php echo $this->_tpl_vars['spacelink']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['spacelink']['shop_name']; ?>
</a></li>
						      <?php endforeach; endif; unset($_from); ?>
					      </ul>
					      <?php endif; ?>
	      
			      </div></section>
			    
			    
			   
			    
			    <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products kkleft">
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
						      <li><a href="<?php echo $this->_tpl_vars['spacelink']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['spacelink']['shop_name']; ?>
</a></li>
						      <?php endforeach; endif; unset($_from); ?>
					      </ul>
					      <?php endif; ?>
	      
			      </div></section>
	      
	      <?php endif; ?>
              
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
		<?php if ($this->_tpl_vars['COMPANY']['facebook']): ?>
		
		<div class="wpb_wrapper fb_boxx">
		    <img style="display: block; margin: 0 auto" src="images/facebg.png">
		    
		    
			    <div class="facebookOuter">
				    <div class="facebookInner">
					<div class="fb-like-box"
					     data-width="235" data-height="265"
					     data-href="<?php echo $this->_tpl_vars['COMPANY']['facebook_full']; ?>
"
					     data-colorscheme="light"
					     data-border-color="#4e616d" data-show-faces="true"
					     data-stream="false" data-header="false">
					</div>
				    </div>
				</div>
    
		</div>
		

	      <?php endif; ?>
              
</aside>
