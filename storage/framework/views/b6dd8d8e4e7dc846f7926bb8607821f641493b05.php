
		
		<div class="row">
            <div class="col-md-12">
              <?php if(!empty($transaction->contact)): ?>
                <strong><?php echo app('translator')->getFromJson('lang_v1.advance_balance'); ?>:</strong> <span class="display_currency" data-currency_symbol="true"><?php echo e($transaction->contact->balance, false); ?></span>
    
                <?php echo Form::hidden('advance_balance', $transaction->contact->balance, ['id' => 'advance_balance', 'data-error-msg' => __('lang_v1.required_advance_balance_not_available')]);; ?>

              <?php endif; ?>
            </div>
          </div>
          <?php
            
          ?>
          <div class="row payment_row">
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label("amount" , __('sale.amount') . ':*'); ?>

                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <?php echo Form::text("amount", number_format($payment_line->amount, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['id'=>'amount', 'class' => 'form-control input_number', 'required', 'placeholder' => 'Amount', 'data-msg-max-value' => __('lang_v1.max_amount_to_be_paid_is', ['amount' => $amount_formated])]);; ?>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label("paid_on" , __('lang_v1.paid_on') . ':*'); ?>

                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <?php echo Form::text('paid_on', \Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required' , 'id'=>'paid_on']);; ?>

                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label("method" , __('purchase.payment_method') . ':*'); ?>

                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <?php echo Form::select("method", $payment_types, $payment_line->method, ['class' => 'form-control select2 payment_types_dropdown', 'required', 'style' => 'width:100%;']);; ?>

                </div>
              </div>
            </div>
            <?php if(!empty($accounts)): ?>
              <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label("account_id" , __('lang_v1.payment_account') . ':'); ?>

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fas fa-money-bill-alt"></i>
                    </span>
                    <?php echo Form::select("account_id", $accounts, !empty($payment_line->account_id) ? $payment_line->account_id : '' , ['class' => 'form-control select2', 'id' => "account_id", 'style' => 'width:100%;']);; ?>

                  </div>
                </div>
              </div>
            <?php endif; ?>
            <div class="col-md-4">
              <div class="form-group">
                <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

                <?php echo Form::file('document', ['accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]);; ?>

                <p class="help-block">
                <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
              </div>
            </div>
            <div class="clearfix"></div>
              <?php echo $__env->make('transaction_payment.payment_type_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-12">
              <div class="form-group">
                <?php echo Form::label("note", __('lang_v1.payment_note') . ':'); ?>

                <?php echo Form::textarea("note", $payment_line->note, ['class' => 'form-control', 'rows' => 3]);; ?>

              </div>
            </div>
          </div>
        </div>
    
        
      <?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/sell_return/partials/payment_row.blade.php ENDPATH**/ ?>