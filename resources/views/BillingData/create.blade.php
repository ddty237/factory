<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creation des données de facturation') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('billingData.index') }}">
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
                        <form method="POST" action="{{ route('billingData.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="px-20 mt-4">
                                <x-label for="client" :value="__('Client')" />
                                <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="client">
                                  @foreach ($clients as $client)
                                      <option value={{$client->id}}>{{$client->designation}}</option>
                                  @endforeach
                                </select>
                                @error('client')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>
                            <div class="px-20 mt-4">
                                <x-label for="produit" :value="__('Produit')" />
                                <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="produit">
                                  @foreach ($produits as $produit)
                                      <option value={{$produit->id}}>{{$produit->designation}}</option>
                                  @endforeach
                                </select>
                                @error('produit')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-4 px-20">
                                <x-label for="montant" :value="__('Montant à facturer')" />
                                <x-input id="montant" class="block mt-1 w-full{{ $errors->has('montant') ? ' border-red-500' : '' }}" type="text" name="montant" :value="old('montant')" placeholder="champs requis"/>
                                @error('montant')
                                    <div class="mt-1 font-semibold text-red-500">
                                        Ce champs est réquis.
                                    </div>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4 px-20 mb-6">
                                <x-button class="ml-4">
                                    {{ __('Enregistrer la donnée de facturation') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
