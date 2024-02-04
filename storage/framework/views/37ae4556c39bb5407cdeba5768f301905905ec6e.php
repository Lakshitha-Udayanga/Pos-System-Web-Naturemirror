<!-- business information here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Receipt-<?php echo e($receipt_details->invoice_no, false); ?></title>
</head>

<body>
    <div class="ticket">

        <?php if(!empty($receipt_details->logo)): ?>
            <div class="text-box centered">
                <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" alt="Logo">
            </div>
        <?php endif; ?>
        <div class="text-box">
            <!-- Logo -->
            <p class="centered">
                <!-- Header text -->
                <?php if(!empty($receipt_details->header_text)): ?>
                    <span class="headings"><?php echo $receipt_details->header_text; ?></span>
                    <br />
                <?php endif; ?>

                <!-- business information here -->
                <?php if(!empty($receipt_details->display_name)): ?>
                    <span class="headings">
                        <?php echo e($receipt_details->display_name, false); ?>

                    </span>
                    <br />
                <?php endif; ?>

                <?php if(!empty($receipt_details->landscape_address)): ?>
                    <?php echo $receipt_details->landscape_address; ?>

                    <br />
                <?php endif; ?>

                <?php if(!empty($receipt_details->business_city)): ?>
                    <?php echo $receipt_details->business_city; ?>

                    <br />
                <?php endif; ?>

                <?php if(!empty($receipt_details->contact)): ?>
                    <?php echo $receipt_details->contact; ?>

                <?php endif; ?>
                <?php if(!empty($receipt_details->contact) && !empty($receipt_details->website)): ?>
                    ,
                <?php endif; ?>
                <?php if(!empty($receipt_details->website)): ?>
                    <?php echo e($receipt_details->website, false); ?>

                <?php endif; ?>
                <?php if(!empty($receipt_details->location_custom_fields)): ?>
                    <br><?php echo e($receipt_details->location_custom_fields, false); ?>

                <?php endif; ?>

                <?php if(!empty($receipt_details->sub_heading_line1)): ?>
                    <?php echo e($receipt_details->sub_heading_line1, false); ?><br />
                <?php endif; ?>
                <?php if(!empty($receipt_details->sub_heading_line2)): ?>
                    <?php echo e($receipt_details->sub_heading_line2, false); ?><br />
                <?php endif; ?>
                <?php if(!empty($receipt_details->sub_heading_line3)): ?>
                    <?php echo e($receipt_details->sub_heading_line3, false); ?><br />
                <?php endif; ?>
                <?php if(!empty($receipt_details->sub_heading_line4)): ?>
                    <?php echo e($receipt_details->sub_heading_line4, false); ?><br />
                <?php endif; ?>
                <?php if(!empty($receipt_details->sub_heading_line5)): ?>
                    <?php echo e($receipt_details->sub_heading_line5, false); ?><br />
                <?php endif; ?>

                <?php if(!empty($receipt_details->tax_info1)): ?>
                    <br><b><?php echo e($receipt_details->tax_label1, false); ?></b> <?php echo e($receipt_details->tax_info1, false); ?>

                <?php endif; ?>

                <?php if(!empty($receipt_details->tax_info2)): ?>
                    <b><?php echo e($receipt_details->tax_label2, false); ?></b> <?php echo e($receipt_details->tax_info2, false); ?>

                <?php endif; ?>

                <!-- Title of receipt -->
                <?php if(!empty($receipt_details->invoice_heading)): ?>
                    <br /><span class="sub-headings"><?php echo $receipt_details->invoice_heading; ?></span>
                <?php endif; ?>
            </p>
        </div>
        <div class="border-top textbox-info">
            <p class="f-left"><strong><?php echo $receipt_details->invoice_no_prefix; ?></strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->invoice_no, false); ?>

            </p>
        </div>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo $receipt_details->date_label; ?></strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->invoice_date, false); ?>

            </p>
        </div>

        <?php if(!empty($receipt_details->due_date_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->due_date_label, false); ?></strong></p>
                <p class="f-right"><?php echo e($receipt_details->due_date ?? '', false); ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->sales_person_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->sales_person_label, false); ?></strong></p>

                <p class="f-right"><?php echo e($receipt_details->sales_person, false); ?></p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->commission_agent_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->commission_agent_label, false); ?></strong></p>

                <p class="f-right"><?php echo e($receipt_details->commission_agent, false); ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->brand_label, false); ?></strong></p>

                <p class="f-right"><?php echo e($receipt_details->repair_brand, false); ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->device_label, false); ?></strong></p>

                <p class="f-right"><?php echo e($receipt_details->repair_device, false); ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->model_no_label, false); ?></strong></p>

                <p class="f-right"><?php echo e($receipt_details->repair_model_no, false); ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong><?php echo e($receipt_details->serial_no_label, false); ?></strong></p>

                <p class="f-right"><?php echo e($receipt_details->repair_serial_no, false); ?></p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->repair_status_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->repair_status, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->repair_warranty_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->repair_warranty, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <!-- Waiter info -->
        <?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->service_staff_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->service_staff, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php if(!empty($receipt_details->table_label)): ?>
                            <b><?php echo $receipt_details->table_label; ?></b>
                        <?php endif; ?>
                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->table, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <!-- customer info -->
        <div class="textbox-info">
            <p style="vertical-align: top;"><strong>
                    <?php echo e($receipt_details->customer_label ?? '', false); ?>

                </strong></p>

            <p>
                <?php if(!empty($receipt_details->customer_info)): ?>
                    <div class="bw">
                        <?php echo $receipt_details->customer_info; ?>

                    </div>
                <?php endif; ?>
            </p>
        </div>

        <?php if(!empty($receipt_details->client_id_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo e($receipt_details->client_id_label, false); ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->client_id, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->customer_tax_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo e($receipt_details->customer_tax_label, false); ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->customer_tax_number, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->customer_custom_fields)): ?>
            <div class="textbox-info">
                <p class="centered">
                    <?php echo $receipt_details->customer_custom_fields; ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->customer_rp_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo e($receipt_details->customer_rp_label, false); ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo e($receipt_details->customer_total_rp, false); ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->shipping_custom_field_1_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->shipping_custom_field_1_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->shipping_custom_field_1_value ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->shipping_custom_field_2_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->shipping_custom_field_2_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->shipping_custom_field_2_value ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->shipping_custom_field_3_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->shipping_custom_field_3_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->shipping_custom_field_3_value ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->shipping_custom_field_4_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->shipping_custom_field_4_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->shipping_custom_field_4_value ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo $receipt_details->shipping_custom_field_5_label; ?>

                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->shipping_custom_field_5_value ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->sale_orders_invoice_no)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo app('translator')->getFromJson('restaurant.order_no'); ?>
                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->sale_orders_invoice_no ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->sale_orders_invoice_date)): ?>
            <div class="textbox-info">
                <p class="f-left"><strong>
                        <?php echo app('translator')->getFromJson('lang_v1.order_dates'); ?>
                    </strong></p>
                <p class="f-right">
                    <?php echo $receipt_details->sale_orders_invoice_date ?? ''; ?>

                </p>
            </div>
        <?php endif; ?>
        <table style="margin-top: 25px !important" class="border-bottom width-100 table-f-12 mb-10">
            <thead class="border-bottom-dotted">
                
                <tr>
                    <th class="" style="font-size: 11px; width:20%"><?php echo e($receipt_details->table_qty_label, false); ?></th>
                    <th class="text-right" style="font-size: 11px; width:20%">
                        <?php echo e($receipt_details->table_unit_price_label, false); ?>

                    </th>
                    <?php if(!empty($receipt_details->item_discount_label)): ?>
                        <th class="text-right" style="font-size: 11px; width:20%;">
                            <?php echo e($receipt_details->item_discount_label, false); ?>

                        </th>
                    <?php endif; ?>
                    <th class="text-right" style="font-size: 11px; width:40%;">
                        <?php echo e($receipt_details->table_subtotal_label, false); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        
                        <td colspan="4" style="width:100%;">
                            <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?>

                            <?php if(!empty($line['sub_sku'])): ?>
                                , <?php echo e($line['sub_sku'], false); ?>

                                <?php endif; ?> <?php if(!empty($line['brand'])): ?>
                                    , <?php echo e($line['brand'], false); ?>

                                    <?php endif; ?> <?php if(!empty($line['cat_code'])): ?>
                                        , <?php echo e($line['cat_code'], false); ?>

                                    <?php endif; ?>
                                    <?php if(!empty($line['product_custom_fields'])): ?>
                                        , <?php echo e($line['product_custom_fields'], false); ?>

                                    <?php endif; ?>
                                    <?php if(!empty($line['sell_line_note'])): ?>
                                        <br>
                                        <span class="f-8">
                                            <?php echo $line['sell_line_note']; ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if(!empty($line['lot_number'])): ?>
                                        <br> <?php echo e($line['lot_number_label'], false); ?>: <?php echo e($line['lot_number'], false); ?>

                                    <?php endif; ?>
                                    <?php if(!empty($line['product_expiry'])): ?>
                                        , <?php echo e($line['product_expiry_label'], false); ?>: <?php echo e($line['product_expiry'], false); ?>

                                    <?php endif; ?>
                                    <?php if(!empty($line['warranty_name'])): ?>
                                        <br>
                                        <small>
                                            <?php echo e($line['warranty_name'], false); ?>

                                        </small>
                                    <?php endif; ?>
                                    <?php if(!empty($line['warranty_exp_date'])): ?>
                                        <small>
                                            - <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?>

                                        </small>
                                    <?php endif; ?>
                                    <?php if(!empty($line['warranty_description'])): ?>
                                        <small> <?php echo e($line['warranty_description'] ?? '', false); ?></small>
                                    <?php endif; ?>

                                    <?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                                        <br><small>
                                            1 <?php echo e($line['units'], false); ?> = <?php echo e($line['base_unit_multiplier'], false); ?>

                                            <?php echo e($line['base_unit_name'], false); ?> <br>
                                            <?php echo e($line['unit_price_inc_tax'], false); ?> x <?php echo e($line['quantity'], false); ?> =
                                            <?php echo e($line['line_total'], false); ?>

                                        </small>
                                    <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class=""><?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?> <?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                                <br><small>
                                    <?php echo e($line['quantity'], false); ?> x <?php echo e($line['base_unit_multiplier'], false); ?> =
                                    <?php echo e($line['orig_quantity'], false); ?> <?php echo e($line['base_unit_name'], false); ?>

                                </small>
                            <?php endif; ?>
                        </td>
                        <?php if(empty($receipt_details->hide_price)): ?>
                            <td class="text-right"><?php echo e($line['unit_price_before_discount'], false); ?></td>

                            

                            <?php if(!empty($receipt_details->item_discount_label)): ?>
                                <td class="text-right">
                                    <?php echo e($line['total_line_discount'] ?? '0.00', false); ?>

                                    <?php if(!empty($line['line_discount_percent'])): ?>
                                        (<?php echo e($line['line_discount_percent'], false); ?>%)
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            <td class="text-right"><?php echo e($line['line_total'], false); ?></td>
                        <?php endif; ?>
                    </tr>
                    
                    <?php if(!empty($line['modifiers'])): ?>
                        <?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?>

                                    <?php if(!empty($modifier['sub_sku'])): ?>
                                        , <?php echo e($modifier['sub_sku'], false); ?>

                                        <?php endif; ?> <?php if(!empty($modifier['cat_code'])): ?>
                                            , <?php echo e($modifier['cat_code'], false); ?>

                                        <?php endif; ?>
                                        <?php if(!empty($modifier['sell_line_note'])): ?>
                                            (<?php echo $modifier['sell_line_note']; ?>)
                                        <?php endif; ?>
                                </td>
                                <td class="text-right"><?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?> </td>
                                <?php if(empty($receipt_details->hide_price)): ?>
                                    <td class="text-right"><?php echo e($modifier['unit_price_inc_tax'], false); ?></td>
                                    <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
                                        <td class="text-right"><?php echo e($modifier['unit_price_exc_tax'], false); ?></td>
                                    <?php endif; ?>
                                    <?php if(!empty($receipt_details->item_discount_label)): ?>
                                        <td class="text-right">0.00</td>
                                    <?php endif; ?>
                                    <td class="text-right"><?php echo e($modifier['line_total'], false); ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td <?php if(!empty($receipt_details->item_discount_label)): ?> colspan="6" <?php else: ?> colspan="5" <?php endif; ?>>&nbsp;</td>
                    <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
                        <td></td>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
        <?php if(!empty($receipt_details->total_quantity_label)): ?>
            <div class="flex-box">
                <p class="left text-right">
                    <?php echo $receipt_details->total_quantity_label; ?>

                </p>
                <p class="width-50 text-right">
                    <?php echo e($receipt_details->total_quantity, false); ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(!empty($receipt_details->total_items_label)): ?>
            <div class="flex-box">
                <p class="left text-right">
                    <?php echo $receipt_details->total_items_label; ?>

                </p>
                <p class="width-50 text-right">
                    <?php echo e($receipt_details->total_items, false); ?>

                </p>
            </div>
        <?php endif; ?>
        <?php if(empty($receipt_details->hide_price)): ?>
            <div class="flex-box">
                <p class="left text-right sub-headings">
                    <?php echo $receipt_details->subtotal_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->subtotal, false); ?>

                </p>
            </div>

            <!-- Shipping Charges -->
            <?php if(!empty($receipt_details->shipping_charges)): ?>
                <div class="flex-box">
                    <p class="left text-right">
                        <?php echo $receipt_details->shipping_charges_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        <?php echo e($receipt_details->shipping_charges, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if(!empty($receipt_details->packing_charge)): ?>
                <div class="flex-box">
                    <p class="left text-right">
                        <?php echo $receipt_details->packing_charge_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        <?php echo e($receipt_details->packing_charge, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <!-- Discount -->
            <?php if(!empty($receipt_details->discount)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->discount_label; ?>

                    </p>

                    <p class="width-50 text-right">
                        (-) <?php echo e($receipt_details->discount, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if(!empty($receipt_details->total_line_discount)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->line_discount_label; ?>

                    </p>

                    <p class="width-50 text-right">
                        (-) <?php echo e($receipt_details->total_line_discount, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if(!empty($receipt_details->additional_expenses)): ?>
                <?php $__currentLoopData = $receipt_details->additional_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex-box">
                        <p class="width-50 text-right">
                            <?php echo e($key, false); ?>:
                        </p>

                        <p class="width-50 text-right">
                            (+)
                            <?php echo e($val, false); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(!empty($receipt_details->reward_point_label)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->reward_point_label; ?>

                    </p>

                    <p class="width-50 text-right">
                        (-) <?php echo e($receipt_details->reward_point_amount, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if(!empty($receipt_details->tax)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->tax_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        (+) <?php echo e($receipt_details->tax, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if($receipt_details->round_off_amount > 0): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->round_off_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        <?php echo e($receipt_details->round_off, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <div class="flex-box">
                <p class="width-50 text-right sub-headings">
                    <?php echo $receipt_details->total_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->total, false); ?>

                </p>
            </div>
            <?php if(!empty($receipt_details->total_in_words)): ?>
                <p colspan="2" class="text-right mb-0">
                    <small>
                        (<?php echo e($receipt_details->total_in_words, false); ?>)
                    </small>
                </p>
            <?php endif; ?>
            <?php if(!empty($receipt_details->payments)): ?>
                <?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex-box">
                        <p class="width-50 text-right"><?php echo e($payment['method'], false); ?> (<?php echo e($payment['date'], false); ?>) </p>
                        <p class="width-50 text-right"><?php echo e($payment['amount'], false); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <!-- Total Paid-->
            <?php if(!empty($receipt_details->total_paid)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->total_paid_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        <?php echo e($receipt_details->total_paid, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <!-- Total Due-->
            <?php if(!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->total_due_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        <?php echo e($receipt_details->total_due, false); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if(!empty($receipt_details->all_due)): ?>
                <div class="flex-box">
                    <p class="width-50 text-right">
                        <?php echo $receipt_details->all_bal_label; ?>

                    </p>
                    <p class="width-50 text-right">
                        <?php echo e($receipt_details->all_due, false); ?>

                    </p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="border-bottom width-100">&nbsp;</div>
        <?php if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label)): ?>
            <!-- tax -->
            <?php if(!empty($receipt_details->taxes)): ?>
                <table class="border-bottom width-100 table-f-12">
                    <tr>
                        <th colspan="2" class="text-center"><?php echo e($receipt_details->tax_summary_label, false); ?></th>
                    </tr>
                    <?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="left"><?php echo e($key, false); ?></td>
                            <td class="right"><?php echo e($val, false); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(!empty($receipt_details->additional_notes)): ?>
            <p class="centered">
                <?php echo nl2br($receipt_details->additional_notes); ?>

            </p>
        <?php endif; ?>

        
        <?php if($receipt_details->show_barcode): ?>
            <br />
            <img class="center-block"
                src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2, 30, [39, 48, 54], true), false); ?>">
        <?php endif; ?>

        <?php if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_text)): ?>
            <img class="center-block mt-5"
                src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE'), false); ?>">
        <?php endif; ?>

        <?php if(!empty($receipt_details->footer_text)): ?>
            <p class="centered">
                <?php echo $receipt_details->footer_text; ?>

            </p>
        <?php endif; ?>

    </div>
    <!-- <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script> -->
</body>

</html>

<style type="text/css">
    @page  {
        margin: 0;
    }

    .f-8 {
        font-size: 8px !important;
    }

    body {
        color: #000000;
    }

    @media  print {
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
            word-break: break-all;
        }

        .f-8 {
            font-size: 8px !important;
        }

        .headings {
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .sub-headings {
            font-size: 15px !important;
            font-weight: 700 !important;
        }

        .border-top {
            border-top: 1px solid #242424;
        }

        .border-bottom {
            border-bottom: 1px solid #242424;
        }

        .border-bottom-dotted {
            border-bottom: 1px dotted darkgray;
        }

        td.serial_number,
        th.serial_number {
            width: 5%;
            max-width: 5%;
        }

        td.description,
        th.description {
            width: 35%;
            max-width: 35%;
        }

        td.quantity,
        th.quantity {
            width: 15%;
            max-width: 15%;
            word-break: break-all;
        }

        td.unit_price,
        th.unit_price {
            width: 25%;
            max-width: 25%;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 20%;
            max-width: 20%;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 100%;
            max-width: 100%;
        }

        img {
            max-width: inherit;
            width: auto;
        }

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }

    .table-info {
        width: 100%;
    }

    .table-info tr:first-child td,
    .table-info tr:first-child th {
        padding-top: 8px;
    }

    .table-info th {
        text-align: left;
    }

    .table-info td {
        text-align: right;
    }

    .logo {
        float: left;
        width: 35%;
        padding: 10px;
    }

    .text-with-image {
        float: left;
        width: 65%;
    }

    .text-box {
        width: 100%;
        height: auto;
    }

    .textbox-info {
        clear: both;
    }

    .textbox-info p {
        margin-bottom: 0px
    }

    .flex-box {
        display: flex;
        width: 100%;
    }

    .flex-box p {
        width: 50%;
        margin-bottom: 0px;
        white-space: nowrap;
    }

    .table-f-12 th,
    .table-f-12 td {
        font-size: 12px;
        word-break: break-word;
    }

    .bw {
        word-break: break-word;
    }
</style>
<?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/sale_pos/receipts/slim.blade.php ENDPATH**/ ?>