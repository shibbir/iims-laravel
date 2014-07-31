<?php namespace IIMS\Interfaces;

interface ISalesInvoiceProductDetailsRepository {

    public function create($input);
    public function findAllByInvoiceId($invoice_id);
    public function findAllByInvoiceIdWithProducts($invoice_id);
    public function findAllSerialByInvoiceDetailsId($invoice_product_details_id, $product_id);
}