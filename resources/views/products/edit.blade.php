@extends('layouts.app')

@section('main')
    <div class="container">
     <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h3>Product Edit #{{$product->name}}</h3>
            <form action="/products/{{$product ->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                     @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}">
                    @if($errors->has('name'))
                    <span class="text-danger">{{  $errors->first('name')}}</span>
                    @endif

                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4">{{old('description',$product->description)}}</textarea>
                        @if($errors->has('description'))
                    <span class="text-danger">{{  $errors->first('description')}}</span>
                    @endif

                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file"  class="form-control" name="image">
                    @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif

                </div>
                <button type="submit" class="btn btn-dark">Submit</button>               
                </div>
            </form>
               </div>
             </div>
       

        </div>
    </div>
@endsection 