<?php $__env->startSection('title', __('business.business_locations')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->getFromJson('business.business_locations'); ?>
            <small><?php echo app('translator')->getFromJson('business.manage_your_business_locations'); ?></small>
        </h1>
        <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('business.all_your_business_locations')]); ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <?php if($is_available_location != 'no'): ?>
                        <button type="button" class="btn btn-block btn-primary btn-modal"
                            data-href="<?php echo e(action('BusinessLocationController@create'), false); ?>" data-container=".location_add_modal">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></button>
                    <?php else: ?>
                        <button type="button" class="btn btn-block btn-primary btn-modal btn_add_location" data-href=""
                            data-container="">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></button>
                    <?php endif; ?>
                </div>
            <?php $__env->endSlot(); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="business_location_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('invoice.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.location_id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.landmark'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.city'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.zip_code'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.state'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.country'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.price_group'); ?></th>
                            <th><?php echo app('translator')->getFromJson('invoice.invoice_scheme'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.invoice_layout_for_pos'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.invoice_layout_for_sale'); ?></th>
                            <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php echo $__env->renderComponent(); ?>

        <div class="modal fade location_add_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>
        <div class="modal fade location_edit_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

        <div class="modal fade location_activation_modal" tabindex="-1" role="dialog"
            aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="modal-title text-center"><b>ENTER YOUR SERVICE ACTIVATION CODE</h4>
                                <h4 class="modal-title text-center"><b>HERE FOR ADD A NEW BUSINESS LOCATION </h4>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="" id="activation_code"
                                    placeholder="Activation Code" style="font-weight: normal; font-size: 16px;">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="modal-title text-center">Please contact the “TechWizer” for get your</h4>
                                <h4 class="modal-title text-center">Business location service activation code</h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="modal-title text-center" style="font-size: 16px;"><b>074 - 289 0901 – (Mr.
                                        Sajith)</h5>
                                <h5 class="modal-title text-center" style="font-size: 16px;"><b>077 - 780 0067 – (Mr.
                                        Sameera)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save_code">Activate</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(document).ready(function() {
            $('.btn_add_location').click(function() {
                $('.location_activation_modal').modal();
            });

            $('.save_code').click(function() {
                var activation_code = $('#activation_code').val();

                if (activation_code != '') {
                    $.ajax({
                        method: 'post',
                        url: '/business-location/activation',
                        data: {
                            activation_code: activation_code
                        },

                        success: function(response) {
                            if (response.success == true) {
                                toastr.success(response.msg);
                                setTimeout(location.reload.bind(location), 2000);
                            } else {
                                toastr.error(response.msg);
                            }
                        }

                    });
                } else {
                    toastr.error('Please enter activation code');
                }
            });

            $('.location_add_modal, .location_edit_modal').on('shown.bs.modal', function(e) {
                $('form#business_location_add_form')
                    .submit(function(e) {
                        e.preventDefault();
                    })
                    .validate({
                        rules: {
                            location_id: {
                                remote: {
                                    url: '/business-location/check-location-id',
                                    type: 'post',
                                    data: {
                                        location_id: function() {
                                            return $('#location_id').val();
                                        },
                                        hidden_id: function() {
                                            if ($('#hidden_id').length) {
                                                return $('#hidden_id').val();
                                            } else {
                                                return '';
                                            }
                                        },
                                    },
                                },
                            },
                        },
                        messages: {
                            location_id: {
                                remote: LANG.location_id_already_exists,
                            },
                        },
                        submitHandler: function(form) {
                            e.preventDefault();
                            var data = $(form).serialize();

                            $.ajax({
                                method: 'POST',
                                url: $(form).attr('action'),
                                dataType: 'json',
                                data: data,
                                beforeSend: function(xhr) {
                                    __disable_submit_button($(form).find(
                                        'button[type="submit"]'));
                                },
                                success: function(result) {
                                    if (result.success == true) {
                                        $('div.location_add_modal').modal('hide');
                                        $('div.location_edit_modal').modal('hide');
                                        toastr.success(result.msg);
                                        // business_locations.ajax.reload();
                                        setTimeout(location.reload.bind(location), 2500);
                                    } else {
                                        toastr.error(result.msg);
                                    }
                                },
                            });
                        },
                    });

                $('form#business_location_add_form').find('#featured_products').select2({
                    minimumInputLength: 2,
                    allowClear: true,
                    placeholder: '',
                    ajax: {
                        url: '/products/list?not_for_selling=true',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                term: params.term, // search term
                                page: params.page,
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(obj) {
                                    var string = obj.name;
                                    if (obj.type == 'variable') {
                                        string += '-' + obj.variation;
                                    }

                                    string += ' (' + obj.sub_sku + ')';
                                    return {
                                        id: obj.variation_id,
                                        text: string
                                    };
                                })
                            };
                        },
                    },
                })
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/business_location/index.blade.php ENDPATH**/ ?>