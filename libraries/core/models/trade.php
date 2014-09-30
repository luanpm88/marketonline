<?php
class Trades extends PbModel {
 	var $name = "Trade";
 	var $info;
 	var $fields = "m.space_name as userid,m.membertype_id,m.username,m.trusttype_ids,m.credits,m.membergroup_id,t.*,t.content as digest,t.cache_companyname as companyname";
 	var $amount;
 	var $instance = NULL;
	var $condition;

 	function Trades()
 	{
		parent::__construct();
 	}
 	
 	function initSearch()
 	{
 		global $_PB_CACHE;
 		$this->condition[] = "status=1";
		$this->condition[] = "valid_status=1";
		
 		if (isset($_GET['q'])) {
 			$searchkeywords = urldecode($_GET['q']);
 			$this->condition[]= "(MATCH (title) AGAINST ('".$searchkeywords."') OR MATCH (content) AGAINST ('".$searchkeywords."') OR title like '%".$searchkeywords."%')";
 		}
 		if (isset($_GET['pubdate'])) {
 			switch ($_GET['pubdate']) {
 				case "l3":
 					$this->condition[] = "submit_time>".($time_stamp-3*86400);
 					break;
 				case "l10":
 					$this->condition[] = "submit_time>".($time_stamp-10*86400);
 					break;
 				case "l30":
 					$this->condition[] = "submit_time>".($time_stamp-30*86400);
 					break;
 				default:
 					break;
 			}
 		}
 		if ($_PB_CACHE['setting']['offer_expire_method']==2 || $_PB_CACHE['setting']['offer_expire_method']==3) {
 			$trade->condition[] = "t.expire_time>".$time_stamp;
 		}
 		if (isset($_GET['type'])) {
 			if($_GET['type']=="urgent"){
 				$this->condition[]="if_urgent='1'";
 			}
 		}
 		if (isset($_GET['typeid'])) {
 			$type_id = intval($_GET['typeid']);
 			$this->condition[]= "type_id='".$type_id."'";
 		}
 		if (isset($_GET['industryid'])) {
 			if (strpos($_GET['industryid'], ",")!==false) {
 				$this->condition[]= "industry_id IN (".trim($_GET['industryid']).")";
 			}else{
	 			$industryid = intval($_GET['industryid']);
	 			$this->condition[]= "industry_id='".$industryid."'";
 			}
 		}
 		if (isset($_GET['areaid'])) {
 			if (strpos($_GET['areaid'], ",")!==false) {
 				$this->condition[]= "area_id IN (".trim($_GET['areaid']).")";
 			}else{
	 			$areaid = intval($_GET['areaid']);
	 			$this->condition[]= "area_id='".$areaid."'";
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
 				default:
 					break;
 			}
 		}
 	}
 	
 	function Search($firstcount, $displaypg)
 	{
 		global $viewhelper, $cache_types;
		
		$searchkeywords = urldecode($_GET['q']);
		if (isset($_GET['q'])) {
			$fields = "MATCH (title) AGAINST ('".$searchkeywords."') AS score, MATCH (content) AGAINST ('".$searchkeywords."') AS score1, ";
			$this->orderby = '(score*3 + score1) DESC';
		}
		
 		$result = $this->findAll($fields."Trade.*,content AS digest", null, null, $this->orderby, $firstcount, $displaypg);
 		$result = $this->formatItems($result);
		
 		return $result;
 	}
	
	function formatItems($result) {
		global $viewhelper, $cache_types;
 		while(list($keys,$values) = each($result)){
 			$result[$keys]['pubdate'] = df($values['submit_time']);
 			$result[$keys]['title'] = pb_lang_split($values['title']);
 			$result[$keys]['content'] = pb_lang_split($values['content']);
 			$result[$keys]['digest'] = pb_lang_split($values['digest']);
 			$result[$keys]['typename'] = $cache_types['offertype'][$values['type_id']];
			$result[$keys]["name"] = fix_text_error($result[$keys]["name"]);
			
			if($result[$keys]['default_pic'])
			{
				$pic_col = 'picture'.$result[$keys]['default_pic'];
			}
			else
			{
				$pic_col = 'picture';
			}
			
 			$result[$keys]['thumb'] = pb_get_attachmenturl($values[$pic_col], '', 'small', '150_120');
 			$result[$keys]['url'] = $this->url(array("module"=>"offer", "id"=>$values['id']));
			
			$result[$keys]["href"] = $this->url(array("module"=>"offers","title"=>$values['title'],"action"=>"detail","id"=>$values['id']));
 		}
		return $result;
	}
	
