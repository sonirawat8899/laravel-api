@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="text-right">
          <a href="product/create" class="btn btn-dark mt-2">New Product</a>
        </div>
        <table class="table table-hover mt-3" >
        <thead>
        <tr>
        <th>Sr No.</th>
        <th>Name</th>
        <th>image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
        <td><img src="products/{{$product->image}}" class="rounded-circle" width="30" height="30" alt=""></td>
        <td>
        <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
        <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-sm">Delete</a>

      </td>
      </tr>
      @endforeach
    </tbody>
    {{$products->links()}}
     </table>

        </div>
 @endsection
</body>
</html>