<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2238 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(LIB_PATH. 'page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("attachment", "album", "albumtype");
check_permission("album");

$attachment_controller = new Attachment('pic');
$attachment_controller2 = new Attachment('video_thumb');
$attachment = new Attachments();
$album = new Albums();
$albumtype = new Albumtypes();
$tpl_file = "album";
$page = new Pages();
if (!$company->Validate($companyinfo)) {
	flash("pls_complete_company_info", "company.php", 0);
}
if (isset($_POST['do'])) {
	pb_submit_check('album');
	$vals = $_POST['album'];
	//var_dump($_POST['album']);
	$vals['title'] = $title = trim($vals['title']);
	$vals['description'] = $description = trim($vals['description']);
	$now_album_amount = $attachment->findCount(null, "created>".$today_start." AND member_id=".$the_memberid);
	$id = intval($_POST['id']);
	$thumb_id = 0;
	if (!empty($_FILES['pic']['name'])) {
		$image_allowed =  array('gif','png','jpg');
		$video_allowed =  array('mp4','mpeg','avi','mkv');
		$filename = $_FILES['pic']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(in_array($ext,$image_allowed)) {
			$type = 'image';
			$type_id = 2;
			$attachment_controller->if_product_square = true;
		} elseif (in_array($ext,$video_allowed)) {
			$type = 'video';
			$attachment_controller->if_video_thumb = true;
		} else {
			$type = "error";
		}
		//echo $attachment_controller->if_video_thumb;
		
		
		$attachment_controller->upload_dir = "album".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
		$attach_id = (empty($id))?"album-".$the_memberid."-".($album->getMaxId()+1):"album-".$the_memberid."-".$id;
		$attachment_controller->title = $title;
		$attachment_controller->description = $description;
		$attachment_controller->rename_file = $attach_id;
		$attachment_controller->upload_process($type_id);
		
		$thumb_id = 0;
	}
	
	if (!empty($_FILES['video_thumb']['name'])) {
		
		$att = $album->read("att.attachment,Album.*",$id,null,null,array("LEFT JOIN {$tb_prefix}attachments att ON att.id=Album.attachment_id"));
		$parts = explode("/",$att["attachment"]);
		$dirr = $parts[0]."/".$parts[1]."/".$parts[2];
		$att_id = $parts[3].".thumb";

		
		$attachment_controller2->if_product_square = true;
		$attachment_controller2->upload_dir = $dirr;
		$attachment_controller2->rename_file = $att_id;
		$attachment_controller2->upload_process(1);
		
		$thumb_id = $attachment_controller2->id;
	}
	
	if (!empty($id)) {
		if (empty($attachment_controller->id)) {
			$attachment_id = $pdb->GetOne("SELECT attachment_id FROM {$tb_prefix}albums WHERE id=".$id);
		}else{
			$attachment_id = $attachment_controller->id;
		}
		$sql = "UPDATE {$tb_prefix}attachments a,{$tb_prefix}albums ab SET a.title='".$title."',a.description='".$description."',ab.attachment_id={$attachment_id},type_id='".$vals['type_id']."',ab.thumb_id={$thumb_id} WHERE ab.id={$id} AND a.id=".$attachment_id;
	}else{
		if ($g['max_album'] && $now_album_amount>=$g['max_album']) {
			flash('one_day_max');
		}
		if (empty($_FILES['pic']['name'])) {
			flash("failed");
		}
		$sql = "INSERT INTO {$tb_prefix}albums (member_id,attachment_id,type_id,type,thumb_id) VALUES (".$the_memberid.",'".$attachment_controller->id."','".$vals['type_id']."','".$type."',".$thumb_id.")";
	}
	$result = $pdb->Execute($sql);
	if (!$result) {
		//flash();
	}else{
		//flash("success", "album.php");
		//header('Location: '.$_SERVER['REQUEST_URI']);
		echo "done";
		exit;
	}
}
//$AlbumTypes = $albumtype->findAll("*",null,null,"display_order");
//var_dump($AlbumTypes);
setvar("AlbumTypes", $_PB_CACHE['albumtype']);
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if($do=="del" && !empty($id)) {
		//get attach info
		$album_info = $pdb->GetRow("SELECT att.attachment,ab.* FROM {$tb_prefix}albums ab LEFT JOIN {$tb_prefix}attachments att ON att.id=ab.attachment_id WHERE ab.member_id=".$the_memberid." AND ab.id={$id}");
		$attachment_controller->deleteBySource($album_info["attachment"]);
		$attachment->del($album_info['attachment_id'], "member_id=".$the_memberid);
		$result = $album->del(intval($id), "member_id=".$the_memberid);
	}
	if ($do=="edit") {
		if (!empty($id)) {
			$album_info = $pdb->GetRow("SELECT ab.thumb_id,ab.type,a.title,a.modified,a.description,ab.id,a.attachment,ab.type_id FROM {$tb_prefix}attachments a  LEFT JOIN {$tb_prefix}albums ab ON a.id=ab.attachment_id WHERE a.member_id=".$the_memberid." AND a.id={$id}");
			if (!empty($album_info['attachment'])) {
				$album_info['image'] = pb_get_attachmenturl($album_info['attachment'], "../", "small");
				if($album_info['type']=='video') {
					$album_info['image'] = URL."attachment/".$album_info['attachment'].".thumb.png?v=".$album_info['modified'];
				}
				if($album_info['thumb_id']) {
					$album_info['image'] = URL."attachment/".$album_info['attachment'].".thumb.jpg?v=".$album_info['modified'];
				}
			}
			setvar("item", $album_info);
			setvar("albumtypes", $albumtype->findAll("*"));
		}
		$tpl_file = "album_edit";
		template($tpl_file);
		exit;
	}
	if ($do == "state") {
		switch ($_GET['type']) {
			case "up":
				$state = 1;
				break;
			case "down":
				$state = 0;
				break;
			default:
				$state = 0;
				break;
		}
		if (!empty($id)) {
			$vals['state'] = $state;
			$updated = $pdb->Execute("UPDATE {$tb_prefix}albums SET state={$state} WHERE id={$id} AND member_id={$the_memberid}");
		}
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}
$joins[] = "LEFT JOIN {$tb_prefix}attachments Attachment ON Album.attachment_id=Attachment.id";
$joins[] = "LEFT JOIN {$tb_prefix}albumtypes at ON at.id=Album.type_id";
$conditions[] = "Attachment.member_id=".$the_memberid;

if(isset($_GET["type"])) {
	$conditions[] = "Album.type='".$_GET["type"]."'";
}

$amount = $album->findCount($joins, $conditions, "Album.id");
$page->setPagenav($amount);
$res = $pdb->GetAll("SELECT * from {$tb_prefix}albums");
$result = $album->findAll("at.name as type_name,Album.thumb_id,Album.state,Album.attachment_id,Album.type,Attachment.title,Attachment.modified,Attachment.description,Attachment.attachment,Album.id", $joins, $conditions, "Album.id DESC", $page->firstcount, $page->displaypg);
if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		$result[$i]['image'] = pb_get_attachmenturl($result[$i]['attachment'], '../', "small");
		if($result[$i]['type']=='video') {
			$result[$i]['image'] = URL."attachment/".$result[$i]['attachment'].".thumb.png?v=".$result[$i]['modified'];
		}
		if($result[$i]['thumb_id']) {
			$result[$i]['image'] = URL."attachment/".$result[$i]['attachment'].".thumb.jpg?v=".$result[$i]['modified'];
		}
	}
	setvar("Items", $result);
	setvar("ByPages", $page->pagenav);
}
template($tpl_file);
?>