<?php
class Product extends PbController {
	var $name = "Product";
	var $CHAT_COUNT = 200;
	var $MESSAGE_ANNOUNCE_COUNT = 20;
	var $CHAT_ANNOUNCE_COUNT = 20;
	
	function Product()
	{
		$this->loadModel("product");
		$this->loadModel("producttype");
		$this->loadModel("industry");
		$this->loadModel("area");
		$this->loadModel("company");
		$this->loadModel("message");
		$this->loadModel("space");
		$this->loadModel("member");
		$this->loadModel("memberfield");
		$this->loadModel("chat");
		$this->loadModel("trade");
		$this->loadModel("tradecomment");
		$this->loadModel("tradetype");
		$this->loadModel("tag");
		$this->loadModel("link");
		$this->loadModel("language");
		$this->loadModel("announcement");
		$this->loadModel("adzone");
		$this->loadModel("modlog");
		$this->loadModel("attachment");
		$this->loadModel("album");
		$this->loadModel("googlecontact");
		//$this->loadModel("setting");
	}
	
	function index()
	{
		uses('setting');
		$setting = new Settings();
		//echo $setting->getValue('new_product_count');
		$this->product->updateShowProducts($setting->getValue('new_product_hours'), $setting->getValue('new_product_count'));
		
		$data = array();
		$_PB_CACHE['industry'] = cache_read("industry");
		require(CACHE_COMMON_PATH."cache_type.php");
		$index_latest_industry_ids = 10;
		using("industry");
		$industry = new Industries();
		$ProductSorts = $_PB_CACHE['productsort'];
		$result = $this->product->dbstuff->GetArray($sql = "SELECT distinct industry_id AS iid FROM {$this->product->table_prefix}products WHERE status=1 ORDER BY id DESC LIMIT 0,{$index_latest_industry_ids}");
		if (!empty($result)) {
			foreach ($result as $key=>$val) {
				$data[$val['iid']]['id'] = $val['iid'];
				if(isset($_PB_CACHE['industry'][1][$val['iid']])) $data[$val['iid']]['name'] = $_PB_CACHE['industry'][1][$val['iid']];
				$tmp_result = $this->product->dbstuff->GetArray("SELECT id,name,picture,sort_id,industry_id FROM {$this->product->table_prefix}products WHERE status=1 AND industry_id=".$val['iid']." ORDER BY id DESC LIMIT 0,5");
				if (!empty($tmp_result)) {
					foreach ($tmp_result as $key1=>$val1) {
						$data[$val['iid']]['sub'][$val1['id']]['id'] = $val1['id'];
						$data[$val['iid']]['sub'][$val1['id']]['name'] = $val1['name'];
						$data[$val['iid']]['sub'][$val1['id']]['sort'] = $ProductSorts[$val1['sort_id']];
						$data[$val['iid']]['sub'][$val1['id']]['image'] = pb_get_attachmenturl($val1['picture'], '', 'small');
					}
				}
			}
			setvar("IndustryProducts", $data);
		}
		//var_dump($industry->getByID(1));
		//get all industries from cache
		$industries = $this->industry->getCacheIndustry();
		if(isset($_GET["level"]))
		{
			setvar("p_level", $_GET["level"]);
			if($_GET["level"] == "search")
			{
				$IndustryList["id"] = 0;				
				$IndustryList["box1"] = $industries;
				
				if(isset($_GET["tag"]))
				{
					$keyword = $this->tag->read("name", intval($_GET["tag"]));
					$keyword = $keyword["name"];
					$IndustryList["name"] = "Tìm theo từ khóa '<span class='keyword'>".$keyword."</span>'";
					setvar("keyword", $keyword);
				}
				
				if(isset($_GET["keyword"]))
				{
					$IndustryList["name"] = "Tìm theo từ khóa '<span class='keyword'>".$_GET["keyword"]."</span>'";
					setvar("keyword", $_GET["keyword"]);
				}
				
				setvar("IndustryList", $IndustryList);
				
				render("product/category");
			}
			else if($_GET["level"] == 1)
			{
				if(isset($_GET["industryid"]))
				{
					$count1 = 0;
					
					foreach($industries[$_GET["industryid"]]["sub"] as $key1 => $level1)
					{
						$industries[$_GET["industryid"]]["level0_name"] = $industries[$_GET["industryid"]]["name"];
						$industries[$_GET["industryid"]]["level0_id"] = $industries[$_GET["industryid"]]["id"];
						$industries[$_GET["industryid"]]["box1"] = $industries;
								
						//foreach( $industries[$_GET["industryid"]]["box1"] as $key => $item)
						//{
						//	$ii = $this->industry->field("children", "id=".$item["id"]);
						//	$industries[$_GET["industryid"]]["box1"][$key]["count"] = $this->industry->getCountProduct($ii);
						//}
						
						
						
						$cats = array();					
						$cats[] = $level1["id"];
						
						//$industries[$_GET["industryid"]]["sub"][$key1]["ppcount"] = $this->industry->countProduct($level1["id"]);
						
						if($count1%6 == 1)
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 1;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 0;
						}
						
						//echo $level1["name"];
						if($count1%6 == 0 || $count1%6 == 5)
						{
							$maxitem = 11;
						}
						else
						{
							$maxitem = 3;
						}
						
						//if(rand(0,1) || $count0%6 == 0 || $count0%6 == 5)
						//{
							$industries[$_GET["industryid"]]["sub"][$key1]["disp"] = "disp";
						//}
						//else
						//{
						//	$industries[$_GET["industryid"]]["sub"][$key1]["disp"] = "hiden";
						//}
						
						
						//getImage
						//$rowi = $industry->getByID($key0);
						$industries[$_GET["industryid"]]["sub"][$key1]["image"] = pb_get_attachmenturl($industries[$_GET["industryid"]]["sub"][$key1]["picture"], "", "");
						
						if(preg_match('/nopicture/', $industries[$_GET["industryid"]]["sub"][$key1]["image"])) $industries[$_GET["industryid"]]["sub"][$key1]["image"] = "";
						
						
						foreach($level1['sub'] as $key2 => $level2)
						{
							$cats[] = $level2["id"];
							
							//echo $key2."-".$maxitem."/";
							if($key2 > $maxitem)
							{
								unset($industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]);
							}
							
							//$industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]["ppcount"] = $this->industry->countProduct($level2["id"]);
						}			
						$count1++;
						
						if($key1 == count($industries[$_GET["industryid"]]["sub"])-1)
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["last"] = 1;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["last"] = 0;
						}
						
						//Get images from new product
						//$images = $this->product->getNewProductImages($cats, 2);
						//if(count($images))
						//{
						//	$industries[$_GET["industryid"]]["sub"][$key1]["images"] = $images;
						//}
						//else
						//{
						//	$industries[$_GET["industryid"]]["sub"][$key1]["images"] = "";
						//}
					}
				}
				
				//get custom cats
				//$customcats = $this->producttype->findAll("id, name", null, array("parent_industry_id = ".intval($_GET["industryid"])));
				//var_dump($customcats);
				
				
				//var_dump($industries[$_GET["industryid"]]);
				//var_dump($IndustryList);
				//$IndustryList["count"] = count($IndustryList["sub"]);
				$industries["id"] = $_GET["industryid"] ;
				
