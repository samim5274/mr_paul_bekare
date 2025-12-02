<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    public function product() {
        $category = Category::all();
        $product = Product::paginate(15);
        return view('product.product', compact('category', 'product'));
    }

    public function getSubcategory($id) {
        $subCategory = Subcategory::where('category_id', $id)->get();
        return response()->json(['subCategory' => $subCategory]);
    }


    public function addProduct(Request $request) {
        $data = new Product();

        $name = $request->input('txtProductName', '');
        $price = $request->input('txtPrice', '');
        $cat = $request->input('cbxCategory', '');
        $subCat = $request->input('cbxSubCategory', '');
        $stock = $request->input('txtStock', '');
        $size = $request->input('txtWeightSize', '');
        $manuDate = $request->input('dtpManuDate', '');
        $exDate = $request->input('dtpExpireDate', '');
        $ingredient = $request->input('txtIngredient', '');
        $description = $request->input('txtDescription', '');
        $img = $request->input('fileImage', '');
        $availability = $request->input('availability', '');
        $availabilityHidden = $request->input('availability_hidden', '');

        $fields = compact('name', 'price', 'cat', 'subCat', 'stock', 'size', 'manuDate', 'exDate', 'ingredient', 'description');
        
        if (in_array('', $fields, true)) {
            return redirect()->back()->with('error', 'Some information is missing. Please fill all information and try again. Thanks');
        }

        try{
            $data->name = $name;
            $data->category_id = $cat;
            $data->subcategory_id = $subCat;
            $data->price = $price;
            $data->stock = $stock;
            $data->description = $description;
            if(empty($availability)) {
                $data->availability = $availabilityHidden;
            } else {
                $data->availability = $availability;
            }
            $data->size = $size;
            $data->ingredients = $ingredient;
            $data->manufactured = $manuDate;
            $data->expired = $exDate;

            if ($request->hasFile('fileImage')) {
                $file = $request->file('fileImage');

                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $fileName = 'FD-' . time() . '.' . $ext;

                    $location = public_path('img/food');

                    if (!file_exists($location)) {
                        mkdir($location, 0755, true);
                    }

                    $file->move($location, $fileName);
                    $data->image = $fileName;
                }
            }
            
            $data->save();
            return redirect()->back()->with('success', 'Product added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Something is wrong.'. $e->getMessage());
        }
    }

    public function editProduct($id) {
        $data = Product::where('id', $id)->first();        
        if(empty($data)) {
            return redirect()->back()->with('warning', 'Product not fount. Please try again');
        } else {
            $category = Category::all();
            $subCategory = Subcategory::all();
            return view('product.editProduct', compact('data', 'category','subCategory'));
        }
    }

    public function updateProduct(Request $request, $id) {
        $data = Product::where('id', $id)->first();
        if(empty($data)) {
            return redirect()->back()->with('warning', 'Product not fount. Please try again');
        } else {
            $name = $request->input('txtProductName', '');
            $price = $request->input('txtPrice', '');
            $cat = $request->input('cbxCategory', '');
            $subCat = $request->input('cbxSubCategory', '');
            $stock = $request->input('txtStock', '');
            $size = $request->input('txtWeightSize', '');
            $manuDate = $request->input('dtpManuDate', '');
            $exDate = $request->input('dtpExpireDate', '');
            $ingredient = $request->input('txtIngredient', '');
            $description = $request->input('txtDescription', '');
            $img = $request->input('fileImage', '');
            $availability = $request->input('availability', '0');
            $availabilityHidden = $request->input('availability_hidden', '0');

            $fields = compact('name', 'price', 'cat', 'subCat', 'stock', 'size', 'manuDate', 'exDate', 'ingredient', 'description');
        
            if (in_array('', $fields, true)) {
                return redirect()->back()->with('error', 'Some information is missing. Please fill all information and try again. Thanks');
            }

            try{
                $data->name = $name;
                $data->category_id = $cat;
                $data->subcategory_id = $subCat;
                $data->price = $price;
                $data->stock = $stock;
                $data->description = $description;
                if(empty($availability)) {
                    $data->availability = $availabilityHidden;
                } else {
                    $data->availability = $availability;
                }
                $data->size = $size;
                $data->ingredients = $ingredient;
                $data->manufactured = $manuDate;
                $data->expired = $exDate;

                if ($request->hasFile('fileImage')) {
                    if ($data->image) {
                        $path = public_path('/img/food/' . $data->image);
                        logger("Trying to delete: " . $path);
                        if (file_exists($path)) {
                            unlink($path);
                        } else {
                            logger("File not found: " . $path);
                        }
                    }

                    $file = $request->hasFile('fileImage');
                    if ($request->hasFile('fileImage')) {
                        $file = $request->file('fileImage');

                        if ($file->isValid()) {
                            $ext = $file->getClientOriginalExtension();
                            $fileName = 'FD-' . time() . '.' . $ext;

                            $location = public_path('img/food');

                            if (!file_exists($location)) {
                                mkdir($location, 0755, true);
                            }

                            $file->move($location, $fileName);
                            $data->image = $fileName;
                        }
                    }
                } else {
                    $data->image = $data->image;
                }
                // dd($data->image);
                $data->update();
                return redirect()->route('product.view')->with('success', 'Product updated successfully.');
            } catch (Exception $e) {
                return redirect()->back()->with('warning', 'Something is wrong.'. $e->getMessage());
            }
        }
    }

    public function delete($id) {
        $data = Product::where('id', $id)->first();
        if(empty($data)) {
            return redirect()->back()->with('warning', 'Product not found. Please try again');
        } else {
            return redirect()->route('product.view')->with('success','Food was DELETED successfully.');
        }
    }

    public function stockShow(){
        $product = Product::where('stock', '<=' , 10)->paginate(20);        
        return view('product.stock', compact('product'));
    }

    public function findProduct(Request $request){
        $output = "";
        $products = Product::where('stock', '<=' , 10)
                            ->where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('id', 'like', '%'.$request->search.'%')
                            ->orWhere('sku', 'like', '%'.$request->search.'%')
                            ->get();

        foreach($products as $key => $val){
            $editProduct = url('/edit-product/'.$val->id);   
            $image = url('img/food/'.$val->image);
            $name = strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name;

            $output .= '<tr>';
            $output .= '<td>'.($key + 1).'</td>';
            $output .= '<td>';
            if ($val->image) {
                $output .= '<a href="'.$editProduct.'"><img src="'.$image.'" alt="Product Image" style="height: 60px; border-radius: 6px;"></a>';
            } else {
                $output .= '<a href="'.$editProduct.'"><span class="text-muted">No Image</span></a>';
            }
            $output .= '</td>';
            $output .= '<td><a href="'.$editProduct.'">'.$name.'</a></td>';
            $output .= '<td>'.($val->category->name ?? 'N/A').'</td>';
            $output .= '<td>'.($val->subcategory->name ?? 'N/A').'</td>';
            $output .= '<td>৳'.$val->price.'/-</td>';
            $output .= '<td>'.$val->stock.'</td>';
            $output .= '<td>'.($val->size ?? '-').'</td>';
            $output .= '<td class="text-center">';
            if ($val->availability) {
                $output .= '<span class="badge bg-success">Available</span>';
            } else {
                $output .= '<span class="badge bg-danger">Not Available</span>';
            }
            $output .= '</td>';
            $output .= '<td class="text-center" data-bs-toggle="modal" data-bs-target="#exampleModal'.$val->id.'"><span class="badge bg-primary"><i class="fa-solid fa-circle-plus"></i></span></td>';
            $output .= '</tr>';
        }

        return response($output);
    }


    public function stockIn(Request $request, $id) {
        $product = Product::where('id', $id)->first();
        if(!$product){
            return redirect()->back()->with('warning', 'Product not found. Please try again');
        }

        $product->expired = $request->dtpDate;
        $product->update();

        $product->stock += $request->input('txtStock', '');
        $stock = new Stock();
        $stock->stockIn = $request->input('txtStock', '');
        $stock->product_id = $id;
        $stock->date = Carbon::now()->format('Y-m-d');
        $stock->remark = "In from factory";
        $stock->status = 2;
        $product->update();
        $stock->save();
        return redirect()->back()->with('success','Product stock in successfully submited.');
    }

    public function productStockIn(){
        $products = Product::paginate(20);       
        return view('product.stock.stockIn', compact('products'));
    }
}
