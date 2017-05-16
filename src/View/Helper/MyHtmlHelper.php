<?php 
// src/View/Helper/MyHtmlHelper.php
namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper;

class MyHtmlHelper extends HtmlHelper
{
	public function _GetCbxParent($parent, $aros_id) {
		$checked = null;
		foreach ($parent['aros'] as $key => $aro_parent){
			if ($aro_parent->id == $aros_id){
				if ($aro_parent->_joinData->_create == 1 || $aro_parent->_joinData->_read == 1 || $aro_parent->_joinData->_update == 1 || $aro_parent->_joinData->_delete == 1){
					$checked = 'checked';
				}
				break;
			} else {
				$checked = '';
			}
		}
		return $checked;
	}

	public function _GetCbxChildren($children, $aros_id, $checked_parent){
		$checked = null;
		if (isset($children->aros) && !empty($children->aros)){
			foreach ($children->aros as $key => $aro_children){
				if ($aro_children->id == $aros_id){
					if ($aro_children->_joinData->_create == 1 || $aro_children->_joinData->_read == 1 || $aro_children->_joinData->_update == 1 || $aro_children->_joinData->_delete == 1){
						$checked = 'checked';
					} else {
						$checked = 'unchecked';
					}
				}
			}
		} else {
			$checked = null;
		}
		if ($checked_parent == 'checked' && $checked == null) {
			$checked = $checked_parent;   
		}
		return $checked;
	}

	public function _ArticleType($type) {
		switch ($type) {
			case ARTICLE_SIGNLE:
				$name = 'Signle';
				break;
			case ARTICLE_CATEGORIES:
				$name = 'Categories';
				break;
			case ARTICLE_HELP:
				$name = 'Help';
				break;
			case ARTICLE_SNJ:
				$name = 'S&J';
				break;
			default:
				$name = 'My Account';
				break;
		}
		return $name;
	}

	public function _Cutstring($string, $max, $num) {
		if (strlen($string) > $max) {
			$str = substr($string,0, $num).'...';
		} else {
			$str = $string;
		}
		return $str;
	}

	public function CountSupps($inquiry)	{
		$flag = 0; 
		foreach ($inquiry->inquirie_suppliers as $inquirie_supplier){
			if ($inquirie_supplier->status > IS_ASSIGN) {
				$flag = $flag + 1;
			}
		}
		$result = $flag.'/'.count($inquiry->inquirie_suppliers);
		return $result;
	}

	public function SumPrice($data)	{
		$price = 0; 
		foreach ($data as $key => $value) {
			
			$price = $price + ($value->price*$value->inquirie_products['quantity']);
		}
		$price = number_format($price, 2);
		return $price;
	}

	public function Currency($currency)	{
		switch ($currency) {
			case 1:
				$result = 'KRW';
				break;
			case 2:
				$result = 'USD';
				break;
			case 3:
				$result = 'EUR';
				break;
			case 4:
				$result = 'VND';
				break;
			
			default:
				$result = '';
				break;
		}
		return $result;
	}
} // End


 ?>