				setvar("IndustryList", $industries[$_GET["industryid"]]);
				
				
			}
			else if($_GET["level"] == 2)
			{
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							if($level1["id"] == $_GET["industryid"])
							{								
								$level1["level0_name"] = $level0["name"];
								$level1["level0_id"] = $level0["id"];
								$level1["level1_name"] = $level1["name"];
								$level1["level1_id"] = $level1["id"];
								$level1["box2"] = $level0['sub'];
								$level1["box1"] = $industries;
								
								//foreach($level1["box1"] as $key => $item)
								//{									
								//	$level1["box1"][$key]["count"] = $this->industry->getCount($item["id"]);
								//}
								//foreach($level1["box2"] as $key => $item)
								//{									
								//	$level1["box2"][$key]["count"] = $this->industry->getCount($item["id"]);
								//}	
								
								$level1["parent_name"] = $level0["name"];
								$level1["parent_id"] = $level0["id"];
								//var_dump($level1);
								foreach($level1['sub'] as $key2 => $level2)
								{
									$cats = array();
									$cats[] = $level2["id"];
									//echo $key2;
									
									//$level1["sub"][$key2]["ppcount"] = $this->industry->countProduct($level2["id"]);
									
									if($key2%6 == 1)
									{
										$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 1;
									}
									else
									{
										$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 0;
									}
									
									//echo $level1["name"];
									if($key2%6 == 0 || $key2%6 == 5)
									{
										$maxitem = 11;
									}
									else
									{
										$maxitem = 3;
									}								
									
									foreach($level2['sub'] as $key3 => $level3)
									{
										$cats[] = $level3["id"];
										
										//$level1["sub"][$key2]["sub"][$key3]["ppcount"] = $this->industry->countProduct($level3["id"]);
										
										//echo $key2."-".$maxitem."/";
										if($key3 > $maxitem)
										{
											unset($level1["sub"][$key2]["sub"][$key3]);
										}
									}	
									
									//Get images from new product
									//$images = $this->product->getNewProductImages($cats, 2);
									//if(count($images))
									//{
									//	$level1["sub"][$key2]["images"] = $images;
									//}
									//else
									//{
									//	$level1["sub"][$key2]["images"] = "";
									//}									
								}
								$IndustryList = $level1;
							}
						}						
						$count0++;
					}
				}
				//var_dump($IndustryList);
				$IndustryList["count"] = count($IndustryList["sub"]);
				setvar("IndustryList", $IndustryList);
				
				
			}
			else if($_GET["level"] == 3)
			{
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET["industryid"])
								{
									$level2["level1_name"] = $level1["name"];
									$level2["level1_id"] = $level1["id"];
									$level2["level0_name"] = $level0["name"];
									$level2["level0_id"] = $level0["id"];
									$level2["box3"] = $level1['sub'];
									$level2["box2"] = $level0['sub'];
									$level2["box1"] = $industries;
									
									
									foreach($level2['sub'] as $key3 => $level3)
									{
										$cats = array();
										$cats[] = $level3["id"];
										//echo $key2;
										if($key3%3 == 2)
										{
											$maxitem = 11;
											$level2["sub"][$key3]["size"] = "large";
										}
										else
										{
											$maxitem = 3;
											$level2["sub"][$key3]["size"] = "half";
										}
										
										if($key3%2 == 0)
										{										
											$level2["sub"][$key3]["odd"] = 1;
										}
										else
										{										
											$level2["sub"][$key3]["odd"] = 0;
										}
										
										
									}
									
									//foreach($level2["box1"] as $key => $item)
									//{										
									//	$level2["box1"][$key]["count"] = $this->industry->getCount($item["id"]);
									//}
									////foreach($level2["box2"] as $key => $item)
									////{										
									////	$level2["box2"][$key]["count"] = $this->industry->getCount($item["id"]);
									////}
									//foreach($level2["box3"] as $key => $item)
									//{										
									//	$level2["box3"][$key]["count"] = $this->industry->getCount($item["id"]);
									//}
														
									
									$IndustryList = $level2;
									
									
									
									
								}
							}
						}						
						$count0++;
					}
				}
				//var_dump($IndustryList);
				$IndustryList["count"] = count($IndustryList["sub"]);
				setvar("IndustryList", $IndustryList);
				
				
			}
			else if($_GET["level"] == 4)
			{
				//echo $_GET["industryid"];
				//var_dump($industries);
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								//if($level2["id"] == 2586)
								//{
								//		var_dump($level2['sub']);
								//}
								foreach($level2['sub'] as $key3 => $level3)
								{
																
									if($level3["id"] == $_GET["industryid"])
									{
										//echo $level3["id"];
										$level3["level2_name"] = $level2["name"];
										$level3["level2_id"] = $level2["id"];
										$level3["level1_name"] = $level1["name"];
										$level3["level1_id"] = $level1["id"];
										$level3["level0_name"] = $level0["name"];
										$level3["level0_id"] = $level0["id"];
										$level3["box4"] = $level2['sub'];
										$level3["box3"] = $level1['sub'];
										$level3["box2"] = $level0['sub'];
										$level3["box1"] = $industries;
										
										//foreach($level3["box1"] as $key => $item)
										//{
										//	$level3["box1"][$key]["count"] = $this->industry->getCount($item["id"]);
										//}
										////foreach($level3["box2"] as $key => $item)
										////{
										////	$level3["box2"][$key]["count"] = $this->industry->getCount($item["id"]);
										////}
										////foreach($level3["box3"] as $key => $item)
										////{
										////	$level3["box3"][$key]["count"] = $this->industry->getCount($item["id"]);
										////}
										//foreach($level3["box4"] as $key => $item)
										//{
										//	$level3["box4"][$key]["count"] = $this->industry->getCount($item["id"]);
										//}
										
										$IndustryList = $level3;
										break;
									}
									
									
								}
								
							}
						}						
						$count0++;
					}
				}
				setvar("IndustryList", $IndustryList);
				
				
			}
			
			if(detectMobile()) {
				render("mobile/product/index");
			} else {
				render("product/category");
			}
		}
		else
		{
			//echo "dsfsdfsdfsdfsdfsdfd sdf sdf";
			
			$count0 = 0;
			$fimages = array();
			foreach($industries as $key0 => $level0)
			{
				//$industries[$key0]["ppcount"] = $this->industry->read("count", $level0["id"]);
				//$industries[$key0]["ppcount"] = $industries[$key0]["ppcount"]["count"];
				
				$cats = array();
				$cats[] = $level0["id"];
				if($count0%6 == 0 || $count0%6 == 5)
				{
					$maxitem = 11;
				}
				else
				{
					$maxitem = 3;
				}
				
				//if(rand(0,1) || $count0%6 == 0 || $count0%6 == 5)
				//{
					$industries[$key0]["disp"] = "disp";
				//}
				//else
				//{
				//	$industries[$key0]["disp"] = "hiden";
				//}
				
				
				
				//getImage
				//$rowi = $industry->getByID($key0);
				$industries[$key0]["image"] = pb_get_attachmenturl($industries[$key0]["picture"], "", "");
				
				if(preg_match('/nopicture/', $industries[$key0]["image"]))  $industries[$key0]["image"] = "";
				
				
				//FACEBOOK IMAGES
				if($industries[$key0]["image"] != '' && $industries[$key0]["share_facebook"])
				{
					$fimages[] = $industries[$key0]["image"];
				}
				
				//echo $industries[$key0]["image"];
				
				foreach($level0['sub'] as $key1 => $level1)
				{
					$cats[] = $level1["id"];
					
					foreach($level1['sub'] as $key2 => $level2)
					{
						$cats[] = $level2["id"];
					}
					
					//$industries[$key0]["sub"][$key1]["ppcount"] = $this->industry->read("count", $level1["id"]);
					//var_dump();
					//$industries[$key0]["sub"][$key1]["ppcount"] = $industries[$key0]["sub"][$key1]["ppcount"]["count"];
					
					if($key1 > $maxitem)
					{
						unset($industries[$key0]["sub"][$key1]);
					}
					
				}
				
				if($count0 == count($industries)-1)
				{
					$industries[$key0]["last"] = 1;
					//echo $industries[$key0]["name"];
				}
				else
				{
					$industries[$key0]["last"] = 0;
				}
				//echo "sdfsdf";
				//Get images from new product
				//$images = $this->product->getNewProductImages($cats, 2);
				////echo "sdfsdf";
				//if(count($images))
				//{
				//	//echo "sdfsdf";
				//	$industries[$key0]["images"] = $images;
				//}
				//else
				//{
				//	$industries[$key0]["images"] = "";
				//}
				//var_dump($industries[$key0]["images"]);
				
				
				
				$count0++;
			}
			//var_dump($industries);
			//var_dump($industry);
			setvar("IndustryList", $industries);
			
			
			
			//List Product
			global $pos, $limit;
			$this->product->initSearch();
			$products = $this->product->Search($pos, $limit);
			//$products = $this->product->Search(10, )
			//var_dump($products);
			
			foreach($products as $pkey => $item)
			{
				$products[$pkey]["isfirst"] = "";
				if($pkey%5 == 0)
				{
					$products[$pkey]["isfirst"] = " first";
				}
				else if($pkey%5 == 4)
				{
					$products[$pkey]["isfirst"] = " last";
				}
			}
			
			setvar("Products", $products);
			
			foreach($fimages as $key => $img)
			{				
				$fimages[$key] = URL.$img;
			}
			
			setvar("fimages", $fimages);
			setvar("page_title", "Thị Trường Trực Tuyến");
			
			
			
			if(detectMobile()) {
				render("mobile/product/index");
			} else {
				render("product/index");
			}
		}
	}
	
	function connect()
	{
		//global $FACE;
		$pb_userinfo = pb_get_member_info();
		//$pb_userinfo = $member->getInfoById($pb_userinfo['pb_userid']);
		if(!$pb_userinfo){
			pheader("location:index.php");
		}
		
		$data = array();
		$_PB_CACHE['industry'] = cache_read("industry");
		require(CACHE_COMMON_PATH."cache_type.php");
		$index_latest_industry_ids = 10;
		using("industry");
		$industry = new Industries();
		$ProductSorts = $_PB_CACHE['productsort'];
		$result = $this->product->dbstuff->GetArray($sql = "SELECT distinct industry_id AS iid FROM {$this->product->table_prefix}products WHERE status=1 ORDER BY id DESC LIMIT 0,{$index_latest_industry_ids}");
		if (!empty($result)) {
			foreach ($result as $key=>$val) {
				$data[$val['iid']]['id'] = $val['iid'];
				if(isset($_PB_CACHE['industry'][1][$val['iid']])) $data[$val['iid']]['name'] = $_PB_CACHE['industry'][1][$val['iid']];
				$tmp_result = $this->product->dbstuff->GetArray("SELECT id,name,picture,sort_id,industry_id FROM {$this->product->table_prefix}products WHERE status=1 AND industry_id=".$val['iid']." ORDER BY id DESC LIMIT 0,5");
				if (!empty($tmp_result)) {
					foreach ($tmp_result as $key1=>$val1) {
						$data[$val['iid']]['sub'][$val1['id']]['id'] = $val1['id'];
						$data[$val['iid']]['sub'][$val1['id']]['name'] = $val1['name'];
						$data[$val['iid']]['sub'][$val1['id']]['sort'] = $ProductSorts[$val1['sort_id']];
						$data[$val['iid']]['sub'][$val1['id']]['image'] = pb_get_attachmenturl($val1['picture'], '', 'small');
					}
				}
			}
			setvar("IndustryProducts", $data);			
		}
		
		$industries = $this->industry->getCacheIndustry();
		
		//get links and follows
		uses("space");
		$space = new Spaces();
		//echo $pb_userinfo['pb_userid'];
		$links = $space->getFriends($pb_userinfo['pb_userid'],9);
		//var_dump($links);
		//foreach($links as $key => $item)
		//{
		//	//$links[$key]["image"] = pb_get_attachmenturl($item['company_picture'], '', 'small');
		//	$links[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		//}
		
		$follows = $space->getFollowFriends($pb_userinfo['pb_userid']);
		//foreach($follows as $key => $item)
		//{
		//	//$follows[$key]["image"] = pb_get_attachmenturl($item['picture'], '', 'small');
		//	$follows[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		//	
		//}
		
		$count_links = $space->getFriendsCount($pb_userinfo['pb_userid']);
		//var_dump($count_links);
		setvar('count_links', $count_links[0]["COUNT(s.id)"]);
		setvar('count_follows', count($follows));
		setvar('links', $links);
		setvar('follows', $follows);
		foreach($industries as $key => $item)
		{			
			$industries[$key]["count"] = $industry->getCount($item["id"]);
		}
		setvar("IndustryList", $industries);
		
		
		
		$pb_company = $this->company->getInfoByUserId($pb_userinfo["pb_userid"]);

		if($pb_company)
		{
			if(count($pb_company))
			{
				$pb_company["image"] = pb_get_attachmenturl($pb_company['picture'], '', 'small');
				setvar("pb_company", $pb_company);
			}
			else
			{
				setvar("pb_company", false);
			}
			$pb_company["product_count"] = $this->company->getCount($pb_company["id"]);
			
			$FACE["share_f"] = 1;
			$FACE["title"] = urlencode($pb_company["name"]);
			$FACE["caption"] = urlencode($pb_company["shop_name"]);
			$FACE["summary"] = urlencode(strip_tags($pb_company["description"]));
			//$FACE["summary"] = urlencode("");
			$FACE["images"] = '&p[images][0]='.urlencode(URL.$pb_company["image"]);
			foreach($fimages as $key => $img)
			{
				//$FACE["images"] .= '&p[images]['.($key).']='.urlencode("http://marketonline.vn/".$img);
			}
			setvar("FACE", $FACE);
			
			setvar("fb_description", strip_tags($pb_company["description"]));
			
		}
		
		render("product/connect");
	}
	
	function detail()
	{		
		global $viewhelper, $session, $customer_code;
		using("company","member","form", "tag","area","industry","meta","productcomment");
		$productcomment = new Productcomments();
		$company = new Companies();
		$area = new Areas();
		$meta = new Metas();
		$industry = new Industries();
		$tag = new Tags();
		$member = new Members();
		$form = new Forms();
		
		$pb_userinfo = pb_get_member_info();
		$permissions = $this->product->getPermisstions($_GET['id'], $pb_userinfo["pb_userid"]);
		//var_dump($permissions);
		setvar("permissions",$permissions);
		
		$tmp_status = explode(",",L('product_status', 'tpl'));
		$viewhelper->setPosition(L("product_center", 'tpl'), 'index.php?do=product');
		$viewhelper->setTitle(L("product_center", 'tpl'));
		if (isset($_GET['title'])) {
			$title = rawurldecode(trim($_GET['title']));
			$res = $this->product->findByName($title);
			$id = $res['id'];
		}
		if (isset($_GET['id'])) {
			$id = intval($_GET['id']);
		}
		$info = $this->product->getProductById($id);
		
		
		//clicked
		$this->product->clicked($customer_code, $info);		
		
		
		//save product id to view history list
		$oldsession = $_SESSION["viewed_list"];
		//echo $oldsession."-".preg_match('/\[{$id}\]/', $oldsession)."-"."[".$id."]";
		if(strpos("[0]".$oldsession, "[".$id."]"))
		{			
			$oldsession = str_replace("[".$id."]", "", $oldsession);
		}
		
		$_SESSION["viewed_list"] = $oldsession."[".$id."]";
		//echo $_SESSION["viewed_list"];
		
		
		if(empty($info) || !$info || $info["valid_status"] != 1) {
			//$pb_userinfo = pb_get_member_info();
			//$member_info = $member->getInfoById($pb_userinfo['pb_userid']);
			if(!empty($info) && ($permissions["valid"] || $info["valid_moderator"] == $pb_userinfo["pb_userid"] || $info["member_id"] == $pb_userinfo["pb_userid"])) {
				if($info["valid_status"] == 0) {
					setvar("pending","<span class='unvalid'>Không hợp lệ (".$info["valid_message"].")</span>");
				} elseif ($info["valid_status"] == 3) {
					setvar("pending","<span class='pending'>Đang đợi kiểm duyệt (".$info["valid_message"].")</span>");
				}
			} else {
				$iindus = $this->industry->read("*",$info["industry_id"]);
				$mmodul = "products";
				if($info["service"]) $mmodul = "services";
				flash("unvalid_product", '', 0, '', '<a class="link_underline" href="'.$this->product->url(array("module"=>$mmodul,"industryid"=>$info["industry_id"],"level"=>$iindus["level"],"title"=>$iindus["name"])).'">Mời Quý khách xem sản phẩm khác tại đây</a>');								
			}
		}
		if (isset($info['formattribute_ids'])) {
			$form_vars = $form->getAttributes(explode(",", $info['formattribute_ids']),2);
			//echo $form_vars["old_price"];
			$form_vars[4]["value"] = number_format($form_vars[4]["value"], 0, ',', '.');
			setvar("ObjectParams", $form_vars);
			setvar("OldPrice", $form_vars[4]["value"]);
			//var_dump($form_vars);
		}
		if (!empty($info['tag_ids'])) {
			$tag_res = $tag->getTagsByIds($info['tag_ids']);
			if (!empty($tag_res)) {
				
				$tags = null;
				$ii = 0;
				foreach ($tag_res as $key=>$val){
					//$tags.='<a href="'.$this->url(array("module"=>"tag", "do"=>"product", "q"=>$val)).'" target="_blank">'.$val.'</a>';
					if(!$info["service"])
					{
						$tags.='<a href="'.$this->product->url(array("module"=>"products","level"=>"search","tag"=>urlencode($key))).'">'.$val.'</a>';
					}
					else
					{
						$tags.='<a href="'.$this->product->url(array("module"=>"services","level"=>"search","tag"=>urlencode($key))).'">'.$val.'</a>';
					}
					if($ii != count($tag_res)-1) $tags.=", ";
					$ii++;
				}
				$info['tag'] = $tags;
				$info['tag_string'] = implode(", ", $tag_res);
				unset($tags, $tag_res, $tag);
				//var_dump($tags);
				setvar("TAG_STRING", $info['tag_string']);
			}
		}
		if ($info['state']!=1) {
			//var_dump($info);
			$iindus = $this->industry->read("*",$info["industry_id"]);
			$mmodul = "products";
			if($info["service"]) $mmodul = "services";
			flash("unvalid_product", '', 0, '', '<a class="link_underline" href="'.$this->product->url(array("module"=>$mmodul,"industryid"=>$info["industry_id"],"level"=>$iindus["level"],"title"=>$iindus["name"])).'">Mời Quý khách xem sản phẩm khác tại đây</a>');
		}
		if($info['status']!=1){
			$tmp_key = intval($info['status']);
			flash("wait_apply", '', 0);
		}
		if (!empty($info['member_id'])) {
			$member_info = $member->getInfoById($info['member_id']);
			$info['space_name'] = $member_info['space_name'];
			setvar("MEMBER", $member_info);
		}
		//var_dump($info);
		if (!empty($info['company_id'])) {
			$company_info = $company->getInfoById($info['company_id']);
			//echo $member_info["referrer_id"]."ddd";
			if($company_info["parent_id"])
			{				
				$r_info = $company->getInfoByUserId($company_info["parent_id"]);
				$company_info['r_logo'] = pb_get_attachmenturl($r_info['picture'], '', 'small');
				$company_info['r_spacename'] = $r_info["cache_spacename"];
				$company_info['r_name'] = $r_info["name"];
				$company_info['r_shop_name'] = $r_info["shop_name"];
				//echo $company_info['r_spacename'].$company_info['r_logo'];
			}
			//var_dump($r_info);
			if (!empty($company_info)) {
				$info['companyname'] = $company_info['name'];
				$info['link_people'] = $company_info['link_man'];
				$info['address'] = $company_info['address'];
				$info['zipcode'] = $company_info['zipcode'];
				$info['site_url'] = $company_info['site_url'];
				$info['tel'] = pb_hidestr($company_info['tel']);
				$info['fax'] = pb_hidestr($company_info['fax']);
				$info['shop_name'] = $company_info['shop_name'];
				$company_info['logo'] = pb_get_attachmenturl($company_info['picture'], '', 'small');
				$company_info = pb_lang_split_recursive($company_info);
				
				//var_dump($company_info);
				setvar("COMPANY", $company_info);
			}
		}
		$meta_info = $meta->getSEOById($id, 'product', false);
		empty($meta_info['title'])?$viewhelper->setTitle($info['name'], $info['picture']):$viewhelper->setTitle($meta_info['title']);
		empty($meta_info['description'])?$viewhelper->setMetaDescription($info['content']):$viewhelper->setMetaDescription($meta_info['description']);
		$viewhelper->setMetaKeyword($meta_info['keyword']);
		$viewhelper->setPosition($info['name']);
		$info['industry_names'] = $industry->disSubNames($info['industry_id'],' <span class="delim">/</span> ', true, "products");
		$info['industry_service_names'] = $industry->disSubNames($info['industry_id'],' <span class="delim">/</span> ', true, "services");
		$info['area_names'] = $area->disSubNames($company_info['area_id'], " / ", false, "product");
		$info['name'] = fix_text_error($info['name']);
		$info['content'] = fix_text_error($info['content']);
		$info['title'] = strip_tags($info['name']);
		//var_dump($info);
		//getImage
						$inn = $industry->getByID($info['industry_id']);
						//$parentz = $industry->getByID($inn['parent_id']);
						$grand = $industry->getByID($inn['top_parentid']);
						//var_dump($inn);
						setvar('inn_array', $this->getArrayIndustry($inn['parent_id']));
						
		//delete the pre num.2011.9.1
		$info['tel'] = preg_replace('/\((.+?)\)/i', '', $info['tel']);
		$info['fax'] = preg_replace('/\((.+?)\)/i', '', $info['fax']);
		$info = pb_lang_split_recursive($info);
		$banner['banner1'] = pb_get_attachmenturl($grand["picture"], "", "");
		$banner['banner1_id'] = $grand["id"];
		//echo $info['banner1'];
		
		//replace content
		//$info['content'] = $info['content'];
		
		$info['content'] = cleanContent(stripslashes($info['content']));		
		
		//format html
		//$info['content'] = strip_tags($info['content'], "<table><th><td><tbody><tfooter><p><br><strong><font><span><img><h2><h3><h4>");
		
		if($info['default_pic'])
		{
			$info['d_image'] = $info['image'.$info['default_pic']];
			$info['d_imgsmall'] = $info['imgsmall'.$info['default_pic']];
		}
		else
		{
			$info['d_image'] = $info['image'];
			$info['d_imgsmall'] = $info['imgsmall'];
		}
		//echo $info['d_image'];
		$width = 500;
		$height = 600;
		
		$re = array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'
					,'ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'
					,'í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'
					,'ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'
					,'ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'
					,'ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'
					,'đ','Đ');
		
		if(!preg_match('/\:[0-9]+\//',$info['d_image']))
		{
			list($width, $height, $type, $attr) = getimagesize(str_replace(' ', "%20", $info['d_image']));
		}		
		//var_dump($width .$height. $type. $attr);
		
		if($info["display_type"]==1) {
			$wwwi = 546;
		} else {
			$wwwi = 370;
		}
		setvar("wwwi",$wwwi);
		setvar("width",$width);
		setvar("height",$height);
		setvar("theight",round($height/($width/$wwwi),0));
		
		if($width/$wwwi>3)
		{
			$ttt = 3;
		}
		else if($width/$wwwi<1.4)
		{
			$ttt = 1.4;
		}
		else
		{
			$ttt = $width/$wwwi;
		}
		
		setvar("tile",$ttt);
		
		if($info['image'] && !preg_match('/http/', $info['image']))
			setvar('fb_image', URL.$info['image']);
		else
			setvar('fb_image', $info['image']);
			
		if($info['image1'] && !preg_match('/http/', $info['image1']))
			setvar('fb_image1', URL.$info['image1']);
		else
			setvar('fb_image1', $info['image1']);
		
		if($info['image2'] && !preg_match('/http/', $info['image2']))
			setvar('fb_image2', URL.$info['image2']);
		else
			setvar('fb_image2', $info['image2']);
			
		if($info['image3'] && !preg_match('/http/', $info['image3']))
			setvar('fb_image3', URL.$info['image3']);
		else
			setvar('fb_image3', $info['image3']);
			
		if($info['image4'] && !preg_match('/http/', $info['image4']))
			setvar('fb_image4', URL.$info['image4']);
		else
			setvar('fb_image4', $info['image4']);
		
		
		
		//comment count
		$comments_count =  $productcomment->findCount(null, array("product_id=".$id));
		setvar("comments_count", $comments_count);
		
		//echo "<div style='display:none'>".strip_tags(html_entity_decode($company_info["description"]))."</div>";
		if(trim(strip_tags($info['content'])) != '') {
			$fb_description = trim(strip_tags($info['content']));
		}
		else {
			$fb_description = trim(strip_tags($company_info["description"]));
		}
		setvar("fb_description", mb_convert_encoding(preg_replace('/\s+/'," ",substr($fb_description,0, 1000)),"UTF-8"));
		//var_dump($info);
		setvar("item", $info);
		setvar("Product", $info);
		setvar("banner", $banner);
		//$this->product->clicked($id);
		
		//
		setvar("online", $this->product->isOnline($info["member_id"]));
		
		$welcomnew_info = $this->announcement->read("message", 7);
		$welcomnew_info["message"] = str_replace("{shop}","<a href='".URL.$company_info["cache_spacename"]."'>".$company_info["shop_name"]."</a>",$welcomnew_info["message"]);
		setvar('welcomnew_info', $welcomnew_info);
		
		
		
		//get product banner for paid member
		if($member_info["checkout"])
		{
			$product_banners = $this->product->getProductBanners($member_info["id"]);
			setvar("product_banners",$product_banners);
		}
		else
		{
			$banners = $industry->findRelatedBanners($info["industry_id"]);		
			setvar("banners",$banners);
		}
		
		//ad product
		$ad_product = $this->product->getAdRightBarProduct();
		
		//area
		$company_area = $this->area->disSubNames($company_info["area_id"], " / ", false, "product");
		setvar("company_area", $company_area);
		
		//title url for facebook
		setvar("og_title", $info["title"]);
		//{the_url id=`$item.id` module='product' product_name=`$item.name` service=`$item.service`}
		setvar("og_url", $this->product->url(array("module"=>'product',"product_name"=>$info["name"],"id"=>$info["id"],"service"=>$info["service"])));
		
		//Order message
		$order_message = $this->announcement->read("message", 26);
		$messagez = trim(strip_tags($order_message["message"]));
		if(!empty($messagez)) {
			setvar('order_message', $order_message);
		}
		
		
		if(detectMobile()) {
			render("mobile/product/detail");
		} else {
			render("product/detail");
		}
		
	}
	
	function related_products()
	{
		setvar("product_id",$_GET["product_id"]);
		setvar("member_id",$_GET["member_id"]);
		
		$member = $this->member->read("*",$_GET["member_id"]);
		setvar("member",$member);
		
		if($_GET["mobile"]) {
			render("mobile/product/_related_products");
		} else {
			render("product/_related_products");
		}	
	}
	
	function inquery()
	{
		global $viewhelper;
		using("member","message","typeoption");
		$typeoption = new Typeoptions();
		$member = new Members();
		$pms = new Messages();
		if (isset($_POST['id']) && !empty($_POST['do']) && !empty($_POST['title'])) {
			pb_submit_check('inquery');
			$vals['type'] = 'inquery';
			$vals['title'] = $_POST['title'];
			$vals['content'] = implode("<br />", $_POST['inquery']);
			$result = $pms->SendToUser($pb_userinfo['pb_username'], $this->product->dbstuff->GetOne("SELECT username FROM {$this->product->table_prefix}members WHERE id=".intval($_POST['to_member_id'])), $vals);
			if(!$result){
				flash("failed", '', 0);
			}else{
				flash("success", '', 0);
			}
		}
		$pid = intval($_GET['id']);
		$sql = "SELECT * FROM {$this->product->table_prefix}products WHERE id=".$pid;
		$res = $this->product->dbstuff->GetRow($sql);
		if (empty($res) || !$res) {
			flash('data_not_exists', 'product/', 0);
		}else {
			if (!empty($res['picture'])) {
				$res['imgsmall'] = "attachment/".$res['picture'].".small.jpg";
				$res['imgbig'] = "attachment/".$res['picture'];
				$res['image'] = "attachment/".$res['picture'].".small.jpg";
			}else{
				$res['image'] = pb_get_attachmenturl('', '', 'small');
			}
			setvar("ImTypes", cache_read("typeoption", "im_type"));
			setvar("TelTypes", cache_read("typeoption", "phone_type"));
			setvar("item", pb_lang_split_recursive($res));
		}
		$viewhelper->setTitle($res['name']);
		$member_info = $this->product->dbstuff->GetRow("SELECT mf.first_name,mf.last_name,m.email as MemberEmail FROM {$this->product->table_prefix}members m LEFT JOIN {$this->product->table_prefix}memberfields mf ON mf.member_id=m.id WHERE m.id=".$res['member_id']);
		setvar("CompanyUser",$member_info['first_name'].$member_info['last_name']);
		render("product/inquery");
	}
	
	function price()
	{
		
	}
	
	function compare()
	{
		
	}
	
	function lists()
	{
		global $pos, $limit;
		$this->product->initSearch();
		$result = $this->product->Search($pos, $limit);
		setvar("items", $result);
		$this->render("list.trade");
	}
	
		
	function listAjax()
	{
		global $pos, $limit;
		$num_per_page = 15;
		
		if(isset($_GET["num_per_page"]))
		{
			$num_per_page = $_GET["num_per_page"];
		}
		
		if (!empty($_GET['pos_pg'])) {
 			$pos_pg = $_GET['pos_pg'];
 		}
		else
		{
			$pos_pg = 0;
		}
		
		
		
		$area_a = array();
		if (isset($_GET['industryid']) && $_GET['industryid'] != 0) {
			//Get industry level 1
			$industries = $this->industry->getCacheIndustry();
			
			$area_a[] = $_GET['industryid'];
			
			if (isset($_GET['type']) && $_GET['type'] == 'service' && !isset($_GET['service_page'])) {
				$citem = $this->industry->read("*", $_GET['industryid'], null, array('id'=>$_GET['industryid']));
				//var_dump($citem);
				//echo $citem["top_parentid"];
				if($citem["top_parentid"])
				{
					$area_a[] = $citem["top_parentid"];
					$_GET['industryid'] = $citem["top_parentid"];
				}
			}	
			
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $_GET['industryid'])
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						$area_a[] = $level1["id"];
						foreach($level1['sub'] as $key2 => $level2)
						{
							$area_a[] = $level2["id"];
							foreach($level2['sub'] as $key3 => $level3)
							{
								$area_a[] = $level3["id"];
								foreach($level3['sub'] as $key4 => $level4)
								{												
									$area_a[] = $level4["id"];												
								}
							}
						}
					}
					break;
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $_GET['industryid'])
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];
									foreach($level3['sub'] as $key4 => $level4)
									{												
										$area_a[] = $level4["id"];												
									}
								}
							}
							break;
						}
						else
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET['industryid'])
								{
									$area_a[] = $level2["id"];
									//echo count($level2['sub']);
									foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];
										foreach($level3['sub'] as $key4 => $level4)
										{												
											$area_a[] = $level4["id"];												
										}
									}
									//var_dump($area_a);
									break;
								}
								else
								{
									foreach($level2['sub'] as $key3 => $level3)
									{
										
										if($level3["id"] == $_GET['industryid'])
										{
											$area_a[] = $level3["id"];
											foreach($level3['sub'] as $key4 => $level4)
											{												
												$area_a[] = $level4["id"];												
											}
											break;
										}
										else
										{
											foreach($level3['sub'] as $key4 => $level4)
											{
												
												if($level4["id"] == $_GET['industryid'])
												{
													$area_a[] = $level4["id"];
													break;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}		
		//echo $_SERVER["REMOTE_ADDR"] ;
		
		
		if ((isset($_GET['type']) && $_GET['type'] == 'offer') || isset($_GET["offer_page"]) ) {		
			
			$this->trade->initSearch();			

			//member connect
			if (isset($_GET['connectid'])) {
				uses("space");
				$space = new Space();
				
				$mem_ids = array();
				$mem_ids[] = $_GET['connectid'];
				
				$mems = $space->getFriends($_GET['connectid']);			
				foreach($mems as $item)
				{
					$mem_ids[] = $item["id"];
				}
				$mems = $space->getFollowFriends($_GET['connectid']);
				foreach($mems as $item)
				{
					$mem_ids[] = $item["member_id"];
				}
				
				$this->trade->condition[] = "Trade.member_id IN (".implode(',',$mem_ids).")";
				
			}
			
			if(!empty($area_a))
				foreach($this->trade->condition as $key => $item)
				{
					//echo "zz".strpos($item, "industry_id")."zz<br />";
					if(strpos($item, "industry_id") == 0)
					{
						
						$this->trade->condition[$key] = "Trade.industry_id IN (".implode(',',$area_a).")";
					}			
				}
			
			
			//for offer type
			if (isset($_GET['offertype']) && $_GET['offertype'] != 'all') {
				$this->trade->condition[] = 'Trade.type_id = '.$_GET['offertype'];
				
			}
			
			if(!empty($_GET["student"])) {
				$this->trade->condition[] = "Trade.for_student=1";
			}
			
			$products = $this->trade->Search($pos_pg, $num_per_page);
			$count = $this->trade->SearchCount();
			//var_dump($products);
			$space_controller = new Space();
			foreach($products as $key => $item)
			{
				$products[$key]["content"] = strip_tags(pb_lang_split($item['content']));
				$products[$key]["created"] = date('d/m/Y H:i', $item['created']);
				$products[$key]["enddate"] = date('d/m/Y', $item['created']+($item['expire_days']*24*3600));
				//$products[$key]["price"] = number_format($item["price"], 0, ',', '.');
				//$products[$key]["old_price"] = number_format($item["old_price"], 0, ',', '.');
				$products[$key]["name"] = fix_text_error($products[$key]["name"]);
				
				//get space_name
				$mem = $this->member->getInfoById($item['member_id']);
				$com = $this->company->getInfoByUserId($item['member_id']);
				
				
				
				$space_controller->setBaseUrlByUserId($mem["space_name"], "offer");
				$products[$key]['url'] = $space_controller->rewriteDetail("offer", $item['id']);
				
				if($com)
				{
					$aaaa = $this->area->disSubNames($com['area_id'], " / ", false, "product");
				}
				else
				{
					$aaaa = $this->area->disSubNames($mem['area_id'], " / ", false, "product");
				}
				
				$aaaa = explode(' / ', $aaaa);
				if($aaaa[1]) $products[$key]['area_names'] = $aaaa[1];
				
			}
			
			setvar("TotalCount", $count);
			setvar("Count", count($products));
			setvar("Products", $products);
			
			if(isset($_GET['leftbar']))
			{
				setvar("isConnect", 1);
				
			}
			$this->render("product/ajax.offerlist");
		
		}
		else
		{
			//Search for products
			$this->product->initSearch();
			$this->product->condition[] = "Product.state = 1";
			$this->product->condition[] = "Product.valid_status = 1";
			
			//
			if(empty($_GET['q'])) $this->product->condition[] = "Product.show = 1";
			
			
			
			if (isset($_GET['type']) && $_GET['type'] == 'service' || isset($_GET['service_page'])) {
				$this->product->condition[] = "Product.service = 1";
			}
			else
			{
				if ($_GET['type'] != 'sale')
				{
					$this->product->condition[] = "Product.service != 1";
				}
				
				//Condition to show products but not for sale products
				if ($_GET['type'] != 'sale' && $_GET['orderby'] != 'all')
				{
					if (isset($_GET['type']) && $_GET['type'] == 'other') {
						$other_con = " < 9";
						$company_has_logo = "OR c.picture = '' OR c.banners IS NULL";
					}
					else
					{
						$other_con = " > 8";
						$company_has_logo = "AND c.picture != '' AND c.banners IS NOT NULL";
					}
					
					$this->product->condition[] = "(c.new_product_show=1 AND c.id IN (".
								"SELECT id FROM (SELECT cc.id, COUNT(pp.id) AS pcount FROM {$this->product->table_prefix}companies AS cc INNER JOIN {$this->product->table_prefix}products AS pp ON cc.id = pp.company_id WHERE pp.status=1 AND pp.state=1 AND pp.valid_status=1 GROUP BY cc.id) AS kk WHERE pcount".$other_con.") ".$company_has_logo." )";
				}
				
			}
			
			//for sale
			if (isset($_GET['type']) && $_GET['type'] == 'sale') {
				$this->product->condition[] = 'Product.new_price != 0';
			}
			
			//member connect
			if (isset($_GET['connectid'])) {
				uses("space");
				$space = new Space();
				
				$mem_ids = array();
				$mem_ids[] = $_GET['connectid'];
				
				$mems = $space->getFriends($_GET['connectid']);			
				foreach($mems as $item)
				{
					$mem_ids[] = $item["id"];
				}
				
				$mems = $space->getFollowFriends($_GET['connectid']);
				foreach($mems as $item)
				{
					$mem_ids[] = $item["member_id"];
				}
				//var_dump($mem_ids);
				$this->product->condition[] = "Product.member_id IN (".implode(',',$mem_ids).")";
				
			}
			
			foreach($this->product->condition as $key => $item)
			{
				if(strpos($item, "industry_id"))
				{
					$this->product->condition[$key] = "Product.industry_id IN (".implode(',',$area_a).")";
					if($_GET['industryid'] == 0)
					{
						$this->product->condition[$key] = '1';
					}
				}			
			}
			
			if(!empty($_GET["student"])) {
				$this->product->condition[] = "Product.for_student=1";
			}
			
			//var_dump($this->product->condition);
			//testing code ne
			$products = $this->product->Search($pos_pg, $num_per_page);
			$count = $this->product->SearchCount();
			
			////top products for product main page
			//if ($_GET['orderby'] == 'dateline' && !$pos_pg)
			//{
			//	$top_products = $this->product->getTopProducts(4);
			//	//var_dump($top_products);
			//	foreach($top_products as $item) {
			//		array_unshift($products, $item);
			//	}				
			//}
			
			foreach($products as $pkey => $item)
			{
				$products[$pkey]["isfirst"] = "";
				if($pkey%5 == 0)
				{
					$products[$pkey]["isfirst"] = " first";
				}
				else if($pkey%5 == 4)
				{
					$products[$pkey]["isfirst"] = " last";
				}
			}
			
			//var_dump($result);
			
			//if($_GET['q'] != '') {
				if($count > 70*25-20) {
					$count = 70*25-20;
				}
			//}
			
			setvar("TotalCount", $count);
			setvar("Count", count($products));
			setvar("Products", $products);
			
			if($_GET["layout"]=='mobile') {
				$this->render("mobile/product/ajax_list");
			} else {
				$this->render("product/ajax.list");
			}
		}
	}
	
	function listSpaceAjax()
	{
		global $pos, $limit;
		$this->product->initSearch();
		
		if (!empty($_GET['pos_pg'])) {
 			$pos_pg = $_GET['pos_pg'];
 		}
		else
		{
			$pos_pg = 0;
		}
		
		if (isset($_GET['industryid'])) {
			//Get industry level 1
			$industries = $this->industry->getCacheIndustry();
			$area_a = array();
			$area_a[] = $_GET['industryid'];
			
			if (isset($_GET['type']) && $_GET['type'] == 'service') {
				$citem = $this->industry->read("*", $_GET['industryid'], null, array('id'=>$_GET['industryid']));
				//var_dump($citem);
				//echo $citem["top_parentid"];
				if($citem["top_parentid"])
				{
					$area_a[] = $citem["top_parentid"];
					$_GET['industryid'] = $citem["top_parentid"];
				}
			}			
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $_GET['industryid'])
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						$area_a[] = $level1["id"];
						foreach($level1['sub'] as $key2 => $level2)
						{
							$area_a[] = $level2["id"];
							foreach($level2['sub'] as $key3 => $level3)
							{
								$area_a[] = $level3["id"];
							}
						}
					}
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $_GET['industryid'])
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];
								}
							}
						}
						else
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET['industryid'])
								{
									$area_a[] = $level2["id"];
									//echo count($level2['sub']);
									foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];
									}
									//var_dump($area_a);
								}
								else
								{
									foreach($level2['sub'] as $key3 => $level3)
									{
										
										if($level3["id"] == $_GET['industryid'])
										{
											$area_a[] = $level3["id"];
										}
										else
										{
											foreach($level3['sub'] as $key4 => $level4)
											{
												
												if($level4["id"] == $_GET['industryid'])
												{
													$area_a[] = $level4["id"];
												}
											}
										}
									}
									
								}
							}
						}
					}
					
				}
			}
			//var_dump($area_a);
		}
		//echo $_GET['connectid'];
		//member connect
		if (isset($_GET['connectid'])) {
			
			$this->product->condition[] = "Product.company_id = '".$_GET['connectid']."'";
			
		}
		
		if (isset($_GET['type']) && $_GET['type'] == 'service') {
			$this->product->condition[] = "Product.service = 1";
		}		
		
		foreach($this->product->condition as $key => $item)
		{
			if(strpos($item, "industry_id"))
			{
				$this->product->condition[$key] = "Product.industry_id IN (".implode(',',$area_a).")";
			}			
		}
		if(isset($_GET["pos"])) $pos_pg = $_GET["pos"];
		$products = $this->product->Search($pos_pg, 40);
		
		foreach($products as $pkey => $item)
		{
			$products[$pkey]["isfirst"] = "";
			if($pkey%5 == 0)
			{
				$products[$pkey]["isfirst"] = " first";
			}
			else if($pkey%5 == 4)
			{
				$products[$pkey]["isfirst"] = " last";
			}
		}
		
		//var_dump($products);
		setvar("Count", count($products));
		setvar("Products", $products);
		$this->render("product/ajax_space.list");
	}
	
	function importAjax()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		//echo "dsfsdfd";
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		$query = "SELECT * FROM `pb_industries` WHERE level=2 AND id='".$_GET["id"]."'";                    
		
		//if ($result = $con->query($query)) {
		//	echo "sdfsdf";
		//	while($row = $result->fetch_assoc())
		//	{
		//		var_dump($row);
		//	}
		//}
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = "http://chodientu.vn/" . $row["tempurl"];
		//echo $row["parent_id"];
		//$content = file_get_contents($url);
		//$content = preg_replace('/^\s+|\n|\r|\s+$/m', '', $content);
		////echo $content;
		//
		//preg_match_all('/class\=\"parent_category(.*?)\<a(.*?)href\=\"(.*?)\"(.*?)\>(.*?)\<\/a(.*?)\<ul(.*?)sub-model(.*?)\<\/ul/', $content, $matches);
		//
		//var_dump($matches);
		//echo $row["name"];
		//echo "<br />".$url;
		//foreach($matches[5] as $kk => $item)
		//{
		//	echo $item."<br />";
		////	mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
		////					." (0, 0, NULL, '".$item."', '', '', 0, ".$row["id"].", ".$row["parent_id"].", 3, 0, NULL, 1, 0, 0, '".$matches[3][$kk]."')");
		//}
		
		$html = file_get_html($url);
		if($html->find('li.parent_category', 0))
		foreach($html->find('li.parent_category') as $article) {
			echo "<br />";
			$parent = $article->find('a', 0);
			$childs = $article->find('ul a');
			echo $parent->innertext;
			if(count($childs))
			{
				//echo $parent->href;
				
				
				$query = "SELECT * FROM `pb_industries` WHERE level=3 AND tempurl='".$parent->href."'";
				$result = $con->query($query);
				$row = $result->fetch_assoc();
				$parent_id = $row["id"];
				
				if($parent_id)
				{
					foreach($childs as $child) {
						$query = "SELECT * FROM `pb_industries` WHERE level=3 AND tempurl='".$child->href."'";
						$result = $con->query($query);
						$row = $result->fetch_assoc();
						//var_dump($row);
						
						$query = "UPDATE `pb_industries` SET parent_id='".$parent_id."',level=4 WHERE id='".$row["id"]."'";
						//echo $query;
						mysqli_query($con, $query);
					}
				}
				else
				{
					echo $parent->href;
				}
			}
			echo "<br />";echo "<br />";
		}
		
	}
	
	function importProductAjax()
	{
		//echo "dsfsdfd";
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		$query = "SELECT * FROM `pb_industries` WHERE level=3 AND id='".$_GET["id"]."'";                    
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = "http://chodientu.vn/" . $row["tempurl"];
		//echo $row["parent_id"];
		$content = file_get_contents($url);
		$content = preg_replace('/^\s+|\n|\r|\s+$/m', '', $content);
		//echo $content;
		
		preg_match_all('/class\=\"parent_category(.*?)\<a(.*?)href\=\"(.*?)\"(.*?)\>(.*?)\<\/a/', $content, $matches);

		//var_dump($matches);
		echo $row["name"];
		foreach($matches[5] as $kk => $item)
		{
			echo $item;
			//mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
			//				." (0, 0, NULL, '".$item."', '', '', 0, ".$row["id"].", ".$row["parent_id"].", 3, 0, NULL, 1, 0, 0, '".$matches[3][$kk]."')");
		}
		
	}
	
	function import()
	{
		$this->render("product/import");
	}
	
	
	function confirmorder()
	{
		//echo "sdfsdfs";
		global $viewhelper, $session;
		
		$order_id = $_SESSION["order_id"];
		$_SESSION["cart_id"] = null;
		$_SESSION["order_id"] = null;
		
		if($order_id) {
			//echo $order_id;
			//echo "send email";
			$this->sendTestMail($order_id);
		}
		
		$this->render("product/thankyou");
		
	}
	
	function meminfo()
	{
		global $viewhelper, $session;
		uses("cart", "cartitem", "member", "saleorder", "saleorderitem", "company");
		$company = new Companies();
		$cartitem = new Cartitems();
		$cart = new Carts();
		$member = new Members();
		$order = new Saleorders();
		$orderitem = new Saleorderitems();		
		
		$session_cart_id = $_SESSION['cart_id'];
		
		if(isset($_POST["data"]))
		{
			if(isset($_SESSION["order_id"])) {
				$order->deleteItems($_SESSION["order_id"]);
				$order->del($_SESSION["order_id"]);
			}
			if(isset($_GET["id"]))
			{				
				//var_dump($_POST["data"]);
				if(!isset($_POST["data"]["order"]["receiver_fullname"]))
				{
					$_POST["data"]["order"]["receiver_fullname"] = $_POST["data"]["order"]["fullname"];
					$_POST["data"]["order"]["receiver_mobile"] = $_POST["data"]["order"]["mobile"];
					$_POST["data"]["order"]["receiver_email"] = $_POST["data"]["order"]["email"];
					$_POST["data"]["order"]["receiver_address"] = $_POST["data"]["order"]["address"];					
				}
				
				$order_id = $order->add($_POST["data"]);
				$_SESSION["current_order_id"] = $order_id;
				//echo $order_id;
				$items = $cartitem->getDataByMemberID($session_cart_id, $_GET["id"]);
				//var_dump($items);
				if($items)
				{
					
					foreach($items[$_GET["id"]]['items'] as $item)
					{
						//echo $item['p_name'];
						$item_info['saleorder_id'] = $order_id;
						$item_info['product_id'] = $item['p_id'];
						$item_info['price'] = $item['p_price'];
						$item_info['quantity'] = $item['quantity'];
						
						//var_dump($item_info);
						$orderitem->add($item_info);
					}
					
					if($order_id)
					{
						$_SESSION["order_id"] = $order_id;
						
						$datas = $orderitem->getStickyDatas($order_id);
						$info = $order->read("*", $order_id);
						//var_dump($datas);
						//var_dump($order_id);
						
						foreach($datas["items"] as $key => &$item)
						{
							$item["p_total"] = number_format($item["p_price"]*$item["quantity"], 0, ',', '.');
							$item["p_price"] = number_format($item["p_price"], 0, ',', '.');
						}
						
						$datas["total"] = number_format($datas["total"], 0, ',', '.');
						//var_dump($datas);
						$seller = $member->read("c.shop_name,Member.*, mf.address, mf.mobile", $info["seller_id"], null, array('id'=>$info["seller_id"]), array("LEFT JOIN pb_memberfields mf ON mf.member_id=Member.id","LEFT JOIN pb_companies c ON c.member_id=Member.id"));
						
						setvar("Seller", $seller);
						setvar("StickyItems", $datas);
						setvar("Info", $info);
						setvar("total", $cartitem->total);
						
						render("product/confirmorder");
						exit;
					}
				}
			}
			
		}
		
		$pb_userinfo = pb_get_member_info();
		$pb_userinfo = $member->getInfoById($pb_userinfo['pb_userid']);
		$pb_company = $company->getInfoByUserId($pb_userinfo['id']);
		//var_dump($pb_company);
		
		setvar("Countries", $countries = cache_read("country"));
		setvar("pb_userinfo", $pb_userinfo);
		setvar("pb_company", $pb_company);
		//$viewhelper->setPosition("Cart");
		$this->render("product/meminfo");
	}
	
	function getStates()
	{
		uses("area");
		$area = new Areas();
		
		if(isset($_GET["country_id"]))
		{
			if($_GET["country_id"] == 1)
			{
				$state_parent = array(1, 2, 3, 4);
			}
			else if($_GET["country_id"] == 4)
			{
				$state_parent = array(1943, 1945, 1946);
			}
			
			//echo $_GET["country_id"];
			$rows = $area->getStates($state_parent);
			
			//echo "dg dfg d";
			foreach($rows as $row)
			{
				//echo $row['id'];
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
		}
	}
	
	function add_cart()
	{
		global $viewhelper, $session;
		//echo "vsdsdvsv";
		uses("cart", "cartitem");
		$cartitem = new Cartitems();
		$cart = new Carts();
		
		$session_cart_id = $_SESSION["cart_id"];
		//echo $session_cart_id;
		
		//create cart if empty
		if(!$session_cart_id)
		{
			$cart->params['data']['cart']['created'] = strtotime(date("Y-m-d H:i:s"));
			$result = $cart->add();		
			$key = $cart->table_name."_id";
			$_SESSION["cart_id"] = $cart->$key;			
			$session_cart_id = $cart->$key;
		}
		
		if(isset($_GET["id"]))
		{
			//add item			
			$cartitem->params['data']['cartitem']['cart_id'] = $session_cart_id;
			$cartitem->params['data']['cartitem']['product_id'] = $_GET["id"];
			
			$product = $this->product->read("*", intval($_GET["id"]));
			//var_dump($product);
			
			if(isset($_GET["amount"]))
			{
				//echo $_GET["amount"];
				$result = $cartitem->add($_GET["id"], $session_cart_id, '', $_GET["amount"]);
			}
			else
			{			
				$result = $cartitem->add($_GET["id"], $session_cart_id);
			}
		}
		
		if(isset($_GET["task"]))
		{
			if($_GET["task"] == "update")
			{
				//var_dump($_GET['product']);
				foreach($_GET['product'] as $key => $value)
				{
					//echo $value;
					$cartitem->updateQuantity($key, $value);
				}
			}			
			else if($_GET["task"] == "remove" && isset($_GET["cartitemid"]))
			{
				$cartitem->Remove($_GET["cartitemid"]);
			}
		}
		
		$datas = $cartitem->getStickyDatas($session_cart_id);
		$count = 0;
		foreach($datas as $key => &$item)
		{
			$item["total"] = number_format($item["total"], 0, ',', '.');
			//echo $item["total"];
			foreach($item["items"] as $key2 => $item2)
			{
				$item["items"][$key2]["p_price"] = number_format($item2["p_price"], 0, ',', '.');
				$item["items"][$key2]["p_total"] = number_format($item2["p_price"]*$item2["quantity"], 0, ',', '.');
				$count++;
			}
		}
		
		
		setvar("StickyItems", $datas);
		setvar("count", $count);
		setvar("total", $cartitem->total);
		
		
		if ($result) {
			//echo $result;
		}else{
			//echo $result;
		}
		
		
		
		//$viewhelper->setPosition("Cart");
		if(isset($_GET["template"]) && $_GET["template"] == "ajax")
		{
			if(isset($_GET["task"]) && $_GET["task"] == "remove" && $count == 0)
			{
				
				echo "<script>window.parent.$.fancybox.close();</script>";
			}
			else
			{
				echo "<script>window.parent.showCart();</script>";
			}			
		}
		else
		{
			$this->render("product/cart");
		}
	}
	
	function confirm_order()
	{
		if(isset($_GET["task"]))
		{
			//add item			
			//var_dump($_POST['data']);
		}
	}
	
	function getTopCartAjax()
	{
		global $viewhelper, $session;
		uses("cart", "cartitem");
		$cartitem = new Cartitems();
		$cart = new Carts();
		
		$session_cart_id = $_SESSION["cart_id"];
		//echo $session_cart_id;
		
		//create cart if empty
		if(!$session_cart_id)
		{
			$cart->params['data']['cart']['created'] = strtotime(date("Y-m-d H:i:s"));
			$result = $cart->add();		
			$key = $cart->table_name."_id";
			$_SESSION["cart_id"] = $cart->$key;			
			$session_cart_id = $cart->$key;
		}
		
		if(isset($_GET["id"]))
		{
			//add item			
			$cartitem->params['data']['cartitem']['cart_id'] = $session_cart_id;
			$cartitem->params['data']['cartitem']['product_id'] = $_GET["id"];
			
			
			
			if(isset($_GET["amount"]))
			{
				//echo $_GET["amount"];
				$result = $cartitem->add($_GET["id"], $session_cart_id, '', $_GET["amount"]);
			}
			else
			{			
				$result = $cartitem->add($_GET["id"], $session_cart_id);
			}
			//echo $cartitem->checkExist($_GET["id"], $session_cart_id)."gsdgs";
		}
		
		if(isset($_GET["task"]))
		{
			if($_GET["task"] == "update")
			{
				//var_dump($_GET['product']);
				foreach($_GET['product'] as $key => $value)
				{
					//echo $value;
					$cartitem->updateQuantity($key, $value);
				}
			}			
			else if($_GET["task"] == "remove" && isset($_GET["cartitemid"]))
			{
				$cartitem->Remove($_GET["cartitemid"]);
			}
		}
		
		$datas = $cartitem->getStickyDatas($session_cart_id);
		$count = 0;
		foreach($datas as $key => &$item)
		{
			$item["total"] = number_format($item["total"], 0, ',', '.');
			//echo $item["total"];
			foreach($item["items"] as $key2 => $item2)
			{
				$item["items"][$key2]["p_price"] = number_format($item2["p_price"], 0, ',', '.');
				$item["items"][$key2]["p_total"] = number_format($item2["p_price"]*$item2["quantity"], 0, ',', '.');
				$count += $item2["quantity"];
			}
		}
		
		
		setvar("StickyItems", $datas);
		setvar("total", $cartitem->total);
		setvar("count", $count);

		//$viewhelper->setPosition("Cart");
		$this->render("product/TopCartAjax");
	}
	
	function getTopCartAjaxNew()
	{
		global $viewhelper, $session;
		//echo "vsdsdvsv";
		uses("cart", "cartitem");
		$cartitem = new Cartitems();
		$cart = new Carts();
		
		$session_cart_id = $_SESSION["cart_id"];
		//echo $session_cart_id;
		
		//create cart if empty
		if(!$session_cart_id)
		{
			$cart->params['data']['cart']['created'] = strtotime(date("Y-m-d H:i:s"));
			$result = $cart->add();		
			$key = $cart->table_name."_id";
			$_SESSION["cart_id"] = $cart->$key;
			
			$session_cart_id = $cart->$key;
		}
		
		if(isset($_GET["id"]))
		{
			//add item			
			$cartitem->params['data']['cartitem']['cart_id'] = $session_cart_id;
			$cartitem->params['data']['cartitem']['product_id'] = $_GET["id"];
			
			
			
			if(isset($_GET["amount"]))
			{
				//echo $_GET["amount"];
				$result = $cartitem->add($_GET["id"], $session_cart_id, '', $_GET["amount"]);
			}
			else
			{			
				$result = $cartitem->add($_GET["id"], $session_cart_id);
				}
			//echo $cartitem->checkExist($_GET["id"], $session_cart_id)."gsdgs";
		}

		if(isset($_GET["task"]))
		{
			if($_GET["task"] == "update")
			{
				//var_dump($_GET['product']);
				foreach($_GET['product'] as $key => $value)
				{
					//echo $value;
					$cartitem->updateQuantity($key, $value);
				}
			}			
			else if($_GET["task"] == "remove" && isset($_GET["cartitemid"]))
			{
				$cartitem->Remove($_GET["cartitemid"]);
			}
		}
		
		$datas = $cartitem->getStickyDatas($session_cart_id);
		$count = 0;
		foreach($datas as $key => &$item)
		{
			$item["total"] = number_format($item["total"], 0, ',', '.');
			//echo $item["total"];
			foreach($item["items"] as $key2 => $item2)
			{
				$item["items"][$key2]["p_price"] = number_format($item2["p_price"], 0, ',', '.');
				$item["items"][$key2]["p_total"] = number_format($item2["p_price"]*$item2["quantity"], 0, ',', '.');
				$count += $item2["quantity"];
			}
		}

		setvar("StickyItems", $datas);
		setvar("total", $cartitem->total);
		setvar("count", $count);

		//$viewhelper->setPosition("Cart");
		$this->render("product/TopCartAjaxNew");
	}
	
	function sendTestMail($id)
	{
		require(PHPB2B_ROOT."libraries/sendmail.inc.php");
		require(CACHE_LANG_PATH."lang_site.php");
		uses("message","saleorder","saleorderitem","member");
		
		$saleorder = new Saleorders();
		$saleorderitem = new saleorderitems();
		$member = new Members();
		
		$pb_userinfo = pb_get_member_info();
		
		if ($id) {
			//$id = intval($_GET['id']);
			
		
						$datas = $saleorderitem->getStickyDatas($id);
						$info = $saleorder->read("*", $id, null, array('id'=>$id));
												
						$seller = $member->read("c.shop_name,Member.*, mf.address, mf.mobile", $info["seller_id"], null, array('id'=>$info["seller_id"]), array("LEFT JOIN pb_memberfields mf ON mf.member_id=Member.id","LEFT JOIN pb_companies c ON c.member_id=Member.id"));
						//var_dump($info);
						//var_dump($datas);
						
						foreach($datas["items"] as $key => &$item)
						{
							$item["p_total"] = number_format($item["p_price"]*$item["quantity"], 0, ',', '.');
							$item["p_price"] = number_format($item["p_price"], 0, ',', '.');
						}
						
						$datas["total"] = number_format($datas["total"], 0, ',', '.');
						
						setvar("StickyItems", $datas);
						setvar("Info", $info);
						setvar("total", $cartitem->total);
						setvar("Seller", $seller);
						
						//var_dump($arrTemplate);
				
				//get name				
				
				//send message to owner
				$memberfield = $this->memberfield->fields("*", array("member_id=".$pb_userinfo['pb_userid']));
				
				$smsname = $info["fullname"];

				$content = "<a href='".URL."virtual-office/sellerorder.php?do=view&id=".$info["id"]."'>".$smsname." đã đặt hàng</a>";
				$sms['content'] = mysql_real_escape_string($content);
				$sms['title'] = mysql_real_escape_string("Lịch sửa mua hàng");
				$sms['membertype_ids'] = '[1][2][3]';
				$result = $this->message->SendToUser($info['buyer_id'], $info["seller_id"], $sms);
				
						
			$sended = pb_sendmail(array($seller["email"], "Market Online"), "Market Online: ".$arrTemplate["_sell_orders"], "buyorder");
			$sended = pb_sendmail(array($info["email"], "Market Online"), "Market Online: ".$arrTemplate["_buy_orders"], "buyorder");
			$sended = pb_sendmail(array("xperiathinh@gmail.com", "Market Online"), "Market Online: New Order", "buyorder");
		}
		
		
	}
	
	function topIframe()
	{
		$this->render("product/TopIframe");
	}
	
	function change_banner()
	{
		uses("attachment","company");
		$pb_userinfo = pb_get_member_info();
		$attachment1 = new Attachment('upload_banner_1');
		$attachment2 = new Attachment('upload_banner_2');
		$attachment3 = new Attachment('upload_banner_3');
		$attachment4 = new Attachment('upload_banner_4');
		$attachment5 = new Attachment('upload_banner_5');
		
		$company = new Companies();
		//var_dump($pb_userinfo);
		//var_dump($_POST["com_id"]);
		$com = $company->read("member_id, banners", $_POST["com_id"]);
		//var_dump($com);
		$banners = array();
		$banners = json_decode($com["banners"], true);
		//var_dump($banners);
		
		if ($com["member_id"] == $_POST["memid"]) {
			
			if(!empty($_FILES['upload_banner_1']['name']))
			{
				$attachment1->if_watermark = false;
				$attachment1->if_thumb_middle = false;
				$attachment1->if_banner = true;
				$attachment1->rename_file = "company-banner1-".$_POST["com_id"];
				$attachment1->upload_process();
				
				$banners[1] = $attachment1->file_full_url;
			}
			
			if(!empty($_FILES['upload_banner_2']['name']))
			{
				$attachment2->if_watermark = false;
				$attachment2->if_thumb_middle = false;
				$attachment2->if_banner = true;
				$attachment2->rename_file = "company-banner2-".$_POST["com_id"];
				$attachment2->upload_process();
				
				$banners[2] = $attachment2->file_full_url;
			}
			
			if(!empty($_FILES['upload_banner_3']['name']))
			{
				$attachment3->if_watermark = false;
				$attachment3->if_thumb_middle = false;
				$attachment3->if_banner = true;
				$attachment3->rename_file = "company-banner3-".$_POST["com_id"];
				$attachment3->upload_process();
				
				$banners[3] = $attachment3->file_full_url;
				//$company->saveField('banner', $vals['banner'], intval($_POST["com_id"]));
			}
			
			if(!empty($_FILES['upload_banner_4']['name']))
			{
				$attachment4->if_watermark = false;
				$attachment4->if_thumb_middle = false;
				$attachment4->if_banner = true;
				$attachment4->rename_file = "company-banner4-".$_POST["com_id"];
				$attachment4->upload_process();
				
				$banners[4] = $attachment4->file_full_url;
				//$company->saveField('banner', $vals['banner'], intval($_POST["com_id"]));
			}
			
			if(!empty($_FILES['upload_banner_5']['name']))
			{
				$attachment5->if_watermark = false;
				$attachment5->if_thumb_middle = false;
				$attachment5->if_banner = true;
				$attachment5->rename_file = "company-banner5-".$_POST["com_id"];
				$attachment5->upload_process();
				
				$banners[5] = $attachment5->file_full_url;
				//$company->saveField('banner', $vals['banner'], intval($_POST["com_id"]));
			}
			
			//var_dump($banners);
			//pheader("location:".$_POST["uri"]);
			$company->saveField('banners', json_encode($banners), intval($_POST["com_id"]));
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_banner_()
	{
		uses("attachment","company");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('upload_banner');
		$company = new Companies();
		var_dump($pb_userinfo);
		//var_dump($_POST["com_id"]);
		$com = $company->read("member_id", $_POST["com_id"]);
		var_dump($com);
		
		if (!empty($_FILES['upload_banner']['name']) && $com["member_id"] == $pb_userinfo["pb_userid"]) {
			echo $_POST["com_id"];
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->rename_file = "company-banner-".$_POST["com_id"];
			$attachment->upload_process();
			$vals['banner'] = $attachment->file_full_url;
			$company->saveField('banner', $vals['banner'], intval($_POST["com_id"]));
			echo $vals['banner'];
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_logo_home()
	{
		uses("attachment","company");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('upload_logo');
		$company = new Companies();
		var_dump($pb_userinfo);
		//var_dump($_POST["com_id"]);
		$com = $company->read("member_id", $_POST["com_id"]);
		var_dump($com);
		
		if (!empty($_FILES['upload_logo']['name']) && $com["member_id"] == $pb_userinfo["pb_userid"]) {
			echo $_POST["com_id"];
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->if_logo = true;
			$attachment->rename_file = "company-logo-".$_POST["com_id"];
			$attachment->upload_process();
			$vals['picture'] = $attachment->file_full_url;
			$company->saveField('picture', $vals['picture'], intval($_POST["com_id"]));
			echo $vals['picture'];
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_logo()
	{
		uses("attachment","company");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('upload_logo');
		$company = new Companies();
		//var_dump($pb_userinfo);
		//var_dump($_POST["com_id"]);
		
		if (!empty($_FILES['upload_logo']['name'])) {
			echo $_POST["com_id"];
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->if_logo = true;
			if($_POST["com_id"] == "")
			{
				$date = new MyDateTime();
				$_POST["com_id"] = $date->getTimestamp()."-".rand(0,900);
			}
			
			$attachment->rename_file = "company-logo-".$_POST["com_id"];
			$attachment->upload_process();
			$vals['banner'] = $attachment->file_full_url;
			$company->saveField('picture', $vals['banner'], intval($_POST["com_id"]));
			//echo $vals['banner'];
			//pheader("location:".$_POST["uri"]);
			echo "<script>window.parent.changeLogo('".$vals['banner']."');</script>";
		}
	}
	
	function change_ava()
	{
		uses("attachment","member");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('upload_logo');
		$attachment->if_logo = true;
		$member = new Members();
		//var_dump($pb_userinfo);
		//var_dump($_POST["com_id"]);
		
		if (!empty($_FILES['upload_logo']['name'])) {
			echo $_POST["com_id"];
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->if_logo = true;
			
			if($_POST["com_id"] == "")
			{
				$date = new MyDateTime();
				$_POST["com_id"] = $date->getTimestamp();
			}
			
			$attachment->rename_file = "member-ava-".$_POST["com_id"];
			$attachment->upload_process();
			$vals['banner'] = $attachment->file_full_url;
			$member->saveField('photo', $vals['banner'], intval($_POST["com_id"]));
			//echo $vals['banner'];
			//pheader("location:".$_POST["uri"]);
			echo "<script>window.parent.changeLogo('".$vals['banner']."');</script>";
		}
	}
	
	function ajaxAnnouceBoxMember()
	{
		$this->render("product/ajaxAnnouceBoxMember");
	}
	
	function ajaxInbox()
	{
		uses("message");
		$pms = new Messages();
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$conditions[] = "Message.to_member_id=".$pb_userinfo["pb_userid"];
		
		//type filter
		if($user["current_type"])
		{
			$conditions[] = "CONCAT('[]',Message.membertype_ids,'[]') LIKE '%[".$user["current_type"]."]%'";
		}
		
		$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Message.from_member_id");
		
		$result = $pms->findAll("Message.*,c.picture,c.cache_spacename", $joins, $conditions, "Message.created DESC", 0, $this->MESSAGE_ANNOUNCE_COUNT);
		//echo count($result);
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++){
				$result[$i]['senddate'] = df($result[$i]['created']);
				switch ($result[$i]['type']) {
					case 'user':
						$result[$i]['typename'] = L("private_message", "tpl");
						break;
					case 'inquery':
						$result[$i]['typename'] = L("inquery_message", "tpl");
						break;
					default:
						$result[$i]['typename'] = L("system_message", "tpl");
						break;
				}
				if($result[$i]["picture"] && $result[$i]["membertype_ids"] != '[6]')
				{
					$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture"], '', 'smaller');
				}
				else
				{
					$member = $this->member->read("photo", $result[$i]["from_member_id"]);
					if($member["photo"])
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($member["photo"], '', 'small');
					}
					else
					{
						$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
					}
				}
				$result[$i]["created"] = date('d-m-Y H:i',$result[$i]["created"]);
				
				if($result[$i]["cache_spacename"]) {
					$result[$i]["logo_link"] = $pms->url(array("module"=>"space", "userid"=>$result[$i]["cache_spacename"]));
				}
				
				//if(!isset($_GET["type"])) $pms->saveField("status", 1, intval($result[$i]["id"]));
			}
			setvar("Items",$result);
		}
		
		//var_dump(count($result));
		//var_dump($result);
		$conditions[] = "Message.status=0";
		setvar("Link", $absolute_uri."virtual-office/pms.php");
		setvar("Count", $pms->findCount(null, $conditions));
		//setvar("Item", $result);
		$this->render("product/ajaxInbox");
	}
	
	function ajaxClearInbox()
	{
		uses("message");
		$pms = new Messages();
		$pb_userinfo = pb_get_member_info();
		
		$conditions[] = "Message.to_member_id=".$pb_userinfo["pb_userid"];
		//$conditions[] = "Message.status=0";
		$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Message.from_member_id");
		
		$result = $pms->findAll("Message.*,c.picture", $joins, $conditions, "Message.created DESC", 0, $this->MESSAGE_ANNOUNCE_COUNT);
		//echo count($result);
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++){
				
				//$result[$i]["created"] = df(strtotime($result[$i]["created"]), 'd-m-Y H:i');
				
				$pms->saveField("status", 1, intval($result[$i]["id"]));
			}
			//setvar("Items",$result);
		}
		
		//var_dump(count($result));
		//var_dump($result);
		//$conditions[] = "Message.status=0";
		//setvar("Link", $absolute_uri."virtual-office/pms.php");
		//setvar("Count", $pms->findCount(null, $conditions));
		//setvar("Item", $result);
		//$this->render("product/ajaxInbox");
	}
	
	function ajaxFollow()
	{
		uses("follow");
		$follow = new Follows();
		
		if(isset($_GET["shopid"]))
		{
			$shopid = intval($_GET['shopid']);
			$pb_userinfo = pb_get_member_info();
			//echo $pb_userinfo["pb_userid"];
			if($pb_userinfo ["pb_username"])
			{
				if($follow->addFollow($pb_userinfo["pb_userid"], $shopid))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
		}
	}
	
	function ajaxLoadMenuConnect()
	{
		$industries = $this->industry->getCacheIndustry();
		//echo $_GET['industryid'];
		
		$service = 0;
		if(isset($_GET["tipe"]))
		{
			if($_GET["tipe"] == 'service')
			{
				$service = 1;
			}
			else if($_GET["tipe"] == 'offer')
			{
				$service = 2;
			}
		}
		
		if($_GET['industryid'] == 0)
		{
			//foreach($industries as $key => $item)
			//{
			//	$industries[$key]["count"] = $this->industry->getCount($item["id"],$service);
			//}
			setvar("Items", $industries);				
			setvar("Map", "");
			$this->render("product/ajaxLoadMenuConnect");
			return;
		}
		
		foreach($industries as $key0 => $level0)
		{
			if($level0["id"] == $_GET['industryid'])
			{
				//foreach($level0['sub'] as $key => $item)
				//{
				//	$level0['sub'][$key]["count"] = $this->industry->getCount($item["id"],$service);
				//}			
				setvar("Items", $level0['sub']);				
				setvar("Map", " | <parent>".$level0["name"]."</parent>");
				$this->render("product/ajaxLoadMenuConnect");
				return;
			}
			else
			{
				foreach($level0['sub'] as $key1 => $level1)
				{
					if($level1["id"] == $_GET['industryid'])
					{
						//foreach($level1['sub'] as $key => $item)
						//{
						//	$level1['sub'][$key]["count"] = $this->industry->getCount($item["id"],$service);
						//}
						setvar("Items", $level1['sub']);
						setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | <parent>".$level1["name"]."</parent>");
						$this->render("product/ajaxLoadMenuConnect");
						exit;
					}
					else
					{
						foreach($level1['sub'] as $key2 => $level2)
						{
							if($level2["id"] == $_GET['industryid'])
							{
								//foreach($level2['sub'] as $key => $item)
								//{
								//	$level2['sub'][$key]["count"] = $this->industry->getCount($item["id"],$service);
								//}
								setvar("Items", $level2['sub']);
								setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> | <parent>".$level2["name"]."</parent>");
								$this->render("product/ajaxLoadMenuConnect");
								exit;
							}
							else
							{
								foreach($level2['sub'] as $key3 => $level3)
								{
									
									if($level3["id"] == $_GET['industryid'])
									{
										//foreach($level3['sub'] as $key => $item)
										//{
										//	$level3['sub'][$key]["count"] = $this->industry->getCount($item["id"],$service);
										//}
										setvar("Items", $level3['sub']);
										setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> | <a href='javascript:void(0)' rel='".$level2["id"]."'>".$level2["name"]."</a> | <parent>".$level3["name"]."</parent>");
										//echo "<a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> / <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> / <a href='javascript:void(0)' rel='".$level2["id"]."'>".$level2["name"]."</a> / ".$level3["name"];
										$this->render("product/ajaxLoadMenuConnect");
										exit;
									}									
								}
							}
						}
					}					
				}
			}
		}		
	}
	
	function ajaxLoadMenuConnectNoCache()
	{
		$industries = $this->industry->getCacheIndustry();
		//echo $_GET['industryid'];
		foreach($industries as $key0 => $level0)
		{
			if($level0["id"] == $_GET['industryid'])
			{
				foreach($level0['sub'] as $key => $item)
				{
					$level0['sub'][$key]["count"] = $this->industry->countProduct($item["id"], $_GET["member_id"]);
					
				}			
				setvar("Items", $level0['sub']);				
				setvar("Map", " | ".$level0["name"]);
				$this->render("product/ajaxLoadMenuConnect");
				return;
			}
			else
			{
				foreach($level0['sub'] as $key1 => $level1)
				{
					if($level1["id"] == $_GET['industryid'])
					{
						foreach($level1['sub'] as $key => $item)
						{
							$level1['sub'][$key]["count"] = $this->industry->countProduct($item["id"], $_GET["member_id"]);
						}
						setvar("Items", $level1['sub']);
						setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | ".$level1["name"]);
						$this->render("product/ajaxLoadMenuConnect");
						exit;
					}
					else
					{
						foreach($level1['sub'] as $key2 => $level2)
						{
							if($level2["id"] == $_GET['industryid'])
							{
								foreach($level2['sub'] as $key => $item)
								{
									$level2['sub'][$key]["count"] = $this->industry->countProduct($item["id"], $_GET["member_id"]);
								}
								setvar("Items", $level2['sub']);
								setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> | ".$level2["name"]);
								$this->render("product/ajaxLoadMenuConnect");
								exit;
							}
							else
							{
								foreach($level2['sub'] as $key3 => $level3)
								{
									
									if($level3["id"] == $_GET['industryid'])
									{
										foreach($level2['sub'] as $key => $item)
										{
											$level2['sub'][$key]["count"] = $this->industry->countProduct($item["id"], $_GET["member_id"]);
										}										
										setvar("Items", $level3['sub']);
										setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> | <a href='javascript:void(0)' rel='".$level2["id"]."'>".$level2["name"]."</a> | ".$level3["name"]);
										//echo "<a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> / <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> / <a href='javascript:void(0)' rel='".$level2["id"]."'>".$level2["name"]."</a> / ".$level3["name"];
										echo "Dfsdf";
										$this->render("product/ajaxLoadMenuConnect");
										exit;
									}									
								}
							}
						}
					}					
				}
			}
		}
	}
	
	function importVatgiaAjax()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		//echo "dsfsdfd";
		$con=mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		$query = "SELECT * FROM `pb_industries` WHERE level=2 AND id='".$_GET["id"]."'";                    
		
		
		$result = $con->query($query);
		$row = $result->fetch_assoc();
		$url = "http://www.vatgia.com" . $row["tempurl"];
		echo $url;
		
		//mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`) VALUES"
		//		."(0, 0, NULL, 'Hoa, quà tặng, đồ chơi', '', '', 0, 0, 0, 1, 0, NULL, 1, 0, 0)");
		
		//$html = file_get_html("vatgia.txt");
		//foreach($html->find('#root_1169 a') as $item) {
		//	//var_dump($item->innertext);
		//	if(isset($item->innertext) && $item->innertext != "")
		//	{
		//		//mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
		//		//			." (0, 0, NULL, '".trim($item->innertext)."', '', '', 0, 3788, 3788, 2, 0, NULL, 1, 0, 0, '".$item->href."')");
		//		
		//		//echo $item->innertext;
		//	}
		//}
		//
		
		$html = file_get_html($url);
		foreach($html->find('.temp_2 .raovat_category_list a') as $item) {
			echo $item->innertext;
			mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
							." (0, 0, NULL, '".trim($item->innertext)."', '', '', 0, ".$_GET["id"].", 3965, 1, 0, NULL, 3, 0, 0, '".$item->href."')");
		}
		
	}
	
	function importVatgia()
	{
		$this->render("product/importVatgia");		
	}
	
	function getArrayIndustry($id)
	{
		//$_GET['industryid'] = $id;
		if (isset($id)) {
			//Get industry level 1
			$industries = $this->industry->getCacheIndustry();
			//var_dump($industries);
			$area_a = array();
			$area_a[] = $id;
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $id)
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						$area_a[] = $level1["id"];
						if(isset($level1['sub']))foreach($level1['sub'] as $key2 => $level2)
						{
							$area_a[] = $level2["id"];
							if(isset($level2['sub'])) foreach($level2['sub'] as $key3 => $level3)
							{
								$area_a[] = $level3["id"];
							}
						}
					}
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $id)
						{
							if(isset($level1['sub'])) foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								if(isset($level2['sub'])) foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];
								}
							}
						}
						else
						{
							if(isset($level1['sub'])) foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $id)
								{
									$area_a[] = $level2["id"];
									//echo count($level2['sub']);
									if(isset($level2['sub'])) foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];
									}
									//var_dump($area_a);
								}
								else
								{
									if(isset($level2['sub'])) foreach($level2['sub'] as $key3 => $level3)
									{
										
										if($level3["id"] == $id)
										{
											$area_a[] = $level3["id"];
										}										
									}
									
								}
							}
						}
					}
					
				}
			}
			return $area_a;
		}
		return false;
	}
	
	function ajaxDeleteImage()
	{
		uses("attachment","company");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('');
		
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
		
		$product = $this->product->read("id, default_pic, ".$pic_col, $pid);
		
		if($product)
		{
			if($product['default_pic'] != $pos - 1)
			{
				$attachment->deleteBySource($product[$pic_col]);
				if($this->product->saveField($pic_col, '', $pid))
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
		$pid = intval($_GET['pid']);
		$pos = $_GET["pos"]-1;
		
		
		$product = $this->product->read("id", $pid);
		
		if($product)
		{			
				if($this->product->saveField('default_pic', $pos, $pid))
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
	
	
	
	function uploadEditorFile()
	{
		uses("attachment");
		$attachment = new Attachment('uploadEditorFile');
		
		$attachment->if_thumb = false;
		$attachment->if_thumb_large = false;
		echo "sdfsdf";
		$pb_userinfo = pb_get_member_info();
		//$pb_userinfo = $member->getInfoById($pb_userinfo['pb_userid']);
		
		$date = new DateTime();
		//echo $date->getTimestamp();
		//var_dump($_FILES);
		
		$tag = "";
		if(isset($_POST["tag"]))
		{
			$tag = $_POST["tag"]."-";
		}
		
		if (!empty($_FILES['uploadEditorFile']['name'])) {
			$attach_id = $tag."editor_pic-".$pb_userinfo['pb_userid']."-".(strtotime(date("Y-m-d h:i:s")));
			$attachment->rename_file = $attach_id;
			$attachment->upload_editor_process();
			
			$file_source = $attachment->file_full_url;
		}
		//echo "<script type='text/javascript' src='{$theme_img_path}js/jquery.js?ver=1.8.3'></script>";
		echo "<script>window.parent.inserEditorFile('".$file_source."', ".$attachment->is_image.");</script>";
		//setvar("file_source", $file_source);
		//$this->render("product/insertEditorIFrame");
	}
	
	function uploadCustomBGFile()
	{
		uses("attachment","company");
		$attachment = new Attachment('uploadEditorFile');
		$company = new Companies();
		
		$attachment->if_thumb = false;
		$attachment->if_thumb_large = false;
		echo "sdfsdf";
		$pb_userinfo = pb_get_member_info();
		
		$com = $company->read("member_id", $_POST["com_id"]);
		var_dump($com);
		
		//if (isset($_POST["style"]) && $com["member_id"] == $pb_userinfo["pb_userid"]) {
		
		$date = new DateTime();
		//echo $date->getTimestamp();
		//var_dump($_FILES);
		
		if (!empty($_FILES['uploadEditorFile']['name']) && $com["member_id"] == $pb_userinfo["pb_userid"]) {
			$attach_id = "custombg_pic-".$_POST["com_id"];
			$attachment->rename_file = $attach_id;
			$attachment->upload_editor_process();
			
			$file_source = $attachment->file_full_url;
			echo $file_source;
		}
		//echo "<script type='text/javascript' src='{$theme_img_path}js/jquery.js?ver=1.8.3'></script>";
		echo "<script>window.parent.inserCustomBGFile('".$file_source."', ".$attachment->is_image.");</script>";
		//setvar("file_source", $file_source);
		//$this->render("product/insertEditorIFrame");
	}
	
	function ajaxListLinks()
	{
		$pb_userinfo = pb_get_member_info();
		//get links and follows
		uses("space");
		$space = new Space();
		$links = $space->getFriends($pb_userinfo['pb_userid']);

		//foreach($links as $key => $item)
		//{
		//	$links[$key]["image"] = pb_get_attachmenturl($item['company_picture'], '', 'small');
		//	//$links[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		//}
		
		//$follows = $space->getFollowFriends($pb_userinfo['pb_userid']);
		//foreach($follows as $key => $item)
		//{
		//	$follows[$key]["image"] = pb_get_attachmenturl($item['picture'], '', 'small');
		//	$follows[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		//	
		//}
		
		setvar('count_links', count($links));
		setvar('links', $links);
		$this->render("product/ajaxListLinks");
	}
	
	function ajaxListFollows()
	{
		$pb_userinfo = pb_get_member_info();
		//get links and follows
		uses("space");
		$space = new Space();

		$follows = $space->getFollowFriends($pb_userinfo['pb_userid']);
		//foreach($follows as $key => $item)
		//{
		//	//$follows[$key]["image"] = pb_get_attachmenturl($item['picture'], '', 'small');
		//	//$follows[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		//	
		//}
		//var_dump($follows);
		setvar('count_follows', count($follows));
		setvar('follows', $follows);
		$this->render("product/ajaxListFollows");
	}
	
	function ajaxCountProdutsIndustry($id)
	{
		uses("industry");
		
		$industry = new Industries();
		$industries = $industry->getCacheIndustry();
		
		foreach($industries as $key => $item)
		{
			//if($industry->countProduct($item["id"]))
			//{
				//$industries[$key]["count"] = $industry->countProduct($item["id"]);
				//$industries[$key]["count"] = $industry->countProduct($item["id"]);
				//$industry->saveField('count', $industry->countProduct($item["id"]), (int)$item["id"]);
				
				//echo $industries[$key]["count"];
			//}
			
			foreach($item["sub"] as $item1)
			{
				$industry->saveField('count', $industry->countProduct($item1["id"]), (int)$item1["id"]);
				foreach($item1["sub"] as $item2)
				{
					//$industry->saveField('count', $industry->countProduct($item2["id"]), (int)$item2["id"]);
					foreach($item2["sub"] as $item3)
					{
						//$industry->saveField('count', $industry->countProduct($item3["id"]), (int)$item3["id"]);
						//echo $item3["name"]."-".$industry->countProduct($item3["id"])."<br />";
					}
				}
			}
		}
	}
	
	function updateIndustriesChildren()
	{
		//uses("industry");		
		if(isset($_GET['industryid']))
			$this->updateIndustryChildren($_GET['industryid']);
		
		//$industry = new Industries();
		//$industries = $industry->getCacheIndustry();
		//
		//foreach($industries as $key => $item)
		//{
		//	foreach($item["sub"] as $item1)
		//	{
		//		//$industry->saveField('count', $industry->countProduct($item1["id"]), (int)$item1["id"]);
		//		foreach($item1["sub"] as $item2)
		//		{
		//			//$industry->saveField('count', $industry->countProduct($item2["id"]), (int)$item2["id"]);
		//			foreach($item2["sub"] as $item3)
		//			{
		//				//$industry->saveField('count', $industry->countProduct($item3["id"]), (int)$item3["id"]);						
		//			}
		//		}
		//	}
		//}
	}
	
	function updateIndustryChildren($id)
	{
		return $this->industry->updateIndustryChildren($id);
	}
	
	function getNewClickedCompany()
	{
		//echo $_GET["id"];
		if(isset($_GET["id"]))
		{
			$com = $this->company->read("new_clicked, new_clicked_date", $_GET["id"]);
			if($com["new_clicked"]) echo '<span class="outcount"><span>'.$com["new_clicked"].'</span></span>';
			if($com["new_clicked_date"])
				echo '<div class="clicked_note_box over_air_box">Có <strong>'.$com["new_clicked"].'</strong> lượt khách mới truy cập<br />Từ ngày '.date('d-m-Y', strtotime($com["new_clicked_date"])).' lúc '.date('H:i', strtotime($com["new_clicked_date"])).'</div>';
			else
				echo '<div class="clicked_note_box over_air_box">Chưa có thống kê</div>';
		}
		else
		{
			echo false;
		}
	}
	
	function refreshNewClickedCompany()
	{
		//echo intval($_GET["id"]);
		if(isset($_GET["id"]))
		{
			$this->company->saveField("new_clicked", 0, intval($_GET["id"]));
			$this->company->saveField("new_clicked_date", date('d-m-Y H:i:s'), intval($_GET["id"]));
			echo '<div class="clicked_note_box over_air_box">Có <strong>0</strong> lượt khách mới truy cập<br />Từ ngày '.date('d-m-Y').' lúc '.date('H:i').'</div>';
		}
		else
		{
			echo false;
		}
	}
	
	function getCustomIndustriesByParent()
	{
		$id = intval($_GET["id"]);
		$member_id = intval($_GET["member_id"]);
		setvar("list", $this->producttype->getCustomIndustriesByParent($id, $member_id));
		$this->render("product/ajaxGetCustomIndustriesByParent");
	}
	
	function getCustomIndustriesByCustomParent()
	{
		$id = intval($_GET["id"]);
		$member_id = intval($_GET["member_id"]);
		setvar("list", $this->producttype->getCustomIndustriesByCustomParent($id, $member_id));
		$this->render("product/ajaxGetCustomIndustriesByParent");
	}
	
	function getCustomIndustriesByCurrent()
	{
		$id = intval($_GET["id"]);
		$member_id = intval($_GET["member_id"]);
		//var_dump($this->producttype->getCustomIndustriesByCurrent($id, $member_id));
		setvar("list", $this->producttype->getCustomIndustriesByCurrent($id, $member_id));
		$this->render("product/ajaxGetCustomIndustriesByCurrent");
	}
	
	function changeSpaceStyle()
	{
		var_dump($_POST["style"]);
		uses("attachment","company");
		$pb_userinfo = pb_get_member_info();		
		$company = new Companies();
		//var_dump($pb_userinfo);
		//var_dump($_POST["com_id"]);
		$com = $company->read("member_id", $_POST["com_id"]);
		//var_dump($com);
		
		if (isset($_POST["style"]) && $com["member_id"] == $pb_userinfo["pb_userid"]) {
			
			if(isset($_POST["save"]))
			{
				$company->saveField('custom_style', mysql_real_escape_string(json_encode($_POST["style"])), intval($_POST["com_id"]));
				pheader("location:".$_POST["uri"]);
			}
			else if(isset($_POST["reset"]))
			{
				$company->saveField('custom_style', "", intval($_POST["com_id"]));
				pheader("location:".$_POST["uri"]);
			}
		}
	}
	
	function resizeBanner()
	{
		global $attachment_dir;
		$path = PHPB2B_ROOT.$attachment_dir;
		$companies = $this->company->findAll("id, banners", null, array("banners IS NOT NULL"));
		//foreach()
		foreach($companies as $item)
		{
			$pics = json_decode($item["banners"]);
			foreach($pics as $pic)
			{
				$source = $path."/".$pic;
				list($width, $height) = @getimagesize($source);
				echo $width;
				echo "sdfsdfsdfsdf";
				require_once(LIB_PATH. "wideimage/WideImage.php");
				$image = WideImage::load($source);
				$resized = $image->resize(907, 339, 'outside');
				
				$new_pos_top = 0;
				$new_pos_left = 0;
				$tile_goc = $width/$height;
				$tile_sauresize = 907/339;
				
				if($tile_goc < $tile_sauresize)
				{
					$new_pos_top = ($height/($width/907)-339)/2;
				}
				else
				{
					$new_pos_left = ($width/($height/339)-907)/2;
				}
				
				$cropped = $resized->crop($new_pos_left, $new_pos_top, 907, 339);
				$cropped->saveToFile($path."/".$pic.".banner.jpg");
			}
			
		}
		echo PHPB2B_ROOT. $attachment_dir;
	}
	
	function resizeOffer()
	{
		global $attachment_dir;
		$path = PHPB2B_ROOT.$attachment_dir;
		$trades = $this->trade->findAll("id,picture as picture0,picture1,picture2,picture3,picture4", null, null, "created DESC");
		//var_dump($trades);
		foreach($trades as $item)
		{
			for($i = 0; $i < 5; $i++)
			{
				$pic = $item["picture".$i];
				if(!empty($pic))
				{					
					echo $pic;
					$source = $path."/".$pic;
					list($width, $height) = @getimagesize($source);
					//echo $width;
					//echo "sdfsdfsdfsdf";
					require_once(LIB_PATH. "wideimage/WideImage.php");
					$image = WideImage::load($source);
					
					$param_w = 150;
					$param_h = 120;
					
					$resized = $image->resize($param_w, $param_h, 'outside');
					//
					$new_pos_top = 0;
					$new_pos_left = 0;
					$tile_goc = $width/$height;
					$tile_sauresize = $param_w/$param_h;
					//
					if($tile_goc < $tile_sauresize)
					{
						$new_pos_top = ($height/($width/$param_w)-$param_h)/2;
					}
					else
					{
						$new_pos_left = ($width/($height/$param_h)-$param_w)/2;
					}
					
					$cropped = $resized->crop($new_pos_left, $new_pos_top, $param_w, $param_h);
					$cropped->saveToFile($path."/".$pic.".small.jpg");
				}
			}
			
		}
		//echo PHPB2B_ROOT. $attachment_dir;
	}
	
	function resizeLogo()
	{
		global $attachment_dir;
		
		uses("attachment");
		$att = new Attachment();
		
		$path = PHPB2B_ROOT.$attachment_dir;
		$companies = $this->company->findAll("id, picture", null, null, "created DESC", 100, 100);
		//foreach()
		foreach($companies as $item)
		{
			
			$source = $path."/".$item["picture"];
			echo $source."<br />";
			try
			{
				$att->resizeImage($source, 300, 300, "small");
				$att->resizeImage($source, 100, 100, "smaller");
			}
			catch (Exception $e)
			{}
		}
		
	}
	
	function loadAlbumDetail()
	{
		//var_dump($_GET);
		uses("album");
		$album = new Albums();
		$joins[] = "LEFT JOIN {$this->product->table_prefix}attachments a ON a.id=Album.attachment_id";
		$result = $album->findAll("a.title,a.description,Album.id,a.attachment as thumb", $joins, "Album.member_id='".intval($_GET["user"])."' AND a.id='".intval($_GET["id"])."'", "Album.id desc");
		
		//if (!empty($result)) {
		//	$count = count($result);
		//	for($i=0; $i<$count; $i++){
		//		$result[$i]['image'] = URL. pb_get_attachmenturl($result[$i]['thumb'], '', 'small');
				$result[0]['middleimage'] = pb_get_attachmenturl($result[0]['thumb']);
		//	}
		//}
		//var_dump($result);
		setvar("Item", $result[0]);
		$this->render("product/loadAlbumDetail");
	}
	
	function banner_click()
	{
		if(isset($_GET["id"]))
		{
			$id = intval($_GET["id"]);
			uses("ad");
			$ads = new Adses();
		
			$ad = $ads->read("id,target_url,clicked", $id);
			$ads->saveField("clicked", $ad["clicked"]+1, $id, array("state='1'","status='1'"));
			if($ad["target_url"])
			{
				pheader("location:".$ad["target_url"]);
			}
			else
			{
				pheader("location:".URL);
			}
			
		}
	}
	
	function postcomment()
	{		
		$pb_userinfo = pb_get_member_info();
		//var_dump($pb_userinfo);
		uses('Productcomment','company','space');
		$productcomment = new Productcomments();
		$space_controller = new Space();
		$company = new Companies();
		
		$memberfield = $this->memberfield->fields("*", array("member_id=".$pb_userinfo['pb_userid']));
		//var_dump($memberfield);
		
		if(isset($_POST["data"]))
		{
			pb_submit_check('data');
			if($pb_userinfo){
				$val["member_id"] = $pb_userinfo['pb_userid'];
				$com = $company->getInfoByUserId($val["member_id"]);
				//$com_from = $company->getInfoByUserId($val["member_id"]);
				$val["company_id"] = $com["id"];
				
				$p = $this->product->read("*", intval($_POST["data"]["id"]));
				
				if($pb_userinfo['pb_userid'] != $p["member_id"]) {
					//send message to owner
					$sms['content'] = mysql_real_escape_string("<a href='".$space_controller->rewrite($com['cache_spacename'])."'>".$memberfield["first_name"]." ".$memberfield["last_name"]."</a> đã bình luận cho sản phẩm <a href='".$this->product->url(array("module"=>"product", "id"=>$p['id']))."#comment_link'>".$p["name"]."</a> của bạn:<br />'".$_POST["data"]["content"]."'");
					$sms['title'] = mysql_real_escape_string($pb_userinfo['pb_username']. " đã bình luận cho sản phẩm ".$p["name"]." của bạn");
					
					$sms['membertype_ids'] = '[1][2][3]';
					
					$result = $this->message->SendToUser($pb_userinfo['pb_userid'], $p["member_id"], $sms);
					//var_dump($pb_userinfo['pb_userid']);
				}
			}
			elseif (isset($_POST["data"]["guest_name"]) && isset($_POST["data"]["guest_email"]))
			{
				$val["guest_name"] = $_POST["data"]["guest_name"];
				$val["guest_email"] = $_POST["data"]["guest_email"];
				
				$p = $this->product->read("*", intval($_POST["data"]["id"]));				
				
				//send message to owner
				$sms['content'] = mysql_real_escape_string("<strong>".$val["guest_name"]." (".$val["guest_email"].")</strong> đã bình luận cho sản phẩm <a href='".$this->product->url(array("module"=>"product", "id"=>$p['id']))."#comment_link'>".$p["name"]."</a> của bạn:<br />'".$_POST["data"]["content"]."'");
				$sms['title'] = mysql_real_escape_string($val["guest_name"]. " đã bình luận cho sản phẩm ".$p["name"]." của bạn");
				$sms['membertype_ids'] = '[1][2][3]';
				$result = $this->message->SendToUser(0, $p["member_id"], $sms);
			}
			
			$val["product_id"] = $_POST["data"]["id"];
			$val["content"] = $_POST["data"]["content"];
			$val["created"] = date('Y-m-d H:i:s');
			if((isset($val["guest_name"]) && isset($val["guest_email"])) || $pb_userinfo)
			{
				$productcomment->save($val);			
			}
		}
		
		if(isset($_POST["id"]))
		{
			$val["product_id"] = intval($_POST["id"]);
		}
		
		$comments = $productcomment->findAll("Productcomment.*,m.username,m.space_name,mf.first_name,mf.last_name, c.picture as company_logo", array("LEFT JOIN {$productcomment->table_prefix}members m ON Productcomment.member_id=m.id", "LEFT JOIN {$productcomment->table_prefix}memberfields mf ON Productcomment.member_id=mf.member_id", "LEFT JOIN {$productcomment->table_prefix}companies c ON Productcomment.company_id=c.id"), array("product_id=".$val["product_id"]), "Productcomment.created DESC");
		//var_dump($comments);
		
		foreach($comments as $key => $item)
		{
			if($item["company_logo"])
			{
				$comments[$key]["company_logo"] = pb_get_attachmenturl($item["company_logo"], '', 'smaller');
			}
			else
			{
				$member = $this->member->read("photo", $item["member_id"]);
				if($member["photo"])
				{
					$comments[$key]["company_logo"] = pb_get_attachmenturl($member["photo"], '', 'small');
				}
				else
				{
					$comments[$key]["company_logo"] = URL."templates/default/image/usericon_big.png";
				}
			}
			
			$comments[$key]["created"] = df(strtotime($comments[$key]["created"]), 'd-m-Y H:i');
		}
		
		
		
		
		setvar("comments", $comments);
		$this->render("product/comments");
	}
	
	function postoffercomment()
	{		
		$pb_userinfo = pb_get_member_info();
		//var_dump($pb_userinfo);
		uses('Tradecomment','company','space');
		$tradecomment = new Tradecomments();
		$space_controller = new Space();
		$company = new Companies();
		
		$memberfield = $this->memberfield->fields("*", array("member_id=".$pb_userinfo['pb_userid']));
		//var_dump($memberfield);
		
		if(isset($_POST["data"]))
		{
			pb_submit_check('data');
			if($pb_userinfo){
				$val["member_id"] = $pb_userinfo['pb_userid'];
				$com = $company->getInfoByUserId($val["member_id"]);
				//$com_from = $company->getInfoByUserId($val["member_id"]);
				$val["company_id"] = $com["id"];
				
				$p = $this->trade->read("*", intval($_POST["data"]["id"]));
				
				$space_controller->setBaseUrlByUserId($p["member_id"], "offer");
				$url = $space_controller->rewriteDetail("offer", $p['id']);		
				
				if($pb_userinfo['pb_userid'] != $p["member_id"]) {
					//send message to owner
					$sms['content'] = mysql_real_escape_string("<a href='".$space_controller->rewrite($com['cache_spacename'])."'>".$memberfield["first_name"]." ".$memberfield["last_name"]."</a> đã bình luận cho rao vặt <a onclick='getOfferDetail(".$p["id"].", 1)' href='javascript:void(0)'>".pb_lang_split($p["title"])."</a> của bạn:<br />".$_POST["data"]["content"]."'");
					$sms['title'] = mysql_real_escape_string($pb_userinfo['pb_username']. " đã bình luận cho rao vặt ".$p["title"]." của bạn");
					$sms['membertype_ids'] = '[1][2][3]';
					$result = $this->message->SendToUser($pb_userinfo['pb_userid'], $p["member_id"], $sms);
					//var_dump($pb_userinfo['pb_userid']);
				}
			}
			else
			{
				$val["guest_name"] = $_POST["data"]["guest_name"];
				$val["guest_email"] = $_POST["data"]["guest_email"];
				
				$p = $this->trade->read("*", intval($_POST["data"]["id"]));				
				
				//send message to owner
				$sms['content'] = mysql_real_escape_string("<strong>".$val["guest_name"]." (".$val["guest_email"].")</strong> đã bình luận cho rao vặt <a onclick='getOfferDetail(".$p["id"].", 1)' href='javascript:void(0)'>".$p["name"]."</a> của bạn:<br />'".$_POST["data"]["content"]."'");
				$sms['title'] = mysql_real_escape_string($val["guest_name"]. " đã bình luận cho rao vặt ".$p["name"]." của bạn");
				$sms['membertype_ids'] = '[1][2][3]';
				$result = $this->message->SendToUser(0, $p["member_id"], $sms);
			}
			
			$val["trade_id"] = $_POST["data"]["id"];
			$val["content"] = $_POST["data"]["content"];
			$val["created"] = date('Y-m-d H:i:s');
			$tradecomment->save($val);
			
			
		}
		
		if(isset($_POST["id"]))
		{
			$val["trade_id"] = intval($_POST["id"]);
		}
		
		$comments = $tradecomment->findAll("Tradecomment.*,m.username,m.space_name,mf.first_name,mf.last_name, c.picture as company_logo", array("LEFT JOIN {$tradecomment->table_prefix}members m ON Tradecomment.member_id=m.id", "LEFT JOIN {$tradecomment->table_prefix}memberfields mf ON Tradecomment.member_id=mf.member_id", "LEFT JOIN {$tradecomment->table_prefix}companies c ON Tradecomment.company_id=c.id"), array("trade_id=".$val["trade_id"]), "Tradecomment.created DESC");
		//var_dump($comments);
		foreach($comments as $key => $item)
		{
			if($item["company_logo"])
			{
				$comments[$key]["company_logo"] = pb_get_attachmenturl($item["company_logo"], '', 'smaller');
			}
			else
			{
				$member = $this->member->read("photo", $item["member_id"]);
				if($member["photo"])
				{
					$comments[$key]["company_logo"] = pb_get_attachmenturl($member["photo"], '', 'small');
				}
				else
				{
					$comments[$key]["company_logo"] = URL."templates/default/image/usericon_big.png";
				}
			}
			
			$comments[$key]["created"] = df(strtotime($comments[$key]["created"]), 'd-m-Y H:i');
		}
		
		
		
		
		setvar("comments", $comments);
		$this->render("product/offercomments");
	}
	
	function postattachmentcomment()
	{		
		$pb_userinfo = pb_get_member_info();
		uses('attachmentcomment','company','space');
		$attachmentcomment = new Attachmentcomments();
		$space_controller = new Space();
		$company = new Companies();
		
		$memberfield = $this->memberfield->fields("*", array("member_id=".$pb_userinfo['pb_userid']));
		
		if(isset($_POST["data"]))
		{
			pb_submit_check('data');
			if($pb_userinfo){
				$val["member_id"] = $pb_userinfo['pb_userid'];
				$com = $company->getInfoByUserId($val["member_id"]);
				//$com_from = $company->getInfoByUserId($val["member_id"]);
				$val["company_id"] = $com["id"];
				
				$p = $this->album->getInfoById(intval($_POST["data"]["id"]));
				
				$space_controller->setBaseUrlByUserId($p["member_id"], "offer");
				$url = $space_controller->rewriteDetail("offer", $p['id']);		
				
				if($pb_userinfo['pb_userid'] != $p["member_id"]) {
					//send message to owner
					$sms['content'] = mysql_real_escape_string("<a href='".$space_controller->rewrite($com['cache_spacename'])."'>".$memberfield["first_name"]." ".$memberfield["last_name"]."</a> đã bình luận cho hình ảnh/videos <a href='".$p["href"]."'>".pb_lang_split($p["title"])."</a> của bạn:<br />".$_POST["data"]["content"]."'");
					$sms['title'] = mysql_real_escape_string($pb_userinfo['pb_username']. " đã bình luận cho hình ảnh/video ".$p["title"]." của bạn");
					$sms['membertype_ids'] = '[1][2][3]';
					$result = $this->message->SendToUser($pb_userinfo['pb_userid'], $p["member_id"], $sms);
					//var_dump($pb_userinfo['pb_userid']);
				}
			}
			else
			{
				$val["guest_name"] = $_POST["data"]["guest_name"];
				$val["guest_email"] = $_POST["data"]["guest_email"];
				
				$p = $this->album->read("*", intval($_POST["data"]["id"]));				
				
				//send message to owner
				$sms['content'] = mysql_real_escape_string("<strong>".$val["guest_name"]." (".$val["guest_email"].")</strong> đã bình luận cho hình ảnh/videos <a href='".$p["href"]."'>".$p["title"]."</a> của bạn:<br />'".$_POST["data"]["content"]."'");
				$sms['title'] = mysql_real_escape_string($val["guest_name"]. " đã bình luận cho hình ảnh/video ".$p["title"]." của bạn");
				$sms['membertype_ids'] = '[1][2][3]';
				$result = $this->message->SendToUser(0, $p["member_id"], $sms);
			}
			
			$val["attachment_id"] = $_POST["data"]["id"];
			$val["content"] = $_POST["data"]["content"];
			$val["created"] = date('Y-m-d H:i:s');
			$attachmentcomment->save($val);
			
			
		}
		
		if(isset($_POST["id"]))
		{
			$val["attachment_id"] = intval($_POST["id"]);
		}
		
		$comments = $attachmentcomment->findAll("Attachmentcomment.*,m.username,m.space_name,mf.first_name,mf.last_name, c.picture as company_logo", array("LEFT JOIN {$attachmentcomment->table_prefix}members m ON Attachmentcomment.member_id=m.id", "LEFT JOIN {$attachmentcomment->table_prefix}memberfields mf ON Attachmentcomment.member_id=mf.member_id", "LEFT JOIN {$attachmentcomment->table_prefix}companies c ON Attachmentcomment.company_id=c.id"), array("attachment_id=".$val["attachment_id"]), "Attachmentcomment.created DESC");
		//var_dump($comments);
		foreach($comments as $key => $item)
		{
			if($item["company_logo"])
			{
				$comments[$key]["company_logo"] = pb_get_attachmenturl($item["company_logo"], '', 'smaller');
			}
			else
			{
				$member = $this->member->read("photo", $item["member_id"]);
				if($member["photo"])
				{
					$comments[$key]["company_logo"] = pb_get_attachmenturl($member["photo"], '', 'small');
				}
				else
				{
					$comments[$key]["company_logo"] = URL."templates/default/image/usericon_big.png";
				}
			}
			
			$comments[$key]["created"] = df(strtotime($comments[$key]["created"]), 'd-m-Y H:i');
		}
		
		
		
		
		setvar("comments", $comments);
		$this->render("product/attachmentcomments");
	}
	
	function getAnnounce()
	{
		uses("message");
		$pms = new Messages();
		$pb_userinfo = pb_get_member_info();
		
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$conditions[] = "Message.to_member_id=".$pb_userinfo["pb_userid"];
		$conditions[] = "Message.announce=0";
		
		//type filter
		if(isset($user["current_type"]))
		{
			$conditions[] = "CONCAT('[]',Message.membertype_ids,'[]') LIKE '%[".$user["current_type"]."]%'";
		}
		
		$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Message.from_member_id");
		
		//get current timestamp
		$date = new MyDateTime();
		$timestamp = $date->getTimestamp();
		$conditions[] = "Message.created > ".($timestamp - 9000);
		
		$result = $pms->findAll("Message.*,c.picture", $joins, $conditions, "Message.created DESC", 0, $this->MESSAGE_ANNOUNCE_COUNT);
		//var_dump($result);
		
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++){
				
				if($result[$i]["picture"])
				{
					$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture"], "");
				}
				else
				{
					$member = $this->member->read("photo", $result[$i]["from_member_id"]);
					if($member["photo"])
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($member["photo"], '', 'small');
					}
					else
					{
						$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
					}
				}
				$result[$i]["created"] = df(strtotime($result[$i]["created"]), 'd-m-Y H:i');
				$pms->saveField("announce", 1, intval($result[$i]["id"]));
				//echo $result[$i]["id"];
			}
			
		}
		
		//var_dump($result);
		
		setvar("Items",$result);
		setvar("Link", $absolute_uri."virtual-office/pms.php");
		
		$this->render("product/ajaxAnnounce");
	}
	
	function getChatbox()
	{
		
		if(isset($_GET["id"]))
		{
			$user_id = intval($_GET["id"]);
		}
		else
		{
			return;
		}
		
		if(isset($_GET["membertypeid"]))
		{
			$membertype_id = intval($_GET["membertypeid"]);
		}
		else
		{
			$membertype_id = "";
		}
		
		$member = $this->member->getInfoById($user_id);
		$company = $this->company->getInfoByUserId($user_id);
		$pb_userinfo = pb_get_member_info();
		
		
		global $viewhelper, $session;
		
		$chatboxs = $_SESSION["chatboxs"];

		if($chatboxs)
		{
			$chatboxs = explode(",", $chatboxs);
			
			$exist = false;
			foreach($chatboxs as $item)
			{
				$item = explode('_', $item);
				if($item[0] == $user_id)
				{
					$exist = true;
					break;
				}
			}
			if(!$exist)
			{
				$chatboxs[] = $user_id."_".$membertype_id;
			}
			
			$_SESSION["chatboxs"] = implode(",", $chatboxs);			
		}
		else
		{		
			$_SESSION["chatboxs"] = implode(",", $user_id."_".$membertype_id);
		}
		
		if(isset($company["shop_name"]))
		{
			$comname = $company["shop_name"];
		}
		if(!empty($member["first_name"]))
		{
			$uname = $member["first_name"]." ".$member["last_name"];
		}
		else
		{
			$uname = $member["username"];
		}
		if($comname && in_array($membertype_id, array(1,2,3)))
		{
			$chattitle = $comname;
		}
		else
		{
			$chattitle = $uname;
		}
		
		
		
		setvar("Items",$result);
		setvar("member", $member);
		setvar("chattitle", $chattitle);
		$this->render("product/ajaxChatbox");
	}
	
	function postChat()
	{		
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		if(isset($_POST["data"]))
		{
			//var_dump($pb_userinfo);
			if($pb_userinfo){
				//send message to owner
				$sms['content'] = mysql_real_escape_string($_POST["data"]["content"]);
				$sms['title'] = mysql_real_escape_string("chat");
				
				if(isset($_GET["membertypeid"]))
				{
					if(in_array($_GET["membertypeid"], array(6)))
					{
						$sms['membertype_to_ids'] = "[6]";					
					}
					elseif(in_array($_GET["membertypeid"], array(1,2,3)))
					{
						$sms['membertype_to_ids'] = "[1][2][3]";
					}
					elseif(in_array($_GET["membertypeid"], array(4)))
					{
						$sms['membertype_to_ids'] = "[4]";
					}
					elseif(in_array($_GET["membertypeid"], array(5)))
					{
						$sms['membertype_to_ids'] = "[5]";
					}
				}
				if($user["current_type"] == '' || $user["current_type"] == 0)
				{
					$user["current_type"] = $user["membertype_id"];
				}
				//echo $user["current_type"]."ssss";
				if(isset($user["current_type"]))
				{
					if(in_array($user["current_type"], array(6)))
					{
						$sms['membertype_from_ids'] = "[6]";					
					}
					elseif(in_array($user["current_type"], array(1,2,3)))
					{
						$sms['membertype_from_ids'] = "[1][2][3]";
					}
					elseif(in_array($user["current_type"], array(4)))
					{
						$sms['membertype_from_ids'] = "[4]";
					}
					elseif(in_array($user["current_type"], array(5)))
					{
						$sms['membertype_from_ids'] = "[5]";
					}
				}
				
				$result = $this->chat->SendToUser($pb_userinfo['pb_userid'], intval($_POST["data"]["id"]), $sms);
				
				//var_dump($result);
			}			
		}
		
		
		$com = $this->company->getInfoByUserId($pb_userinfo['pb_userid']);
		//var_dump($com);
				if($com["picture"])
				{
					$picture = pb_get_attachmenturl($com["picture"], "");
				}
				else
				{
					$member = $this->member->read("photo", $pb_userinfo['pb_userid']);
					if($member["photo"])
					{
						$picture = pb_get_attachmenturl($member["photo"], '', 'small');
					}
					else
					{
						$picture = URL."templates/default/image/usericon_big.png";
					}
				}
		//echo $picture;
		setvar("picture", $picture);
		setvar("content", $_POST["data"]["content"]);
		setvar("created", $result["timestamp"]);
		setvar("chatid", $result["new_id"]);
		$this->render("product/ajaxPostChat");
	}
	
	function getNewChats()
	{
		if(isset($_GET["id"]))
		{
			$user_id = intval($_GET["id"]);
		}
		else
		{
			return;
		}
		//echo $user_id;
		$member = $this->member->getInfoById($user_id);
		//var_dump($member);
		$pb_userinfo = pb_get_member_info();
		
		
		$conditions[] = "((Chat.to_member_id=".$pb_userinfo["pb_userid"]." AND Chat.from_member_id=".$user_id.") OR (Chat.from_member_id=".$pb_userinfo["pb_userid"]." AND Chat.to_member_id=".$user_id."))";
		if(isset($_GET["date"])) $conditions[] = "Chat.created>".$_GET["date"];
		$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Chat.from_member_id");
		$result = $this->chat->findAll("Chat.*,c.picture", $joins, $conditions, "Chat.created", 0, $this->CHAT_COUNT);
		
		
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++) {
				
				if($result[$i]["picture"])
				{
					$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture"], '', 'small');
				}
				else
				{
					$mem = $this->member->read("photo", $result[$i]["from_member_id"]);
					if($mem["photo"])
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($mem["photo"], '', 'small');
					}
					else
					{
						$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
					}
				}
				$result[$i]["created_or"] = $result[$i]["created"];
				$result[$i]["created"] = df($result[$i]["created"], 'd/m/Y - H:i');
				$this->chat->saveField("announce", 1, intval($result[$i]["id"]));
				//echo $result[$i]["id"];
				
				//set link content
				$result[$i]["content"] = preg_replace('!(http://[a-z0-9_./?=&-]+)!i', '<a target="_blank" rel="nofollow" href="$1">$1</a> ', $result[$i]["content"]." ");
				
				if($result[$i]["from_member_id"] == $pb_userinfo["pb_userid"])
				{
					$result[$i]["me"] = true;
				}
				
			}
			
		}
		
		
		//get seen
		if(isset($_GET["seen"]))
		{
			$chatitem = $this->chat->read("`id`, `read`", intval($_GET["seen"]));
			//var_dump($chatitem);
			if($chatitem["read"] == 1)
			{
				setvar("chatitem", $chatitem);
			}
		}
		
		
		//var_dump($result);
		setvar("Items",$result);
		setvar("member", $member);		
		$this->render("product/ajaxNewChats");
	}
	
	function removeChatbox()
	{
		if(isset($_GET["id"]))
		{
			$user_id = intval($_GET["id"]);
		}
		else
		{
			return;
		}

		$chatboxs = $_SESSION["chatboxsnew"];
		$chatboxs = explode(",", $chatboxs);		
		$new_chatbox = array();
		//$new_chatbox[] = $user_id;
		foreach($chatboxs as $item)
		{
			$itema = explode("_", $item);
			if($itema[0] != $user_id)
			{
				$new_chatbox[] = $item;
			}
		}		
		$_SESSION["chatboxsnew"] = implode(",", $new_chatbox);		
	}
	
	function setReadChat()
	{
		if(isset($_GET["id"]))
		{
			$ids = $_GET["id"];
		}
		else
		{
			return;
		}
		
		$ids_array = explode(",", $ids);
		//var_dump($ids_array);
		foreach($ids_array as $key => $item)
		{
			$ids_array[$key] = intval($item);
		}
		
		//$this->chat->saveField("`read`", 1, $ids_array);
		$checkId = "id in (".implode(",",$ids_array).")";
		$sql = "update {$this->chat->table_prefix}chats set `read`='1', `viewed_date`=".strtotime(date("Y-m-d H:i:s"))." where ".$checkId;
		$return = $this->chat->dbstuff->Execute($sql);
	}
	
	function updateChatbox()
	{
		global $session;
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		
		
		$conditions[] = "(Chat.to_member_id=".$pb_userinfo["pb_userid"]." AND Chat.from_member_id!=".$pb_userinfo["pb_userid"].")";
		//$conditions[] = "Chat.read=0";
		//filter membertype
		if($user["current_type"])
		{
			//$conditions[] = "((CONCAT('[]',Chat.membertype_to_ids,'[]') LIKE '%[".$user["current_type"]."]%') OR (CONCAT('[]',Chat.membertype_from_ids,'[]') LIKE '%[".$user["current_type"]."]%'))";
		}
		
		$result = $this->chat->findAll("Chat.from_member_id, Chat.read", NULL, $conditions, "Chat.created DESC", 0, $this->CHAT_COUNT);
		
		$as = array();
		foreach($result as $item)
		{
			if(!in_array($item["from_member_id"], $as) && $item["read"]==0)
			{
				$to_mem = $this->member->getInfoById($item["from_member_id"]);
				$as[] = $to_mem;
			}
		}
		
		echo json_encode($as);
	}
	
	function getTopChatAnnounce()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$user_code = $user["id"]."x".$user["current_type"];
		
		$conditions[] = "((Chat.to_code='".$user_code."' AND Chat.from_code!='".$user_code."') OR (Chat.from_code='".$user_code."' AND Chat.to_code!='".$user_code."'))";
		
		//filter membertype
		if($user["current_type"])
		{
			//$conditions[] = "((CONCAT('[]',Chat.membertype_to_ids,'[]') LIKE '%[".$user["current_type"]."]%') OR (CONCAT('[]',Chat.membertype_from_ids,'[]') LIKE '%[".$user["current_type"]."]%'))";
		}
		
		$index = 0;
		if(isset($_GET["page"])) {
			$index = $_GET["page"]*$this->CHAT_ANNOUNCE_COUNT;
		}
		
		$joins[] = "LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Chat.from_member_id";
		$joins[] = "LEFT JOIN {$this->product->table_prefix}companies c2 ON c2.member_id = Chat.to_member_id";
		
		$joins[] = "INNER JOIN ( SELECT chat_code, MAX(created) as maxdate, from_code, to_code FROM {$this->product->table_prefix}chats GROUP BY chat_code ) ppp ON ppp.chat_code = Chat.chat_code AND ppp.maxdate = Chat.created";
		
		$result = $this->chat->findAll("Chat.*, c.picture, c.shop_name, c2.picture as picture_2, c2.shop_name as shop_name_2", $joins, $conditions, "Chat.created DESC", $index, $this->CHAT_ANNOUNCE_COUNT, null);
		
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++){
				
				if($result[$i]["from_member_id"] != $pb_userinfo["pb_userid"])
				{
					$mem = $this->member->getInfoById($result[$i]["from_member_id"]);
					$pps = explode("x",$result[$i]["from_code"]);
					
					$result[$i]["membertype_id"] = $pps[1];
					
					if($result[$i]["picture"] && $pps[1] != 6)
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture"], '', 'smaller');
					}
					else
					{						
						if($mem["photo"])
						{
							$result[$i]["company_logo"] = pb_get_attachmenturl($mem["photo"], '', 'small');
						}
						else
						{
							$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
						}
					}
					
					if($result[$i]["shop_name"] && $pps[1] != 6)
					{
						$result[$i]["name"] = $result[$i]["shop_name"];
					}
					else if($mem["first_name"])
					{
						$result[$i]["name"] = $mem["first_name"]." ".$mem["last_name"];
					}
					else
					{
						$result[$i]["name"] = $mem["username"];
					}
					
					$result[$i]["chatid"] = $result[$i]["from_member_id"];
					
					//check member type
					//var_dump($result[$i]);
					if (strpos($result[$i]["membertype_from_ids"],$mem["membertype_id"]) !== false || true) {
						$result[$i]["chattypeid"] = $mem["membertype_id"];
					}
					else
					{
						$ids = $this->member->getOtherMembertypes($result[$i]["from_member_id"]);
						if (strpos($result[$i]["membertype_from_ids"],$ids[0]["membertype_id"]) !== false) {
							$result[$i]["chattypeid"] = $ids[0]["membertype_id"];
						}
					}
				}
				else
				{
					$mem = $this->member->getInfoById($result[$i]["to_member_id"]);
					
					$pps = explode("x",$result[$i]["to_code"]);
					
					$result[$i]["membertype_id"] = $pps[1];
					
					if($result[$i]["picture_2"] && $pps[1] != 6)
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture_2"], '', 'smaller');
					}
					else
					{						
						if($mem["photo"])
						{
							$result[$i]["company_logo"] = pb_get_attachmenturl($mem["photo"], '', 'small');
						}
						else
						{
							$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
						}
					}
					
					if($result[$i]["shop_name_2"] && $pps[1] != 6)
					{
						$result[$i]["name"] = $result[$i]["shop_name_2"];
					}
					else if($mem["first_name"])
					{
						$result[$i]["name"] = $mem["first_name"]." ".$mem["last_name"];
					}
					else
					{
						$result[$i]["name"] = $mem["username"];
					}
					
					$result[$i]["chatid"] = $result[$i]["to_member_id"];
					
					//check member type
					if (strpos($mem["membertype_to_ids"],$mem["membertype_id"]) !== false || true) {
						$result[$i]["chattypeid"] = $mem["membertype_id"];
					}
					else
					{
						$ids = $this->member->getOtherMembertypes($result[$i]["to_member_id"]);
						if (strpos($result[$i]["membertype_to_ids"],$ids[0]["membertype_id"]) !== false) {
							$result[$i]["chattypeid"] = $ids[0]["membertype_id"];
						}
					}
					
				}
				
				$result[$i]["created_or"] = $result[$i]["created"];
				$result[$i]["created"] = df($result[$i]["created"], 'd-m-Y H:i');
				
				
			}
			////remove duplicated items
			//for($i=0; $i<count($result); $i++){
			//	if(!$result[$i]["hide"])
			//		for($j=$i+1; $j<count($result); $j++) {
			//			if($result[$i]["chatid"] == $result[$j]["chatid"])
			//			{
			//				if($result[$i]["created_or"] >= $result[$j]["created_or"])
			//				{
			//					$result[$j]["hide"] = true;
			//				}
			//				else
			//				{
			//					$result[$i]["hide"] = true;
			//				}
			//				
			//				break;
			//			}
			//		}
			//}
		}

		//var_dump($result);
		setvar("Items",$result);
		setvar("Items_count", $this->chat->findCount($joins, $conditions, "Chat.id"));
		setvar("CHAT_ANNOUNCE_COUNT",$this->CHAT_ANNOUNCE_COUNT);
		//$conditions[] = "Chat.read=0";
		setvar("Count", $this->chat->findCount(null, array("(Chat.to_member_id=".$pb_userinfo["pb_userid"]." AND Chat.from_member_id!=".$pb_userinfo["pb_userid"].")","Chat.read=0")));
		$this->render("product/ajaxTopChatAnnounce");
	}
	
	function getOfferDetail()
	{
		global $customer_code;
		
		if(isset($_GET["id"]))
		{
			$user_id = intval($_GET["id"]);
		}
		else
		{
			return;
		}
		
		if(isset($_GET["id"]))
		{	
			$Trade = $this->trade->read("*", $_GET["id"], null, null);
			
			$this->trade->clicked($customer_code, $Trade);
			
			$Trade["name"] = strip_tags(pb_lang_split($Trade["title"]));
			$Trade["content"] = pb_lang_split($Trade["content"]);
			$Trade["price"] = number_format($Trade["price"], 0, ',', '.');
			
			$Type = $this->tradetype->read("*", $Trade["type_id"], null, null);
			//var_dump($Type);
			setvar("Type", $Type);
			
			
			if (!empty($Trade['picture'])) {
					$Trade['imgsmall'] = pb_get_attachmenturl($Trade['picture'], '', 'small');
					$Trade['imgmiddle'] = pb_get_attachmenturl($Trade['picture'], '', 'middle');
					$Trade['image'] = pb_get_attachmenturl($Trade['picture'], '', '');
					$Trade['image_url'] = rawurlencode($Trade['picture']);
				} else {
					$Trade['image'] = pb_get_attachmenturl('', '', 'middle');
				}
				if (!empty($Trade['picture1'])) {
					$Trade['imgsmall1'] = pb_get_attachmenturl($Trade['picture1'], '', 'small');
					$Trade['imgmiddle1'] = pb_get_attachmenturl($Trade['picture1'], '', 'middle');
					$Trade['image1'] = pb_get_attachmenturl($Trade['picture1'], '', '');
					$Trade['image_url1'] = rawurlencode($Trade['picture1']);
				}
				if (!empty($Trade['picture2'])) {
					$Trade['imgsmall2'] = pb_get_attachmenturl($Trade['picture2'], '', 'small');
					$Trade['imgmiddle2'] = pb_get_attachmenturl($Trade['picture2'], '', 'middle');
					$Trade['image2'] = pb_get_attachmenturl($Trade['picture2'], '', '');
					$Trade['image_url2'] = rawurlencode($Trade['picture2']);
				}
				if (!empty($Trade['picture3'])) {
					$Trade['imgsmall3'] = pb_get_attachmenturl($Trade['picture3'], '', 'small');
					$Trade['imgmiddle3'] = pb_get_attachmenturl($Trade['picture3'], '', 'middle');
					$Trade['image3'] = pb_get_attachmenturl($Trade['picture3'], '', '');
					$Trade['image_url3'] = rawurlencode($Trade['picture3']);
				}
				if (!empty($Trade['picture4'])) {
					$Trade['imgsmall4'] = pb_get_attachmenturl($Trade['picture4'], '', 'small');
					$Trade['imgmiddle4'] = pb_get_attachmenturl($Trade['picture4'], '', 'middle');
					$Trade['image4'] = pb_get_attachmenturl($Trade['picture4'], '', '');
					$Trade['image_url4'] = rawurlencode($Trade['picture4']);
				}
			
			
			$company = $this->company->getInfoByUserId($Trade["member_id"]);
			$member = $this->member->getInfoById($Trade["member_id"]);
			
			if($member["first_name"])
			{
				$member["name"] = $member["first_name"]." ".$member["last_name"];
			}
			else
			{
				$member["name"] = $member["username"];
			}
			
			$comments_count =  $this->tradecomment->findCount(null, array("trade_id=".$Trade["id"]));
			
			//format html
		$Trade['content'] = strip_tags($Trade['content'], "<p><br><strong><font><span><img><h2><h3><h4>");
			
			setvar("comments_count", $comments_count);					
			//var_dump($Trade);
			setvar("Trade", $Trade);
			setvar("company", $company);
			setvar("member", $member);
			
			$this->render("product/ajaxOfferDetail");
		}
	}
	
	function clickTool()
	{
		//echo $_POST["chan"]."-".$_POST["le"];
		if(isset($_POST))
		{
			$sql = "UPDATE {$this->product->table_prefix}products AS Product LEFT JOIN {$this->product->table_prefix}companies AS c ON c.id = Product.company_id SET Product.clicked=Product.clicked+".$_POST["addnumber"]." WHERE ".
			
			"c.id IN (SELECT id FROM (SELECT cc.id, COUNT(pp.id) AS pcount FROM {$this->product->table_prefix}companies AS cc INNER JOIN {$this->product->table_prefix}products AS pp ON cc.id = pp.company_id GROUP BY cc.id) AS kk WHERE pcount > 8)";
			
			if($_POST["condition_more"] && $_POST["condition_more"] != "")
			{
				$sql .= " AND Product.clicked > ".$_POST["condition_more"];
			}			
			
			if($_POST["condition_less"] && $_POST["condition_less"] != "")
			{
				$sql .= " AND Product.clicked < ".$_POST["condition_less"];
			}
			
			if($_POST["chan"] && $_POST["chan"] != "")
			{
				$sql .= "  AND MOD( Product.id, 2 ) = 0";
			}
			
			if($_POST["le"] && $_POST["le"] != "")
			{
				$sql .= "  AND MOD( Product.id, 2 ) = 1";
			}
			
			//echo $sql;
			$this->product->dbstuff->Execute($sql);//echo $sql;
		}
		
		$this->render("product/clickTool");
	}
	
	function getSharingUsername()
	{
		echo $_SESSION["sharing_username"];
	}
	
	function ajaxSearch()
	{
		if(isset($_GET["keyword"]))
		{
			$keyword = $_GET["keyword"];
		}
		else
		{
			return;
		}
		
		if(isset($_GET["type"]) && $_GET["type"] == "shop")
		{
			//
			$result = $this->company->fullTextSearch($keyword);
			
			//var_dump($result);
			setvar("list", $result);
			$this->render("product/ajaxSearch");
		}
		else
		{
			$_GET["q"] = $keyword;
			//
			$this->product->initSearch();
			$result = $this->product->Search(0, 40);
			
			//var_dump($result);
			setvar("list", $result);
			$this->render("product/ajaxSearchProduct");
		}
	}
	
	function updateShowProducts()
	{
		$this->product->updateShowProducts();
	}
	
	function updateShopKeywords()
	{
		$companies = $this->company->findAll("id, tag_ids", null, array("tag_ids != ''"));
		//var_dump($companies);
		
		foreach($companies as $item)
		{
			$item['keywords_string'] = $this->tag->getTagsByIds($item['tag_ids'], true);
			$item['keywords_string'] =  implode(",",$item['keywords_string']);
			//echo $item['keywords_string'];
			$this->company->saveField("keywords_string", $item['keywords_string'], intval($item['id']));
		}
	}
	
	function search()
	{
		if(isset($_GET["tag"]))
		{
			$keyword = $this->tag->read("name", intval($_GET["tag"]));
			$keyword = $keyword["name"];
			setvar("search_title", "Tìm theo từ khóa '<span class='keyword'>".$keyword."</span>'");
			setvar("keyword", $keyword);
		}
		
		$this->render("product/level1");
	}
	
	function resizeProductImage()
	{
		global $attachment_dir;
		
		uses("attachment");
		$att = new Attachment();
		
		$path = PHPB2B_ROOT.$attachment_dir;
		$companies = $this->product->findAll("id,picture as picture0,picture1,picture2,picture3,picture4", null, null, "created DESC", $_GET["pos"], 50);
		//var_dump($companies);
		foreach($companies as $item)
		{
			for($i = 0; $i < 5; $i++)
			{
				$pic = $item["picture".$i];
				if(!empty($pic))
				{
					$source = $path."/".$pic;
					echo $source."<br />";
					try
					{
						$att->resizeImage($source, 300, 300, "square");
					}
					catch (Exception $e)
					{}
				}
			}
			
		}
	}
	
	function ajaxUpdateChats()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		
		$idalls = explode(',', $_GET["ids"]);
		
		$ids = array();
		$types = array();
		foreach($idalls as $item)
		{
			$pps = explode('_', $item);
			$ids[] = $pps[0];
			$types[] = $pps[1];
		}

		$results = array();
		for($k=0; $k<count($ids)-1; $k++)
		{
			$user_id = $ids[$k];
			
			$conditions = array();
			$conditions[] = "((Chat.to_member_id=".$pb_userinfo["pb_userid"]." AND Chat.from_member_id=".$user_id.") OR (Chat.from_member_id=".$pb_userinfo["pb_userid"]." AND Chat.to_member_id=".$user_id."))";
			
			//filter membertype
			if($user["current_type"])
			{
				//$conditions[] = "((CONCAT('[]',Chat.membertype_to_ids,'[]') LIKE '%[".$user["current_type"]."]%' AND CONCAT('[]',Chat.membertype_from_ids,'[]') LIKE '%[".$types[$k]."]%') OR (CONCAT('[]',Chat.membertype_from_ids,'[]') LIKE '%[".$user["current_type"]."]%' AND CONCAT('[]',Chat.membertype_to_ids,'[]') LIKE '%[".$types[$k]."]%'))";
			}
			
			
			$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Chat.from_member_id");
			$result = $this->chat->findAll("Chat.*,c.picture", $joins, $conditions, "Chat.created DESC", 0, $this->CHAT_COUNT);
			
			if (!empty($result)) {
				for($i=0; $i<count($result); $i++){
					
					if($result[$i]["picture"])
					{
						$result[$i]["company_logo"] = URL.pb_get_attachmenturl($result[$i]["picture"], '', 'small');
					}
					else
					{
						$mem = $this->member->read("photo", $result[$i]["from_member_id"]);
						if($mem["photo"])
						{
							$result[$i]["company_logo"] = URL.pb_get_attachmenturl($mem["photo"], '', 'small');
						}
						else
						{
							$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
						}
					}
					$result[$i]["created_or"] = $result[$i]["created"];
					$result[$i]["created"] = df($result[$i]["created"], 'd/m/Y - H:i');
					$this->chat->saveField("announce", 1, intval($result[$i]["id"]));
					//echo $result[$i]["id"];
					
					//set link content					
					$result[$i]["content"] = preg_replace('!(https?://[a-z0-9_./?=&-]+)!i', '<a target="_blank" href="$1">$1</a> ', $result[$i]["content"]." ");
					$result[$i]["content"] = preg_replace('!(www.[a-z0-9_./?=&-]+)!i', '<a target="_blank" href="http://$1">$1</a> ', $result[$i]["content"]." ");
					
					$result[$i]["me"] = "";
					if($result[$i]["from_member_id"] == $pb_userinfo["pb_userid"])
					{
						$result[$i]["me"] = "me";
					}
					
					if($result[$i]["viewed_date"])
					{
						$string_date = df($result[$i]["viewed_date"], 'H:i');
						$result[$i]["viewed_notice"] = "Đã xem lúc ".$string_date;
					}					
				}				
			}
			$results[$ids[$k]] = $result;
		}
		//var_dump($results);
		echo json_encode($results);
	}
	
	function updateProductCount()
	{
		$industries = $this->industry->getCacheIndustry();
		$i = 1;
		$min = 0;
		foreach($industries as $key0 => $level0)
		{
			if($i > $min){
				echo $i."-".$level0["id"]."<br />";
				$this->industry->saveField("count", $this->industry->countProduct($level0["id"]), intval($level0["id"]));
			}
			foreach($level0['sub'] as $key1 => $level1)
			{
				if($i > $min){
					echo $i."-".$level1["id"]."<br />";
					$this->industry->saveField("count", $this->industry->countProduct($level1["id"]), intval($level1["id"]));
				}
				foreach($level1['sub'] as $key2 => $level2)
				{
					if($i > $min){
						echo $i."-".$level2["id"]."<br />";
						$this->industry->saveField("count", $this->industry->countProduct($level2["id"]), intval($level2["id"]));
					}
					foreach($level2['sub'] as $key3 => $level3)
					{
						if($i > $min){
							echo $i."-".$level3["id"]."<br />";
							$this->industry->saveField("count", $this->industry->countProduct($level3["id"]), intval($level3["id"]));
						}
						$i++;
					}
					$i++;
				}
				$i++;
			}
			$i++;
		}
	}
	
	function ajaxLoadImage()
	{
		$result["id"] = "#".$_POST["id"];
		$result["url"] = $_POST["link"];
		//echo '<div class="itemname">'.$_POST["id"].'</div><div class="url">'.$_POST["link"]."</div>";
		
		echo json_encode($result);
	}
	
	function viewedList()
	{		
		if(empty($_SESSION["viewed_list"]))
		{
			return;
		}
		$ids = str_replace("][", ",",$_SESSION["viewed_list"]);
		$ids = preg_replace('/[\[|\]]/', "",$ids);
		
		//echo $ids;
		$result = $this->product->findAll("*", null, array("Product.id IN (".$ids.")"), "FIELD(id,".$ids.") DESC");
		$result = $this->product->formatResult($result);
		//var_dump($result);
		setvar("list",$result);
		$this->render("product/ajaxViewedList");
	}
	
	function restoreHistory($string)
	{
		//echo $string;
		$_SESSION["viewed_list"] = $string;
		//echo $_SESSION["viewed_list"];
	}
	
	function get_space_tree()
	{
		$member = $this->member->getInfoByid($_GET["page_memid"]);
		$company = $this->company->getInfoByUserId($_GET["page_memid"]);
		
		$tree = $this->producttype->findTree('id,name,level', array("0"=>'member_id='.$member['id']));
	
		$level_padding = 0;
		foreach($tree as $key0 => $item0)
		{
			
			
			//count product
			$conditions = null;
			$conditions[] = "Product.status=1 AND Product.state=1 AND Product.company_id='".$company['id']."'";
			$indus_array = array();
			$custom_array = array();
			$id_i = intval($item0["id"]);
			//$_GET["memberid"] = $item0["member_id"];
			$level = 0;
			
			foreach($tree as $key => $item)
			{			
				if($level)
				{
					if($item["level"] > $level)
					{
						if(!isset($item["member_id"]))
						{
							$indus_array[] = $item["id"];
						}
						else
						{
							$custom_array[] = $item["id"];
						}
					}
					else
					{
						break;
					}
				}		
				elseif($item["id"] == $id_i)
				{
					//echo "no do".$id_i;
					if(!$item0["member_id"] && !isset($item["member_id"]))
					{			
						$indus_array[] = $id_i;
						$level = $item["level"];
					}
					if($item0["member_id"] && isset($item["member_id"]))
					{
						$custom_array[] = $id_i;
						$level = $item["level"];
					}
					
				}
				//echo $level;
			}
			$conditions_temp = null;
			if(!empty($indus_array))
				$conditions_temp['industry'] = "Product.industry_id IN (".implode(',',$indus_array).")";
						     
			if(!empty($custom_array))
				$conditions_temp['customid'] = "Product.producttype_id IN (".implode(',',$custom_array).")";		
			      
			$conditions[] = "((".implode(" OR ", $conditions_temp).") AND Product.state=1)";
					
			$tree[$key0]["count"] = $this->product->findCount_left(null, $conditions,"id");
			
		}
		
		foreach($tree as $key0 => $item0)
		{
			
			$tree[$key0]["lpad"] = $level_padding;
			$tree[$key0]["padding"] = $level_padding*25;

			if($item0["countChildren"] == 1 && $tree[$key0]["count"] == $tree[$key0+1]["count"])
			{
				$tree[$key0]["hide"] = true;
				//$tree[$key-1]["countChildren"] = $tree[$key-1]["countChildren"] - 1;
			}
			else
			{
				if($tree[$key0+1]["level"] > $tree[$key0]["level"])
				{
					$level_padding++;
				}
				
				if($tree[$key0+1]["level"] <= $level_padding)
				{
					$level_padding = $tree[$key0+1]["level"]-1;
				}
			}
		}
		setvar("tree",$tree);
		
		$this->render("product/get_space_tree");
	}
	
	function getChatboxNew()
	{
		
		if(isset($_GET["id"]))
		{
			$parts = explode("x", $_GET["id"]);
			$user_id = $parts[0];
			$type_id = $parts[1];
			$chatid = $_GET["id"];
		}
		else
		{
			return;
		}
		
		$member = $this->member->getInfoById($user_id);
		$company = $this->company->getInfoByUserId($user_id);
		$pb_userinfo = pb_get_member_info();
		
		if($pb_userinfo["pb_userid"] == $user_id)
		{
			return;
		}
		
		global $viewhelper, $session;
		
		$chatboxs = $_SESSION["chatboxsnew"];

		if($chatboxs)
		{
			$chatboxs = explode(",", $chatboxs);
			
			$exist = false;
			foreach($chatboxs as $item)
			{
				if($item == $chatid)
				{
					$exist = true;
					break;
				}
			}
			if(!$exist)
			{
				$chatboxs[] = $chatid;
			}
			$_SESSION["chatboxsnew"] = implode(",", $chatboxs);
			//$session->write('chatboxsnew'.session_id(), implode(",", $chatboxs));
		}
		else
		{
			$_SESSION["chatboxsnew"] = $chatid;
			//$session->write('chatboxsnew'.session_id(), $chatid);
		}
		
		if(isset($company["shop_name"]))
		{
			$comname = $company["shop_name"];
		}
		if(!empty($member["first_name"]))
		{
			$uname = $member["first_name"]." ".$member["last_name"];
		}
		else
		{
			$uname = $member["username"];
		}
		//echo $member["username"]."dddddd";
		//echo $type_id;
		if($comname && in_array($type_id, array(1,2,3)))
		{
			$chattitle = $comname;
		}
		else
		{
			$chattitle = $uname;
		}
		
		
		if($member["current_type"] == 6)
		{
			$show_com_logo = false;
		}
		else
		{
			$show_com_logo = true;
		}
		
		if($company["picture"] && $show_com_logo)
		{
			$member["company_logo"] = URL.pb_get_attachmenturl($company["picture"], '', 'small');
		}
		else
		{
			//$mem = $this->member->read("photo", $result[$i]["from_member_id"]);
			if($member["photo"])
			{
				$member["company_logo"] = URL.pb_get_attachmenturl($member["photo"], '', 'small');
			}
			else
			{
				$member["company_logo"] = URL."templates/default/image/usericon_big.png";
			}
		}
		
		
		setvar("Items",$result);
		setvar("member", $member);
		setvar("type_id", $type_id);
		setvar("chatid", $chatid);
		setvar("chattitle", $chattitle);
		$this->render("product/ajaxChatboxNew");
	}
	
	function removeChatboxNew()
	{
		if(isset($_GET["id"]))
		{
			$chatid = intval($_GET["id"]);
		}
		else
		{
			return;
		}
		//store chatbox id to session
		global $viewhelper, $session;
		//$session->write('chatboxs'.session_id(), '');
		$chatboxs = $_SESSION["chatboxsnew"];
		
		//var_dump($chatboxs);
		//echo "ssdsdsd";
		//$session->write('chatboxs'.session_id(), "");
		$chatboxs = explode(",", $chatboxs);
		
			$new_chatbox = array();
			//$new_chatbox[] = $user_id;
			foreach($chatboxs as $item)
			{
				if($item != $chatid)
				{
					$new_chatbox[] = $item;
				}
			}
			$_SESSION["chatboxsnew"] = implode(",", $new_chatbox);
			//$session->write('chatboxsnew'.session_id(), implode(",", $new_chatbox));
		
	}
	
	function postChatNew()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$chatid = $_POST["data"]["id"];
		$parts = explode("x",$chatid);
		
		if(isset($_POST["data"]))
		{
			//var_dump($pb_userinfo);
			if($pb_userinfo){
				//send message to owner
				$sms['content'] = mysql_real_escape_string($_POST["data"]["content"]);
				$sms['title'] = mysql_real_escape_string("chat");
				
				$sms['to_code'] = $chatid;
				$sms['from_code'] = $user["id"]."x".$user["current_type"];
				
				if(strcmp($sms["to_code"], $sms["from_code"]) < 0) {
					$sms["chat_code"] = $sms["to_code"]."-".$sms["from_code"];
				}
				else {
					$sms["chat_code"] = $sms["from_code"]."-".$sms["to_code"];
				}
				
				$result = $this->chat->SendToUser($pb_userinfo['pb_userid'], intval($parts[0]), $sms);
				
				//var_dump($result);
				$this->member->saveField("typing_time","",intval($user["id"]));
			}			
		}
		
		
		$com = $this->company->getInfoByUserId($pb_userinfo['pb_userid']);
		//var_dump($com);
				if($com["picture"])
				{
					$picture = pb_get_attachmenturl($com["picture"], "");
				}
				else
				{
					$member = $this->member->read("photo", $pb_userinfo['pb_userid']);
					if($member["photo"])
					{
						$picture = pb_get_attachmenturl($member["photo"], '', 'small');
					}
					else
					{
						$picture = URL."templates/default/image/usericon_big.png";
					}
				}
		//echo $picture;
		setvar("picture", $picture);
		setvar("content", $_POST["data"]["content"]);
		setvar("created", $result["timestamp"]);
		setvar("chatid", $result["new_id"]);
		$this->render("product/ajaxPostChat");
	}
	
	function ajaxUpdateChatsNew()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$user_code = $user["id"]."x".$user["current_type"];
		
		$ids = explode(',', $_GET["ids"]);
		
		//echo $user_code;

		$results = array();
		for($k=0; $k<count($ids)-1; $k++)
		{
			$tmp = explode("_",$ids[$k]);
			$chatid = $tmp[0];
			
			$pps = explode("x",$chatid);
			
			$result = array();
			
			$conditions = array();
			$conditions[] = "((Chat.to_code='".$user_code."' AND Chat.from_code='".$chatid."') OR (Chat.from_code='".$user_code."' AND Chat.to_code='".$chatid."'))";
			
			$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Chat.from_member_id");
			
			if($tmp[1] != "-1") {
				
				if($tmp[1] > 0) {
					$conditions[] = "Chat.created >= ".$tmp[1];
				}
				
				$result = $this->chat->findAll("Chat.id,Chat.read,Chat.from_member_id, Chat.to_member_id, Chat.read, Chat.created, Chat.viewed_date, Chat.content,c.picture", $joins, $conditions, "Chat.created DESC", 0, $this->CHAT_COUNT);
				if (!empty($result)) {
					for($i=0; $i<count($result); $i++){
						
						$show_com_logo = true;
						if($result[$i]["from_code"] == $user_code)
						{
							if($user["current_type"] == 6)
							{
								$show_com_logo = false;
							}
						}
						else
						{
							if($pps[1] == 6)
							{
								$show_com_logo = false;
							}
						}
						
						if($result[$i]["picture"] && $show_com_logo)
						{
							$result[$i]["company_logo"] = URL.pb_get_attachmenturl($result[$i]["picture"], '', 'small');
						}
						else
						{
							$mem = $this->member->read("photo", $result[$i]["from_member_id"]);
							if($mem["photo"])
							{
								$result[$i]["company_logo"] = URL.pb_get_attachmenturl($mem["photo"], '', 'small');
							}
							else
							{
								$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
							}
						}
						$result[$i]["created_or"] = $result[$i]["created"];
						$result[$i]["created"] = df($result[$i]["created"], 'd/m/Y - H:i');
						$this->chat->saveField("announce", 1, intval($result[$i]["id"]));
						//echo $result[$i]["id"];
						
						//set link content					
						$result[$i]["content"] = preg_replace('!(https?://[a-z0-9_./?=&-\/]+)!i', '<a target="_blank" href="$1">$1</a> ', $result[$i]["content"]." ");
						//$result[$i]["content"] = preg_replace('![^\/](www.[a-z0-9_./?=&-]+)!i', '<a target="_blank" href="http://$1">$1</a> ', $result[$i]["content"]." ");
						$result[$i]["content"] = preg_replace('/\[image\](.+)\[\/image\]/', '<a class="chatimage_thumb" href="'.URL.'attachment/$1"><image src="'.URL.'attachment/$1.smaller.jpg" /></a>', $result[$i]["content"]." ");
						
						$result[$i]["me"] = "";
						if($result[$i]["from_member_id"] == $pb_userinfo["pb_userid"])
						{
							$result[$i]["me"] = "me";
						}
						
						if($result[$i]["viewed_date"])
						{
							$string_date = df($result[$i]["viewed_date"], 'H:i');
							$result[$i]["viewed_notice"] = "Đã xem lúc ".$string_date;
						}
						
					}
					
				}
			}

			$results[$chatid]["data"] = $result;
			$friend = $this->member->fields('id,typing, typing_time',array("id=".intval($pps[0])));
			//var_dump($friend);
			//echo $user_code;
			if(strtotime(date('Y-m-d H:i:s')) - $friend["typing_time"] < 10 && $user_code == $friend["typing"]) {
				$results[$chatid]["typing"] = true;
			}
			else {
				$results[$chatid]["typing"] = false;
			}
		}
		//var_dump($results);
		
		//set typing status
		if(isset($_GET["typing"])) {
			$sql = "update ".$this->member->getTable()." set typing='".$_GET["typing"]."', typing_time='".strtotime(date('Y-m-d H:i:s'))."' where id=".intval($user["id"]);
			$this->member->dbstuff->Execute($sql);
		}
		//get typing status
		//echo strtotime(date('Y-m-d H:s:i')) - $user["typing_time"];
		
		//var_dump($results);
		
		echo json_encode($results);
	}
	
	function updateChatboxNew()
	{
		global $session;
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$user_code = $user["id"]."x".$user["membertype_id"];
		
		$conditions[] = "(Chat.to_code='".$user_code."' AND Chat.from_member_id!='".$user_code."')";
		//$conditions[] = "Chat.read=0";
		//filter membertype
		if($user["current_type"])
		{
			//$conditions[] = "((CONCAT('[]',Chat.membertype_to_ids,'[]') LIKE '%[".$user["current_type"]."]%') OR (CONCAT('[]',Chat.membertype_from_ids,'[]') LIKE '%[".$user["current_type"]."]%'))";
		}
		
		$result = $this->chat->findAll("Chat.from_code, Chat.read", NULL, $conditions, "Chat.created DESC", 0, $this->CHAT_COUNT);
		
		$as = array();
		foreach($result as $item)
		{
			if(!in_array($item["from_code"], $as) && $item["read"]==0)
			{
				$as[] = $item["from_code"];
			}
		}
		
		echo json_encode($as);
	}
	
	//function convert_to_new_chat()
	//{
	//	$fields = "Chat.*,to_m.membertype_id as to_m_type,from_m.membertype_id as from_m_type";
	//	$joins = array("LEFT JOIN {$this->product->table_prefix}members to_m ON to_m.id = Chat.to_member_id");
	//	$joins[] = "LEFT JOIN {$this->product->table_prefix}members from_m ON from_m.id = Chat.from_member_id";
	//	
	//	$chats = $this->chat->findAll($fields,$joins);
	//	foreach($chats as $key => $item)
	//	{
	//		$to_code = $item["to_member_id"]."x".$item["to_m_type"];
	//		$from_code = $item["from_member_id"]."x".$item["from_m_type"];
	//		echo $item["id"]."-".$from_code."-".$to_code."<br />";
	//		
	//		$this->chat->saveField("to_code", $to_code, intval($item["id"]));
	//		$this->chat->saveField("from_code", $from_code, intval($item["id"]));
	//	}
	//}
	
	function services()
	{
		//var_dump($_GET);
		//update show product
		$this->product->updateShowProducts(3, 5);
		
		$data = array();
		$_PB_CACHE['industry'] = cache_read("industry");
		require(CACHE_COMMON_PATH."cache_type.php");
		$index_latest_industry_ids = 10;
		using("industry");
		$industry = new Industries();
		$ProductSorts = $_PB_CACHE['productsort'];
		$result = $this->product->dbstuff->GetArray($sql = "SELECT distinct industry_id AS iid FROM {$this->product->table_prefix}products WHERE status=1 ORDER BY id DESC LIMIT 0,{$index_latest_industry_ids}");
		if (!empty($result)) {
			foreach ($result as $key=>$val) {
				$data[$val['iid']]['id'] = $val['iid'];
				if(isset($_PB_CACHE['industry'][1][$val['iid']])) $data[$val['iid']]['name'] = $_PB_CACHE['industry'][1][$val['iid']];
				$tmp_result = $this->product->dbstuff->GetArray("SELECT id,name,picture,sort_id,industry_id FROM {$this->product->table_prefix}products WHERE status=1 AND industry_id=".$val['iid']." ORDER BY id DESC LIMIT 0,5");
				if (!empty($tmp_result)) {
					foreach ($tmp_result as $key1=>$val1) {
						$data[$val['iid']]['sub'][$val1['id']]['id'] = $val1['id'];
						$data[$val['iid']]['sub'][$val1['id']]['name'] = $val1['name'];
						$data[$val['iid']]['sub'][$val1['id']]['sort'] = $ProductSorts[$val1['sort_id']];
						$data[$val['iid']]['sub'][$val1['id']]['image'] = pb_get_attachmenturl($val1['picture'], '', 'small');
					}
				}
			}
			setvar("IndustryProducts", $data);
		}

		//get all industries from cache
		$industries = $this->industry->getCacheIndustry();
		if(isset($_GET["level"]))
		{
			setvar("p_level", $_GET["level"]);
			if($_GET["level"] == "search")
			{
				$IndustryList["id"] = 0;				
				$IndustryList["box1"] = $industries;
				
				if(isset($_GET["tag"]))
				{
					$keyword = $this->tag->read("name", intval($_GET["tag"]));
					$keyword = $keyword["name"];
					$IndustryList["name"] = "Tìm theo từ khóa '<span class='keyword'>".$keyword."</span>'";
					setvar("keyword", $keyword);
				}
				
				setvar("IndustryList", $IndustryList);
				render("services/level1");
			}
			else if($_GET["level"] == 1)
			{
				if(isset($_GET["industryid"]))
				{
					$count1 = 0;
					
					foreach($industries[$_GET["industryid"]]["sub"] as $key1 => $level1)
					{
						$industries[$_GET["industryid"]]["level0_name"] = $industries[$_GET["industryid"]]["name"];
						$industries[$_GET["industryid"]]["level0_id"] = $industries[$_GET["industryid"]]["id"];
						$industries[$_GET["industryid"]]["box1"] = $industries;
								
						foreach( $industries[$_GET["industryid"]]["box1"] as $key => $item)
						{
							$ii = $this->industry->field("children", "id=".$item["id"]);
							$industries[$_GET["industryid"]]["box1"][$key]["count"] = $this->industry->getCountProduct($ii,null,1);
						}
						
						
						
						$cats = array();					
						$cats[] = $level1["id"];
						
						//$industries[$_GET["industryid"]]["sub"][$key1]["ppcount"] = $this->industry->countProduct($level1["id"]);
						
						if($count1%6 == 1)
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 1;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 0;
						}
						
						//echo $level1["name"];
						if($count1%6 == 0 || $count1%6 == 5)
						{
							$maxitem = 11;
						}
						else
						{
							$maxitem = 3;
						}
						
						//if(rand(0,1) || $count0%6 == 0 || $count0%6 == 5)
						//{
							$industries[$_GET["industryid"]]["sub"][$key1]["disp"] = "disp";
						//}
						//else
						//{
						//	$industries[$_GET["industryid"]]["sub"][$key1]["disp"] = "hiden";
						//}
						
						
						//getImage
						//$rowi = $industry->getByID($key0);
						$industries[$_GET["industryid"]]["sub"][$key1]["image"] = pb_get_attachmenturl($industries[$_GET["industryid"]]["sub"][$key1]["picture"], "", "");
						
						if(preg_match('/nopicture/', $industries[$_GET["industryid"]]["sub"][$key1]["image"])) $industries[$_GET["industryid"]]["sub"][$key1]["image"] = "";
						
						
						foreach($level1['sub'] as $key2 => $level2)
						{
							$cats[] = $level2["id"];
							
							//echo $key2."-".$maxitem."/";
							if($key2 > $maxitem)
							{
								unset($industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]);
							}
							
							//$industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]["ppcount"] = $this->industry->countProduct($level2["id"]);
						}			
						$count1++;
						
						if($key1 == count($industries[$_GET["industryid"]]["sub"])-1)
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["last"] = 1;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["last"] = 0;
						}
						
					}
				}
				//$IndustryList["count"] = count($IndustryList["sub"]);
				$industries["id"] = $_GET["industryid"] ;
				
				setvar("IndustryList", $industries[$_GET["industryid"]]);
				
				render("services/level1");
			}
			else if($_GET["level"] == 2)
			{
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							if($level1["id"] == $_GET["industryid"])
							{								
								$level1["level0_name"] = $level0["name"];
								$level1["level0_id"] = $level0["id"];
								$level1["level1_name"] = $level1["name"];
								$level1["level1_id"] = $level1["id"];
								$level1["box2"] = $level0['sub'];
								$level1["box1"] = $industries;
								
								//foreach($level1["box1"] as $key => $item)
								//{									
								//	$level1["box1"][$key]["count"] = $this->industry->getCount($item["id"],1);
								//}
								//foreach($level1["box2"] as $key => $item)
								//{									
								//	$level1["box2"][$key]["count"] = $this->industry->getCount($item["id"],1);
								//}	
								
								$level1["parent_name"] = $level0["name"];
								$level1["parent_id"] = $level0["id"];
								//var_dump($level1);
								foreach($level1['sub'] as $key2 => $level2)
								{
									$cats = array();
									$cats[] = $level2["id"];
									//echo $key2;
									
									//$level1["sub"][$key2]["ppcount"] = $this->industry->countProduct($level2["id"]);
									
									if($key2%6 == 1)
									{
										$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 1;
									}
									else
									{
										$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 0;
									}
									
									//echo $level1["name"];
									if($key2%6 == 0 || $key2%6 == 5)
									{
										$maxitem = 11;
									}
									else
									{
										$maxitem = 3;
									}								
									
									foreach($level2['sub'] as $key3 => $level3)
									{
										$cats[] = $level3["id"];
										
										//$level1["sub"][$key2]["sub"][$key3]["ppcount"] = $this->industry->countProduct($level3["id"]);
										
										//echo $key2."-".$maxitem."/";
										if($key3 > $maxitem)
										{
											unset($level1["sub"][$key2]["sub"][$key3]);
										}
									}	
									
								}
								$IndustryList = $level1;
							}
						}						
						$count0++;
					}
				}
				//var_dump($IndustryList);
				$IndustryList["count"] = count($IndustryList["sub"]);
				setvar("IndustryList", $IndustryList);
				
				render("services/level1");
			}
			else if($_GET["level"] == 3)
			{
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET["industryid"])
								{
									$level2["level1_name"] = $level1["name"];
									$level2["level1_id"] = $level1["id"];
									$level2["level0_name"] = $level0["name"];
									$level2["level0_id"] = $level0["id"];
									$level2["box3"] = $level1['sub'];
									$level2["box2"] = $level0['sub'];
									$level2["box1"] = $industries;
									
									
									foreach($level2['sub'] as $key3 => $level3)
									{
										$cats = array();
										$cats[] = $level3["id"];
										//echo $key2;
										if($key3%3 == 2)
										{
											$maxitem = 11;
											$level2["sub"][$key3]["size"] = "large";
										}
										else
										{
											$maxitem = 3;
											$level2["sub"][$key3]["size"] = "half";
										}
										
										if($key3%2 == 0)
										{										
											$level2["sub"][$key3]["odd"] = 1;
										}
										else
										{										
											$level2["sub"][$key3]["odd"] = 0;
										}
										
										
									}
									
									//foreach($level2["box1"] as $key => $item)
									//{										
									//	$level2["box1"][$key]["count"] = $this->industry->getCount($item["id"],1);
									//}
									////foreach($level2["box2"] as $key => $item)
									////{										
									////	$level2["box2"][$key]["count"] = $this->industry->getCount($item["id"],1);
									////}
									//foreach($level2["box3"] as $key => $item)
									//{										
									//	$level2["box3"][$key]["count"] = $this->industry->getCount($item["id"],1);
									//}
														
									
									$IndustryList = $level2;
									
								}
							}
						}						
						$count0++;
					}
				}
				//var_dump($IndustryList);
				$IndustryList["count"] = count($IndustryList["sub"]);
				setvar("IndustryList", $IndustryList);
				
				render("services/level1");
			}
			else if($_GET["level"] == 4)
			{
				//echo $_GET["industryid"];
				//var_dump($industries);
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								//if($level2["id"] == 2586)
								//{
								//		var_dump($level2['sub']);
								//}
								foreach($level2['sub'] as $key3 => $level3)
								{
																
									if($level3["id"] == $_GET["industryid"])
									{
										//echo $level3["id"];
										$level3["level2_name"] = $level2["name"];
										$level3["level2_id"] = $level2["id"];
										$level3["level1_name"] = $level1["name"];
										$level3["level1_id"] = $level1["id"];
										$level3["level0_name"] = $level0["name"];
										$level3["level0_id"] = $level0["id"];
										$level3["box4"] = $level2['sub'];
										$level3["box3"] = $level1['sub'];
										$level3["box2"] = $level0['sub'];
										$level3["box1"] = $industries;
										
										//foreach($level3["box1"] as $key => $item)
										//{
										//	$level3["box1"][$key]["count"] = $this->industry->getCount($item["id"],1);
										//}
										////foreach($level3["box2"] as $key => $item)
										////{
										////	$level3["box2"][$key]["count"] = $this->industry->getCount($item["id"],1);
										////}
										////foreach($level3["box3"] as $key => $item)
										////{
										////	$level3["box3"][$key]["count"] = $this->industry->getCount($item["id"],1);
										////}
										//foreach($level3["box4"] as $key => $item)
										//{
										//	$level3["box4"][$key]["count"] = $this->industry->getCount($item["id"],1);
										//}
										
										$IndustryList = $level3;
										break;
									}									
								}
							}
						}						
						$count0++;
					}
				}
				setvar("IndustryList", $IndustryList);
				
				render("services/level1");
			}
		}
		else
		{
			$IndustryList["id"] = 0;				
			$IndustryList["box1"] = $industries;
			
			if(isset($_GET["tag"]))
			{
				$keyword = $this->tag->read("name", intval($_GET["tag"]));
				$keyword = $keyword["name"];
				$IndustryList["name"] = "Tìm theo từ khóa '<span class='keyword'>".$keyword."</span>'";
				setvar("keyword", $keyword);
			}
			else
			{
				$IndustryList["name"] = "Thị trường dịch vụ";
			}
			
			setvar("IndustryList", $IndustryList);
			render("services/level1");
		}
	}
	
	function deletemiddle()
	{
		$url = PHPB2B_ROOT."attachment/";
		$products = $this->product->findAll("*",null,array("picture NOT LIKE '%ichodientuvn.com/pict/%'","picture NOT LIKE '%http://media.vatgia.vn%'"),null,$_GET["offset"],$_GET["offset"]+1000);
		foreach($products as $item)
		{
			echo $url.$item["picture"].".middle.jpg";
			echo $item["picture1"].".middle.jpg";
			echo $item["picture2"].".middle.jpg";
			echo $item["picture3"].".middle.jpg";
			echo $item["picture4"].".middle.jpg";
			echo "<br />";
			
			@unlink($url.$item["picture"].".middle.jpg");
			@unlink($url.$item["picture1"].".middle.jpg");
			@unlink($url.$item["picture2"].".middle.jpg");
			@unlink($url.$item["picture3"].".middle.jpg");
			@unlink($url.$item["picture4"].".middle.jpg");
		}
	}
	
	function offers()
	{
		//update show product
		$this->product->updateShowProducts(3, 5);
		
		$data = array();
		$_PB_CACHE['industry'] = cache_read("industry");
		require(CACHE_COMMON_PATH."cache_type.php");
		$index_latest_industry_ids = 10;
		using("industry");
		$industry = new Industries();
		$ProductSorts = $_PB_CACHE['productsort'];
		$result = $this->product->dbstuff->GetArray($sql = "SELECT distinct industry_id AS iid FROM {$this->product->table_prefix}products WHERE status=1 ORDER BY id DESC LIMIT 0,{$index_latest_industry_ids}");
		if (!empty($result)) {
			foreach ($result as $key=>$val) {
				$data[$val['iid']]['id'] = $val['iid'];
				if(isset($_PB_CACHE['industry'][1][$val['iid']])) $data[$val['iid']]['name'] = $_PB_CACHE['industry'][1][$val['iid']];
				$tmp_result = $this->product->dbstuff->GetArray("SELECT id,name,picture,sort_id,industry_id FROM {$this->product->table_prefix}products WHERE status=1 AND industry_id=".$val['iid']." ORDER BY id DESC LIMIT 0,5");
				if (!empty($tmp_result)) {
					foreach ($tmp_result as $key1=>$val1) {
						$data[$val['iid']]['sub'][$val1['id']]['id'] = $val1['id'];
						$data[$val['iid']]['sub'][$val1['id']]['name'] = $val1['name'];
						$data[$val['iid']]['sub'][$val1['id']]['sort'] = $ProductSorts[$val1['sort_id']];
						$data[$val['iid']]['sub'][$val1['id']]['image'] = pb_get_attachmenturl($val1['picture'], '', 'small');
					}
				}
			}
			setvar("IndustryProducts", $data);
		}

		//get all industries from cache
		$industries = $this->industry->getCacheIndustry();
		if(isset($_GET["level"]))
		{
			setvar("p_level", $_GET["level"]);
			if($_GET["level"] == "search")
			{
				$IndustryList["id"] = 0;				
				$IndustryList["box1"] = $industries;
				
				if(isset($_GET["tag"]))
				{
					$keyword = $this->tag->read("name", intval($_GET["tag"]));
					$keyword = $keyword["name"];
					$IndustryList["name"] = "Tìm theo từ khóa '<span class='keyword'>".$keyword."</span>'";
					setvar("keyword", $keyword);
				}
				
				setvar("IndustryList", $IndustryList);
				render("offers/level1");
			}
			else if($_GET["level"] == 1)
			{
				if(isset($_GET["industryid"]))
				{
					$count1 = 0;
					
					foreach($industries[$_GET["industryid"]]["sub"] as $key1 => $level1)
					{
						$industries[$_GET["industryid"]]["level0_name"] = $industries[$_GET["industryid"]]["name"];
						$industries[$_GET["industryid"]]["level0_id"] = $industries[$_GET["industryid"]]["id"];
						$industries[$_GET["industryid"]]["box1"] = $industries;
								
						foreach( $industries[$_GET["industryid"]]["box1"] as $key => $item)
						{
							$ii = $this->industry->field("children", "id=".$item["id"]);
							$industries[$_GET["industryid"]]["box1"][$key]["count"] = $this->industry->getCountProduct($ii,null,2);
						}
						
						
						$cats = array();					
						$cats[] = $level1["id"];
						
						//$industries[$_GET["industryid"]]["sub"][$key1]["ppcount"] = $this->industry->countProduct($level1["id"]);
						
						if($count1%6 == 1)
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 1;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 0;
						}
						
						//echo $level1["name"];
						if($count1%6 == 0 || $count1%6 == 5)
						{
							$maxitem = 11;
						}
						else
						{
							$maxitem = 3;
						}
						
						//if(rand(0,1) || $count0%6 == 0 || $count0%6 == 5)
						//{
							$industries[$_GET["industryid"]]["sub"][$key1]["disp"] = "disp";
						//}
						//else
						//{
						//	$industries[$_GET["industryid"]]["sub"][$key1]["disp"] = "hiden";
						//}
						
						
						//getImage
						//$rowi = $industry->getByID($key0);
						$industries[$_GET["industryid"]]["sub"][$key1]["image"] = pb_get_attachmenturl($industries[$_GET["industryid"]]["sub"][$key1]["picture"], "", "");
						
						if(preg_match('/nopicture/', $industries[$_GET["industryid"]]["sub"][$key1]["image"])) $industries[$_GET["industryid"]]["sub"][$key1]["image"] = "";
						
						
						foreach($level1['sub'] as $key2 => $level2)
						{
							$cats[] = $level2["id"];
							
							//echo $key2."-".$maxitem."/";
							if($key2 > $maxitem)
							{
								unset($industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]);
							}
							
							//$industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]["ppcount"] = $this->industry->countProduct($level2["id"]);
						}			
						$count1++;
						
						if($key1 == count($industries[$_GET["industryid"]]["sub"])-1)
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["last"] = 1;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["last"] = 0;
						}
						
					}
				}
				//$IndustryList["count"] = count($IndustryList["sub"]);
				$industries["id"] = $_GET["industryid"] ;
				
				setvar("IndustryList", $industries[$_GET["industryid"]]);
				
				render("offers/level1");
			}
			else if($_GET["level"] == 2)
			{
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							if($level1["id"] == $_GET["industryid"])
							{								
								$level1["level0_name"] = $level0["name"];
								$level1["level0_id"] = $level0["id"];
								$level1["level1_name"] = $level1["name"];
								$level1["level1_id"] = $level1["id"];
								$level1["box2"] = $level0['sub'];
								$level1["box1"] = $industries;
								
								//foreach($level1["box1"] as $key => $item)
								//{									
								//	$level1["box1"][$key]["count"] = $this->industry->getCount($item["id"],2);
								//}
								//foreach($level1["box2"] as $key => $item)
								//{									
								//	$level1["box2"][$key]["count"] = $this->industry->getCount($item["id"],2);
								//}	
								
								$level1["parent_name"] = $level0["name"];
								$level1["parent_id"] = $level0["id"];
								//var_dump($level1);
								foreach($level1['sub'] as $key2 => $level2)
								{
									$cats = array();
									$cats[] = $level2["id"];
									//echo $key2;
									
									//$level1["sub"][$key2]["ppcount"] = $this->industry->countProduct($level2["id"]);
									
									if($key2%6 == 1)
									{
										$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 1;
									}
									else
									{
										$industries[$_GET["industryid"]]["sub"][$key1]["break"] = 0;
									}
									
									//echo $level1["name"];
									if($key2%6 == 0 || $key2%6 == 5)
									{
										$maxitem = 11;
									}
									else
									{
										$maxitem = 3;
									}								
									
									foreach($level2['sub'] as $key3 => $level3)
									{
										$cats[] = $level3["id"];
										
										//$level1["sub"][$key2]["sub"][$key3]["ppcount"] = $this->industry->countProduct($level3["id"]);
										
										//echo $key2."-".$maxitem."/";
										if($key3 > $maxitem)
										{
											unset($level1["sub"][$key2]["sub"][$key3]);
										}
									}	
									
								}
								$IndustryList = $level1;
							}
						}						
						$count0++;
					}
				}
				//var_dump($IndustryList);
				$IndustryList["count"] = count($IndustryList["sub"]);
				setvar("IndustryList", $IndustryList);
				
				render("offers/level1");
			}
			else if($_GET["level"] == 3)
			{
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET["industryid"])
								{
									$level2["level1_name"] = $level1["name"];
									$level2["level1_id"] = $level1["id"];
									$level2["level0_name"] = $level0["name"];
									$level2["level0_id"] = $level0["id"];
									$level2["box3"] = $level1['sub'];
									$level2["box2"] = $level0['sub'];
									$level2["box1"] = $industries;
									
									foreach($level2['sub'] as $key3 => $level3)
									{
										$cats = array();
										$cats[] = $level3["id"];
										//echo $key2;
										if($key3%3 == 2)
										{
											$maxitem = 11;
											$level2["sub"][$key3]["size"] = "large";
										}
										else
										{
											$maxitem = 3;
											$level2["sub"][$key3]["size"] = "half";
										}
										
										if($key3%2 == 0)
										{										
											$level2["sub"][$key3]["odd"] = 1;
										}
										else
										{										
											$level2["sub"][$key3]["odd"] = 0;
										}
										
										
									}
									
									//foreach($level2["box1"] as $key => $item)
									//{										
									//	$level2["box1"][$key]["count"] = $this->industry->getCount($item["id"],2);
									//}
									//
									//foreach($level2["box3"] as $key => $item)
									//{										
									//	$level2["box3"][$key]["count"] = $this->industry->getCount($item["id"],2);
									//}

									$IndustryList = $level2;

								}
							}
						}						
						$count0++;
					}
				}
				//var_dump($IndustryList);
				$IndustryList["count"] = count($IndustryList["sub"]);
				setvar("IndustryList", $IndustryList);
				
				render("offers/level1");
			}
			else if($_GET["level"] == 4)
			{
				//echo $_GET["industryid"];
				//var_dump($industries);
				if(isset($_GET["industryid"]))
				{
					$count0 = 0;
					foreach($industries as $key0 => $level0)
					{					
						foreach($level0['sub'] as $key1 => $level1)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								//if($level2["id"] == 2586)
								//{
								//		var_dump($level2['sub']);
								//}
								foreach($level2['sub'] as $key3 => $level3)
								{
																
									if($level3["id"] == $_GET["industryid"])
									{
										//echo $level3["id"];
										$level3["level2_name"] = $level2["name"];
										$level3["level2_id"] = $level2["id"];
										$level3["level1_name"] = $level1["name"];
										$level3["level1_id"] = $level1["id"];
										$level3["level0_name"] = $level0["name"];
										$level3["level0_id"] = $level0["id"];
										$level3["box4"] = $level2['sub'];
										$level3["box3"] = $level1['sub'];
										$level3["box2"] = $level0['sub'];
										$level3["box1"] = $industries;
										
										//foreach($level3["box1"] as $key => $item)
										//{
										//	$level3["box1"][$key]["count"] = $this->industry->getCount($item["id"],2);
										//}
										////foreach($level3["box2"] as $key => $item)
										////{
										////	$level3["box2"][$key]["count"] = $this->industry->getCount($item["id"],2);
										////}
										////foreach($level3["box3"] as $key => $item)
										////{
										////	$level3["box3"][$key]["count"] = $this->industry->getCount($item["id"],2);
										////}
										//foreach($level3["box4"] as $key => $item)
										//{
										//	$level3["box4"][$key]["count"] = $this->industry->getCount($item["id"],2);
										//}
										
										$IndustryList = $level3;
										break;
									}									
								}								
							}
						}						
						$count0++;
					}
				}
				setvar("IndustryList", $IndustryList);
				
				render("offers/level1");
			}
		}
		else
		{
			$IndustryList["id"] = 0;				
			$IndustryList["box1"] = $industries;
			
			if(isset($_GET["tag"]))
			{
				$keyword = $this->tag->read("name", intval($_GET["tag"]));
				$keyword = $keyword["name"];
				$IndustryList["name"] = "Tìm theo từ khóa '<span class='keyword'>".$keyword."</span>'";
				setvar("keyword", $keyword);
			}
			else
			{
				$IndustryList["name"] = "Thị trường thương mại";
			}
			
			setvar("IndustryList", $IndustryList);
			render("offers/level1");
		}
	}
	
	function ajaxMainCategoryMenu()
	{
		if(isset($_GET["pos"]) && $_GET["pos"]=='area') {
			
		} else {
			//listing main industries
			$industries = $this->industry->getCacheIndustry();
			if(isset($_GET["service"]) && $_GET["service"] != "" && $_GET["service"] != "0detail" && $_GET["service"] != "h")
			{
				$module = "services";
				if($_GET["service"] == "offers")
				{
					$module = "offers";
				}
			}
			else
			{
				$module = "products";
			}
			
			if(isset($_GET["service"]) && $_GET["service"] == "company") {
				$module = "companies";
			}
			
			if(isset($_GET["service"]) && $_GET["service"] == "detail") {
				$module = "companies";
			}
			
			if(isset($_GET["pos"]) && $_GET["pos"]=='area' && $_GET["type"]=='thuong-mai') {
				$module = "offers";
				
				setvar("module",$module);
				setvar("industries",$industries);
				render("product/ajaxMainCategoryMenu_thuong-mai");
				exit;
			}
			
			if(isset($_GET["pos"]) && $_GET["pos"]=='area' && $_GET["type"]=='san-pham') {
				$module = "products";
			}
			
			if(isset($_GET["pos"]) && $_GET["pos"]=='area' && $_GET["type"]=='dich-vu') {
				$module = "services";
			}
			
			if(isset($_GET["pos"]) && $_GET["pos"]=='area' && $_GET["type"]=='viec-lam') {
				exit;
			}
			
			if(isset($_GET["pos"]) && $_GET["pos"]=='area' && $_GET["type"]=='hoc-tap') {
				exit;
			}
			
			setvar("module",$module);
			setvar("industries",$industries);
			render("product/ajaxMainCategoryMenu");
		}
	}
	
	//function convert757friends()
	//{
	//	$result = $this->space->getFriends_old(757);
	//	foreach($result as $item)
	//	{
	//		$this->link->save(array("parent_id"=>757, "member_id"=>$item["id"], "type_id"=>1, "created"=>$item["created"]));
	//	}
	//}
	
	function getBottomIndustryList()
	{
		//listing main industries
		$industries = $this->industry->getCacheIndustry();
		setvar("industries",$industries);
		
		render("product/_bottom-industry-list");
	}
	
	function getBottomRelatedProducts()
	{
		//find related products
		$bottom_related_products = $this->product->findByIndustry($_GET["industry_id"],$_GET["member_id"]);
		setvar("bottom_related_products",$bottom_related_products);
		
		render("product/_bottom-related-products");
	}
	
	function removeFlash()
	{
		var_dump($_SESSION['flash_title'].": ".$_SESSION['flash_message']);
		$_SESSION['flash_title'] = '';
		$_SESSION['flash_message'] = '';
	}
	
	function ajaxTopNewProductMain()
	{
		//top products for product main page
		$top_products = $this->product->getTopProducts();
		
		setvar("Products", $top_products);
		setvar("Count", count($top_products));
		render("product/_top_new_product_main");
	}
	
	function adClick() {
		global $customer_code;
		uses("ad");
		$adses = new Adses();
		if(!isset($_GET["id"])) {
			pheader("location:index.php");
		}
		$joins = array("LEFT JOIN {$adses->table_prefix}members m ON Ads.member_id=m.id");
		$joins[] = "LEFT JOIN {$adses->table_prefix}companies c ON Ads.company_id=c.id";
		
		$ad = $adses->read("c.cache_spacename,Ads.*,m.space_name", intval($_GET["id"]),null,null,$joins);
		
		if(!$ad["target_url"]) {
			$ad["target_url"] = $adses->url(array("module"=>"space","userid"=>$ad["space_name"]));
			if($ad["company_id"]) {
				$ad["target_url"] = $adses->url(array("module"=>"space","userid"=>$ad["cache_spacename"]));
			}
		}
		
		$adses->clicked($customer_code, $ad);
		
		pheader("location:".$ad["target_url"]);
	}
	
	function ajaxProductMainPageBanners() {
		global $customer_code;
		uses("ad");
		$ad = new Adses();
		
		$joins = array("LEFT JOIN {$ad->table_prefix}members m ON Ads.member_id=m.id");
		$conditions = array("adzone_id=6","Ads.state='1'","Ads.status='1'");
		
		$ads = $ad->findAll("Ads.*,m.space_name",$joins,$conditions,"display_order");
		
		for($i=0; $i<count($ads); $i++){
			$ads[$i]['src'] = pb_get_attachmenturl($ads[$i]['source_url'], '', "");
			$ads[$i]['description'] = strip_tags($ads[$i]['description']);	
		}
		//var_dump($ads);
		if(count($ads) == 4) {
			setvar("ads", $ads);
		}
		render("product/_product_main_page_banners");
	}
	
	//function mergeChatcode() {
	//	//echo strcmp("4", "5")."<br />";
	//	$chats = $this->chat->findAll("id, to_code, from_code");
	//	foreach($chats as $chat) {
	//		if(strcmp($chat["to_code"], $chat["from_code"]) < 0) {
	//			$code = $chat["to_code"]."-".$chat["from_code"];
	//		}
	//		else {
	//			$code = $chat["from_code"]."-".$chat["to_code"];
	//		}
	//		
	//		$this->chat->saveField("chat_code",$code,intval($chat["id"]));
	//	}
	//}
	
	function uploadChatImage()
	{
		uses("attachment");
		$attachment = new Attachment('uploadChatImage');
		
		$attachment->if_thumb = true;
		$attachment->if_thumb_smaller = true;

		$pb_userinfo = pb_get_member_info();
				
		$date = new DateTime();

		$tag = "";
		if(isset($_POST["chatbox_id"]) && $pb_userinfo)
		{
			if (!empty($_FILES['uploadChatImage']['name'])) {
				$attachment->upload_dir = "chat".DS.gmdate("Y").DS.gmdate("m").DS.gmdate("d");
				$attach_id = "chat_pic-".$pb_userinfo['pb_userid']."-".(strtotime(date("Y-m-d h:i:s")));
				$attachment->rename_file = $attach_id;
				$attachment->upload_process();
				
				$file_source = $attachment->file_full_url;
			}
			echo "<script>window.parent.insertChatImage('[image]".$file_source."[/image]', '".$_POST["chatbox_id"]."');</script>";
		}
		
		
	}
	
	function getIndustryPrice(){
		if(isset($_GET["industry_id"])) {
			$industry = $this->industry->read("*", $_GET["industry_id"]);
			echo number_format($industry["ad_price"], 0, ',', '.');
		}
	}
	function getAdzonePrice(){
		if(isset($_GET["adzone_id"])) {
			$adzone = $this->adzone->read("*", $_GET["adzone_id"]);
			echo number_format($adzone["price"], 0, ',', '.');
		}
	}
	
	function inviteFriendPage() {
		$pb_userinfo = pb_get_member_info();
		
		if(isset($_GET["space_name"])) {
			$company = $this->company->getInfoBySpaceName($_GET["space_name"]);
			$user = $this->member->getInfoBySpaceName($_GET["space_name"]);
		}
		
		setvar("fb_description", strip_tags($company["description"]));
		setvar('fb_image', $company['logobig']);
		
		$fb_url = $this->product->url(array("module"=>"space", "userid"=>$company["cache_spacename"]));
		$fb_url .= "/".$user["space_name"]."_un.htmls";
		//setvar("fb_url", $fb_url);
		setvar("company", $company);
		
		$r_domain = strtolower(get_domain($_SERVER['HTTP_REFERER']));
		if ($r_domain != 'marketonline.vn' && $r_domain != 'localhost') {
			pheader("location:".$fb_url);
		}
		$info = $this->announcement->read("message", 20);
		setvar("info", strip_tags($info["message"],"<br>"));
		render("product/inviteFriendPage");
	}
	
	function testMail() {
		require(PHPB2B_ROOT."libraries/sendmail.inc.php");
		echo "ddd";
		pb_sendmail(array("luanpm88@gmail.com", "Market Online"), "Market Online: ", null, "Kiem tra gui mail");
		echo "ddd";
	}
		
	function findFanpageId(){
		//$companies = $this->company->findAll("facebook", null, array("facebook != ''"));
		//foreach($companies as $com) {
		//	$fid = '';
		//	preg_match('/\d{13,}/', $com["facebook"], $match1);
		//	preg_match('/facebook.com[^\/]*\/([^\/\?]+)/', $com["facebook"], $match2);
		//	if(count($match1)) {
		//		$fid = $match1[0];
		//	} elseif (count($match2)) {
		//		$fid = $match2[1];
		//		
		//		$content = file_get_contents("http://graph.facebook.com/?id=".$fid);
		//		$content = json_decode($content, true);
		//		$fid = $content["id"];
		//	} else {
		//		//echo $com["facebook"]."<br />";
		//	}
		//	
		//	if($fid) {
		//		//echo $fid."<br />";
		//	}
		//}
		
		$string = "https://www.facebook.com/luanpm88?ref=hl";		
		var_dump($this->company->findFacebookId($string));
	}
	
	function setPubstatusAllMembers() {
		//select max(p.id) from pb_members m left join pb_products p on p.member_id=m.id where p.id is not null group by m.id order by p.created DESC
		$allIds = $this->member->findAll("max(p.id) as id", array("left join pb_trades p on p.member_id=Member.id"), array("p.id is not null"), "p.created DESC", null, null, null, "Member.id");
		$ids = array();
		foreach($allIds as $item) {
			$ids[] = $item["id"];
		}
		echo count($ids)."d";
		echo implode(",", $ids);
	}
	
	function validation() {
		$pb_userinfo = pb_get_member_info();
		$permissions = $this->product->getPermisstions($_POST['id'], $pb_userinfo["pb_userid"]);
		
		//validations
		if(isset($_POST["unvalid"])) {
			if($permissions["unvalid"]) {
				$valids["valid_status"] = 0;
				$valids["valid_message"] = $_POST['message'];
				$valids["valid_moderator"] = $pb_userinfo["pb_userid"];
				$valids["valid_date"] = date("Y-m-d H:i:s");				
				$this->product->save($valids,"update",intval($_POST['id']));
				//update modlog
				$valids["type"] = "product";
				$valids["item_id"] = $_POST['id'];
				$this->modlog->save($valids);
				
				$ppp = $this->product->read("*",intval($_POST['id']));
				//send notification
				if($ppp["service"]) {
					$kindname = "Dịch vụ";
					$typeurl = "?type=service";
				} else {
					$kindname = "Sản phẩm";
					$typeurl = "";
				}
				
				$content = "<a href='".URL."virtual-office/product.php".$typeurl."'>".$kindname." '".$ppp["name"]."' không hợp lệ. Vui lòng kiểm tra lại (".$ppp["valid_message"].")</a>";
				$sms['content'] = mysql_real_escape_string($content);
				$sms['title'] = mysql_real_escape_string($kindname." không hợp lệ");
				$sms['membertype_ids'] = '[1][2][3]';
				$this->message->SendToUser($pb_userinfo["pb_userid"], $ppp["member_id"], $sms);
			}
		}
		if(isset($_POST["valid"])) {
			if($permissions["valid"]) {
				$valids["valid_status"] = 1;
				//$valids["valid_message"] = $_POST['message'];
				//$valids["valid_moderator"] = $pb_userinfo["pb_userid"];
				$valids["valid_date"] = date("Y-m-d H:i:s");
				$this->product->save($valids,"update",intval($_POST['id']));
				//update modlog
				$valids["valid_message"] = "Xác nhận";
				$valids["type"] = "product";
				$valids["valid_moderator"] = $pb_userinfo["pb_userid"];
				$valids["item_id"] = $_POST['id'];
				$this->modlog->save($valids);
			}
		}
		
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	
	function checkActiveTime() {
		
	}
	function testScreenshot() {
		var_dump(php_uname());
		echo exec("ffmpeg -i attachment/album/201409/25/album-757-118.mp4 -ss 00:00:5.435 -f image2 -vframes 1 attachment/album/201409/25/album-757-118.mp4.thumb.png", $out, $err);
		var_dump($out);
		var_dump($err);
	}
	
	function updateCompanyPosition() {
		$com = $this->company->read("id,map_lat,map_lng,area_id,address",$_GET["id"]);
		
		if($com["area_id"] && ($com["map_lat"] == '' || $com["map_lng"] == '')) {
			$ffaddress = $com["address"].", ".$this->area->getFullName($com["area_id"]);
			$latlng = $this->area->getLatLngByAddress($ffaddress);
			$vals['map_lat'] = $latlng["lat"];
			$vals['map_lng'] = $latlng["lng"];
			
			$this->company->save($vals,'update',intval($com["id"]));
			
			echo "ok (".$vals['map_lat'].",".$vals['map_lng'].")";
		}
	}
	
	function updateAreaPosition() {
		$com = $this->area->read("id,map_lat,map_lng,name",$_GET["id"]);
		
		if(($com["map_lat"] == '' || $com["map_lng"] == '')) {
			$ffaddress = $this->area->getFullName($com["id"]);
			//$ffaddress = substr($ffaddress,2,strlen($ffaddress)-2);
			$latlng = $this->area->getLatLngByAddress($ffaddress);
			$vals['map_lat'] = $latlng["lat"];
			$vals['map_lng'] = $latlng["lng"];
			
			$this->area->save($vals,'update',intval($com["id"]));
			
			echo "ok (".$vals['map_lat'].",".$vals['map_lng'].")";
		}
	}
	
	function updateAreasPosition() {
		$coms = $this->area->findAll("id,name",null,array("level=3"),"created DESC");
		foreach($coms as $key => $com) {
			$coms[$key]["address"] = $this->area->getFullName($com["id"]);
		}
		setvar("coms",$coms);
		render("product/updateAreasPosition");
	}
	
	function updateCompaniesPosition() {
		$coms = $this->company->findAll("id,name",null,null,"created DESC");		
		setvar("coms",$coms);
		render("product/updateCompaniesPosition");
	}
	
	function ajaxTopCart()
	{
		global $viewhelper, $session;
		uses("cart", "cartitem");
		$cartitem = new Cartitems();
		$cart = new Carts();
		
		$session_cart_id = $_SESSION["cart_id"];
		//echo $session_cart_id;
		
		//create cart if empty
		if(!$session_cart_id)
		{
			$cart->params['data']['cart']['created'] = strtotime(date("Y-m-d H:i:s"));
			$result = $cart->add();		
			$key = $cart->table_name."_id";
			$_SESSION["cart_id"] = $cart->$key;			
			$session_cart_id = $cart->$key;
		}
		
		if(isset($_GET["id"]))
		{
			//add item			
			$cartitem->params['data']['cartitem']['cart_id'] = $session_cart_id;
			$cartitem->params['data']['cartitem']['product_id'] = $_GET["id"];
			
			
			
			if(isset($_GET["amount"]))
			{
				//echo $_GET["amount"];
				$result = $cartitem->add($_GET["id"], $session_cart_id, '', $_GET["amount"]);
			}
			else
			{			
				$result = $cartitem->add($_GET["id"], $session_cart_id);
			}
			//echo $cartitem->checkExist($_GET["id"], $session_cart_id)."gsdgs";
		}
		
		if(isset($_GET["task"]))
		{
			if($_GET["task"] == "update")
			{
				//var_dump($_GET['product']);
				foreach($_GET['product'] as $key => $value)
				{
					//echo $value;
					$cartitem->updateQuantity($key, $value);
				}
			}			
			else if($_GET["task"] == "remove" && isset($_GET["cartitemid"]))
			{
				$cartitem->Remove($_GET["cartitemid"]);
			}
		}
		
		$datas = $cartitem->getStickyDatas($session_cart_id);
		$count = 0;
		foreach($datas as $key => &$item)
		{
			$item["total"] = number_format($item["total"], 0, ',', '.');
			//echo $item["total"];
			foreach($item["items"] as $key2 => $item2)
			{
				$item["items"][$key2]["p_price"] = number_format($item2["p_price"], 0, ',', '.');
				$item["items"][$key2]["p_total"] = number_format($item2["p_price"]*$item2["quantity"], 0, ',', '.');
				$count += $item2["quantity"];
			}
		}
		
		
		setvar("StickyItems", $datas);
		setvar("total", $cartitem->total);
		setvar("count", $count);

		//$viewhelper->setPosition("Cart");
		$this->render("product/TopCartAjax");
	}
	
	function ajaxModernSearch()
	{
		if(isset($_GET["keyword"]))
		{
			$keyword = $_GET["keyword"];
		}
		else
		{
			return;
		}
		
		if(isset($_GET["type"]) && $_GET["type"] == "shop")
		{
			//
			$result = $this->company->fullTextSearch($keyword);
			
			//var_dump($result);
			setvar("list", $result);
			$this->render("modern/company/ajaxSearch");
		}
		else
		{
			$_GET["q"] = $keyword;
			//
			$this->product->initSearch();
			$result = $this->product->Search(0, 40);
			
			//var_dump($result);
			setvar("list", $result);
			$this->render("modern/product/ajaxSearch");
		}
	}
	
	//function resetFBShare() {
	//	$sql = "select p.max_id as product_id from pb_members m left join ( select member_id, max(id) as max_id from pb_products group by member_id order by created DESC ) p on p.member_id=m.id where p.max_id is not null order by m.id";
	//	$return = $this->product->dbstuff->GetArray($sql);
	//	foreach($return as $item) {
	//		$vals["facebook_pubstatus"] = 0;
	//		$vals["facebook_pubstatus_user"] = 0;
	//		$vals["facebook_pubstatus_user_wall"] = 0;
	//		$vals["facebook_pubstatus_user_fanpage"] = 0;
	//		$vals["facebook_pubstatus_fanpage"] = 0;
	//		
	//		$return = $this->product->save($vals,"update", intval($item["product_id"]));
	//	}
	//}
	//
	//function resetFBShareTrade() {
	//	$sql = "select p.max_id as product_id from pb_members m left join ( select member_id, max(id) as max_id from pb_trades group by member_id order by created DESC ) p on p.member_id=m.id where p.max_id is not null order by m.id";
	//	$return = $this->trade->dbstuff->GetArray($sql);
	//	foreach($return as $item) {
	//		$vals["facebook_pubstatus"] = 0;
	//		$vals["facebook_pubstatus_user"] = 0;
	//		$vals["facebook_pubstatus_user_wall"] = 0;
	//		$vals["facebook_pubstatus_user_fanpage"] = 0;
	//		$vals["facebook_pubstatus_fanpage"] = 0;
	//		
	//		$return = $this->trade->save($vals,"update", intval($item["product_id"]));
	//	}
	//}
	
	function saveGoogleContactString() {
		$pb_userinfo = pb_get_member_info();
		
		if($pb_userinfo && $_POST["data"]) {
			$this->googlecontact->update($pb_userinfo["pb_userid"],$_POST["data"]);
		}
	}
	
	function writeCSV() {
		$members = $this->member->findAll("Member.*,mf.*",array("LEFT JOIN {$this->product->table_prefix}memberfields mf ON mf.member_id=Member.id"));
		//var_dump($members);
		$myfile = fopen("listing.txt", "w") or die("Unable to open file!");
		
		$txt='';
		foreach($members as $mem) {
			$txt .= $mem["email"].", ".$mem["first_name"]." ".$mem["last_name"]."\n";
		}
		
		fwrite($myfile, $txt);
		$txt = "Jane Doe\n";
		fwrite($myfile, $txt);
		fclose($myfile);

	}
}
?>