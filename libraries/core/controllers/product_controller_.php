<?php
class Product extends PbController {
	var $name = "Product";
	
	function Product()
	{
		$this->loadModel("product");
		$this->loadModel("industry");
		$this->loadModel("area");
	}
	
	function index()
	{
		
		//$con=mysqli_connect("localhost","root","","b2bwin8");
		//// Check connection
		//if (mysqli_connect_errno())
		//  {
		//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		//  }
		//  
		//  $con->set_charset("utf8");
		
		//mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
		//VALUES ('Peter', 'Griffin',35)");
		
		//mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
		//VALUES ('Glenn', 'Quagmire',33)");
		
		
		
		//insert tinh/thanh
		//$handle = @fopen("vn.txt", "r");
		//if ($handle) {
		//	while (($buffer = fgets($handle, 4096)) !== false) {
		//	    //echo $buffer;
		//	    if( preg_match ( '/case/' , $buffer ) )
		//	    {
		//		$str = explode('"', $buffer);
		//		echo $str[1];
		//		if($str[1] != "" && isset($str[1])) mysqli_query($con,"INSERT INTO `pb_areas` (`attachment_id`, `areatype_id`, `child_ids`, `top_parentid`, `level`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `display_order`, `description`, `available`, `created`, `modified`) VALUES"
		//				." (0, 0, NULL, 1, 2, '".$str[1]."', '', '', 0, 1, 0, NULL, 1, 0, 0)");
		//	    }
		//	}
		//	if (!feof($handle)) {
		//	    echo "Error: unexpected fgets() fail\n";
		//	}
		//	fclose($handle);
		//}
		
		//insert quan/huyen
		//$handle = @fopen("vn.txt", "r");
		//if ($handle) {
		//	$parent = 1;
		//	while (($buffer = fgets($handle, 4096)) !== false) {
		//	    //echo $buffer;
		//	    if( preg_match ( '/case/' , $buffer ) )
		//	    {
		//		$parent++;				
		//	    }
		//	    else
		//	    {
		//		if( preg_match ( '/\"/' , $buffer ) )
		//		{
		//			$str = explode('"', $buffer);
		//			echo $parent . "--" . $str[1]."<br />";
		//			if($str[1] != "" && isset($str[1])) mysqli_query($con,"INSERT INTO `pb_areas` (`attachment_id`, `areatype_id`, `child_ids`, `top_parentid`, `level`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `display_order`, `description`, `available`, `created`, `modified`) VALUES"
		//				." (0, 0, NULL, 1, 3, '".$str[1]."', '', '', 0, ".$parent.", 0, NULL, 1, 0, 0)");
		//		}
		//		
		//	    }
		//	}
		//	if (!feof($handle)) {
		//	    echo "Error: unexpected fgets() fail\n";
		//	}
		//	fclose($handle);
		//}
		
		
		//get all industry
		//$content = file_get_contents("nn.txt");
		//$content = preg_replace('/^\s+|\n|\r|\s+$/m', '', $content);
		//echo $content;
		//preg_match_all('/\<td(.*?)h4(.*?)\>(.*?)\<span(.*?)\>(.*?)\<\/span(.*?)\<\/h4(.*?)\<\/td/', $content, $level1);
		//var_dump($level1);
		
		//foreach($level1[5] as $kk => $item)
		//{
		//	if($item != "" && isset($item)) mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`) VALUES"
		//					." (0, 0, NULL, '".$item."', '', '', 0, 0, 0, 1, 0, NULL, 1, 0, 0)");
		//}
		
		//$pid = 1;
		//foreach($level1[7] as $kk => $item)
		//{
		//	preg_match_all('/\<li(.*?)\<a(.*?)href\=\"(.*?)\"(.*?)\>(.*?)\<span/', $item, $childitem);
		//	//var_dump($childitem);
		//	foreach($childitem[5] as $uu => $tim)
		//	{
		//		echo trim($tim);
		//		echo $childitem[3][$uu];
		//		if($item != "" && isset($item)) mysqli_query($con,"INSERT INTO `pb_industries` (`attachment_id`, `industrytype_id`, `child_ids`, `name`, `url`, `alias_name`, `highlight`, `parent_id`, `top_parentid`, `level`, `display_order`, `description`, `available`, `created`, `modified`, `tempurl`) VALUES"
		//					." (0, 0, NULL, '".trim($tim)."', '', '', 0, ".$pid.", ".$pid.", 2, 0, NULL, 1, 0, 0, '".$childitem[3][$uu]."')");
		//	}
		//	$pid++;
		//}
		
		//mysqli_close($con);
		
		
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
			//var_dump($data);
		}
		//var_dump($industry->getByID(1));
		//get all industries from cache
		$industries = $this->industry->getCacheIndustry();
		if(isset($_GET["level"]))
		{
			if($_GET["level"] == 1)
			{
				if(isset($_GET["industryid"]))
				{
					$count1 = 0;
					
					foreach($industries[$_GET["industryid"]]["sub"] as $key1 => $level1)
					{
						$cats = array();					
						$cats[] = $level1["id"];
						
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
						$rowi = $industry->getByID($key0);
						$industries[$_GET["industryid"]]["sub"][$key1]["image"] = pb_get_attachmenturl($rowi["picture"], "", "");
						
						if(preg_match('/nopicture/', $industries[$_GET["industryid"]]["sub"][$key1]["image"])) $industries[$_GET["industryid"]]["sub"][$key1]["image"] = "";
						
						
						foreach($level1['sub'] as $key2 => $level2)
						{
							$cats[] = $level2["id"];
							
							//echo $key2."-".$maxitem."/";
							if($key2 > $maxitem)
							{
								unset($industries[$_GET["industryid"]]["sub"][$key1]["sub"][$key2]);
							}
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
						
						//var_dump($cats);
						$images = $this->product->getNewProductImages($cats, 2);
						if(count($images))
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["images"] = $images;
						}
						else
						{
							$industries[$_GET["industryid"]]["sub"][$key1]["images"] = "";
						}
						//var_dump($industries[$_GET["industryid"]]["sub"][$key1]["images"]);
						//var_dump($industries[$key0]["images"]);
								
					}
							//var_dump($industries[$_GET["industryid"]]);
				}
				
				//var_dump($industries[$_GET["industryid"]]);
				
				setvar("IndustryList", $industries[$_GET["industryid"]]);
				
				render("product/level1");
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
								$level1["parent_name"] = $level0["name"];
								$level1["parent_id"] = $level0["id"];
								//var_dump($level1);
								foreach($level1['sub'] as $key2 => $level2)
								{
									$cats = array();
									$cats[] = $level2["id"];
									//echo $key2;
									
									
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
										
										//echo $key2."-".$maxitem."/";
										if($key3 > $maxitem)
										{
											unset($level1["sub"][$key2]["sub"][$key3]);
										}
									}	
									
									//var_dump($cats);
									$images = $this->product->getNewProductImages($cats, 2);
									if(count($images))
									{
										$level1["sub"][$key2]["images"] = $images;
									}
									else
									{
										$level1["sub"][$key2]["images"] = "";
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
				
				render("product/level2");
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
										
										//var_dump($cats);
										$images = $this->product->getNewProductImages($cats, 2);
										if(count($images))
										{
											$level2["sub"][$key3]["images"] = $images;
										}
										else
										{
											$level2["sub"][$key3]["images"] = "";
										}
										
									}
									
									foreach($level2["box1"] as $key => $item)
									{
										$level2["box1"][$key]["count"] = $industry->read("count", $item["id"])["count"];
									}
									
									foreach($level2["box2"] as $key => $item)
									{
										$level2["box2"][$key]["count"] = $industry->read("count", $item["id"])["count"];
									}
									
									foreach($level2["box3"] as $key => $item)
									{
										$level2["box3"][$key]["count"] = $industry->read("count", $item["id"])["count"];
									}							
									
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
				
				render("product/level3");
			}
			else if($_GET["level"] == 4)
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
								foreach($level2['sub'] as $key3 => $level3)
								{
									if($level3["id"] == $_GET["industryid"])
									{
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
										//	$level3["box1"][$key]["count"] = $industry->read("count", $item["id"])["count"];
										//}
										//
										//foreach($level3["box2"] as $key => $item)
										//{
										//	$level3["box2"][$key]["count"] = $industry->read("count", $item["id"])["count"];
										//}
										//
										//foreach($level3["box3"] as $key => $item)
										//{
										//	$level3["box3"][$key]["count"] = $industry->read("count", $item["id"])["count"];
										//}
										//
										//foreach($level3["box4"] as $key => $item)
										//{
										//	$level3["box4"][$key]["count"] = $industry->read("count", $item["id"])["count"];
										//}
										
										$IndustryList = $level3;
									}
									
									break;
								}
							}
						}						
						$count0++;
					}
				}
				setvar("IndustryList", $IndustryList);
				
				render("product/level4");
			}
		}
		else
		{
			//require('libraries/core/models/product.php');
			//$industrybd = new Industries();
			//$product = new Products();
			//Get industry level 1			
			$count0 = 0;
			foreach($industries as $key0 => $level0)
			{
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
				$rowi = $industry->getByID($key0);
				$industries[$key0]["image"] = pb_get_attachmenturl($rowi["picture"], "", "");
				
				if(preg_match('/nopicture/', $industries[$key0]["image"]))  $industries[$key0]["image"] = "";
				
				//echo $industries[$key0]["image"];
				
				foreach($level0['sub'] as $key1 => $level1)
				{
					$cats[] = $level1["id"];
					
					foreach($level1['sub'] as $key2 => $level2)
					{
						$cats[] = $level2["id"];
					}
					
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
				//var_dump($cats);
				$images = $this->product->getNewProductImages($cats, 2);
				//echo "sdfsdf";
				if(count($images))
				{
					//echo "sdfsdf";
					$industries[$key0]["images"] = $images;
				}
				else
				{
					$industries[$key0]["images"] = "";
				}
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
			
			
			
			render("product/index");
		}
	}
	
	function connect()
	{
		$pb_userinfo = pb_get_member_info();
		//$pb_userinfo = $member->getInfoById($pb_userinfo['pb_userid']);
		
		
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
			//var_dump($data);
		}

		$industries = $this->industry->getCacheIndustry();
		
		//get links and follows
		uses("space");
		$space = new Spaces();
		$links = $space->getFriends($pb_userinfo['pb_userid']);
		//var_dump($links);
		
		foreach($links as $key => $item)
		{
			$links[$key]["image"] = pb_get_attachmenturl($item['company_picture'], '', 'small');
			$links[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		}
		
		$follows = $space->getFollowFriends($pb_userinfo['pb_userid']);
		foreach($follows as $key => $item)
		{
			$follows[$key]["image"] = pb_get_attachmenturl($item['picture'], '', 'small');
			$follows[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
			
		}
		
		setvar('count_links', count($links));
		setvar('count_follows', count($follows));
		setvar('links', $links);
		setvar('follows', $follows);
		foreach($industries as $key => $item)
		{
			$industries[$key]["count"] = $industry->read("count", $item["id"])["count"];
		}
		setvar("IndustryList", $industries);
		
		render("product/connect");

	}
	
	function detail()
	{
		global $viewhelper;
		using("company","member","form", "tag","area","industry","meta");
		$company = new Companies();
		$area = new Areas();
		$meta = new Metas();
		$industry = new Industries();
		$tag = new Tags();
		$member = new Members();
		$form = new Forms();
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
		if(empty($info) || !$info){
			flash("data_not_exists", '', 0);
		}
		if (isset($info['formattribute_ids'])) {
			$form_vars = $form->getAttributes(explode(",", $info['formattribute_ids']),2);
			setvar("ObjectParams", $form_vars);
			//var_dump($form_vars);
		}
		if (!empty($info['tag_ids'])) {
			$tag_res = $tag->getTagsByIds($info['tag_ids']);
			if (!empty($tag_res)) {
				$tags = null;
				foreach ($tag_res as $key=>$val){
					$tags.='<a href="'.$this->url(array("module"=>"tag", "do"=>"product", "q"=>$val)).'" target="_blank">'.$val.'</a>&nbsp;';
				}
				$info['tag'] = $tags;
				unset($tags, $tag_res, $tag);
			}
		}
		if ($info['state']!=1) {
			flash("unvalid_product", '', 0, 'bbb');
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
		$info['industry_names'] = $industry->disSubNames($info['industry_id'],' <span class="delim">/</span> ', true, "product");
		$info['area_names'] = $area->disSubNames($info['area_id'], " / ", false, "product");
		$info['title'] = strip_tags($info['name']);
		//var_dump($info);
		//getImage
						$inn = $industry->getByID($info['industry_id']);
						//$parentz = $industry->getByID($inn['parent_id']);
						$grand = $industry->getByID($inn['top_parentid']);
						//var_dump($grand);
						setvar('inn_array', $this->getArrayIndustry($inn['parent_id']));
						
		//delete the pre num.2011.9.1
		$info['tel'] = preg_replace('/\((.+?)\)/i', '', $info['tel']);
		$info['fax'] = preg_replace('/\((.+?)\)/i', '', $info['fax']);
		$info = pb_lang_split_recursive($info);
		$banner['banner1'] = pb_get_attachmenturl($grand["picture"], "", "");
		$banner['banner1_id'] = $grand["id"];
		//echo $info['banner1'];
		
		//replace content
		$info['content'] = html_entity_decode($info['content']);
		$info['content'] = str_replace("<a", "<a target='_blank'", $info['content']);
		
		if($info['default_pic'])
		{
			$info['d_image'] = $info['image'.$info['default_pic']];
		}
		else
		{
			$info['d_image'] = $info['image'];
		}
		
		//var_dump($info);
		setvar("item", $info);
		setvar("Product", $info);
		setvar("banner", $banner);
		$this->product->clicked($id);
		render("product/detail");
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
		
		//member connect
		if (isset($_GET['connectid'])) {
			uses("space");
			$space = new Space();
			
			$mems = $space->getFriends($_GET['connectid']);
			$mem_ids = array();
			foreach($mems as $item)
			{
				$mem_ids[] = $item["id"];
			}
			$mems = $space->getFollowFriends($_GET['connectid']);
			foreach($mems as $item)
			{
				$mem_ids[] = $item["id"];
			}
			
			$this->product->condition[] = "Product.member_id IN (".implode(',',$mem_ids).")";
			
		}
		
		foreach($this->product->condition as $key => $item)
		{
			if(strpos($item, "industry_id"))
			{
				$this->product->condition[$key] = "Product.industry_id IN (".implode(',',$area_a).")";
			}			
		}
		//var_dump($this->product->condition);
		//testing code ne
		$products = $this->product->Search($pos_pg, 15);
		
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
		setvar("Count", count($products));
		setvar("Products", $products);
		$this->render("product/ajax.list");
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
		
		
		foreach($this->product->condition as $key => $item)
		{
			if(strpos($item, "industry_id"))
			{
				$this->product->condition[$key] = "Product.industry_id IN (".implode(',',$area_a).")";
			}			
		}
		//var_dump($this->product->condition);
		//testing code ne
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
		global $viewhelper;
		
		if (session_id() == '' ) { 
			require_once(LIB_PATH. "session_mysql.class.php");
			$session = new PbSessions();
		}
		
		$order_id = $session->read("order_id");
		$session->destroy("cart_id");
		$session->destroy("order_id");
		//echo $order_id;
		$this->sendTestMail($order_id);
		
		$this->render("product/thankyou");
		
	}
	
	function meminfo()
	{
		global $viewhelper;
		uses("cart", "cartitem", "member", "saleorder", "saleorderitem");
		$cartitem = new Cartitems();
		$cart = new Carts();
		$member = new Members();
		$order = new Saleorders();
		$orderitem = new Saleorderitems();
		if (session_id() == '' ) { 
			require_once(LIB_PATH. "session_mysql.class.php");
			$session = new PbSessions();
		}
		//echo "sdfsdfs";
		
		$session_cart_id = $session->read('cart_id');
		
		if(isset($_POST["data"]))
		{
			//var_dump($_POST["data"]);
			
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
				//echo $order_id;
				$items = $cartitem->getDataByMemberID($session_cart_id, $_GET["id"]);
				
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
						$session->write('order_id', $order_id);
						//echo $order_id;
						
						$datas = $orderitem->getStickyDatas($order_id);
						$info = $order->read("*", $order_id, null, array('id'=>$order_id));
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
						
						render("product/confirmorder");
					}
				}
			}
			
		}
		
		$pb_userinfo = pb_get_member_info();
		$pb_userinfo = $member->getInfoById($pb_userinfo['pb_userid']);
		//var_dump($pb_userinfo);
		
		setvar("Countries", $countries = cache_read("country"));
		setvar("pb_userinfo", $pb_userinfo);
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
			//var_dump($rows);
			//echo "<select>";
			foreach($rows as $row)
			{
				//echo $row['id'];
				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
			//echo "</select>";
			
		}
	}
	
	function add_cart()
	{
		global $viewhelper;
		//echo "vsdsdvsv";
		uses("cart", "cartitem");
		$cartitem = new Cartitems();
		$cart = new Carts();

		
		if (session_id() == '' ) { 
			require_once(LIB_PATH. "session_mysql.class.php");
			$session = new PbSessions();
		}
		
		$session_cart_id = $session->read('cart_id');
		//echo $session_cart_id;
		
		//create cart if empty
		if(!$session_cart_id)
		{
			$cart->params['data']['cart']['created'] = strtotime(date("Y-m-d H:i:s"));
			$result = $cart->add();		
			$key = $cart->table_name."_id";
			$session->write('cart_id', $cart->$key);
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
		$this->render("product/cart");
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
		global $viewhelper;
		//echo "vsdsdvsv";
		uses("cart", "cartitem");
		$cartitem = new Cartitems();
		$cart = new Carts();

		
		if (session_id() == '' ) { 
			require_once(LIB_PATH. "session_mysql.class.php");
			$session = new PbSessions();
		}
		
		$session_cart_id = $session->read('cart_id');
		//echo $session_cart_id;
		
		//create cart if empty
		if(!$session_cart_id)
		{
			$cart->params['data']['cart']['created'] = strtotime(date("Y-m-d H:i:s"));
			$result = $cart->add();		
			$key = $cart->table_name."_id";
			$session->write('cart_id', $cart->$key);
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
	
	function sendTestMail($id)
	{
		require(PHPB2B_ROOT."libraries/sendmail.inc.php");
		require(CACHE_LANG_PATH."lang_site.php");
		uses("message","saleorder","saleorderitem","member");
		
		$saleorder = new Saleorders();
		$saleorderitem = new saleorderitems();
		$member = new Members();
		
		if ($id) {
			//$id = intval($_GET['id']);
			
		
						$datas = $saleorderitem->getStickyDatas($id);
						$info = $saleorder->read("*", $id, null, array('id'=>$id));
						
						$seller = $member->read("Member.*, mf.address, mf.mobile", $info["seller_id"], null, array('id'=>$info["seller_id"]), array("LEFT JOIN pb_memberfields mf ON mf.member_id=Member.id"));
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
		$attachment = new Attachment('upload_banner');
		$company = new Companies();
		//var_dump($_POST);
		//var_dump($pb_userinfo);
		
		if (!empty($_FILES['upload_banner']['name']) && $pb_userinfo["pb_username"] == $_POST["username"]) {
			//echo "sdfsdfsdfsdfs";
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->rename_file = "company-banner-".$pb_userinfo["pb_userid"];
			$attachment->upload_process();
			$vals['banner'] = $attachment->file_full_url;
			$company->save($vals, "update", $_POST["com_id"], null, "member_id=".$pb_userinfo["pb_userid"]);
			echo $vals['banner'];
			pheader("location:".$_POST["uri"]);
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
		
		$conditions[] = "to_member_id=".$pb_userinfo["pb_userid"];
		$conditions[] = "status=0";
		
		$result = $pms->findAll("id,from_member_id,cache_from_username,title,content,status,created", null, $conditions, "id DESC", 0, 100);
		
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
			}
			setvar("Items",$result);
		}
		
		//var_dump(count($result));
		//var_dump($result);
		
		setvar("Link", $absolute_uri."virtual-office/pms.php");
		setvar("Count", count($result));
		setvar("Item", $result);
		$this->render("product/ajaxInbox");
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
		foreach($industries as $key0 => $level0)
		{
			if($level0["id"] == $_GET['industryid'])
			{
				foreach($level0['sub'] as $key => $item)
				{
					$level0['sub'][$key]["count"] = $this->industry->read("count", $item["id"])["count"];
				}			
				setvar("Items", $level0['sub']);				
				setvar("Map", " | ".$level0["name"]);
				$this->render("product/ajaxLoadMenuConnect");
				exit;
			}
			else
			{
				foreach($level0['sub'] as $key1 => $level1)
				{
					if($level1["id"] == $_GET['industryid'])
					{
						foreach($level1['sub'] as $key => $item)
						{
							$level1['sub'][$key]["count"] = $this->industry->read("count", $item["id"])["count"];
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
									$level2['sub'][$key]["count"] = $this->industry->read("count", $item["id"])["count"];
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
											$level2['sub'][$key]["count"] = $this->industry->read("count", $item["id"])["count"];
										}
										setvar("Items", $level3['sub']);
										setvar("Map", " | <a href='javascript:void(0)' rel='".$level0["id"]."'>".$level0["name"]."</a> | <a href='javascript:void(0)' rel='".$level1["id"]."'>".$level1["name"]."</a> | <a href='javascript:void(0)' rel='".$level2["id"]."'>".$level2["name"]."</a> | ".$level3["name"]);
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
				exit;
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
								//echo "sdfsdf 3";
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
			$area_a = array();
			$area_a[] = $id;
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $id)
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
						if($level1["id"] == $id)
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
								if($level2["id"] == $id)
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
										
										if($level3["id"] == $id)
										{
											$area_a[] = $level3["id"];
										}
										else
										{
											foreach($level3['sub'] as $key4 => $level4)
											{
												
												if($level4["id"] == $id)
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
		
		
		//if($res){
		//	if($the_memberid == $res["id"]) $product->deleteImage($res, $conditions);
		//	if(!$product->del($_GET['id'], $conditions)){
		//		flash();
		//	}
		//}else {
		//	flash("data_not_exists");;
		//}
		
		//echo $_GET["pid"]."hehe".$_GET["pos"];
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
		//echo "sdfsdf";
		uses("attachment");
		$attachment = new Attachment('uploadEditorFile');
		
		$attachment->if_thumb = false;
		$attachment->if_thumb_large = false;
		//echo "sdfsdf";
		$pb_userinfo = pb_get_member_info();
		//$pb_userinfo = $member->getInfoById($pb_userinfo['pb_userid']);
		
		$date = new DateTime();
		//echo $date->getTimestamp();
		//echo "sdfsdf";
		//var_dump($_FILES);
		
		if (!empty($_FILES['uploadEditorFile']['name'])) {
			//echo "sdfsdf 2";
			$attach_id = "editor_pic-".$pb_userinfo['pb_userid']."-".(strtotime(date("Y-m-d h:i:s")));
			//echo "sdfsdf 3";
			$attachment->rename_file = $attach_id;
			//echo "sdfsdf";
			$attachment->upload_editor_process();
			
			$file_source = $attachment->file_full_url;
			//echo "sdfsdf";
		}
		//echo "<script type='text/javascript' src='{$theme_img_path}js/jquery.js?ver=1.8.3'></script>";
		echo "<script>window.parent.inserEditorFile('".$file_source."', ".$attachment->is_image.");</script>";
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
		//var_dump($links);
		foreach($links as $key => $item)
		{
			$links[$key]["image"] = pb_get_attachmenturl($item['company_picture'], '', 'small');
			$links[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
		}
		
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
		foreach($follows as $key => $item)
		{
			$follows[$key]["image"] = pb_get_attachmenturl($item['picture'], '', 'small');
			$follows[$key]["link"] = 'space/?userid='.$item["username"].'&do=';
			
		}
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
}
?>