<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Brand;
use App\Product;
use Yajra\Datatables\Datatables;	

class InventoryController extends Controller
{
    //store a  Brand
    public function saveBrand(Request $request)
    {

    	$brand = new Brand;

    	$exists = DB::table('brands')->where('name',$request->name)->first();

    	if($exists)
    	{
    		return response()->json(['sucess'=>true,'msg'=>'Already Exists !']);
    	}
    	else
    	{   

    		$brand::create(

    			[
    				'name' => $request->name,
    				'status' => '1'
    			]
    		);
    		
    		return response()->json(['success'=>true,'msg'=>'Successfully created']);
    	}
    }
    //store a Category
    public function saveCategory(Request $request)
    {
    	$category = new Category;

    	$exists = DB::table('categories')->where('name',$request->name)->first();

    	if($exists)
    	{
    		return response()->json(['success'=>true,'msg'=>'Already exists !']);
    	}
    	else
    	{
    		$category::create(

    			[
    				'name' => $request->name,
    				'parent_category' => $request->parent,
    				'status' => '1'
    			]
    		);
    		return response()->json(['success'=>true,'msg'=>'Successfully created']);
    	}
    }
    // store a Product
    public function saveProduct(Request $request)
    {

    	$product = new Product;

    	$exists = DB::table('products')->where('name',$request->name)->first();

    	if($exists)
    	{
    		return response()->json(['success'=>true,'msg'=>'Already Exists!']);
    	}
    	else
    	{   
             
    		$product::create(

    			[
    				'name' => $request->name,
    				'category' => $request->category,
    				'brand' => $request->brand,
    				'price' => $request->price,
    				'quantity' => $request->quantity,
    				'status' => '1'
    			]
    		);

    		return response()->json(['success'=>true,'msg'=>'Successfully created !']);
    	}
    }

    public static function getAllBrandName()
    {
    	$brands = DB::table('brands')->select('name')->get();

    	return $brands;
    }

    public static function getAllCategoryName()
    {
    	$categories = DB::table('categories')->select('name')->get();

    	return $categories;
    }
    public function getCategories()
    {
    	
    	$categories = Category::all();

        $returnHtml = view('category.all',['table'=>$categories])->render();
        return response()->json(['html'=>$returnHtml]);
        
    }
    public function getBrands()
    {

    	$brands = Brand::all();

        $returnHtml = view('brand.all',['table'=>$brands])->render();
        return response()->json(['html'=>$returnHtml]);
    }


    public function getProducts()
    {

    	$products = Product::all();

        $returnHtml = view('product.all',['table'=>$products])->render();
        return response()->json(['html'=>$returnHtml]);
    }
    

}
