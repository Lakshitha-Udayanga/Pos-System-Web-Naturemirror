<?php $__env->startSection('title', __('manufacturing::lang.production')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('manufacturing::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson('manufacturing::lang.production'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('productstion_list_filter_location_id',  __('purchase.business_location') . ':'); ?>


                <?php echo Form::select('productstion_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]);; ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('production_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('production_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']);; ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                      <?php echo Form::checkbox('production_list_is_final', 1, false, 
                      [ 'class' => 'input-icheck', 'id' => 'production_list_is_final']);; ?> <?php echo e(__('manufacturing::lang.finalize'), false); ?>

                    </label>
                </div>
            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('\Modules\Manufacturing\Http\Controllers\ProductionController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson( 'messages.add' ); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="productions_table">
                 <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                        <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->getFromJson('purchase.location'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.product'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.quantity'); ?></th>
                        <th><?php echo app('translator')->getFromJson('manufacturing::lang.total_cost'); ?></th>
                        <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<div class="modal fade" id="recipe_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php echo $__env->make('manufacturing::layouts.partials.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\Modules\Manufacturing\Providers/../Resources/views/production/index.blade.php ENDPATH**/ ?>