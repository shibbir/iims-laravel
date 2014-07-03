<?php namespace IIMS\Repositories;

use IIMS\Models\Sales;
use IIMS\Interfaces\ISalesRepository;
use IIMS\Interfaces\IProductRepository;
use IIMS\Interfaces\ISalesDetailsRepository;
use IIMS\Interfaces\IProductMetadataRepository;

class SalesRepository implements ISalesRepository {

    protected $productRepository;
    protected $salesDetailsRepository;
    protected $productMetadataRepository;

    function __construct(IProductRepository $productRepository, IProductMetadataRepository $productMetadataRepository, ISalesDetailsRepository $salesDetailsRepository)
    {
        $this->productRepository = $productRepository;
        $this->salesDetailsRepository = $salesDetailsRepository;
        $this->productMetadataRepository = $productMetadataRepository;
    }

    public function findAll($fields = [])
    {
        if(empty($fields)) return Sales::paginate(10);
        return Sales::paginate(10, $fields);
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
                    $productsForSale[] = $item;
                    $input['total_amount'] += $item->retail_price * $product['quantity'];
                    $item->quantity -= $product['quantity'];
                }
            }

            $input['net_payable_amount'] += $input['total_amount'];

            $salesId = Sales::create($input)->id;

            foreach($productsForSale as $product)
            {
                foreach($product->serial_numbers as $productSerial)
                {
                    $productMetadata = $this->productMetadataRepository->findProductMetadataBySerial($productSerial);

                    if($productMetadata->isAvailable)
                    {
                        $model = array (
                            'invoice_id' 	=>  $salesId,
                            'product_id' 	=>  $product->id,
                            'warranty' 		=> 	$product->warranty,
                            'selling_price' => 	$product->retail_price,
                            'serial'        =>  $productMetadata->serial
                        );
                        $this->salesDetailsRepository->create($model);

                        $this->productRepository->update($product->id, (array) $product);

                        $productMetadata->isAvailable = 0;
                        $this->productMetadataRepository->update($productMetadata->id, (array) $productMetadata);
                    }
                }
            }
        }
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
}