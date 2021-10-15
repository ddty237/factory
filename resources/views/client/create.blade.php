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
                                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="delegation" :value="__('Delegation')" />
                                <x-input id="delegation" class="block mt-1 w-full" type="text" name="delegation" :value="old('delegation')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="ville" :value="__('Ville')" />
                                <x-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="code_postal" :value="__('Code postal')" />
                                <x-input id="code_postal" class="block mt-1 w-full" type="text" name="code_postal" :value="old('code_postal')"/>
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="adresse" :value="__('Adresse')" />
                                <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" placeholder="Quartier,rue" :value="old('adresse')"  />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="phone" :value="__('Téléphone')" />
                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
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
                                <x-input id="reference_titre" class="block mt-1 w-full" type="text" name="reference_titre" :value="old('reference_titre')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="compte_auxilliaire" :value="__('Compte auxilliaire')" />
                                <x-input id="reference_contrat" class="block mt-1 w-full" type="text" name="compte_auxilliaire" :value="old('compte_auxilliaire')" />
                            </div>
                            <div class="mt-4 px-20">
                                <x-label for="categorie" :value="__('Categorie')" />
                                <x-input id="categorie" class="block mt-1 w-full" type="text" name="categorie" :value="old('categorie')" />
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
