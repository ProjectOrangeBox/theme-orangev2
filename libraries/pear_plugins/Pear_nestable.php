<?php

ci('page')
	->js_variable('nestable_handler', ci('page')->data('nestable_handler'))
	->domready('plugins.nestable.init();')
	->js(['/theme/orange/assets/plugins/nestable/nestable.js','/theme/orange/assets/plugins/nestable/vendor/jquery.nestable.min.js'])
	->css('/theme/orange/assets/plugins/nestable/nestable.min.css');
