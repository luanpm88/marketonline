<?php /* Smarty version 2.6.27, created on 2013-11-25 16:54:05
         compiled from product.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'product.html', 147, false),array('modifier', 'strip_tags', 'product.html', 151, false),array('modifier', 'default', 'product.html', 200, false),array('function', 'the_url', 'product.html', 175, false),)), $this); ?>
<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>
	<?php $this->assign('page_title', ($this->_tpl_vars['_service_management'])); ?>
<?php else: ?>
	<?php $this->assign('page_title', ($this->_tpl_vars['_product_management'])); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem'; ?>
<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>22<?php else: ?>5<?php endif; ?><?php echo '\').addClass(\'mActive\');
	});
</script>
'; ?>


<?php echo '
<script>
    
    function submitForm() {
	if ($(\'#cat_id\').val() != \'0\') {
	    $(\'#TypeFrm\').submit();
	}
    }
    
    
    jQuery(document).ready(function($) {
	$(\'#dataIndustry select\').change(function() {
	    //alert($(this).prev().val());
	    var value = $(this).val();
	    if (value == \'0\') {
		//value = $(this).prev().val();
		if (typeof($(this).prev().val()) != \'undefined\') {
		    value = $(this).prev().val();
		}
	    }
	    
	    $(\'#cat_id\').val(value);
	});
	
	$(\'#sortType\').val(\''; ?>
<?php echo $this->_tpl_vars['sortType']; ?>
<?php echo '\');
	$(\'#sortOrder\').val(\''; ?>
<?php echo $this->_tpl_vars['sortOrder']; ?>
<?php echo '\');
	$(\'#sortType\').change(function() {
	    $(\'#OrderBy\').val($(this).val()+\' \'+$(\'#sortOrder\').val());
	    $(\'#TypeFrm\').submit();
	});
	
	$(\'#sortOrder\').change(function() {
	    $(\'#OrderBy\').val($(\'#sortType\').val()+\' \'+$(this).val());
	    $(\'#TypeFrm\').submit();
	});
    });
</script>
'; ?>



<div class="wrap clearfix">
    <div class="sidebar">
       <div class="sidebar_menu">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </div>
    </div>
     <div class="main_content">
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2>
	<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>
		<?php echo $this->_tpl_vars['_service_management']; ?>

	<?php else: ?>
		<?php echo $this->_tpl_vars['_product_management']; ?>

	<?php endif; ?>
     </h2></div>
     
     
     
	 
	 <div class="h30">
	   
	    <span class="btn_hint"><a href="product.php?do=edit<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>&type=service<?php endif; ?>" class="btn_publish"><?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_release_service']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_release_products']; ?>
<?php endif; ?></a>
	    </span>
	    
	    
	 </div>
		  <form name="typefrm" id="TypeFrm" method="get" action="">
		    <input type="hidden" name="order_by" id="OrderBy" value="<?php echo $this->_tpl_vars['getvar']['order_by']; ?>
" />
		    <?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><input type="hidden" name="type" id="type" value="service" /><?php endif; ?>
		   <table class="product_sort">
            <tr>
              <td>
		
		<label style="float:left; margin-right: 10px;padding-top: 2px"><?php echo $this->_tpl_vars['_category']; ?>
: </label>
		    <div id="dataIndustry" class="searchbox_mleft">
							<select name="level1" id="dataProductIndustryId1" class="level_1" ></select>
							<select name="level2" id="dataProductIndustryId2" class="level_2"></select>
							<select name="level3" id="dataProductIndustryId3" class="level_3" ></select>
							<select name="level4" id="dataProductIndustryId4" class="level_4" ></select>
		    </div>
		    <input class="search_keyword" name="keyword" value="<?php echo $this->_tpl_vars['getvar']['keyword']; ?>
" placeholder="<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_service_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_product_name']; ?>
<?php endif; ?>/<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_service_code']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_product_code']; ?>
<?php endif; ?>" />
		    <input type="button" value="<?php echo $this->_tpl_vars['_search']; ?>
" onclick="submitForm();" /></td>

            </tr>
          </table>
		  </form>

	    <div class="sort_box">
		<label><?php echo $this->_tpl_vars['_sort']; ?>
</label>
		<select name="sort_type" id="sortType">
		    <option value="created"><?php echo $this->_tpl_vars['_sort_created']; ?>
</option>
		    <option value="modified"><?php echo $this->_tpl_vars['_sort_modified']; ?>
</option>		    
		    <option value="name"><?php echo $this->_tpl_vars['_sort_name']; ?>
</option>
		    <option value="price"><?php echo $this->_tpl_vars['_sort_price']; ?>
</option>
		</select>
		<select name="sort_order" id="sortOrder">
		    <option value="DESC"><?php echo $this->_tpl_vars['_desc']; ?>
</option>
		    <option value="ASC"><?php echo $this->_tpl_vars['_asc']; ?>
</option>		    
		</select>
	    </div>
	    
	    <?php if ($_GET['success']): ?><p class="notice" style="margin-bottom: -25px;">Sản phẩm được lưu thành công!</p><?php endif; ?>
	    <div class="next_prev prev_page"><a href="<?php echo $this->_tpl_vars['plink']; ?>
" title="<?php echo $this->_tpl_vars['_prev_page']; ?>
"><?php echo $this->_tpl_vars['_prev_page']; ?>
</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['nlink']; ?>
" title="<?php echo $this->_tpl_vars['_next_page']; ?>
"><?php echo $this->_tpl_vars['_next_page']; ?>
</a></div>
         <table class="bglist">
              <!-- product -->
                    <col width="75">
                    <col width="260">
                    <col width="60">
			<col width="60">
                    <col width="60">
		    <col width="60">
                    <col width="80">
                <tr>
                   <th width="9%"><?php echo $this->_tpl_vars['_sample_image']; ?>
</th>
                   <th style="text-align: left"><?php echo $this->_tpl_vars['_content']; ?>
</th>
		   <th><?php echo $this->_tpl_vars['_spcode']; ?>
</th>
                   <th><?php echo $this->_tpl_vars['_published']; ?>
</th>
		   
		   <th style="text-align: left"><?php echo $this->_tpl_vars['_created_date']; ?>
</th>
                   <th style="text-align: left"><?php echo $this->_tpl_vars['_release']; ?>
</th>		   
                   <th width="15%" style="text-align: left"><?php echo $this->_tpl_vars['_operation']; ?>
</th>
                </tr> 
              <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <tr class="row<?php echo $this->_tpl_vars['item']['row']; ?>
">
                <td><img class="iiimg" style="margin: 3px;" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" width=75></td>
                <td style='word-break: break-all' valign="top">
                    <div style="text-align:left;">
			<strong>
			    <a title="<?php echo $this->_tpl_vars['item']['name']; ?>
" href="product.php?do=edit<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>&type=service<?php endif; ?>&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>

			    </a>
			</strong>
			
			<p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180) : smarty_modifier_truncate($_tmp, 180)); ?>
</p>
			<?php if ($this->_tpl_vars['item']['price']): ?><p style="color: #ec8a49"><?php echo $this->_tpl_vars['item']['price']; ?>
 VNĐ</p><?php endif; ?>
		    </div>
                </td>
		<td><?php echo $this->_tpl_vars['item']['product_code']; ?>
</td>
                <td>
		    <?php if ($this->_tpl_vars['item']['state'] == 1): ?>
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=state&type=down&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_web_down_shelves']; ?>
">
			    <img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/published.png">
			</a>
		    <?php else: ?>
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=state&type=up&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_goods_on_shelves']; ?>
">
			    <img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/unpublished.png">
			</a>
		    <?php endif; ?>
		</td>
		
		<td style="text-align: left"><?php echo $this->_tpl_vars['item']['created']; ?>
</td>
                <td style="text-align: left"><a title="<?php echo $this->_tpl_vars['_as_release_supply_title']; ?>
" href="offer.php?do=pro2offer&productid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_as_release_supply']; ?>
</a>
		    
		    <!--<br /><a href="price.php?do=edit&productid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_prices']; ?>
</a>--></td>
		
                <td style="text-align: left">
			<a href="product.php?do=refresh&id=<?php echo $this->_tpl_vars['item']['id']; ?>
&<?php echo $this->_tpl_vars['current_uri']; ?>
"><?php echo $this->_tpl_vars['_bump_to_top']; ?>
</a><br />
			<a href="product.php?do=edit<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>&type=service<?php endif; ?>&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_modify']; ?>
</a><br /><a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
" target="_blank" title="<?php echo $this->_tpl_vars['_click_preview']; ?>
"><?php echo $this->_tpl_vars['_click_preview']; ?>
</a><br /><a onclick="return confirm('<?php echo $this->_tpl_vars['_delete_confirm']; ?>
')" href="<?php echo $_SERVER['PHP_SELF']; ?>
?act=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></td>
                </tr> 
              <?php endforeach; endif; unset($_from); ?>
        </table> 
         <!-- :~product  -->
        <table class="room_pages">
        <tr>
          <td><?php echo $this->_tpl_vars['pagenav']; ?>
&nbsp;</td>
        </tr>
       </table>
       <table class="trade_line">
            <tr>
          <td height="1" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/index_trade_line.gif"></td>
        </tr>
        <tr>
          <td align="center"></td>
        </tr>
      </table>
    
</div>
</div>

<script>
var cache_path = "../";
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
var industry_id4 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id4'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
</script>



<script src="../scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/script_area.js"></script>
<script src="../scripts/script_industry.js"></script>

<?php echo '
<script>
jQuery(document).ready(function($) {
	setTimeout(function(){
	    
	    $("#dataProductIndustryId1").val("'; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['getvar']['level1'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php echo '");
	    $("#dataProductIndustryId1").trigger("change");
	    
	    setTimeout(function(){
		$("#dataProductIndustryId2").val("'; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['getvar']['level2'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php echo '");
		$("#dataProductIndustryId2").trigger("change");
		
		setTimeout(function(){
		    $("#dataProductIndustryId3").val("'; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['getvar']['level3'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php echo '");
		    $("#dataProductIndustryId3").trigger("change");
		    
		    setTimeout(function(){
			$("#dataProductIndustryId4").val("'; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['getvar']['level4'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php echo '");
			$("#dataProductIndustryId4").trigger("change");
		    }, 200);
		    
		}, 200);
		
	    }, 200);
		   
	}, 200);
})
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>