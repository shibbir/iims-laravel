<?php namespace IIMS\Repositories;

use IIMS\Models\Sales;
use IIMS\Interfaces\ISalesRepository;
use IIMS\Interfaces\ICustomerRepository;
use IIMS\Interfaces\IProductRepository;
use IIMS\Interfaces\ISalesDetailsRepository;

class SalesRepository implements ISalesRepository {

    protected $customerRepository;
    protected $productRepository;
    protected $salesDetailsRepository;

    function __construct(ICustomerRepository $customerRepository, IProductRepository $productRepository, ISalesDetailsRepository $salesDetailsRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
        $this->salesDetailsRepository = $salesDetailsRepository;
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
        $customerId = $input['customer_id'];
        $productsListViewModel = $input['products'];
        $productsForSale = [];

        if($customerId && $productsListViewModel)
        {
            $input['total_amount'] = $input['vat'] + $input['service_charge'];
            $input['net_payable_amount'] = $input['total_amount'] - $input['discount'];

            $customer = $this->customerRepository->find($customerId, ['id']);

            if($customer)
            {
                foreach($productsListViewModel as $product)
                {
                    $item = $this->productRepository->find($product['id'], ['id', 'retail_price', 'warranty', 'quantity']);

                    if($item && $item->quantity)
                    {
                        $productsForSale[] = $item;
                        $input['total_amount'] += $item->retail_price * $product['quantity'];
                        $item->quantity -= $product['quantity'];
                    }
                }

                $salesId = Sales::create($input)->id;

                if($salesId)
                {
                    foreach($productsForSale as $product)
                    {
                        $productId = $product->id;

                        $model = array (
                            'invoice_id' 	=>  $salesId,
                            'product_id' 	=>  $productId,
                            'warranty' 		=> 	$product->warranty,
                            'selling_price' => 	$product->retail_price,
                            'serial'        =>  'N/A'
                        );
                        $this->salesDetailsRepository->create($model);

                        $product = (array) $product;

                        $this->productRepository->update($productId, $product);
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