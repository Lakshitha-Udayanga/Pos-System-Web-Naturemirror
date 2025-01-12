<tr class="product_row">
    <?php
        $max_qty_rule = $product->qty_available;
        $formatted_max_quantity = $product->formatted_qty_available;
        $max_qty_msg = __('validation.custom-messages.quantity_not_available', ['qty'=> $formatted_max_quantity, 'unit' => $product->unit  ]);
        $allow_decimal = true;
    ?>
    <td>
        <?php echo e($product->product_name, false); ?>

        <br/>
        <?php echo e($product->sub_sku, false); ?>


            <?php if( session()->get('business.enable_lot_number') == 1 || session()->get('business.enable_product_expiry') == 1): ?>
            <?php
                $lot_enabled = session()->get('business.enable_lot_number');
                $exp_enabled = session()->get('business.enable_product_expiry');
                $lot_no_line_id = '';
                if(!empty($product->lot_no_line_id)){
                    $lot_no_line_id = $product->lot_no_line_id;
                }
            ?>
            <?php if($product->enable_stock == 1): ?>
                <br>
                <small class="text-muted" style="white-space: nowrap;"><?php echo app('translator')->getFromJson('report.current_stock'); ?>: <span class="qty_available_text"><?php echo e($product->formatted_qty_available, false); ?></span> <?php echo e($product->unit, false); ?></small>
            <?php endif; ?>
            <?php if(!empty($product->lot_numbers)): ?>
                <select class="form-control lot_number" name="products[<?php echo e($row_index, false); ?>][lot_no_line_id]">
                    <option value=""><?php echo app('translator')->getFromJson('lang_v1.lot_n_expiry'); ?></option>
                    <?php $__currentLoopData = $product->lot_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $selected = "";
                            if($lot_number->purchase_line_id == $lot_no_line_id){
                                $selected = "selected";

                                $max_qty_rule = $lot_number->qty_available;
                                $max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ]);
                            }

                            $expiry_text = '';
                            if($exp_enabled == 1 && !empty($lot_number->exp_date)){
                                if( \Carbon::now()->gt(\Carbon::createFromFormat('Y-m-d', $lot_number->exp_date)) ){
                                    $expiry_text = '(' . __('report.expired') . ')';
                                }
                            }
                        ?>
                        <option value="<?php echo e($lot_number->purchase_line_id, false); ?>" data-qty_available="<?php echo e($lot_number->qty_available, false); ?>" data-msg-max="<?php echo app('translator')->getFromJson('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ]); ?>" <?php echo e($selected, false); ?>><?php if(!empty($lot_number->lot_number) && $lot_enabled == 1): ?><?php echo e($lot_number->lot_number, false); ?> <?php endif; ?> <?php if($lot_enabled == 1 && $exp_enabled == 1): ?> - <?php endif; ?> <?php if($exp_enabled == 1 && !empty($lot_number->exp_date)): ?> <?php echo app('translator')->getFromJson('product.exp_date'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($lot_number->exp_date))->format(session('business.date_format')), false); ?> <?php endif; ?> <?php echo e($expiry_text, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php endif; ?>
        <?php endif; ?>
    </td>
    <td>
        <?php
            if(empty($product->quantity_ordered)) {
                $product->quantity_ordered = 1;
            }
            $multiplier = 1;
            if($product->unit_allow_decimal != 1) {
                $allow_decimal = false;
            }

            $qty_ordered = $product->quantity_ordered;
        ?>
        <?php $__currentLoopData = $sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($product->sub_unit_id) && $product->sub_unit_id == $key): ?>
                <?php
                    $multiplier = $value['multiplier'];
                    $max_qty_rule = $max_qty_rule / $multiplier;
                    $unit_name = $value['name'];
                    $max_qty_msg = __('validation.custom-messages.quantity_not_available', ['qty'=> $max_qty_rule, 'unit' => $unit_name  ]);

                    if(!empty($product->lot_no_line_id)){
                        $max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $max_qty_rule, 'unit' => $unit_name  ]);
                    }

                    if($value['allow_decimal']) {
                        $allow_decimal = true;
                    }
                ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php
            $qty_ordered = $product->quantity_ordered / $multiplier;
        ?>

        
        <?php if(!empty($product->transaction_sell_lines_id)): ?>
            <input type="hidden" name="products[<?php echo e($row_index, false); ?>][transaction_sell_lines_id]" class="form-control" value="<?php echo e($product->transaction_sell_lines_id, false); ?>">
        <?php endif; ?>

        <input type="hidden" name="products[<?php echo e($row_index, false); ?>][product_id]" class="form-control product_id" value="<?php echo e($product->product_id, false); ?>">

        <input type="hidden" value="<?php echo e($product->variation_id, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][variation_id]">

        <input type="hidden" value="<?php echo e($product->enable_stock, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][enable_stock]">
        
        <?php if(empty($product->quantity_ordered)): ?>
            <?php
                $product->quantity_ordered = 1;
            ?>
        <?php endif; ?>

        <input type="text" class="form-control product_quantity input_number input_quantity" value="<?php echo e(number_format($qty_ordered, session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" name="products[<?php echo e($row_index, false); ?>][quantity]" 
        <?php if($product->unit_allow_decimal == 1): ?> data-decimal=1 <?php else: ?> data-rule-abs_digit="true" data-msg-abs_digit="<?php echo app('translator')->getFromJson('lang_v1.decimal_value_not_allowed'); ?>" data-decimal=0 <?php endif; ?>
        data-rule-required="true" data-msg-required="<?php echo app('translator')->getFromJson('validation.custom-messages.this_field_is_required'); ?>" <?php if($product->enable_stock): ?> data-rule-max-value="<?php echo e($max_qty_rule, false); ?>" data-msg-max-value="<?php echo e($max_qty_msg, false); ?>"
        data-qty_available="<?php echo e($product->qty_available, false); ?>" 
        data-msg_max_default="<?php echo app('translator')->getFromJson('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>" <?php endif; ?> >
        <input type="hidden" class="base_unit_multiplier" name="products[<?php echo e($row_index, false); ?>][base_unit_multiplier]" value="<?php echo e($multiplier, false); ?>">

         <input type="hidden" class="hidden_base_unit_price" value="<?php echo e($product->last_purchased_price, false); ?>">

        <input type="hidden" name="products[<?php echo e($row_index, false); ?>][product_unit_id]" value="<?php echo e($product->unit_id, false); ?>">
        <?php if(!empty($sub_units)): ?>
            <br>
            <select name="products[<?php echo e($row_index, false); ?>][sub_unit_id]" class="form-control input-sm sub_unit">
                <?php $__currentLoopData = $sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key, false); ?>" data-multiplier="<?php echo e($value['multiplier'], false); ?>" data-unit_name="<?php echo e($value['name'], false); ?>" data-allow_decimal="<?php echo e($value['allow_decimal'], false); ?>" <?php if(!empty($product->sub_unit_id) && $product->sub_unit_id == $key): ?> selected <?php endif; ?>>
                        <?php echo e($value['name'], false); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php else: ?> 
            <?php echo e($product->unit, false); ?>

        <?php endif; ?>
    </td>
    <td>
        <input type="text" name="products[<?php echo e($row_index, false); ?>][unit_price]" class="form-control product_unit_price input_number" value="<?php echo e(number_format($product->last_purchased_price * $multiplier, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td>
        <input type="text" readonly name="products[<?php echo e($row_index, false); ?>][price]" class="form-control product_line_total" value="<?php echo e(number_format($product->quantity_ordered*$product->last_purchased_price, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td class="text-center">
        <i class="fa fa-trash remove_product_row cursor-pointer" aria-hidden="true"></i>
    </td>
</tr><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/stock_transfer/partials/product_table_row.blade.php ENDPATH**/ ?>