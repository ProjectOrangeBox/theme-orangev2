<? pear::extends('_templates/orange_admin') ?>

<? pear::section('section_container') ?>

<?=pear::open_multipart($controller_path,['class'=>'form-horizontal','method'=>$form_method,'data-success'=>'Record Saved|blue'],['id'=>$record->id]) ?>
	<div class="row">
		<div class="col-md-6"><h3><?=$ci_title_prefix ?> <?=$controller_title ?></h3></div>
	  <div class="col-md-6">
	  	<div class="pull-right">
				<?=pear::goback_button($controller_path) ?>
	  	</div>
	  </div>
	</div>

	<hr>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label('o_nav_model','text') ?>
		<div class="col-md-4">
			<?=pear::input('text',$record->text,['class'=>'form-control input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label('o_nav_model','url') ?>
		<div class="col-md-4">
			<?=pear::input('url',$record->url,['class'=>'form-control input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-3 control-label" for="textinput">Parent</label>
		<div class="col-md-4">
			<?=pear::catalog_dropdown('o_nav_model','parent_id',$record->parent_id,'url') ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label('o_nav_model','icon') ?>
		<div class="col-md-2">
			<?=pear::fa_dropdown('icon',$record->icon,['class'=>'form-control input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label('o_nav_model','color') ?>
		<div class="col-md-2">
			<?=pear::color_picker('color',$record->color,['class'=>'form-control input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label('o_nav_model','class') ?>
		<div class="col-md-2">
			<?=pear::input('class',$record->class,['class'=>'form-control input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		
		<?=pear::field_label('o_nav_model','sort') ?>


		<div class="col-md-1">
			<?=pear::input('sort',$record->sort,['type'=>'range','class'=>'form-control form-control-range input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label('o_nav_model','target') ?>
		<div class="col-md-2">
			<?=pear::input('target',$record->target,['class'=>'form-control input-md']) ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<?=pear::field_label() ?>
		<div class="col-md-9">
			<?=pear::checkbox('active', 1,($record->active == 1),['class'=>'js-checker']) ?> <?=pear::field_human('a_tooltips_model','active') ?>
		</div>
	</div>

	<? pear::include('_templates/access') ?>

	<!-- Submit Button -->
	<div class="form-group">
		<div class="col-md-12">
			<div class="pull-right">
				<?=pear::button(null,'Save',['class'=>'js-button-submit keymaster-s btn btn-primary']) ?>
			</div>
		</div>
	</div>
<?=pear::close() ?>

<? pear::end() ?>
