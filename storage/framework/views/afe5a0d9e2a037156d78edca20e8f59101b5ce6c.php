<?php $__env->startSection('title', __('lang_v1.edit_stock_transfer')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson('lang_v1.edit_stock_transfer'); ?></h1>
</section>

<!-- Main content -->
<section class="content no-print">
	<?php echo Form::open(['url' => action('StockTransferController@update', [$sell_transfer->id]), 'method' => 'put', 'id' => 'stock_transfer_form' ]); ?>

	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime($sell_transfer->transaction_date))->format(session('business.date_format') . ' ' . 'h:i A'), ['class' => 'form-control', 'readonly', 'required']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', $sell_transfer->ref_no, ['class' => 'form-control', 'readonly']);; ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('status', __('sale.status').':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.completed_status_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<?php echo Form::select('status', $statuses, $sell_transfer->status, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'status']);; ?>

					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('location_id', __('lang_v1.location_from').':*'); ?>

						<?php echo Form::select('location_id', $business_locations, $sell_transfer->location_id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'id' => 'location_id', 'disabled']);; ?>

					</div>
					<div class="form-group" hidden>
						<?php echo Form::label('location_id', __('lang_v1.location_from').':*'); ?>

						<?php echo Form::select('location_id', $business_locations, $sell_transfer->location_id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'id' => 'location_id',]);; ?>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('transfer_location_id', __('lang_v1.location_to').':*'); ?>

						<?php echo Form::select('transfer_location_id', $business_locations, $purchase_transfer->location_id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'id' => 'transfer_location_id', 'disabled']);; ?>

					</div>
				</div>
				
			</div>
		</div>
	</div> <!--box end-->
	<div class="box box-solid">
		<div class="box-header">
        	<h3 class="box-title"><?php echo e(__('stock_adjustment.search_products'), false); ?></h3>
       	</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-search"></i>
							</span>
							<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_srock_adjustment', 'placeholder' => __('stock_adjustment.search_product')]);; ?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="table-responsive">
					<table class="table table-bordered table-striped table-condensed" 
					id="stock_adjustment_product_table">
						<thead>
							<tr>
								<th class="col-sm-4 text-center">	
									<?php echo app('translator')->getFromJson('sale.product'); ?>
								</th>
								<th class="col-sm-2 text-center">
									<?php echo app('translator')->getFromJson('sale.qty'); ?>
								</th>
								<th class="col-sm-2 text-center">
									<?php echo app('translator')->getFromJson('sale.unit_price'); ?>
								</th>
								<th class="col-sm-2 text-center">
									<?php echo app('translator')->getFromJson('sale.subtotal'); ?>
								</th>
								<th class="col-sm-2 text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$product_row_index = 0;
								$subtotal = 0;
							?>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('stock_transfer.partials.product_table_row', ['product' => $product, 'row_index' => $loop->index, 'sub_units' => !empty($product->unit_details) ? $product->unit_details : []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php
									$product_row_index = $loop->index + 1;
									$subtotal += ($product->quantity_ordered*$product->last_purchased_price);
								?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
						<tfoot>
							<tr class="text-center"><td colspan="3"></td><td><div class="pull-right"><b><?php echo app('translator')->getFromJson('sale.total'); ?>:</b> <span id="total_adjustment"><?php echo e(number_format($subtotal, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span></div></td></tr>
						</tfoot>
					</table>
					<input type="hidden" id="product_row_index" value="<?php echo e($product_row_index, false); ?>">
					</div>
				</div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
							<?php echo Form::label('shipping_charges', __('lang_v1.shipping_charges') . ':'); ?>

							<?php echo Form::text('shipping_charges', number_format($sell_transfer->shipping_charges, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'placeholder' => __('lang_v1.shipping_charges')]);; ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('additional_notes',__('purchase.additional_notes')); ?>

						<?php echo Form::textarea('additional_notes', $sell_transfer->additional_notes, ['class' => 'form-control', 'rows' => 3]);; ?>

					</div>
				</div>
			</div>
			<?php
				$final_total = $subtotal + $sell_transfer->shipping_charges;
			?>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" id="total_amount" name="final_total" value="<?php echo e($sell_transfer->final_total, false); ?>">
					<b><?php echo app('translator')->getFromJson('stock_adjustment.total_amount'); ?>:</b> <span id="final_total_text"><?php echo e(number_format($final_total, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
				</div>
				<br>
				<br>
				<div class="col-sm-12">
					<button type="submit" id="save_stock_transfer" class="btn btn-primary pull-right"><?php echo app('translator')->getFromJson('messages.save'); ?></button>
				</div>
			</div>

		</div>
	</div> <!--box end-->
	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_transfer.js?v=' . $asset_v), false); ?>"></script>
	<script type="text/javascript">
		__page_leave_confirmation('#stock_transfer_form');
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/stock_transfer/edit.blade.php ENDPATH**/ ?>