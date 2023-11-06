<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student information
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
                          
                            <tr>
                                <td class="font-bold">Name  </td>
                                <td>{{ $student->name }}</td>
                            </tr>
                           
                            <tr>
                                <td class="font-bold">Address </td>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Number </td>
                                <td>{{ $student->number }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Date of Birth </td>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">College_id </td>
                                <td>{{ $student->college_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <x-primary-button><a href="{{ route('students.edit', $student)}}">Edit</a></x-primary-button>

                    <form action="{{ route('students.destroy', $student) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>