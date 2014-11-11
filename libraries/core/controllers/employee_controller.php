<?php
class Employee extends PbController {
	var $name = "Employee";
	
	function Employee()
	{
		$this->loadModel("employee");
		$this->loadModel("employeeexperience");
		$this->loadModel("employeeeducation");
		$this->loadModel("employeereference");
		$this->loadModel("job");
		$this->loadModel("jobindust");
		$this->loadModel("jobtype");
		$this->loadModel("area");
		$this->loadModel("company");
		$this->loadModel("member");
		$this->loadModel("employeeexperience");
		$this->loadModel("employeeeducation");
		$this->loadModel("employeereference");
		$this->loadModel("language");
		$this->loadModel("product");
		$this->loadModel("trade");
	}
	
	function index()
	{
		uses("ad");
		$ad = new Adses();
		//$this->employee->updateStatus();
		
		$conditions[] = "Employee.status=1";
		$conditions[] = "Employee.showed=1";
		$conditions[] = "Employee.searched=1";
		
		if (isset($_GET['keyword'])) {
			$conditions[] = "Employee.expected_position LIKE '%".$_GET['keyword']."%'";
			
			setvar("keyword", $_GET['keyword']);
		}
		if (isset($_GET['indust']) && $_GET['indust'] != 0) {
			$conditions[] = "Employee.jobindusts LIKE '%[".intval($_GET['indust'])."]%'";
		}
		if (isset($_GET['area']) && $_GET['area'] != 0) {			
			//$area_string = implode(",",$this->area->getChildArea($_GET['area']));
			$conditions[] = "Employee.areas LIKE '%[".$_GET['area']."]%'";
			//setvar("area_string", $area_string);
		}
		if (isset($_GET['type']) && $_GET['type'] != 0) {
			$conditions[] = "Employee.joblevel_id = ".intval($_GET['type']);
			
			setvar("type", $_GET['type']);
		}
		
		$amount = $this->employee->findCount(null, $conditions,"id");
		//echo $amount;
		setvar("paging", array('total'=>$amount));
		setvar("count", $amount);
		
		
		setvar("JobindustOptions", $this->jobindust->getTypeOptions('['.$_GET['indust'].']'));
		setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));
		
		
		$JobProficiencies = cache_read('typeoption', 'job_proficiency');
		//var_dump($JobProficiencies);
		setvar("JobProficiencies", $JobProficiencies);
		
		//#################for rightbar#########
		setvar("ads_top", $ad->getByZone(24));
		setvar("ads_right", $ad->getByZone(29));
		////get student shops
		//$student_shops = $this->company->getStudentShops(0, 15);
		//setvar("student_shops", $student_shops["result"]);
		//
		////get student service
		//$student_services = $this->product->getStudentProducts(1, 0, 6);
		////var_dump($student_services);
		//setvar("student_services", $student_services["result"]);
		//
		////get student trades
		//$student_trades = $this->trade->getStudentTrades(0, 10);
		//setvar("student_trades", $student_trades);
		//
		////get student product
		//$student_discount_products = $this->product->getStudentDiscountProducts(0, 0, 2);		
		//setvar("student_discount_products", $student_discount_products["result"]);
		//######################################
		
		render("employee/index");
	}
	
	function update_step2()
	{
		if(!empty($_POST))
		{			
			$type = $_POST["item"];
			$content = $_POST["employee"];
			
			$memberinfo = pb_get_member_info();
			
			switch($type) {
				case "career_objective":
				case "career_highlight":
				case "skills":
					$this->employee->saveField($type,$content[$type],intval($_POST["id"]));
					echo json_encode(array($type,$content[$type]));
					break;
				case "employeeexperience":					
					if($_POST["employeeexperience"])
					{						
						//var_dump($_POST["employeeexperience"]);
						if(!isset($_POST["employeeexperience"]["current"]))
						{
							$_POST["employeeexperience"]["current"] = "";
						}
						
						if(!empty($_POST["employeeexperience"]["id"])){
							$this->employeeexperience->save($_POST["employeeexperience"], "update", $_POST["employeeexperience"]["id"], null, "member_id=".$memberinfo["pb_userid"]);
						}
						else
						{
							$_POST["employeeexperience"]["employee_id"] = intval($_POST["id"]);
							$_POST["employeeexperience"]["member_id"] = $memberinfo["pb_userid"];
							$_POST["employeeexperience"]["order_num"] = intval($_POST["order"]);
							
							$this->employeeexperience->save($_POST["employeeexperience"]);
						}												
					}					
					
					$expers = $this->employeeexperience->findall("*", null, array("employee_id=".intval($_POST["id"])),"order_num");
					
					//render content
					$result = '<div class="list_item_employeebox">';
					foreach($expers as $item) {
						$result .= '<div class="boxitem" rel="'.$item["id"].'">';
					
						$result .= '<h4>'.$item["job_title"].'</h4>';
						$result .= '<strong>'.$item["company_name"].'</strong>';
						$result .= '<em> - Tháng '.$item["startmonth"].'/'.$item["startyear"].' - ';
						$result .= $item["current"] == "on"?'hiện tại</em>':'Tháng '.$item["endmonth"].'/'.$item["endyear"].'</em>';
						$result .= '<div class="employee_content">'.$item["content"].'</div>';
						$result .= '<div class="controls"><a href="javascript:void(0)" class="more">Xem thêm</a><a href="javascript:void(0)" class="edit">Cập nhật</a><a href="javascript:void(0)" class="delete">Xóa</a><a href="javascript:void(0)" class="down">Đưa xuống</a><a href="javascript:void(0)" class="up">Đưa lên</a></div>';
						
						$result .= '<div class="formdata">';
						foreach($item as $key => $value)
						{
							$result .= '<span class="'.$key.'">'.$value.'</span>';							
						}
						$result .= '</div>';
							
						$result .= '</div>';	
					}
					$result .= '</div>';
					
					echo json_encode(array($type,$result));					
					break;
				case "employeeeducation":					
					if($_POST["employeeeducation"])
					{
						if(!isset($_POST["employeeeducation"]["current"]))
						{
							$_POST["employeeeducation"]["current"] = "";
						}
						
						if(!empty($_POST["employeeeducation"]["id"])){
							$this->employeeeducation->save($_POST["employeeeducation"], "update", $_POST["employeeeducation"]["id"], null, "member_id=".$memberinfo["pb_userid"]);
						}
						else
						{
							$_POST["employeeeducation"]["employee_id"] = intval($_POST["id"]);
							$_POST["employeeeducation"]["member_id"] = $memberinfo["pb_userid"];
							$_POST["employeeeducation"]["order_num"] = intval($_POST["order"]);
							
							$this->employeeeducation->save($_POST["employeeeducation"]);
						}
					}					
					
					$expers = $this->employeeeducation->findall("*", null, array("employee_id=".intval($_POST["id"])),"order_num");
					
					//render content
					$result = '<div class="list_item_employeebox">';
					foreach($expers as $item) {
						$result .= '<div class="boxitem" rel="'.$item["id"].'">';
					
						$result .= '<h4>'.$item["school_name"].'</h4>';
						$result .= '<strong>'.$item["level_id"].'</strong>';
						
						if($item["startmonth"] != "0" && $item["startyear"] != "0" && (($item["endmonth"] != "0" && $item["endyear"] != "0") || $item["current"] == "on")) {
							$result .= '<em> - Tháng '.$item["startmonth"].'/'.$item["startyear"].' - ';
							$result .= $item["current"] == "on"?'hiện tại</em>':'Tháng '.$item["endmonth"].'/'.$item["endyear"].'</em>';
						}
						
						$result .= '<div class="employee_content">'.$item["content"].'</div>';
						$result .= '<div class="controls"><a href="javascript:void(0)" class="more">Xem thêm</a><a href="javascript:void(0)" class="edit">Cập nhật</a><a href="javascript:void(0)" class="delete">Xóa</a><a href="javascript:void(0)" class="down">Đưa xuống</a><a href="javascript:void(0)" class="up">Đưa lên</a></div>';
						
						$result .= '<div class="formdata">';
						foreach($item as $key => $value)
						{
							$result .= '<span class="'.$key.'">'.$value.'</span>';
						}
						$result .= '</div>';
							
						$result .= '</div>';	
					}
					$result .= '</div>';
					
					echo json_encode(array($type,$result));					
					break;
				case "employeereference":					
					if($_POST["employeereference"])
					{						
						if(!empty($_POST["employeereference"]["id"])){
							$this->employeereference->save($_POST["employeereference"], "update", $_POST["employeereference"]["id"], null, "member_id=".$memberinfo["pb_userid"]);
						}
						else
						{
							$_POST["employeereference"]["employee_id"] = intval($_POST["id"]);
							$_POST["employeereference"]["member_id"] = $memberinfo["pb_userid"];
							$_POST["employeereference"]["order_num"] = intval($_POST["order"]);
							
							$this->employeereference->save($_POST["employeereference"]);
						}
					}					
					
					$expers = $this->employeereference->findall("*", null, array("employee_id=".intval($_POST["id"])),"order_num");
					
					//render content
					$result = '<div class="list_item_employeebox">';
					foreach($expers as $item) {
						$result .= '<div class="boxitem" rel="'.$item["id"].'">';
					
						$result .= '<h4>'.$item["name"].'</h4>';
						$result .= '<strong>'.$item["company"].'</strong>';
						$result .= '<em> - '.$item["title"].'</em>';
						$result .= '<div class="employee_content">Email: '.$item["email"].($item["phone"]?' - Điện thoại: '.$item["phone"]:"").' </div>';
						$result .= '<div class="controls"><a href="javascript:void(0)" class="more">Xem thêm</a><a href="javascript:void(0)" class="edit">Cập nhật</a><a href="javascript:void(0)" class="delete">Xóa</a><a href="javascript:void(0)" class="down">Đưa xuống</a><a href="javascript:void(0)" class="up">Đưa lên</a></div>';
						
						$result .= '<div class="formdata">';
						foreach($item as $key => $value)
						{
							$result .= '<span class="'.$key.'">'.$value.'</span>';
						}
						$result .= '</div>';
							
						$result .= '</div>';	
					}
					$result .= '</div>';
					
					echo json_encode(array($type,$result));					
					break;
			}
		}
	}
	
	function delete_employeeitem()
	{
		//echo $_POST["type"];
		if(isset($_POST["id"]))
		{
			$memberinfo = pb_get_member_info();			
			$this->$_POST["type"]->del(intval($_POST["id"]), array("member_id=".intval($memberinfo["pb_userid"])));
			echo $_POST["id"];			
		}
		else echo "0";
	}
	
	function change_order()
	{
		if(isset($_POST["id"]))
		{
			$memberinfo = pb_get_member_info();
			if($_POST["to"] == "down")
			{
				$row = $this->$_POST["type"]->read("*", intval($_POST["id"]));
				$next = $this->$_POST["type"]->fields("*", array("member_id=".intval($memberinfo["pb_userid"]),"order_num>".($row["order_num"])),"order_num");
				if($row && $next)
				{
					$this->$_POST["type"]->saveField("order_num",$next["order_num"],intval($row["id"]));
					$this->$_POST["type"]->saveField("order_num",$row["order_num"],intval($next["id"]));
					echo $_POST["id"];
					return;
				}
			}
			if($_POST["to"] == "up")
			{
				$row = $this->$_POST["type"]->read("*", intval($_POST["id"]));
				$next = $this->$_POST["type"]->fields("*", array("member_id=".intval($memberinfo["pb_userid"]),"order_num<".($row["order_num"])),"order_num DESC");
				if($row && $next)
				{
					$this->$_POST["type"]->saveField("order_num",$next["order_num"],intval($row["id"]));
					$this->$_POST["type"]->saveField("order_num",$row["order_num"],intval($next["id"]));
					echo $_POST["id"];
					return;
				}
			}
		}
		echo "0";
	}
	
	function detail()
	{
		uses("ad");
		$ad = new Adses();
		
		if (isset($_GET['id'])) {
			$id = intval($_GET['id']);
		}
		else {
			flash("action_failed");
		}
		
		$memberinfo = pb_get_member_info();
		$the_memberid = $memberinfo["pb_userid"];
		
		$res = $this->employee->read("*", $id);
		if (empty($res)) {
			flash("action_failed");
		}
		
		//user info
		$memberinfo = $this->member->getInfoById($res["member_id"]);
		//var_dump($memberinfo);
		$JobProficiencies = cache_read('typeoption', 'job_proficiency');
		
		//get employeeexperiences
		$expers = $this->employeeexperience->findall("*", null, array("employee_id=".$res["id"]),"order_num");
		if($expers){
			$result = '<div class="list_item_employeebox">';
			foreach($expers as $item) {
				$result .= '<div class="boxitem" rel="'.$item["id"].'">';
				
				$result .= '<h4>'.$item["job_title"].'</h4>';
				$result .= '<strong>'.$item["company_name"].'</strong>';
				$result .= '<em> - Tháng '.$item["startmonth"].'/'.$item["startyear"].' - ';
				$result .= $item["current"] == "on"?'hiện tại</em>':'Tháng '.$item["endmonth"].'/'.$item["endyear"].'</em>';
				$result .= '<div class="employee_content">'.$item["content"].'</div>';
				
					
				$result .= '</div>';	
			}
			$result .= '</div>';
			$res["employeeexperience"] = $result;
		}
		
		//get employeeeducations
		$expers = $this->employeeeducation->findall("*", null, array("employee_id=".$res["id"]),"order_num");
		if($expers){
			$result = '<div class="list_item_employeebox">';
			foreach($expers as $item) {
				$result .= '<div class="boxitem" rel="'.$item["id"].'">';
				
				$result .= '<h4>'.$item["school_name"].'</h4>';
				$result .= '<strong>'.$item["level_id"].'</strong>';
				
				if($item["startmonth"] != "0" && $item["startyear"] != "0" && (($item["endmonth"] != "0" && $item["endyear"] != "0") || $item["current"] == "on")) {
					$result .= '<em> - Tháng '.$item["startmonth"].'/'.$item["startyear"].' - ';
					$result .= $item["current"] == "on"?'hiện tại</em>':'Tháng '.$item["endmonth"].'/'.$item["endyear"].'</em>';
				}
				
				$result .= '<div class="employee_content">'.$item["content"].'</div>';
				
						
				$result .= '</div>';	
			}
			$result .= '</div>';
			$res["employeeeducation"] = $result;
		}
		
		//get employee references
		$expers = $this->employeereference->findall("*", null, array("employee_id=".$res["id"]),"order_num");
		if($expers){
			$result = '<div class="list_item_employeebox">';
			foreach($expers as $item) {
				$result .= '<div class="boxitem" rel="'.$item["id"].'">';
				
					$result .= '<h4>'.$item["name"].'</h4>';
					$result .= '<strong>'.$item["company"].'</strong>';
					$result .= '<em> - '.$item["title"].'</em>';
					$result .= '<div class="employee_content">Email: '.$item["email"].($item["phone"]?'&nbsp;&nbsp; - &nbsp;&nbsp;Điện thoại: '.$item["phone"]:"").' </div>';
					
						
					$result .= '</div>';
			}
			$result .= '</div>';
			$res["employeereference"] = $result;
		}
		
		
		//languages
		if($res["languages"]) {
			$languages = substr($res["languages"],1,strlen($res["languages"])-2);
			$languages = explode("][",$languages);
			$langlevels = cache_read('typeoption', 'language_level');
			
			$string = "<ul class='languages'>";
			foreach($languages as $kk => $lang)
			{
				$lang = explode(",", $lang);
				$language = $this->language->read("name",intval($lang[0]));
				
				$string .= "<li><label>".$language["name"]."</label>".$langlevels[$lang[1]]."</li>";
			}
			$string .= "</ul>";
			$res["languages"] = $string;
		}
				
		
		$res["joblevel"] = $JobProficiencies[$res["joblevel_id"]];
		//echo $res["joblevel"];
		
		//area
		$res["areas"] = substr($res["areas"],1,strlen($res["areas"])-2);
		$res["areas"] = str_replace("][",",",$res["areas"]);
		$res["areas"] = $this->area->findAll("id, name", null, array("id IN (".$res["areas"].")"));
		
		$res["salary"] = number_format($res["salary"], 0, ',', '.');
		
		$string = "";
		foreach($res["areas"] as $a => $b)
		{
			$string .= '<a class="job_city_link" href="javascript:void(0)" rel="'.$b["id"].'">'.$b["name"].'</a>';
			if($a < count($res["areas"])-1) $string .= ', ';
		}
		$res["areas"] = $string;
		
		
		//area
		$tmps = substr($res["jobindusts"],1,strlen($res["jobindusts"])-2);
		$tmps = str_replace("][",",",$tmps);
		$tmps = $this->jobindust->findAll("id, name", null, array("id IN (".$tmps.")"));
		
		$string = "";
		foreach($tmps as $a => $b)
		{
			$string .= '<a class="job_indust_link" href="javascript:void(0)" rel="'.$b["id"].'">'.$b["name"].'</a>';
			if($a < count($tmps)-1) $string .= ', ';
		}
		$res["jobindusts"] = $string;
		
		
		setvar("item",$res);
		setvar("memberinfo",$memberinfo);
		setvar("options",cache_read("typeoption"));
		setvar("JobindustOptions", $this->jobindust->getTypeOptions('['.$_GET['indust'].']'));
		setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));		
		setvar("JobProficiencies", $JobProficiencies);
		
		setvar("ads_top", $ad->getByZone(34));
		setvar("ads_right", $ad->getByZone(35));
			
		render("employee/detail", 1);
	}
}
?>