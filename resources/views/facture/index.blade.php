<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporting des factures') }}
            </h2>
            <div class="flex items-center justify-end px-20">
                <x-button class="ml-4">
                    <a href="{{ route('facture.create') }}">
                        {{ __('Create e-facture') }}
                    </a>
                </x-button>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class=" bg-white border-gray-200 px-3 pt-16 pb-6">
                    <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Module Facture</h1>
                    <p class="text-2xl text-center mt-4 mb-4">
                        Reporting des factures
                    </p>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              N° facture
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Nom du client
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Nom du produit
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Statut
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($factures as $facture)
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="text-sm font-medium text-gray-900">
                                      <a class='text-indigo-700' href="{{ route('facture.export',['data' => $facture['id']]) }}">
                                            {{$facture['numero_facture']}}
                                      </a>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-center text-sm text-gray-900">
                                    {{$facture['client'][0]['name'] }}
                                </div>
                              </td>
                              <td class="px-6 py-3 whitespace-nowrap">
                                <div class="text-center text-sm text-gray-900">
                                    {{$facture['produit'][0]['name'] }}
                                </div>
                              </td>
                              <td class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-green-800">
                                  {{$facture['status']}}
                                </span>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="{{ route('facture.download',['data' => $facture['id']]) }}" class="text-indigo-600 hover:text-indigo-900">Export</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
