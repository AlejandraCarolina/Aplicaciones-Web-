<section>
    <!-- Sección de encabezado con un título y una breve descripción -->
    <header>
        <!-- Título de la sección -->
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Actualizar Contraseña') }}
        </h2>

        <!-- Descripción breve para la sección -->
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Asegúrate de que tu cuenta esté utilizando una contraseña larga y aleatoria para mantenerla segura.') }}
        </p>
    </header>

    <!-- Formulario para actualizar la contraseña -->
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf <!-- Token CSRF para seguridad -->
        @method('put') <!-- Suplantación de método HTTP para usar PUT -->

        <!-- Sección para la entrada de la contraseña actual -->
        <div>
            <!-- Etiqueta para la entrada de la contraseña actual -->
            <x-input-label for="update_password_current_password" :value="__('Contraseña Actual')" />
            <!-- Campo de entrada para la contraseña actual -->
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <!-- Mensaje de error para la entrada de la contraseña actual -->
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- Sección para la entrada de la nueva contraseña -->
        <div>
            <!-- Etiqueta para la entrada de la nueva contraseña -->
            <x-input-label for="update_password_password" :value="__('Nueva Contraseña')" />
            <!-- Campo de entrada para la nueva contraseña -->
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <!-- Mensaje de error para la entrada de la nueva contraseña -->
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Sección para la entrada de confirmación de contraseña -->
        <div>
            <!-- Etiqueta para la entrada de confirmación de contraseña -->
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Contraseña')" />
            <!-- Campo de entrada para la confirmación de contraseña -->
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <!-- Mensaje de error para la entrada de confirmación de contraseña -->
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Div para botón de guardar y mensaje de éxito -->
        <div class="flex items-center gap-4">
            <!-- Botón para guardar los cambios -->
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            <!-- Mensaje de éxito si la contraseña se actualiza correctamente -->
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
