

@extends('backend.master');

@section('content')

    <a class="btn btn-primary btn-sm" href="{{ route('color.index') }}"> List </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('color.store') }}" method="POST"> 
                @csrf
                    <label>color Name</label>
                    <input
                        type="text"
                        name="title"
                        placeholder="enter your color name"
                        class="form-control"
                        value="{{ old('name') }}"
                    />

                    Is Active
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
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