<?php
class Offer extends PbController {
	var $name = "Offer";
	
	function index()
	{
		render("offer/index");
	}
	
	function detail()
	{
		global $viewhelper, $G, $pb_user;
		$positions = $titles = array();
		uses("trade","member","company","tradefield","form","industry","area","meta");
		$offer = new Tradefields();
		$area = new Areas();
		$meta = new Metas();
		$industry = new Industries();
		$company = new Companies();
		$trade = new Trade();
		$trade_model = new Trades();
		$member = new Members();
		//$typeoption = new Typeoption();
		$form = new Forms();
		setvar("Genders", cache_read("typeoption", 'gender'));
		setvar("PhoneTypes", cache_read("typeoption", 'phone_type'));
		$viewhelper->setTitle(L("offer", "tpl"));
		$viewhelper->setPosition(L("offer", "tpl"), "index.php?do=offer");
		if (isset($_GET['title'])) {
			$title = rawurldecode(trim($_GET['title']));
			$res = $trade_model->findByTitle($title);
			$id = $res['id'];
		}
		if (isset($_GET['id'])) {
			$id = intval($_GET['id']);
		}
		if(!empty($id)){
			$trade->setInfoById($id);
			$info = $trade->info;
			if (empty($info['id'])) {
				flash("data_not_exists", '', 0);
			}
			$info['title_clear'] = $info['title'];
			$info['title'].=(($G['offer_expire_method']==1||$G['offer_expire_method']==3) && $info['expdate']<$offer->timestamp)?"[".L("has_expired", "tpl")."]":'';
			$info['title'].=(!empty($info['if_urgent']))?"[".L("urgent_buy", "tpl")."]":'';
			if ($info['expdate']<$offer->timestamp && $G['offer_expire_method']==2) {
				flash("has_been_expired", URL, 0, $info['title']);
			}
		}else{
			flash("data_not_exists", '', 0);
		}
		if ($info['status']!=1) {
			flash("under_checking", null, 0, $info['title']);
		}
		$trade_types = $trade->getTradeTypes();
		$viewhelper->setTitle($trade_types[$info['type_id']]);
		$viewhelper->setPosition($trade_types[$info['type_id']], "index.php?do=offer&action=lists&typeid=".$info['type_id']);
		$trade_model->clicked($id);
		if ($info['require_point']>0) {
			//check member points
			if (empty($pb_user)) {
				flash("please_login_first", URL."logging.php");
			}
			$point = $member->field("points", "id='".$pb_user['pb_userid']."'");
			if ($point<$info['require_point']) {
				flash("not_enough_points", URL, 0, $info['require_point']);
			}
		}
		if (isset($info['formattribute_ids'])) {
			$form_vars = $form->getAttributes(explode(",", $info['formattribute_ids']));
			setvar("ObjectParams", $form_vars);
		}
		$info['pubdate'] = df($info['pubdate']);
		$info['expdate'] = df($info['expdate']);
		$info['image'] = pb_get_attachmenturl($info['picture']);
		$login_check = 1;
		if ($info['type_id']==1) {
			$login_check = $G['buy_logincheck'];
		}elseif ($info['type_id']==2){
			$login_check = $G['sell_logincheck'];
		}
		if (!empty($info['member_id'])) {
			$member_info = $member->getInfoById($info['member_id']);
			$info['link_people'] = $member_info['last_name'];
			$info['space_name'] = $member_info['space_name'];
			$info['tel'] = $member_info['tel'];
			$info['address'] = $member_info['address'];
			$info['zipcode'] = $member_info['zipcode'];
			$info['fax'] = $member_info['fax'];
			$info['site_url'] = $member_info['site_url'];
			setvar("MEMBER", $member_info);
		}
		if (!empty($info['company_id'])) {
			$company_info = $company->getInfoById($info['company_id']);
			$info['companyname'] = $company_info['name'];
			$info['link_people'] = $company_info['link_man'];
			$info['address'] = $company_info['address'];
			$info['zipcode'] = $company_info['zipcode'];
			$info['site_url'] = pb_hidestr($company_info['site_url']);
			$info['tel'] = pb_hidestr($company_info['tel']);
			$info['fax'] = pb_hidestr($company_info['fax']);
			setvar("COMPANY", $company_info);
		}
		setvar("LoginCheck", $login_check);
		$info['title'] = strip_tags($info['title']);
		$info['industry_names'] = $industry->disSubNames($info['industry_id'], null, true, "offer");
		$info['area_names'] = $area->disSubNames($info['area_id'], null, true, "offer");
		//delete the pre num.2011.9.1
//		$info['tel'] = preg_replace('/\((.+?)\)/i', '', pb_hidestr($info['tel']));
//		$info['fax'] = preg_replace('/\((.+?)\)/i', '', pb_hidestr($info['fax']));
		$info = pb_lang_split_recursive($info);
		setvar("item",$info);
		$meta_info = $meta->getSEOById($id, 'trade', false);
		empty($meta_info['title'])?$viewhelper->setTitle($info['title'], $info['picture']):$viewhelper->setTitle($meta_info['title']);
		empty($meta_info['description'])?$viewhelper->setMetaDescription($info['content']):$viewhelper->setMetaDescription($meta_info['description']);
		$viewhelper->setPosition($info['title_clear']);
		$viewhelper->setMetaKeyword($meta_info['keyword']);
		setvar("forward", $this->url(array("module"=>"offer", "id"=>$id)));
		render("offer/detail");
	}
	
