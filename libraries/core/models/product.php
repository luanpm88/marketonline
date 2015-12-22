<?php
class Products extends PbModel {
 	var $name = "Product";
 	var $info;

 	function Products()
 	{
		parent::__construct();
 	}
 	
 	function initSearch()
 	{
 		$this->condition[] = "Product.status=1 ";
		$this->condition[] = "Product.valid_status=1 ";
		$this->condition[] = "Product.state=1 ";
 		if (isset($_GET['industryid']) && $area_a == null && $_GET['industryid']!="" && $_GET['industryid'] != 0) {
 			if (strpos($_GET['industryid'], ",")!==false) {
 				$this->condition[]= "Product.industry_id IN (".trim($_GET['industryid']).")";
 			}else{
	 			$industryid = intval($_GET['industryid']);
	 			$this->condition[]= "Product.industry_id='".$industryid."'";
 			}
 		}
 		if (isset($_GET['areaid'])) {
 			if (strpos($_GET['areaid'], ",")!==false) {
 				$this->condition[]= "Product.area_id IN (".trim($_GET['areaid']).")";
 			}else{
	 			$areaid = intval($_GET['areaid']);
	 			$this->condition[]= "Product.area_id='".$areaid."'";
 			}
 		}
 		if (isset($_GET['type'])) {
 			if($_GET['type']=="commend"){
 				$this->condition[] = "Product.ifcommend='1'";
 			}
 		}
 		if (!empty($_GET['typeid'])) {
 			//$this->condition[] = "Product.sort_id='".$_GET['typeid']."'";
 		}
 		if(!empty($_GET['q'])) {
			uses("tag");
			$tag = new Tags();
			
			$searchkeywords = strip_tags(urldecode($_GET['q']));
			
			$tags = $tag->findAll("id", null, array("LOWER(Tag.name) like '".strtolower($searchkeywords)."'"));
			$ors .= "MATCH (Product.name) AGAINST ('".$searchkeywords."') OR MATCH (Product.content) AGAINST ('".$searchkeywords."') OR Product.name like '%".$searchkeywords."%' ";
			foreach($tags as $item)
			{
				$ors .= " OR Product.tag_ids LIKE '%,".$item["id"]."'";
				$ors .= " OR Product.tag_ids LIKE '".$item["id"].",%'";
				$ors .= " OR Product.tag_ids LIKE '".$item["id"]."'";
				$ors .= " OR Product.tag_ids LIKE '%,".$item["id"].",%'";
			}
			//var_dump(implode(",", $tag_ids));
			//echo $ors;
			
			
			//$ors .= " OR REPLACE(LOWER(Product.product_code), '-', '')='".strtolower(str_replace("-","",$searchkeywords))."'";
			//$ors .= " OR LOWER(Product.product_code)='".strtolower($searchkeywords)."'";
			$ors .= " OR MATCH (Product.product_code) AGAINST ('".$searchkeywords."')";
			$ors .= " OR MATCH (b.name) AGAINST ('".$searchkeywords."')";
			
 			$this->condition[] = "(".$ors.")";
 		}
 		if (isset($_GET['pubdate'])) {
 			switch ($_GET['pubdate']) {
 				case "l3":
 					$this->condition[] = "Product.created>".($this->timestamp-3*86400);
 					break;
 				case "l10":
 					$this->condition[] = "Product.created>".($this->timestamp-10*86400);
 					break;
 				case "l30":
 					$this->condition[] = "Product.created>".($this->timestamp-30*86400);
 					break;
 				default:
 					break;
 			}
 		}
 		if (!empty($_GET['total_count'])) {
 			$this->amount = intval($_GET['total_count']);
 		}else{
 			$this->amount = $this->findCount();
 		}
 		if (!empty($_GET['orderby'])) {
 			switch ($_GET['orderby']) {
 				case "dateline":
 					$this->orderby = "created DESC";
 					break;
				case "favourite":
					$this->orderby = "clicked DESC";
 					break;
 				default:
 					break;
 			}
 		}
 	}
 	
