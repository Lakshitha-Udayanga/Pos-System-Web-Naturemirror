<?php $__env->startSection('title', __('purchase.purchases')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header no-print">
        <h1><?php echo app('translator')->getFromJson('purchase.purchases'); ?>
            <small></small>
        </h1>
        <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol> -->
    </section>

    <!-- Main content -->
    <section class="content no-print">
        <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('purchase_list_filter_location_id', __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('purchase_list_filter_location_id', $business_locations, null, [
                        'class' => 'form-control select2',
                        'style' => 'width:100%',
                        'placeholder' => __('lang_v1.all'),
                    ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('purchase_list_filter_supplier_id', __('purchase.supplier') . ':'); ?>

                    <?php echo Form::select('purchase_list_filter_supplier_id', $suppliers, null, [
                        'class' => 'form-control select2',
                        'style' => 'width:100%',
                        'placeholder' => __('lang_v1.all'),
                    ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('purchase_list_filter_status', __('purchase.purchase_status') . ':'); ?>

                    <?php echo Form::select('purchase_list_filter_status', $orderStatuses, null, [
                        'class' => 'form-control select2',
                        'style' => 'width:100%',
                        'placeholder' => __('lang_v1.all'),
                    ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('purchase_list_filter_payment_status', __('purchase.payment_status') . ':'); ?>

                    <?php echo Form::select(
                        'purchase_list_filter_payment_status',
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
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('purchase_list_filter_date_range', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('purchase_list_filter_date_range', null, [
                        'placeholder' => __('lang_v1.select_a_date_range'),
                        'class' => 'form-control',
                        'readonly',
                    ]); ?>

                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('purchase.all_purchases')]); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">
                        <a class="btn btn-block btn-primary" href="<?php echo e(action('PurchaseController@create'), false); ?>">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></a>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php endif; ?>
            <input type="hidden" id="enable_short_cut_purchase" value="<?php echo e($super_admin->enable_short_cut_purchase, false); ?>">
            <?php if($super_admin->enable_short_cut_purchase != 1): ?>
                <?php echo $__env->make('purchase.partials.purchase_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('purchase.partials.purchase_table_form_pop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div style="display: flex; width: 100%; margin-top: 10px;">
                    <?php echo Form::open([
                        'url' => action('PurchaseController@massDestroy'),
                        'method' => 'post',
                        'id' => 'mass_delete_form',
                    ]); ?>

                    <?php echo Form::hidden('selected_deleted_rows', null, ['id' => 'selected_deleted_rows']); ?>

                    <?php echo Form::submit(__('lang_v1.delete_selected'), ['class' => 'btn btn-xs btn-danger', 'id' => 'delete-selected']); ?>

                    <?php echo Form::close(); ?>

                </div>
            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>

        <div class="modal fade product_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

        <div class="modal fade payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

        <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

        <?php echo $__env->make('purchase.partials.update_purchase_status_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>

    <section id="receipt_section" class="print_section"></section>

    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
    <script>
        //Date range as a button
        dateRangeSettings.startDate = moment().startOf('year'); 
        dateRangeSettings.endDate = moment().endOf('year');
        $('#purchase_list_filter_date_range').daterangepicker(
            dateRangeSettings,
            function(start, end) {
                $('#purchase_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(
                    moment_date_format));
                purchase_table.ajax.reload();
            }
        );
        $('#purchase_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#purchase_list_filter_date_range').val('');
            purchase_table.ajax.reload();
        });

        $(document).on('click', '.update_status', function(e) {
            e.preventDefault();
            $('#update_purchase_status_form').find('#status').val($(this).data('status'));
            $('#update_purchase_status_form').find('#purchase_id').val($(this).data('purchase_id'));
            $('#update_purchase_status_modal').modal('show');
        });

        $(document).on('submit', '#update_purchase_status_form', function(e) {
            e.preventDefault();
            var form = $(this);
            var data = form.serialize();

            $.ajax({
                method: 'POST',
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                beforeSend: function(xhr) {
                    __disable_submit_button(form.find('button[type="submit"]'));
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#update_purchase_status_modal').modal('hide');
                        toastr.success(result.msg);
                        purchase_table.ajax.reload();
                        $('#update_purchase_status_form')
                            .find('button[type="submit"]')
                            .attr('disabled', false);
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });

        $(document).on('click', '#select-all-purchase', function(e) {
            var table_id = $(this).data('table-id');
            if (this.checked) {
                $('#' + table_id)
                    .find('tbody')
                    .find('input.row-select')
                    .each(function() {
                        if (!this.checked) {
                            $(this)
                                .prop('checked', true)
                                .change();
                        }
                    });
            } else {
                $('#' + table_id)
                    .find('tbody')
                    .find('input.row-select')
                    .each(function() {
                        if (this.checked) {
                            $(this)
                                .prop('checked', false)
                                .change();
                        }
                    });
            }
        });

        $(document).on('click', '#delete-selected', function(e) {
            e.preventDefault();
            var selected_deleted_rows = getSelectedRows();

            if (selected_deleted_rows.length > 0) {
                $('input#selected_deleted_rows').val(selected_deleted_rows);
                swal({
                    title: LANG.sure,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('form#mass_delete_form').submit();
                    }
                });
            } else {
                $('input#selected_deleted_rows').val('');
                swal('<?php echo app('translator')->getFromJson('lang_v1.no_row_selected'); ?>');
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/purchase/index.blade.php ENDPATH**/ ?>