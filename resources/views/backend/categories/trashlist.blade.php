@extends('backend.master');

@section('content')


   <div class="container">

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Well Done!</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-sm mb-3" href="{{ route('category.create') }}"> Add New Category</a>

                <a class="btn btn-sm btn-warning mb-3" href="{{ route('category.index') }}"> Item List</a>
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ser No</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('category.restore', $category->id) }}">Restore</a>
                                            

                                            <form action="{{ route('category.delete', $category->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete?')">Delete</button>
                                        </form>



                                        </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>

                    </table>



            </div>
        </div>

   </div>

@endsection