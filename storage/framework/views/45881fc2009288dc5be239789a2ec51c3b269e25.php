<?php if($__is_repair_enabled): ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("repair.create")): ?>
		<a href="<?php echo e(action('SellPosController@create'). '?sub_type=repair', false); ?>" title="<?php echo e(__('repair::lang.add_repair'), false); ?>" data-toggle="tooltip" data-placement="bottom" class="btn bg-purple btn-flat m-6 btn-xs m-5 pull-right">
			<i class="fa fa-wrench fa-lg"></i>
			<strong><?php echo app('translator')->getFromJson('repair::lang.repair'); ?></strong>
		</a>
	<?php endif; ?>
<?php endif; ?><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\Modules\Repair\Providers/../Resources/views/layouts/partials/pos_header.blade.php ENDPATH**/ ?>