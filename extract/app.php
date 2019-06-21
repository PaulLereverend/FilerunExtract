<?php
 
class custom_extract extends \FileRun\Files\Plugin {
 
 
	static $localeSection = 'Custom Actions: Extract';
 
	function init() {
		$this->JSconfig = [
			"title" => self::t('Extract here'),
			'iconCls' => 'fa fa-fw fa-file-archive-o',
			"extensions" => ['rar', '7z', 'bz2'],
			"requiredUserPerms" => ["download"],
			'requires' => ['download']
		];
	}
 
	function run() {
		$data = $this->prepareRead(['expect' => 'file']);
 		echo "7z -y x ".escapeshellarg($data['fullPath'])." -o".escapeshellarg(pathinfo($data['fullPath'])["dirname"]."/".pathinfo($data['fullPath'])["filename"]);
 		exec("7z -y x ".escapeshellarg($data['fullPath'])." -o".escapeshellarg(pathinfo($data['fullPath'])["dirname"]."/".pathinfo($data['fullPath'])["filename"]));
		/*$size = \FM::getFolderSize($data['fullPath']);
		if (!$size) {
			echo 'Error: '.\FM::$errMsg;
		}
		echo \FM::formatFileSize($size);*/
	}
}