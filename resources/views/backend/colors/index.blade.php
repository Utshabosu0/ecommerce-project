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
                <a class="btn btn-primary btn-sm mb-3" href="{{ route('color.create') }}"> Add New color</a>

                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ser No</th>
                                    <th>color Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $color)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $color->title }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary">show</a>
                                            <a class="btn btn-sm btn-success"  href="{{ route('color.edit', $color->id) }}">Edit</a>

                                            <form action="{{ route('color.destroy', $color->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete?')">Delete</button>

                                                <a href="{{ route('categories.products', $color->id) }}">Products</a>
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