<?php /* Smarty version 2.6.27, created on 2013-05-20 02:08:58
         compiled from default%5Cproduct/import.html */ ?>
<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
    <script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.js?ver=1.8.3'></script>
    
<?php echo '
<script type="application/x-javascript">
    var idd = 22;
    function startImport() {
        //code
	if (idd <= 273)
	{
	    jQuery.ajax({
			url: "index.php?do=product&action=importAjax&id="+idd,
		    }).done(function ( data ) {
			    if( console && console.log ) {
				    idd++;
				    //alert(data);
				    jQuery(\'#result\').append(data+"<br />");
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