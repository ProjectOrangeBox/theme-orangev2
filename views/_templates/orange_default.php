<? pear::plugins('flash_msg,form_helpers,rest_form') ?>

<? pear::section('page_js') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jStorage/0.4.12/jstorage.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
<!-- https://cdnjs.com/ -->
<? pear::parent() ?>
<? pear::end() ?>

<? pear::section('page_css') ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<? pear::parent() ?>
<? pear::end() ?>

<?=pear::include('_templates/header') ?>
	<div class="container">
		<?=$section_container ?>
	</div>
<?=pear::include('_templates/footer') ?>
