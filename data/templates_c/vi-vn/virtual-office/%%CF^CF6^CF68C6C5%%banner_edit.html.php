<?php /* Smarty version 2.6.27, created on 2014-04-28 08:33:46
         compiled from banner_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'banner_edit.html', 10, false),array('function', 'the_url', 'banner_edit.html', 174, false),array('modifier', 'default', 'banner_edit.html', 239, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_ad_pic'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script>
var allows_maximum_input = "<?php echo $this->_tpl_vars['_allows_maximum_input']; ?>
";
var can_also_enter = "<?php echo $this->_tpl_vars['_can_also_enter']; ?>
";
</script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem30\').addClass(\'mActive\');
	});
</script>
'; ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem12\').addClass(\'mActive\');

		$("#Frm1").validate({
                    submitHandler: function(form) {
                        
                        var okk = true;
                        if ($(\'#dataProductIndustryId1\').val() == 0) {
                                okk = false;
                        }
                        //alert(!$(\'input[name="ad[source_url]"]\').val() && !$(\'input[name="attach"]\').val());
                        if (!$(\'input[name="ad[source_url]"]\').val() && !$(\'input[name="attach"]\').val()) {
                            okk = false;
                        }
                           
                        if (okk) {
                                $(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
                                document.GetDocumentByID(\'#save\').click();
                        }
			
                    }

                })
                
                $(\'#save\').click(function (){
                        if ($(\'#dataProductIndustryId1\').val() == 0)
                        {
                                $("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
                                setTimeout(function(){
                                        $(\'#dataIndustry select\').removeClass(\'error\');
                                        $(\'#dataProductIndustryId1\').addClass(\'error\');			
                                        $(\'#dataIndustry\').append(\'<label for="dataIndustryName" generated="true" class="error">Chọn chuyên mục</label>\');
                                }, 200);			
                        }
                        
                        if (!$(\'input[name="ad[source_url]"]\').val() && !$(\'input[name="attach"]\').val()) {
                            $("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
                                setTimeout(function(){
                                        $(\'.ad_image\').append(\'<label for="dataIndustryName" generated="true" class="error">Chọn hình ảnh Quảng cáo</label>\');
                                }, 200);
                        }
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
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 3): ?><?php echo $this->_tpl_vars['_ad_pic']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 1): ?><?php echo $this->_tpl_vars['_ad_pic']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?><?php echo $this->_tpl_vars['_ad_pic']; ?>
<?php endif; ?>
     </h2></div>
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>

     
     
     <div id="product_edit_box">
     
     
	  <form id="Frm1" method="post" action="banner.php" enctype="multipart/form-data" id="EditFrm" name="edit_frm">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />  
    <table class="infoTable offer_info_content">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_ad_title']; ?>
:<font class="red">*</font></th>
        <td class="paddingT15 wordSpacing5">          
		<input class="infoTableInput2 required" name="ad[title]" value="<?php echo $this->_tpl_vars['item']['title']; ?>
" />                
        </td>
      </tr>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_industry_product']; ?>
:<font class="red">*</font></th>
			<td colspan="2">

				<div id="dataIndustry" class="ad_industry">
								<select name="industry[id][1]" id="dataProductIndustryId1" class="level_1 required" ></select>
								<select name="industry[id][2]" id="dataProductIndustryId2" class="level_2"></select>
								<select name="industry[id][3]" id="dataProductIndustryId3" class="level_3" ></select>
								<select name="industry[id][4]" id="dataProductIndustryId4" class="level_4" ></select>
				</div>

			</td>
		</tr>
      <tr>
        <th class="paddingT15" valign="top">Mô tả nội dung quảng cáo</th>
        <td class="paddingT15 wordSpacing5">
            <textarea style="width:100%;height:400px;" name="ad[description]" id="dataTradeContent"><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea></td>
      </tr>
      <tr style="display: none">
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_adzone']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
		<select name="ad[adzone_id]" id="ad_adzone_id">
		<?php $_from = $this->_tpl_vars['Adzones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sel_adzone'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sel_adzone']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['z']):
        $this->_foreach['sel_adzone']['iteration']++;
?>
		<option value="<?php echo $this->_tpl_vars['z']['id']; ?>
" <?php if ($this->_tpl_vars['z']['id'] == $this->_tpl_vars['item']['adzone_id'] || $this->_tpl_vars['z']['id'] == $_GET['adzone_id']): ?>selected<?php endif; ?>>
		<?php echo $this->_tpl_vars['z']['name']; ?>

		<?php endforeach; else: ?>
		<option value="0"><?php echo $this->_tpl_vars['_full_please']; ?>
<?php echo $this->_tpl_vars['_adzone']; ?>

		<?php endif; unset($_from); ?>
		</select><label class="field_notice"><?php echo $this->_tpl_vars['_adzone_note']; ?>
</label></td>
      </tr>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_ad_image']; ?>
:</th>
        <td class="paddingT15 wordSpacing5 ad_image"><label for="Sourcetype1">
        <input type="radio" name="m_sourcetype" id="Sourcetype1" value="1"/> <?php echo $this->_tpl_vars['_local_upload']; ?>
</label><label for="Sourcetype2"><input type="radio" name="m_sourcetype" id="Sourcetype2" value="2"/> <?php echo $this->_tpl_vars['_link_address']; ?>
</label>
          </td>
      </tr>
      <tbody id="divSourceType2" style="display:none">
      <tr>
        <th class="paddingT15"></th>
        <td class="paddingT15 wordSpacing5">
            <input placeholder="Dán đường dẫn tới hình ảnh Quảng tại đây" type="text" name="ad[source_url]" value="<?php echo $this->_tpl_vars['item']['source_url']; ?>
">
        </td>
      </tr>
      </tbody>
      <tbody id="divSourceType1">
      <tr>
        <th class="paddingT15"></th>
        <td class="paddingT15 wordSpacing5">          
		<input class="infoTableInput2" type="file" name="attach" /></td>
      </tr>
      </tbody>
      
      <tr style="display:none">
        <th class="paddingT15"><?php echo $this->_tpl_vars['_date_start']; ?>
</th>
        <td class="paddingT15 wordSpacing5"> 
		<input name="data[start_date]" value="<?php echo $this->_tpl_vars['item']['start_date']; ?>
" type="text" id="date2" /><span class="btn_calendar" id="calendar-date2"></span><label class="field_notice"><?php echo $this->_tpl_vars['_empty_that_never_expires']; ?>
</label></td>
      </tr>
      <tr style="display:none">
        <th class="paddingT15"><?php echo $this->_tpl_vars['_effective_period']; ?>
 <?php echo $this->_tpl_vars['_arrive_to']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"> 
		<input name="data[end_date]" value="<?php echo $this->_tpl_vars['item']['end_date']; ?>
" type="text" id="date1" />
                <span class="btn_calendar" id="calendar-date1"></span>
                <label class="field_notice"><?php echo $this->_tpl_vars['_empty_that_never_expires']; ?>
</label></td>
      </tr>
      <?php if ($this->_tpl_vars['item']['source_url']): ?>
      <tr>
        <th></th>
        <td>
            <img width="200px" style="padding-bottom: 7px;" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" />
        </td>
      </tr>
      <?php endif; ?>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_point_to_url']; ?>
</th>
        <td class="paddingT15 wordSpacing5">          
		<!--<input placeholder="Nhập đường dẫn đến website/shop/gian hàng/sản phẩm/... mà bạn muốn quảng cáo" class="infoTableInput2 required" name="ad[target_url]" value="<?php echo $this->_tpl_vars['item']['target_url']; ?>
" />-->
		<a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
"><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
</a>
	</td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" id="save" type="submit" name="save" value="<?php echo $this->_tpl_vars['_save_and_pub']; ?>
" />		</td>
      </tr>
    </table>
  </form>

	  
     </div>
	  
	  
	  
	</div>
  </div>


<script>
var ad_url = "<?php echo $this->_tpl_vars['item']['source_url']; ?>
";
</script>
<?php echo '
<script>
//Calendar.setup({
//	trigger    : "calendar-date1",
//	animation  : false,
//	inputField : "date1",
//	onSelect   : function() { this.hide() }
//});
//Calendar.setup({
//	trigger    : "calendar-date2",
//	animation  : false,
//	inputField : "date2",
//	onSelect   : function() { this.hide() }
//});
jQuery(document).ready(function($) {
	/* Using Name for selector */
	$("#Sourcetype1").click(function() 
	  {  
		// hides matched elements if shown, shows if hidden 
		$("#divSourceType1").show(); 
		$("#divSourceType2").hide(); 
	});
	$("#Sourcetype2").click(function() 
	  {  
		// hides matched elements if shown, shows if hidden 
		$("#divSourceType2").show(); 
		$("#divSourceType1").hide(); 
	});
        //alert(ad_url);
	if(ad_url!=""){
		$("input[value=\'2\']").trigger("click")
	}else{
            $("input[value=\'1\']").trigger("click")
        }
})
</script>
'; ?>



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
<?php echo '
<script>
jQuery(document).ready(function($) {
	$("#ProductpriceCategory").val("{$item.category_id|default:0}")
})
</script>
'; ?>

<script src="../scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/script_area.js"></script>
<script src="../scripts/script_industry.js"></script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

