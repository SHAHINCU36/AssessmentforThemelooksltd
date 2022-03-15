<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_Category;

class productsController extends Controller
{

    protected $subCategories;
    protected $product;
    public function index(){

        return view('admin.products.manage_product',['products'=>Product::all(),
        ]);

    }



    public function create(){
        return view('admin.products.addproduct', [
            'categories' => Category::all(),
            'subCategories' => Sub_Category::all(),

        ]);

    }
    public function getSubCategoryId ()
    {
        $this->subCategories = Sub_Category::where('category_id', $_GET['id'])->get();
        return json_encode($this->subCategories);
    }


    public function store(Request $request){

        $request->validate([

            'name' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'color' => ['required'],
            'size' => ['required'],
            'price' => ['required'],

        ]);

        $this->product = new Product();
        $this->product->name = $request->name;
        $this->product->category_id = $request->category_id;
        $this->product->sub_category_id = $request->sub_category_id;
        $this->product->color = $request->color;
        $this->product->size = $request->size;
        $this->product->price = $request->price;
        $this->product->save();

        return redirect()->route('addproducts')->with('message',' product add successfully.');

    }

    public function ShowProductById($id)
    {
         $products=Product::find($id);
        return view('admin.products.viewproduct',compact('products'));

    }
    public function EditProductById($id)
    {
        return view('admin.products.editproduct',[
            'editproducts'=> Product::find($id),
            'categories' => Category::all(),
            'subCategories' => Sub_Category::all(),

        ]);

    }


    public function Update(Request $request ,$id){


       $this->product =Product::find($id);
        $this->product->name = $request->name;
        $this->product->category_id = $request->category_id;
        $this->product->sub_category_id = $request->sub_category_id;
        $this->product->color = $request->color;
        $this->product->size = $request->size;
        $this->product->price = $request->price;
        $this->product->save();

        return redirect()->route('manage_products')->with('message',' product update successfully.');



    }
    public function DeleteProductById($id)
    {

        $products = Product::find($id);
        $products->delete();
        return redirect()->route('manage_products')->with('message', 'product deleted successfully.');

    }


}
