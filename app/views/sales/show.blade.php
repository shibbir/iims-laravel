@extends('layouts.master')

@section('title')
    Sales Invoices Details
@stop

@section('content')
    <div>
        <h2 class="pager">SALES INVOICE</h2>
        <div class="row">
            <div class="col-xs-5">
                <dl>
                    <dd>Invoice Date: <?=$sales_invoice->created_at?></dd>
                    <dd>Invoice Number: <?=$sales_invoice->id?></dd>
                    <dd>Prepared By: {{ link_to("/users/{$sales_invoice->user->id}", $sales_invoice->user->name) }}</dd>
                    <dd>Print Date: <?php date_default_timezone_set('Asia/Dhaka');echo date("d F, Y | g:i a");?></dd>
                </dl>
            </div>
            <div class="col-xs-offset-6 col-xs-1">
                <dl>
                    <a title="printer/index/1" class="btn-print">
                        <i class="fa fa-print"></i>
                        <span>Print</span>
                    </a>
                </dl>
            </div>
        </div>
        <hr />
        <div>
            <div>
                <small>Customer Name: {{ $sales_invoice->customer->first_name }} {{ $sales_invoice->customer->last_name }}</small>
            </div>
            <div>
                <small>Contact: {{ $sales_invoice->customer->contact }}</small>
            </div>
            <div>
                <small>Address: {{ $sales_invoice->customer->address }}</small>
            </div>
        </div>

        <hr />

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="text-center">Serial</th>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Warranty</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $SL = 0;?>
                <?php foreach ($product_details as $item):?>
                    <tr>
                        <td class="text-center"><?=++$SL?></td>
                        <td>
                            <?=$item->product->title?>
                            <p>Serial Numbers:
                                <?php foreach ($item->serial_numbers as $row):?>
                                    | <?=$row->serial?>
                                <?php endforeach;?>
                            </p>
                        </td>
                        <td><?=($item->product->description ? $item->product->description : 'N/A')?></td>
                        <td class="text-center"><?=$item->quantity?></td>
                        <td class="text-center"><?=$item->warranty?></td>
                        <td class="text-center"><?=$item->selling_price?></td>
                        <td class="text-center"><?=$item->quantity * $item->selling_price?></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="6" class="text-right">Total Cost</td>
                    <td class="text-right"><?=$sales_invoice->total_amount?> Tk</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">Service Charge / Installation</td>
                    <td class="text-right"><?=$sales_invoice->service_charge?> Tk</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">VAT</td>
                    <td class="text-right"><?=$sales_invoice->vat?> Tk</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">Discount</td>
                    <td class="text-right">-<?=$sales_invoice->discount?> Tk</td>
                </tr>
                <tr>
                    <th colspan="6" class="text-right">Net Payable Amount</th>
                    <th class="text-right"><?=$sales_invoice->net_payable_amount?> Tk</th>
                </tr>
            </tbody>
        </table>
    </div>
@stop