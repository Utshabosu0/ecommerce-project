

@extends('backend.master');

@section('content')

    <a class="btn btn-primary btn-sm" href="{{ route('color.index') }}"> List </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('color.update', $data->id) }}" method="POST"> 
                @csrf
                    <label>color Name</label>
                    <input
                        type="text"
                        name="title"
                        placeholder="enter your color name"
                        class="form-control"
                        value="{{ $data->title }}"
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