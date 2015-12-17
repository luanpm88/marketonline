<?php
class Job extends PbController {
	var $name = "Job";
	
	function Job()
	{
		$this->loadModel("job");
		$this->loadModel("jobindust");
		$this->loadModel("jobtype");
		$this->loadModel("area");
		$this->loadModel("areatype");
		$this->loadModel("company");
		$this->loadModel("product");
		$this->loadModel("trade");
	}

	function index()
	{
		uses("ad","area");
		$ad = new Adses();
		$area_controller = new Area();
		
		// map
		$pb_userinfo = pb_get_member_info();
		$areatypes = $this->areatype->findAll("*",null,null,"id DESC");
		//var_dump($_GET);
		//get area
		if(isset($_GET["area"])){
			$area_id = $_GET["area"];
			$area = $this->area->read("*",$area_id);
			$parent_area = $this->area->read("*",$area["parent_id"]);
			$area_name = "/".$area["name"];
			setvar("area",$area);
			setvar("parent_area",$parent_area);
			
			//get area info by member
			$area_info_by_member = $area_controller->getAreaInfoByMember($area_id,$pb_userinfo["pb_userid"]);
			if(!empty($area_info_by_member)) {
				setvar("area_info_by_member",$area_info_by_member);
			}
			
			//area info
			$area_info = $area_controller->getAreaInfo($area_id);
			if($area_info) {
				setvar("area_info",$area_info);
			}
			
			//listing district
			$districts = $this->area->findAll("*",null,array("parent_id=".$area_id));
			setvar("districts",$districts);
			
			//if($area["level"] == 3) {
			//	$_GET["areatype_id"] = $parent_area["areatype_id"];
			//} else {
			//	$_GET["areatype_id"] = $area["areatype_id"];
			//}
			
			
			//get map company
			//$_GET["area_id"] = $area_id;
			//$companies_map_script = $area_controller->getMapCompany();
			//setvar("companies_map_script",$companies_map_script);
			
		}
		
		
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->areatype->read("*",$areatype_id);
			$areatype_name = "/".$areatype["name"];
			
			setvar("areatype",$areatype);
		}
		$areas_by_areatype = $area_controller->getAreasByAreatype();
		setvar("areas_by_areatype",$areas_by_areatype);
		
		//===================== end map ====================
		
		
		
		if(isset($_GET["industry_id"])){
			$industry_id = $_GET["industry_id"];
			$industry = $this->industry->read("*",$industry_id);
			setvar("industry",$industry);
		}
		
		//get areas with level 2
		foreach($areatypes as $key => $areatype) {
			$areas = $this->area->findAll("*",null,array("level=2","areatype_id=".$areatype["id"]),"Area.display_order");
			$areatypes[$key]["areas"] = $areas;
		}
		setvar("areatypes",$areatypes);
		
		
		
		$this->job->updateStatus();
		
		$conditions[] = "Job.status=1";
		
		if (isset($_GET['keyword'])) {
			$conditions[] = "Job.name LIKE '%".$_GET['keyword']."%'";
			
			setvar("keyword", $_GET['keyword']);
		}
		if (isset($_GET['indust']) && $_GET['indust'] != 0) {
			$conditions[] = "Job.jobindusts LIKE '%[".intval($_GET['indust'])."]%'";
		}
		if (isset($_GET['area']) && $_GET['area'] != 0) {			
			$area_string = implode(",",$this->area->getChildArea($_GET['area']));
			$conditions[] = "Job.area_id IN (".$area_string.")";
			setvar("area_string", $area_string);
		}
		if (isset($_GET['type']) && $_GET['type'] != 0) {
			$conditions[] = "Job.jobtype_id = ".intval($_GET['type']);
			
			setvar("type", $_GET['type']);
		}
		