	function post()
	{
		global $G, $smarty, $viewhelper;
		require(LIB_PATH. "validation.class.php");
		$validate = new Validation();
		if (session_id() == '' ) { 
			require_once(LIB_PATH. "session_php.class.php");
			$session = new PbSessions();
		}
		uses("trade","member","tradefield","tag");
		$tag = new Tags();
		$offer = new Tradefields();
		$member = new Members();
		$trade = new Trades();
		$expires = cache_read("typeoption", "offer_expire");
		setvar("Genders", cache_read("typeoption", "gender", 1, array("0", "-1")));
		setvar("PhoneTypes", cache_read("typeoption", "phone_type"));
		setvar("ImTypes", cache_read("typeoption", "im_type"));
		$if_visit_post = $G['vis_post'];
		if(!$if_visit_post){
			$smarty->flash('visitor_forbid', URL, 0);
		}
		//for temp upgrade.
		if (!file_exists(CACHE_LANG_PATH. "locale.js")) {
			require(LIB_PATH. "cache.class.php");
			$cache = new Caches();
			$cache->updateLanguages();
			$cache->writeCache("javascript", "javascript");
		}
		$trade_types = $trade->GetArray("SELECT * FROM ".$trade->table_prefix."tradetypes");
		foreach ($trade_types as $key=>$val){
			if($val['parent_id']==0){
				$set_types[$val['id']] = pb_lang_split_recursive($val);
				foreach ($trade_types as $key1=>$val1){
					if ($val1['parent_id']==$val['id']){
						$set_types[$val['id']]['child'][$val1['id']] = pb_lang_split_recursive($val1);
					}
				}
			}
		}
		if (isset($_GET['typeid'])) {
			setvar("type_id", intval($_GET['typeid']));
		}
		if (isset($_GET['industryid'])) {
			setvar("industry_id", intval($_GET['industryid']));
		}
		if (isset($_GET['areaid'])) {
			setvar("area_id", intval($_GET['areaid']));
		}
		setvar("select_tradetypes", $set_types);
		$viewhelper->setPosition(L("free_release_offer", "tpl"));
		setvar("OfferExpires", $expires);
		setvar("sid",md5(uniqid($offer->timestamp)));
		capt_check("capt_post_free");
		render("offer/post");		
	}
	
	function add()
	{
		global $G, $smarty;
		require(LIB_PATH. "validation.class.php");
		$validate = new Validation();
		uses("trade","member","tradefield","tag");
		$tag = new Tags();
		$offer = $tradefield = new Tradefields();
		$member = new Members();
		$trade = new Trades();
		if (isset($_POST['visit_post'])) {
			capt_check("capt_post_free");
			pb_submit_check('visit_post');
			$_POST['data']['trade']['title'] = pb_lang_merge($_POST['data']['multi']);
			$trade->setParams();
			$tradefield->setParams();
			$if_title_exists = $trade->findByTitle($trade->params['data']['trade']['title']);
			if (!empty($if_title_exists)) {
				$trade->validationErrors[] = L("semilar_offer_post");
			}
			if (!$validate->notEmpty($trade->params['data']['trade']['title'])) {
				$trade->validationErrors[] = L("title_cant_be_empty");
			}
			$trade->params['expire_days'] = $_POST['expire_days'];
			$if_check = $G['vis_post_check'];
			$msg = null;
			$words = $trade->dbstuff->GetArray("SELECT * FROM {$trade->table_prefix}words");
			if (!empty($words)) {
				foreach ($words as $word_val) {
					if(!empty($word_val['title'])){
						str_replace($word_val['title'], "***", $trade->params['data']['trade']['title']);
						str_replace($word_val['title'], "***", $trade->params['data']['trade']['content']);
					}
				}
				$item['forbid_word'] = implode("\r\n", $tmp_str);
			}
			if ($if_check) {
				$trade->params['data']['trade']['status'] = 0;
				$msg = 'pls_wait_for_check';
			}else{
				$trade->params['data']['trade']['status'] = 1;
				$msg = 'success';
			}
			if (!empty($trade->validationErrors)) {
				setvar("item", am($trade->params['data']['trade'], $tradefield->params['data']['tradefield']));
				setvar("Errors", $validate->show($trade));
			}else{
				$trade->params['data']['trade']['industry_id'] = PbController::getMultiId($_POST['industry']['id']);
				$trade->params['data']['trade']['area_id'] = PbController::getMultiId($_POST['area']['id']);
				$result = $trade->Add();
				if ($result) {
					$smarty->flash($msg, $this->url(array("module"=>"offer", "id"=>$trade->{$trade->table_name."_id"})));
				}else{
					$smarty->flash();
				}
			}
		}
	}
	
