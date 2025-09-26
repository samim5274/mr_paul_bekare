<?php

namespace App\Http\Controllers\Bercode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Picqer\Barcode\BarcodeGeneratorPNG;

use App\Models\Product;

class BercodeController extends Controller
{
    public function berCodeView(){
        $products = Product::paginate(20);
        return view('product.bercode.bercode-list', compact('products'));
    }

    public function generateBercode($product_id){
        $product = Product::where('id', $product_id)->first();
        $generator = new BarcodeGeneratorPNG();

        $product->barcode = base64_encode(
            $generator->getBarcode($product->sku, $generator::TYPE_CODE_128)
        );
        
        return view('product.bercode.product-view', compact('product'));
    }

    public function printBercode(Request $request ,$product_id){
        $product = Product::where('id', $product_id)->first();
        $generator = new BarcodeGeneratorPNG();

        $product->barcode = base64_encode(
            $generator->getBarcode($product->sku, $generator::TYPE_CODE_128)
        );
        $qty = $request->input('txtPrintQty', '');
        return view('product.bercode.print-bercode', compact('product','qty'));
    }
}
