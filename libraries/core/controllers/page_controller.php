<?php
class Page extends PbController {
	var $name = "Page";
	
	function index()
	{
		global $smarty, $viewhelper;
		$this->loadModel("userpage");
		$conditions = array();
		$tpl_file = "pages/default";
		!empty($_GET) && $_GET = clear_html($_GET);
		if (isset($_GET['id'])) {
			$id = intval($_GET['id']);
			$conditions[] = "id=".$id;
		}elseif (!empty($_GET['name'])) {
			$conditions[] = "name='".trim(urldecode($_GET['name']))."' OR title='".trim(urldecode($_GET['name']))."'";
		}elseif (!empty($_GET['title'])) {
			$conditions[] = "title='".trim(urldecode($_GET['title']))."' OR name='".trim(urldecode($_GET['title']))."'";
		}
		$this->userpage->setCondition($conditions);
		$result = $this->userpage->dbstuff->GetRow("SELECT * FROM {$this->userpage->table_prefix}userpages ".$this->userpage->getCondition());
		if (!empty($result)) {
			$title = $result['title'];
			$viewhelper->setTitle($title);
			$viewhelper->setPosition($title);
			if (!empty($result['templet_name'])) {
				$tpl_file = "pages/".$result['templet_name'];
			}elseif ($smarty->template_exists($smarty->template_dir."pages/".$result['name'].$smarty->tpl_ext)){
				$tpl_file = "pages/".$result['name'];
			}
			setvar("item", pb_lang_split_recursive($result));
		}else{
			setvar("item", array());
		}
		$smarty->assign('position', $viewhelper->getPosition());
		$smarty->assign('page_title', $viewhelper->getTitle());
		$smarty->display($tpl_file.$smarty->tpl_ext);		
	}
}
?>