	function buy()
	{
		
	}
	
	function sell()
	{
		
	}
	
	/**
	 * search
	 * @list
	 */
	function lists()
	{
		global $G, $viewhelper, $smarty, $limit, $pos;
		uses("trade","industry","area","tradefield","form","tag");
		$trusttypes = cache_read("trusttype");
		$countries = cache_read("country");
		$membergroups = cache_read("membergroup");
		$area = new Areas();
		$offer = new Tradefields();
		$trade = new Trades();
		$form = new Forms();
		$industry = new Industries();
		$tag = new Tags();
		$conditions = array();
		$industry_id = $area_id = 0;
		$conditions[]= "t.status=1";
		!empty($_GET) && $_GET = clear_html($_GET);
		if (isset($_GET['navid'])) {
			setvar("nav_id", intval($_GET['navid']));
		}
		$viewhelper->setTitle(L('offer', 'tpl'));
		$viewhelper->setPosition(L('offer', 'tpl'), "index.php?do=offer");
		$trade_types = cache_read("type", "offertype");
		if (isset($_GET['typeid'])) {
			$type_id = intval($_GET['typeid']);
			$conditions[]= "t.type_id='".$type_id."'";
			setvar("typeid", $type_id);
			$type_name = $trade_types[$type_id];
			$viewhelper->setTitle($type_name);
			$viewhelper->setPosition($type_name, "index.php?do=offer&action=lists&typeid=".$type_id);
		}
		if (isset($_GET['industryid'])) {
			$industry_id = intval($_GET['industryid']);
			$tmp_info = $industry->setInfo($industry_id);
			if (!empty($tmp_info)) {
				$sub_ids = $industry->getSubDatas($tmp_info['id']);
				$sub_ids = array_keys($sub_ids);
				$conditions[] = "t.industry_id IN (".implode(",", $sub_ids).")";
				$viewhelper->setTitle($tmp_info['name']);
				$viewhelper->setPosition($tmp_info['name'], "index.php?do=offer&action=lists&industryid=".$tmp_info['id']);
			}
		}
		if (isset($_GET['areaid'])) {
			$area_id = intval($_GET['areaid']);
			$tmp_info = $area->setInfo($area_id);
			if (!empty($tmp_info)) {
				$sub_ids = $area->getSubDatas($tmp_info['id']);
				$sub_ids = array_keys($sub_ids);
				$conditions[] = "t.area_id IN (".implode(",", $sub_ids).")";
				$viewhelper->setTitle($tmp_info['name']);
				$viewhelper->setPosition($tmp_info['name'], "index.php?do=offer&action=lists&areaid=".$tmp_info['id']);
			}
		}
		if (isset($_GET['type'])) {
			if($_GET['type']=="urgent"){
				$conditions[]="t.if_urgent='1'";
			}
		}
		if (!empty($_GET['price_start']) || !empty($_GET['price_end'])) {
			$conditions[] = "t.price BETWEEN ".intval($_GET['price_start'])." AND ".intval($_GET['price_end']);
		}
		if (!empty($_GET['picture'])) {
			$conditions[] = "t.picture!=''";
		}
		if (!empty($_GET['urgent'])) {
			$conditions[] = "t.if_urgent=1";
		}
		if (!empty($_GET['commend'])) {
			$conditions[] = "t.if_commend=1";
		}
		if (!empty($_GET['country'])) {
			$conditions[] = "t.country_id='".intval($_GET['country'])."'";
		}
		if (!empty($_GET['sure'])) {
			$conditions[] = "m.trusttype_ids='".intval($_GET['sure'])."'";
		}
		if (!empty($_GET['date'])) {
			$d = intval($_GET['date']);
			if ($d<=7948800) {
				$conditions[] = "t.submit_time<='".intval($_GET['date'])."'";
			}
		}
		if (isset($_GET['q'])) {
			$searchkeywords = urldecode($_GET['q']);
			$viewhelper->setTitle(L("search_in_keyword", "tpl", $searchkeywords));
			$viewhelper->setPosition(L("search_in_keyword", "tpl", $searchkeywords));
			$conditions[]= "t.title like '%".$searchkeywords."%'";
			setvar("highlight_str", $searchkeywords);
		}
		if (isset($_GET['pubdate'])) {
			switch ($_GET['pubdate']) {
				case "l3":
					$conditions[] = "t.submit_time>".($offer->timestamp-3*86400);
					break;
				case "l10":
					$conditions[] = "t.submit_time>".($offer->timestamp-10*86400);
					break;
				case "l30":
					$conditions[] = "t.submit_time>".($offer->timestamp-30*86400);
					break;
				default:
					break;
			}
		}
		if ($G['offer_expire_method']==2 || $G['offer_expire_method']==3) {
			$conditions[] = "t.expire_time>".$offer->timestamp;
		}
		$amount = $trade->findCount(null, $conditions, null, "t");
		$result = $trade->getRenderDatas($conditions, $G['offer_filter']);
		$important_result = $trade->getStickyDatas();
		if (!empty($important_result)) {
			setvar("StickyItems", $important_result);
		}
		setvar('items', $result);
		setvar('trusttype', $trusttypes);
		setvar('country', $countries);
		setvar("paging", array('total'=>$amount));
		render("list.trade");
	}
	
