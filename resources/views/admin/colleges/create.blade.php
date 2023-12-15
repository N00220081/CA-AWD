<!-- main layout component for the page, that managed the aesthetic -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create College') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.colleges.store') }}"method="post" enctype="multipart/form-data">
                <!-- A form that leads to the action 'admin.colleges.store' route, using the POST method and allowing file uploads -->   
                @csrf
                <!-- A CSRF token for security. Protects against cross-site request forgery attacks. -->

                    <!-- text input for colleges name -->
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full mt-6"
                        :value="@old('name')"></x-text-input>


                    <!-- a text area for address -->
                    <x-textarea
                        name="address"
                        rows="4"
                        cols="50"
                        field="address"
                        placeholder="Address..."
                        class="w-full mt-6"
                        :value="@old('address')">
                    </x-textarea>
                  
                    <!-- text input for college id -->
                    <!-- <x-text-input
                        type="text"
                        name="college_id"
                        placeholder="College ID"
                        class="w-full mt-6"
                        field="college_id"
                        :value="@old('college_id')"></x-text-input> -->

                        <div class="mt-6">
                        <x-select-college name="college_id" :colleges="$colleges" :selected="old('college_id')"/>
                    </div>

                        <!-- this button saves the information -->
                    <x-primary-button class="mt-6">Save College</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
