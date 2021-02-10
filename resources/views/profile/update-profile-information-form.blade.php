<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Información del perfil
    </x-slot>

    <x-slot name="description">
        Actualiza tu nombre de usuario o contraseña para acceder.
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Foto') }}" /> 

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                   Selecciona una nueva fotografía
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Area -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="area" value="{{ __('Área') }}" />
            <x-jet-input id="area" type="text" class="mt-1 block w-full" wire:model.defer="state.area" />
            <x-jet-input-error for="area" class="mt-2" />
        </div>

         <!-- Telefono -->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Teléfono') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />

            <x-jet-input-error for="phone" class="mt-2" />
        </div>

         <!-- Estatus -->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="status" value="{{ __('Estatus') }}" />
            <x-jet-input id="status" type="text" class="mt-1 block w-full" wire:model.defer="state.status" />
            <x-jet-input-error for="status" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Usuario guardado...') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