 	function Search($firstcount, $displaypg)
 	{
		//echo $firstcount;
 		global $cache_types;
 		uses("space","industry","area","productcomment");
 		$space = new Space();
 		$area = new Areas();
 		$industry = new Industries();
		$productcomment = new Productcomments();
 		$cache_options = cache_read('typeoption');
 		$area_s = $space->array_multi2single($area->getCacheArea());
 		$industry_s = $space->array_multi2single($area->getCacheArea());
		
		
		$searchkeywords = strip_tags(urldecode($_GET['q']));
		if (isset($_GET['q']) && $_GET['q']!="") {
			$fields = "MATCH (Product.name) AGAINST ('".$searchkeywords."') AS score, MATCH (Product.content) AGAINST ('".$searchkeywords."') AS score1, ";
			$fields .= "MATCH (b.name) AGAINST ('".$searchkeywords."') AS score2, ";
			$fields .= "MATCH (Product.product_code) AGAINST ('".$searchkeywords."') AS score3, ";
			$this->orderby = '(score*20 + score1 + score2*10 + score3*4) DESC';
		}
		
		$joins = array("LEFT JOIN {$this->table_prefix}companies AS c ON c.id = Product.company_id","LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id");
		$joins[] = "LEFT JOIN {$this->table_prefix}brands AS b ON b.id = Product.brand_id";
		
 		$result = $this->findAll($fields."m.membertype_id,Product.*,Product.name AS title,Product.content AS digest,c.shop_name, c.cache_spacename", $joins, null, $this->orderby, $firstcount, $displaypg);
 		$result = $this->formatItems($result);
 		return $result;
 	}
	
	function formatItems($result) {
		global $cache_types;
 		uses("space","industry","area","productcomment");
 		$space = new Space();
 		$area = new Areas();
 		$industry = new Industries();
		$productcomment = new Productcomments();
 		$cache_options = cache_read('typeoption');
 		$area_s = $space->array_multi2single($area->getCacheArea());
 		$industry_s = $space->array_multi2single($area->getCacheArea());
		
		while(list($keys,$values) = each($result)){
			
 			$result[$keys]['typename'] = $cache_types['productsort'][$values['sort_id']];
			//get default picture
			if($values['default_pic'])
			{
				$pic_col = 'picture'.$values['default_pic'];
			}
			else
			{
				$pic_col = 'picture';
			}
			//echo $pic_col;
			
 			$result[$keys]['thumb'] = pb_get_attachmenturl($values[$pic_col], '', 'small');
 			if(isset($values['begin_time'])) $result[$keys]['pubdate'] = df($values['begin_time']);
 			else $result[$keys]['pubdate'] = '';
 			if (!empty($result[$keys]['area_id'])) {
 				$r1 = $area_s[$result[$keys]['area_id']];
 			}
 			if (!empty($result[$keys]['cache_companyname'])) {
 				$r2 = "<a href='".$space->rewrite($result[$keys]['cache_companyname'],$result[$keys]['company_id'])."'>".$result[$keys]['cache_companyname']."</a>";
 			}
 			if (!empty($r1) || !empty($r2)) {
 				$result[$keys]['extra'] = implode(" - ", array($r1, $r2));
 			}
 			$result[$keys]['url'] = $this->url(array("module"=>"product", "id"=>$values['id']));
			$result[$keys]["price"] = number_format($result[$keys]["price"], 0, ',', '.');
			$result[$keys]["new_price"] = number_format($result[$keys]["new_price"], 0, ',', '.');
			$result[$keys]["shop_url"] = $space->setBaseUrlByUserId($result[$keys]['cache_spacename'], 'index');
			$result[$keys]["comments_count"] = $productcomment->findCount(null, array("product_id=".$result[$keys]["id"]));
			$result[$keys]["name"] = fix_text_error($result[$keys]["name"]);
			$result[$keys]["description"] = trim(strip_tags($result[$keys]["content"]));
			
			//{the_url id=`$item.id` module='product' product_name=`$item.name` service=`$item.service`}
			$result[$keys]["href"] = $this->url(array("module"=>"product","product_name"=>$values['name'],"id"=>$values['id'],"service"=>$values['service']));
			
			$result[$keys]['company_logo'] = pb_get_attachmenturl($values["company_logo"], '', 'small');
 		}
		
		return $result;
	}
	
