<?php
class Search extends PbController {
	var $name = "Search";
	var $conditions;
	var $keyword;
	var $types;
	var $module;
	var $allowed_search = array("dictionary"=>"dict", "help"=>"help", "market"=>"market", "info"=>"news", "offer"=>"offer", "fair"=>"fair", "product"=>"product", "yellow_page"=>"company");
	
	function Search()
	{
		!empty($_GET) && $_GET = clear_html($_GET);
		if (isset($_GET['q'])) {
			$this->keyword = $_GET['q'] = urldecode(strip_tags(htmlspecialchars($_GET['q'])));
		}
		if (!empty($_GET['module']) && in_array($_GET['module'], $this->allowed_search)) {
			$this->module = strip_tags(htmlspecialchars($_GET['module']));
			setvar("module", $this->module);
		}
	}

	function index()
	{
		global $viewhelper;
		$tpl_file = "search/index";
		$cache_types = cache_read("type");
		$viewhelper->setTitle(L("advanced_search", 'tpl'));
		render($tpl_file);
	}

	function lists()
	{
		global $time_start, $viewhelper, $pos, $limit, $smarty, $theme_name;
		$cache_types = cache_read("type");
		$viewhelper->setTitle(L("advanced_search", 'tpl'));
		$do = trim(strtolower($_GET['module']));
		if (in_array($do, $this->allowed_search)) {
			$tpl_file = "search/list";
			setvar('highlight_str', $this->keyword);
			switch ($do) {
				case "fair":
					$do = "expo";
					$option = "fair";
					break;
				case "offer":
					$option = "offer";
					$do = "trade";
					break;
				default:
					$option = $do;
					break;
			}
			$search_controller = new PbController();
			$model_name = htmlspecialchars($do, ENT_QUOTES);
			uses($model_name);
			$model_name = $search_controller->pluralize(ucwords($model_name));
			$model_object = new $model_name();
			$model_object->initSearch();
			$result = array();
			if($model_object->amount>0)
			$result = $model_object->Search($pos, $limit);
			//lft cat nav
			switch ($do) {
				case "product":
					$typeoption = "productsort";
					break;
				case "trade":
					$typeoption = "offertype";
					break;
				default:
					$typeoption = $do."type";
					break;
			}
			if ($do == "company") {
				$cache_options = cache_read('typeoption');
				$types = $cache_options['manage_type'];
			}else{
				$types = $cache_types[$typeoption];
			}
			if (!empty($types)) {
				setvar("cats", $types);
			}
			foreach ($this->allowed_search as $k=>$v) {
				$modules[$v] = L(array_search($v, $this->allowed_search));
			}
			ksort($modules);
			setvar("top_modules", $modules);
			unset($modules[$option]);
			array_unshift($modules, L(array_search($option, $this->allowed_search)));
			setvar("modules", $modules);
			//similar
			require(LIB_PATH. "segment.class.php");
			$segment = new Segments();
			$search_q = $similar_result = '';
			if (!empty($this->keyword)) {
				$similar_q = $segment->Split($this->keyword);
			}
			if (!empty($similar_q)) {
				$similar_result = $similar_q;
			}elseif(!empty($search_q)){
				$similar_result = $model_object->GetArray("SELECT *,name AS title FROM ".$tb_prefix."tags WHERE name like '%".$search_q."%' ORDER BY id DESC LIMIT 0,10");
			}
			setvar("similar_search", $similar_result);
			setvar("items", $result);
			$from = ($pos==0)?0:$pos+1;
			setvar("paging", array('total'=>$model_object->amount, 'from'=>$from, 'to'=>($to = $pos+$limit)>$model_object->amount?$model_object->amount:$to));
			setvar("TimeSpend", number_format((getmicrotime()-$time_start), 3));
			$tpl = $theme_name.DS.$option.DS.'list'.$smarty->tpl_ext;
			$viewhelper->setTitle(L(array_search($option, $this->allowed_search),'tpl'));
			if($search_q) $viewhelper->setTitle($search_q);
			setvar("no_result_tip", L("no_search_result_for_you", "tpl", $search_q));
			if (isset($_GET['typeid'])) {
				$viewhelper->setTitle($types[$_GET['typeid']]);
			}
			render($tpl_file);
		}else{
			unset($_GET);
			flash("record_not_exists");
		}
	}
	
	function direct()
	{
		global $pdb, $tb_prefix;
		$result = $pdb->GetRow("SELECT * FROM ".$tb_prefix."companies WHERE adwords='".$this->keyword."' OR name='".$this->keyword."'");
		if (!empty($result)) {
			pheader("Location:".URL."space/?id=".$result['id']);
			exit;
		}else{
			flash("record_not_exists", '', 0);
		}
	}
}
?>