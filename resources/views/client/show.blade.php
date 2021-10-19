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
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Previsualisation d'un client</h1>
                        <p class="text-2xl text-center mt-4 mb-4">
                            {{$client->designation}}
                        </p>
                            <div class="px-20">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Designation</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->designation}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Delegation</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->delegation()->name}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Ville</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->ville}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Code postal</div>
                                <div class="block leading-4 text-normal text-lg text-gray-7900">{{$client->code_postal}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Adresse</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->adresse}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Téléphone</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->phone}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Téléphone 2</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->secondary_phone}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Site web</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->website}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Reference du titre</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->reference_titre}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Email</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->email}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Compte auxilliaire</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->compte_auxilliaire}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Categotie</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->categorie()->name}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Scan contrat</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$client->scan_titre}}</div>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    {{ __('Modifier le client') }}
                                </x-button>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
