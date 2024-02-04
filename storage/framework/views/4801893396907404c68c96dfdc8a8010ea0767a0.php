<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalTitle"> <?php echo app('translator')->getFromJson('Cheque details'); ?> (<b><?php echo app('translator')->getFromJson('Cheque Number'); ?>
                    :</b> #<?php echo e($cheque->cheque_number, false); ?>)
            </h4>
        </div>
        <div class="modal-body">
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <b><?php echo app('translator')->getFromJson('Cheque number'); ?>:</b> #<?php echo e($cheque->cheque_number, false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($cheque->cheque_date))->format(session('business.date_format')), false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('Issued date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($cheque->cheque_issued_date))->format(session('business.date_format')), false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('sale.status'); ?>:</b> <?php echo e($cheque->cheque_status, false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('Cheque type'); ?>:</b> <?php echo e($cheque->cheque_status, false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('sale.total_amount'); ?>:</b> <?php echo e(number_format($cheque->cheque_amount, 2), false); ?>

                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table bg-gray">
                            <tr class="bg-green">
                                <th>#</th>
                                <th>Invoice Date</th>
                                <th><?php echo app('translator')->getFromJson('sale.invoice_no'); ?></th>
                                <th>Invoice Total</th>
                                <th>Amount paid by cheques</th>
                                <th><?php echo app('translator')->getFromJson('sale.payment_status'); ?></th>
                            </tr>
                            <?php
                                $total = 0.00;
                            ?>
                            <?php $__currentLoopData = $cheque_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cheque_transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration, false); ?></td>
                                    <td><?php echo e($cheque_transaction->transaction_date, false); ?></td>
                                    <td><?php echo e(!empty($cheque_transaction->invoice_no)?$cheque_transaction->invoice_no:$cheque_transaction->ref_no, false); ?></td>
                                    <td><?php echo e(number_format($cheque_transaction->final_total, 2), false); ?></td>
                                    <td><?php echo e(number_format($cheque_transaction->cheque_amount, 2), false); ?></td>
                                    <td><?php echo e($cheque_transaction->payment_status, false); ?></td>
                                </tr>
                                <?php
                                    $total += $cheque_transaction->final_total;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="col-xs-12 col-md-6 col-md-offset-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th><?php echo app('translator')->getFromJson('purchase.net_total_amount'); ?>:</th>
                                <td></td>
                                <td><span class="display_currency pull-right"
                                          data-currency_symbol="true"><?php echo e($total, false); ?></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary no-print" aria-label="Print"
                    onclick="$(this).closest('div.modal-content').printThis();"><i
                        class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?>
            </button>
            <button type="button" class="btn btn-default no-print"
                    data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
        </div>
    </div>
</div><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/cheque/show.blade.php ENDPATH**/ ?>