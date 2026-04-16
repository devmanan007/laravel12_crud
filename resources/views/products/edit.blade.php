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
            <a href="#" class="btn btn-dark mt-3">Back</a>
        </div>
        <div class="card p-0 mt-3">
            <div class="card-header bg-dark text-white">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body shadow-lg">
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" >
                        @error('image')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        @if(!empty($product->image) && file_exists(public_path($product->image)))
                            <img class="rounded" src="{{ asset($product->image) }}" alt="Product Image" width="150">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" value="{{ old('sku', $product->sku) }}" class="form-control @error('sku') is-invalid @enderror" id="sku" placeholder="Enter SKU" name="sku" >
                        @error('sku')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter Price" name="price" >
                        @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" >
                            <option {{ ($product->status) == 'active' ? 'selected' : '' }} value="active">Active</option>
                            <option {{ ($product->status) == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
            </div>

        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
