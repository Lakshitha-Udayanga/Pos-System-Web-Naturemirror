<?php $__env->startSection('title', __('role.add_role')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><?php echo app('translator')->getFromJson( 'role.add_role' ); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php
      $pos_settings = !empty(session('business.pos_settings')) ? json_decode(session('business.pos_settings'), true) : [];
    ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php echo Form::open(['url' => action('RoleController@store'), 'method' => 'post', 'id' => 'role_add_form' ]); ?>

        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('name', __( 'user.role_name' ) . ':*'); ?>

              <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'user.role_name' ) ]);; ?>

          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-3">
          <label><?php echo app('translator')->getFromJson( 'user.permissions' ); ?>:</label> 
        </div>
        </div>

        <div class="row check_group">
          <div class="col-md-1">
            <h4><?php echo app('translator')->getFromJson( 'lang_v1.others' ); ?></h4>
          </div>
          <div class="col-md-2">
            <div class="checkbox">
                <label>
                  <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                </label>
              </div>
          </div>
          <div class="col-md-9">
              <?php if(in_array('service_staff', $enabled_modules)): ?>
                <div class="col-md-12">
                  <div class="checkbox">
                    <label>
                      <?php echo Form::checkbox('is_service_staff', 1, false, 
                      [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'restaurant.service_staff' ), false); ?>

                    </label>
                    <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('restaurant.tooltip_service_staff') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'view_export_buttons', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_export_buttons' ), false); ?>

                  </label>
                </div>
              </div>
          </div>
        </div>
        <hr>

        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.user' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'user.roles' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_role' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.add_role' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.edit_role' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_role' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.supplier' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="radio-group">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[supplier_view]', 'supplier.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_supplier' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[supplier_view]', 'supplier.view_own', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_supplier' ), false); ?>

              </label>
            </div>
          </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.customer' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.customer_permissions_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view]', 'customer.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_customer' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view]', 'customer.view_own', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_customer' ), false); ?>

              </label>
            </div>
            <hr>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_one_month', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.customer_with_no_sell_one_month' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_three_month', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.customer_with_no_sell_three_month' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_six_month', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.customer_with_no_sell_six_month' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view_by_sell]', 'customer_with_no_sell_one_year', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.customer_with_no_sell_one_year' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[customer_view_by_sell]', 'customer_irrespective_of_sell', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.customer_irrespective_of_sell' ), false); ?>

              </label>
            </div>
            <hr>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'business.product' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.delete' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.opening_stock', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.add_opening_stock' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_purchase_price', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.view_purchase_price'), false); ?>

              </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.view_purchase_price_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <?php if(in_array('purchases', $enabled_modules) || in_array('stock_adjustment', $enabled_modules) ): ?>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.purchase' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[purchase_view]', 'purchase.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_purchase_n_stock_adjustment' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[purchase_view]', 'view_own_purchase', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.view_own_purchase_n_stock_adjustment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.delete' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.payments', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.add_purchase_payment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_purchase_payment', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_purchase_payment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'delete_purchase_payment', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.delete_purchase_payment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.update_status', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.update_status'), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <?php endif; ?>

        <?php if(!empty($common_settings['enable_purchase_order'])): ?>
          <div class="row check_group">
            <div class="col-md-1">
              <h4><?php echo app('translator')->getFromJson( 'lang_v1.purchase_order' ); ?></h4>
            </div>
            <div class="col-md-2">
              <div class="checkbox">
                  <label>
                    <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                  </label>
                </div>
            </div>
            <div class="col-md-9">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::radio('radio_option[purchase_order_view]', 'purchase_order.view_all', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_purchase_order' ), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::radio('radio_option[purchase_order_view]', 'purchase_order.view_own', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_purchase_order' ), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'purchase_order.create', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.create_purchase_order' ), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'purchase_order.update', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.edit_purchase_order' ), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'purchase_order.delete', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_purchase_order' ), false); ?>

                  </label>
                </div>
              </div>

            </div>
          </div>
          <hr>
        <?php endif; ?>
        <div class="row check_group">
            <div class="col-md-1">
                <h4><?php echo app('translator')->getFromJson( 'sale.pos_sale' ); ?></h4>
            </div>
            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-md-9">
            <?php if(in_array('pos_sale', $enabled_modules)): ?>
                <div class="col-md-12">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('permissions[]', 'sell.view', false, 
                        [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.view' ), false); ?>

                      </label>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'sell.create', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.create' ), false); ?>

                  </label>
                </div>
              </div>
                <?php endif; ?>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'sell.update', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.update' ), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'sell.delete', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.delete' ), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'edit_product_price_from_pos_screen', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.edit_product_price_from_pos_screen'), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'edit_product_discount_from_pos_screen', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.edit_product_discount_from_pos_screen'), false); ?>

                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'print_invoice', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.print_invoice'), false); ?>

                  </label>
                </div>
              </div>

            </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'sale.sale' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.sell_permissions_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <?php if(in_array('add_sale', $enabled_modules)): ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[sell_view]', 'direct_sell.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_sale' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[sell_view]', 'view_own_sell_only', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_sell_only' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_paid_sells_only', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_paid_sells_only' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_due_sells_only', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_due_sells_only' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_partial_sells_only', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_partially_paid_sells_only' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_overdue_sells_only', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_overdue_sells_only' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'direct_sell.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.add_sell' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'direct_sell.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.update_sale' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'direct_sell.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_sell' ), false); ?>

              </label>
            </div>
          </div>
          <?php endif; ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_commission_agent_sell', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_commission_agent_sell' ), false); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.payments', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.add_sell_payment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_sell_payment', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_sell_payment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'delete_sell_payment', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.delete_sell_payment'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_product_price_from_sale_screen', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_product_price_from_sale_screen'), false); ?>

              </label>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_product_discount_from_sale_screen', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_product_discount_from_sale_screen'), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'discount.access', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.discount.access'), false); ?>

              </label>
            </div>
          </div>
          <?php if(in_array('types_of_service', $enabled_modules)): ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'access_types_of_service', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.access_types_of_service' ), false); ?>

              </label>
            </div>
          </div>
          <?php endif; ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'access_sell_return', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.access_all_sell_return' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'access_own_sell_return', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.access_own_sell_return' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_invoice_number', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.add_edit_invoice_number' ), false); ?>

              </label>
            </div>
          </div>

        </div>
        </div>
        <hr>
      <?php if(!empty($pos_settings['enable_sales_order'])): ?>
        <div class="row check_group">
          <div class="col-md-1">
            <h4><?php echo app('translator')->getFromJson( 'lang_v1.sales_order' ); ?></h4>
          </div>
          <div class="col-md-2">
            <div class="checkbox">
                <label>
                  <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                </label>
              </div>
          </div>
          <div class="col-md-9">
            <div class="col-md-12">
              <div class="checkbox">
                <label>
                  <?php echo Form::radio('radio_option[so_view]', 'so.view_all', false, 
                  [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_so' ), false); ?>

                </label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="checkbox">
                <label>
                  <?php echo Form::radio('radio_option[so_view]', 'so.view_own', false, 
                  [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_so' ), false); ?>

                </label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('permissions[]', 'so.create', false, 
                  [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.create_so' ), false); ?>

                </label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('permissions[]', 'so.update', false, 
                  [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.edit_so' ), false); ?>

                </label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('permissions[]', 'so.delete', false, 
                  [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_so' ), false); ?>

                </label>
              </div>
            </div>

          </div>
        </div>
        <hr>
      <?php endif; ?>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'sale.draft' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
        <div class="checkbox">
          <label>
            <?php echo Form::radio('radio_option[draft_view]', 'draft.view_all', false, 
            [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_all_drafts' ), false); ?>

          </label>
        </div>
      </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[draft_view]', 'draft.view_own', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_drafts' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'draft.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.edit_draft' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'draft.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_draft' ), false); ?>

              </label>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'lang_v1.quotation' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
        <div class="checkbox">
          <label>
            <?php echo Form::radio('radio_option[quotation_view]', 'quotation.view_all', false, 
            [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_all_quotations' ), false); ?>

          </label>
        </div>
      </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[quotation_view]', 'quotation.view_own', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_own_quotations' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'quotation.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.edit_quotation' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'quotation.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_quotation' ), false); ?>

              </label>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'lang_v1.shipments' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::radio('radio_option[shipping_view]', 'access_shipping', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.access_all_shipments'), false); ?>

                  </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::radio('radio_option[shipping_view]', 'access_own_shipping', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.access_own_shipping'), false); ?>

                  </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'access_pending_shipments_only', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.access_pending_shipments_only'), false); ?>

                  </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'access_commission_agent_shipping', false, ['class' => 'input-icheck']);; ?>

                    <?php echo e(__('lang_v1.access_commission_agent_shipping'), false); ?>

                  </label>
                </div>
            </div>
        </div>
    </div>
    <hr>
        <div class="row check_group">
      <div class="col-md-1">
        <h4><?php echo app('translator')->getFromJson( 'cash_register.cash_register' ); ?></h4>
      </div>
      <div class="col-md-2">
        <div class="checkbox">
            <label>
              <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

            </label>
          </div>
      </div>
      <div class="col-md-9">
        <div class="col-md-12">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('permissions[]', 'view_cash_register', false, 
              [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_cash_register' ), false); ?>

            </label>
          </div>
        </div>
        <div class="col-md-12">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('permissions[]', 'close_cash_register', false, 
              [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.close_cash_register' ), false); ?>

            </label>
          </div>
        </div>
      </div>
      </div>
        <hr>
        
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.brand' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.tax_rate' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.unit' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'category.category' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.create' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.update' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.delete' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.report' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
            <?php if(in_array('purchases', $enabled_modules) || in_array('add_sale', $enabled_modules) || in_array('pos_sale', $enabled_modules)): ?>
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'purchase_n_sell_report.view', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase_n_sell_report.view' ), false); ?>

                  </label>
                </div>
              </div>
            <?php endif; ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_report.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'contacts_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.contacts_report.view' ), false); ?>

              </label>
            </div>
          </div>
          <?php if(in_array('expenses', $enabled_modules)): ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'expense_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.expense_report.view' ), false); ?>

              </label>
            </div>
          </div>
          <?php endif; ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'profit_loss_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.profit_loss_report.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'stock_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.stock_report.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'trending_product_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.trending_product_report.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'register_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.register_report.view' ), false); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sales_representative.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sales_representative.view' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'view_product_stock_value', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_product_stock_value' ), false); ?>

              </label>
            </div>
          </div> 

        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'role.settings' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'business_settings.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.business_settings.access' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'barcode_settings.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.barcode_settings.access' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'invoice_settings.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.invoice_settings.access' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'access_printers', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.access_printers'), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <?php if(in_array('expenses', $enabled_modules)): ?>
            <hr>
            <div class="row check_group">
                <div class="col-md-1">
                  <h4><?php echo app('translator')->getFromJson( 'lang_v1.expense' ); ?></h4>
                </div>
                <div class="col-md-2">
                  <div class="checkbox">
                      <label>
                        <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                      </label>
                    </div>
                </div>
                <div class="col-md-9">
                  <div class="col-md-12">
                        <div class="checkbox">
                          <label>
                            <?php echo Form::radio('radio_option[expense_view]', 'all_expense.access', false, 
                            [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.access_all_expense' ), false); ?>

                          </label>
                        </div>
                      </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                      <label>
                        <?php echo Form::radio('radio_option[expense_view]', 'view_own_expense', false,['class' => 'input-icheck']);; ?>

                        <?php echo e(__('lang_v1.view_own_expense'), false); ?>

                      </label>
                        </div>
                  </div>
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('permissions[]', 'expense.add', false, 
                        [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'expense.add_expense' ), false); ?>

                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('permissions[]', 'expense.edit', false, 
                        [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'expense.edit_expense' ), false); ?>

                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('permissions[]', 'expense.delete', false, 
                        [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_expense' ), false); ?>

                      </label>
                    </div>
                  </div>
                </div>
            </div>
        <?php endif; ?>
        <hr>
        <div class="row check_group">
        <div class="col-md-3">
          <h4><?php echo app('translator')->getFromJson( 'role.dashboard' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.dashboard_permission') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'dashboard.data', true, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.dashboard.data' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <div class="row check_group">
        <div class="col-md-3">
          <h4><?php echo app('translator')->getFromJson( 'account.account' ); ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'account.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.access_accounts' ), false); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_account_transaction', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.edit_account_transaction' ), false); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'delete_account_transaction', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_account_transaction' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <?php if(in_array('booking', $enabled_modules)): ?>
        <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo app('translator')->getFromJson( 'restaurant.bookings' ); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[bookings_view]', 'crud_all_bookings', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'restaurant.add_edit_view_all_booking' ), false); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::radio('radio_option[bookings_view]', 'crud_own_bookings', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'restaurant.add_edit_view_own_booking' ), false); ?>

              </label>
            </div>
          </div>
        </div>
        </div>
        <hr>
        <?php endif; ?>
        <div class="row">
        <div class="col-md-3">
          <h4><?php echo app('translator')->getFromJson( 'lang_v1.access_selling_price_groups' ); ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'access_default_selling_price', true, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__('lang_v1.default_selling_price'), false); ?>

              </label>
            </div>
          </div>
          <?php if(count($selling_price_groups) > 0): ?>
          <?php $__currentLoopData = $selling_price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selling_price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('spg_permissions[]', 'selling_price_group.' . $selling_price_group->id, false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e($selling_price_group->name, false); ?>

              </label>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        </div>
        <?php if(in_array('tables', $enabled_modules)): ?>
          <div class="row">
            <div class="col-md-3">
              <h4><?php echo app('translator')->getFromJson( 'restaurant.restaurant' ); ?></h4>
            </div>
            <div class="col-md-9">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('permissions[]', 'access_tables', false, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__('lang_v1.access_tables'), false); ?>

                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
        
        <?php echo $__env->make('role.partials.module_permissions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
        <div class="col-md-12">
           <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></button>
        </div>
        </div>

        <?php echo Form::close(); ?>

    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/role/create.blade.php ENDPATH**/ ?>