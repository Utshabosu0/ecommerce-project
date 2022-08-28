@extends('backend.master');
@section('content')
   <div class="container">
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label>Category</label>
          <select class="form-control" name="category_id">
            <option value=""> Select Category</option>
            @foreach ($categories as $category)

              @if ($category->id == $product->category_id)
                <option value="{{ $category->id }}" selected> {{ $category->name ?? '' }}</option>
                @else
                <option value="{{ $category->id }}"> {{ $category->name ?? '' }}</option>


              @endif

            @endforeach



          </select>

        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input 
            type="text" 
            class="form-control" 
            id="name" 
            name="name"
            value="{{ $product->name }}"
            placeholder="PLZ Enter Product Name"
            >
        </div>


        <div class="mb-3">
          <label>Color</label> <br>
          @foreach ($colors as $color)
              <input type="checkbox" name="color_id[]" value="{{ $color->id }}" {{ (in_array($color->id, $selectedColors)) ? "checked" : "" }}/> 
              
              {{ $color->title }} <br>
          @endforeach

        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Product Image</label>
          <input 
            type="file" 
            class="form-control" 
            id="image" 
            name="image"

            >
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
      </form>
   </div>
@endsection