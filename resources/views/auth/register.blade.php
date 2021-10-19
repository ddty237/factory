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
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Prenom -->
                <div class="mt-4">
                    <x-label for="prename" :value="__('Prenom')" />

                    <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                </div>

                <!-- Phone number -->
                <div class="mt-4">
                    <x-label for="phone_number" :value="__('numéro de téléphone')" />

                    <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone')" required autofocus />
                </div>

                <!-- Matricule -->
                <div class="mt-4">
                    <x-label for="matricule" :value="__('Matricule')" />

                    <x-input id="matricule" class="block mt-1 w-full" type="text" name="matricule" :value="old('matricule')" required autofocus />
                </div>

                <!-- Direction -->
                <div class="mt-4">
                    <x-label for="direction" :value="__('Direction')" />
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
                    <x-label for="poste" :value="__('Poste')" />
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
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</div>
