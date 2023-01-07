@include('header')
@if(session('message'))
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif
<table id="product-table" class="table table-bordered">
    <thead>
        <tr class="table-active">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <th>{{ $key + 1 }}</th>
            <td>{{ $product->name }}</td>
            <td>Rs {{ $product->price }}</td>
            <td><a href="/product/show/{{ $product->id }}" class="btn btn-sm btn-primary">Buy</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        $('#product-table').DataTable();
    });
</script>

@include('footer')