		$amount = $this->job->findCount(null, $conditions,"id");
		setvar("paging", array('total'=>$amount));
		
		
		setvar("JobindustOptions", $this->jobindust->getTypeOptions('['.$_GET['indust'].']'));
		setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));
		
		
		$salaries = cache_read('typeoption', 'salary');
		setvar("Salary", $salaries);
		
		
		//#################for rightbar#########
		setvar("ads_top", $ad->getByZone(23));
		setvar("ads_right", $ad->getByZone(28));
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
		//$student_discount_products = $this->product->getStudentDiscountProducts(0, 0, 3);		
		//setvar("student_discount_products", $student_discount_products["result"]);
		//######################################
		
		
		render("job/index");
	}

	function lists()
	{
		global $viewhelper, $pos, $limit;
		using("industry", "area");
		$area = new Areas();
		$industry = new Industries();
		$conditions[] = "Job.status=1";
		$viewhelper->setTitle(L("hr_information", "tpl"));
		$viewhelper->setPosition(L("hr_information", "tpl"), "index.php?do=job&action=".__FUNCTION__);
		if(!empty($_GET['q'])){
			$title = trim($_GET['q']);
			$conditions[]= "Job.name like '%".$title."%'";
		}
		if (!empty($_GET['data']['salary_id'])) {
			$conditions[] = "Job.salary_id=".intval($_GET['data']['salary_id']);
		}
		if (!empty($_GET['data']['area_id'])) {
			$conditions[] = "Job.area_id=".intval($_GET['data']['area_id']);
		}
		if (isset($_GET['industryid'])) {
			$industry_id = intval($_GET['industryid']);
			$tmp_info = $industry->setInfo($industry_id);
			if (!empty($tmp_info)) {
				$conditions[] = "Job.industry_id=".$tmp_info['id'];
				$viewhelper->setTitle($tmp_info['name']);
				$viewhelper->setPosition($tmp_info['name'], "index.php?do=job&action=".__FUNCTION__."&industryid=".$tmp_info['id']);
			}
		}
		if (isset($_GET['areaid'])) {
			$area_id = intval($_GET['areaid']);
			$tmp_info = $area->setInfo($area_id);
			if (!empty($tmp_info)) {
				$conditions[] = "Job.area_id=".$tmp_info['id'];
				$viewhelper->setTitle($tmp_info['name']);
				$viewhelper->setPosition($tmp_info['name'], "index.php?do=job&action=".__FUNCTION__."&areaid=".$tmp_info['id']);
			}
		}
		$amount = $this->job->findCount(null, $conditions, "Job.id");
		$result = $this->job->findAll("Job.*,Job.cache_spacename AS userid,Job.created AS pubdate,(select Company.name from ".$this->job->table_prefix."companies Company where Company.id=Job.id) AS companyname", null, $conditions, "Job.id DESC", $pos, $limit);
		$viewhelper->setTitle(L("search", "tpl"));
		$viewhelper->setPosition(L("search", "tpl"));
		setvar("items", $result);
		setvar("paging", array('total'=>$amount));
		render("job/list", 1);
	}
	
	function import()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		//echo "dsfsdfd";
		$con = mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");
		
		//$query = "SELECT * FROM `pb_industries` WHERE level=2 AND id='".$_GET["id"]."'";                    

		
		//$result = $con->query($query);
		//$row = $result->fetch_assoc();
		$url = "http://www.vietnamworks.com/tim-viec-lam";


		$html = file_get_html($url);
		if($html->find('div.page-content div.list-simple', 0))
			foreach($html->find('div.page-content div.list-simple') as $key1 => $block1) {
				$block1_title = $block1->find('h2.header', 0);
				$block1_childs = $block1->find('ul');
				//echo $parent->innertext;echo $parent->href;
				
				echo $block1_title->innertext;
				echo " - ".count($block1_childs);				
				echo "<br />";				
				
				//level 2
				foreach($block1_childs as $key2 => $block2)
				{
					echo "----";
					
					$block2_title = $block2->innertext;
					echo $block2_title;
					
					$block2_childs = $block1->find('ul', $key2);
					$block2_childs = $block2_childs->find('li a');
					echo " - ".count($block2_childs);
					echo "<br />";
					
					//level 3
					foreach($block2_childs as $block3)
					{
						echo "--------";
						
						//echo $block3->innertext;
						//echo " - ".$block3->href;
						
						
						//save database
						if($key1 == 2)
						{
							echo $block3->innertext;
							echo " - ".$block3->href;
							
							$query = "INSERT INTO `pb_jobtypes` (`parent_id`, `level`, `name`, `display_order`, `group`, `link`) VALUES"
									." (0, 1, '".$block3->innertext."', 0, '', '".$block3->href."');";                    
							$result = $con->query($query);
							
						}
						
						
						
						
						
						
						echo "<br />";
					}					
				}
			}
			setvar("areatype", $areatype);
	}
	
	function detail()
	{
		uses("ad");
		$ad = new Adses();
		
		$id = intval(($_GET['id']));
		//echo $id."sdfsdf";
		
		$conditions = "Job.status=1";
		if ($id) {
			$info = $this->job->read("*", $id, null, $conditions);
			//echo $conditions;
			//var_dump($info);
			if (!$info) {
				flash("data_not_exists", '', 0);
			}
			
			$jtype = $this->jobtype->read("*", $info["jobtype_id"], null, null);
			//var_dump($jtype);
			
			$info["type_name"] = $jtype["name"];
			
			$info["area"] = $this->area->getFullName($info["area_id"]);
			
			//clean content
			$info['content'] = cleanContent($info['content']);
			$info['exper'] = cleanContent($info['exper']);
			$info['testtime'] = cleanContent($info['testtime']);
			$info['skills'] = cleanContent($info['skills']);
			$info['rprofile'] = cleanContent($info['rprofile']);
			
			$info['job_other'] = cleanContent($info['job_other']);
			$info["salary"] = number_format($info["salary"], 0, ',', '.');
			
			$info["expired_dates"] = date("d/m/Y", $info["expired_dates"]);
			
			if (empty($info)) {
				flash('data_not_exists', null, 0);
			}
			$sql = "UPDATE {$tb_prefix}jobs SET clicked=clicked+1 WHERE id=".$id." AND status=1 AND company_id='".$company->info['id']."'";
			$this->job->dbstuff->Execute($sql);
			
			$companyinfo = $this->company->getInfoByUserId($info["member_id"]);
			
			$area_string = implode(",",$this->area->getChildArea($info['area_id']));
			
			setvar("JobindustOptions", $this->jobindust->getTypeOptions('['.$_GET['indust'].']'));
			setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));
			//var_dump(cache_read("typeoption"));
			setvar("options",cache_read("typeoption"));
			setvar("area_string",$area_string);
			setvar("companyinfo",$companyinfo);
			setvar("item",$info);
			
			setvar('fb_title', "(Tuyển dụng) ".$companyinfo['name'].": ".$info['name']);
			setvar('fb_image', $companyinfo['logobig']);
			setvar("fb_description", mb_convert_encoding(preg_replace('/\s+/'," ",substr(trim(strip_tags($info["content"])),0, 1000)),"UTF-8"));
			
			setvar("ads_top", $ad->getByZone(33));
			setvar("ads_right", $ad->getByZone(36));
			
			render("job/detail", 1);
		}
	}
	
	function importJobs()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		$con = mysqli_connect("localhost","root","","b2bwin8");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		  
		$con->set_charset("utf8");		
		
		
		$jobindusts = $this->jobindust->findAll('*');
		
		$jobs_aa = array();
		
		foreach($jobindusts as $indust)
		{
			echo $indust["name"]." - ".$indust["link"]."<br />";
			
			
			$html = file_get_html($indust["link"]);
			if($html->find('div.search-result ol.list li', 0))
			{
				$count = 0;
				foreach($html->find('div.search-result ol.list li') as $key1 => $block1) {
					
					$title = $block1->find('h2.title a', 0);
					$time = $block1->find('span.posted', 0);
					$location = $block1->find('span.location span span', 0);
					
					$location->innertext = split(',',$location->innertext);
					$area = $this->area->getByName($location->innertext[0]);
					
					
					
					
					$date = new MyDateTime();
					
					if(!in_array(trim($title->innertext), $jobs_aa))
					{
						echo "---".$title->innertext." / ".$time->innertext." / ".$area["id"].$area["name"]." / ".$title->href."<br />";
						//echo "---".$area["id"].$area["name"]."<br />";
						$query = "INSERT INTO `pb_jobs` (`member_id`, `company_id`, `cache_spacename`, `industry_id`, `area_id`, `name`, `work_station`, `content`, `require_gender_id`, `peoples`, `require_education_id`, `require_age`, `salary_id`, `worktype_id`, `status`, `clicked`, `jobtype_id`, `expire_time`, `created`, `modified`, `exper`, `testtime`, `skills`, `rprofile`, `job_other`, `jobtype`, `expired_dates`, `industry`, `salary`, `jobcats`, `jobindusts`, `link`) VALUES"
										." (1, 1, 'Admin', 0, ".$area["id"].", '".trim($title->innertext)."', '".trim($location->innertext)."', '', 0, '10', 7, '22-35', 2, 1, 1, 33, 0, 1371254400, ".$date->getTimestamp().", ".$date->getTimestamp().", NULL, '1 tháng', NULL, NULL, NULL, NULL, '".trim($time->innertext)."', 'IT', '', '', '[".$indust["id"]."]', '".trim($title->href)."');";                    
						$result = $con->query($query);
						
						if($result)
						{
							$jobs_aa[] = trim($title->innertext);
						}
					}
					
					
					if($count > 15)
					{
						break;
					}
					else
					{
						$count++;
					}
				}
			}
			
		}
	}
	
	function ajaxImportJobDetail()
	{
		require_once(LIB_PATH. "simple_html_dom.php");
		$job = $this->job->read('*', intval($_GET["id"]));		
		
		echo $job["name"]." - ".$job["link"]."<br />";
		
		$html = file_get_html($job["link"]);
		if($html->find('div.content-box[itemprop="description"]', 0))
		{
			$description = $html->find('div.content-box[itemprop="description"]', 0);
			$description = $description->innertext;
			//echo $description;
		}
		if($html->find('div.content-box[itemprop="experienceRequirements"]', 0))
		{
			$exper = $html->find('div.content-box[itemprop="experienceRequirements"]', 0);
			$expert = $expert->innertext;
			//echo $exper;
		}
		if($html->find('span[itemprop="baseSalary"]', 0))
		{
			$salary = $html->find('span[itemprop="baseSalary"]', 0);
			//echo $salary;
		}
		if($html->find('h1.job-title a', 0))
		{
			$title = $html->find('h1.job-title a', 0);
			$title = $title->innertext;
			//echo $title;
		}
		
		$val["id"] = intval($_GET["id"]);
		$val["content"] = $description;
		$val["skills"] = $exper;
		$val["salary"] = trim($salary);
		$val["name"] = trim($title);
		
		$this->job->save($val, "update");
		
	}	
	function importJobDetail()
	{
		render("job/importJobDetail", 1);
	}	
	function changeTimeFormat()
	{
		$jobs = $this->job->findAll('*');
		
		foreach($jobs as $job)
		{
			if($job["expired_dates"] != '' && (strpos($job["expired_dates"], "/") || strpos($job["expired_dates"], "-")))
			{
				//$job["expired_dates"]."<br />";
				$job['expired_dates'] = str_replace('/', '-', $job['expired_dates']);
				$job['expired_dates'] = strtotime($job['expired_dates']);
				//echo $job['expired_dates']."<br />";
				
				$this->job->save($job,"update");
			}
			else
			{
				//$job["expired_dates"]."<br />";
				//$job['expired_dates'] = str_replace('/', '-', $job['expired_dates']);
				$job['expired_dates'] = 0;
				$job['status'] = 0;
				//echo $job['expired_dates']."<br />";
				
				$this->job->save($job,"update");
			}
		}
	}
}
?>