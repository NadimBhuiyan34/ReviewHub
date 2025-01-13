<x-admin-components.layout>
    <x-slot:title>
        AdminDashboard - ReviewHub
    </x-slot>
    <x-slot:pagetitle>
        Slider
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
                    <h4 class="mb-0">Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
        
                        <!-- Product Table Fields -->
                        <h5 class="text-secondary">Product Information</h5>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                            <div class="invalid-feedback">
                                Please provide a product name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select class="form-select" id="brand_id" name="brand_id" required>
                                <option value="" disabled selected>Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a brand.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="shop_id" class="form-label">Shop</label>
                            <select class="form-select" id="shop_id" name="shop_id" required>
                                <option value="" disabled selected>Select a shop</option>
                                @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a shop.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a category.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Type</label>
                            <select class="form-select" id="type_id" name="type" required>
                                <option value="" disabled selected>Select a Type</option>
                                <option value="Featured" >Featured</option>
                                <option value="Popular" >Popular</option>
                                <option value="Best Seller" >Best Seller</option>
                               
                            </select>
                            <div class="invalid-feedback">
                                Please select a type.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
                            <div class="invalid-feedback">
                                Please provide the stock quantity.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a status.
                            </div>
                        </div>
        
                        <!-- Product Details Table Fields -->
                        <h5 class="text-secondary mt-4">Product Details</h5>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Enter price" required>
                            <div class="invalid-feedback">
                                Please provide a price.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description" required></textarea>
                            <div class="invalid-feedback">
                                Please provide a description.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="model_no" class="form-label">Model Number</label>
                            <input type="text" class="form-control" id="model_no" name="model_no" placeholder="Enter model number" required>
                            <div class="invalid-feedback">
                                Please provide a model number.
                            </div>
                        </div>
        
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <div class="form-text">Optional: Upload a product image.</div>
                        </div>
        
                        <div class="mb-3">
                            <label for="website_url" class="form-label">Website URL</label>
                            <input type="url" class="form-control" id="website_url" name="website_url" placeholder="Enter website URL">
                            <div class="form-text">Optional: Provide a related website link.</div>
                        </div>
        
                        
                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
            document.getElementById('addVariant').addEventListener('click', function () {
                const variantGroup = `
                    <div class="mb-3">
                        <label for="variant_type" class="form-label">Variant Type</label>
                        <input type="text" class="form-control" name="variant_type[]" placeholder="e.g., Color, Size">
                    </div>
                    <div class="mb-3">
                        <label for="variant_value" class="form-label">Variant Value</label>
                        <input type="text" class="form-control" name="variant_value[]" placeholder="e.g., Red, Medium">
                    </div>`;
                this.insertAdjacentHTML('beforebegin', variantGroup);
            });
        </script>
        









    </section>
    <style>
        .card {
            border-radius: 15px;
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
        }
    </style>
    
</x-admin-components.layout>
