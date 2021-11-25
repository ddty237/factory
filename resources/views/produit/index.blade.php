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
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Libellé
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                Direction
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a class='text-indigo-700' href="{{ route('produit.show',['produit' => $product->id]) }}">
                                            {{ $product->designation }}
                                        </a>
                                    </div>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text-center">
                                    {{ $product->description}}
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text-center">
                                    {{ $product->direction->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('produit.edit',['produit' => $product->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                      </table>
                      <p class="text-2xl text-center mt-8 mb-4">Reporting des sous-produits</p>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Libellé
                                </th>
                                <th scope="col" class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                Produit parent
                                </th>
                                <th scope="col" class="px-6 py-3  text-xs text-center font-medium text-gray-500 uppercase tracking-wider">
                                Direction
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($subproducts as $subproduct)
                                <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a class='text-indigo-700' href="{{ route('subProduct.show',['subProduct' => $subproduct->id]) }}">
                                            {{ $subproduct->product_description }}
                                        </a>
                                    </div>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text-center">
                                    {{ $subproduct->product->designation}}
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text-center">
                                    {{ $subproduct->product->direction->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('subProduct.edit',['subProduct' => $subproduct->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
