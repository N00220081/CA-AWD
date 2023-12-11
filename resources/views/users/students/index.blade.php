<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Display a success alert message, from a previous action such as adding or updating a student. -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
          
            <!-- Display a primary button that links to the page for creating a new student. -->
            
            @forelse ($students as $student)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <!--a link to view the student's details, with the student's name as as the link -->
                    <a href="{{ route('user.students.show', $student) }}" style="font-weight: bolder;">{{ $student->name }}</a>
                    </h2>
                    <p class="mt-2">
                        <h3 class="font-bold test-1x1">
                            <strong> College Name </strong>
                            {{$student->college->name}}
                            {{$student->description}}


                        </h3>
                    </p>
                    <!-- Display student details -->
                    <p class="mt-2">
                        Address:
                        {{$student->address}}
                    </p>
                    <p class="mt-2">
                        Phone number:
                        {{$student->number}}
                    </p>

                    <p class="mt-2">
                        Date of birth:
                        {{$student->dob}}  
                    </p>

                    <p class="mt-2">
                        College ID:
                        {{$student->college_id}}
                       
                    </p>

                </div>

                <!-- If there are no students in the collection, display a message indicating that theres no students -->
            @empty
            <p>No students</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>

