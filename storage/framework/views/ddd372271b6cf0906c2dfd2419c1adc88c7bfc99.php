<?php $__env->startSection('title', __('lang_v1.purchase_order')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->getFromJson('lang_v1.purchase_order'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('po_list_filter_location_id',  __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('po_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]);; ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('po_list_filter_supplier_id',  __('purchase.supplier') . ':'); ?>

                <?php echo Form::select('po_list_filter_supplier_id', $suppliers, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]);; ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('po_list_filter_status',  __('sale.status') . ':'); ?>

                <?php echo Form::select('po_list_filter_status', $purchaseOrderStatuses, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]);; ?>

            </div>
        </div>
        <?php if(!empty($shipping_statuses)): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('shipping_status', __('lang_v1.shipping_status') . ':'); ?>

                    <?php echo Form::select('shipping_status', $shipping_statuses, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]);; ?>

                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('po_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('po_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']);; ?>

            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_purchase_orders')]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_order.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <a class="btn btn-block btn-primary" href="<?php echo e(action('PurchaseOrderController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></a>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>

        <table class="table table-bordered table-striped ajax_view" id="purchase_order_table" style="width: 100%;">
            <thead>
                <tr>
                    <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                    <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                    <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
                    <th><?php echo app('translator')->getFromJson('purchase.location'); ?></th>
                    <th><?php echo app('translator')->getFromJson('purchase.supplier'); ?></th>
                    <th><?php echo app('translator')->getFromJson('sale.status'); ?></th>
                    <th><?php echo app('translator')->getFromJson('lang_v1.quantity_remaining'); ?></th>
                    <th><?php echo app('translator')->getFromJson('lang_v1.shipping_status'); ?></th>
                    <th><?php echo app('translator')->getFromJson('lang_v1.added_by'); ?></th>
                </tr>
            </thead>
        </table>
    <?php echo $__env->renderComponent(); ?>
    <div class="modal fade edit_pso_status_modal" tabindex="-1" role="dialog"></div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>	
<?php if ($__env->exists('purchase_order.common_js')) echo $__env->make('purchase_order.common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">
    $(document).ready( function(){
        //Purchase table
        purchase_order_table = $('#purchase_order_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[1, 'desc']],
            scrollY: "75vh",
            scrollX:        true,
            scrollCollapse: true,
            ajax: {
                url: '<?php echo e(action("PurchaseOrderController@index"), false); ?>',
                data: function(d) {
                    if ($('#po_list_filter_location_id').length) {
                        d.location_id = $('#po_list_filter_location_id').val();
                    }
                    if ($('#po_list_filter_supplier_id').length) {
                        d.supplier_id = $('#po_list_filter_supplier_id').val();
                    }
                    if ($('#po_list_filter_status').length) {
                        d.status = $('#po_list_filter_status').val();
                    }
                    if ($('#shipping_status').length) {
                        d.shipping_status = $('#shipping_status').val();
                    }

                    var start = '';
                    var end = '';
                    if ($('#po_list_filter_date_range').val()) {
                        start = $('input#po_list_filter_date_range')
                            .data('daterangepicker')
                            .startDate.format('YYYY-MM-DD');
                        end = $('input#po_list_filter_date_range')
                            .data('daterangepicker')
                            .endDate.format('YYYY-MM-DD');
                    }
                    d.start_date = start;
                    d.end_date = end;

                    d = __datatable_ajax_callback(d);
                },
            },
            columns: [
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'ref_no', name: 'ref_no' },
                { data: 'location_name', name: 'BS.name' },
                { data: 'name', name: 'contacts.name' },
                { data: 'status', name: 'transactions.status' },
                { data: 'po_qty_remaining', name: 'po_qty_remaining', "searchable": false},
                {data: 'shipping_status', name: 'transactions.shipping_status'},
                { data: 'added_by', name: 'u.first_name' }
            ]
        });

        $(document).on(
            'change',
            '#po_list_filter_location_id, #po_list_filter_supplier_id, #po_list_filter_status, #shipping_status',
            function() {
                purchase_order_table.ajax.reload();
            }
        );

        dateRangeSettings.startDate = moment().startOf('year'); 
        dateRangeSettings.endDate = moment().endOf('year');
        $('#po_list_filter_date_range').daterangepicker(
        dateRangeSettings,
            function (start, end) {
                $('#po_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
               purchase_order_table.ajax.reload();
            }
        );
        $('#po_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#po_list_filter_date_range').val('');
            purchase_order_table.ajax.reload();
        });

        $(document).on('click', 'a.delete-purchase-order', function(e) {
            e.preventDefault();
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).attr('href');
                    $.ajax({
                        method: 'DELETE',
                        url: href,
                        dataType: 'json',
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                purchase_order_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/purchase_order/index.blade.php ENDPATH**/ ?>