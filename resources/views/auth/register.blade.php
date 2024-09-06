<x-guest-layout>
    <form id="registrationForm" method="POST" action="{{ route('register') }}"> 
        @csrf

        <!-- Step 1: Name and Email -->
        <div id="step1" class="form-step">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="next-button" onclick="nextStep()">Siguiente</button>
            </div>
        </div>

        <!-- Step 2: Address -->
        <div id="step2" class="form-step" style="display:none;">
            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- State -->
            <div class="mt-4">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <!-- ZIP Code -->
            <div class="mt-4">
                <x-input-label for="zip" :value="__('ZIP Code')" />
                <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required />
                <x-input-error :messages="$errors->get('zip')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="button" class="previous-button" onclick="previousStep()">Anterior</button>
                <button type="button" class="next-button" onclick="nextStep()">Siguiente</button>
            </div>
        </div>

        <!-- Step 3: Password -->
        <div id="step3" class="form-step" style="display:none;">
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="button" class="previous-button" onclick="previousStep()">Anterior</button>
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
    <!-- Incluir el archivo JavaScript -->
    <script src="{{ asset('js/RegistrerController.js') }}"></script>
</x-guest-layout>