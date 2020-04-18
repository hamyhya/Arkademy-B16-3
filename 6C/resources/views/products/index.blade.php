@extends('products.layout')
@section('content')
	


<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p id="msg">{{ $message }}</p>
</div>
@endif
<br>
<table class="table">
	<thead class="thead" style="background: #ffcc66; color: white">
		<tr>
			<th>No</th>
			<th>Cashier</th>
			<th>Product</th>
			<th>Category</th>
			<th>Price</th>
			<th width="280px">Action</th>
		</tr>
	</thead>

	@foreach ($products as $product)
	<tr id="product_id_{{ $product->id }}">
		<td>{{ $product->id }}</td>
		<td>{{ $product->cashier }}</td>
		<td>{{ $product->name }}</td>
		<td>{{ $product->category }}</td>
		<td>Rp {{ $product->price }}</td>
		<td>
			<form action="{{ route('products.destroy',$product->id) }}" method="POST">
				<a href="javascript:void(0)" class="btn btn-success" id="edit-product" data-toggle="modal" data-id="{{ $product->id }}">Edit </a>
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<a id="delete-product" data-id="{{ $product->id }}" class="btn btn-danger delete-user" style="color: white">Delete</a></td>
			</form>
		</td>
	</tr>
@endforeach

</table>
{!! $products->links() !!}
<!-- Add and Edit product modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="productCrudModal"></h4>
			</div>
			<div class="modal-body">
				<form name="custForm" action="{{ route('products.store') }}" method="POST">
				<input type="hidden" name="cust_id" id="cust_id" >
				@csrf
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
							<select  type="text" name="cashier" id="cashier" class="form-control" onchange="validate()">
								<option selected>Cashier</option>
								<option value="Raisa Andriana">Raisa Andriana</option>
								<option value="Pevita Pearce">Pevita Pearce</option>
								<option value="Ilham Bagas Saputra">Ilham Bagas Saputra</option>
							</select>
						</div>
						<div class="col-xs-14 col-sm-14 col-md-14">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control" placeholder="Product" onchange="validate()" >
							</div>
						</div>
						<div class="col-xs-14 col-sm-14 col-md-14">
							<div class="form-group">
							<select  type="text" name="category" id="category" class="form-control" onchange="validate()">
								<option selected>Category</option>
								<option value="Food">Food</option>
								<option value="Drink">Drink</option>
							</select>
							</div>
						</div>
						<div class="col-xs-14 col-sm-14 col-md-14">
							<div class="form-group">
								<input type="text" name="price" id="price" class="form-control" placeholder="Price" onchange="validate()" onkeypress="validate()">
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 text-center">
							<button type="submit" id="btn-save" name="btnsave" class="btn btn-warning" style="color: white" disabled>SUBMIT</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
<script>
	error=false

	function validate()
	{
		if(document.custForm.name.value !='' && document.custForm.cashier.value !='' && document.custForm.category.value !='' && document.custForm.price.value !='')
			document.custForm.btnsave.disabled=false
		else
			document.custForm.btnsave.disabled=true
	}
</script>