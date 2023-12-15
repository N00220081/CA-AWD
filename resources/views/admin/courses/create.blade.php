<!-- main layout component for the page, that managed the aesthetic -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
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


                        <x-text-input
                        type="text"
                        name="  department"
                        field="department"
                        placeholder="Department"
                        class="w-full mt-6"
                        :value="@old('department')"></x-text-input>



                        <!-- this button saves the information -->
                    <x-primary-button class="mt-6">Save Course</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
