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
            <h1>Slider Management</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add Slider</button>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->title }}</td>
                            <td><img src="{{ asset('storage/' . $slider->image) }}" alt="Image" width="100"></td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal-{{ $slider->id }}">Edit</button>
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data"
                        class="p-3 shadow rounded">
                        @csrf
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title fw-bold">Add New Slider</h5>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Slider Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title"
                                    placeholder="Enter slider title" required>
                                <small class="text-muted">The title should be descriptive and concise.</small>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label fw-semibold">Upload Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" name="image"
                                    accept="image/*" required>
                                <small class="text-muted">Supported formats: JPG, JPEG, PNG (Max: 2MB).</small>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Enter a brief description (optional)"></textarea>
                                <small class="text-muted">Add any additional details about the slider.</small>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary fw-bold">Save Slider</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Edit Modals -->
        @foreach ($sliders as $slider)
            <div class="modal fade" id="editModal-{{ $slider->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('sliders.update', $slider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Slider</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $slider->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description">{{ $slider->description }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach



    </section>
</x-admin-components.layout>
