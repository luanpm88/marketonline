<?php /* Smarty version 2.6.27, created on 2013-05-13 02:10:32
         compiled from product.edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'product.edit.html', 115, false),array('function', 'editor', 'product.edit.html', 125, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$(\'a[rel*=lightbox]\').colorbox() 
})
</script>
'; ?>

<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_product_center']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_product_center']; ?>
</h3>
    <ul class="subnav">
		<li><a href="product.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a class="btn1"><span><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</span></a></li>
		<li><a href="productsort.php"><?php echo $this->_tpl_vars['_category']; ?>
</a></li>
		<li><a href="productcategory.php"><?php echo $this->_tpl_vars['_product']; ?>
<?php echo $this->_tpl_vars['_sorts']; ?>
</a></a></li>
		<li><a href="brand.php"><?php echo $this->_tpl_vars['_brands']; ?>
</a></a></li>
		<li><a href="brandtype.php"><?php echo $this->_tpl_vars['_brands']; ?>
<?php echo $this->_tpl_vars['_sorts']; ?>
</a></a></li>
		<li><a href="price.php"><?php echo $this->_tpl_vars['_prices']; ?>
</a></a></li>
    </ul>
</div>
<div class="info">
  <form method="post" id="EditFrm" name="edit_frm" enctype="multipart/form-data" >
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />
  <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>
" />
  <input type="hidden" name="company_name" value="<?php echo $this->_tpl_vars['item']['companyname']; ?>
" />
  <input type="hidden" name="username" value="<?php echo $this->_tpl_vars['item']['username']; ?>
" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_member_name']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">          
		<input class="infoTableInput2" name="data[username]" value="<?php echo $this->_tpl_vars['item']['username']; ?>
" /><label class="field_notice"><?php echo $this->_tpl_vars['_member_name']; ?>
</label>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_company_name']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[company_name]" id="dataCompanyName" value="<?php echo $this->_tpl_vars['item']['companyname']; ?>
" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_product']; ?>
<?php echo $this->_tpl_vars['_naming_n']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[product][name]" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" /><label class="field_notice"><?php echo $this->_tpl_vars['_the_title']; ?>
</label></td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_labels']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[tag]" type="text" id="Tag" value="<?php echo $this->_tpl_vars['item']['tag']; ?>
" /><label class="field_notice"><?php echo $this->_tpl_vars['_multi_seperate_by_quot']; ?>
</label>        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_in_industry']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
        <span id="dataIndustry">
					<select name="industry[id][1]" id="dataProductIndustryId1" class="level_1" style="width:120px;" ></select>
					<select name="industry[id][2]" id="dataProductIndustryId2" class="level_2" style="width:120px;"></select>
					<select name="industry[id][3]" id="dataProductIndustryId3" class="level_3" style="width:120px;"></select>
		</span>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_in_area']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
			<span id="dataArea">
						<select name="area[id][1]" id="dataProductAreaId1" class="level_1" style="width:120px;" ></select>
						<select name="area[id][2]" id="dataProductAreaId2" class="level_2" style="width:120px;"></select>
						<select name="area[id][3]" id="dataProductAreaId3" class="level_3" style="width:120px;"></select>
			</span>        
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_detailed_contents']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><textarea style="width:650px;height:300px;" name="data[product][content]" id="dataProductContent"><?php echo $this->_tpl_vars['item']['content']; ?>
</textarea>
		</td>

      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_seo_title']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[meta][title]" type="text" id="seo_title" value="<?php echo $this->_tpl_vars['item']['seo_title']; ?>
" />        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_seo_keyword']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[meta][keyword]" type="text" id="seo_kewyord" value="<?php echo $this->_tpl_vars['item']['seo_keyword']; ?>
" />        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_seo_description']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input name="data[meta][description]" type="text" id="seo_description" value="<?php echo $this->_tpl_vars['item']['seo_description']; ?>
" />        </td>
      </tr>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_picture']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
        <input class="infoTableFile2" type="file" name="pic" id="pic" />
          <label class="field_notice"><?php echo $this->_tpl_vars['_image_format_support']; ?>
</label>
          <?php if ($this->_tpl_vars['item']['picture']): ?>
          <br /><span><img src="<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
"/></span>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" name="save" value="<?php echo $this->_tpl_vars['_save_and_pub']; ?>
" />
			<input class="formbtn" type="submit" name="pass" value="<?php echo $this->_tpl_vars['_check_passed']; ?>
" />
			<input class="formbtn" type="submit" name="forbid" value="<?php echo $this->_tpl_vars['_check_invalid']; ?>
" />
			<input class="formbtn" type="submit" name="del" value="<?php echo $this->_tpl_vars['_delete']; ?>
" />
		</td>

      </tr>
    </table>
  </form>
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
</script>
<script src="../scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/script_area.js"></script>
<script src="../scripts/script_industry.js"></script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>