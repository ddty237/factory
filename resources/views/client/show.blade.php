<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Previsualisation d\'un client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container bg-white border-gray-200 px-4 pt-16 pb-6">
                        <p class="text-2xl text-center mt-4 mb-4">
                            {{$client->designation}}
                        </p>
                            <div class="px-20">
                                <div class="font-semibold uppercase text-xl text-gray-700">Designation :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->designation}}</span>
                                </div>

                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Delegation :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->ville->delegation->name}}</span>
                                </div>

                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Ville :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->ville->name}}</span>
                                </div>

                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Code postal :
                                    <span class="leading-4 text-normal text-lg text-gray-7900">{{$client->code_postal}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Adresse :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->adresse}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Téléphone :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->phone}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Téléphone 2 :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->secondary_phone}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Site web :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->website}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Reference du titre :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->reference_titre}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Email :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->email}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Compte auxilliaire :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->compte_auxilliaire}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Categotie :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$client->categorie->name}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <a class="text-indigo-800" href="{{$client->scan_titre ? asset("storage/". substr($client->scan_titre,7)) : '' }}" >Cliquez ici pour voir le scan du contrat</a>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <button class="text-white px-4 py-2 bg-gray-900 rounded-lg ml-4">
                                    <a href="{{ route('client.edit',['client' => $client->id]) }}">
                                        {{ __('Modifier le client') }}
                                    </a>
                                </button>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
