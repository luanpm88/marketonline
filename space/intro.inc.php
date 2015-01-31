<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');

//$COMPANY["found_date"] = date('Y', $COMPANY["found_date"]);
//var_dump($COMPANY["found_date"];

uses("attachment", "album");
uses("album");
$album = new Albums();
$joins[] = "LEFT JOIN {$tb_prefix}attachments a ON a.id=Album.attachment_id";
$result = $album->findAll("Album.type, Album.thumb_id, a.modified, a.title,a.description,Album.id,a.attachment as thumb,a.id as a_id", $joins, "Album.member_id='".$member->info['id']."'", "Album.id desc");
if (!empty($result)) {
	$count = count($result);
	for($i=0; $i<$count; $i++){
		$result[$i]['image'] = URL. pb_get_attachmenturl($result[$i]['thumb'], '', 'small');
		$result[$i]['middleimage'] = URL. pb_get_attachmenturl($result[$i]['thumb']);
		if($result[$i]['type']=='video') {
			$result[$i]['image'] = URL."attachment/".$result[$i]['thumb'].".thumb.png?v=".$result[$i]['modified'];
			$result[$i]['source'] = URL."attachment/".$result[$i]['thumb']."?v=".$result[$i]['modified'];
			if($result[$i]['thumb_id']) {
				$result[$i]['image'] = URL."attachment/".$result[$i]['thumb'].".thumb.jpg?v=".$result[$i]['modified'];
			}
		}
	}
}
//var_dump($result);

$industries = $industry->findAll("id, name", null, array("id IN (".$COMPANY_CURRENT["industries"].")"));
//var_dump($industries);
$ins_string = "";
foreach($industries as $key => $item)
{
    $ins_string .= "<insitem>".$item["name"]."</insitem>";
    if($key != count($industries)-1)
    {
        $ins_string .= "";
    }
}

setvar("ins_string", $ins_string);
setvar("Items", $result);

setvar("pagetitle","Hồ sơ/Thông tin");
if(detectMobile()) {
	$space->render_mobile("space/intro");
} else {
	$space->render("intro");
}

?>