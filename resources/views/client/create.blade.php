<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creation d\'un client') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('client.index') }}">
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
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Module Client</h1>
                        <p class="text-2xl text-center mt-4">
                            Creation d'un client
                        </p>
                        <form method="POST" action="{{ route('client.store') }}">
                            @csrf
                            <div class="px-20">
                                <x-label for="designation" :value="__('Designation')" />
                                <x-input id="designation" class="block mt-1 w-full{{ $errors->has('designation') ? ' border-red-500' : '' }}" type="text" name="designation" :value="old('designation')" placeholder="champs requis"/>
                                @error('designation')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="delegation" :value="__('Delegation')" />
                                <x-input id="delegation" class="block mt-1 w-full{{ $errors->has('delegation') ? ' border-red-500' : '' }}" type="text" name="delegation" :value="old('delegation')" placeholder="champs requis"/>
                                @error('delegation')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="ville" :value="__('Ville')" />
                                <x-input id="ville" class="block mt-1 w-full{{ $errors->has('ville') ? ' border-red-500' : '' }}" type="text" name="ville" :value="old('ville')" placeholder="champs requis"/>
                                @error('ville')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="code_postal" :value="__('Code postal')" />
                                <x-input id="code_postal" class="block mt-1 w-full{{ $errors->has('code_postal') ? ' border-red-500' : '' }}" type="text" name="code_postal" :value="old('code_postal')" placeholder="champs requis"/>
                                @error('code_postal')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="adresse" :value="__('Adresse')" />
                                <x-input id="adresse" class="block mt-1 w-full{{ $errors->has('adresse') ? ' border-red-500' : '' }}" type="text" name="adresse" placeholder="Quartier,rue" :value="old('adresse')" placeholder="champs requis"/>
                                @error('adresse')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="phone" :value="__('Téléphone')" />
                                <x-input id="phone" class="block mt-1 w-full{{ $errors->has('phone') ? ' border-red-500' : '' }}" type="text" name="phone" :value="old('phone')" placeholder="champs requis"/>
                                @error('phone')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="secondary_phone" :value="__('Téléphone 2')" />
                                <x-input id="secondary_phone" class="block mt-1 w-full" type="text" name="secondary_phone" :value="old('secondary_phone')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="website" :value="__('Site web')" />
                                <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="reference_titre" :value="__('Reference du titre')" />
                                <x-input id="reference_titre" class="block mt-1 w-full{{ $errors->has('reference_titre') ? ' border-red-500' : '' }}" type="text" name="reference_titre" :value="old('reference_titre')" placeholder="champs requis"/>
                                @error('reference_titre')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full{{ $errors->has('email') ? ' border-red-500' : '' }}" type="email" name="email" :value="old('email')" placeholder="champs requis"/>
                                @error('email')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="compte_auxilliaire" :value="__('Compte auxilliaire')" />
                                <x-input id="compte_auxilliaire" class="block mt-1 w-full" type="text" name="compte_auxilliaire" :value="old('compte_auxilliaire')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="categorie" :value="__('Categorie')" />
                                <x-input id="categorie" class="block mt-1 w-full{{ $errors->has('categorie') ? ' border-red-500' : '' }}" type="text" name="categorie" :value="old('categorie')" placeholder="champs requis"/>
                                @error('categorie')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="px-20 mt-4">
                                <x-label for="categorie" :value="__('Categorie')" />
                                <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                  @foreach ($categories as $categorie)
                                      <option value="">{{}}</option>
                                  @endforeach
                                  <option>Direction general</option>
                                  <option>$5,000</option>
                                  <option>$10,000</option>
                                  <option>$25,000</option>
                                </select>
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="scan_titre" :value="__('Scan titre')" />
                                <x-input id="scan_titre" class="block mt-1 w-full" type="text" name="scan_titre" :value="old('scan_titre')" />
                            </div>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    {{ __('Enregistrer le client') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
