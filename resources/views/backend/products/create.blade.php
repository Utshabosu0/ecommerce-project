@extends('backend.master');
@section('content')
   <div class="container">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
          <label>Category</label>
          <select class="form-control" name="category_id">
            <option value=""> Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}"> {{ $category->name ?? '' }}</option>
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
            value="{{ old('name') }}"
            placeholder="PLZ Enter Product Name"
            >

          @error('name')
            <span class="text-danger"> {{ $message }}</span>
          @enderror


          <div class="mb-3">
            <label>Color</label> <br>
            @foreach ($colors as $color)
                <input type="checkbox" name="color_id[]" value="{{ $color->id }}"/> {{ $color->title }} <br>
            @endforeach
  
          </div>

          <label>Upload Image</label>
          <input type="file" name="image" class="form-control" accept="image/*"/>

        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
   </div>
@endsection