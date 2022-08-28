@extends('backend.master');


@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Well Done!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="container">

        <h5 class="text-center"> Product List </h5>
        <a class="btn btn-sm btn-primary mb-3" href="{{ route('product.create') }}">Add new Product</a>

        <div class="d-flex justify-content-end">

            <a class="btn btn-sm btn-success m-1" href="{{ route('product.pdf') }}"> PDF</a>


            <button class="btn btn-sm btn-dark m-1">EXCEL</button>
            <button class="btn btn-sm btn-warning m-1">TRASH BIN</button>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Ser No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
        
                    @foreach ($data as $product)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('product.restore', $product->id) }}">Restore</a>



                                <form action="{{ route('product.forcedelete', $product->id) }}"  method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Force Delete</button>


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