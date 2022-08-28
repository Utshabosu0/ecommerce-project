@extends('backend.master');
@section('content')
   <div class="container">
    
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="container">
        <table class="table table-bordered">
            <thead class="table-dark text-white">
                <tr>
                    <th>Ser No</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Bio</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? '' }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->email ?? '' }}</td>
                    <td>{{ $user->profile->father_name ?? '' }}</td>
                    <td>{{ $user->profile->mother_name ?? '' }}</td>
                    <td>{{ $user->profile->bio ?? '' }}</td>
                    <td>{{ $user->profile->address ?? '' }}</td>
                    <td>
                        <a class="btn btn-sm btn-success">Update</a>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection