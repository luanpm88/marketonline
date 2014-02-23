<?php /* Smarty version 2.6.27, created on 2013-05-21 05:12:12
         compiled from default%5Cproduct/importProduct.html */ ?>
<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
    <script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.js?ver=1.8.3'></script>
    
<?php echo '
<script type="application/x-javascript">
    var idd = 3001;
    function startImport() {
        //code
	if (idd <= 3787)
	{
	    jQuery.ajax({
			url: "index.php?do=offer&action=importProductAjax&id="+idd,
		    }).done(function ( data ) {
			    if( console && console.log ) {
				    
				    //alert(data);
				    jQuery(\'#result\').append(idd+". "+data+"<br />");
				    
				    idd++;
				    startImport();
			    }
		    });
	}
    }
</script>
'; ?>


</head>

<body>

<input type="button" id="import" value="Import" onclick="startImport();" />

<div id="result"></div>

</body>
</html>