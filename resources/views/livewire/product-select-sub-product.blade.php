<form wire:submit.prevent="save" method="POST" action="{{ route('billingData.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="px-20 mt-4">
        <x-label for="client" :value="__('Client')" />
        <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="clientId">
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

    <div>
        <div class="px-20 mt-4">
            <x-label for="produit" :value="__('Produit')" />
            <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="produitId">
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
    @foreach ($subproducts as $index => $subproduct)
        <div class="grid grid-cols-3 mt-4 px-20">
            <div>
                <x-label :value="__('Sous-produit')"/>
                <span class="text-gray-900 font-bold">{{$subproduct->product_description}}</span>
            </div>
            <div class="px-2">
                <x-label :value="__('Montant')"/>
                <x-input id="{{$subproduct->id}}" wire:model.lazy="datas.{{ $index }}.montant" class="block mt-1 w-full{{ $errors->has('montant') ? ' border-red-500' : '' }}" type="text" :value="old('montant')" placeholder="montant du sous-produit"/>
            </div>
            <div>
                <x-label :value="__('Observation')"/>
                <textarea wire:model.lazy="datas.{{ $index }}.observation" class="w-full text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
            </div>
        </div>
    @endforeach
        <div class="mt-4 px-20">
            <x-label for="montant_total" :value="__('Montant à facturer')" />
            <x-input wire:model.lazy='montantTotal' class="block mt-1 w-full{{ $errors->has('montant_total') ? ' border-red-500' : '' }}" type="text" name="montant" :value="old('montant_total')"/>
            @error('montant_total')
                <div class="mt-1 font-semibold text-red-500">
                    Ce champs est réquis.
                </div>
            @enderror
        </div>
        <div class="mt-4 px-20">
            <x-label for="reference_contrat" :value="__('Reference de contrat')" />
            <x-input wire:model.lazy="reference" class="block mt-1 w-full{{ $errors->has('reference_contrat') ? ' border-red-500' : '' }}" type="text" name="reference_contrat"/>
            @error('reference_contrat')
                <div class="mt-1 font-semibold text-red-500">
                    {{$errors->first('reference_contrat')}}
                </div>
            @enderror
        </div>
        <div class="mt-4 px-20">
            <x-label for="observation_general" :value="__('Observation générale')" />
            <textarea wire:model.lazy="general_observation" class="w-full text-gray-700 border rounded-lg focus:outline-none {{ $errors->has('general_observation') ? ' border-red-500' : '' }}" rows="4" name="general_observation"></textarea>
            @error('general_observation')
                <div class="mt-1 font-semibold text-red-500">
                    {{$errors->first('general_observation')}}
                </div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4 px-20 mb-6">
            <x-button class="ml-4" wire:submit.prevent="save">
                {{ __('Enregistrer') }}
            </x-button>
        </div>

</form>
