<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.students.update', $student) }}" method="post" enctype="multipart/form-data">
                    <!-- A form element for updating student information -->
                    @method('put')
                    <!-- A hidden field to specify the HTTP PUT method for updating data. -->
                    @csrf
                    
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        value=""></x-text-input>

                    <x-text-input
                        type="date"
                        name="dob"
                        field="dob"
                        placeholder="Date of Birth"
                        class="w-full mt-6"
                        value=""></x-text-input>

                    <x-text-input
                        type="text"
                        name="number"
                        field="number"
                        placeholder="Number"
                        class="w-full mt-6"
                        value=""></x-text-input>

                    <x-textarea
                        name="address"
                        rows="4"
                        cols="50"
                        field="address"
                        placeholder="Address..."
                        class="w-full mt-6"
                        value="">
                    </x-textarea>
                  
                    
                    <div class="mt-6">
                        <x-select-college name="college_id" :colleges="$colleges" :selected="old('college_id')"/>
                    </div>

                    <div class="form-group">
                        <label for="courses" ><strong>Courses</strong><br></label>
                        @foreach($courses as $course)
                        <input type="checkbox", value="{{$course->id}}" name="courses[]">
                        {{$course->name}}
                        @endforeach 
                    </div>

                    <x-primary-button class="mt-6">Save Student</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>