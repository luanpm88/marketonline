<?php /* Smarty version 2.6.27, created on 2014-07-04 13:46:39
         compiled from intro.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pager', 'intro.html', 133, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_intro']),'cur' => 'space_index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row widget space_content">


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="eleven columns" id="content">


              
              <div class="row" style="margin-right: 0;">
    <div style="width: 100%;padding-left: 0" class="eleven columns">

	<div id="container">


<h3 class="top_tab_intro" style="padding-left: 10px; margin-bottom: 15px;">
    <a href="javascript:void(0)" class="active" rel="intro_tab"><?php echo $this->_tpl_vars['_space_intro']; ?>
</a>
    <a href="javascript:void(0)" rel="policy_tab"><?php echo $this->_tpl_vars['_policy']; ?>
</a>
    <a href="javascript:void(0)" rel="album_tab"><?php echo $this->_tpl_vars['_company_album']; ?>
 <?php echo $this->_tpl_vars['membertype_name']; ?>
</a>
</h3>


<div id="intro_tab">
    <div class="row" style="padding-left: 20px; padding-top: 0;">                
		    <div class="columns logo logoz"><a href="<?php echo $this->_tpl_vars['Menus']['index']; ?>
"><img src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
"></a></div>
		    
		    <div class="text left_com_info">
			    <h3><?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</h3>
			    <p><label><?php echo $this->_tpl_vars['_address']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['address']; ?>
</p>
			    <?php if ($this->_tpl_vars['COMPANY']['tel']): ?><p><label><?php echo $this->_tpl_vars['_phone']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['tel']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['COMPANY']['fax']): ?><p><label><?php echo $this->_tpl_vars['_fax']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['fax']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['COMPANY']['email']): ?><p><label><?php echo $this->_tpl_vars['_email']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['email']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['COMPANY']['site_url_name']): ?><p><label><?php echo $this->_tpl_vars['_company_home']; ?>
</label> <a target="_blank" rel="nofollow" href="http://<?php echo $this->_tpl_vars['COMPANY']['site_url_name']; ?>
"><?php echo $this->_tpl_vars['COMPANY']['site_url_name']; ?>
</a></p><?php endif; ?>			
		    </div>
		  
		  <br>
		  <br style="clear: both">
		    
		    
		    <br />
		    <h2 style="padding-left: 0;font-size: 20px;"><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 1): ?><?php echo $this->_tpl_vars['_shop_intro']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 2): ?><?php echo $this->_tpl_vars['_company_intro']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 3): ?><?php echo $this->_tpl_vars['_shop_intro']; ?>
<?php endif; ?></h2>
		    <h3 style="padding-left: 0;font-size: 18px;margin-bottom: 10px;">A. <?php echo $this->_tpl_vars['_person_company_contact']; ?>
</h3>
		    
		    <div class="text left_com_info" style="margin-left: 130px">
			    <p><label>Họ và Tên</label> <?php echo $this->_tpl_vars['COMPANY']['link_man']; ?>
<?php if ($this->_tpl_vars['COMPANY']['position']): ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $this->_tpl_vars['_chucvu']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['position']; ?>
</p><?php endif; ?>
			    <p><label><?php echo $this->_tpl_vars['_mobile_number']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['contact_mobile']; ?>
</p>
			    <p><label><?php echo $this->_tpl_vars['_email']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['contact_email']; ?>
</p>
			    <?php if ($this->_tpl_vars['COMPANY']['facebook']): ?><p><label>Facebook</label> <a href="https://<?php echo $this->_tpl_vars['COMPANY']['facebook']; ?>
" rel="nofollow" target="_blank"><?php echo $this->_tpl_vars['COMPANY']['facebook']; ?>
</a></p><?php endif; ?>
		    </div>
		    
		    <br style="clear: both">
		    <br />
		    <?php if ($this->_tpl_vars['MEMBER']['membertype_id'] != 1): ?>
			<h3 style="padding-left: 0;font-size: 18px;margin-bottom: 10px;">B. <?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 2): ?><?php echo $this->_tpl_vars['_company_power']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 3): ?><?php echo $this->_tpl_vars['_shop_power']; ?>
<?php endif; ?></h3>
			<div class="text left_com_info wwo" style="margin-left: 130px">
				<?php if ($this->_tpl_vars['COMPANY']['main_customer']): ?><p><label><?php echo $this->_tpl_vars['_main_customer']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['main_customer']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['vp_address']): ?><p><label><?php echo $this->_tpl_vars['_phone']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['vp_address']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['vp_fax']): ?><p><label><?php echo $this->_tpl_vars['_fax']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['vp_fax']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['vp_email']): ?><p><label><?php echo $this->_tpl_vars['_email']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['vp_email']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['main_brand'] && false): ?><p><label><?php echo $this->_tpl_vars['_brand_name']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['main_brand']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['industry']): ?><p><label><?php echo $this->_tpl_vars['_sectors']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['industry']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['ins_string']): ?><p><label><?php echo $this->_tpl_vars['_sectors']; ?>
</label> <?php echo $this->_tpl_vars['ins_string']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['reg_address']): ?><p><label><?php echo $this->_tpl_vars['_legal_note_company']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['reg_address']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['registration_date']): ?><p><label><?php echo $this->_tpl_vars['_registration_date']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['registration_date']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['boss_name']): ?><p><label><?php echo $this->_tpl_vars['_legal_person_s']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['boss_name']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['chairman']): ?><p><label><?php echo $this->_tpl_vars['_company_boss_man']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['chairman']; ?>
</p><?php endif; ?>
				
				<?php if ($this->_tpl_vars['COMPANY']['reg_fund']): ?><p><label><?php echo $this->_tpl_vars['_registration_funds']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['reg_fund']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['mst']): ?><p><label><?php echo $this->_tpl_vars['_mst']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['mst']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['bank_account']): ?><p><label><?php echo $this->_tpl_vars['_account']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['bank_account']; ?>
 ; <?php echo $this->_tpl_vars['_opening_bank']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['bank_from']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['property']): ?><p><label><?php echo $this->_tpl_vars['_bussiness_form']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['property']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['manage_type']): ?><p><label><?php echo $this->_tpl_vars['_business_model']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['manage_type']; ?>
</p><?php endif; ?>
				
				<?php if ($this->_tpl_vars['COMPANY']['employee_amount']): ?><p><label><?php echo $this->_tpl_vars['_employees_number']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['employee_amount']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['year_annual']): ?><p><label><?php echo $this->_tpl_vars['_year_turnover']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['year_annual']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['COMPANY']['zipcode'] && false): ?><p><label><?php echo $this->_tpl_vars['_zip']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['zipcode']; ?>
</p><?php endif; ?>
				
			</div>
		    <?php endif; ?>
		    
		    
		    <br style="clear: both">
		    <br />
		    <h3 style="padding-left: 0;font-size: 18px;margin-bottom: 10px;">C. <?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 1): ?><?php echo $this->_tpl_vars['_thungo_shop']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 2): ?><?php echo $this->_tpl_vars['_thungo_company']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 3): ?><?php echo $this->_tpl_vars['_thungo_shop']; ?>
<?php endif; ?></h3>
		    <div class="company_intro"><?php echo $this->_tpl_vars['COMPANY']['description']; ?>
</div>
    </div>  
</div>

<div id="policy_tab">
    <div class="row" style="padding-left: 20px; padding-top: 0;">
	<?php echo $this->_tpl_vars['COMPANY']['policy']; ?>

    </div>
</div>

<div id="album_tab">
    <div class="row" style="padding-left: 20px; padding-top: 0;margin-right: -20px">
	<div id="showAlbumDetail">
	    
	    
	</div>
	<h1 class="other_album"><?php echo $this->_tpl_vars['_other_album']; ?>
</h1>
					<?php if ($this->_tpl_vars['Items']): ?>
						<ul id="com_album">
						<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
							<li><a class="fancybox" href="javascript:void(0)" onclick="loadAlbumDetail(<?php echo $this->_tpl_vars['item']['a_id']; ?>
,<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
,$(this))"><img src="<?php echo $this->_tpl_vars['item']['image']; ?>
" width="80" height="80" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" border="0"></a><p><?php echo $this->_tpl_vars['item']['title']; ?>
</p></li>
						<?php endforeach; endif; unset($_from); ?>				
						</ul>
						<div class="clear"></div>
						<p class="page"><?php echo $this->_tpl_vars['ByPages']; ?>
</p>
					<?php endif; ?>
    </div>
</div>
			
		
		<div class="clear"></div>


						<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 20), $this);?>
</div></p>

</div>
    </div>

</div>
                  
              </div>



</div>



</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>












