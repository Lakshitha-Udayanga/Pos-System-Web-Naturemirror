<!-- business information here -->
<style>
	
</style>
<div class="row">

    <!-- Logo -->
    <?php if(!empty($receipt_details->logo)): ?>
        <img style="max-height: 120px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>"
            class="img img-responsive center-block">
    <?php endif; ?>

    <!-- Header text -->
    <?php if(!empty($receipt_details->header_text)): ?>
        <div class="col-xs-12">
            <?php echo $receipt_details->header_text; ?>

        </div>
    <?php endif; ?>

    <!-- business information here -->
    <div class="col-xs-12 text-center">
        <p class="text-center" style="font-size: 28px;">
			<b>
            <!-- Shop & Location Name  -->
            <?php if(!empty($receipt_details->display_name)): ?>
                <?php echo e($receipt_details->display_name, false); ?>

            <?php endif; ?>
		</b>
        </p>

        <!-- Address -->
        <p style="font-size: 22px;">
            <?php if(!empty($receipt_details->address)): ?>
                <small class="text-center">
                    <?php echo $receipt_details->address; ?>

                </small>
            <?php endif; ?>
            <?php if(!empty($receipt_details->contact)): ?>
                <br /><?php echo $receipt_details->contact; ?>

            <?php endif; ?>
        </p>

        <!-- Invoice  number, Date  -->
        <p style="width: 100% !important; font-size: 18px;">
            <span class="pull-right">
                <b>Ref No:</b> <?php echo e($receipt_details->invoice_no, false); ?>

            </span>
            <br>
            <span class="pull-right">
                <b>Date:</b> <?php echo e($receipt_details->transaction_date, false); ?>

            </span>
            <span class="pull-left">
                <!-- customer info -->
                <?php if(!empty($receipt_details->supplier_info)): ?>
                    <b>Supplier:</b> <br> <?php echo $receipt_details->supplier_info; ?> <br>
                <?php endif; ?>
            </span>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <br />
        <?php
            $p_width = 45;
        ?>
        <?php if(!empty($receipt_details->item_discount_label)): ?>
            <?php
                $p_width -= 10;
            ?>
        <?php endif; ?>
        <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
            <?php
                $p_width -= 10;
            ?>
        <?php endif; ?>
        <table class="table table-responsive table-slim" style="font-size: 18px;">
            <thead>
                <tr>
                    <th>Products</th>
                    <th class="text-right">QTY</th>
                    <th class="text-right">Unit Price</th>
                    <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
                        <th class="text-right"><?php echo e($receipt_details->discounted_unit_price_label, false); ?></th>
                    <?php endif; ?>
                    <?php if(!empty($receipt_details->item_discount_label)): ?>
                        <th class="text-right"><?php echo e($receipt_details->item_discount_label, false); ?></th>
                    <?php endif; ?>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?>

                            
                            <?php if(!empty($line['product_custom_fields'])): ?>
                                , <?php echo e($line['product_custom_fields'], false); ?>

                            <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?>
                                <br>
                                <small>
                                    <?php echo $line['sell_line_note']; ?>

                                </small>
                            <?php endif; ?>
                            <?php if(!empty($line['lot_number'])): ?>
                                <br> <?php echo e($line['lot_number_label'], false); ?>: <?php echo e($line['lot_number'], false); ?>

                            <?php endif; ?>
                            <?php if(!empty($line['product_expiry'])): ?>
                                , <?php echo e($line['product_expiry_label'], false); ?>: <?php echo e($line['product_expiry'], false); ?>

                            <?php endif; ?>

                            <?php if(!empty($line['warranty_name'])): ?>
                                <br><small><?php echo e($line['warranty_name'], false); ?> </small>
                                <?php endif; ?> <?php if(!empty($line['warranty_exp_date'])): ?>
                                    <small>- <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?> </small>
                                <?php endif; ?>
                                <?php if(!empty($line['warranty_description'])): ?>
                                    <small> <?php echo e($line['warranty_description'] ?? '', false); ?></small>
                                <?php endif; ?>

                                <?php if($line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                                    <br><small>
                                        1 <?php echo e($line['units'], false); ?> = <?php echo e($line['base_unit_multiplier'], false); ?>

                                        <?php echo e($line['base_unit_name'], false); ?> <br>
                                        <?php echo e($line['unit_price_inc_tax'], false); ?> x <?php echo e($line['quantity'], false); ?> =
                                        <?php echo e($line['line_total'], false); ?>

                                    </small>
                                <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <?php echo e($line['quantity'], false); ?>

                            

                            <?php if($line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                                <br><small>
                                    <?php echo e($line['quantity'], false); ?> x <?php echo e($line['base_unit_multiplier'], false); ?> =
                                    <?php echo e($line['orig_quantity'], false); ?> <?php echo e($line['base_unit_name'], false); ?>

                                </small>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">Rs <?php echo e($line['unit_price_before_discount'], false); ?></td>
                        <?php if(!empty($receipt_details->item_discount_label)): ?>
                            <td class="text-right">
                                <?php echo e($line['total_line_discount'] ?? '0.00', false); ?>


                                <?php if(!empty($line['line_discount_percent'])): ?>
                                    (<?php echo e($line['line_discount_percent'], false); ?>%)
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                        <td class="text-right">Rs <?php echo e($line['line_total'], false); ?></td>
                    </tr>
                    <?php if(!empty($line['modifiers'])): ?>
                        <?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
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
                                <td class="text-right"><?php echo e($modifier['unit_price_inc_tax'], false); ?></td>
                                <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
                                    <td class="text-right"><?php echo e($modifier['unit_price_exc_tax'], false); ?></td>
                                <?php endif; ?>
                                <?php if(!empty($receipt_details->item_discount_label)): ?>
                                    <td class="text-right">0.00</td>
                                <?php endif; ?>
                                <td class="text-right"><?php echo e($modifier['line_total'], false); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
                            <td></td>
                        <?php endif; ?>
                        <?php if(!empty($receipt_details->item_discount_label)): ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<hr>
<br>
<div class="col-xs-12">
    <div class="table-responsive">
        <table class="table table-slim" style="font-size: 20px;">
            <tbody>
                <!-- Total -->
                <tr>
                    <th>
                    </th>
                    <td class="text-right">
                        <b>Sub Total:</b> Rs <?php echo e(number_format($receipt_details->total_in_words, 2), false); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>

<style type="text/css">
    body {
        color: #000000;
    }
</style>
<?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/purchase/receipts.blade.php ENDPATH**/ ?>