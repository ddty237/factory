<div class="pt-10 bg-gray-100">
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="name" :value="__('Name')">
                        Name
                    </label>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Prenom -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="prename">
                        Prenom
                    </label>

                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                </div>

                <!-- Phone number -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="phone_number">
                        Numéro de téléphone
                    </label>

                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone')" required autofocus />
                </div>

                <!-- Matricule -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="matricule">
                        Matricule
                    </label>

                    <x-input id="matricule" class="block mt-1 w-full" type="text" name="matricule" :value="old('matricule')" required autofocus />
                </div>

                <!-- Direction -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="direction">
                        Direction
                    </label>
                    <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="direction">
                      @foreach ($directions as $direction)
                          <option value={{$direction->id}}>{{$direction->name}}</option>
                      @endforeach
                    </select>
                    @error('direction')
                        <div class="mt-1 font-semibold text-red-500">
                            Ce champs est réquis.
                        </div>
                    @enderror
                </div>

                <!-- Poste -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="poste">
                        Poste
                    </label>
                    <select class="rounded-md shadow-sm w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="poste">
                      @foreach ($postes as $poste)
                          <option value={{$poste->id}}>{{$poste->name}}</option>
                      @endforeach
                    </select>
                    @error('poste')
                        <div class="mt-1 font-semibold text-red-500">
                            Ce champs est réquis.
                        </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Email
                    </label>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password">
                        Password
                    </label>

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                        Confirm Password
                    </label>

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="text-white px-4 py-2 bg-gray-900 rounded-lg ml-4">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</div>
