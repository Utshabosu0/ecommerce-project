
<h5 style="text-align: center"> Product List </h5>
<table style="border: 1px solid black">
    <thead class="table-dark">
      <tr>
        <th scope="col">Ser No</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($data as $product)
        <tr>
            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $product->name }}</td>
        </tr>    
    @endforeach

    </tbody>
  </table>

  <style>

        table {
            width: 100%;
            border-collapse: collapse
        }
        th, td {
            border: 1px solid black !important;
            border-collapse: collapse
        }


  </style>