<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Colleges') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            <!-- alert-success is a component I created to display a success message that may be sent from the controller.
            For example, when a college is deleted, a message like "College Deleted Successfully" will be displayed -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        
            <x-primary-button>
                <a href="{{ route('admin.colleges.create') }}">Add a College</a>
            </x-primary-button>

            @forelse ($colleges as $college)
                <x-card>
                  
                        <a href="{{ route('admin.colleges.show', $college) }}" class="font-bold text-2xl">{{ $college->name }}</a>
            
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $college->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:</span> {{ $college->name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Address:</span> {{ $college->address }}
                        </p>
            
                </x-card>   
            @empty
                <p>No colleges</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>
