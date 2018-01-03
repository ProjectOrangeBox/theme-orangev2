<?php
/*
 * Orange Framework Extension
 *
 * @package	CodeIgniter / Orange
 * @author Don Myers
 * @license http://opensource.org/licenses/MIT MIT License
 * @link https://github.com/ProjectOrangeBox
 *
 */

class Pear_locked_field {
	public function __construct() {
		pear::attach('locked_field',function($name=null,$value=null,$extra=[]) {
			ci('page')->js('/theme/orange/assets/plugins/plugin-locked-field/plugin_locked_field.js');
			$extra = array_merge(['default'=>'lock','can'=>'####','class'=>''],$extra);

			$show_lock = true;

			if ($extra['method'] == 'post') {
				$extra['default'] = '';
				$show_lock = false;
			}
			$html = '<input type="text" '.(($extra['default'] == 'lock') ? 'readonly' : '').' id="'.$name.'" name="'.$name.'" value="'.$value.'" class="'.$extra['class'].'" style="width:100%; display:inline">';

			if ($show_lock) {
				if (user::can($extra['can'])) {
					$html .= '<a style="margin-left: -24px" class="js-locked-field-lock" href="#" data-lock="true"><i class="fa fa-'.(($show_lock) ? 'lock' : 'unlock').'"></i></a>';
				}
			}
			return $html;
		});
	}
}
