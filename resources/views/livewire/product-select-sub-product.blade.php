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
            <x-input wire:model.lazy="reference" class="block mt-1 w-full{{ $errors->has('reference_contrat') ? ' border-red-500' : '' }}" type="text" name="reference_contrat" :value="old('reference_titre')"/>
            @error('reference_contrat')
                <div class="mt-1 font-semibold text-red-500">
                    {{$errors->first('reference_contrat')}}
                </div>
            @enderror
        </div>
        <div class="px-20 mt-4">
            <x-label for="scan_contrat" :value="__('Scan contrat')" />
            <input class="px-4 py-4 rounded-lg border-dashed border-2 border-gray-200 bg-white h-full w-full" type="file" name="scan_contrat">
            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
        </div>
        <div class="px-20 mt-4">
            <x-label for="scan_donnee" :value="__('Scan donnée')" />
            <input class="px-4 py-4 rounded-lg border-dashed border-2 border-gray-200 bg-white h-full w-full" type="file" name="scan_donnee">
            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
        </div>
        <div class="flex items-center justify-end mt-4 px-20 mb-6">
            <x-button class="ml-4" wire:submit="save">
                {{ __('Enregistrer') }}
            </x-button>
        </div>

</form>