	function getTopProducts()
	{
		global $cache_types;
 		uses("space","industry","area","productcomment");
 		$space = new Space();
 		$area = new Areas();
 		$industry = new Industries();
		$productcomment = new Productcomments();
 		$cache_options = cache_read('typeoption');
 		$area_s = $space->array_multi2single($area->getCacheArea());
 		$industry_s = $space->array_multi2single($area->getCacheArea());
		
		
		$conditions = array("Product.status=1");
		$conditions[] = "pa.productadtype_id=1";
		
		$joins = array("LEFT JOIN {$this->table_prefix}companies AS c ON c.id = Product.company_id","LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id");
		$joins[] = "LEFT JOIN {$this->table_prefix}productads AS pa ON pa.product_id = Product.id";
		
 		$result = $this->findAll("pa.`order` as ad_order, m.membertype_id,Product.*,Product.name AS title,Product.content AS digest,c.shop_name, c.cache_spacename", $joins, $conditions, "ad_order");
 		while(list($keys,$values) = each($result)){
 			$result[$keys]['typename'] = $cache_types['productsort'][$values['sort_id']];
			//get default picture
			if($values['default_pic'])
			{
				$pic_col = 'picture'.$values['default_pic'];
			}
			else
			{
				$pic_col = 'picture';
			}
			//echo $pic_col;
			
 			$result[$keys]['thumb'] = pb_get_attachmenturl($values[$pic_col], '', 'small');
 			if(isset($values['begin_time'])) $result[$keys]['pubdate'] = df($values['begin_time']);
 			else $result[$keys]['pubdate'] = '';
 			if (!empty($result[$keys]['area_id'])) {
 				$r1 = $area_s[$result[$keys]['area_id']];
 			}
 			if (!empty($result[$keys]['cache_companyname'])) {
 				$r2 = "<a href='".$space->rewrite($result[$keys]['cache_companyname'],$result[$keys]['company_id'])."'>".$result[$keys]['cache_companyname']."</a>";
 			}
 			if (!empty($r1) || !empty($r2)) {
 				$result[$keys]['extra'] = implode(" - ", array($r1, $r2));
 			}
 			$result[$keys]['url'] = $this->url(array("module"=>"product", "id"=>$values['id']));
			$result[$keys]["price"] = number_format($result[$keys]["price"], 0, ',', '.');
			$result[$keys]["new_price"] = number_format($result[$keys]["new_price"], 0, ',', '.');
			$result[$keys]["shop_url"] = $space->setBaseUrlByUserId($result[$keys]['cache_spacename'], 'index');
			$result[$keys]["comments_count"] = $productcomment->findCount(null, array("product_id=".$result[$keys]["id"]));
		
 		}
 		return $result;
	}
	
	function SearchCount()
	{		
 		$result = $this->findCount(array("LEFT JOIN {$this->table_prefix}companies AS c ON c.id = Product.company_id","LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id","LEFT JOIN {$this->table_prefix}brands AS b ON b.id = Product.brand_id"), null, "Product.id");
		return $result;
	}

	function checkProducts($id = null, $status = null)
	{
		if(is_array($id)){
			$checkId = "id IN (".implode(",",$id).")";
		}else {
			$checkId = "id=".$id;
		}
		$sql = "UPDATE ".$this->getTable()." SET status=".$status." WHERE ".$checkId;
		$return = $this->dbstuff->Execute($sql);
		if($return){
			return true;
		}else {
			return false;
		}
	}
	
	function getInfo($id)
	{
		$sql = "SELECT p.*,m.username,c.name AS companyname,c.shop_name AS shop_name FROM {$this->table_prefix}products p LEFT JOIN {$this->table_prefix}members m ON m.id=p.member_id LEFT JOIN {$this->table_prefix}companies c ON c.member_id=p.member_id WHERE p.id=".$id;
		$result = $this->dbstuff->GetRow($sql);
		
		return $result;
	}
	
	function getSimilarByMemberId($member_id)
	{
		return $this->findAll("id,name", null, "Product.state=1 AND Product.status=1 AND Product.member_id={$member_id}", "Product.id DESC",0,8);
	}
	
