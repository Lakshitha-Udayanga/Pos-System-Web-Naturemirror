<?php $__env->startSection('title', __('report.sales_representative')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo e(__('report.sales_representative'), false); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                    <?php echo Form::open([
                        'url' => action('ReportController@getStockReport'),
                        'method' => 'get',
                        'id' => 'sales_representative_filter_form',
                    ]); ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_id', __('report.user') . ':'); ?>

                            <?php echo Form::select('sr_id', $users, null, [
                                'class' => 'form-control select2',
                                'style' => 'width:100%',
                                'placeholder' => __('report.all_users'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_business_id', __('business.business_location') . ':'); ?>

                            <?php echo Form::select('sr_business_id', $business_locations, null, [
                                'class' => 'form-control select2',
                                'style' => 'width:100%',
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_customer_id', __('contact.customer') . ':'); ?>

                            <?php echo Form::select('sr_customer_id', $customers, null, [
                                'class' => 'form-control select2',
                                'style' => 'width:100%',
                                'placeholder' => __('lang_v1.all'),
                            ]); ?>

                        </div>
                    </div>
                    <?php if($super_admin->enable_multiple_payment_methods != 1): ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo Form::label('sr_payment_status', __('purchase.payment_status') . ':'); ?>

                                <?php echo Form::select(
                                    'sr_payment_status',
                                    [
                                        'paid' => __('lang_v1.paid'),
                                        'due' => __('lang_v1.due'),
                                        'partial' => __('lang_v1.partial'),
                                        'overdue' => __('lang_v1.overdue'),
                                    ],
                                    null,
                                    ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')],
                                ); ?>

                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Multiple Payment Status</label>
                                <select class="form-control select2" multiple="multiple" id="sr_payment_status"
                                    name="sr_payment_status[]" data-placeholder=" Select a Payment Status" style="width: 100%;">
                                    <option value="paid">Paid</option>
                                    <option value="due">Due</option>
                                    <option value="partial">Partial</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-3">
                        <div class="form-group">

                            <?php echo Form::label('sr_date_filter', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', null, [
                                'placeholder' => __('lang_v1.select_a_date_range'),
                                'class' => 'form-control',
                                'id' => 'sr_date_filter',
                                'readonly',
                            ]); ?>

                        </div>
                    </div>

                    <?php echo Form::close(); ?>

                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>

        <!-- Summary -->
        <div class="row">
            <div class="col-sm-12">
                <?php $__env->startComponent('components.widget', ['title' => __('report.summary')]); ?>
                    <h3 class="text-muted">
                        <?php echo e(__('report.total_sell'), false); ?> - <?php echo e(__('lang_v1.total_sales_return'), false); ?>:
                        <span id="sr_total_sales">
                            <i class="fas fa-sync fa-spin fa-fw"></i>
                        </span>
                        -
                        <span id="sr_total_sales_return">
                            <i class="fas fa-sync fa-spin fa-fw"></i>
                        </span>
                        =
                        <span id="sr_total_sales_final">
                            <i class="fas fa-sync fa-spin fa-fw"></i>
                        </span>
                    </h3>
                    <div class="hide" id="total_payment_with_commsn_div">
                        <h3 class="text-muted">
                            <?php echo e(__('lang_v1.total_payment_with_commsn'), false); ?>:
                            <span id="total_payment_with_commsn">
                                <i class="fas fa-sync fa-spin fa-fw"></i>
                            </span>
                        </h3>
                    </div>
                    <div class="hide" id="total_commission_div">
                        <h3 class="text-muted">
                            <?php echo e(__('lang_v1.total_sale_commission'), false); ?>:
                            <span id="sr_total_commission">
                                <i class="fas fa-sync fa-spin fa-fw"></i>
                            </span>
                        </h3>
                    </div>
                    <h3 class="text-muted">
                        <?php echo e(__('report.total_expense'), false); ?>:
                        <span id="sr_total_expenses">
                            <i class="fas fa-sync fa-spin fa-fw"></i>
                        </span>
                    </h3>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#sr_sales_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog"
                                    aria-hidden="true"></i> <?php echo app('translator')->getFromJson('lang_v1.sales_added'); ?></a>
                        </li>

                        <li>
                            <a href="#sr_commission_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog"
                                    aria-hidden="true"></i> <?php echo app('translator')->getFromJson('lang_v1.sales_with_commission'); ?></a>
                        </li>

                        <li>
                            <a href="#sr_expenses_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog"
                                    aria-hidden="true"></i> <?php echo app('translator')->getFromJson('expense.expenses'); ?></a>
                        </li>

                        <?php if(!empty($pos_settings['cmmsn_calculation_type']) && $pos_settings['cmmsn_calculation_type'] == 'payment_received'): ?>
                            <li>
                                <a href="#sr_payments_with_cmmsn_tab" data-toggle="tab" aria-expanded="true"><i
                                        class="fa fa-cog" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('lang_v1.payments_with_cmmsn'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="sr_sales_tab">
                            <?php echo $__env->make('report.partials.sales_representative_sales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="tab-pane" id="sr_commission_tab">
                            <?php echo $__env->make('report.partials.sales_representative_commission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="tab-pane" id="sr_expenses_tab">
                            <?php echo $__env->make('report.partials.sales_representative_expenses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <?php if(!empty($pos_settings['cmmsn_calculation_type']) && $pos_settings['cmmsn_calculation_type'] == 'payment_received'): ?>
                            <div class="tab-pane" id="sr_payments_with_cmmsn_tab">
                                <?php echo $__env->make('report.partials.sales_representative_payments_with_cmmsn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
    <div class="modal fade view_register" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/report/sales_representative.blade.php ENDPATH**/ ?>