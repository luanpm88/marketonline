<?php /* Smarty version 2.6.27, created on 2014-01-15 08:29:54
         compiled from default%5Cproduct/meminfo.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'default\\product/meminfo.html', 418, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']),'nav_id' => ($this->_tpl_vars['nav_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<?php echo '


<script type="application/x-javascript">

function checkConfirmOrderFields() {
	
	var valid = true;
	
	//$("#receiver_email").val($("#email").val());
	//$("#receiver_fullname").val($("#fullname").val());
	//$("#receiver_mobile").val($("#mobile").val());
	//$("#receiver_address").val($("#address").val());
	
	if($("#email").val() == "")
	{
		$("#email").addClass(\'error\');
		valid = false;
	}
	else
	{
		$("#email").removeClass(\'error\');
	}
	
	if($("#fullname").val() == "")
	{
		$("#fullname").addClass(\'error\');
		valid = false;
	}
	else
	{
		$("#fullname").removeClass(\'error\');
	}
	
	if($("#mobile").val() == "")
	{
		$("#mobile").addClass(\'error\');
		valid = false;
	}
	else
	{
		$("#mobile").removeClass(\'error\');
	}
	
	if($("#address").val() == "")
	{
		$("#address").addClass(\'error\');
		valid = false;
	}
	else
	{
		$("#address").removeClass(\'error\');
	}
	
	//if($("#message").val() == "")
	//{
	//	$("#message").addClass(\'error\');
	//	valid = false;
	//}
	//else
	//{
	//	$("#message").removeClass(\'error\');
	//}
	
	if(!$(\'#chkSameBuyer\').is(\':checked\'))
	{
		if($("#receiver_email").val() == "")
		{
			$("#receiver_email").addClass(\'error\');
			valid = false;
		}
		else
		{
			$("#receiver_email").removeClass(\'error\');
		}
		
		if($("#receiver_fullname").val() == "")
		{
			$("#receiver_fullname").addClass(\'error\');
			valid = false;
		}
		else
		{
			$("#receiver_fullname").removeClass(\'error\');
		}
		
		if($("#receiver_mobile").val() == "")
		{
			$("#receiver_mobile").addClass(\'error\');
			valid = false;
		}
		else
		{
			$("#receiver_mobile").removeClass(\'error\');
		}
		
		if($("#receiver_address").val() == "")
		{
			$("#receiver_address").addClass(\'error\');
			valid = false;
		}
		else
		{
			$("#receiver_address").removeClass(\'error\');
		}
	}
	else
	{
		$(".reciever input").removeClass(\'error\');
	}
	
	return valid;
}
		
		
	$(document).ready(function() {
		
		//
		
		
		//buyer info
		function changeCheckBuyer() {
			//code
			if($(\'#chkSameBuyer\').is(\':checked\'))
			{
			    //alert("sdfsdfs");
			    $(\'.reciever input, .reciever textarea, .reciever select\').attr(\'disabled\', \'disabled\');		    
			}
			else
			{
			    $(\'.reciever input, .reciever textarea, .reciever select\').removeAttr(\'disabled\');
			}
		}
	
		changeCheckBuyer();
		$(\'#chkSameBuyer\').change( function () {
		
			changeCheckBuyer();
			if(this.checked) {
				updateReceiverFileds();
				$(".reciever input").removeClass(\'error\');
			    }
			
		
		});
		
		
		$(\'#CountryId\').change(function () {
				$.ajax({
					url: "index.php?do=product&action=getStates&country_id="+$(this).val(),
					//beforeSend: function ( xhr ) {
					//xhr.overrideMimeType("text/plain; charset=x-user-defined");
					//}
					}).done(function ( data ) {
					if( console && console.log ) {
						//alert(data);
						$(\'#mem_state\').html(data);
						updateReceiverFileds();
					}
				});
			}
		);
		
		$(\'#receiver_CountryId\').change(function () {
				$.ajax({
					url: "index.php?do=product&action=getStates&country_id="+$(this).val(),
					//beforeSend: function ( xhr ) {
					//xhr.overrideMimeType("text/plain; charset=x-user-defined");
					//}
					}).done(function ( data ) {
					if( console && console.log ) {
						//alert(data);
						$(\'#receiver_mem_state\').html(data);
						updateReceiverFileds();
					}
				});
			}
		);
		
		function updateReceiverFileds() {
			//code
			if($(\'#chkSameBuyer\').is(\':checked\'))
			{
				$("#receiver_email").val($("#email").val());
				$("#receiver_fullname").val($("#fullname").val());
				$("#receiver_mobile").val($("#mobile").val());
				$("#receiver_address").val($("#address").val());
				$("#receiver_CountryId").val($("#CountryId").val());
				$(".dataProductAreaId3_re").html($("#dataProductAreaId3").html());
				$(".dataProductAreaId2_re").html($("#dataProductAreaId2").html());
				$(".dataProductAreaId1_re").html($("#dataProductAreaId1").html());
				$(".dataProductAreaId3_re").val($("#dataProductAreaId3").val());
				$(".dataProductAreaId2_re").val($("#dataProductAreaId2").val());
				$(".dataProductAreaId1_re").val($("#dataProductAreaId1").val());
				//$("#receiver_mem_state").val($("#mem_state").val());
			}
		}
		updateReceiverFileds();
		//change auto
		$("#email").change(function() {updateReceiverFileds();});
		$("#fullname").change(function() {updateReceiverFileds();});
		$("#mobile").change(function() {updateReceiverFileds();});
		$("#CountryId").change(function() {updateReceiverFileds();});
		$("#dataProductAreaId1").change(function() {updateReceiverFileds();});
		$("#dataProductAreaId2").change(function() {updateReceiverFileds();});
		$("#dataProductAreaId3").change(function() {updateReceiverFileds();});
		$("#address").change(function() {updateReceiverFileds();});
	});
</script>

	'; ?>





<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p></p>
        </div>
	<div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a> </div>
        <h1 class="page-title">
                        Mua hàng                    </h1>

        

    </div>






	<div class="content">

    
    <div class="detailtopcon clearfix">
		
		
		<div class="qiugouleftcon carttable">
			<form name="offer_list_frm" id="cart" method="post" onsubmit="return checkConfirmOrderFields();">


<div class="orderdetail_form_ut">
<h3 class="head"><?php echo $this->_tpl_vars['_customer_info']; ?>
</h3>
		<!--<h2>Thông tin người mua</h2>   -->
                <p class="hint"><?php echo $this->_tpl_vars['_member_info_announce']; ?>
</p>
		
	<div class="checkInfor orderdetail_form">
                        
            
            <div class="clearfix bg-blockItem boderStore" style="margin-top:20px;">
                <div class="boderStore-line clearfix">    
                <div class="blockBStore">
            <h3><?php echo $this->_tpl_vars['_buyer_information']; ?>
</h3>
            <div class="contStore" style="clear: both;">
              <div class="formProfile box-profile">
		
		
		
		<?php if ($this->_tpl_vars['pb_company']): ?>
			<p>
				<span><?php echo $this->_tpl_vars['_username']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input type="text" maxlength="11" id="username" name="user[order][username]" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['username']): ?> readonly="readonly" <?php endif; ?>>
			</p>
			
			<p>
				<span><?php echo $this->_tpl_vars['_fullname']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input type="text" maxlength="11" id="fullname" name="data[order][fullname]" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_company']['link_man']; ?>
">
			</p>
			
			<p>
				<span><?php echo $this->_tpl_vars['_mobile']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input value="<?php echo $this->_tpl_vars['pb_company']['contact_mobile']; ?>
" type="text" maxlength="11" name="data[order][mobile]" id="mobile" class="bgWhite">
			</p>
			
			<p>
				<span><?php echo $this->_tpl_vars['_email']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input value="<?php echo $this->_tpl_vars['pb_company']['contact_email']; ?>
" type="text" name="data[order][email]" id="email" class="bgWhite" value="">
			</p>
			
				
			
			<p>
				<span><?php echo $this->_tpl_vars['_address']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input type="text" value="" maxlength="120" name="data[order][address]" id="address" class="bgWhite" />
			</p>		
		<?php else: ?>
			<p>
				<span><?php echo $this->_tpl_vars['_username']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input type="text" maxlength="11" id="username" name="user[order][username]" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['username']): ?> readonly="readonly" <?php endif; ?>>
			</p>
			
			<p>
				<span><?php echo $this->_tpl_vars['_fullname']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input type="text" maxlength="11" id="fullname" name="data[order][fullname]" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['fullname']): ?> readonly="readonly" <?php endif; ?>>
			</p>
			
			<p>
				<span><?php echo $this->_tpl_vars['_mobile']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input value="<?php echo $this->_tpl_vars['pb_userinfo']['mobile']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['mobile']): ?> readonly="readonly" <?php endif; ?> type="text" maxlength="11" name="data[order][mobile]" id="mobile" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_username']; ?>
">
			</p>
			
			<p>
				<span><?php echo $this->_tpl_vars['_email']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input value="<?php echo $this->_tpl_vars['pb_userinfo']['email']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['email']): ?> readonly="readonly" <?php endif; ?> type="text" name="data[order][email]" id="email" class="bgWhite" value="">
			</p>
			
				
			
			<p>
				<span><?php echo $this->_tpl_vars['_address']; ?>
<b class="red-bold">*</b>&nbsp;</span>
				<input type="text" value="<?php echo $this->_tpl_vars['pb_userinfo']['address']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['address']): ?> readonly="readonly" <?php endif; ?> maxlength="120" name="data[order][address]" id="address" class="bgWhite" />
			</p>
		<?php endif; ?>
		
		
		
		
		
              
                
		
                
              </div>
            </div>
          </div>
          
          <div class="blockBStore">
            <h3><?php echo $this->_tpl_vars['_receiver_information']; ?>
</h3>
	    <p style="margin:15px 0" class="sameBuy">
			<input checked="checked" type="checkbox" id="chkSameBuyer" name="data[orderz][chkSameBuyer]"><label for="buyer"><?php echo $this->_tpl_vars['_same_buyer']; ?>
</label>
		  </p>
            <div class="contStore" style="clear: both;">
              <div class="formProfile box-profile">
                  
		  
		  <div class="reciever">
                
		
		
		
		<p>
			<span><?php echo $this->_tpl_vars['_fullname']; ?>
<b class="red-bold">*</b>&nbsp;</span>
			<input type="text" maxlength="11" id="receiver_fullname" name="data[order][receiver_fullname]" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_userinfo']['receiver_fullname']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['receiver_fullname']): ?> disabled="disabled" <?php endif; ?>>
		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_mobile']; ?>
<b class="red-bold">*</b>&nbsp;</span>
			<input value="<?php echo $this->_tpl_vars['pb_userinfo']['receiver_mobile']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['receiver_mobile']): ?> disabled="disabled" <?php endif; ?> type="text" maxlength="11" name="data[order][receiver_mobile]" id="receiver_mobile" class="bgWhite" value="<?php echo $this->_tpl_vars['pb_username']; ?>
">
		</p>
		
		<p>
			<span><?php echo $this->_tpl_vars['_email']; ?>
<b class="red-bold">*</b>&nbsp;</span>
			<input value="<?php echo $this->_tpl_vars['pb_userinfo']['receiver_email']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['receiver_email']): ?> disabled="disabled" <?php endif; ?> type="text" name="data[order][receiver_email]" id="receiver_email" class="bgWhite" value="">
		</p>
		
		<p>
		
			<span><?php echo $this->_tpl_vars['_address']; ?>
<b class="red-bold">*</b>&nbsp;</span>
			<input type="text" value="<?php echo $this->_tpl_vars['pb_userinfo']['receiver_address']; ?>
" <?php if ($this->_tpl_vars['pb_userinfo']['receiver_address']): ?> disabled="disabled" <?php endif; ?> maxlength="120" name="data[order][receiver_address]" id="receiver_address" class="bgWhite" />
		</p>
		
		
		
		
		  </div>
              </div>
            </div>
          </div>
          </div>
          </div>
          
            <div class="clearfix"></div>
            <div class="messforSell">
                <span style=""><?php echo $this->_tpl_vars['_message_for_buyer']; ?>
</span>
		<textarea id="message" type="text" name="data[order][message]" value="" style="" class="bgInput"></textarea>
            </div>
            <div class="boxGray clearfix ">
                  <a href="?portal=market&amp;page=shopping_cart" class="btn-small SGray btCheck"><span><?php echo $this->_tpl_vars['_back']; ?>
</span></a> 
                  <span style="float:right;"> 
                          
                        <span><input class="checkout_but" type="submit" value="<?php echo $this->_tpl_vars['_confirm_order']; ?>
" /></span>
                         
                </span>
            </div>
            
		</div>

</div>
				
			</form>
		</div>
		
	</div>	

</div>
<script>
var cache_path = "";
var app_language = '<?php echo $this->_tpl_vars['AppLanguage']; ?>
';
var area_id1 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id1'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var area_id2 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id2'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var area_id3 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id3'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id1 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id1'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id2 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id2'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id3 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id3'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
</script>

<script src="scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="scripts/script_area.js"></script>
<script src="scripts/script_industry.js"></script>




</div>






</div>
  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>