	function getProductById($product_id)
	{
		$sql = "SELECT p.*, b.name AS brand_name, i.name as industry_name FROM {$this->table_prefix}products p"
			." LEFT JOIN {$this->table_prefix}brands b ON b.id = p.brand_id"
			." LEFT JOIN {$this->table_prefix}industries i ON i.id = p.industry_id"
			." WHERE p.id=".$product_id;
		$result = $this->dbstuff->GetRow($sql);
		//var_dump($result);
		if (empty($result) || !$result) {
			return false;
		}
		$result['pubdate'] = df($result['created']);
		if (!empty($result['picture'])) {
			$result['imgsmall'] = pb_get_attachmenturl($result['picture'], '', 'small');
			$result['imgmiddle'] = pb_get_attachmenturl($result['picture'], '', 'middle');
			$result['image'] = pb_get_attachmenturl($result['picture'], '', '');
			$result['image_url'] = rawurlencode($result['picture']);
		} else {
			$result['image'] = pb_get_attachmenturl('', '', 'middle');
		}
		if (!empty($result['picture1'])) {
			$result['imgsmall1'] = pb_get_attachmenturl($result['picture1'], '', 'small');
			$result['imgmiddle1'] = pb_get_attachmenturl($result['picture1'], '', 'middle');
			$result['image1'] = pb_get_attachmenturl($result['picture1'], '', '');
			$result['image_url1'] = rawurlencode($result['picture1']);
		}
		if (!empty($result['picture2'])) {
			$result['imgsmall2'] = pb_get_attachmenturl($result['picture2'], '', 'small');
			$result['imgmiddle2'] = pb_get_attachmenturl($result['picture2'], '', 'middle');
			$result['image2'] = pb_get_attachmenturl($result['picture2'], '', '');
			$result['image_url2'] = rawurlencode($result['picture2']);
		}
		if (!empty($result['picture3'])) {
			$result['imgsmall3'] = pb_get_attachmenturl($result['picture3'], '', 'small');
			$result['imgmiddle3'] = pb_get_attachmenturl($result['picture3'], '', 'middle');
			$result['image3'] = pb_get_attachmenturl($result['picture3'], '', '');
			$result['image_url3'] = rawurlencode($result['picture3']);
		}
		if (!empty($result['picture4'])) {
			$result['imgsmall4'] = pb_get_attachmenturl($result['picture4'], '', 'small');
			$result['imgmiddle4'] = pb_get_attachmenturl($result['picture4'], '', 'middle');
			$result['image4'] = pb_get_attachmenturl($result['picture4'], '', '');
			$result['image_url4'] = rawurlencode($result['picture4']);
		}
		$result["price"] = number_format($result["price"], 0, ',', '.');
		$result["new_price"] = number_format($result["new_price"], 0, ',', '.');
		
		//echo $result["price"];
		$this->info = $result;
		return $result;
	}
	
	function getProductBanners($user_id)
	{
		$sql = "SELECT p.*, b.name AS brand_name, i.name as industry_name FROM {$this->table_prefix}products p"
			." LEFT JOIN {$this->table_prefix}brands b ON b.id = p.brand_id"
			." LEFT JOIN {$this->table_prefix}industries i ON i.id = p.industry_id"
			." WHERE p.member_id=".$user_id." AND ads=1"
			." ORDER BY ads_time DESC LIMIT 10";
		$results = $this->dbstuff->GetArray($sql);
		
		foreach($results as &$result)
		{
			$this->formatInfo($result);
		}
		return $results;
	}
	
	function formatResult($result)
	{
		global $rewrite_able;
		$_PB_CACHE['membergroup'] = cache_read("membergroup");
		if (!empty($result)) {
			$count = count($result);
			for($i=0; $i<$count; $i++){
				$result[$i]['pubdate'] = df($result[$i]['created']);
				$result[$i]['content'] = strip_tags($result[$i]['content']);
				$result[$i]['url'] = ($rewrite_able)? "product/detail/".$result[$i]['id'].".html":"index.php?do=product&action=detail&id=".$result[$i]['id'];;
				$result[$i]['gradeimg'] = 'images/group/'.$_PB_CACHE['membergroup'][$result[$i]['membergroup_id']]['avatar'];
				$result[$i]['gradename'] = $_PB_CACHE['membergroup'][$result[$i]['membergroup_id']]['name'];
				
				if($result[$i]['default_pic'])
				{
					$pic_col = 'picture'.$result[$i]['default_pic'];
				}
				else
				{
					$pic_col = 'picture';
				}
				
				$result[$i]['image'] = pb_get_attachmenturl($result[$i][$pic_col]);
				$result[$i]['smallimg'] = pb_get_attachmenturl($result[$i][$pic_col], '', 'small');
				$trusttype_images = null;
				if(!empty($result[$i]['trusttype_ids'])){
					$tmp_trusttype = explode(",", $result[$i]['trusttype_ids']);
					foreach ($tmp_trusttype as $val) {
						$trusttype_images.='<img src="'.$_PB_CACHE['trusttype'][$val]['avatar'].'" alt="'.$_PB_CACHE['trusttype'][$val]['name'].'" />';
					}
				}
				$result[$i]['trusttype'] = $trusttype_images;
			}
			return $result;
		}else{
			return null;
		}
	}
	
