<?php /* Smarty version 2.6.27, created on 2013-06-27 23:14:12
         compiled from default%5Cproduct/level1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'default\\product/level1.html', 448, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_nventory']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php echo '
<style>
  .eleven, .row .eleven {
    width: 100%;
}
</style>

<script type="application/x-javascript">
    
	function getMinHeight() {
	    //code
	    var min =  $(\'#list_product_ajax0\').height();
	    var it = 0;
	    for (var j=1; j < 5; j++) {
	       if ($(\'#list_product_ajax\'+j).height() < min) {
		  min = $(\'#list_product_ajax\'+j).height();
		  it = j;
	       }				    
	    }
	    return it;
	 }
    
	function ajaxListProduct(filter) {
		
		$.ajax({
			url: "index.php?do=product&action=listAjax"+filter,
			beforeSend: function ( xhr ) {
				//xhr.overrideMimeType("text/plain; charset=x-user-defined");
				$(\'#list_product_ajax\').html(\'<div class="loading">\'+$(\'#loading\').html()+\'</div>\');
			}
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 100));
				//$(\'#list_product_ajax\').html(data);
				
				for (var j=0; j < 5; j++) {
				    $(\'#list_product_ajax\'+j+\' ul\').html("");
				}
				for (var i=0; i < 15; i++) {
				    var pos = i%5;
				    $(\'#list_product_ajax\'+getMinHeight()+\' ul\').append($(data).filter(".products_"+i).html());
				}
				pos_pg = 15;
			}
		});
	}
	
	 function resetFilter(args) {
	    $(\'#ProductName\').val("");
	    $(\'#dataProductIndustryId1\').val(0);
	    $(\'#dataProductIndustryId2\').val(0);
	    $(\'#dataProductIndustryId3\').val(0);
	    $(\'#dataProductIndustryId4\').val(0);
	    $(\'#dataProductAreaId1\').val(0);
	    $(\'#dataProductAreaId2\').val(0);
	    $(\'#dataProductAreaId3\').val(0);	 
	 }
	
	function ajaxListProductScroll(filter) {		
		$.ajax({
			url: "index.php?do=product&action=listAjax"+filter,
		}).done(function ( data ) {
			if( console && console.log ) {
				//console.log("Sample of data:", data.slice(0, 100));
				//$(\'#list_product_ajax\').append(data);
				
				for (var i=0; i < 15; i++) {
				    var pos = i%5;
				    $(\'#list_product_ajax\'+getMinHeight()+\' ul\').append($(data).filter(".products_"+i).html());
				}
				
				startscroll = true;
				pos_pg += 15;
			}
		});
	}
	
	var industryid = 0;
	var areaid = 0;
	var orderby = \'dateline\';
	$(document).ready(function() {
		industryid = $(\'#industryid\').val();
	       
	        ajaxListProduct("&orderby="+orderby+"&industryid="+industryid);
	 
		
		
		$(\'#search_list_but\').click(function() {
			
			//get industry select
			//industryid = $(\'#industryid\').val();
			
			//get industry select
			if ($(\'#dataProductAreaId3\').val() != "0") {
				//code
				areaid = $(\'#dataProductAreaId3\').val();
				//alert("dsds");
			} else if ($(\'#dataProductAreaId2\').val() != "0") {
			//code
				areaid = $(\'#dataProductAreaId2\').val();
			} else
			{
				areaid = $(\'#dataProductAreaId1\').val();
			}
			
			var ff = "&orderby="+orderby;
			if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
			if(industryid != 0) ff += "&industryid="+industryid;
			if(areaid != 0) ff += "&areaid="+areaid;
			ajaxListProduct(ff);
		});
	});
	
	
	var startscroll = true;
	var pos_pg = 15;

	$(document).scroll(function(){		
		if(($(document).height()-$(window).height()-$(document).scrollTop()) < 1000){
			if (startscroll) {
				startscroll = false;
				//code
				console.log(\'Scrolled to bottom\');
				//ArticleList.loadMoreArticles();
				//alert("end");
				
				var ff = "&pos_pg="+pos_pg+"&orderby="+orderby;
				if($(\'#ProductName\').val()) ff += "&q="+$(\'#ProductName\').val();
				if(industryid != 0) ff += "&industryid="+industryid;
				if(areaid != 0) ff += "&areaid="+areaid;
				ajaxListProductScroll(ff);		
			}
		
		} else {
		    //console.log(\'Scroll \'+$(document).height()+\' - \'+$(window).height()+\' - \' +$(document).scrollTop());
		}
	});	
	
</script>
   

'; ?>



<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">

    <div id = "content" class = "fifteen columns" ><div class = "row" >

    <!--<div id="aq-block-1" class="aq-block clearing-container aq-block-aq_info_row_block fifteen columns aq-first cf">        <div class="promo">
            <span class="icon info"></span>
            <h2>Hey people! My name is <a href="http://themeforest.net/user/Crumina/portfolio">Crumina</a> and let me introduce my new Metro Theme - One touch</h2>
            <h5>COMRADES! WE MUST INCREASE THE EFFICIENCY AND QUALITY OF WORK IN EVERY WORKPLACE!</h5>
        </div>
    </div>-->
  
  
<div class="row">
  <div class="fifteen columns">

    <div id="page-title">

    <a class="back" href="javascript:history.back()"></a>
    <div class="subtitle">
        <?php echo $this->_tpl_vars['_category']; ?>
    </div>
    <h1 class="page-title"><?php echo $this->_tpl_vars['IndustryList']['name']; ?>
</h1>

    <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a> </div>

    
    
  </div>

  <?php if ($this->_tpl_vars['pb_username'] != ""): ?><div class="postitem" style="background: #FFAA31"><a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit"><?php echo $this->_tpl_vars['_post_product']; ?>
</a></div><?php endif; ?>
  </div>
</div>
  
  
  <div id="aq-block-2z" style="padding: 0 10px;" class="aq-block aq-block-aq_hslider_posts_block fifteen columns aq-first cf level1">
    <div class="wrap" style="">
        <div class="scroll-boxz" data-boxed="1">
                <div class = "dragger">
                    <div class="grid">
		      
		      <?php $_from = $this->_tpl_vars['IndustryList']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
		  <?php if ($this->_tpl_vars['k']%3 == 0): ?>
		     <div class = "gr-box">
		  <?php endif; ?>
		  
		  
		  <div class="item <?php if ($this->_tpl_vars['k']%6 == 5 || $this->_tpl_vars['k']%6 == 0): ?>large<?php else: ?>half<?php endif; ?> <?php if ($this->_tpl_vars['k']%6 == 0): ?>odd<?php else: ?><?php if ($this->_tpl_vars['k']%2 == 0): ?>even<?php else: ?>odd<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h4><a class="tile_title" href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h4>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<a href="index.php?do=product&level=3&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>                        
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="<?php if ($this->_tpl_vars['item0']['url'] != ""): ?> <?php echo $this->_tpl_vars['item0']['url']; ?>
 <?php else: ?> # <?php endif; ?> " target="_blank"></a>
                  </div>
		  
		  
		  <?php if ($this->_tpl_vars['k']%3 == 2 || $this->_tpl_vars['item0']['last'] == 1): ?>
		     </div>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['k']++): ?><?php endif; ?>		     
	    <?php endforeach; endif; unset($_from); ?>
		    
		    
		    </div>
                </div>
            </div>
            
<?php echo '
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    var countElements = jQuery(".scroll-box .grid .gr-box").size();
                    jQuery(".scroll-box .grid").width(countElements*584);

                    var scrollbox = jQuery(".scroll-box");
                    var indent = ( jQuery(window).width() - jQuery(".fifteen.columns>.wrap").width() ) / 2;

                    setBoxedSlider();

                    var animateTime = 1,
                            offsetStep = 5;

                    scrollWrapper = jQuery(\'.scroll-box\');
                    scrollContent = jQuery(\'.scroll-box .grid\');

                    //event handling for buttons "left", "right"
                    jQuery(\'.bttL\')
                            .mousedown(function() {
                                scrollContent.data(\'loop\', true).loopingAnimation(jQuery(this), jQuery(this).is(\'.bttR\') );
                            })
                            .bind("mouseup mouseout", function(){
                                //scrollContent.data(\'loop\', false).stop();
                            });

                    jQuery.fn.loopingAnimation = function(el, dir){
                        if(this.data(\'loop\')){
                            var sign = (dir) ? \'-=\' : \'+=\';
                            this.animate({ marginLeft: sign + offsetStep + \'px\' }, animateTime, function(){ jQuery(this).loopingAnimation(el,dir) });
                        }
                        return false;
                    };
                    //jQuery(\'.scroll-box\').tinyscrollbar({ axis: \'x\'});

                });

                jQuery(window).resize(function(){
                    //setBoxedSlider();
                    //setBoxedSlider();
                });

                function setBoxedSlider(){
                    scrollbox = jQuery(".scroll-box");

                    if(scrollbox.data("boxed") == "3"){
                        var marginLeft = jQuery(\'.fifteen.columns\').width();
                        marginLeft = (jQuery(window).width() - marginLeft)/2 - 9;

                        scrollbox.width(jQuery(window).width() );

                        if(marginLeft > 0)
                            scrollbox.closest(".wrap").css("margin-left",(-marginLeft)+"px");
                        scrollbox.closest(".wrap").width(jQuery(window).width());
                    }
                    else if(scrollbox.data("boxed") == "1"){
                        scrollbox.closest(".wrap").css("width","100%");
                        scrollbox.css("width","100%");
                    }
                    else if(scrollbox.data("boxed") == "2") {

                        scrollbox.closest(".wrap").css("width","100%");
                        scrollbox.css("width","100%");
                        var indent = jQuery(window).width() - jQuery(".fifteen").width();
                        console.log(indent);
                        scrollbox.width(jQuery(".fifteen").width() + indent/2 + 9);
                    }
                    scrollbox.getNiceScroll().resize();
                }
            </script>
'; ?>

       </div>
    </div>
  

  
   <div class="row">
  <div class="fifteen columns">

    <div id="page-title">

    <a class="back" href="javascript:history.back()"></a>
    <div class="subtitle">
        <?php echo $this->_tpl_vars['_product_list']; ?>
   </div>
    <h1 class="page-title"><?php echo $this->_tpl_vars['IndustryList']['name']; ?>
</h1>

    <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a><span class="delim">/</span><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['IndustryList']['parent_id']; ?>
"><?php echo $this->_tpl_vars['IndustryList']['parent_name']; ?>
</a> </div>

    <?php if ($this->_tpl_vars['pb_username'] != ""): ?><div class="postitem" style="background: #FFAA31"><a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit"><?php echo $this->_tpl_vars['_post_product']; ?>
</a></div><?php endif; ?>
    
  </div>

    <div id="SearchList">
      
        <input type="hidden" id="industryid" value="<?php echo $this->_tpl_vars['IndustryList']['id']; ?>
" />
        <input id="search_list_but" type="submit" value="<?php echo $this->_tpl_vars['_search']; ?>
" />
        
        <!--<select id="selectarea">
          <option>-- Sắp xếp theo --</option>
          <option value="">Ngày đăng</option>
          <option>Giá</option>
          <option>Tên</option>
        </select>-->
        <!--<div id="dataIndustry">
	    <select name="industry[id][3]" id="dataProductIndustryId3" class="level_3" ></select>	    
	    <select name="industry[id][2]" id="dataProductIndustryId2" class="level_2"></select>
	    <select name="industry[id][1]" id="dataProductIndustryId1" class="level_1" ></select>
	</div>
	
        <label><?php echo $this->_tpl_vars['_area']; ?>
&nbsp;&nbsp;</label>-->
	
	
	<div id="dataArea">
	    <select name="area[id][3]" id="dataProductAreaId3" class="level_3"></select>
	    <select name="area[id][2]" id="dataProductAreaId2" class="level_2"></select>
	    <select name="area[id][1]" id="dataProductAreaId1" class="level_1"></select>
	</div>
	<label><?php echo $this->_tpl_vars['_area']; ?>
&nbsp;&nbsp;</label>
        <input type="text" id="ProductName" name="q" placeholder="<?php echo $this->_tpl_vars['_product_name']; ?>
" />        
        
    </div>
  
  </div>
</div>
  
  
  
  
  
  

  <div class="row">
    <div class="eleven columns">

	<div id="container">
	<div id="content" role="main">


		
			
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
			
			<div id="list_product_ajax4" class="col_products">
			   <ul class="products">
			   
			   
			  
			   </ul>
			   
			   
			</div>

			
		
		<div class="clear"></div>

		

		</div>
</div>
    </div>

</div>
  
  

  
</div></div>
</div>  </div>
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

<script src="scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="scripts/script_area.js"></script>
<script src="scripts/script_industry.js"></script>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer_none.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

















