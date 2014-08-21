<?php /* Smarty version 2.6.27, created on 2014-08-13 15:53:19
         compiled from default%5Cproduct/category.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/category.html', 576, false),array('modifier', 'default', 'default\\product/category.html', 1038, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['IndustryList']['name']))));
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
<div id="body-wrapper-padding" class="connect_page">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php echo '
<script type="application/x-javascript">
  
	  function pagination(total, p) {
	    page = p;

	    var pages = Math.ceil(total/num_per_page);
	    
	    $(\'.pagination-list\').html("");
	    
	    if (pages > 1 && total > 0) {
	      var html = \'\';
	      	      
	      html += \'<ul>\';
	      if (page > 1) {
		html += \'<li class="first"><a href="javascript:void(0)" rel="1"><<</a></li>\'+
			\'<li class="prev"><a href="javascript:void(0)" rel="\'+(page-1)+\'"><</a></li>\';
	      }
		  
	      for(var i = 1; i <= pages; i++) {
		var active = \'\';
		if (page == i) {
		  active = \' active\';
		}
		html += \'<li class="num\'+active+\'"><a href="javascript:void(0)" rel="\'+i+\'">\'+i+\'</a></li>\';
	      }
	      
	      if (page < pages) {
		html += \'<li class="next"><a href="javascript:void(0)" rel="\'+(page+1)+\'">></a></li>\'+
			\'<li class="last"><a href="javascript:void(0)" rel="\'+(pages)+\'">>></a></li>\';
	      }
	      
	      html += \'</ul>\';
	      
	      $(\'.pagination-list\').html(html);
	      
	      $(\'.pagination-list ul li a\').click(function(){
		ajaxListProductPage(getFilterProducts(),parseInt($(this).attr("rel")));
	      });
	    }
	  }
  
	  function ajaxLoadMenu(id, level, item) {
	    //code
	    //$(\'h1.page-title\').html(item.html());
	    if(item) item.parent().parent().find("li").removeClass(\'active\');
	    if(item) item.parent().addClass(\'active\');
	    $.ajax({
			url: "index.php?do=product&action=ajaxLoadMenuConnect&industryid="+id,			
		}).done(function ( data ) {
			if( console && console.log ) {
			  
			  if(item) $(\'h1.page-title\').html(item.html());
			  
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
						      resetKeyword();
						      ajaxListProduct(getFilterProducts());
						  }
						 
				});
				//alert("aaaa");
				//alert(data);
				if(typeof($(data).filter(\'ul\').html()) != \'undefined\' || true)
				{
				    var levelx = level;
				    if(typeof($(data).filter(\'ul\').html()) == \'undefined\')
				    {
				      levelx = level - 1;
				    }
				    
				    //update parent menu link
				      $(\'.parent-menu-title\').html($(\'.box-level\'+(levelx-1)+\' li.active a\').clone());
				      if (industryid == 0) {
					$(\'.parent-menu-title\').html("<a href=\'javascript:void(0)\'>Danh mục sản phẩm</a>");
					//$(\'.product_list_title\').html(" / Tìm kiếm");
				      }
				    
				  if (levelx == \'2\') {
				    $(\'.s-scroll\').animate({ marginLeft: \'-240px\' }, 500);
				  }
				  else if (levelx == \'3\') {				    
				    $(\'.s-scroll\').animate({ marginLeft: \'-480px\' }, 500);
				  }
				  else if (levelx == \'4\') {
				    $(\'.s-scroll\').animate({ marginLeft: \'-720px\' }, 500);
				  }
				    
				    
				    $(\'.box-level\'+level).html(data);
				    $(\'.box-level\'+level).mCustomScrollbar({
					    autoHideScrollbar:true,
					    theme:"light-thin"
				    });
				    
				    $(\'.box-level\'+level+\' ul li a.item\').click(function() {
				      ajaxLoadMenu($(this).attr("rel"), parseInt(level)+1, $(this));				      
				    });
				    
				    $(\'.box-level\'+level+\' ul.menu li a\').click(function() {
						  
						  industryid = $(this).attr(\'rel\');
						  
						  
						  if (industryid) {
						     //getFilterProducts() in custom.js
						     resetKeyword();
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
	      if ($(window).scrollTop() > 253) $("html, body").animate({ scrollTop: 253 }, "slow");
	  
		$(\'.product_list_loading\').height($(\'.product_listing\').height());
		$(\'.product_list_loading\').css("display", "block");
		$.ajax({
			url: "index.php?do=product&leftbar=1&action=listAjax"+filter+"&pos_pg="+((1-1)*num_per_page)+"&num_per_page="+num_per_page,
			beforeSend: function ( xhr ) {
				//xhr.overrideMimeType("text/plain; charset=x-user-defined");
				$(\'#list_product_ajax\').html(\'<div class="loading">\'+$(\'#loading\').html()+\'</div>\');
			}
		}).done(function ( data ) {
			if( console && console.log ) {
				for (var j=0; j < 5; j++) {
				    $(\'#list_product_ajax\'+j+\' ul\').html("");
				}
				for (var i=0; i < num_per_page; i++) {
				    var pos = i%3;
				    
				    $(\'#list_product_ajax\'+pos+\' ul\').append($(data).filter(".products_"+i).html());
				}
				
				pos_pg = nnum_pp_page;
				$(\'.product_list_loading\').css("display", "none");
				
				
				if(!scroll) scroll = true;
				
				$(\'.product_listing ul.products li.product img\').load(function() {
				  $(this).parent().css("height", $(this).parent().height());
				});
				
				pagination(parseInt($(data).filter(".total-count").html()), 1);
				
				
				if (offer && first_offer) {
				  $(\'.offer_transform ul.products li.product img\').live(\'click\', function() {
				
				    getOfferDetail($(this).parent().parent().parent().attr("rel"),0);
				  
				  });
				  $(\'.offer_transform ul.products li.product h3 a\').live(\'click\', function() {
				
				    getOfferDetail($(this).parent().parent().parent().attr("rel"),0);
				  
				  });
				  first_offer =  0;
				}
				
				
				$(\'a,img\').qtip({ // Grab some elements to apply the tooltip to
				    content: {
					attr: \'title\'                        
				    },
				    position: {
					target: \'mouse\', // Track the mouse as the positioning target
					adjust: { x: 10, y: 25 } // Offset it slightly from under the mouse
				    }
				})
			}
		});
	}
	
	 function resetFilter(args) {
	    //$(\'#ProductName\').val("");
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
			url: "index.php?do=product&leftbar=1&action=listAjax"+filter,
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 200));
				//alert(data);
				//$(\'#list_product_ajax\').append(data);
				for (var i=0; i < num_per_page; i++) {
				    var pos = i%3;
				    $(\'#list_product_ajax\'+getMinHeight()+\' ul\').append($(data).filter(".products_"+i).html());
				    //alert(getMinHeight());
				}
				startscroll = true;
				pos_pg += nnum_pp_page;
				
				$(\'.product_listing ul.products li.product img\').load(function() {
				    $(this).parent().css("height", $(this).parent().height());
				});
				
				$(\'a,img\').qtip({ // Grab some elements to apply the tooltip to
				    content: {
					attr: \'title\'                        
				    },
				    position: {
					target: \'mouse\', // Track the mouse as the positioning target
					adjust: { x: 10, y: 25 } // Offset it slightly from under the mouse
				    }
				})
			}
		});
	}
	
	function ajaxListProductPage(filter,page) {
		$(\'.product_list_loading\').height(300);
		$(\'.product_list_loading\').css("display", "block");
		if ($(window).scrollTop() > 253) $("html, body").animate({ scrollTop: 253 }, "slow");
		$.ajax({
			url: "index.php?do=product&leftbar=1&action=listAjax"+filter+"&pos_pg="+((page-1)*num_per_page)+"&num_per_page="+num_per_page,
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 200));
				//alert(data);
				pagination(parseInt($(data).filter(".total-count").html()), page);
				$(\'.product_list_loading\').css("display", "none");
				
				$(\'.col_products ul\').html("");
				for (var i=0; i < num_per_page; i++) {
				    var pos = i%3;
				    $(\'#list_product_ajax\'+pos+\' ul\').append($(data).filter(".products_"+i).html());
				    //alert(getMinHeight());
				}
				startscroll = true;
				pos_pg += nnum_pp_page;
				
				$(\'.product_listing ul.products li.product img\').load(function() {
				    $(this).parent().css("height", $(this).parent().height());
				});
				
				$(\'a,img\').qtip({ // Grab some elements to apply the tooltip to
				    content: {
					attr: \'title\'                        
				    },
				    position: {
					target: \'mouse\', // Track the mouse as the positioning target
					adjust: { x: 10, y: 25 } // Offset it slightly from under the mouse
				    }
				})
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
	
	var page = 1;
	var num_per_page = 25;
	$(document).ready(function() {
	  
	  if ($(\'#aq-block-5\').height())
	    pos_searchlist = $(\'#aq-block-5\').height() + 440;
	  else
	    pos_searchlist = 250;
	       
	      '; ?>
<?php if ($_GET['level'] == 'search'): ?><?php echo '
		orderby = \'all\';
		industryid = '; ?>
<?php echo $this->_tpl_vars['IndustryList']['id']; ?>
<?php echo ';
		ajaxListProductPage(getFilterProducts(),1);
	      '; ?>
<?php else: ?><?php echo '
		//Init level 4
		$(".hotnewlist").removeClass("active");
		$(\'#new_product_but\').addClass("active");
		industryid = '; ?>
<?php echo $this->_tpl_vars['IndustryList']['id']; ?>
<?php echo ';
		ajaxListProductPage(getFilterProducts(),1);
	      '; ?>
<?php endif; ?><?php echo '
	      
	      
	      ajaxLoadMenu('; ?>
<?php echo $this->_tpl_vars['IndustryList']['id']; ?>
, <?php echo $this->_tpl_vars['p_level']+1; ?>
<?php echo ', null)
	 
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
			ajaxListProduct(getFilterProducts());
		});
		
				    $(\'.box-level2 ul li a.item\').click(function() {
				      ajaxLoadMenu($(this).attr("rel"), \'3\', $(this));				      
				    });
				    
				    $(\'.box-level3 ul li a.item\').click(function() {
				      ajaxLoadMenu($(this).attr("rel"), \'4\', $(this));				      
				    });
				    
				    $(\'.box-level4 ul li a.item\').click(function() {
				      ajaxLoadMenu($(this).attr("rel"), \'5\', $(this));
				    });

		
		$(\'.box-scroll ul.menu li a.item\').click(function() {
			industryid = $(this).attr(\'rel\');
			
			if (industryid) {
			    //getFilterProducts() in custom.js
			    resetKeyword();
			    ajaxListProduct(getFilterProducts());
			}
		});
		
		$(\'a.all_p\').click(function() {
		    industryid = 0;
		    
		    resetKeyword();
		    
		    $(\'.box-scroll ul li\').removeClass(\'active\');
			
		    $(\'span.product_list_title\').html("");
		    
		    //getFilterProducts() in custom.js
		    ajaxListProduct(getFilterProducts());
		    
		    $(\'.s-scroll\').animate({ marginLeft: \'0px\' }, 200);
		    
		    $(\'.parent-menu-title\').html("<a href=\'javascript:void(0)\'>Danh mục sản phẩm</a>");
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
				
		$(\'.parent-menu-title\').live("click",function() {
		  industryid = $(this).find("a").attr(\'rel\');
		  $(\'.connect_menu .menu li a[rel=\'+industryid+\']\').trigger("click");
		});
		$(\'.widget ul.menu li.liback\').live("click", function(){
		  if($(\'.product_list_title a\').length)
		  {
		    $(\'.product_list_title a\').last().trigger("click");
		  }
		  else
		  {
		    $(\'a.all_p\').trigger("click");
		  }
		});		
	});
	
	
	var startscroll = true;
	var nnum_pp_page = 15;
	var pos_pg = nnum_pp_page;
	

	$(document).scroll(function(){		
		if(($(document).height()-$(window).height()-$(document).scrollTop()) < 1000){
			if (startscroll && scroll) {
				startscroll = false;
				//code
				console.log(\'Scrolled to bottom\');
				//ArticleList.loadMoreArticles();
				//alert("end");
				
				
				//ajaxListProductScroll(getFilterProducts()+"&pos_pg="+pos_pg);		
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




      
      <?php if ($this->_tpl_vars['IndustryList']['count'] && false): ?>
  
<div class="row">
  <div class="fifteen columns" style="padding-left: 0">

    <div id="page-title">

    <div class="super-main-category mainproductpage">
		<div class="show-but">
			Chuyên mục chính
			
		</div>
		<a href="<?php if ($this->_tpl_vars['item']['service']): ?><?php echo smarty_function_the_url(array('module' => 'service_main'), $this);?>
<?php else: ?><?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
<?php endif; ?>" class="show-but current-but <?php if ($this->_tpl_vars['item']['service']): ?>service<?php else: ?>product<?php endif; ?>">
			.			
		</a>
		<br style="clear:both" />
		<div class="main-cat-content-out">
			<span class="pointer_topmenuz">.</span>
			<div class="main-cat-content"></div>
		</div>
	</div>

    <h1 class="page-title"><?php echo $this->_tpl_vars['IndustryList']['name']; ?>
</h1>

    <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a><span class="delim">/</span><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['IndustryList']['level0_id']; ?>
"><?php echo $this->_tpl_vars['IndustryList']['level0_name']; ?>
</a><span class="delim">/</span><a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['IndustryList']['level1_id']; ?>
"><?php echo $this->_tpl_vars['IndustryList']['level1_name']; ?>
</a><span class="delim">/</span><?php echo $this->_tpl_vars['IndustryList']['name']; ?>
 </div>
    
  </div>

  
  </div>
</div>
  
  
  
<div class="row">
  
 <div id="aq-block-5" style="padding: 0 12px;" class="aq-block aq-block-aq_recent_block fifteen columns aq-first cf">
  <div id="recent" class="section-block clearing-container" style="height: auto">
        
   

    <div class="works-list xxsmall">
        <ul class="filterable-grid" style="height: auto">
            
		<?php $_from = $this->_tpl_vars['IndustryList']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
		    
		    <li class="item" data-id="id-1" data-type="dentity motion sites web-design ">
			<div class="<?php echo $this->_tpl_vars['item0']['size']; ?>
 odd">
			    <div class="pic">
				
				<?php if ($this->_tpl_vars['item0']['images'] != ""): ?>					
					<img <?php if ($this->_tpl_vars['item0']['size'] == 'large'): ?> width="390" height="180" <?php else: ?> width="193" height="180" <?php endif; ?> src="<?php echo $this->_tpl_vars['item0']['images']['0']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                <?php else: ?>
					<img src="<?php if ($this->_tpl_vars['item0']['size'] == 'large'): ?>http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/tumblr_m6p161c56j1qdq19eo1_1280-390x180.jpg<?php else: ?>http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/tumblr_m3yj7gRlDS1qdq19eo1_1280-193x180.jpg<?php endif; ?>" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
					
				<?php endif; ?>
				
			    
			    
			    </div>
			    <div class="description">
				<div class="title">
				    <!--<time><?php echo $this->_tpl_vars['_category']; ?>
</time>-->
				    <h4><?php echo $this->_tpl_vars['item0']['name']; ?>
</h4>
				</div>
			    </div>
			    <a href="index.php?do=product&level=4&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"></a>
			</div>
		    </li>
		  		     
		<?php endforeach; endif; unset($_from); ?>
                                            
        </ul>
    </div>
    </div>

    <?php echo '
    <script type="text/javascript">
        /*-----------------------------------------------------------------------------------

           Custom JS - All front-end jQuery

      -----------------------------------------------------------------------------------*/

        jQuery(document).ready(function($) {

            function portfolio_quicksand() {

                // Setting Up Our Variables
                var $filter;
                var $container;
                var $containerClone;
                var $filterLink;
                var $filteredItems

                // Set Our Filter
                $filter = $(\'.filter li.active a\').attr(\'class\');

                // Set Our Filter Link
                $filterLink = $(\'.filter li a\');

                // Set Our Container
                $container = $(\'ul.filterable-grid\');

                // Clone Our Container
                $containerClone = $container.clone();

                // Apply our Quicksand to work on a click function
                // for each for the filter li link elements
                $filterLink.click(function(e)
                {
                    // Remove the active class
                    $(\'.filter li\').removeClass(\'active\');

                    // Split each of the filter elements and override our filter
                    $filter = $(this).attr(\'class\').split(\' \');

                    // Apply the \'active\' class to the clicked link
                    $(this).parent().addClass(\'active\');

                    // If \'all\' is selected, display all elements
                    // else output all items referenced to the data-type
                    if ($filter == \'all\') {
                        $filteredItems = $containerClone.find(\'li\');
                    }
                    else {
                        $filteredItems = $containerClone.find(\'li[data-type~=\' + $filter + \']\');
                    }

                    // Finally call the Quicksand function
                    $container.quicksand($filteredItems,
                            {
                                // The Duration for animation
                                duration: 750,
                                // the easing effect when animation
                                easing: \'easeInOutQuad\'
                                // height adjustment becomes dynamic

                            });

                    //Initalize our PrettyPhoto Script When Filtered
                    $container.quicksand($filteredItems,
                            function () { lightbox(); }
                    );
                });
            }

            if(jQuery().quicksand) {
                portfolio_quicksand();
            }


        }); // END OF DOCUMENT
    </script>
    '; ?>

    
    </div>
 
 
</div>
<?php endif; ?>





<div class="row">
  <div class="fifteen columns" style="padding-left: 0">

    <div id="page-title" class="connect_ptitle" style="padding-left: 110px;">

    <div class="super-main-category mainproductpage">
		<div class="show-but">
			Chuyên mục chính
			
		</div>
		<a href="<?php if ($_GET['action'] == 'services'): ?><?php echo smarty_function_the_url(array('module' => 'service_main'), $this);?>
<?php else: ?><?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
<?php endif; ?>" class="show-but current-but <?php if ($_GET['action'] == 'services'): ?>service<?php else: ?>product<?php endif; ?>">
			.			
		</a>
		<br style="clear:both" />
		<div class="main-cat-content-out">
			<span class="pointer_topmenuz">.</span>
			<div class="main-cat-content"></div>
		</div>
	</div>
    
    
    <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a></div>

    <h1 class="page-title"><?php echo $this->_tpl_vars['IndustryList']['name']; ?>
</h1>
    
  </div>

  </div>
</div>

    
<div class="row" style="height: 45px;">
  
        
                <div id="SearchList" class="connect_searchx" style="padding-left: 10px;position: absolute;top: 250px;">
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
        <input type="text" id="ProductName" name="q" value="<?php echo $this->_tpl_vars['keyword']; ?>
" placeholder="Tìm kiếm (nhập tên, mã sản phẩm/dịch vụ)" />
	
	<h5><a href="javascript:void(0)" class="all_p"><span class="cat_title">Danh mục sản phẩm</span></a> <span class="product_list_title">
	  
	  
	</span></h5>
	
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
				<?php if ($this->_tpl_vars['level1']['sub']): ?><li><a class="mback bmenu_lvl3" href="javascript:void(0)" back-id="<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_back']; ?>
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
	    
	    
	    
	    <div class="box-scroll">
	      <div class="parent-menu-title">
		
	      </div>
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
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['level1_id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
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
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
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
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954<?php if ($this->_tpl_vars['item0']['id'] == $this->_tpl_vars['IndustryList']['id']): ?> active<?php endif; ?>" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['name']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>
 <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span>
			</a>
		      </li>
		  <?php endforeach; endif; unset($_from); ?>
		  <li class="liback"><a class="mback" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li>
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
  <aside id="left-sidebar" class="four columns follow-scroll connect_menu">
   
   
	
	
	
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
  
  <div id="content" class="eleven columns" style="margin-top: -16px">
    <div id="main">

      
      <div class="page-title">

    
    <div class="subtitle loplo" style="margin-top: 8px;">
        <?php echo $this->_tpl_vars['_product_list']; ?>
    </div>
    <h1 style="font-size: 18px;margin: 0;padding-top: 0px;" class="page-titlez mainhotnew">
      <a id="new_product_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_new_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <!-- for sale -->
      <a id="sale_product_but" class="hotnewlist" href="javascript:void(0)">Giảm giá/Khuyến mãi</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      
      <a id="hot_product_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_hot_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <!-- for other -->
      <a id="other_product_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_other_product']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      <!--<a id="new_service_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_services']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
      <!-- for offer -->
      <!--<a id="new_offer_but" class="hotnewlist" href="javascript:void(0)"><?php echo $this->_tpl_vars['_raovat']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
      
      <!--<a id="recentbuy_product_but" class="hotnewlist" href="#list"><?php echo $this->_tpl_vars['_recent_buy']; ?>
</a>-->
      
      </h1>


<div class="postitem">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/_postitems.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    
    
  </div>
      
      <?php if ($_GET['level'] == 'search'): ?>
	<h4 class="keyword_header"><?php echo $this->_tpl_vars['IndustryList']['name']; ?>
</h4>
      <?php endif; ?>

	  
	  <br class="clear" />
      
      <div class="pagination-list"></div>
      
      <div class="product_listing level4 product_listing4">
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

			
			<!--div id="list_product_ajax3" class="col_products">
			   <ul class="products">
			   
			   
			   
			   </ul>
			   
			   
			</div>
			
			<div id="list_product_ajax4" class="col_products">
			   <ul class="products">
			   
			   
			  
			   </ul>
			   
			   
			</div>-->
			
		
		<div class="clear"></div>

      </div>
      
      <div class="pagination-list"></div><br style="clear:both" /><br />
      
      
    </div>
  </div>
</div>
  
  


  




  
  

  
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

















