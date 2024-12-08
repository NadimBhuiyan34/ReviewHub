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
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#sliderModal">
                Add Slider
            </button>

            <!-- Shared Modal for Add/Edit -->
            @include('AdminPages.Partials.Slider.slidemodal')

            <!-- Sliders Table -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $slider->title }}</td>
                                <td><img src="{{ asset('storage/' . $slider->image) }}" alt="" style="width: 80px;"></td>
                                <td>{{ $slider->status ? 'Active' : 'Inactive' }}</td>
                                <td>{{ $slider->order }}</td>
                                <td>
                                    <!-- Edit Button that passes the Edit URL -->
                                    <button class="btn btn-success btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#sliderModal"
                                        onclick="populateEdit('{{ route('sliders.edit', $slider->id) }}')">
                                        Edit
                                    </button>
                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-components.layout>

<script>
function populateEdit(editUrl) {
    // Set form action to Edit URL
    const form = document.getElementById('sliderForm');
    form.action = editUrl;
}
</script>
