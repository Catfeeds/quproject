<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.date('Ymd');
$verifyToken = md5('unique_salt' . $_POST['timestamp']);

function make_dirs($dir)
{
    if(!is_dir($dir)){
        if(!make_dirs(dirname($dir)))
		{
            return false;
        }
        if(!mkdir($dir,0755))
		{
            return false;
        }
    }
    return true;
}

$filePath = $targetFolder;
$fileName = $_FILES['Filedata']['name'];
$ext = explode('.', $fileName);		
$exten = $ext[1] ? $ext[1] : 'jpg';
$newName = date('Ymdhis').'.'.$exten;
make_dirs($filePath);
$file_path = '/uploads/'.date('Ymd').'/'.$newName;

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $filePath;

	$targetFile = rtrim($targetPath,'/') . '/' .$newName;

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		//move_uploaded_file($tempFile,$targetFile);
		move_uploaded_file($tempFile,iconv("UTF-8","gb2312", $targetFile));
		echo $file_path;
	} else {
		echo 'Invalid file type.';
	}
}
?>