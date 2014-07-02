<?php

class ProductMetadataController extends \BaseController {

    public function verify($product_id, $serial)
    {
        $product_metadata = DB::table('product_metadata')->where('product_id', $product_id)->where('serial', $serial)->where('isAvailable', '!=', 0)->first();

        if($product_metadata && !empty($product_metadata)) {
            return Response::json($product_metadata, 200);
        }
        else return Response::json('Invalid serial number', 404);
    }
}