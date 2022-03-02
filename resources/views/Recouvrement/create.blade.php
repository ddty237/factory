<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Création des données de recouvrement') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('recovery.index') }}">
                        {{ __('back to reporting') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>
</x-app-layout>
