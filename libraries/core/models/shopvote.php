<?php
class Shopvotes extends PbModel {
 	var $name = "Shopvote";

 	function Shopvotes()
 	{
 		parent::__construct();
 	}
 	
 	function update($member_id, $space_name, $star)
 	{
 		uses('company');
		$companydb = new Companies();
		
		$company_id = $companydb->field("id",array("LOWER(cache_spacename)='".strtolower($space_name)."'"));
		if($company_id && $star <= 5) {
			$exsit = $this->fields("*",array("member_id=".$member_id,"company_id=".$company_id));
			
			if($exsit) {
				if($star == 0) {
					$this->del(intval($exsit["id"]));
				} else {
					$exsit["rate"] = $star;
					$exsit["created"] = date('Y-m-d H:i:s');
					
					//var_dump($exsit);
					
					$this->save($exsit,'update',intval($exsit["id"]));
				}
			} else {
				$vals["rate"] = $star;
				$vals["member_id"] = $member_id;
				$vals["company_id"] = $company_id;
				$vals["created"] = date('Y-m-d H:i:s');
				
				$this->save($vals);
			}
		}
		
		//UPDATE SHOP RATE
		$new_rate = $this->getResult($company_id);
		$fields["vote_count"] = $new_rate["count"];
		$fields["vote_sum"] = $new_rate["sum"];
		$fields["vote_result"] = $new_rate["result"];
		
		$companydb->save($fields,'update',intval($company_id));
 	}
	
	function getVote($member_id,$company_id) {
		//echo $member_id.$company_id;
		$exsit = $this->fields("*",array("member_id=".$member_id,"company_id=".$company_id));
		if($exsit) {
			return $exsit;
		} else {
			return false;
		}
	}
 	
	function getResult($company_id)
	{
		$sum = $this->fields("sum(rate) as sum",array("company_id=".$company_id));
		$sum = $sum["sum"];
		$count = $this->fields("count(id) as total",array("company_id=".$company_id));
		$count = $count["total"];
		
		$result = 0;
		if($count) $result = $sum/$count;
		
		return array("count"=>$count,"sum"=>$sum,"result"=>$result);
	}
	
	function getList($company_id, $member_id) {
		$conditions = array("Shopvote.company_id=".$company_id);
		$conditions[] = "Shopvote.member_id!=".$member_id;
		$joins = array("LEFT JOIN {$this->table_prefix}members AS m ON m.id = Shopvote.member_id");
		$joins[] = "LEFT JOIN {$this->table_prefix}memberfields AS mf ON mf.member_id = Shopvote.member_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}companies AS c ON c.member_id = m.id";
		
		$items = $this->findAll("c.cache_spacename,c.shop_name,c.picture,c.name as company_name,m.photo,mf.first_name,mf.last_name,m.username,Shopvote.*",$joins,$conditions,"CASE WHEN m.id = 1 THEN 1 ELSE 2 END, Shopvote.created DESC");
		foreach($items as $key => $item) {
			$items[$key]["avatar"] = '<img src="'.URL.pb_get_attachmenturl($item['photo'], '', 'small').'" />';			
			if($item["picture"]) {
				$items[$key]["avatar"] = '<img src="'.URL.pb_get_attachmenturl($item['picture'], '', 'small').'" />';
			}
			$items[$key]["avatar_link"] = '<a class="avatar" href="'.$this->url(array("module"=>"space","userid"=>$item["cache_spacename"])).'">'.$items[$key]["avatar"].'</a>';
			
			if($item["shop_name"]) {
				$name = '<a class="avatar" href="'.$this->url(array("module"=>"space","userid"=>$item["cache_spacename"])).'">'.$item["shop_name"].'</a><br/>';
			} else {
				if ($item["first_name"]) {
					$name = $item["first_name"]." ".$item["last_name"];
				} else {
					$name = $item["username"];
				}
			}
			$items[$key]["name"] = $name;
		}
	
		return $items;
	}
}
?>