	function getNewProductImages($cats, $num)
	{
		//echo "Sdfsdfsdf";
		//return true;
		
		$sql = "SELECT p.* FROM {$this->table_prefix}products p WHERE p.industry_id IN (".implode(',', $cats).") ORDER BY created DESC LIMIT 0, ".$num;
		$result = $this->dbstuff->GetArray($sql);
		//var_dump($result);
		//echo $sql;
		$image = array();
		foreach($result as $key => $item)
		{
			if($item['default_pic'])
			{
				$pic_col = 'picture'.$item['default_pic'];
			}
			else
			{
				$pic_col = 'picture';
			}
			
			$image[] = pb_get_attachmenturl($item[$pic_col]);
		}
		//var_dump($result);
		
		return $image;
	}
	
	function deleteImage($product, $conditions)
	{
		$del_id = $this->primaryKey;
		$tmp_ids = $condition = null;
		if (is_array($ids))
		{
			$tmp_ids = implode(",",$ids);
			$cond[] = "{$del_id} IN ({$tmp_ids})";
			$this->catchIds = serialize($ids);			
		}
		else
		{
			$cond[] = "{$del_id}=".intval($ids);
			$this->catchIds = $ids;
		}
		if (!empty($table)) {
			$table_name = $this->table_prefix.$table;
		}else{
			$table_name = $this->getTable();
		}
		if(!empty($conditions)) {
			if(is_array($conditions)) {
				$tmp_where_cond = implode(" AND ", $conditions);
				$cond[] = $tmp_where_cond;
			}
			else {
				$cond[] = $conditions;
			}
		}
		$this->setCondition($cond);
		$sql = "DELETE FROM ".$table_name.$this->getCondition();
		$deleted = $this->dbstuff->Execute($sql);
		unset($this->condition);
		return $deleted;
	}
	
	function getUserOnlines()
	{
		$sql = "SELECT s.* FROM {$this->table_prefix}sessions s WHERE s.data LIKE '%MemberID%'";
		$result = $this->dbstuff->GetArray($sql);
		
		$users = array();
		foreach($result as $key => $item)
		{
			$users[] = $this->unserializes($result[$key]["data"]);
		}
		
		//var_dump($users);
		
		return $users;
	}
	
	function unserializes($data) {
		$vars = preg_split(
		'/([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\|/',
		$data, -1, PREG_SPLIT_NO_EMPTY |
		PREG_SPLIT_DELIM_CAPTURE
		);
		for ($i = 0; isset($vars[$i]); $i++) {
			$result[$vars[$i++]] = unserialize($vars[$i]);
		}
		return $result;
	}
	
	function isOnline($uid)
	{		
		$users = $this->getUserOnlines();
		
		foreach($users as $key => $item)
		{
			if($item["MemberID"] == $uid)
			{
				return true;
			}
		}		
		return false;
	}
	