	function wholesale()
	{
		render("offer/".__FUNCTION__, true);
	}
	
	function invest()
	{
		render("offer/".__FUNCTION__, true);
	}
	
	function importProduct()
	{
		$this->render("product/importProduct");
	}
	
	function importProductAjax()
	{
		//echo "dsfsdfd";
		//echo $this->findAreaID("Hồ Chí Minh");
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		$query = "SELECT * FROM `pb_industries` WHERE level=3 AND id='".$_GET["id"]."'";                    
		
		//if ($result = $con->query($query)) {
		//	echo "sdfsdf";
		//	while($row = $result->fetch_assoc())
		//	{
		//		var_dump($row);
		//	}
		//}
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = "http://chodientu.vn/" . $row["tempurl"]."?viewMode=3";
		//echo $row["parent_id"];
		$content = file_get_contents($url);
		$content = preg_replace('/^\s+|\n|\r|\s+$/m', '', $content);
		//echo $content;
		
		preg_match_all('/\<li(.*?)class\=\"preview\-prd\"(.*?)\<a(.*?)href\=\"(.*?)\"(.*?)\<img(.*?)src\=\"(.*?)\"(.*?)\<p(.*?)class\=\"browse-price\"(.*?)\>(.*?)\<\/p(.*?)\<p(.*?)class\=\"Shopadr\"(.*?)\>(.*?)\<\/p(.*?)\<h4(.*?)\<a(.*?)\>(.*?)\<\/a/', $content, $matches);

		//var_dump($matches);
		echo $row["name"]."-".count($matches[15]);
		foreach($matches[15] as $kk => $item)
		{
			if($kk < 10)
			{
				//echo $item."<br />";
				//link
				//echo $matches[4][$kk]."<br />";
				
				//image
				//echo $matches[7][$kk]."<br />";
				
				//price
				$matches[11][$kk] = explode(' ', $matches[11][$kk]);
				$matches[11][$kk] = str_replace('.', '',  $matches[11][$kk][0]);
				if(!is_numeric($matches[11][$kk])) $matches[11][$kk] = "";
				//echo $matches[11][$kk]."<br />";
				
				//city
				$matches[15][$kk] = $this->findAreaID($matches[15][$kk]);
				//echo $matches[15][$kk]."<br />";
				
				//product name
				//echo $matches[19][$kk]."<br /><br />";
				//$item = mb_convert_encoding($item, "ASCII");
				//echo $item."-".$this->findAreaID($item)."<br />";
				mysqli_query($con,"INSERT INTO `pb_products` ( `member_id`, `company_id`, `cache_companyname`, `sort_id`, `brand_id`, `category_id`, `industry_id`, `country_id`, `area_id`, `name`, `price`, `sn`, `spec`, `produce_area`, `packing_content`, `picture`, `content`, `producttype_id`, `status`, `state`, `ifnew`, `ifcommend`, `priority`, `tag_ids`, `clicked`, `formattribute_ids`, `created`, `modified`, `picture1`, `picture2`, `picture3`, `picture4`, `tempurl`) VALUES"
										."(1, 1, 'Ualink E-Commerce', 1, 0, 0, ".$row["id"].", 1, ".$matches[15][$kk].", '".$matches[19][$kk]."', ".$matches[11][$kk].", '', '', '', '', '".$matches[7][$kk]."', '', 0, 1, 1, 0, 0, 0, '4', 69, '1,2,3,4,5,6,7', ".strtotime(date("Y-m-d H:i:s")).", ".strtotime(date("Y-m-d H:i:s")).", NULL, NULL, NULL, NULL, '".$matches[4][$kk]."')");
			}
		}
		
	}
	
	function findAreaID($name)
	{
		
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		$query = "SELECT * FROM `pb_areas` WHERE name LIKE '%".$name."%' AND level=2";                    
		
		//if ($result = $con->query($query)) {
		//	echo "sdfsdf";
		//	while($row = $result->fetch_assoc())
		//	{
		//		var_dump($row);
		//	}
		//}
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		//var_dump($row);
		if(isset($row["name"])) return $row["id"]; else return "";
	}
	
