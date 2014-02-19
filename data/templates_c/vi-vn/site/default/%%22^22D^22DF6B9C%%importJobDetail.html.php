<?php /* Smarty version 2.6.27, created on 2013-12-24 14:17:56
         compiled from default%5Cjob/importJobDetail.html */ ?>
<html>
    <head>
        <script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.js?ver=1.8.3'></script>
        
        <?php echo '	
        <script type="application/x-javascript">
            
            function loadItem(id)
            {
                jQuery.ajax({
			url: "index.php?do=job&action=ajaxImportJobDetail&id="+id,
		}).done(function ( data ) {
			if( console && console.log ) {
			    jQuery(\'.result\').append(id+". "+data);
                            id++;
                            if(id < 489) setTimeout("loadItem("+id+")", 100);
			}
		});
            }
            
            var id = 27;
            jQuery(document).ready(function(){
                loadItem(id);
            });
            
        </script>
        '; ?>

    </head>
    <body>
        <div class="result"></div>
    </body>
</html>