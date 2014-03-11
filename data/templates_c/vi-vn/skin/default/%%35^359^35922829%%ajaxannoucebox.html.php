<?php /* Smarty version 2.6.27, created on 2014-03-11 11:21:24
         compiled from ajaxannoucebox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'offer', 'ajaxannoucebox.html', 23, false),array('block', 'job', 'ajaxannoucebox.html', 99, false),array('block', 'companynews', 'ajaxannoucebox.html', 127, false),array('block', 'product', 'ajaxannoucebox.html', 145, false),array('modifier', 'truncate', 'ajaxannoucebox.html', 25, false),array('function', 'the_url', 'ajaxannoucebox.html', 147, false),)), $this); ?>
<?php echo '
<style>
    .fancybox-inner
    {
        height: auto !important;
    }
</style>
'; ?>



<ul  class="product_list_widget">
    
    
    <li class="no_ii no_corp" style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
	<a class="tooltipz iim ico-corp corpico" href="#nocorp_box" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_supply_corp']; ?>
:</label></a>
        <div id="nocorp_box" style="display: none">
	<div style="padding: 20px 20px 10px 20px;width: 500px;height:72px">
			 <div class="content_inner">
			 <h2><?php echo $this->_tpl_vars['_no_corp']; ?>
</h2>
			 </div>
	</div></div> 
    </li>
    <?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1,'typeid' => 16,'memberid' => $this->_tpl_vars['MEMBER']['id'])); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    				<li style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
				    <a class="tooltipz iim ico-corp buyco" href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_supply_corp']; ?>
:</label> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</a>
                                    <?php echo '<style>
                                            .no_corp
                                            {
                                                display: none;
                                            }
                                    </style>'; ?>

                                </li>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

    
    
    
    
    
     <li class="no_ii no_offer" style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
	<a class="tooltipz iim ico-corp ppico" href="#nosupply_box" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_supply_offer_s']; ?>
:</label></a>
        <div id="nosupply_box" style="display: none">
	<div style="padding: 20px 20px 10px 20px;width: 500px;height:72px">
			 <div class="content_inner">
			 <h2><?php echo $this->_tpl_vars['_no_supply']; ?>
</h2>
			 </div>
	</div></div> 
    </li>
    <?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1,'typeid' => 10,'memberid' => $this->_tpl_vars['MEMBER']['id'])); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    				<li style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
				    <a class="tooltipz iim ico-corp ppico" href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_supply_offer_s']; ?>
:</label> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</a>
                                    <?php echo '<style>
                                            .no_offer
                                            {
                                                display: none;
                                            }
                                    </style>'; ?>

                                </li>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
    
    
    
    
    <li class="no_ii no_buy" style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
	<a class="tooltipz iim ico-corp buyco" href="#nobuy_box" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_release']; ?>
:</label></a>
        <div id="nobuy_box" style="display: none">
	<div style="padding: 20px 20px 10px 20px;width: 500px;height:72px">
			 <div class="content_inner">
			 <h2><?php echo $this->_tpl_vars['_no_release']; ?>
</h2>
			 </div>
	</div></div> 
    </li>
    <?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1,'typeid' => "14,9",'memberid' => $this->_tpl_vars['MEMBER']['id'])); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    				<li style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
				    <a class="tooltipz iim ico-corp buyco" href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_release']; ?>
:</label> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 24) : smarty_modifier_truncate($_tmp, 24)); ?>
</a>
                                    <?php echo '<style>
                                            .no_buy
                                            {
                                                display: none;
                                            }
                                    </style>'; ?>

                                </li>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
    
    
    
    
<li class="no_ii no_job" style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
	<a class="tooltipz iim ico-corp jobco" href="#nojob_box" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_job']; ?>
:</label></a>
        <div id="nojob_box" style="display: none">
	<div style="padding: 20px 20px 10px 20px;width: 500px;height:72px">
			 <div class="content_inner">
			 <h2><?php echo $this->_tpl_vars['_no_job']; ?>
</h2>
			 </div>
	</div></div> 
    </li>
<?php $this->_tag_stack[] = array('job', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1,'status' => 1)); $_block_repeat=true;smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				
				
				<li style="border-bottom:solid 1px #dfdfdf">
				   <a class="tooltipz ico-corp jobco" href="<?php echo $this->_tpl_vars['job']['url']; ?>
" title="<?php echo $this->_tpl_vars['job']['title']; ?>
"><label><?php echo $this->_tpl_vars['_job']; ?>
:</label> <?php echo ((is_array($_tmp=$this->_tpl_vars['job']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a>
                                    <?php echo '<style>
                                            .no_job
                                            {
                                                display: none;
                                            }
                                    </style>'; ?>

                                </li>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>





<li class="no_ii no_news" style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
	<a class="tooltipz iim ico-corp newsco" href="#nonews_box" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><label><?php echo $this->_tpl_vars['_space_news']; ?>
:</label></a>
        <div id="nonews_box" style="display: none">
	<div style="padding: 20px 20px 10px 20px;width: 500px;height:72px">
			 <div class="content_inner">
			 <h2><?php echo $this->_tpl_vars['_no_news']; ?>
</h2>
			 </div>
	</div></div> 
    </li>
<?php $this->_tag_stack[] = array('companynews', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1)); $_block_repeat=true;smarty_block_companynews($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

<li>
    <a class="tooltipz ico-corp newsco" href="<?php echo $this->_tpl_vars['companynews']['url']; ?>
" title="<?php echo $this->_tpl_vars['companynews']['title']; ?>
"><label><?php echo $this->_tpl_vars['_space_news']; ?>
:</label> <?php echo ((is_array($_tmp=$this->_tpl_vars['companynews']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a>
    <?php echo '<style>
        .no_news
        {
            display: none;
        }
    </style>'; ?>

</li>
						


	
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_companynews($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

                
                <?php $this->_tag_stack[] = array('product', array('name' => 'item','companyid' => $this->_tpl_vars['COMPANY']['id'],'memberid' => $this->_tpl_vars['MEMBER']['id'],'row' => 1)); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<!--<li>
				<img alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
"><a class="tooltipz iim" target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
">[<?php echo $this->_tpl_vars['_products']; ?>
] <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a>
				
				</li>-->
					
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

                

</ul>