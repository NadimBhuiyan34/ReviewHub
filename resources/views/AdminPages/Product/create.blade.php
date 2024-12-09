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




         

        

       


    </section>
</x-admin-components.layout>
