<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creation d\'un produit') }}
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
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Module Produit</h1>
                        <p class="text-2xl text-center mt-4">
                            Creation d'un produit
                        </p>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('produit.store') }}">
                            @csrf
                            <div class="px-20">
                                <x-label for="designation" :value="__('Designation')" />
                                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="description" :value="__('Description')" />
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="compte_collectif" :value="__('Compte collectif')" />
                                <x-input id="compte_collectif" class="block mt-1 w-full" type="text" name="compte_collectif" :value="old('compte_collectif')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="codification" :value="__('Codification Budgétaire')" />
                                <x-input id="codification" class="block mt-1 w-full" type="text" name="codification" :value="old('codification')" />
                            </div>
                            <div class="px-20 mt-4">
                                <x-label for="direction" :value="__('Direction')" />
                                <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="direction">
                                  @foreach ($directions as $direction)
                                      <option value={{$direction->id}}>{{$direction->name}}</option>
                                  @endforeach
                                </select>
                                @error('direction')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="px-20 mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="haveCategorie" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="haveCategorie" onclick="isChecked()"/>
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Admet une sous-produit') }}</span>
                                </label>
                            </div>

                            <div class="mt-4 px-20">
                                <x-label for="montant" :value="__('Montant')" />
                                <x-input id="montant" class="block mt-1 w-full" type="text" name="montant" :value="old('montant')" />
                            </div>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    {{ __('Enregistrer le produit') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>

        console.log('ok');
        categorie = document.getElementById('haveCategorie').checked;
        montant = document.getElementById('montant');

        function isChecked() {
            categorie = !categorie;

            if(categorie) {
                montant.disabled = true;
            }else{
                montant.disabled = false;
            }
        }



</script>
