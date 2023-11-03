<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <a href="{{ route('students.create') }}" class="btn-link btn-lg mb-2">Add a Book</a>
            @forelse ($students as $student)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('books.show', $book) }}">{{ $student->name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $student->address }}
                        {{$student->number}}
                        {{$student->dob}}
                       

                    </p>

                </div>
            @empty
            <p>No students</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>

