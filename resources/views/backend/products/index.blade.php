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


            <a class="btn btn-sm btn-dark m-1" href="{{ route('product.excel') }}">download EXCEL</a>

            <a class="btn btn-sm btn-warning m-1" href="{{ route('product.trashlist') }}">TRASH BIN</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="datatablesSimple">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Ser No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Colors</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
        
                    @foreach ($data as $product)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? ' No Category' }}</td>
                            <td>
                                @foreach ($product->colors as $color)
                                    <li>{{ $color->title ?? '' }}</li>
                                @endforeach
                            </td>
                            <td>
                                @if(file_exists(storage_path().'/app/public/products/'.$product->image ) && (!is_null($product->image)))

                                <img src="{{ asset('storage/products/'.$product->image) }}" height="100">

                                @else
                                    <span> Image Nai</span>
                                @endif

                            </td>

                            <td>
                                <button class="btn btn-sm btn-primary">Show</button>

                                @can('product_edit')
                                <a class="btn btn-sm btn-warning"  href="{{ route('product.edit', $product->id) }}">Edit</a>
                                @endcan

                            
                                @can('product_delete')
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Delete</button>


                                </form>
                                @endcan


                                


                            </td>
                        </tr>    
                    @endforeach
        
                    </tbody>
                  </table>
        
            </div>
        </div>
    </div>


@endsection