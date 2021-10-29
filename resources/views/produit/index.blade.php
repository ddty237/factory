<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporting des produits') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('produit.create') }}">
                        {{ __('Create product') }}
                    </a>
                </x-button>
                <x-button class="ml-4">
                    <a href="{{ route('subProduct.create') }}">
                        {{ __('Create sub-product') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                    <div class=" bg-white border-gray-200 px-3 pt-16 pb-6">
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Module Produit</h1>
                        <p class="text-2xl text-center mt-4 mb-4">
                            Reporting des produits
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
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">codification</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">direction</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">montant</span>
                                    </th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($products as $product)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $product->designation }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $product->codification }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $product->direction->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $product->montant }}
                                        </td>
                                        <td class="py-4 whitespace-no-wrap text-sm text-gray-900">
                                            <div class="flex items-center">
                                                <x-button>
                                                    <a href="{{ route('produit.show',['produit' => $product->id]) }}">
                                                        {{ __('modifier le produit') }}
                                                    </a>
                                                </x-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-xl uppercase font-semibold mx-3 text-gray-800">Sous-produit</div>
                    <div class="px-4 pb-4 mr-1">
                            <table class="min-w-full overflow-visible divide-y divide-gray-200 border">
                            <thead>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Designation</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Produit rattaché</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50">
                                        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">montant</span>
                                    </th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($subproducts as $subproduct)
                                    <tr class="bg-white">
                                        <td class="px-5 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $subproduct->product_description }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $subproduct->product->designation }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-no-wrap text-sm leading-5 text-center text-gray-900">
                                            {{ $subproduct->montant }}
                                        </td>
                                        <td class="py-4 whitespace-no-wrap text-sm text-gray-900">
                                            <div class="flex items-center">
                                                <x-button>
                                                    <a href="{{ route('produit.show',['produit' => $product->id]) }}">
                                                        {{ __('modifier le sous-produit') }}
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