	function updateShowProducts($hours = 3, $count_p = 5)
	{
		$sql = "SELECT company_id, `count` FROM (SELECT company_id,count(id) as `count` FROM {$this->table_prefix}products p WHERE p.created > ".($this->timestamp - $hours*3600)." AND `show`=1 GROUP BY company_id) as cc WHERE `count` > ".$count_p;		
		//echo $sql;
		$result = $this->dbstuff->GetArray($sql);
		
		if(count($result))
		{
			foreach($result as $item)
			{
				$sql = "UPDATE {$this->table_prefix}products SET `show`=0 WHERE id IN (SELECT id FROM ( SELECT id FROM {$this->table_prefix}products WHERE created > ".($this->timestamp - $hours*3600)." AND `show`=1 AND company_id=".$item["company_id"]." ORDER BY created DESC LIMIT ".$count_p.", 200 ) tmp)";
				$this->dbstuff->Execute($sql);
			}
		}
	}
	
	
	function findByIndustry($iid,$userid)
	{
		//get children ids
		uses("industry");
		$industry_db = new Industries();
		$industry = $industry_db->read("children", $iid);
			
		$sql = "SELECT p.*, b.name AS brand_name, i.name as industry_name FROM {$this->table_prefix}products p"
			." LEFT JOIN {$this->table_prefix}brands b ON b.id = p.brand_id"
			." LEFT JOIN {$this->table_prefix}industries i ON i.id = p.industry_id"
			." WHERE p.valid_status = 1 AND p.status = 1 AND i.id IN (".$industry["children"].") AND p.member_id=".$userid
			." ORDER BY created DESC LIMIT 7";
		$results = $this->dbstuff->GetArray($sql);
		
		foreach($results as &$result)
		{
			$this->formatInfo($result);
		}
		return $results;
	}
	
	function formatInfo(&$result)
	{
			//var_dump($result);
			if (empty($result) || !$result) {
				return false;
			}
			$result['pubdate'] = df($result['created']);
			if (!empty($result['picture'])) {
				$result['imgsmall'] = pb_get_attachmenturl($result['picture'], '', 'small');
				$result['imgmiddle'] = pb_get_attachmenturl($result['picture'], '', 'middle');
				$result['image'] = pb_get_attachmenturl($result['picture'], '', '');
				$result['image_url'] = rawurlencode($result['picture']);
			} else {
				$result['image'] = pb_get_attachmenturl('', '', 'middle');
			}
			if (!empty($result['picture1'])) {
				$result['imgsmall1'] = pb_get_attachmenturl($result['picture1'], '', 'small');
				$result['imgmiddle1'] = pb_get_attachmenturl($result['picture1'], '', 'middle');
				$result['image1'] = pb_get_attachmenturl($result['picture1'], '', '');
				$result['image_url1'] = rawurlencode($result['picture1']);
			}
			if (!empty($result['picture2'])) {
				$result['imgsmall2'] = pb_get_attachmenturl($result['picture2'], '', 'small');
				$result['imgmiddle2'] = pb_get_attachmenturl($result['picture2'], '', 'middle');
				$result['image2'] = pb_get_attachmenturl($result['picture2'], '', '');
				$result['image_url2'] = rawurlencode($result['picture2']);
			}
			if (!empty($result['picture3'])) {
				$result['imgsmall3'] = pb_get_attachmenturl($result['picture3'], '', 'small');
				$result['imgmiddle3'] = pb_get_attachmenturl($result['picture3'], '', 'middle');
				$result['image3'] = pb_get_attachmenturl($result['picture3'], '', '');
				$result['image_url3'] = rawurlencode($result['picture3']);
			}
			if (!empty($result['picture4'])) {
				$result['imgsmall4'] = pb_get_attachmenturl($result['picture4'], '', 'small');
				$result['imgmiddle4'] = pb_get_attachmenturl($result['picture4'], '', 'middle');
				$result['image4'] = pb_get_attachmenturl($result['picture4'], '', '');
				$result['image_url4'] = rawurlencode($result['picture4']);
			}
			$result["price"] = number_format($result["price"], 0, ',', '.');
			$result["new_price"] = number_format($result["new_price"], 0, ',', '.');
			
			if($result['default_pic'])
			{
				$result['thumb'] = $result['imgsmall'.$result['default_pic']];
			}
			else
			{
				$result['thumb'] = $result['imgsmall'];
			}			
			
			//for url
	}
	
