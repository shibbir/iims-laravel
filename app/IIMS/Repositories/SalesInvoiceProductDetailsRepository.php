<?php namespace IIMS\Repositories;

use IIMS\Models\SalesInvoiceProductDetails;
use IIMS\Models\SalesInvoiceProductSerialDetails;
use IIMS\Interfaces\ISalesInvoiceProductDetailsRepository;

class SalesInvoiceProductDetailsRepository implements ISalesInvoiceProductDetailsRepository {

    public function create($model)
    {
        return SalesInvoiceProductDetails::create($model);
    }

    public function findAllByInvoiceId($invoice_id)
    {
        return SalesInvoiceProductDetails::whereInvoiceId($invoice_id)->get();
    }

    public function findAllSerialByInvoiceDetailsId($invoice_product_details_id, $product_id)
    {
        return SalesInvoiceProductSerialDetails::whereInvoiceProductDetailsIdAndProductId($invoice_product_details_id, $product_id)->get();
    }

    public function findAllByInvoiceIdWithProducts($invoice_id)
    {
        return SalesInvoiceProductDetails::with('product')->whereInvoiceId($invoice_id)->get();
    }
}