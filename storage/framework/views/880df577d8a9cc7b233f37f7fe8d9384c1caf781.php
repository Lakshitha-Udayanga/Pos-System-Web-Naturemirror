<?php $__env->startSection('title', __( 'lang_v1.all_sales')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->getFromJson( 'sale.sells'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <?php echo $__env->make('sell.partials.sell_list_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'lang_v1.all_sales')]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('direct_sell.access')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <a class="btn btn-block btn-primary" href="<?php echo e(action('SellController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></a>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if(auth()->user()->can('direct_sell.view') ||  auth()->user()->can('view_own_sell_only') ||  auth()->user()->can('view_commission_agent_sell')): ?>
        <?php
            $custom_labels = json_decode(session('business.custom_labels'), true);
         ?>
            <table class="table table-bordered table-striped ajax_view" id="sell_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                        <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.invoice_no'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.customer_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.contact_no'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.location'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.payment_status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.payment_method'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.total_amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.total_paid'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.sell_due'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.sell_return_due'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.shipping_status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.total_items'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.types_of_service'); ?></th>
                        <th><?php echo e($custom_labels['types_of_service']['custom_field_1'] ?? __('lang_v1.service_custom_field_1' ), false); ?></th>
                        <th><?php echo e($custom_labels['sell']['custom_field_1'] ?? '', false); ?></th>
                        <th><?php echo e($custom_labels['sell']['custom_field_2'] ?? '', false); ?></th>
                        <th><?php echo e($custom_labels['sell']['custom_field_3'] ?? '', false); ?></th>
                        <th><?php echo e($custom_labels['sell']['custom_field_4'] ?? '', false); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.added_by'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.sell_note'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.staff_note'); ?></th>
                        <th><?php echo app('translator')->getFromJson('sale.shipping_details'); ?></th>
                        <th><?php echo app('translator')->getFromJson('restaurant.table'); ?></th>
                        <th><?php echo app('translator')->getFromJson('restaurant.service_staff'); ?></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr class="bg-gray font-17 footer-total text-center">
                        <td colspan="6"><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
                        <td class="footer_payment_status_count"></td>
                        <td class="payment_method_count"></td>
                        <td class="footer_sale_total"></td>
                        <td class="footer_total_paid"></td>
                        <td class="footer_total_remaining"></td>
                        <td class="footer_total_sell_return_due"></td>
                        <td colspan="2"></td>
                        <td class="service_type_count"></td>
                        <td colspan="7"></td>
                    </tr>
                </tfoot>
            </table>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- This will be printed -->
<!-- <section class="invoice print_section" id="receipt_section">
</section> -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$(document).ready( function(){
    //Date range as a button
    dateRangeSettings.startDate = moment().startOf('year'); 
    dateRangeSettings.endDate = moment().endOf('year');
    $('#sell_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
        }
    );
    $('#sell_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_filter_date_range').val('');
        sell_table.ajax.reload();
    });

    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[1, 'desc']],
        "ajax": {
            "url": "/sells",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                d.is_direct_sale = 1;

                d.location_id = $('#sell_list_filter_location_id').val();
                d.customer_id = $('#sell_list_filter_customer_id').val();
                d.payment_status = $('#sell_list_filter_payment_status').val();
                d.created_by = $('#created_by').val();
                d.sales_cmsn_agnt = $('#sales_cmsn_agnt').val();
                d.service_staffs = $('#service_staffs').val();

                if($('#shipping_status').length) {
                    d.shipping_status = $('#shipping_status').val();
                }

                if($('#sell_list_filter_source').length) {
                    d.source = $('#sell_list_filter_source').val();
                }

                if($('#only_subscriptions').is(':checked')) {
                    d.only_subscriptions = 1;
                }

                d = __datatable_ajax_callback(d);
            }
        },
        scrollY:        "75vh",
        scrollX:        true,
        scrollCollapse: true,
        columns: [
            { data: 'action', name: 'action', orderable: false, "searchable": false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'conatct_name', name: 'conatct_name'},
            { data: 'mobile', name: 'contacts.mobile'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'payment_methods', orderable: false, "searchable": false},
            { data: 'final_total', name: 'final_total'},
            { data: 'total_paid', name: 'total_paid', "searchable": false},
            { data: 'total_remaining', name: 'total_remaining'},
            { data: 'return_due', orderable: false, "searchable": false},
            { data: 'shipping_status', name: 'shipping_status'},
            { data: 'total_items', name: 'total_items', "searchable": false},
            { data: 'types_of_service_name', name: 'tos.name', <?php if(empty($is_types_service_enabled)): ?> visible: false <?php endif; ?>},
            { data: 'service_custom_field_1', name: 'service_custom_field_1', <?php if(empty($is_types_service_enabled)): ?> visible: false <?php endif; ?>},
            { data: 'custom_field_1', name: 'transactions.custom_field_1', <?php if(empty($custom_labels['sell']['custom_field_1'])): ?> visible: false <?php endif; ?>},
            { data: 'custom_field_2', name: 'transactions.custom_field_2', <?php if(empty($custom_labels['sell']['custom_field_2'])): ?> visible: false <?php endif; ?>},
            { data: 'custom_field_3', name: 'transactions.custom_field_3', <?php if(empty($custom_labels['sell']['custom_field_3'])): ?> visible: false <?php endif; ?>},
            { data: 'custom_field_4', name: 'transactions.custom_field_4', <?php if(empty($custom_labels['sell']['custom_field_4'])): ?> visible: false <?php endif; ?>},
            { data: 'added_by', name: 'u.first_name'},
            { data: 'additional_notes', name: 'additional_notes'},
            { data: 'staff_note', name: 'staff_note'},
            { data: 'shipping_details', name: 'shipping_details'},
            { data: 'table_name', name: 'tables.name', <?php if(empty($is_tables_enabled)): ?> visible: false <?php endif; ?> },
            { data: 'waiter', name: 'ss.first_name', <?php if(empty($is_service_staff_enabled)): ?> visible: false <?php endif; ?> },
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#sell_table'));
        },
        "footerCallback": function ( row, data, start, end, display ) {
            var footer_sale_total = 0;
            var footer_total_paid = 0;
            var footer_total_remaining = 0;
            var footer_total_sell_return_due = 0;
            for (var r in data){
                footer_sale_total += $(data[r].final_total).data('orig-value') ? parseFloat($(data[r].final_total).data('orig-value')) : 0;
                footer_total_paid += $(data[r].total_paid).data('orig-value') ? parseFloat($(data[r].total_paid).data('orig-value')) : 0;
                footer_total_remaining += $(data[r].total_remaining).data('orig-value') ? parseFloat($(data[r].total_remaining).data('orig-value')) : 0;
                footer_total_sell_return_due += $(data[r].return_due).find('.sell_return_due').data('orig-value') ? parseFloat($(data[r].return_due).find('.sell_return_due').data('orig-value')) : 0;
            }

            $('.footer_total_sell_return_due').html(__currency_trans_from_en(footer_total_sell_return_due));
            $('.footer_total_remaining').html(__currency_trans_from_en(footer_total_remaining));
            $('.footer_total_paid').html(__currency_trans_from_en(footer_total_paid));
            $('.footer_sale_total').html(__currency_trans_from_en(footer_sale_total));

            $('.footer_payment_status_count').html(__count_status(data, 'payment_status'));
            $('.service_type_count').html(__count_status(data, 'types_of_service_name'));
            $('.payment_method_count').html(__count_status(data, 'payment_methods'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(6)').attr('class', 'clickable_td');
        }
    });

    $(document).on('change', '#sell_list_filter_location_id, #sell_list_filter_customer_id, #sell_list_filter_payment_status, #created_by, #sales_cmsn_agnt, #service_staffs, #shipping_status, #sell_list_filter_source',  function() {
        sell_table.ajax.reload();
    });

    $('#only_subscriptions').on('ifChanged', function(event){
        sell_table.ajax.reload();
    });
});
</script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/sell/index.blade.php ENDPATH**/ ?>