	function saveAdTypes($id, $types) {
		uses("productadtype","productad");
		$productadtype = new Productadtypes();
		$productad = new Productads();
		if(!$types) {
			$types = array("-1");
		}
		
		$sql = "DELETE FROM {$this->table_prefix}productads WHERE product_id=".$id." AND productadtype_id NOT IN (".implode(",",$types).")";
		$this->dbstuff->Execute($sql);
		
		foreach($types as $type_id) {
			if($type_id != -1) {
				$count = $productad->findCount(null, array("product_id=".$id,"productadtype_id=".$type_id));
				if($count == 0) {
					$productad->save(array("product_id"=>$id,"productadtype_id"=>$type_id,"created"=>date("Y-m-d H:i:s")));
				}
			}
		}
	}
	
	function getAdTypes($id) {
		uses("productadtype","productad");
		$productadtype = new Productadtypes();
		$productad = new Productads();
		
		$types = $productad->findAll("productadtype_id", null, array("product_id=".$id));
		$a = array();
		foreach($types as $item) {
			$a[] = $item["productadtype_id"];
		}
		
		return $a;
	}
	
	function getPermisstions($pid, $mid) {
		uses("moderator","product","industry","member");
		$moderatordb = new Moderators();
		$productdb = new Products();
		$industrydb = new Industries();
		$memberdb = new Members();
		
		$permissions = array("valid"=>false, "unvalid"=>false);
		
		$product = $productdb->read("id,industry_id,service,valid_status,valid_moderator", intval($pid));
		$moderator = $moderatordb->fields("*", array("member_id = ".intval($mid),"status=1"));
		$member_info = $memberdb->getInfoById($mid);
		//var_dump($member_info["role"]);
		
		if(count($moderator)) {			
			$types = explode(",",$moderator["manage_types"]);
			$industries = explode(",",$moderator["manage_industries"]);
			$rights = explode(",",$moderator["rights"]);
			
			if($product["service"]) {
				$type = 'service';
			} else {
				$type = 'product';
			}
			
			if(in_array($type,$types)) {
				//var_dump($moderator);
				
				$industry = $industrydb->read("id,level,parent_id", intval($product["industry_id"]));
				if($industry["level"] == 2) {
					$industry_id = $industry["id"];
				} elseif ($industry["level"] == 3) {
					$industry_id = $industry["parent_id"];
				} elseif ($industry["level"] == 4) {
					$industry = $industrydb->read("id,level,parent_id", intval($industry["parent_id"]));
					$industry_id = $industry["parent_id"];
				}
				
				if(in_array($industry_id,$industries)) {
					foreach($permissions as $key => $per) {
						if(in_array($key,$rights)) {
							$permissions[$key] = true;
						}
					}
					if($permissions["unvalid"]) {
						if($product["valid_status"] == 0 || ($product["valid_status"] == 3) && $product["valid_moderator"] != $mid) {
							$permissions["unvalid"] = false;
						}
					}
					if($permissions["valid"]) {
						if($product["valid_status"] == 1 || ($product["valid_status"] == 3) && $product["valid_moderator"] != $mid) {
							$permissions["valid"] = false;				
						}
					}
				}
			}
		}
		
		//for admin
		if($member_info["role"] == 'admin' && (in_array($product["valid_status"],array(0,3)))) {
			$permissions["valid"] = true;
		}
		if($member_info["role"] == 'admin' && (in_array($product["valid_status"],array(1,3)))) {
			$permissions["unvalid"] = true;
		}

		return $permissions;
	}
	
