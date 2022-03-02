<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editer un client') }}
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
                        <p class="text-2xl text-center mt-4 uppercase font-semibold">
                            Edition du client {{$client->designation}}
                        </p>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4 ml-16" :errors="$errors" />

                        <form method="POST" action="{{ route('client.update',['client' => $client->id]) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="px-20">
                                <label class="block font-medium text-sm text-gray-700" for="designation">
                                    Désignation
                                </label>
                                <x-input id="designation" class="block mt-1 w-full{{ $errors->has('designation') ? ' border-red-500' : '' }}" type="text" name="designation" :value="old('designation') ?? $client->designation" placeholder="champs requis"/>
                                @error('designation')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="px-20 mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="ville">
                                    Villes
                                </label>
                                <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="ville">
                                  @foreach ($villes as $ville)
                                      <option value={{$ville->id}} {{ $client->ville_id == $ville->id ? 'selected':'' }}>{{$ville->name}}</option>
                                  @endforeach
                                </select>
                                @error('ville')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="code_postal">
                                    Code postal
                                </label>
                                <x-input id="code_postal" class="block mt-1 w-full{{ $errors->has('code_postal') ? ' border-red-500' : '' }}" type="text" name="code_postal" :value="old('code_postal') ?? $client->code_postal" placeholder="champs requis"/>
                                @error('code_postal')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="adresse">
                                    adresse
                                </label>
                                <x-input id="adresse" class="block mt-1 w-full{{ $errors->has('adresse') ? ' border-red-500' : '' }}" type="text" name="adresse" placeholder="Quartier,rue" :value="old('adresse') ?? $client->adresse" placeholder="champs requis"/>
                                @error('adresse')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="phone">
                                    Téléphone
                                </label>
                                <x-input id="phone" class="block mt-1 w-full{{ $errors->has('phone') ? ' border-red-500' : '' }}" type="text" name="phone" :value="old('phone') ?? $client->phone" placeholder="champs requis"/>
                                @error('phone')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="secondary_phone">
                                    Téléphone 2
                                </label>
                                <x-input id="secondary_phone" class="block mt-1 w-full" type="text" name="secondary_phone" :value="old('secondary_phone') ?? $client->secondary_phone" />
                            </div>
                            <div class="mt-4 px-20">
                                <label for="website">
                                    Site web
                                </label>
                                <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website') ?? $client->website" />
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="reference_titre" :value="__('Reference du titre')" />
                                <x-input id="reference_titre" class="block mt-1 w-full{{ $errors->has('reference_titre') ? ' border-red-500' : '' }}" type="text" name="reference_titre" :value="old('reference_titre') ?? $client->reference_titre" placeholder="champs requis"/>
                                @error('reference_titre')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="email" :value="__('Email')">
                                    Email
                                </label>
                                <x-input id="email" class="block mt-1 w-full{{ $errors->has('email') ? ' border-red-500' : '' }}" type="email" name="email" :value="old('email') ?? $client->email"/>
                                @error('email')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4 px-20">
                                <label class="block font-medium text-sm text-gray-700" for="compte_auxilliaire">
                                    compte auxilliaire
                                </label>
                                <x-input id="compte_auxilliaire" class="block mt-1 w-full" type="text" name="compte_auxilliaire" :value="old('compte_auxilliaire') ?? $client->compte_auxilliaire" />
                            </div>
                            <div class="px-20 mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="categorie">
                                    Catégorie
                                </label>
                                <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="categorie">
                                  @foreach ($categories as $categorie)
                                      <option value={{$categorie->id}} {{ $client->categorie_id == $categorie->id ? 'selected':'' }}>{{$categorie->name}}</option>
                                  @endforeach
                                </select>
                                @error('categorie')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>

                            <div class="px-20 mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="scan_titre">
                                    Scan du titre
                                </label>
                                <input class="px-4 py-4 rounded-lg border-dashed border-2 border-gray-200 bg-white h-full w-full" type="file" name="scan_titre">
                                <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
                            </div>
                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <button class="text-white px-4 py-1 bg-gray-900 rounded-lg ml-4">
                                    {{ __('Enregistrer le client') }}
                                </button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
