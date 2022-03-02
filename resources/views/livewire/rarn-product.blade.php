<div>
    <!-- Validation Errors -->
    <x-alert.success></x-alert.success>
    <x-auth-validation-errors class="mb-4 ml-16" :errors="$errors" />
    <form wire:submit.prevent="storeProduct" class="border-b-2 pb-10">
        <div class="px-10">
            <label class="block font-medium text-sm text-gray-700" for="client">
                Client*
            </label>
            <select wire:model="clientId" name="client"
                    class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                <option value="">-- choose client --</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->designation }}</option>
                @endforeach
            </select>
        </div>

        <div class="px-10 mt-4">
            <label class="block font-medium text-sm text-gray-700" for="reference">
                Reference de contrat*
            </label>
            <x-input wire:model.lazy="reference_contrat" class="block mt-3" type="text" placeholder="Reference de contrat"/>
        </div>
        <div class="px-10 mt-4">
            <label class="block font-medium text-sm text-gray-700" for="observation">
                Observation générale
            </label>
            <textarea wire:model.lazy="observation_generale" class="mt-3 w-full text-gray-700 border rounded-lg focus:outline-none" rows="4" placeholder="Observation générale"></textarea>
        </div>

        @foreach ($orderProducts as $index => $orderProduct)
            <div class="px-10 mt-4 grid grid-cols-6 gap-1">
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="bloc_numero">
                        Bloc de numéro*
                    </label>
                    <x-input wire:model.lazy="orderProducts.{{$index}}.range" class="block mt-3" type="text" placeholder="Numéro"/>
                </div>

                <div class="mt-4">
                    <label class="block mt-2 font-medium text-sm text-gray-700" for="format">
                        Format*
                    </label>
                    <select wire:model="orderProducts.{{$index}}.produit" name="product"
                                class="text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                        <option value="">-- choisir le format --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->format }} ( {{$product->type_numero}} ) </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="quantity">
                                Quantité*
                            </label>
                            <x-input id="" wire:model.lazy="orderProducts.{{$index}}.quantity" class="block mt-3" type="text" placeholder="Nombre de numéros"/>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="product">
                            Type redevance
                        </label>
                        <select wire:model="orderProducts.{{$index}}.redevance" name="redevance"
                                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value="">-- choisir le type --</option>
                            <option value="redevance_attribution_annuel">Redevance d'attribution annuel</option>
                            <option value="redevance_reservation_annuel">Redevance de reservation annuel</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="date_attribution">
                        Date d'attribution
                    </label>
                    <x-input wire:model.lazy="orderProducts.{{$index}}.date" class="block mt-3 mx-2" type="date" placeholder="Date d'attribution"/>
                </div>
                <div class="mt-4 flex items-center justify-center">
                    <a href="#" class="text-red-700 mt-4" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                </div>
            </div>
        @endforeach

        <div class="px-10 flex items-center mt-4">
            <button type="submit"
                wire:click.prevent="addProduct"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                + Add product
            </button>
        </div>

        <div class="flex items-center justify-end mt-4 px-20 mb-6">
            <button type="submit"
                wire:click.prevent="storeProduct"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Enregistrer la donnée
            </button>
        </div>
    </form>

    <h3 class="px-10 font-bold text-xl mt-10 mb-5">Prévisualisation des données de facturation</h3>

    <table class="px-10 min-w-full">
        <thead>
        <tr>
            <th class="px-10 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Produit</th>
            <th class="px-10 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Quantité</th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($orderProducts as $orderProduct)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $orderProduct['produit'] }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $orderProduct['quantity'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

