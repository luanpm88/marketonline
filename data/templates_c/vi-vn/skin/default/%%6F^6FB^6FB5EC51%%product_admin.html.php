<?php /* Smarty version 2.6.27, created on 2014-03-04 14:37:37
         compiled from product_admin.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_product']),'cur' => 'space_index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="body-wrapper" class="space_wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->




<?php echo '
<script type="application/x-javascript">
  
	  function ajaxLoadMenu(id, level, item) {
	    //code
	    if(item) item.parent().parent().find("li").removeClass(\'active\');
	    if(item) item.parent().addClass(\'active\');
	    $.ajax({
			url: "index.php?do=product&action=ajaxLoadMenuConnectNoCache&member_id='; ?>
<?php echo $this->_tpl_vars['userID']; ?>
<?php echo '&industryid="+id,			
		}).done(function ( data ) {
			if( console && console.log ) {
			  
				$(\'.product_list_title\').html($(data).filter(\'#mapp\').html());
				
				//$(\'.product_list_title a\').unbind(\'click\');
				
								
				$(\'.product_list_title a\').eq(0).click(function() {
				      ajaxLoadMenu($(this).attr("rel"), \'2\', $(this));
				    });
				    $(\'.product_list_title a\').eq(1).click(function() {
					  ajaxLoadMenu($(this).attr("rel"), \'3\', $(this));
				    });
				    $(\'.product_list_title a\').eq(2).click(function() {
					  ajaxLoadMenu($(this).attr("rel"), \'4\', $(this));
				    });
				    
				$(\'.product_list_title a\').click(function() {

						  industryid = $(this).attr(\'rel\');
						  
						  if (industryid) {
						      var ff = "&orderby="+orderby;
						      if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
						      if(service != 0) ff += "&type=service";
						      if(industryid != 0) ff += "&industryid="+industryid;
						      
						      ajaxListProduct(ff);
						  }
						 
				});

				
				//alert(data);
				if(typeof($(data).filter(\'ul\').html()) != \'undefined\')
				{
				    
				    
				    
				    
				  if (level == \'2\') {
				    $(\'.s-scroll\').animate({ marginLeft: \'-260px\' }, 500);
				  }
				  else if (level == \'3\') {				    
				    $(\'.s-scroll\').animate({ marginLeft: \'-520px\' }, 500);
				  }
				  else if (level == \'4\') {
				    $(\'.s-scroll\').animate({ marginLeft: \'-780px\' }, 500);
				  }
				    
				    
				    $(\'.box-level\'+level).html(data);
				    $(\'.box-level\'+level).mCustomScrollbar({
					    autoHideScrollbar:true,
					    theme:"light-thin"
				    });
				    
				    
				    $(\'.box-level2 ul li a.mback\').click(function() {
				      $(\'.s-scroll\').animate({ marginLeft: \'0px\' }, 500);
				    });
				    
				    $(\'.box-level3 ul li a.mback\').click(function() {
				      $(\'.s-scroll\').animate({ marginLeft: \'-260px\' }, 500);
				    });
				    
				    $(\'.box-level4 ul li a.mback\').click(function() {
				      $(\'.s-scroll\').animate({ marginLeft: \'-520px\' }, 500);
				    });
				    				    
				    $(\'.box-level\'+level+\' ul li a.item\').click(function() {
				      ajaxLoadMenu($(this).attr("rel"), \'3\', $(this));				      
				    });
				    
				    
				    $(\'.box-level\'+level+\' ul.menu li a.item\').click(function() {

						  industryid = $(this).attr(\'rel\');
						  
						  if (industryid) {
						      var ff = "&orderby="+orderby;
						      if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
						      if(service != 0) ff += "&type=service";
						      if(industryid != 0) ff += "&industryid="+industryid;
						      
						      ajaxListProduct(ff);
						  }
						 
				    });
				}				
			}
		});
	  }
   
	 function getMinHeight() {
	    //code
	    var min =  $(\'#list_product_ajax0\').height();
	    var it = 0;
	    for (var j=1; j < 4; j++) {
	       if ($(\'#list_product_ajax\'+j).height() < min) {
		  min = $(\'#list_product_ajax\'+j).height();
		  it = j;
	       }				    
	    }
	    return it;
	 }
	 
	function ajaxListProduct(filter) {
	      if ($(window).scrollTop() > 385) $("html, body").animate({ scrollTop: 385 }, "slow");
	  
	      $(\'.product_list_loading\').height($(\'.product_listing\').height());
		$(\'.product_list_loading\').css("display", "block");
		$.ajax({
			url: "index.php?do=product&action=listSpaceAjax&connectid='; ?>
<?php echo $this->_tpl_vars['comid']; ?>
<?php echo '"+filter,
			beforeSend: function ( xhr ) {
				//xhr.overrideMimeType("text/plain; charset=x-user-defined");
				$(\'#list_product_ajax\').html(\'<div class="loading">\'+$(\'#loading\').html()+\'</div>\');
			}
		}).done(function ( data ) {
			if( console && console.log ) {

				
				$(\'#box_load_list\').html(data);
				
				pos_pg = 15;
				$(\'.product_list_loading\').css("display", "none");
				
				
				
				if(!scroll) scroll = true;
			}
		});
	}
	
	 function resetFilter(args) {
	    $(\'#ProductName\').val("");
	    $(\'#dataProductIndustryId1\').val(0);
	    $(\'#dataProductIndustryId2\').val(0);
	    $(\'#dataProductIndustryId3\').val(0);
	    $(\'#dataProductIndustryId4\').val(0);
	    service = 0;
	 //    <div id="dataIndustry">
	 //    <select class="level_3" id="dataProductIndustryId3" name="industry[id][3]"><option value="0">Chọn</option></select>	    
	 //    <select class="level_2" id="dataProductIndustryId2" name="industry[id][2]"><option value="0">Chọn</option></select>
	 //    <select class="level_1" id="dataProductIndustryId1" name="industry[id][1]" selectedindex="0"><option value="0">Chọn</option><option value="1">Thời trang</option><option value="2">Hàng tiêu dùng</option><option value="206">Mẹ và bé</option><option value="3">Thiết bị</option><option value="4">Vật liệu</option><option value="207">Bảo hiểm</option><option value="205">[:en-us]Virtual[:zh-cn]虚拟</option><option value="5">Khác</option></select>
	 }
	
	function ajaxListProductScrollx(filter) {
	  
		
	  
		$.ajax({
			url: "index.php?do=product&action=listSpaceAjax&connectid='; ?>
<?php echo $this->_tpl_vars['pb_userid']; ?>
<?php echo '"+filter,
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 100));
				//alert(data);
				//$(\'#list_product_ajax\').append(data);
				for (var i=0; i < 15; i++) {
				    var pos = i%5;
				    $(\'#list_product_ajax\'+getMinHeight()+\' ul\').append($(data).filter(".products_"+i).html());
				    //alert(getMinHeight());
				}
				startscroll = true;
				pos_pg += 15;
				
			}
		});
	}
	
	var industryid = 0;
	var service = 0;
	var orderby = \'dateline\';
	var scroll = false;
	$(document).ready(function() {
	       
	if ($(\'#aq-block-5\').height())
	    pos_searchlist = $(\'#aq-block-5\').height() + 440;
	else
	    pos_searchlist = 480;
	       
	 
	//       $(".hotnewlist").removeClass("active");
	//       $(\'#hot_product_but\').addClass("active");
	//       
	//       //ajaxListProduct("&orderby="+orderby);
	//       //Init level 3
	//       $(".hotnewlist").removeClass("active");
	//       $(\'#hot_product_but\').addClass("active");
	//       industryid = '; ?>
<?php echo $this->_tpl_vars['TypeID']; ?>
<?php echo ';
	//       
	//      var ff = "&orderby="+orderby;
	//      if(industryid != 0) ff += "&industryid="+industryid;
	//      if('; ?>
<?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo ') ajaxLoadMenu('; ?>
<?php echo $this->_tpl_vars['TypeID']; ?>
, <?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo ', null)
	//      //alert('; ?>
<?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo ');
	//	    
	//	    $(\'.s-scroll\').animate({ marginLeft: \'-\'+(('; ?>
<?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo '-1)*240)+\'px\' }, 500);
	//	    
	//      $(\'.box-level3 ul li a.mback\').click(function() {
	//	    //$(\'.s-scroll\').animate({ marginLeft: \'-240px\' }, 500);
	//      });
	//      ajaxListProduct(ff);
	      
	      
	      
	      //Init level 4
	       $(".hotnewlist").removeClass("active");
	       $(\'#new_product_but\').addClass("active");
	       industryid = '; ?>
<?php echo $this->_tpl_vars['TypeID']; ?>
<?php echo ';
	       
	      var ff = "&orderby="+orderby;
	      if(service != 0) ff += "&type=service";
	      if(industryid != 0) ff += "&industryid="+industryid;
	      //alert('; ?>
<?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo ');
	        ajaxLoadMenu('; ?>
<?php echo $this->_tpl_vars['TypeID']; ?>
<?php echo ', '; ?>
<?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo '+1, null);
	      //$(\'.s-scroll\').animate({ marginLeft: \'-\'+('; ?>
<?php echo $this->_tpl_vars['isLevel']; ?>
<?php echo '*260)+\'px\' }, 200);
	//      $(\'.box-level3 ul li a.mback\').click(function() {
	//	$(\'.s-scroll\').animate({ marginLeft: \'-240px\' }, 200);
	//      });
	
	      ajaxListProduct(ff);
	      
	      
	      
	      
		$(\'#hot_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'favourite\';
			if(industryid != 0) orderby += "&industryid="+industryid;
			
			ajaxListProduct("&orderby="+orderby);
		});
		
		$(\'#new_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			if(industryid != 0) orderby += "&industryid="+industryid;
			
			ajaxListProduct("&orderby="+orderby);
		});
		
		$(\'#new_service_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			service = 1;
			if(service != 0) orderby += "&type=service";
			if(industryid != 0) orderby += "&industryid="+industryid;
			ajaxListProduct("&type=service&orderby="+orderby);
		});
		
		$(\'#recentbuy_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			
			ajaxListProduct("");
		});
		
		$(\'#search_list_but\').click(function() {
			
			//get industry select
			//if ($(\'#dataProductIndustryId3\').val() != "0") {
			//	//code
			//	industryid = $(\'#dataProductIndustryId3\').val();
			//	//alert("dsds");
			//} else if ($(\'#dataProductIndustryId2\').val() != "0") {
			////code
			//	industryid = $(\'#dataProductIndustryId2\').val();
			//} else
			//{
			//	industryid = $(\'#dataProductIndustryId1\').val();
			//}
			//
			//alert(industryid);
			var ff = "&orderby="+orderby;
			if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
			if(service != 0) ff += "&type=service";
			if(industryid != 0) ff += "&industryid="+industryid;
			
			ajaxListProduct(ff);
		});
		
		$(\'.box-scroll ul.menu li a.item\').click(function() {
		  
		  
			
			industryid = $(this).attr(\'rel\');
			
			if (industryid) {
			  
			    
			    var ff = "&orderby="+orderby;
			    if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
			    if(service != 0) ff += "&type=service";
			    if(industryid != 0) ff += "&industryid="+industryid;
			    
			    ajaxListProduct(ff);
			}
			
			
		});
		
		$(\'a.all_p\').click(function() {
		    industryid = 0;
		    
		     $(\'.box-scroll ul li\').removeClass(\'active\');
			
		    $(\'span.product_list_title\').html("");
		    
		    var ff = "&orderby="+orderby;
		    if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
		    if(service != 0) ff += "&type=service";
		    if(industryid != 0) ff += "&industryid="+industryid;
		    
		    ajaxListProduct(ff);
		    $(\'.s-scroll\').animate({ marginLeft: \'0px\' }, 500);
		});
		
		$(\'.box-level1 ul li a.item\').click(function() {		
		  ajaxLoadMenu($(this).attr("rel"), \'2\', $(this));	 
		  
		});
		
		$(".box-level1").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"light-thin"
				});
	       $(".box-level2").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"light-thin"
				});
	       $(".box-level3").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"light-thin"
				});
	       $(".box-level4").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"light-thin"
				});
		
	});
	
	
	var startscroll = true;
	var pos_pg = 15;

	//$(document).scroll(function(){		
	//	if(($(document).height()-$(window).height()-$(document).scrollTop()) < 1000){
	//		if (startscroll && scroll) {
	//			startscroll = false;
	//			//code
	//			console.log(\'Scrolled to bottom\');
	//			//ArticleList.loadMoreArticles();
	//			//alert("end");
	//			
	//			var ff = "&pos_pg="+pos_pg+"&orderby="+orderby;
	//			if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
	//			if(industryid != 0) ff += "&industryid="+industryid;
	//			ajaxListProductScroll(ff);		
	//		}
	//	
	//	} else {
	//	    //console.log(\'Scroll \'+$(document).height()+\' - \'+$(window).height()+\' - \' +$(document).scrollTop());
	//	}
	//});	
	
</script>
   

'; ?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>








              
<div class="row space_product" style="height: 40px;">
  
        
                <div id="SearchList" class="connect_searchx" style="position: absolute; top: 480px">
	    <div  class="follow-scrollz">
      
        <input id="search_list_but" type="submit" value="<?php echo $this->_tpl_vars['_search']; ?>
" />

        <div id="dataIndustry" style="display: none">
	    <select name="industry[id][4]" id="dataProductIndustryId1" class="level_4" ></select>
	    <select name="industry[id][3]" id="dataProductIndustryId3" class="level_3" ></select>	    
	    <select name="industry[id][2]" id="dataProductIndustryId2" class="level_2"></select>
	    <select name="industry[id][1]" id="dataProductIndustryId1" class="level_1" ></select>
	</div>
	
        <!--<label><?php echo $this->_tpl_vars['_industry']; ?>
&nbsp;&nbsp;</label>-->
        <input type="text" id="ProductName" name="q" placeholder="<?php echo $this->_tpl_vars['_search_keyword']; ?>
" />
	
	<h5><a href="javascript:void(0)" class="all_p"><span class="cat_title"><?php echo $this->_tpl_vars['_product_category']; ?>
</span></a><span class="product_list_title"></span></h5>
	
	<section style="background: none; width: 230px" class="widget-1 widget-first widget widget_nav_menu widget_recent_products nav-products-menu connect_menu" id="nav_menu-2">
	  <div class="widget-inner">
	   
	    
	    
	    <ul class="menu" id="menu-features-list" style="display: none">
	      
	      <?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
		  <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954" id="menu-item-954">
		    <a class="menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
		      <?php echo $this->_tpl_vars['item0']['name']; ?>

		    </a>
		    <?php if ($this->_tpl_vars['item0']['sub']): ?>
		      <ul>
			<?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
			  <li><a class="menu_lvl2" rel="<?php echo $this->_tpl_vars['level1']['id']; ?>
" content="<a rel='<?php echo $this->_tpl_vars['item0']['id']; ?>
' content='<?php echo $this->_tpl_vars['item0']['name']; ?>
' href='javascript:void(0)'><?php echo $this->_tpl_vars['item0']['name']; ?>
</a> / <?php echo $this->_tpl_vars['level1']['name']; ?>
" href="javascript:void(0)"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>
			    <?php if ($this->_tpl_vars['level1']['sub']): ?>
			      <ul>
				<?php $_from = $this->_tpl_vars['level1']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_2_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_2_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level2'] => $this->_tpl_vars['level2']):
        $this->_foreach['level_2_industry']['iteration']++;
?>
				  <li><a class="menu_lvl3" rel="<?php echo $this->_tpl_vars['level2']['id']; ?>
" content="<a rel='<?php echo $this->_tpl_vars['item0']['id']; ?>
' href='javascript:void(0)' content='<?php echo $this->_tpl_vars['item0']['name']; ?>
'><?php echo $this->_tpl_vars['item0']['name']; ?>
</a> / <a rel='<?php echo $this->_tpl_vars['level1']['id']; ?>
' content='<a rel=&quot;<?php echo $this->_tpl_vars['item0']['id']; ?>
&quot; href=&quot;javascript:void(0)&quot; content=&quot;<?php echo $this->_tpl_vars['item0']['name']; ?>
&quot;><?php echo $this->_tpl_vars['item0']['name']; ?>
</a> / <?php echo $this->_tpl_vars['level1']['name']; ?>
' href='javascript:void(0)'><?php echo $this->_tpl_vars['level1']['name']; ?>
</a> / <?php echo $this->_tpl_vars['level2']['name']; ?>
" href="javascript:void(0)"><?php echo $this->_tpl_vars['level2']['name']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['level1']['sub']): ?><li><a class="mback bmenu_lvl3" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li><?php endif; ?>
			      </ul>
			    <?php endif; ?>
			  </li>
			<?php endforeach; endif; unset($_from); ?>
			<li class=""><a class="mback bmenu_lvl2" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li>
		      </ul>
		    <?php endif; ?>
		  </li>
	      <?php endforeach; endif; unset($_from); ?>
	      
	      
</ul>
	    
	    <div class="box-scroll box-scroll-sp" style="position: inherit">
	      <div class="s-scroll">
	      <div class="box-level1">
		<ul class="menu" id="menu-features-list">
		  <?php $_from = $this->_tpl_vars['IndustryList']['box1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
		  
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['level0_id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
		   
		  <?php endforeach; endif; unset($_from); ?>
		</ul>
	      </div>
	    
	      <div class="box-level2">
		    <ul class="menu">
			<?php $_from = $this->_tpl_vars['IndustryList']['box2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			<?php if ($this->_tpl_vars['item0']['count']): ?>
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['level1_id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
		      <?php endif; ?>
		  <?php endforeach; endif; unset($_from); ?>
		  <li class="liback"><a class="mback" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li>
		    </ul>
	      </div>
	      
	      <div class="box-level3">
		    <ul class="menu">
				<?php $_from = $this->_tpl_vars['IndustryList']['box3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
				<?php if ($this->_tpl_vars['item0']['count']): ?>
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['level2_id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
		      <?php endif; ?>
		  <?php endforeach; endif; unset($_from); ?>
		  <li class="liback"><a class="mback" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li>
		    </ul>
	      </div>
	      
	      <div class="box-level4">
		    <ul class="menu">
				<?php $_from = $this->_tpl_vars['IndustryList']['box4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
				<?php if ($this->_tpl_vars['item0']['count']): ?>
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['level3_id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
		      <?php endif; ?>
		  <?php endforeach; endif; unset($_from); ?>
		  <li class="liback"><a class="mback" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li>
		    </ul>
	      </div>
	      
	    </div>
	    </div>
	  	
	  </div>
	
	
	</section>
	    <?php if ($this->_tpl_vars['COMPANY']['facebook']): ?>
		<div class="wpb_wrapper fb_boxx fb_boxx_product">
		    <img style="display: block; margin: 0 auto" src="images/facebg.png">
		    
		    
			    <div class="facebookOuter">
				    <div class="facebookInner">
					<div class="fb-like-box"
					     data-width="235" data-height="265"
					     data-href="<?php echo $this->_tpl_vars['COMPANY']['facebook_full']; ?>
"
					     data-colorscheme="light"
					     data-border-color="#4e616d" data-show-faces="true"
					     data-stream="false" data-header="false">
					</div>
				    </div>
			    </div>
    
    
    
		</div>
	    <?php endif; ?>
        </div>
    </div>
		
		
</div>
                  
              



<div class="row" id="containerz">
  <aside id="left-sidebar lbnone" class="four columns follow-scroll connect_menu">
   
   
	
	
	
	<section style="display: none" id="recent_products-3" class="widget-3 widget-last widget widget_recent_products ">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_friend_links']; ?>
</h3>

				<ul>
					<?php $_from = $this->_tpl_vars['Friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spacelink'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spacelink']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spacelink']):
        $this->_foreach['spacelink']['iteration']++;
?>
					<li><a href="space/?userid=<?php echo $this->_tpl_vars['spacelink']['username']; ?>
&do=" target="_blank"><?php echo $this->_tpl_vars['spacelink']['username']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>

		</div></section>
   
   
  </aside>
  
  <div id="content" class="eleven columns" style="margin-top: -13px">
    <div id="main">

      
      <div class="page-title">

    
    <div class="subtitle" style="margin-top: 7px;">
        <?php echo $this->_tpl_vars['_product_list']; ?>
    </div>
    <h1 style="font-size: 18px;margin: 0;padding-top: 7px;" class="page-title mainhotnew">
	<a id="new_product_but" class="hotnewlist active" href="javascript:void(0)"><?php echo $this->_tpl_vars['_new_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="hot_product_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_hot_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="new_service_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_services']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      
      
      <!--<a id="recentbuy_product_but" class="hotnewlist" href="#list"><?php echo $this->_tpl_vars['_recent_buy']; ?>
</a>-->
      
      </h1>


<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
  <div class="postitem"><a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
	<a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit%26type=service"><?php echo $this->_tpl_vars['_add_service']; ?>
</a></div>
<?php else: ?>
  <div class="postitem"><a href="redirect.php?url=/logging.php"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
  <a target="_blank" href="redirect.php?url=/logging.php"><?php echo $this->_tpl_vars['_add_service']; ?>
</a></div>
<?php endif; ?>
    
    
  </div>
      
      

	  

      
      <div class="product_listing product_listing_connect listing_col4">
	<div class="product_list_loading">
	  <img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/loading.gif" />
	</div>
	
	
	<div id="box_load_list">
	    
	</div>
      
      <!-- list ajax product -->
			
			   
			   
			   
			   
			   

			   
			
		
		<div class="clear"></div>

      </div>
      			   <div class="clear"></div>


						

      
    </div>
  </div>
</div>




</div>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>













