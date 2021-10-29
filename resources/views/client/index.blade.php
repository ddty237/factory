<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporting des clients') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('client.create') }}">
                        {{ __('Create client') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                    <div class=" bg-white border-gray-200 px-3 pt-16 pb-6">
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Module Client</h1>
                        <p class="text-2xl text-center mt-4 mb-4">
                            Reporting des clients
                        </p>
                        @if (session()->has('message'))
                            <div class="px-5 py-5 mx-5 my-2 rounded-lg h-50 bg-green-200 text-green-600">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <table class="min-w-full overflow-visible divide-y divide-gray-200 border mr-3">
                            <thead>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Designation</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">delegation</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">categorie</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">reference du titre</span>
                                    </th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($clients as $client)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $client->designation }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $client->delegation->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $client->categorie->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $client->reference_titre }}
                                        </td>
                                        <td class="py-4 whitespace-no-wrap text-sm text-gray-900">
                                            <div class="flex items-center">
                                                <x-button>
                                                    <a href="{{ route('client.show',['client' => $client->id]) }}">
                                                        {{ __('modifier le client') }}
                                                    </a>
                                                </x-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
