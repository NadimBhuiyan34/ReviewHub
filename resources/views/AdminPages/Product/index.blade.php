<x-admin-components.layout>
    <x-slot:title>
        AdminDashboard - ReviewHub
    </x-slot>
    <x-slot:pagetitle>
        Product
    </x-slot>

    <section class="section dashboard">

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container">
             

            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary mb-3">Add Product</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->productDetail->image)
                                    <img src="{{ asset('storage/' . $product->productDetail->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                          
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">Show</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $products->links() }}
        </div>

    </section>
</x-admin-components.layout>
