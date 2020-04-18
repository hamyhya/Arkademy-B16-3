<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Redirect,Response;
class ProductController extends Controller
{

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function index()
	{
		$products = Product::latest()->paginate(4);
		return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 4);
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create()
	{
		return view('products.create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

	public function store(Request $request)
	{

		$r=$request->validate([
		'name' => 'required',
		'cashier' => 'required',
		'category' => 'required',
		'price' => 'required',
		]);

		$custId = $request->cust_id;
		product::updateOrCreate(['id' => $custId],['name' => $request->name, 'cashier' => $request->cashier,'category'=>$request->category,'price'=>$request->price ]);
		if(empty($request->cust_id))
			$msg = 'Product entry created successfully.';
		else
			$msg = 'Product data is updated successfully';
		return redirect()->route('products.index')->with('success',$msg);
	}

	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function show(product $product)
	{
		return view('products.show',compact('product'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	
	public function edit($id)
	{
		$where = array('id' => $id);
		$product = product::where($where)->first();
		return Response::json($product);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request)
	{

	}

	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function destroy($id)
	{
		$cust = product::where('id',$id)->delete();
		return Response::json($cust);
	}
}