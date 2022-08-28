<table>
    <thead>
    <tr>
        <th>Ser No</th>
        <th>Product Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $product->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>