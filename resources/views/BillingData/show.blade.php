<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Previsualisation d\'une donnée de facturation') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container bg-white border-gray-200 px-4 pt-16 pb-6">
                        <p class="text-2xl text-center mt-4 mb-4">
                            {{$data->client->designation }} du {{$data->created_at }}
                        </p>
                            <div class="px-20">
                                <div class="font-semibold uppercase text-xl text-gray-700">Raison sociale :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->client->designation}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">BP :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->client->code_postal}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Ville :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->client->ville->name}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Téléphone :
                                    <span class="leading-4 text-normal text-lg text-gray-7900">{{$data->client->phone}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Reference de l'Agrément :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->reference_contrat}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Date de signature :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->created_at}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Validité :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->create_at}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="font-semibold uppercase text-xl text-gray-700">Montant :
                                    <span class="leading-4 text-normal text-lg text-gray-900">{{$data->montant_facture}}</span>
                                </div>
                            </div>
                            <div class="px-20 mt-4">
                                <a class="text-indigo-800" href="#" >Cliquez ici pour voir le scan du contrat</a>
                            </div>
                            <div class="px-20 mt-4">
                                <a class="text-indigo-800" href="#" >Cliquez ici pour voir le scan de la donnée de facturation</a>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    <a href="{{ route('billingData.edit',['billingDatum' => $data->id]) }}">
                                        {{ __('Modifier le client') }}
                                    </a>
                                </x-button>
                            </div>
                    </div>
            </div>
        </div>
    </div>

</x-app-layout>
