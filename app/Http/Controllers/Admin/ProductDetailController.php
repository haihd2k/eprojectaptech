<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductDetailController extends Controller
{
    public function index()
    {
        $product_details = ProductDetail::all();
        return view('admin.product_detail.list', compact('product_details'));
    }

    public function create($id)
    {
        $product = Product::where('ID', $id)->get();
        return view('admin.product_detail.create', compact('product'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'import_price' => 'required|numeric',
            'export_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'main_img' => 'required',
            'slide_img_1' => 'required|unique:product_details',
            'slide_img_2' => 'required|unique:product_details',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required|unique:product_details',
            'size' => 'required',
            'code' => 'required|unique:product_details',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::where('ID', $id)->get();

        $slug = Str::slug($product->Name . "-" . $request->color);

        ProductDetail::create([
            'Import_Price' => $request->import_price,
            'Export_Price' => $request->export_price,
            'Sale_Price' => $request->sale_price,
            'Main_IMG' => $request->main_img,
            'Slide_IMG_1' => $request->slide_img_1,
            'Slide_IMG_2' => $request->slide_img_2,
            'Information' => $request->information,
            'Material' => $request->material,
            'Color' => $request->color,
            'Size' => $request->size,
            'Code' => $request->code,
            'Is_Trending' => $request->is_trending,
            'Is_New_Arrivals' => $request->is_arrivals,
            'Is_Feature' => $request->is_feature,
            'Product_ID' => $id,
            'Quantity' => $request->quantity,
            'Slug'=> $slug, 
        ]);

        return redirect()->route('admin.product-detail.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $products = Product::all();
        $product_detail = ProductDetail::find($id);
        return view('admin.product_detail.edit', compact('products', 'product_detail'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'import_price' => 'required|numeric',
            'export_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'main_img' => 'required',
            'slide_img_1' => 'required',
            'slide_img_2' => 'required',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required',
            'size' => 'required',
            'code' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $product_detail = ProductDetail::find($id);
        $product_id  = $product_detail->Product_ID;
        $product = Product::where('Product_ID', $product_id)->get();

        $slug = Str::slug($product->Name . "-" . $request->color);

        $old_product_detail = ProductDetail::find($id);
        $old_quantity = $old_product_detail->Quantity;
        $product_id = $old_product_detail->Product_ID;

        ProductDetail::where('ID', $id)->update([
            'Import_Price' => $request->import_price,
            'Export_Price' => $request->export_price,
            'Sale_Price' => $request->sale_price,
            'Main_IMG' => $request->main_img,
            'Slide_IMG_1' => $request->slide_img_1,
            'Slide_IMG_2' => $request->slide_img_2,
            'Information' => $request->information,
            'Material' => $request->material,
            'Color' => $request->color,
            'Size' => $request->size,
            'Code' => $request->code,
            'Is_Trending' => $request->is_trending,
            'Is_New_Arrivals' => $request->is_arrivals,
            'Is_Feature' => $request->is_feature,
            'Product_ID' => $product_id,
            'Quantity' => $request->quantity + $old_quantity,
            'Slug'=> $slug, 
        ]);
        
        return redirect()->route('admin.product-detail.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        ProductDetail::where('ID', $id)->delete();
        return redirect()->route('admin.product-detail.index')->with('success', 'Deleted Successfully');
    }
}
