<?php $__env->startSection('title', 'SUPER ADMIN PANEL'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>SUPER ADMIN PANEL</h1>
        <br>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo Form::open([
            'url' => action('SuperAdminController@enableModulesStore'),
            'method' => 'post',
            'id' => 'enable_module_form',
            'files' => true,
        ]); ?>

        <div class="row">
            <div class="col-xs-12">
                <!--  <pos-tab-container> -->
                <div class="col-xs-12 pos-tab-container">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                        <div class="list-group">
                            <a href="#" class="list-group-item text-center active">Login Image</a>
                            <a href="#" class="list-group-item text-center">Enables Modules</a>
                            <a href="#" class="list-group-item text-center">Common Modules</a>
                            <a href="#" class="list-group-item text-center">Internal Modules</a>
                            
                            <a href="#" class="list-group-item text-center">SMS Settings</a>
                            <a href="#" class="list-group-item text-center">Product Settings</a>
                            <a href="#" class="list-group-item text-center">Location Activate</a>
                            <a href="#" class="list-group-item text-center">Payment</a>
                            <a href="#" class="list-group-item text-center">Report</a>
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                        <?php echo $__env->make('super_admin.partials.login_image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('super_admin.partials.modules', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('super_admin.partials.settings_modules', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('super_admin.partials.internal_modules', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                        

                        <?php echo $__env->make('super_admin.partials.settings_sms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('super_admin.partials.settings_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
                        <?php echo $__env->make('super_admin.partials.location_activate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('super_admin.partials.settings_payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('super_admin.partials.settings_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                </div>
                <!--  </pos-tab-container> -->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-danger pull-right" type="submit"><?php echo app('translator')->getFromJson('business.update_settings'); ?></button>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/product.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        __page_leave_confirmation('#bussiness_edit_form');

        $("#btn_code_genarate").click(function() {
            var number = randomNumber(100000, 999999);
            $('#activation_code').val(number);
        });

        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }

        $("#btn_save_code").click(function() {
            if ($('#activation_code').val() != '') {
                var code = $('#activation_code').val();

                $.ajax({
                    method: 'post',
                    url: '/business-location/save-activate-code',
                    data: {
                        code: code
                    },

                    success: function(response) {
                        if (response.success == true) {
                            toastr.success(response.msg);
                        } else {
                            toastr.error(response.msg);
                        }
                    }

                });

            } else {
                toastr.error('Genarate activation code');
            }
        });

        $(document).on('change', '#sms_service_provider', function(){
            if($(this).val() == 'default'){
                $('.default_sms_div').removeClass('hide');
            }else{
                $('.default_sms_div').addClass('hide');
            }
        });

        $(document).on('ifToggled', '#use_superadmin_settings', function() {
            if ($('#use_superadmin_settings').is(':checked')) {
                $('#toggle_visibility').addClass('hide');
                $('.test_email_btn').addClass('hide');
            } else {
                $('#toggle_visibility').removeClass('hide');
                $('.test_email_btn').removeClass('hide');
            }
        });

        $('#test_email_btn').click(function() {
            var data = {
                mail_driver: $('#mail_driver').val(),
                mail_host: $('#mail_host').val(),
                mail_port: $('#mail_port').val(),
                mail_username: $('#mail_username').val(),
                mail_password: $('#mail_password').val(),
                mail_encryption: $('#mail_encryption').val(),
                mail_from_address: $('#mail_from_address').val(),
                mail_from_name: $('#mail_from_name').val(),
            };
            $.ajax({
                method: 'post',
                data: data,
                url: "<?php echo e(action('BusinessController@testEmailConfiguration'), false); ?>",
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        swal({
                            text: result.msg,
                            icon: 'success'
                        });
                    } else {
                        swal({
                            text: result.msg,
                            icon: 'error'
                        });
                    }
                },
            });
        });

        $('#test_sms_btn').click(function() {
            var test_number = $('#test_number').val();
            if (test_number.trim() == '') {
                toastr.error('<?php echo e(__('lang_v1.test_number_is_required'), false); ?>');
                $('#test_number').focus();

                return false;
            }

            var data = {
                url: $('#sms_settings_url').val(),
                send_to_param_name: $('#send_to_param_name').val(),
                msg_param_name: $('#msg_param_name').val(),
                request_method: $('#request_method').val(),
                param_1: $('#sms_settings_param_key1').val(),
                param_2: $('#sms_settings_param_key2').val(),
                param_3: $('#sms_settings_param_key3').val(),
                param_4: $('#sms_settings_param_key4').val(),
                param_5: $('#sms_settings_param_key5').val(),
                param_6: $('#sms_settings_param_key6').val(),
                param_7: $('#sms_settings_param_key7').val(),
                param_8: $('#sms_settings_param_key8').val(),
                param_9: $('#sms_settings_param_key9').val(),
                param_10: $('#sms_settings_param_key10').val(),

                param_val_1: $('#sms_settings_param_val1').val(),
                param_val_2: $('#sms_settings_param_val2').val(),
                param_val_3: $('#sms_settings_param_val3').val(),
                param_val_4: $('#sms_settings_param_val4').val(),
                param_val_5: $('#sms_settings_param_val5').val(),
                param_val_6: $('#sms_settings_param_val6').val(),
                param_val_7: $('#sms_settings_param_val7').val(),
                param_val_8: $('#sms_settings_param_val8').val(),
                param_val_9: $('#sms_settings_param_val9').val(),
                param_val_10: $('#sms_settings_param_val10').val(),
                test_number: test_number
            };

            $.ajax({
                method: 'post',
                data: data,
                url: "<?php echo e(action('BusinessController@testSmsConfiguration'), false); ?>",
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        swal({
                            text: result.msg,
                            icon: 'success'
                        });
                    } else {
                        swal({
                            text: result.msg,
                            icon: 'error'
                        });
                    }
                },
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/super_admin/settings.blade.php ENDPATH**/ ?>