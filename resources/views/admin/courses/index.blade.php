<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Display a success alert message, from a previous action such as adding or updating a course. -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
          
            <!-- Display a primary button that links to the page for creating a new course. -->
            <x-primary-button style="margin-bottom: 12px;"><a href="{{ route('admin.courses.create') }}" class="btn-link btn-lg mb-2">Add a Course</a></x-primary-button>
            @forelse ($courses as $course)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <!--a link to view the course's details, with the course's name as as the link -->
                    <a href="{{ route('admin.courses.show', $course) }}" style="font-weight: bolder;">{{ $course->name }}</a>
                    </h2>

                    <p class="mt-2">
                        <h3 class="font-bold test-1x1">
                            <strong> Course Name </strong>
                            {{$student->course->name}}
                           
                        </h3>
                    </p>
                    <!-- Display course details -->
                    <p class="mt-2">
                        Address:
                        {{$course->department}}
                    </p>


                </div>

                <!-- If there are no courses in the collection, display a message indicating that theres no courses -->
            @empty
            <p>No courses</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>

