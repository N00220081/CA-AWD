<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.courses.update', $course) }}" method="post" enctype="multipart/form-data">
                    <!-- A form element for updating course information -->
                    @method('put')
                    <!-- A hidden field to specify the HTTP PUT method for updating data. -->
                    @csrf
                    
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full mt-6"
                        :value="@old('name')"></x-text-input>


                        <x-text-input
                        type="text"
                        name="  department"
                        field="department"
                        placeholder="Department"
                        class="w-full mt-6"
                        :value="@old('department')"></x-text-input>

                    <x-primary-button class="mt-6">Save Course</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>