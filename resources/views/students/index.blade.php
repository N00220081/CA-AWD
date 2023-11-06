<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
          
            <x-primary-button><a href="{{ route('students.create') }}" class="btn-link btn-lg mb-2">Add a Student</a></x-primary-button>
            @forelse ($students as $student)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('students.show', $student) }}">{{ $student->name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{$student->address}}
                        {{$student->number}}
                        {{$student->dob}}
                        {{$student->college_id}}
                       
                    </p>

                </div>
            @empty
            <p>No students</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>

