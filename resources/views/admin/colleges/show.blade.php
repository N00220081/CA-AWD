<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $college->name }} - Students
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="font-bold text-2x1 mb-4">College Details</h3>
    	    <p class="text-gray-700"><span class="font-bold">ID: </span>{{ $college->id }}</p>
    	    <p class="text-gray-700"><span class="font-bold">Name: </span>{{ $college->name }}</p>
    	    <p class="text-gray-700"><span class="font-bold">Address: </span>{{ $college->address }}</p>

            <!-- Display students from the college they're in -->
            <h3 class="font-bold text-2x1 mt-6 mb-4">Students in {{ $college->name }}</h3>

            @forelse ($students as $student)
            <x-card>
                <a href="{{ route('admin.students.show', $student}}" class="font-bold text-2x1">{{ $student->name }}</a>
            </x-card>
            @empty
            <p>No students from this college</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>
