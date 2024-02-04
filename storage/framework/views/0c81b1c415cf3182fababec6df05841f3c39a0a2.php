
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12 text-center">
            
            <address>
                
                <label for="" style="font-size: 22px;"><b><?php echo e($purchase->location->name, false); ?></label></b>
                <?php if(!empty($purchase->location->landmark)): ?>
                    <br><?php echo e($purchase->location->landmark, false); ?>

                <?php endif; ?>
                <?php if(!empty($purchase->location->city) || !empty($purchase->location->state) || !empty($purchase->location->country)): ?>
                    <br><?php echo e(implode(',', array_filter([$purchase->location->city, $purchase->location->state, $purchase->location->country])), false); ?>

                <?php endif; ?>

                

                <?php if(!empty($purchase->location->alternate_number)): ?>
                    <br><?php echo app('translator')->getFromJson('contact.mobile'); ?>: <?php echo e($purchase->location->mobile, false); ?> /
                    <?php echo e($purchase->location->alternate_number, false); ?>

                <?php elseif(!empty($purchase->location->mobile)): ?>
                    <br><?php echo app('translator')->getFromJson('contact.mobile'); ?>: <?php echo e($purchase->location->mobile, false); ?>

                <?php endif; ?>
                
                <?php if(!empty($purchase->location->email)): ?>
                    <br><?php echo app('translator')->getFromJson('business.email'); ?>: <?php echo e($purchase->location->email, false); ?>

                <?php endif; ?>
            </address>
            
            <hr>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <b><?php echo app('translator')->getFromJson('purchase.supplier'); ?>:</b>
            <address>
                <?php echo $purchase->contact->contact_address; ?>

                
                <?php if(!empty($purchase->contact->mobile)): ?>
                    <br><?php echo app('translator')->getFromJson('contact.mobile'); ?>: <?php echo e($purchase->contact->mobile, false); ?>

                <?php endif; ?>
                <?php if(!empty($purchase->contact->email)): ?>
                    <br><?php echo app('translator')->getFromJson('business.email'); ?>: <?php echo e($purchase->contact->email, false); ?>

                <?php endif; ?>
            </address>
            
        </div>

        <div class="col-sm-4 invoice-col">
            
        </div>

        <div class="col-sm-4 invoice-col">
            <b><?php echo app('translator')->getFromJson('purchase.ref_no'); ?>:</b> <?php echo e($purchase->ref_no, false); ?><br />
            <b><?php echo app('translator')->getFromJson('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?><br />
            

            
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table bg-gray">
                    <thead>
                        <tr class="bg-green">
                            <th>#</th>
                            <th><?php echo app('translator')->getFromJson('product.product_name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('product.sku'); ?></th>
                            
                            <th class="text-right">
                                <?php if($purchase->type == 'purchase_order'): ?>
                                    <?php echo app('translator')->getFromJson('lang_v1.order_quantity'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->getFromJson('purchase.purchase_quantity'); ?>
                                <?php endif; ?>
                            </th>
                            
                            
                            
                            
                            
                            <th class="text-right">Unit Price</th>
                            
                            <th class="text-right"><?php echo app('translator')->getFromJson('sale.subtotal'); ?></th>
                        </tr>
                    </thead>
                    <?php
                        $total_before_tax = 0.0;
                    ?>
                    <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration, false); ?></td>
                            <td>
                                <?php echo e($purchase_line->product->name, false); ?>

                                <?php if($purchase_line->product->type == 'variable'): ?>
                                    - <?php echo e($purchase_line->variations->product_variation->name, false); ?>

                                    - <?php echo e($purchase_line->variations->name, false); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($purchase_line->product->type == 'variable'): ?>
                                    <?php echo e($purchase_line->variations->sub_sku, false); ?>

                                <?php else: ?>
                                    <?php echo e($purchase_line->product->sku, false); ?>

                                <?php endif; ?>
                            </td>
                            
                            <td class="text-right"><span class="display_currency" data-is_quantity="true"
                                    data-currency_symbol="false"><?php echo e($purchase_line->quantity, false); ?></span>
                                <?php if(!empty($purchase_line->sub_unit)): ?>
                                    <?php echo e($purchase_line->sub_unit->short_name, false); ?>

                                <?php else: ?>
                                    <?php echo e($purchase_line->product->unit->short_name, false); ?>

                                <?php endif; ?>

                                <?php if(!empty($purchase_line->product->second_unit) && $purchase_line->secondary_unit_quantity != 0): ?>
                                    <br>
                                    <span class="display_currency" data-is_quantity="true"
                                        data-currency_symbol="false"><?php echo e($purchase_line->secondary_unit_quantity, false); ?></span>
                                    <?php echo e($purchase_line->product->second_unit->short_name, false); ?>

                                <?php endif; ?>

                            </td>
                            
                            
                            
                            
                            
                            <td class="text-right"><span class="display_currency"
                                    data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax, false); ?></span>
                            </td>
                            
                            <td class="text-right"><span class="display_currency"
                                    data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax * $purchase_line->quantity, false); ?></span>
                            </td>
                        </tr>
                        <?php
                            $total_before_tax += $purchase_line->quantity * $purchase_line->purchase_price;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        
        <div class="col-sm-12 col-xs-12">
            
            <hr>
        </div>
        
        <br>
        <div class="col-md-6 col-sm-12 col-xs-12 <?php if($purchase->type == 'purchase_order'): ?> col-md-offset-6 <?php endif; ?>">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        
                        <td colspan="12"></td>
                        <td class="pull-right"><?php echo app('translator')->getFromJson('purchase.net_total_amount'); ?>:</td>
                        <td><span class="display_currency pull-right"
                                data-currency_symbol="true"><?php echo e($total_before_tax, false); ?></span></td>
                    </tr>
                    <tr>
                        
                        <td colspan="12"></td>
                        <td class="pull-right">
                            
                            <?php echo app('translator')->getFromJson('purchase.discount'); ?>:
                        </td>
                        <td>
                            <span class="display_currency pull-right" data-currency_symbol="true">
                                <?php if($purchase->discount_type == 'percentage'): ?>
                                    <?php echo e(($purchase->discount_amount * $total_before_tax) / 100, false); ?>

                                <?php else: ?>
                                    <?php echo e($purchase->discount_amount, false); ?>

                                <?php endif; ?>
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        
                        <td colspan="12"></td>
                        <td class="pull-right"><?php echo app('translator')->getFromJson('purchase.purchase_total'); ?>:</td>
                        <td><span class="display_currency pull-right"
                                data-currency_symbol="true"><?php echo e($purchase->final_total, false); ?></span></td>
                    </tr>
                    <tr>
                        
                        <td colspan="12"></td>
                        <td class="pull-right">Cash Tenderd:</td>
                        <td><span class="display_currency pull-right"
                                data-currency_symbol="true"><?php echo e($purchase->final_total + $purchase->change_return, false); ?></span>
                        </td>
                    </tr>
                    <tr>
                        
                        <td colspan="12"></td>
                        <td class="pull-right">Change Return:</td>
                        <td><span class="display_currency pull-right"
                                data-currency_symbol="true"><?php echo e($purchase->change_return, false); ?></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    

    
    
</div>
<?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/purchase/partials/pop_invoice.blade.php ENDPATH**/ ?>