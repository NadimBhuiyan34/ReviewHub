<x-admin-components.layout>
    <x-slot:title>
        AdminDashboard-ReviewHub
    </x-slot>
    <x-slot:pagetitle>
        Shop
    </x-slot>

    <section class="section dashboard">

        {{-- Success message  --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                        data-bs-target="#categoryModal">
                        Add Shop
                    </button>
                    <div class="card">

                        <div class="card-body">


                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-striped table-hover w-100 datatable mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Name</th>

                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($shops as $shop)
                                        <tr>
                                            <td class="text-center">{{ $shop->name }}</td>

                                            <td class="text-center">
                                                {{ $shop->status ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td class="">
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#categoryModal{{ $shop->id }}">
                                                    Edit
                                                </button>
                                                <!-- Edit Category Modal -->
                                                <div class="modal fade" id="categoryModal{{ $shop->id }}"
                                                    tabindex="-1" aria-labelledby="categoryModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="categoryModalLabel">
                                                                    {{ isset($shop) ? 'Edit Shop' : 'Add New Shop' }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ isset($shop) ? route('shops.update', $shop->id) : route('shops.store') }}"
                                                                method="POST">
                                                                @csrf
                                                                @if (isset($shop))
                                                                    @method('PUT')
                                                                @endif

                                                                <div class="modal-body">
                                                                    <!-- Display validation errors -->
                                                                    @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                    <li>{{ $error }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif

                                                                    <!-- Category Name -->
                                                                    <div class="mb-3">
                                                                        <label for="name" class="form-label">Barnd
                                                                            Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ old('name', isset($shop) ? $shop->name : '') }}"
                                                                            required>
                                                                    </div>

                                                                    

                                                                   
                                                                    <!-- Category Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status"
                                                                            class="form-label">Status</label>
                                                                        <select class="form-select" id="status"
                                                                            name="status">
                                                                            <option value="1"
                                                                                {{ old('status', isset($shop) ? $shop->status : '') == '1' ? 'selected' : '' }}>
                                                                                Active</option>
                                                                            <option value="0"
                                                                                {{ old('status', isset($shop) ? $shop->status : '') == '0' ? 'selected' : '' }}>
                                                                                Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ isset($shop) ? 'Update Shop' : 'Save Shop' }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="{{ route('shops.destroy', $shop->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-2"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No shop found</td>
                                        </tr>



                                    @endforelse
                                </tbody>
                            </table>


                            <div class="mt-4">
                                {{ $shops->links() }}
                            </div>

                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>



    {{-- created modal  --}}
    <!-- Modal Structure -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add New Shop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('shops.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Shop Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                        </div>

                        

                       

                        <!-- Category Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-admin-components.layout>
