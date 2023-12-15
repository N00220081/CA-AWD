<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course information
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>

                          <!-- Display the label Name in bold. -->
                            <tr>
                                <td class="font-bold">Student:  </td>
                                <td>{{ $student->name }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Course:  </td>
                                <!-- Display the course's name. -->
                                <td>{{ $course->name }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Department:  </td>
                                <!-- Display the course's name. -->
                                <td>{{ $course->department }}</td>
                            </tr>
                           
                           
                        </tbody>
                    </table>
                    <x-primary-button><a href="{{ route('user.courses.edit', $course)}}">Edit</a></x-primary-button>

                 
                        @csrf
                        <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
