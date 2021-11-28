<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporting des données de facturation') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('billingData.create') }}">
                        {{ __('Create Data billing') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class=" bg-white border-gray-200 px-3 pt-16 pb-6">
                    <p class="text-2xl text-center mt-4 mb-4">
                        Reporting des données de facturation
                    </p>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Client
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Produit
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Délégation
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Montant
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($datas as $data)
                            <tr>
                              <td class="px-6 py-4 text-center whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="text-sm font-medium text-gray-900">
                                      <a class='text-indigo-700' href="{{route('billingData.show',['billingDatum' => $data->id])}}">
                                        {{ $data->client->designation }}
                                      </a>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 text-center whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                  {{ $data->product->designation }}
                                </div>
                              </td>
                              <td class="px-6 py-3 text-center whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                  {{ $data->client->ville->delegation->name }}
                                </div>
                              </td>
                              <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                  {{ $data->montant_facture }}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
            </div>
        </div>
    </div>

</x-app-layout>
