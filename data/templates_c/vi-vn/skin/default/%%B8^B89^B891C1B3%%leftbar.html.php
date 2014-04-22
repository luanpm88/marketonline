<?php /* Smarty version 2.6.27, created on 2014-04-14 15:58:43
         compiled from leftbar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'leftbar.html', 99, false),)), $this); ?>
<aside class="four columns leftbar_space" id="left-sidebar">
	      <div class="tree_bound">
		<div class="tree_loading"></div>
	      </div>
              
              
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



<?php echo '
<script>
    $(document).ready(function() {
	$.ajax({
	    url: "'; ?>
<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
<?php echo 'index.php?do=product&action=get_space_tree&userid='; ?>
<?php echo $_GET['userid']; ?>
<?php echo '&page_memid='; ?>
<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
<?php echo '&typeid='; ?>
<?php echo $_GET['typeid']; ?>
<?php echo '&page='; ?>
<?php echo $_GET['page']; ?>
<?php echo '&memberid='; ?>
<?php echo $_GET['memberid']; ?>
<?php echo '&order='; ?>
<?php echo $_GET['order']; ?>
<?php echo '",
	}).done(function ( data ) {
	    if( console && console.log ) {
		$(\'.tree_bound\').html(data);
	    }
	});
    });
</script>
'; ?>