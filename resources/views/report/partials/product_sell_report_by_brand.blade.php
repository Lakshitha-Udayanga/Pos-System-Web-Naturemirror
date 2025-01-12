<div class="tab-pane" id="psr_by_brand_tab">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" 
        id="product_sell_report_by_brand" style="width: 100%;">
            <thead>
                <tr>
                    <th>@lang('product.brand')</th>
                    <th>@lang('report.current_stock')</th>
                    <th>@lang('report.total_unit_sold')</th>
                    <th>@lang('Free Stock')</th>
                    <th>@lang('Free Issues Amount')</th>
                    <th>@lang('sale.total')</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="bg-gray font-17 footer-total text-center">
                    <td><strong>@lang('sale.total'):</strong></td>
                    <td id="footer_psr_by_brand_total_stock"></td>
                    <td id="footer_psr_by_brand_total_sold"></td>
                    <td id="footer_psr_by_brand_free_total_stock"></td>
                    <td> <span class="display_currency" id="footer_psr_by_brand_free_issues_amount" data-currency_symbol ="true"></span></td>

                    <td><span class="display_currency" id="footer_psr_by_brand_total_sell" data-currency_symbol ="true"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>