	function inportProductDetailAjax()
	{
		//echo "dsfsdfd";
		//echo $this->findAreaID("Hồ Chí Minh");
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		$query = "SELECT * FROM `pb_products` WHERE id='".$_GET["id"]."'";                    
		
		//if ($result = $con->query($query)) {
		//	echo "sdfsdf";
		//	while($row = $result->fetch_assoc())
		//	{
		//		var_dump($row);
		//	}
		//}
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = $row["tempurl"];
		//echo $row["parent_id"];
		$content = file_get_contents(strip_tags($url));
		
		$content = preg_replace('/^\s+|\n|\r|\s+$/m', '', $content);
		//echo $url;
		//echo $content;
		preg_match_all('/defaultInfoContent(.*?)productInfoBlock(.*?)\>(.*?)\<\/div\>\<\/div\>\<a name\=\"tab1_scroll_lnk_2\"/', $content, $matchec);
		preg_match_all('/thumbImgList(.*?)\<\/ul/', $content, $matches);
		preg_match_all('/\<li(.*?)\<a(.*?)href\=\"(.*?)\"/', $matches[1][0], $matches);
		
		//var_dump($matchec[3][0]);
		
		//tinh trang
		preg_match('/\<div(.*?)labelPrice(.*?)Tình trạng(.*?)\<div(.*?)setPrice(.*?)\>(.*?)\<\/div/', $content, $matches_tt);
		
		//xuat xu
		preg_match('/\<div(.*?)labelPrice(.*?)Xuất xứ(.*?)\<div(.*?)setPrice(.*?)\>(.*?)\<s(.*?)\>(.*?)\<\/s/', $content, $matches_xx);
		
		//thuong hieu
		preg_match('/\<div(.*?)labelPrice(.*?)Thương hiệu(.*?)\<div(.*?)setPrice(.*?)\>(.*?)\<a(.*?)\>(.*?)\<\/a/', $content, $matches_th);
		
		//so luong
		preg_match('/id\=\"max_item(.*?)\>\/(.*?) sản(.*?)\<\/span/', $content, $matches_sl);
		
		//model
		preg_match('/\>Model(.*?)class\=\"modelPro(.*?)\>(.*?)\<\/a/', $content, $matches_model);
		
		//thoi gian ban
		preg_match('/\<div(.*?)labelPrice(.*?)Thời gian bán(.*?)\<div(.*?)setPrice(.*?)\>(.*?)\<br\>(.*?)\<\/div/', $content, $matches_tgb);
		
		//gia goc
		preg_match('/grayClrOld(.*?)\>(.*?)\<\/span/', $content, $matches_gg);
		
		//var_dump($matchec[3][0]);
		//var_dump($matches[3]);
		//var_dump($matchec);
		
		$matchec[3][0] = strip_tags($matchec[3][0], '<p><a><table><tr><td><img><strong><span><em><br><h1><h2><h3><h4><h5>');		
		
		//var_dump($matches_tt[6]);
		//var_dump(strip_tags($matches_xx[8]));
		//var_dump($matches_th[8]);
		//var_dump($matches_sl[2]);
		//var_dump($matches_model[3]);
		//var_dump($matches_tgb[6]);
		//var_dump($matches_tgb[7]);
		//var_dump($matches_gg[2]);
		
		echo $row["name"];
		echo "<br>".$url;
		
		if(isset($matchec[3][0]))
		{
			//echo "kokokoko 123";
			//echo "UPDATE `pb_products` SET `content`='".mysql_real_escape_string($matchec[3][0])."' WHERE id=".$row["id"];
			mysqli_query($con, "UPDATE `pb_products` SET `content`='".mysql_real_escape_string($matchec[3][0])."' WHERE id=".$row["id"]);
		}
		
		if(isset($matches[3]))
		{
			foreach($matches[3] as $kk => $item)
			{
				if($kk < 5)
				{
					$index = "";
					if($kk > 0) $index = $kk;
					mysqli_query($con, "UPDATE `pb_products` SET `picture".$index."`='".$item."' WHERE id=".$row["id"]);
				}
			}
		}
		
		$att_a = array();
		//tinh trang
		if(isset($matches_tt[6]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			//echo $idc;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 7, ".$row["id"].", '".$matches_tt[6]."')");
			
			$att_a[] = $idc;
		}
		
		////xuat xu
		if(isset($matches_xx[8]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 6, ".$row["id"].", '".$matches_xx[8]."')");
			
			$att_a[] = $idc;
		}
		
		////so luong
		if(isset($matches_sl[2]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 1, ".$row["id"].", '".$matches_sl[2]."')");
			
			$att_a[] = $idc;
		}
		
		////model
		if(isset($matches_model[3]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 5, ".$row["id"].", '".$matches_model[3]."')");
			
			$att_a[] = $idc;
		}
		
		////thoi gian ban bat dau
		if(isset($matches_tgb[6]) && !preg_match('/Không giới hạn/', $matches_tgb[6]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 8, ".$row["id"].", '".$matches_tgb[6]."')");
			
			$att_a[] = $idc;
		}
		
		////thoi gian ban bat dau
		if(isset($matches_tgb[7]) && !preg_match('/Không giới hạn/', $matches_tgb[6]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 9, ".$row["id"].", '".$matches_tgb[7]."')");
			
			$att_a[] = $idc;
		}
		
		////gia goc
		if(isset($matches_gg[2]) && !preg_match('/\{price/', $matches_gg[2]))
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 4, ".$row["id"].", '".$matches_gg[2]."')");
			
			$att_a[] = $idc;
		}
		