	function getByArea($params=array(), $offset=0, $row=3, $num=7) {		
		if($params["area_id"]) {
			//echo $params["area_id"];
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}
		if($params["service"]) {
			$conditions[] = "Product.service=1";
		}
		
		if($params["industries"]) {
			$conditions[] = "Product.industry_id IN (".implode(",",$params["industries"]).")";
		}
		
		//Conditions for new product show
		$conditions[] = "Product.state = 1";
		$conditions[] = "Product.valid_status = 1";
		$conditions[] = 'Product.area_show=1';
		//$other_con = " > 8";
		//$company_has_logo = "AND c.picture != '' AND c.banners IS NOT NULL";
		//$conditions[] = "(c.new_product_show=1 AND c.id IN (".
		//		"SELECT id FROM (SELECT cc.id, COUNT(pp.id) AS pcount FROM {$this->table_prefix}companies AS cc INNER JOIN {$this->table_prefix}products AS pp ON cc.id = pp.company_id WHERE pp.status=1 AND pp.state=1 AND pp.valid_status=1 GROUP BY cc.id) AS kk WHERE pcount".$other_con.") ".$company_has_logo." )";

		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}companies c ON c.id=Product.company_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=c.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}brands AS b ON b.id = Product.brand_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id";
		
		$count = $row*$num;
		$result = $this->findAll("a.name,m.membertype_id,Product.*,Product.name AS title,Product.content AS digest,c.shop_name, c.cache_spacename", $joins, $conditions, "Product.clicked DESC, Product.created DESC", $offset, $count);
		$count = $this->findCount($joins, $conditions, "Product.id");
		$result = $this->formatItems($result);
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function getStudentProducts($service = 0,$offset = null, $num = null) {
		global $cache_types;
 		uses("space","industry","area","productcomment");
 		$space = new Space();
 		$area = new Areas();
 		$industry = new Industries();
		$productcomment = new Productcomments();
 		$cache_options = cache_read('typeoption');
 		$area_s = $space->array_multi2single($area->getCacheArea());
 		$industry_s = $space->array_multi2single($area->getCacheArea());
		
		
		$conditions = array("Product.status=1","Product.state=1","Product.valid_status=1","Product.for_student=1");
		
		if($service) $conditions[] = "Product.service=1";
		
		$joins = array("LEFT JOIN {$this->table_prefix}companies AS c ON c.id = Product.company_id","LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id");
		
 		$result = $this->findAll("m.membertype_id,Product.*,Product.name AS title,Product.content AS digest,c.shop_name, c.cache_spacename", $joins, $conditions, "Product.created",$offset,$num);
 		$result = $this->formatItems($result);
		
		//$count = $this->findCount($joins, $conditions, "Product.id");
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function getStudentDiscountProducts($service = 0,$offset = null, $num = null) {
		global $cache_types;
 		uses("space","industry","area","productcomment");
 		$space = new Space();
 		$area = new Areas();
 		$industry = new Industries();
		$productcomment = new Productcomments();
 		$cache_options = cache_read('typeoption');
 		$area_s = $space->array_multi2single($area->getCacheArea());
 		$industry_s = $space->array_multi2single($area->getCacheArea());
		
		$conditions = array("Product.status=1","Product.state=1","Product.valid_status=1","Product.new_price>0");
		
		if($service) $conditions[] = "Product.service=1";
		
		$joins = array("LEFT JOIN {$this->table_prefix}companies AS c ON c.id = Product.company_id","LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id");
		
 		$result = $this->findAll("c.picture as company_logo,m.membertype_id,Product.*,Product.name AS title,Product.content AS digest,c.shop_name, c.cache_spacename", $joins, $conditions, "Product.created DESC",$offset,$num);
 		$result = $this->formatItems($result);
		
		//$count = $this->findCount($joins, $conditions, "Product.id");
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function getMobileHomeCats($zone_id=38) {
		uses("industry");
		$industry = new Industries();
		$industries = $industry->findAll("id, name", null, array("level = 1"), "display_order");
		foreach($industries as $key => $cat) {
			$conditions = array("Product.status=1","Product.state=1","Product.valid_status=1","Product.mobile_home=1");
			$conditions[] = "i.top_parentid=".$cat["id"];
		
			$joins = array("LEFT JOIN {$this->table_prefix}companies AS c ON c.id = Product.company_id","LEFT JOIN {$this->table_prefix}members AS m ON m.id = Product.member_id");
			$joins[] = "LEFT JOIN {$this->table_prefix}industries AS i ON i.id = Product.industry_id";
			
			$result = $this->findAll("c.picture as company_logo,m.membertype_id,Product.*,Product.name AS title,Product.content AS digest,c.shop_name, c.cache_spacename", $joins, $conditions, "Product.created DESC", 0, 10);
			$result = $this->formatItems($result);
			
			$industries[$key]["items"] = $result;
		}
		//var_dump($industries);
		return $industries;
	}
	
	function getDeal($id) {
		uses("deal");
		$deal = new Deals();
		$result = false;
		
		$deals = $deal->findAll("*", null, array("pb_product_id = ".$id));
		if(count($deals)) {
			$result = $deals[0];
		}
		
		return $result;
	}
}
?>