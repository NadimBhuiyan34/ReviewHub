<x-admin-components.layout>
    <x-slot:title>
        AdminDashboard-ReviewHub
    </x-slot>
    <x-slot:pagetitle>
        Category
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
                        Add Category
                    </button>
                    <div class="card">

                        <div class="card-body">


                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-striped table-hover w-100 datatable mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Type</th>
 
                                        <th class="text-center" data-type="date" data-format="YYYY/DD/MM">Created At
                                        </th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $category->name }}</td>
                                            <td class="text-center">{{ $category->type }}</td>
                                        
                                            <td class="text-center">{{ $category->created_at->format('Y/m/d') }}</td>
                                            <td class="text-center">
                                                {{ $category->status ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td class="">
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#categoryModal{{ $category->id }}">
                                                    Edit
                                                </button>
                                                <!-- Edit Category Modal -->
                                                <div class="modal fade" id="categoryModal{{ $category->id }}"
                                                    tabindex="-1" aria-labelledby="categoryModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="categoryModalLabel">
                                                                    {{ isset($category) ? 'Edit Category' : 'Add New Category' }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                                                                method="POST">
                                                                @csrf
                                                                @if (isset($category))
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
                                                                        <label for="name"
                                                                            class="form-label">Category Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ old('name', isset($category) ? $category->name : '') }}"
                                                                            required>
                                                                    </div>

                                                                    <!-- Category Type -->
                                                                    <div class="mb-3">
                                                                        <label for="type"
                                                                            class="form-label">Type</label>
                                                                        <select class="form-select" id="type"
                                                                            name="type" required>
                                                                            <option value="Electronics"
                                                                                {{ old('type', isset($category) ? $category->type : '') == 'Electronics' ? 'selected' : '' }}>
                                                                                Electronics</option>
                                                                            <option value="Furniture"
                                                                                {{ old('type', isset($category) ? $category->type : '') == 'Furniture' ? 'selected' : '' }}>
                                                                                Furniture</option>
                                                                            <option value="Clothing"
                                                                                {{ old('type', isset($category) ? $category->type : '') == 'Clothing' ? 'selected' : '' }}>
                                                                                Clothing</option>
                                                                            <option value="Common"
                                                                                {{ old('type', isset($category) ? $category->type : '') == 'Common' ? 'selected' : '' }}>
                                                                                Common</option>
                                                                        </select>
                                                                    </div>

                                                                    <!-- Category Description -->
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Description</label>
                                                                        <textarea class="form-control" id="description" name="description">{{ old('description', isset($category) ? $category->description : '') }}</textarea>
                                                                    </div>

                                                                    <!-- Category Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status"
                                                                            class="form-label">Status</label>
                                                                        <select class="form-select" id="status"
                                                                            name="status">
                                                                            <option value="1"
                                                                                {{ old('status', isset($category) ? $category->status : '') == '1' ? 'selected' : '' }}>
                                                                                Active</option>
                                                                            <option value="0"
                                                                                {{ old('status', isset($category) ? $category->status : '') == '0' ? 'selected' : '' }}>
                                                                                Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ isset($category) ? 'Update Category' : 'Save Category' }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="{{ route('categories.destroy', $category->id) }}"
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
                                            <td colspan="6" class="text-center">No categories found</td>
                                        </tr>



                                    @endforelse
                                </tbody>
                            </table>


                            <div class="mt-4">
                                {{ $categories->links() }}
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
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
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
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                        </div>

                        <!-- Category Type -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="Electronics" {{ old('type') == 'Electronics' ? 'selected' : '' }}>
                                    Electronics</option>
                                <option value="Furniture" {{ old('type') == 'Furniture' ? 'selected' : '' }}>Furniture
                                </option>
                                <option value="Clothing" {{ old('type') == 'Clothing' ? 'selected' : '' }}>Clothing
                                </option>
                                <option value="Common" {{ old('type') == 'Common' ? 'selected' : '' }}>Common</option>
                            </select>
                        </div>

                        <!-- Category Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
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
