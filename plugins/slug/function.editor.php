<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2214 $
 */
function smarty_function_editor($params){
	$output = null;
	if(!isset($params['path'])){
		$base_path = "../";
	}else{
		$base_path = $params['path'];
	}
	switch ($params['type']){
		case "ckeditor":
			$output.="<script type=\"text/javascript\" src=\"{$base_path}scripts/ckeditor/ckeditor.js\"></script>\n";
			if (isset($params['toolbar'])) {
				$toolbar = $params['toolbar'];
			}else{
				$toolbar = "Basic";
			}
			if(isset($params['element'])) {
				$output.="<script type=\"text/javascript\">
CKEDITOR.replace(\"".$params['element']."\", 
{
	toolbar : \"{$toolbar}\",
	skin: \"kama\", width:600, height:150
});
</script>
";
			}
			break;
		case "auto":
			break;
		case "kindeditor":
			$output = '<script charset="utf-8" src="../scripts/kindeditor/kindeditor.js" type="text/javascript"></script>';
			$output.='<script>
			KE.show({                
			id : "AdminnoteContent",
			cssPath : "./index.css",  
			newlineTag : "br",
			resizeMode : 1  
			});
			</script>';		
			break;
		case "tiny_mce":
			if (!isset($params['mode']) || empty($params['mode'])) {
				$mode = "mode : \"textareas\",";
			}else{
				$mode = "mode : \"specific_textareas\",
editor_selector : \"mceEditor\",
";
			}
			if (isset($params['theme'])) {
				$theme = trim($params['theme']);
			}else{
				$theme = "advanced";
			}
			if (isset($params['language'])) {
				$language = trim($params['language']);
			}else{
				if(preg_match("/(zh-cn)/is", $_SERVER["HTTP_ACCEPT_LANGUAGE"])){
					$language = "cn";
				}else{
					$language = "en";
				}
			}
			$output.="<script type=\"text/javascript\" src=\"{$base_path}scripts/tiny_mce/tiny_mce.js\"></script>\n";
			$output.="<script>
tinyMCE.init({
{$mode}
theme : \"{$theme}\",
skin : \"o2k7\",
editor_encoding: \"raw\",
dialog_type : \"modal\", 
skin_variant : \"silver\",
relative_urls: false,
remove_script_host: false,
plugins : \"advimage,autolink,media,emotions,pagebreak,print,table\",
theme_advanced_toolbar_location : \"top\",
theme_advanced_toolbar_align : \"left\",
font_size_style_values : \"xx-small,x-small,small,medium,large,x-large,xx-large\",
theme_advanced_buttons1 : \"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect, | |,forecolor,backcolor, \",
theme_advanced_buttons2 : \"table,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code\",
theme_advanced_buttons3 : \"hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,visualchars,nonbreaking,template,pagebreak\",
language : \"{$language}\"
});
</script>
";
			break;
		case "tiny_mce_new":
			$output .= "<script type=\"text/javascript\" src=\"{$base_path}templates/default/js/tinymce/tinymce.min.js\"></script>\n";
			$output .= '
			
			
			<script>
			
				tinymce.init({
				selector: "textarea",
				plugins: [
					"autoresize advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"table directionality emoticons template textcolor paste textcolor"
				],
				language : "vi_VN",
				    skin : "xenmce",
				toolbar1: "preview code bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect | forecolor backcolor",
				toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media | preview",
				toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons",
				    relative_urls: false,
				    remove_script_host: false,
				menubar: false,
				toolbar_items_size: "small",
			
				style_formats: [
					{title: "Bold text", inline: "b"},
					{title: "Red text", inline: "span", styles: {color: "#ff0000"}},
					{title: "Red header", block: "h1", styles: {color: "#ff0000"}},
					{title: "Example 1", inline: "span", classes: "example1"},
					{title: "Example 2", inline: "span", classes: "example2"},
					{title: "Table styles"},
					{title: "Table row 1", selector: "tr", classes: "tablerow1"}
				],
			
				templates: [
					{title: "Test template 1", content: "Test 1"},
					{title: "Test template 2", content: "Test 2"}
				],
				
				entity_encoding : "raw",
				autoresize_bottom_margin : 1,
				content_css : "{$base_path}templates/default/css/editorcontent.css"
		
			});
			
			</script>
			
			
			
			
			';
			//$output .= "<script>showEditor('textarea');</script>";
			break;
		default:
			if (!isset($params['mode']) || empty($params['mode'])) {
				$mode = "mode : \"textareas\",";
			}else{
				$mode = "mode : \"specific_textareas\",
editor_selector : \"mceEditor\",
";
			}
			$output.="<script type=\"text/javascript\" src=\"{$base_path}scripts/tiny_mce/tiny_mce.js\"></script>\n";
			$output.="<script>
tinyMCE.init({
{$mode}
theme : \"simple\",
theme_advanced_toolbar_location : \"top\",
theme_advanced_toolbar_align : \"left\"
});
</script>
";
			break;
	}
	echo $output;
}
?>