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




        <div class="container">
            <h1>Product Managment</h1>
            
            <a href="{{route('products.create')}}" class="btn btn-sm btn-primary">Add Product</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
            </table>
        </div>

        

       


    </section>
</x-admin-components.layout>
