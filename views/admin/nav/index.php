<?php pear::extends('_templates/orange_admin') ?>

<?php pear::section('section_container') ?>

<div class="row">
	<div class="col-md-6"><h3><i class="fa fa-bars"></i> Navigation</h3></div>
	<div class="col-md-6">
		<div class="pull-right">
			<?=pear::table_search_field() ?>
			<?php if (pear::user('has_permission', 'url::/admin/nav::sort~get')) {
	?>
				<?=pear::header_button($controller_path.'/sort', 'GUI Sort', ['icon'=>'sitemap']) ?>
			<?php
} ?>
			<?php if (pear::user('has_permission', 'url::/admin/nav::index~post')) {
		?>
				<?=pear::new_button($controller_path.'/details', 'New '.$controller_title) ?>
			<?php
	} ?>
		</div>
	</div>
</div>

<div class="row">
	<table class="table table-sticky-header table-search table-sort table-hover">
		<thead>
			<tr class="panel-default">
				<th class="panel-heading"><?=pear::field_human('o_nav_model', 'text') ?></th>
				<th class="panel-heading"><?=pear::field_human('o_nav_model', 'url') ?></th>
				<th class="panel-heading text-center"><?=pear::field_human('o_nav_model', 'active') ?></th>
				<th class="panel-heading text-center">Color/Icon</th>
				<th class="panel-heading">Permission</th>
				<th class="panel-heading text-center nosort">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($records as $row) {
		?>
			<tr>
				<td><?=e($row->text) ?></td>
				<td><?=e($row->url) ?></td>
				<td class="text-center" data-value="<?=$row->active ?>"><?=pear::fa_enum_icon($row->active) ?></td>
				<td class="text-center" data-value="<?=$row->icon ?>"><?=pear::color_fa_icon($row->color, $row->icon) ?></td>
				<td><?=pear::catalog_lookup('o_permission_model', $row->access, 'description') ?></td>
				<td class="text-center actions">
					<?php if (pear::user('has_role', $row->edit_role_id)) {
			?>
						<?=pear::edit_button($controller_path.'/details/'.bin2hex($row->id)) ?>
					<?php
		} ?>
					<?php if (pear::user('has_role', $row->delete_role_id)) {
			?>
						<?=pear::delete_button($controller_path, ['id'=>$row->id]) ?>
					<?php
		} ?>
				</td>
			</tr>
			<?php
	} ?>
		</tbody>
	</table>
</div>

<?php pear::end() ?>
