<?php namespace IIMS\Repositories;

use IIMS\Models\Sales;
use IIMS\Models\SalesInvoiceProductSerialDetails;
use IIMS\Interfaces\ISalesRepository;
use IIMS\Interfaces\IProductRepository;
use IIMS\Interfaces\ISalesInvoiceProductDetailsRepository;
use IIMS\Interfaces\IProductMetadataRepository;
use Illuminate\Support\Facades\Auth;

class SalesRepository implements ISalesRepository {

    protected $productRepository;
    protected $salesInvoiceProductDetailsRepository;
    protected $productMetadataRepository;

    function __construct(IProductRepository $productRepository,
                         IProductMetadataRepository $productMetadataRepository,
                         ISalesInvoiceProductDetailsRepository $salesInvoiceProductDetailsRepository)
    {
        $this->productRepository = $productRepository;
        $this->salesInvoiceProductDetailsRepository = $salesInvoiceProductDetailsRepository;
        $this->productMetadataRepository = $productMetadataRepository;
    }

    public function findAll($fields = [])
    {
        if(empty($fields)) return Sales::with('customer', 'user')->paginate(10);
        return Sales::with('customer', 'user')->paginate(10, $fields);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Sales::findOrFail($id);
        return Sales::findOrFail($id, $fields);
    }

    public function create($input)
    {
        $productsListViewModel = $input['products'];
        $productsForSale = [];

        if($productsListViewModel)
        {
            $input['total_amount'] = 0;
            $input['net_payable_amount'] = ($input['vat'] + $input['service_charge']) - $input['discount'];

            foreach($productsListViewModel as $product)
            {
                $item = $this->productRepository->find($product['id'], ['id', 'retail_price', 'warranty', 'quantity']);

                if($item && ($item->quantity >= $product['quantity']))
                {
                    $item->serial_numbers = $product['serial_numbers'];
                    $input['total_amount'] += $item->retail_price * $product['quantity'];
                    $item->selectedQuantity = $product['quantity'];
                    $productsForSale[] = $item;
                }
            }

            $input['net_payable_amount'] += $input['total_amount'];

            $sales = array(
                'service_charge'     => $input['service_charge'],
                'discount'           => $input['discount'],
                'vat'                => $input['vat'],
                'total_amount'       => $input['total_amount'],
                'net_payable_amount' => $input['net_payable_amount'],
                'customer_id'        => $input['customer_id'],
                'created_by'         => Auth::user()->getId()
            );

            $salesId = Sales::create($sales)->id;

            foreach($productsForSale as $product)
            {
                $salesInvoiceProductDetails = array (
                    'invoice_id' 	=> $salesId,
                    'product_id' 	=> $product->id,
                    'warranty' 		=> $product->warranty,
                    'selling_price' => $product->retail_price,
                    'quantity'      => $product->selectedQuantity
                );
                $salesInvoiceProductDetailsId = $this->salesInvoiceProductDetailsRepository->create($salesInvoiceProductDetails)->id;

                foreach($product->serial_numbers as $productSerial)
                {
                    $productMetadata = $this->productMetadataRepository->findProductMetadataBySerial($productSerial);

                    if($productMetadata->is_available)
                    {
                        $model = array (
                            'invoice_product_details_id' => $salesInvoiceProductDetailsId,
                            'product_id' 	             => $productMetadata->product_id,
                            'serial' 		             => $productMetadata->serial
                        );

                        SalesInvoiceProductSerialDetails::create($model);

                        $this->productRepository->updateQuantity($product->id, $product->quantity - $product->selectedQuantity);
                        $this->productMetadataRepository->updateIsAvailableInProductMetadata($productMetadata->id, 0);
                    }
                }
            }
            return $salesId;
        }
        return 0;
    }

    public function update($id, $model)
    {
        $sales_invoice = Sales::findOrFail($id);
        $sales_invoice->fill($model);

        $sales_invoice->save();
    }

    public function delete($id)
    {
        $sales_invoice = Sales::find($id);
        $sales_invoice->delete();
    }

    public function findByCustomerId($customer_id)
    {
        return Sales::with('user')->whereCustomerId($customer_id)->paginate(15);
    }
}