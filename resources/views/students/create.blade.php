<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>

                    <x-text-input
                        type="date"
                        name="date of birth"
                        field="Date of birth"
                        placeholder="date of birth..."
                        class="w-full mt-6"
                        :value="@old('category')"></x-text-input>

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea
                        name="address"
                        rows="4"
                        cols="50"
                        field="address"
                        placeholder="Address..."
                        class="w-full mt-6"
                        :value="@old('address')">
                    </x-textarea>
                  
                    <x-file-input
                        type="text"
                        name="college_id"
                        placeholder="College id"
                        class="w-full mt-6"
                        field="college_id"
                        :value="@old('college_id')">>
                    </x-file-input>

                    <x-primary-button class="mt-6">Save Student</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
