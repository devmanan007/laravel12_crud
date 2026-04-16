<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="bg-dark text-center text-white py-3">
    <h1 class="h3">Laravel 12 CRUD</h1>
</div>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-end">
            <a href="{{ route('products.create') }}" class="btn btn-dark mt-3">Create</a>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card p-0 mt-3">
            <div class="card-header bg-dark text-white">
                <h4>Products</h4>
            </div>
            <div class="card-body-shadow-lg">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th width="120" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products->count() > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if(!empty($product->image) && file_exists(public_path($product->image)))
                                            <img class="rounded" src="{{ asset($product->image) }}" alt="Product Image" width="50">
                                        @else
                                            <img class="rounded" src="https://placehold.co/50" alt="Product Image" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td><span class="badge bg-{{ $product->status == 'active' ? 'success' : 'danger' }}">{{ ucfirst($product->status) }}</span></td>
                                    <td class="text-center">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No products found.</td>
                                </tr>
                        @endif
                        <!-- <tr>
                            <td>1</td>
                            <td><img src="https://via.placeholder.com/50" alt="Product Image"></td>
                            <td>Sample Product</td>
                            <td>SP001</td>
                            <td>$19.99</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            </div>

        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
