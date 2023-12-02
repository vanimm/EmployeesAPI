<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl text-center mb-10"><b>Edit Employee:</b> {{ $employee->username }} </h1>
                    <div class="md:flex md:justify-center p-4s">
                        <livewire:edit-employee :employee="$employee" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