		//var_dump($att_a);
		
		if(count($att_a))
		{
			mysqli_query($con, "UPDATE `pb_products` SET `formattribute_ids`='".implode(',', $att_a)."' WHERE id=".$row["id"]);
		}
		
		//brand
		//find brand
		if(isset($matches_th[8]))
		{
			$result = $con->query("SELECT id FROM pb_brands WHERE name='".$matches_th[8]."'");
			$throw = $result->fetch_assoc();
			//var_dump($throw);
			$bdc = $throw["id"];
			if($bdc)
			{
				echo "kokokokokokoko";
			}
			else
			{
				$result = $con->query("SELECT MAX(id) FROM pb_brands");
				$arow = $result->fetch_assoc();
				$bdc = $arow["MAX(id)"]+1;
				
				mysqli_query($con, "INSERT INTO `pb_brands` (`id`,`member_id`, `company_id`, `type_id`, `if_commend`, `name`, `alias_name`, `picture`, `description`, `hits`, `ranks`, `letter`, `created`, `modified`) VALUES"
							." (".$bdc.", -1, 0, 4, 1, '".$matches_th[8]."', '".$matches_th[8]."', 'sample/brand/noimage.jpg', '', 1, 0, 'l', ".strtotime(date("Y-m-d H:i:s")).", 0)");			
			}
			echo "-".$matches_th[8];
			mysqli_query($con, "UPDATE `pb_products` SET `brand_id`='".$bdc."' WHERE id=".$row["id"]);
		}
	 
	}
	
	function importProductDetail()
	{
		$this->render("product/importProductDetail");
	}
	
	function importVatgiaProductAjax()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		
		
		$query = "SELECT * FROM `pb_industries` WHERE id='".$_GET["id"]."' AND (level=3 OR level=4)";
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = "http://www.vatgia.com" . $row["tempurl"];
		
		if($url)
		{
			echo "okie";
			$query = "SELECT * FROM `pb_industries` WHERE parent_id='".$_GET["id"]."'";
			$result = $con->query($query);
			$row = $result->fetch_assoc();
			if(!$row["id"])
			{
				echo " ".$url;
				$html = file_get_html($url);
				
				
				
				foreach($html->find('.list_raovat_super_vip .block') as $item) {
					
					if($item->find('img'))
					{
						$item_a = $item->find(".name a", 0);
						$item_price = $item->find(".price", 0);
						$item_pic = $item->find("img", 0);
						//echo $item_price->innertext;
						
						//picture
						//echo $item_pic->src;
						
						//name
						echo trim($item_a->innertext);
						
						//link
						//echo $item_a->href;
						
						//price
							$price = $item_price->innertext;
							$price = explode(' ', $price);
							$price = str_replace('.', '',  $price[0]);
							if(!is_numeric($price)) $price = "";
						//	//echo $price;
						//	
						//	
						//	//mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
						//	//				." (0, 0, NULL, '".trim($item->innertext)."', '', '', 0, ".$_GET["id"].", 3965, 1, 0, NULL, 3, 0, 0, '".$item->href."')");
						//	
							mysqli_query($con,"INSERT INTO `pb_products` ( `member_id`, `company_id`, `cache_companyname`, `sort_id`, `brand_id`, `category_id`, `industry_id`, `country_id`, `area_id`, `name`, `price`, `sn`, `spec`, `produce_area`, `packing_content`, `picture`, `content`, `producttype_id`, `status`, `state`, `ifnew`, `ifcommend`, `priority`, `tag_ids`, `clicked`, `formattribute_ids`, `created`, `modified`, `picture1`, `picture2`, `picture3`, `picture4`, `tempurl`) VALUES"
										."(1, 1, 'Ualink E-Commerce', 1, 0, 0, ".$_GET["id"].", 1, 0, '".trim($item_a->innertext)."', ".$price.", '', '', '', '', '".$item_pic->src."', '', 0, 1, 1, 0, 0, 0, '4', 69, '', ".strtotime(date("Y-m-d H:i:s")).", ".strtotime(date("Y-m-d H:i:s")).", NULL, NULL, NULL, NULL, '".$item_a->href."')");
					}
					
				//	
				//	$item_a = $item->find(".name a", 0);
				//	$item_price = $item->find(".price", 0);
				//	$item_pic = $item->find(".picture img", 0);
				//	echo $item_price->innertext;
				//	
				//	//picture
				//	//echo $item_pic->src;
				//	
				//	//name
				//	//echo trim($item_a->innertext);
				//	
				//	//link
				//	//echo $item_a->href;
				//	
				//	//price
				//	$price = $item_price->innertext;
				//	$price = explode(' ', $price);
				//	$price = str_replace('.', '',  $price[0]);
				//	if(!is_numeric($price)) $price = "";
				//	//echo $price;
				//	
				//	
				//	//mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
				//	//				." (0, 0, NULL, '".trim($item->innertext)."', '', '', 0, ".$_GET["id"].", 3965, 1, 0, NULL, 3, 0, 0, '".$item->href."')");
				//	
				//	mysqli_query($con,"INSERT INTO `pb_products` ( `member_id`, `company_id`, `cache_companyname`, `sort_id`, `brand_id`, `category_id`, `industry_id`, `country_id`, `area_id`, `name`, `price`, `sn`, `spec`, `produce_area`, `packing_content`, `picture`, `content`, `producttype_id`, `status`, `state`, `ifnew`, `ifcommend`, `priority`, `tag_ids`, `clicked`, `formattribute_ids`, `created`, `modified`, `picture1`, `picture2`, `picture3`, `picture4`, `tempurl`) VALUES"
				//				."(1, 1, 'Ualink E-Commerce', 1, 0, 0, ".$_GET["id"].", 1, 0, '".trim($item_a->innertext)."', ".$price.", '', '', '', '', '".$item_pic->src."', '', 0, 1, 1, 0, 0, 0, '4', 69, '', ".strtotime(date("Y-m-d H:i:s")).", ".strtotime(date("Y-m-d H:i:s")).", NULL, NULL, NULL, NULL, '".$item_a->href."')");
				}
			}
			else
			{
				echo " not okie";
			}
		}
		else
		{
			echo "not okie";
		}
		echo "<br />";
	}
	
	function importVatgiaProduct()
	{
		$this->render("product/importVatgiaProduct");
	}
	
	function importVatgiaProductDetailAjax()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		
		
		$query = "SELECT * FROM `pb_products` WHERE id='".$_GET["id"]."'";
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = "http://www.vatgia.com" . $row["tempurl"];
		
		if($url)
		{
			echo "okie ".$url."<br />";
			$html = file_get_html($url);
			
			$image = $html->find('#raovat_main_photo a', 0);
			$images[0] = "http://www.vatgia.com" . $image->href;
			echo $images[0];
			
			$content = $html->find('.raovat_description', 0);
			$contents = $content->innertext;
			//echo $contents;
			
			
			$item_price = $html->find('.raovat_information .price', 0);
			//echo $price->innertext;
			$price = $item_price->innertext;
			$price = explode(' ', $price);
			//var_dump($price);
			$price = str_replace('.', '',  $price[1]);
			if(!is_numeric($price)) $price = "";
			
			echo $price;
			
			//if($html->find('#detail_product_picture_thumbnail a', 0))
			//	foreach($html->find('#detail_product_picture_thumbnail a') as $kk => $item) {
			//		$images[$kk] = $item->href;
			//	}
			
			//var_dump($images);	
			
		//	
		//	//
			foreach($html->find('.left .teaser td') as $item) {
				if($item->find('span', 0)->innertext== 'Tình trạng:' )
				{
					$tinhtrang = $item->innertext;
					$tinhtrang = explode('</span>', $tinhtrang);
					$tinhtrangz = $tinhtrang[1];
				}
				if($item->find('span', 0)->innertext== 'Xuất xứ:' )
				{
					$tinhtrang = $item->innertext;
					$tinhtrang = explode('</span>', $tinhtrang);
					$xuatxu = $tinhtrang[1];
				}
				if($item->find('span', 0)->innertext== 'Bảo hành:' )
				{
					$tinhtrang = $item->innertext;
					$tinhtrang = explode('</span>', $tinhtrang);
					$baohanh = $tinhtrang[1];
				}
				if($item->find('span', 0)->innertext== 'Vận chuyển:' )
				{
					$tinhtrang = $item->innertext;
					$tinhtrang = explode('</span>', $tinhtrang);
					$vanchuyen = $tinhtrang[1];
				}
				//echo $tinhtrangz.$xuatxu.$baohanh.$vanchuyen;
			}
			
		if($price) mysqli_query($con, "UPDATE `pb_products` SET `price`='".$price."' WHERE id=".$_GET["id"]);
		echo "UPDATE `pb_products` SET `price`='".$price."' WHERE id='".$_GET["id"]."'";
		//	
		//	
		//	
		$att_a = array();
		//tinh trang
		if($tinhtrangz)
		{
			$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
			$arow = $result->fetch_assoc();
			$idc = $arow["MAX(id)"]+1;
			//echo $idc;
			mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
					." (".$idc.", 2, 1, 7, ".$row["id"].", '".$tinhtrangz."')");
			
			$att_a[] = $idc;
		}
		//
		//////xuat xu
		//if($xuatxu)
		//{
		//	$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
		//	$arow = $result->fetch_assoc();
		//	$idc = $arow["MAX(id)"]+1;
		//	mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
		//			." (".$idc.", 2, 1, 6, ".$row["id"].", '".$xuatxu."')");
		//	
		//	$att_a[] = $idc;
		//}
		//
		//////xuat xu
		//if($baohanh)
		//{
		//	$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
		//	$arow = $result->fetch_assoc();
		//	$idc = $arow["MAX(id)"]+1;
		//	mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
		//			." (".$idc.", 2, 1, 2, ".$row["id"].", '".$baohanh."')");
		//	
		//	$att_a[] = $idc;
		//}
		//
		//////xuat xu
		//if($vanchuyen)
		//{
		//	$result = $con->query("SELECT MAX(id) FROM pb_formattributes");
		//	$arow = $result->fetch_assoc();
		//	$idc = $arow["MAX(id)"]+1;
		//	mysqli_query($con, "INSERT INTO `pb_formattributes` (`id`,`type_id`, `form_id`, `formitem_id`, `primary_id`, `attribute`) VALUES"
		//			." (".$idc.", 2, 1, 10, ".$row["id"].", '".$vanchuyen."')");
		//	
		//	$att_a[] = $idc;
		//}
		//
		if(count($att_a))
		{
			mysqli_query($con, "UPDATE `pb_products` SET `formattribute_ids`='".implode(',', $att_a)."' WHERE id=".$row["id"]);
		}
			
			
		//	$query = "SELECT * FROM `pb_industries` WHERE parent_id='".$_GET["id"]."'";
		//	$result = $con->query($query);
		//	$row = $result->fetch_assoc();
		//	if(!$row["id"])
		//	{
		//		echo " ".$url;
		//		$html = file_get_html($url);
		//		foreach($html->find('#top_product_category .block') as $item) {
		//			
		//			$item_a = $item->find(".name a", 0);
		//			$item_price = $item->find(".price", 0);
		//			$item_pic = $item->find(".picture img", 0);
		//			echo $item_price->innertext;
		//			
		//			//picture
		//			//echo $item_pic->src;
		//			
		//			//name
		//			//echo trim($item_a->innertext);
		//			
		//			//link
		//			//echo $item_a->href;
		//			
		//			//price
		//			$price = $item_price->innertext;
		//			$price = explode(' ', $price);
		//			$price = str_replace('.', '',  $price[0]);
		//			if(!is_numeric($price)) $price = "";
		//			//echo $price;
		//			
		//			
		//			//mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
		//			//				." (0, 0, NULL, '".trim($item->innertext)."', '', '', 0, ".$_GET["id"].", 3965, 1, 0, NULL, 3, 0, 0, '".$item->href."')");
		//			
		//			mysqli_query($con,"INSERT INTO `pb_products` ( `member_id`, `company_id`, `cache_companyname`, `sort_id`, `brand_id`, `category_id`, `industry_id`, `country_id`, `area_id`, `name`, `price`, `sn`, `spec`, `produce_area`, `packing_content`, `picture`, `content`, `producttype_id`, `status`, `state`, `ifnew`, `ifcommend`, `priority`, `tag_ids`, `clicked`, `formattribute_ids`, `created`, `modified`, `picture1`, `picture2`, `picture3`, `picture4`, `tempurl`) VALUES"
		//						."(1, 1, 'Ualink E-Commerce', 1, 0, 0, ".$_GET["id"].", 1, 0, '".trim($item_a->innertext)."', ".$price.", '', '', '', '', '".$item_pic->src."', '', 0, 1, 1, 0, 0, 0, '4', 69, '', ".strtotime(date("Y-m-d H:i:s")).", ".strtotime(date("Y-m-d H:i:s")).", NULL, NULL, NULL, NULL, '".$item_a->href."')");
		//		}
		//	}
		//	else
		//	{
		//		echo " not okie";
		//	}
		}
		else
		{
			echo "not okie";
		}
		echo "<br />";
	}
	
	function importVatgiaProductDetail()
	{
		$this->render("product/importVatgiaProductDetail");
	}
	
	function ajaxDeleteImage()
	{
		uses("attachment", "trade");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('');
		$trade = new Trades();
		
		$pid = intval($_GET['pid']);
		$pos = $_GET["pos"];
		if($pos == 1)
		{
			$pic_col = "picture";
		}
		else
		{
			$pic_col = "picture".($pos-1);
		}
		
		$product = $trade->read("id, default_pic, ".$pic_col, $pid);
		
		if($product)
		{
			if($product['default_pic'] != $pos - 1)
			{
				$attachment->deleteBySource($product[$pic_col]);
				if($trade->saveField($pic_col, '', intval($pid)))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			echo "0";
		}
	}
	
	function changeDefaultImage()
	{
		uses("trade");
		$trade = new Trades();
		$pid = intval($_GET['pid']);
		$pos = $_GET["pos"]-1;
		
		//echo "sdS";
		
		$product = $trade->read("id", $pid);
		//echo "sdS";
		
		if($product)
		{			
				if($trade->saveField('default_pic', $pos, $pid))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}			
		}
		else
		{
			echo "0";
		}
		
	}
}
?>