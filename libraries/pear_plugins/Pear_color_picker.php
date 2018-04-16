<?php

class Pear_color_picker  extends Pear_plugin {

	public function __construct() {
		ci('page')
			->domready("$('.js-colorpicker').colorpicker();")
			->css('//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.0/css/bootstrap-colorpicker.min.css')
			->js('//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.1.0/js/bootstrap-colorpicker.min.js');
	}

	public function render($name=null,$value=null,$extra=[]) {
		$extra = array_merge(['default'=>'#111111'], $extra);
		$value = '#'.trim(((empty($value)) ? $extra['default'] : $value), '#');

		return '<div class="input-group js-colorpicker"><input type="text" name="'.$name.'" value="'.$value.'" class="form-control"><span class="input-group-addon"><i></i></span></div>';
	}
}
