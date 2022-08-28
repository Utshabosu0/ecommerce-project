

@extends('backend.master');

@section('content')
    <a class="btn btn-primary btn-sm" href="{{ route('category.index') }}"> List </a>
    <div class="card">
        <div class="card-body">
            Category: 
            Name: {{ $category->name }}
           <br>
            Products List: 

            @foreach ($category->products as $product)
                <li> {{  $product->name }}</li>
            @endforeach


        </div>
        
    </div>



@endsection