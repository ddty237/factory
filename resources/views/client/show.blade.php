<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container bg-white border-gray-200 px-4 pt-16 pb-6">
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Previsualisation d'un client</h1>
                        <p class="text-2xl text-center mt-4 mb-4">
                            {{$client->designation}}
                        </p>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
