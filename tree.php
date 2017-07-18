<?php

function build_tree($folder_name, &$comment, $space = " ")
{
	static $file_str = "";

	$file_array = scandir($folder_name);
	$file_str.= "<ul class = 'file_content'>";
	//return print_r($file_array, true);

	foreach($file_array as $file) {

		if (($file == '.') || ($file == '..')) {
			continue;
		}

		//Получаем полный путь к файлу
		$f0 = $folder_name.'/'.$file; 

		/* Если это папка */
		if (is_dir($f0)) {
			
			$file_str.= "<ul class='subdirectory'><li><b>".$space." ".$file."</b></li></ul>";
			$fil = build_tree($f0, $comment, $space.'  ');
		}

		/* Если это файл */
		else $file_str.= "<li>". $space."<a href='".$f0."'>".$file."</a></li>";
	}

	$file_str.= "</ul>";

	return $file_str;
}

$comment  = '';
$file_str = '';

if (isset($_POST['folder_name'])) {
	$folder_name = (string) $_POST['folder_name'];
}
else {
	$folder_name = '';
}

if (is_dir($folder_name)) {
	$file_str = build_tree($folder_name, $comment, "","");
}
else {
	$comment = 'Это не папка!';
}

$result = array(
	'folder_name' => $file_str,
	'comment' => $comment
	);

echo json_encode($result);

?>

