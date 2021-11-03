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



</x-app-layout>
