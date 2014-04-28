<?php /* Smarty version 2.6.27, created on 2014-04-25 13:06:08
         compiled from default/footer.html */ ?>
    <div id="darkf">
  <section id="footer" role="contentinfo">

    <div class="row">

    
    <div id="company_info" style="width: 100%; display: block">
				    
					<h2>CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ TIẾP THỊ BMN</h2>
					
					<p><strong><?php echo $this->_tpl_vars['_office_room']; ?>
:</strong> 444/4 Cách Mạng Tháng 8, Phường 11, Quận 3, TP.HCM, &nbsp;&nbsp;<strong>GPĐK:</strong> 0311181221 - Cấp ngày 23-09-2011 </p>
					<p>
					  <strong>
					    <?php echo $this->_tpl_vars['_vpgd']; ?>
:
					  </strong>
					  Block B R.606 - Indochina Park Tower, 04 Nguyễn Đình Chiểu, Quận 1, TP.HCM, &nbsp;&nbsp;
					  <strong>ĐT:</strong> (84) 08.3846 1716&nbsp;&nbsp;
					  <strong>Hotline:</strong> 0903.07.1122, &nbsp;&nbsp;<strong>Email:</strong> <a href="mailto:contact@marketonline.vn">contact@marketonline.vn</a>
					</p>
					

				    </div>
    
    
    </div>


  </section>
    </div>
  
  
  
  
  
  
  
  
  
  <a href="#" id="linkTop" class="backtotop">
  <span></span>
</a>
  
  
  

