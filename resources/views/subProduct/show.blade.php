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
                            {{$subProduct->product_description}}
                        </p>
                            <div class="px-20">
                                <div class="px-20 mt-4">
                                    <div class="font-semibold uppercase text-xl text-gray-700">Catégorie :
                                        <span class="leading-4 text-normal text-lg text-gray-900">{{$subProduct->product->designation}}</span>
                                    </div>
                                    <div class="font-semibold uppercase text-xl text-gray-700">Designation :
                                        <span class="leading-4 text-normal text-lg text-gray-900">{{$subProduct->product_description}}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    <a href="{{ route('subProduct.edit',['subProduct' => $subProduct->id]) }}">
                                        {{ __('Modifier le sous-produit') }}
                                    </a>
                                </x-button>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
