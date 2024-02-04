<?php $__env->startSection('title', __('stock_adjustment.stock_adjustments')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->getFromJson('stock_adjustment.stock_adjustments'); ?>
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if($super_admin->advance_stock_adjustment != 0): ?>
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status_filter"><?php echo app('translator')->getFromJson('Adjustments type'); ?>:</label>
                        <?php echo Form::select(
                            'status_filter',
                            ['increase' => __('Stock Increase'), 'decrease' => __('Stock Decrease')],
                            null,
                            ['class' => 'form-control', 'id' => 'status_filter', 'placeholder' => __('All')],
                        ); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        <?php endif; ?>

        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('stock_adjustment.all_stock_adjustments')]); ?>
            <?php $__env->slot('tool'); ?>
                <?php if($super_admin->advance_stock_adjustment == 0): ?>
                    <div class="box-tools">
                        <a class="btn btn-block btn-primary" href="<?php echo e(action('StockAdjustmentController@create'), false); ?>">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></a>
                    </div>
                <?php endif; ?>
            <?php $__env->endSlot(); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped ajax_view" id="stock_adjustment_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                            <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                            <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.location'); ?></th>
                            <th><?php echo app('translator')->getFromJson('stock_adjustment.adjustment_type'); ?></th>
                            <th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount_recovered'); ?></th>
                            <th><?php echo app('translator')->getFromJson('stock_adjustment.reason_for_stock_adjustment'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.added_by'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php echo $__env->renderComponent(); ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/stock_adjustment/index.blade.php ENDPATH**/ ?>