<?php echo '
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');
  
  ga(\'create\', \'UA-42562780-1\', \'marketonline.vn\');
  ga(\'send\', \'pageview\');

  
  
$(document).ready(function() {
  $(\'#SearchList select\').each(function( index ) {
		  //alert($(this).children().length);
		     if($(this).children().length == 1)
		     {
		       $(this).addClass(\'lock\');
		     }
		     else
		     {
		      $(this).removeClass(\'lock\');
		     }
		 });
		 
		 $(\'#SearchList select\').change(function( index ) {
                        $(\'#SearchList select\').each(function( index ) {
                        //alert($(this).children().length);
                           if($(this).children().length == 1)
                           {
                             $(this).addClass(\'lock\');
                           }
                           else
                           {
                            $(this).removeClass(\'lock\');
                           }
                       });
		 });
		 
		getCart();
		getInbox();
		getTopChat();
		 
		 var ann_count = 0;
		setInterval(function(){getAnnounce(ann_count);getInbox();ann_count++}, 30000);

		//chatbox get new arrival
		//chatboxs
		'; ?>

		    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                        <?php echo '
                            //setInterval(function(){ updateChatbox(); }, 15000);
                            setInterval(function(){ updateChatboxNew(); }, 15000);
                        '; ?>

                        
                        <?php $_from = $this->_tpl_vars['chatboxs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                            <?php if ($this->_tpl_vars['item']['userid'] != '' && $this->_tpl_vars['item']['userid'] != 0 && $this->_tpl_vars['item']['typeid'] != ''): ?>
                                //getChatbox(<?php echo $this->_tpl_vars['item']['userid']; ?>
, true, <?php echo $this->_tpl_vars['item']['typeid']; ?>
);			    
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                        
                        <?php $_from = $this->_tpl_vars['chatboxsnew']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                            <?php if ($this->_tpl_vars['item'] != ''): ?>
                                getChatboxNew("<?php echo $this->_tpl_vars['item']; ?>
", true);
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
		    <?php endif; ?>		
		<?php echo '
	});
  
</script>

<script type=\'text/javascript\'>
/* <![CDATA[ */
var woocommerce_params = {"countries":"{\\"AU\\":{\\"ACT\\":\\"Australian Capital Territory\\",\\"NSW\\":\\"New South Wales\\",\\"NT\\":\\"Northern Territory\\",\\"QLD\\":\\"Queensland\\",\\"SA\\":\\"South Australia\\",\\"TAS\\":\\"Tasmania\\",\\"VIC\\":\\"Victoria\\",\\"WA\\":\\"Western Australia\\"},\\"AF\\":[],\\"AT\\":[],\\"BE\\":[],\\"BI\\":[],\\"BR\\":{\\"AM\\":\\"Amazonas\\",\\"AC\\":\\"Acre\\",\\"AL\\":\\"Alagoas\\",\\"AP\\":\\"Amap\\u00e1\\",\\"CE\\":\\"Cear\\u00e1\\",\\"DF\\":\\"Distrito Federal\\",\\"ES\\":\\"Esp\\u00edrito Santo\\",\\"MA\\":\\"Maranh\\u00e3o\\",\\"PR\\":\\"Paran\\u00e1\\",\\"PE\\":\\"Pernambuco\\",\\"PI\\":\\"Piau\\u00ed\\",\\"RN\\":\\"Rio Grande do Norte\\",\\"RS\\":\\"Rio Grande do Sul\\",\\"RO\\":\\"Rond\\u00f4nia\\",\\"RR\\":\\"Roraima\\",\\"SC\\":\\"Santa Catarina\\",\\"SE\\":\\"Sergipe\\",\\"TO\\":\\"Tocantins\\",\\"PA\\":\\"Par\\u00e1\\",\\"BH\\":\\"Bahia\\",\\"GO\\":\\"Goi\\u00e1s\\",\\"MT\\":\\"Mato Grosso\\",\\"MS\\":\\"Mato Grosso do Sul\\",\\"RJ\\":\\"Rio de Janeiro\\",\\"SP\\":\\"S\\u00e3o Paulo\\",\\"MG\\":\\"Minas Gerais\\",\\"PB\\":\\"Para\\u00edba\\"},\\"CA\\":{\\"AB\\":\\"Alberta\\",\\"BC\\":\\"British Columbia\\",\\"MB\\":\\"Manitoba\\",\\"NB\\":\\"New Brunswick\\",\\"NF\\":\\"Newfoundland\\",\\"NT\\":\\"Northwest Territories\\",\\"NS\\":\\"Nova Scotia\\",\\"NU\\":\\"Nunavut\\",\\"ON\\":\\"Ontario\\",\\"PE\\":\\"Prince Edward Island\\",\\"QC\\":\\"Quebec\\",\\"SK\\":\\"Saskatchewan\\",\\"YT\\":\\"Yukon Territory\\"},\\"CZ\\":[],\\"DE\\":[],\\"DK\\":[],\\"FI\\":[],\\"FR\\":[],\\"HK\\":{\\"HONG KONG\\":\\"Hong Kong Island\\",\\"KOWLOON\\":\\"Kowloon\\",\\"NEW TERRITORIES\\":\\"New Territories\\"},\\"HU\\":[],\\"IS\\":[],\\"IL\\":[],\\"NL\\":{\\"DR\\":\\"Drenthe\\",\\"FL\\":\\"Flevoland\\",\\"FR\\":\\"Friesland\\",\\"GLD\\":\\"Gelderland\\",\\"GRN\\":\\"Groningen\\",\\"LB\\":\\"Limburg\\",\\"NB\\":\\"Noord-Brabant\\",\\"NH\\":\\"Noord-Holland\\",\\"OV\\":\\"Overijssel\\",\\"UT\\":\\"Utrecht\\",\\"ZLD\\":\\"Zeeland\\",\\"ZH\\":\\"Zuid-Holland\\"},\\"NZ\\":{\\"NL\\":\\"Northland\\",\\"AK\\":\\"Auckland\\",\\"WA\\":\\"Waikato\\",\\"BP\\":\\"Bay of Plenty\\",\\"TK\\":\\"Taranaki\\",\\"HB\\":\\"Hawke\\u2019s Bay\\",\\"MW\\":\\"Manawatu-Wanganui\\",\\"WE\\":\\"Wellington\\",\\"NS\\":\\"Nelson\\",\\"MB\\":\\"Marlborough\\",\\"TM\\":\\"Tasman\\",\\"WC\\":\\"West Coast\\",\\"CT\\":\\"Canterbury\\",\\"OT\\":\\"Otago\\",\\"SL\\":\\"Southland\\"},\\"NO\\":[],\\"PL\\":[],\\"SG\\":[],\\"SK\\":[],\\"SI\\":[],\\"LK\\":[],\\"SE\\":[],\\"US\\":{\\"AL\\":\\"Alabama\\",\\"AK\\":\\"Alaska\\",\\"AZ\\":\\"Arizona\\",\\"AR\\":\\"Arkansas\\",\\"CA\\":\\"California\\",\\"CO\\":\\"Colorado\\",\\"CT\\":\\"Connecticut\\",\\"DE\\":\\"Delaware\\",\\"DC\\":\\"District Of Columbia\\",\\"FL\\":\\"Florida\\",\\"GA\\":\\"Georgia\\",\\"HI\\":\\"Hawaii\\",\\"ID\\":\\"Idaho\\",\\"IL\\":\\"Illinois\\",\\"IN\\":\\"Indiana\\",\\"IA\\":\\"Iowa\\",\\"KS\\":\\"Kansas\\",\\"KY\\":\\"Kentucky\\",\\"LA\\":\\"Louisiana\\",\\"ME\\":\\"Maine\\",\\"MD\\":\\"Maryland\\",\\"MA\\":\\"Massachusetts\\",\\"MI\\":\\"Michigan\\",\\"MN\\":\\"Minnesota\\",\\"MS\\":\\"Mississippi\\",\\"MO\\":\\"Missouri\\",\\"MT\\":\\"Montana\\",\\"NE\\":\\"Nebraska\\",\\"NV\\":\\"Nevada\\",\\"NH\\":\\"New Hampshire\\",\\"NJ\\":\\"New Jersey\\",\\"NM\\":\\"New Mexico\\",\\"NY\\":\\"New York\\",\\"NC\\":\\"North Carolina\\",\\"ND\\":\\"North Dakota\\",\\"OH\\":\\"Ohio\\",\\"OK\\":\\"Oklahoma\\",\\"OR\\":\\"Oregon\\",\\"PA\\":\\"Pennsylvania\\",\\"RI\\":\\"Rhode Island\\",\\"SC\\":\\"South Carolina\\",\\"SD\\":\\"South Dakota\\",\\"TN\\":\\"Tennessee\\",\\"TX\\":\\"Texas\\",\\"UT\\":\\"Utah\\",\\"VT\\":\\"Vermont\\",\\"VA\\":\\"Virginia\\",\\"WA\\":\\"Washington\\",\\"WV\\":\\"West Virginia\\",\\"WI\\":\\"Wisconsin\\",\\"WY\\":\\"Wyoming\\"},\\"USAF\\":{\\"AA\\":\\"Americas\\",\\"AE\\":\\"Europe\\",\\"AP\\":\\"Pacific\\"},\\"VN\\":[]}","select_state_text":"Select an option\\u2026","plugin_url":"http:\\/\\/theme.crumina.net\\/onetouch\\/wp-content\\/plugins\\/woocommerce","ajax_url":"\\/\\/theme.crumina.net\\/onetouch\\/wp-admin\\/admin-ajax.php","ajax_loader_url":"http:\\/\\/theme.crumina.net\\/onetouch\\/wp-content\\/plugins\\/woocommerce\\/assets\\/images\\/ajax-loader.gif","required_rating_text":"Please select a rating","review_rating_required":"yes","required_text":"required","update_order_review_nonce":"35909e9c67","apply_coupon_nonce":"e8ecef4615","option_guest_checkout":"yes","checkout_url":"\\/\\/theme.crumina.net\\/onetouch\\/wp-admin\\/admin-ajax.php?action=woocommerce-checkout","is_checkout":"0","update_shipping_method_nonce":"e4b92a7b2a","add_to_cart_nonce":"273543cc89"};
/* ]]> */
</script>

<script type="text/javascript">
var addthis_config = addthis_config||{};
addthis_config.data_track_addressbar = false;
addthis_config.data_track_clickback = false;
</script>

'; ?>


<noscript><div><img src="//mc.yandex.ru/watch/19443550" style="position:absolute; left:-9999px;" alt="" /></div></noscript>


<!--<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/farbtastic.css?ver=1.3u1">-->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/custom_style.css">
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/aqpb-view.js?ver=1364883969'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/add-to-cart.min.js?ver=1.6.6'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery-plugins.min.js?ver=1.6.6'></script>

<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/woocommerce.min.js?ver=1.6.6'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.ui.core.min.js?ver=1.9.2'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.ui.widget.min.js?ver=1.9.2'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.ui.tabs.min.js?ver=1.9.2'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery-ui-tabs-rotate.js?ver=3.4.12'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/js_composer_front.js?ver=3.4.12'></script>
<!--<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.isotope.min.js?ver=3.4.12'></script>-->
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/metro-list.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.nicescroll.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.colorbox.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jflickrfeed.min.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/site.js'></script>
<!--<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/farbtastic.js'></script>-->
<!--<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/custom_style.js'></script>-->
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/scrolling.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/gmap3.min.js?ver%5B0%5D=jquery'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.validate.min.js?ver%5B0%5D=jquery'></script>

<?php echo '
     <script>
	    $(document).ready(function() {
	      
	      if ($.browser.msie && parseFloat($.browser.version) <= 10 || parseFloat($.browser.version) == 11) {
		//cookie
				 var date = new Date();
				 var minutes = 60;
				 date.setTime(date.getTime() + (minutes * 60 * 1000));
				$.cookie.settings = {
				    path : "/",
				    expires : date
				};
				 
				//$.cookie("welcome", "cookie_value");
				//$.cookie("cookie_name2", "cookie_value2");
				//alert($.cookie("welcome"));
				if (typeof($.cookie("browserx")) == \'undefined\') {
				 //code
				 $.cookie("browserx", true);
				 $("#browser-info-but").trigger(\'click\');
				}
	      }
	    });
    </script>
     '; ?>



<h1 style="display: none">MarketOnline.vn - Thị trường Mua Bán, Phân phối, Việc làm, Đầu tư, Học và Làm</h1>

</body>
</html>