	function SearchCount()
 	{
 		$result = $this->findCount();
		return $result;
	}
 	
	function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] =& new Trades();
		}
		return $instance[0];
	}
 	
 	function checkExist($id, $extra = false)
 	{
 		$id = intval($id);
 		$info = $this->dbstuff->GetRow("SELECT title FROM {$this->table_prefix}trades WHERE id={$id}");
 		if (empty($info) or !$info) {
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	function getInfoByCondition($id, $conditions = null)
 	{
 		$sql = "select tf.*,t.* from {$this->table_prefix}trades t left join {$this->table_prefix}tradefields tf on  tf.trade_id=t.id WHERE t.id=".intval($id).$conditions;
 		return $this->dbstuff->GetRow($sql);
 	}
 	
	function getInfoById($pid, $conditions = null)
	{
		$sql = "select tf.*,t.*,t.submit_time AS pubdate,expire_time AS expdate from {$this->table_prefix}trades t left join {$this->table_prefix}tradefields tf on  tf.trade_id=t.id WHERE t.id=".$pid.$conditions;
		$result = $this->dbstuff->GetRow($sql);
		$result['tel'] = $result['prim_telnumber'];
		$result['title'] = pb_lang_split($result['title']);
		$result['content'] = pb_lang_split($result['content']);
		if (!empty($result['picture'])) {
			$result['image'] = pb_get_attachmenturl($result['picture'], '');
			$result['image_url'] = rawurlencode($result['picture']);
		}
		if (!empty($result['tag_ids'])) {
			if (!class_exists("Tags")) {
				uses("tag");
				$tag = new Tags();
			}else{
				$tag = new Tags();
			}
			$tag_res = $tag->getTagsByIds($result['tag_ids']);
			if (!empty($tag_res)) {
				$tags = null;
				foreach ($tag_res as $key=>$val){
					$tags.='<a href="index.php?do=offer&action=lists&q='.urlencode($val).'" target="_blank">'.urldecode($val).'</a>&nbsp;';	
				}
				$result['tag'] = $tags;
				unset($tags, $tag_res, $tag);
			}
		}
		return $result;
	}

	function checkAccess($trade_info_un){
		$trade_info = unserialize($trade_info_un);
		global $tmp_status;
		global $pb_userinfo;
		if($trade_info['TradeStatus']!=1){
			$tmp_key = intval($trade_info['TradeStatus']);
			flash(urlencode($trade_info['Name'].$tmp_status[$tmp_key]));
		}
		if($trade_info['require_membertype']>0){
			if(empty($pb_userinfo['user_type'])) {
				flash("no_perm");
			}
		}
		$t_point = intval($trade_info['require_point']);
		if($t_point>0){
			if($pb_userinfo['points']<$t_point){
			    flash("not_enough_point");
			}else{
			    $sql = "update {$this->table_prefix}members set credits=credits-".$t_point;
			    $this->dbstuff->Execute($sql);
			}
		}
	}
	
	function Delete($ids, $conditions = array())
	{
		$condition = array();
		if (is_array($ids)) {
			$condition[] = "id IN (".implode(",", $ids).")";
		}else{
			$condition[] = "id=".$ids;
		}
		$condition = am($condition, $conditions);
		$this->setCondition($condition);
		$this->dbstuff->Execute("DELETE FROM {$this->table_prefix}trades,{$this->table_prefix}tradefields USING {$this->table_prefix}trades LEFT JOIN {$this->table_prefix}tradefields ON {$this->table_prefix}tradefields.trade_id={$this->table_prefix}trades.id ".$this->getCondition());
		$this->condition = null;
		return true;
	}
	
	function Add($params = '')
	{
		$result = false;
		if (!empty($this->params['expire_days'])) {
			$trade_controller = & Trade::getInstance();
			if (array_key_exists($this->params['expire_days'],$trade_controller->getOfferExpires())) {
				$this->params['data']['trade']['expire_time'] = $this->timestamp+(24*3600*$_POST['expire_days']);
				$this->params['data']['trade']['expire_days'] = $_POST['expire_days'];
			}else{
				$this->params['data']['trade']['expire_time'] = $this->timestamp+(24*3600*10);
				$this->params['data']['trade']['expire_days'] = 10;
			}
		}
		$this->params['data']['trade']['submit_time'] = $this->params['data']['trade']['created'] = $this->params['data']['trade']['modified'] = $this->timestamp;
		$this->params['data']['trade']['ip_addr'] = pb_get_client_ip('str');
		if (isset($this->params['data']['trade']['title'])) {
			$trade_info = $this->params['data']['trade'];
		    $result = $this->save($trade_info);
		    $key = $this->table_name."_id";
		    $last_tradeid = $this->$key;
			$_this = & Tradefields::getInstance();
			$_this->params['data']['tradefield']['trade_id'] = $last_tradeid;
			$tradefield_info = $_this->params['data']['tradefield']+$this->params['data']['tradefield'];
			$_this->primaryKey = "trade_id";
			$_this->save($tradefield_info);
		}
		return $result;
	}
	
	function refresh($ids)
	{
		if (empty($ids)) {
			return false;
		}
		if (is_array($ids)) {
			$condition = "id IN (".implode(",", $ids).")";
		}else{
			$condition = "id=".$ids;
		}
		return $this->dbstuff->Execute("UPDATE {$this->table_prefix}trades SET expire_time=expire_days*86400+".$this->timestamp.",submit_time=".$this->timestamp." WHERE ".$condition);
	}
	
	function formatIM($record)
	{
		$return = $code = null;
		$record = unserialize($record);
		if (!is_array($record)) {
			return false;
		}
		foreach ($record as $key=>$val) {
			if(!empty($val)) {
				switch (strtolower($key)) {
					case "qq":
						$code = 'href="http://wpa.qq.com/msgrd?V=1&Uin='.$val.'&Site='.URL.'&Menu=yes"';
						break;		
					case "skype":
						$code = 'href="skype:'.$val.'?call" onclick="return skypeCheck();"';
						break;		
					case "msn":
						$code = 'href="msnim:chat?contact='.$val.'"';
						break;
					case "icq":
						$code = 'href="http://wwp.icq.com/scripts/search.dll?to='.$val.'"';
						break;
					case "yahoo":
						$code = 'href="http://edit.yahoo.com/config/send_webmesg?.target='.$val.'&.src=pg"';
						break;
					default:
						$code = $val;
						break;
				}
				$return.='<a '.$code.' target="_blank"><span class="im_'.$key.'">'.strtoupper($key).'</span></a>';
			}
		}
		return $return;
	}
	
	function formatResult($result)
	{
		$trusttypes = cache_read("trusttype");
		$countries = cache_read("country");
		$membergroups = cache_read("membergroup");
		if(class_exists("Trade")){
			$trade_controller = new Trade();
		}else{
			uses("trade");
			$trade_controller = new Trade();
		}
		if(class_exists("Form")){
			$form = new Forms();
		}else{
			uses("trade");
			$form = new Forms();
		}
		if(!empty($result)){
			if (empty($trusttypes)) {
				$trusttypes = cache_read("trusttype");
			}
			$result_count = count($result);
			for ($i=0; $i<$result_count; $i++){
				if (empty($result[$i]['userid'])) {
					$result[$i]['userid'] = $result[$i]['username'];
				}
				if(!empty($result[$i]['formattribute_ids'])) {
					$tmp_arr = $form->getAttribute(explode(",", $result[$i]['formattribute_ids']));
					if(!empty($tmp_arr)){
						foreach ($tmp_arr as $key=>$val) {
							$result[$i][$key] = $val;
						}
					}
				}
				if (!empty($result[$i]['country_id'])) {
					$result[$i]['country'] = pb_get_attachmenturl($countries[$result[$i]['country_id']]['picture'], '', 'country');
				}
				$result[$i]['im'] = $this->formatIM($result[$i]['cache_contacts']);
				$result[$i]['pubdate'] = df($result[$i]['submit_time']);
				$result[$i]['content'] = strip_tags(pb_lang_split($result[$i]['content']));
				$result[$i]['title'] = pb_lang_split($result[$i]['title']);
				if(!empty($result[$i]['membergroup_id'])) {
					$result[$i]['gradeimg'] = pb_get_attachmenturl($membergroups[$result[$i]['membergroup_id']]['avatar'], '', 'group');
					$result[$i]['gradename'] = $membergroups[$result[$i]['membergroup_id']]['name'];
				}
				
				
				if($result[$i]['default_pic'])
				{
					$pic_col = 'picture'.$result[$i]['default_pic'];
				}
				else
				{
					$pic_col = 'picture';
				}
				
				$result[$i]['image'] = pb_get_attachmenturl($result[$i][$pic_col], '', 'small');
				$trusttype_images = null;
				if(!empty($result[$i]['trusttype_ids'])){
					$tmp_trusttype = explode(",", $result[$i]['trusttype_ids']);
					foreach ($tmp_trusttype as $val) {
						$trusttype_images.='<img src="'.$trusttypes[$val]['avatar'].'" alt="'.$trusttypes[$val]['name'].'" />';
					}
				}
				$result[$i]['trusttype'] = $trusttype_images;
			}
			return $result;
		}else{
			return null;
		}
	}
	
	function getRenderDatas($conditions = null, $filter = false)
	{
		global $limit;
		$pos = 0;
		if (isset($_GET['pos'])) {
			$pos = intval($_GET['pos']);
		}
		if (!empty($conditions)) {
			$this->setCondition($conditions);
		}
		$sql = "SELECT ".$this->fields." FROM ".$this->table_prefix."trades t LEFT JOIN ".$this->table_prefix."members m ON m.id=t.member_id ".$this->getCondition()." ORDER BY t.id DESC LIMIT {$pos},{$limit}";
		if (!isset($_GET['pos']) && !empty($amount)) {
			if ($amount>$limit && $filter) {
				$sql = "SELECT ".$this->fields." FROM ".$this->table_prefix."trades t LEFT JOIN ".$this->table_prefix."members m ON m.id=t.member_id ".$this->getCondition()." GROUP BY t.member_id ORDER BY t.id DESC LIMIT {$pos},{$limit}";
			}
		}
		$result = $this->dbstuff->GetArray($sql);
		return $this->formatResult($result);
	}
	
	function getStickyDatas()
	{
		$condition = null;
		if (!isset($_GET['page']) || $_GET['page']==1) {
			if (isset($_GET['typeid'])) {
				$type_id = intval($_GET['typeid']);
				$condition = " AND t.type_id='".$type_id."'";
			}
			$sql = "SELECT ".$this->fields." FROM ".$this->table_prefix."trades t LEFT JOIN ".$this->table_prefix."members m ON m.id=t.member_id WHERE t.display_order>0 {$condition} AND t.display_expiration>".$this->timestamp." ORDER BY t.id DESC LIMIT 0,5";
			$result = $this->dbstuff->GetArray($sql);
			if(!empty($result)){
				return $this->formatResult($result);
			}
		}
		return false;
	}
	
	function getProductById($product_id)
	{
		$sql = "SELECT p.*, b.name AS brand_name, i.name as industry_name FROM {$this->table_prefix}trades p"
			." LEFT JOIN {$this->table_prefix}brands b ON b.id = p.brand_id"
			." LEFT JOIN {$this->table_prefix}industries i ON i.id = p.industry_id"
			." WHERE p.id=".$product_id;
		$Trade = $this->dbstuff->GetRow($sql);
		//var_dump($result);
		
		if($Trade)
		{
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
		}
		
		if($Trade['default_pic'])
		{
			$Trade['d_image'] = $Trade['image'.$Trade['default_pic']];
		}
		else
		{
			$Trade['d_image'] = $Trade['image'];
		}
		
		return $Trade;
	}
	
	function findByType($type_id)
	{
		$results = $this->findAll("*", null, array("type_id=".$type_id,"status=1","valid_status=1"), "created DESC", 0, 7);
		//var_dump(count($results));
		foreach($results as &$result)
		{
			$this->formatInfo($result);
		}
		return $results;
	}
	
	function formatInfo(&$result)
	{
		global $viewhelper;
		$cache_types = cache_read("type");
		$result['pubdate'] = df($result['submit_time']);
		$result['title'] = pb_lang_split($result['title']);
		$result['content'] = pb_lang_split($result['content']);
		$result['digest'] = pb_lang_split($result['digest']);
		$result['typename'] = $cache_types['offertype'][$result['type_id']];
		$result["price"] = number_format($result["price"], 0, ',', '.');		
		$result["new_price"] = number_format($result["new_price"], 0, ',', '.');
		//var_dump($cache_types);
		
		if($result['default_pic'])
		{
			$pic_col = 'picture'.$result['default_pic'];
		}
		else
		{
			$pic_col = 'picture';
		}
		
		$result['thumb'] = pb_get_attachmenturl($result[$pic_col], '', 'small', '150_120');
		$result['url'] = $this->url(array("module"=>"offer", "id"=>$result['id']));
	}
	function getPermisstions($pid, $mid) {
		uses("moderator","trade","industry","member");
		$moderatordb = new Moderators();
		$tradedb = new Trades();
		$industrydb = new Industries();
		$memberdb = new Members();
		
		$permissions = array("valid"=>false, "unvalid"=>false);
		
		$trade = $tradedb->read("id,industry_id,valid_status,valid_moderator", intval($pid));
		$moderator = $moderatordb->fields("*", array("member_id = ".intval($mid),"status=1"));
		$member_info = $memberdb->getInfoById($mid);
		//var_dump($member_info["role"]);
		
		if(count($moderator)) {			
			$types = explode(",",$moderator["manage_types"]);
			$industries = explode(",",$moderator["manage_industries"]);
			$rights = explode(",",$moderator["rights"]);
			
			$type = "trade";
			
			if(in_array($type,$types)) {
				//var_dump($moderator);
				
				$industry = $industrydb->read("id,level,parent_id", intval($trade["industry_id"]));
				if($industry["level"] == 2) {
					$industry_id = $industry["id"];
				} elseif ($industry["level"] == 3) {
					$industry_id = $industry["parent_id"];
				} elseif ($industry["level"] == 4) {
					$industry = $industrydb->read("id,level,parent_id", intval($industry["parent_id"]));
					$industry_id = $industry["parent_id"];
				}
				
				//var_dump($industries);
				if(in_array($industry_id,$industries)) {
					foreach($permissions as $key => $per) {
						if(in_array($key,$rights)) {
							$permissions[$key] = true;
						}
					}
					if($permissions["unvalid"]) {
						if($trade["valid_status"] == 0 || ($trade["valid_status"] == 3 && $trade["valid_moderator"] != $mid)) {
							$permissions["unvalid"] = false;
						}
					}
					if($permissions["valid"]) {
						if($trade["valid_status"] == 1 || ($trade["valid_status"] == 3 && $trade["valid_moderator"] != $mid)) {
							$permissions["valid"] = false;							
						}
					}					
				}
			}
		}
		
		//for admin
		//var_dump($trade["valid_status"]);
		if($member_info["role"] == 'admin' && (in_array($trade["valid_status"],array(0,3)))) {
			$permissions["valid"] = true;
		}
		if($member_info["role"] == 'admin' && (in_array($trade["valid_status"],array(1,3)))) {
			$permissions["unvalid"] = true;
		}
		
		return $permissions;
	}
	
	function getByArea($params=array(), $offset=0, $count=15) {
		if($params["area_id"]) {
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}
		if($params["type_id"]) {
			$conditions[] = "Trade.type_id=".$params["type_id"];
		}
		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}companies c ON c.id=Trade.company_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=c.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}brands AS b ON b.id = Trade.brand_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = Trade.member_id";
		
		$result = $this->findAll("Trade.*,content AS digest", $joins, $conditions, "Trade.created DESC", $offset, $count);
		$result = $this->formatItems($result);
		
		return $result;
	}
	
}
?>