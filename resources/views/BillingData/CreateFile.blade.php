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
                        <h1 class="uppercase text-center tracking-wider text-gray-800 text-4xl font-semibold">Module donnée de facturation</h1>
                        <p class="text-2xl text-center mt-4">
                            Ajout des differents scan de la donnée de {{$data->client->designation }} du {{$data->created_at }}
                        </p>
                    </div>
                    <form method="POST" action="{{route('data.storeFile',['dataFacturation' => $data->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="px-20">
                            <x-label for="scan_donnee" :value="__('Scan Donnée')" />
                            <input class="px-4 py-4 rounded-lg border-dashed border-2 border-gray-200 bg-white h-full w-full" type="file" name="scan_donnee">
                            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
                        </div>
                        <div class="px-20 mt-4">
                            <x-label for="scan_contrat" :value="__('Scan contrat')" />
                            <input class="px-4 py-4 rounded-lg border-dashed border-2 border-gray-200 bg-white h-full w-full" type="file" name="scan_contrat">
                            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.doc only</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
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

</x-app-layout>
