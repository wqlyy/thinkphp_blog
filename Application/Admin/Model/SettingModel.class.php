<?php
namespace Admin\Model;
use Think\Model;

class SettingModel extends Model{
	public function getAll(){
		$data = $this->select();

		$result = array();
		foreach ($data as $row) {
			$result[$row['keys']] = array(
				'value'=>$row['val'],
				'desc'=>$row['desc'],
			);
		}
		// var_dump($result);

		return $result;
	}
}

?>