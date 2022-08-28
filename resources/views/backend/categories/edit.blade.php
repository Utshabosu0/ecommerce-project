

@extends('backend.master');

@section('content')

    <a class="btn btn-primary btn-sm" href="{{ route('category.index') }}"> List </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.update', $data->id) }}" method="POST"> 
                @csrf
                    <label>Category Name</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="enter your category name"
                        class="form-control"
                        value="{{ $data->name }}"
                    />

                   
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
    
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
    
    
            </form>
        </div>
        
    </div>



@endsection