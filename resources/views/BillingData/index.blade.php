<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporting des données de facturation') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('billingData.create') }}">
                        {{ __('Create Data billing') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class=" bg-white border-gray-200 px-3 pt-16 pb-6">
                    <p class="text-2xl text-center mt-4 mb-4">
                        Reporting des données de facturation
                    </p>
                    <livewire:data_facturation/>
            </div>
        </div>
    </div>

</x-app-layout>
