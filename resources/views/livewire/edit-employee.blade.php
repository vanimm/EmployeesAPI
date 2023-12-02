 <form class="md:w-1/2 space-y-3" wire:submit.prevent='editarEmpleado'>

     <!-- Name -->
     <div>
         <x-input-label for="name" :value="__('Name')" />
         <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model='name' :value="old('name')" autofocus
             autocomplete="name" />
         <x-input-error :messages="$errors->get('name')" class="mt-2" />
     </div>

     <!-- Username -->
     <div>
         <x-input-label for="username" :value="__('Username')" />
         <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" wire:model='username' :value="old('username')"
             autofocus autocomplete="username" />
         <x-input-error :messages="$errors->get('username')" class="mt-2" />
     </div>

     <!-- Email Address -->
     <div class="mt-4">
         <x-input-label for="email" :value="__('Email')" />
         <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model='email' :value="old('email')" required
             autocomplete="email" />
         <x-input-error :messages="$errors->get('email')" class="mt-2" />
     </div>

     <!-- Address -->
     <div>
         <x-input-label for="address" :value="__('Address')" />
         <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" wire:model='address' :value="old('address')"
             autofocus autocomplete="address" />
         <x-input-error :messages="$errors->get('address')" class="mt-2" />
     </div>

     <!-- Phone -->
     <div>
         <x-input-label for="phone" :value="__('Phone')" />
         <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" wire:model='phone' :value="old('phone')"
             autofocus autocomplete="phone" />
         <x-input-error :messages="$errors->get('phone')" class="mt-2" />
     </div>

     <!-- Website -->
     <div>
         <x-input-label for="website" :value="__('Website')" />
         <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" wire:model='website' :value="old('website')"
             autofocus autocomplete="website" />
         <x-input-error :messages="$errors->get('website')" class="mt-2" />
     </div>

     <!-- Company -->
     <div>
         <x-input-label for="company" :value="__('Company')" />
         <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" wire:model='company' :value="old('company')"
             autofocus autocomplete="company" />
         <x-input-error :messages="$errors->get('company')" class="mt-2" />
     </div>


     <x-primary-button class="w-full justify-center">
         {{ __('Save') }}
     </x-primary-button>

 </form>
