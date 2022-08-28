@extends('backend.master');

@section('content')


   <div class="container">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Well Done!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Well Done!</strong> {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary btn-sm mb-3" href="{{ route('category.create') }}"> Add New Category</a>

                <a class="btn btn-sm btn-warning mb-3" href="{{ route('category.trashlist') }}"><i class="fa-solid fa-trash-can"></i> Trash BIn</a>


               <form class="d-flex" action="" method="GET">
                <input name="keyword" class="form-control" placeholder="Search...."/> 
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa fa-search"></i>
                    Search
                </button>
               </form>

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
                                            <a class="btn btn-sm btn-primary">show</a>
                                            <a class="btn btn-sm btn-success"  href="{{ route('category.edit', $category->id) }}">Edit</a>

                                            <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete?')">Delete</button>

                                                <a href="{{ route('categories.products', $category->id) }}">Products</a>
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