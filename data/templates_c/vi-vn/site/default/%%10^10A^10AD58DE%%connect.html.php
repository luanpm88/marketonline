<?php /* Smarty version 2.6.27, created on 2014-01-21 10:01:09
         compiled from default%5Cproduct/connect.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/connect.html', 660, false),array('modifier', 'default', 'default\\product/connect.html', 890, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Trang chủ - Nơi liên kết Chia sẻ giữa các Thành viên")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
  .eleven, .row .eleven {
    width: 100%;
}
</style>
'; ?>

<div id="body-wrapper" >
<div id="body-wrapper-padding" class="connect_page connect_page_scroll_menu">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php echo '
<script type="application/x-javascript">
  
	  
	  
	  
  
	  function getLinksAll(item) {
		item.addClass("link_loading");
		$.ajax({
			url: "index.php?do=product&action=ajaxListLinks",			
		}).done(function ( data ) {
			if( console && console.log ) {
			  //alert(data);
			  item.removeClass("link_loading");
			  $(\'#links_list_all .content_inner\').html(data);			  
			  $(\'#links_list_but\').trigger(\'click\');
			  $(\'#links_list_all .link_item img\').resizecrop({
			    width:99,
			    height:99
			  });
			}
		});
	  }
	  
	  function getFollowsAll(item) {
		item.addClass("link_loading");
		$.ajax({
			url: "index.php?do=product&action=ajaxListFollows",			
		}).done(function ( data ) {
			if( console && console.log ) {
			  //alert(data);
			  item.removeClass("link_loading");
			  $(\'#follows_list_all .content_inner\').html(data);			  
			  $(\'#follows_list_but\').trigger(\'click\');
			  $(\'#follows_list_all .link_item img\').resizecrop({
			    width:99,
			    height:99
			  });
			}
		});
	  }
  
	  function ajaxLoadMenu(id, level, item) {
	    //code
	    if(item) item.parent().parent().find("li").removeClass(\'active\');
	    item.parent().addClass(\'active\');
	    $.ajax({
			url: "index.php?do=product&action=ajaxLoadMenuConnect&industryid="+id,			
		}).done(function ( data ) {
			if( console && console.log ) {
			  
				$(\'.product_list_title\').html($(data).filter(\'#mapp\').html());
				
				
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
						      //getFilterProducts() in custom.js
						      ajaxListProduct(getFilterProducts());
						  }
						 
				});
				
				//alert(data);
				if(typeof($(data).filter(\'ul\').html()) != \'undefined\')
				{
				    //alert(\'done\');
				    
				  if (level == \'2\') {
				    $(\'.s-scroll\').animate({ marginLeft: \'-310px\' }, 500);
				  }
				  else if (level == \'3\') {				    
				    $(\'.s-scroll\').animate({ marginLeft: \'-620px\' }, 500);
				  }
				  else if (level == \'4\') {
				    $(\'.s-scroll\').animate({ marginLeft: \'-930px\' }, 500);
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
				      $(\'.s-scroll\').animate({ marginLeft: \'-310px\' }, 500);
				    });
				    
				    $(\'.box-level4 ul li a.mback\').click(function() {
				      $(\'.s-scroll\').animate({ marginLeft: \'-620px\' }, 500);
				    });
				    				    
				    $(\'.box-level\'+level+\' ul li a.item\').click(function() {
				      ajaxLoadMenu($(this).attr("rel"), \'3\', $(this));				      
				    });
				    
				    
				    $(\'.box-level\'+level+\' ul.menu li a\').click(function() {

						  industryid = $(this).attr(\'rel\');
						  
						  if (industryid) {
						      //getFilterProducts() in custom.js
						      ajaxListProduct(getFilterProducts());
						  }
						 
				    });
				}
			}
		});
	  }
   
	 function getMinHeight() {
	  
	    //for offer
	    if (offer) {
	      return 0;
	    }
	  
	    //code
	    var min =  $(\'#list_product_ajax0\').height();
	    var it = 0;
	    for (var j=1; j < 3; j++) {
	       if ($(\'#list_product_ajax\'+j).height() < min) {
		  min = $(\'#list_product_ajax\'+j).height();
		  it = j;
	       }				    
	    }
	    return it;
	 }
	 
	function ajaxListProduct(filter) {
	      if ($(window).scrollTop() > 305) $("html, body").animate({ scrollTop: 305 }, "slow");
	  
	      $(\'.product_list_loading\').height($(\'.product_listing\').height());
		$(\'.product_list_loading\').css("display", "block");
		$.ajax({
			url: "index.php?do=product&action=listAjax&leftbar=1&connectid='; ?>
<?php echo $this->_tpl_vars['pb_userid']; ?>
<?php echo '"+filter,
			beforeSend: function ( xhr ) {
				//xhr.overrideMimeType("text/plain; charset=x-user-defined");
				$(\'#list_product_ajax\').html(\'<div class="loading">\'+$(\'#loading\').html()+\'</div>\');
			}
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 200));
				//alert($(data).filter(".products_0").html());
				//$(\'#list_product_ajax\').html(data);
				//alert(data);
				for (var j=0; j < 5; j++) {
				    $(\'#list_product_ajax\'+j+\' ul\').html("");
				}
				for (var i=0; i < 15; i++) {
				    var pos = i%3;
				    
				    $(\'#list_product_ajax\'+getMinHeight()+\' ul\').append($(data).filter(".products_"+i).html());
				}
				
				pos_pg = 15;
				$(\'.product_list_loading\').css("display", "none");
				
				
				if(!scroll) scroll = true;
				
				$(\'.product_listing ul.products li.product img\').load(function() {
				  $(this).parent().css("height", $(this).parent().height());
				});
				
				
				
				
				if (offer && first_offer) {
				  $(\'.offer_transform ul.products li.product img\').live(\'click\', function() {
				
				    getOfferDetail($(this).parent().parent().parent().attr("rel"),0);
				  
				  });
				  $(\'.offer_transform ul.products li.product h3 a\').live(\'click\', function() {
				
				    getOfferDetail($(this).parent().parent().parent().attr("rel"),0);
				  
				  });
				  first_offer =  0;
				}
				
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
	    
	    //for other product
	    other = 0;
	    
	    //for sale
	    sale = 0;
	    
	    //for offer
	    offer = 0;
	    $(\'.col_products ul\').html("");
	    $(\'.product_listing\').removeClass("offer_transform");
	    ///////////////
	 }
	
	function ajaxListProductScroll(filter) {
	  
		
	  
		$.ajax({
			url: "index.php?do=product&action=listAjax&leftbar=1&connectid='; ?>
<?php echo $this->_tpl_vars['pb_userid']; ?>
<?php echo '"+filter,
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 200));
				//alert(data);
				//$(\'#list_product_ajax\').append(data);
				for (var i=0; i < 15; i++) {
				    var pos = i%5;
				    $(\'#list_product_ajax\'+getMinHeight()+\' ul\').append($(data).filter(".products_"+i).html());
				    //alert(getMinHeight());
				}
				startscroll = true;
				pos_pg += 15;
				
				$(\'.product_listing ul.products li.product img\').load(function() {
				  $(this).parent().css("height", $(this).parent().height());
				});
				
				
				
				
			}
		});
	}
	
	var industryid = 0;
	var service = 0;
	
	//for other product
	var other = 0;
	
	//for sale
	var sale = 0;
	
	//for offer
	var offer = 0;
	var first_offer = 1;
	
	var orderby = \'dateline\';
	var scroll = false;
	$(document).ready(function() {
	       
		if ($(\'#aq-block-5\').height())
		  pos_searchlist = $(\'#aq-block-5\').height() + 440;
		else
		  pos_searchlist = 255;
	 
	       $(".hotnewlist").removeClass("active");
	       $(\'#new_product_but\').addClass("active");
	       
	       ajaxListProduct("&orderby="+orderby);
	 
		$(\'#hot_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'favourite\';			
			
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
		});
		
		$(\'#new_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
		});
		
		$(\'#new_service_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			service = 1;
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
		});
		
		$(\'#recentbuy_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			
			ajaxListProduct("");
		});
		
		//for other product
		$(\'#other_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			other = 1;
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
		});
		
		//for offer
		$(\'#new_offer_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			offer = 1;
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
			
			$(\'.col_products ul\').html("");
			$(\'.product_listing\').addClass("offer_transform");
		});
		
		//for sale
		$(\'#sale_product_but\').click(function () {
			resetFilter();
			$(".hotnewlist").removeClass("active");
			$(this).addClass("active");
			orderby = \'dateline\';
			sale = 1;
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
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
			
			//getFilterProducts() in custom.js
			ajaxListProduct(getFilterProducts());
		});
		
		$(\'.box-scroll ul.menu li a.item\').click(function() {
		  
		  
			
			industryid = $(this).attr(\'rel\');
			
			if (industryid) {
			  
			    //getFilterProducts() in custom.js
			    ajaxListProduct(getFilterProducts());
			}
			
			
		});
		
		$(\'a.all_p\').click(function() {
		  
		    //show left menu bar
		    if ($(\'.connect_menu_hide #nav_menu-2\').css(\'display\') == \'none\') {
		      $(\'.connect_menu_hide #nav_menu-2\').css(\'display\', \'block\');
		    }
		    if (show) {
			  //code	
				    $(".box-level1").mCustomScrollbar({
					    autoHideScrollbar:true,
					    theme:"light-thin"
				    });
			  show = 0;
		    }
		  
		    industryid = 0;
		    
		     $(\'.box-scroll ul li\').removeClass(\'active\');
			
		    $(\'span.product_list_title\').html("");
		    
		    //getFilterProducts() in custom.js
		    ajaxListProduct(getFilterProducts());
		    
		    
		    $(\'.s-scroll\').animate({ marginLeft: \'0px\' }, 200);
		});
		
		$(\'.box-level1 ul li a.item\').click(function() {		
		  ajaxLoadMenu($(this).attr("rel"), \'2\', $(this));	 
		  
		});
		
		
		if($(\'.inner_slide\').height() - $(window).height()  > -50)
		{
		  //alert("ayda");
		  var amount = $(\'.inner_slide\').height() - $(window).height() + 50;
		  $(\'.outer_slide\').css(\'margin-top\', amount);
		  $(\'.inner_slide\').css(\'margin-top\', -amount);
		}
		
		//$(\'#left-sidebar .outer_slide\').stickyScroll({ container: \'#left-sidebar .outer_slide\' });
		
		var leaveTop = -76;
		 
		 if ($(\'.inner_slide\').height() - $(window).height() + 10 >= -60) {
		  leaveTop = $(\'.inner_slide\').height() - $(window).height() + 10;
		 }
		 
		 
		 $(\'#left-sidebar\').stickyScroll({ container: \'#left-sidebar\', leftBanner: false, leaveTop: leaveTop, topbound: 318.5 });
		 
		//
		//showLinksHelpBox();
		
		
		
		
		 
		//$.cookie("welcome", "cookie_value");
		//$.cookie("cookie_name2", "cookie_value2");
		//alert($.cookie("welcome"));
		if (typeof($.cookie("links-help-box")) == \'undefined\') {
		    //code
		    $.cookie("links-help-box", true);
		    $(\'.links-help-box\').css(\'display\', \'block\');
		}
	});
	
	
	var startscroll = true;
	var pos_pg = 15;

	$(document).scroll(function(){		
		if(($(document).height()-$(window).height()-$(document).scrollTop()) < 1000){
			if (startscroll && scroll) {
				startscroll = false;
				//code
				console.log(\'Scrolled to bottom\');
				//ArticleList.loadMoreArticles();
				//alert("end");
				
				
				ajaxListProductScroll(getFilterProducts()+"&pos_pg="+pos_pg);		
			}
		
		} else {
		    //console.log(\'Scroll \'+$(document).height()+\' - \'+$(window).height()+\' - \' +$(document).scrollTop());
		}
	});	
	
</script>
   

'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>




<div class="row">
      <div id="page-title" class="fifteen columns connect_ptitle">
        <a href="javascript:history.back()" class="back"></a>
        <div class="subtitle">
            <?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_username']; ?>
<?php endif; ?>        </div>

                <h1 class="page-title">
           <?php echo $this->_tpl_vars['_connect_title']; ?>
 - Liên kết, Chia sẻ</h1>

        <!--<div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product&action=connect"><?php echo $this->_tpl_vars['_product_center']; ?>
</a> </div>-->


      </div>

    </div>

    
<div class="row" style="height: 52px;">
  
        
                <div id="SearchList" class="connect_searchx connect_menu_hide" style="padding-left: 10px;position: absolute; top: 255px">
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
</span></a><span class="cat_pointer">.</span><span class="product_list_title"></span></h5>
	
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
	    
	    <div class="box-scroll box-scroll-hide-menu">
	      <div class="s-scroll">
	      <div class="box-level1">
		<ul class="menu" id="menu-features-list">
		  <?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954" id="menu-item-954">
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
				
		    </ul>
	      </div>
	      
	      <div class="box-level3">
		    <ul class="menu">
				
		    </ul>
	      </div>
	      
	      <div class="box-level4">
		    <ul class="menu">
				
		    </ul>
	      </div>
	      
	    </div>
	    </div>
	  
	  </div>
	
	
	</section>
	
	
        </div>
    </div>
		
		
</div>
  
  
<div class="row" id="containerz">
  <aside id="left-sidebar" class="four columns follow-scroll connect_menu link_friends">
   
   
	<div class="outer_slide">
	  <div class="inner_slide">
	
	
	<section style="float: left; width: 100%" id="recent_products-3" class="widget-3 widget-last widget widget_recent_products ">
                <div class="widget-inner">
		  
		  
		  <?php if (true): ?>
			<div class="tooltip-box links-help-box"><span class="pointer-tooltip">...</span><span class="toolbox-close">X</span><div class="tooltip-box-content">
			  
			<h2>
			 Liên kết để tăng thêm lượt truy cập vào trang của bạn !
			 
			</h2>
			<p style="text-align: center; font-size: 14px;margin-bottom: 0">
			 
			 <!--<a href="javascript:void(0)" onclick="shareStreamFacebook('<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php if ($this->_tpl_vars['pb_company']['product_count'] > 8): ?>/<?php echo $this->_tpl_vars['pb_username']; ?>
_un.htmls<?php endif; ?>')">Chia sẻ cho bạn bè trên Facebook</a>-->
			<a href="javascript:void(0)" onclick="goclicky(this, '<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
/<?php echo $this->_tpl_vars['pb_userid']; ?>
_un.htmls')">Quảng bá gian hàng <strong><?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>
</strong> trên Facebook</a>
			</p>

	
			</div></div>
		  <?php endif; ?>
		  
                    <h3><a href="javascript:void(0)" onclick="getLinksAll($(this))" id="go_list_all_links"><?php echo $this->_tpl_vars['_friend_links']; ?>
 : <?php echo $this->_tpl_vars['count_links']; ?>
</a>
		      <!--<a title="<?php echo $this->_tpl_vars['_add_link_help']; ?>
" href="#add_link" class="top_plus">+</a>-->
		      <a title="Liên kết để tăng thêm lượt truy cập cho gian hàng &quot;<?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>
&quot;" href="javascript:void(0)" onclick="goclicky(this, '<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
/<?php echo $this->_tpl_vars['pb_userid']; ?>
_un.htmls')" class="top_plus linked">Mời bạn bè +</a>
		    </h3>

		    
		    <div class="left_connect_box">
		      <div class="friendlink_box">
			
			
			
			    <?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			    
			      <?php if ($this->_tpl_vars['item0']['shop_name'] && $this->_tpl_vars['key0'] < 9): ?>
				  <a target="_blank" class="link_item" href="<?php echo $this->_tpl_vars['item0']['link']; ?>
">
				    <img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" />
				    <span class="bg">.</span>
				    <title><?php echo $this->_tpl_vars['item0']['shop_name']; ?>
</title>
				  </a>
			      <?php endif; ?>
			    <?php endforeach; endif; unset($_from); ?>
			    <?php if ($this->_tpl_vars['count_links'] < 9): ?>
				<a class="link_item add_link" href="#add_link" title="<?php echo $this->_tpl_vars['_add_link_help']; ?>
">				    
					<title>+</title>
				</a>
			    <?php endif; ?>
			
			
			
		      </div>
		    </div>

		</div>
      </section>
	<br style="clear: both" />
	
	<section style="float: left; width: 100%" id="recent_products-3" class="widget-3 widget-last widget widget_recent_products box_follow_connect">
                <div class="widget-inner">
		  
                    <h3><a href="javascript:void(0)" onclick="getFollowsAll($(this))" id="go_list_all_follows"><?php echo $this->_tpl_vars['_follow']; ?>
 : <?php echo $this->_tpl_vars['count_follows']; ?>
</a><a title="<?php echo $this->_tpl_vars['_follow_help']; ?>
" href="#add_follow" class="top_plus">+</a></h3>
		  <div class="left_connect_box">
		    <div class="friendlink_box">
		      
		      
		    
			<?php $_from = $this->_tpl_vars['follows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			  <?php if ($this->_tpl_vars['item0']['shop_name'] && $this->_tpl_vars['key0'] < 9): ?>
			      <a target="_blank" class="link_item" href="<?php echo $this->_tpl_vars['item0']['link']; ?>
">
				<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" />
				<span class="bg">.</span>
				<title><?php echo $this->_tpl_vars['item0']['shop_name']; ?>
</title>
			      </a>
			  <?php endif; ?>			  
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['count_follows'] < 9): ?>
			    <a class="link_item add_link" href="#add_follow" title="<?php echo $this->_tpl_vars['_follow_help']; ?>
">				    
				      <title>+</title>
			    </a>
			<?php endif; ?>
		      
		      
		    </div>
		  </div>
		</div>
      </section>
	</div>
   </div>
   
  </aside>
  
  <div id="content" class="eleven columns" style="margin-top: -7px">
    <div id="main" style="margin-top: -8px;">

      
      <div class="page-title">

    
    <div class="subtitle loplo" style="margin-top: 7px;">
        <?php echo $this->_tpl_vars['_product_list']; ?>
    </div>
    <h1 style="font-size: 18px;margin: 0;padding-top: 20px;" class="page-title mainhotnew">
      <a id="new_product_but" class="hotnewlist active" href="javascript:void(0)"><?php echo $this->_tpl_vars['_new_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <!-- for sale -->
      <a id="sale_product_but" class="hotnewlist" href="javascript:void(0)">Giảm giá/Khuyến mãi</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <a id="hot_product_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_hot_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <!-- for other -->
      <a id="other_product_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_other_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <a id="new_service_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_services']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <!-- for offer -->
      <a id="new_offer_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_raovat']; ?>
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
    <a href="redirect.php?url=/logging.php"><?php echo $this->_tpl_vars['_add_service']; ?>
</a></div>
<?php endif; ?>
    
    
  </div>
      
      

	  
	  <br class="clear" />
      
      <div class="product_listing product_listing_connect listing_col4">
	<div class="product_list_loading">
	  <img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/loading.gif" />
	</div>
      
      <!-- list ajax product -->
			<div id="list_product_ajax0" class="col_products">
			<ul class="products">
			   

			</ul>
			
			</div>
			<div id="list_product_ajax1" class="col_products">
			   <ul class="products">
			   
			   
			   </ul>
			   
			   
			</div>
			<div id="list_product_ajax2" class="col_products">
			   
			   <ul class="products">
			   
			   </ul>
			</div>

			
			<div id="list_product_ajax3" class="col_products">
			   <ul class="products">
			   
			   
			   
			   </ul>
			   
			   
			</div>
			
			<!--<div id="list_product_ajax4" class="col_products">
			   <ul class="products">
			   
			   
			  
			   </ul>
			   
			   
			</div>-->
			
		
		<div class="clear"></div>

      </div>
      
      
    </div>
  </div>
</div>
  
  


  


<?php echo '
<script type="text/javascript">
		var show = 1;
                jQuery(document).ready(function() {
		    $(\'body\').click(function(){$(\'.connect_menu_hide #nav_menu-2\').fadeOut()});
		    $(\'.connect_menu_hide #nav_menu-2\').click(function(event){
			event.stopPropagation();
		    });
		    $(\'#SearchList h5\').click(function(event){
			event.stopPropagation();
		    });
		    //connect menu bar
		    $(\'.cat_pointer\').click(function(e) {
			$(\'.connect_menu_hide #nav_menu-2\').toggle();
			
			e.stopPropagation();
			if (show) {
			  //code	
				    $(".box-level1").mCustomScrollbar({
					    autoHideScrollbar:true,
					    theme:"light-thin",
					    scrollSpeed: 40
				    });
			  show = 0;
			}      
		    });
		    
		});
</script>
'; ?>


  
  

  
</div></div>

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
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="scripts/script_area.js"></script>
<script src="scripts/script_industry.js"></script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer_none.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

















