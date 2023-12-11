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
                  
                    <x-text-input
                        type="text"
                        name="college_id"
                        placeholder="College ID"
                        class="w-full mt-6"
                        field="college_id"
                        value=""></x-text-input>

                    <x-primary-button class="mt-6">Save Student</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>