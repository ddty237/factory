<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporting des produits') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('produit.index') }}">
                        {{ __('Back to reporting') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="flex justify-center items-center mt-3">
        <div class="bg-green-100 p-5 w-full sm:w-1/2 rounded">
            <div class="flex justify-between">
            <div class="flex space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-500 h-8 w-8">
                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z" /></svg>
                <div class="flex-1 mt-0.5 text-xl text-green-700 font-medium">Show product and test this controller</div>
    </div>
</x-app-layout>
