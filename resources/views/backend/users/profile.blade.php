@extends('backend.master');
@section('content')
   <div class="container">
    
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="card">
        <div class="card-header">User Profile</div>
        <div class="card-body">

            <h6> User Information</h6>
            Name:   {{ auth()->user()->name }}

            <h6 class="mt-3">Profile Information</h6>

            <form action="{{ route('user.profile_update')  }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <label> Name</label>
                <input 
                    type="text"  
                    name="name" 
                    value="{{ auth()->user()->name ?? '' }}"
                    class="form-control"
                    
                    />

                <label> Father Name</label>
                <input 
                    type="text"  
                    name="father_name" 
                    value="{{ $userProfile->father_name ?? '' }}"
                    class="form-control"
                    
                    />


                <button type="submit"  class="mt-4 btn btn-sm btn-primary">Update Profile</button>


            </form>


        </div>
    </div>


   </div>
@endsection