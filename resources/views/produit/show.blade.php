<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Prévisualisation des produits/sous-produits') }}
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container bg-white border-gray-200 px-4 pt-16 pb-6">
                        <p class="text-2xl text-center mt-4 mb-4">
                            {{$produit->designation}}
                        </p>
                            <div class="px-20">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Designation</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$produit->designation}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Description</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$produit->description}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Codification budgétaire</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$produit->codification}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Compte collectif</div>
                                <div class="block leading-4 text-normal text-lg text-gray-7900">{{$produit->compte_collectif}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Direction rattaché</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$produit->direction->name}}</div>
                            </div>
                            <div class="px-20 mt-4">
                                <div class="block font-semibold uppercase text-xl text-gray-700">Montant</div>
                                <div class="block leading-4 text-normal text-lg text-gray-900">{{$produit->montant}}</div>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    <a href="{{ route('produit.edit',['produit' => $produit->id]) }}">
                                        {{ __('Modifier le produit') }}
                                    </a>
                                </x-button>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
