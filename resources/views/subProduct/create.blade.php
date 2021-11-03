<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creation d\'un sous-produit') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('produit.index') }}">
                        {{ __('back to reporting') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" bg-white border-gray-200 px-3 pt-16 pb-6">
                        <p class="text-2xl text-center mt-4">
                            Création d'un sous-produit
                        </p>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('subProduct.store') }}">
                            @csrf
                            <div class="px-20">
                                <x-label for="products" :value="__('Catégories')" />
                                <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="product">
                                  @foreach ($products as $product)
                                      <option value={{$product->id}}>{{$product->designation}}</option>
                                  @endforeach
                                </select>
                                @error('product')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="description" :value="__('Description du sous-produit')" />
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
                            </div>

                            <div class="mt-4 px-20">
                                <x-label for="montant" :value="__('Montant')" />
                                <x-input id="montant" class="block mt-1 w-full" type="text" name="montant" :value="old('montant')" />
                            </div>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    {{ __('Enregistrer le sous-produit') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
