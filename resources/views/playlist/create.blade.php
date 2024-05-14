<x-app-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('playlist.store') }}">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ms-4">
                            {{ __('Create') }}
                        </x-primary-button>

                    </div>

                </form>

            </div>
        </div>
</x-app-layout>
