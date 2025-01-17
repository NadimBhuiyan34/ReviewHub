<x-admin-components.layout>
    <x-slot:title>
        AdminDashboard - ReviewHub
    </x-slot>
    <x-slot:pagetitle>
        Product Details
    </x-slot>

    

    <section class="section dashboard">
        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container py-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">View Product Details</h4>
                </div>
                <div class="card-body">
                    <!-- Product Table Fields -->
                    <h5 class="text-secondary">Product Information</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $product->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand_id" value="{{ $product->brand->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="shop_id" class="form-label">Shop</label>
                        <input type="text" class="form-control" id="shop_id" value="{{ $product->shop->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category_id" value="{{ $product->category->name }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type_id" value="{{ $product->type }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" value="{{ $product->stock }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" value="{{ ucfirst($product->status) }}" disabled>
                    </div>

                    <!-- Product Details Table Fields -->
                    <h5 class="text-secondary mt-4">Product Details</h5>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" value="{{ $product->productDetail->price }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="4" disabled>{{ $product->productDetail->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="model_no" class="form-label">Model Number</label>
                        <input type="text" class="form-control" id="model_no" value="{{ $product->productDetail->model_no }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        @if ($product->productDetail->image)
                            <img src="{{ asset('storage/' . $product->productDetail->image) }}" class="img-thumbnail" alt="Product Image">
                        @else
                            <p class="text-muted">No image available</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="website_url" class="form-label">Website URL</label>
                        <input type="text" class="form-control" id="website_url" value="{{ $product->productDetail->website_url }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back</a>
    </section>

    <style>
        .card {
            border-radius: 15px;
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control:focus {
            box-shadow: none;
        }
    </style>
</x-admin-components.layout>
