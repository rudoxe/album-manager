<x-app-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('song.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="artist" :value="__('Artist')" />
                        <x-text-input id="artist" class="block w-full mt-1" type="text" name="artist"
                            :value="old('artist')" required autofocus autocomplete="artist" />
                        <x-input-error :messages="$errors->get('artist')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="album" :value="__('Album')" />
                        <x-text-input id="album" class="block w-full mt-1" type="text" name="album"
                            :value="old('album')" required autofocus autocomplete="album" />
                        <x-input-error :messages="$errors->get('album')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="year" :value="__('Year')" />
                        <x-text-input id="year" class="block w-full mt-1" type="text" name="year"
                            :value="old('year')" required autofocus autocomplete="year" />


                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="genre" :value="__('Genre')" />
                        <x-text-input id="genre" class="block w-full mt-1" type="text" name="genre"
                            :value="old('genre')" required autofocus autocomplete="genre" />
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="duration" :value="__('Duration')" />
                        <x-text-input id="duration" class="block w-full mt-1" type="number" name="duration"
                            :value="old('duration')" required autofocus autocomplete="duration" />
                        <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="playlist_id" :value="__('Select Playlist')" />

                        <select name="playlist_id" id="playlist_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500'">
                            @foreach ($playlists as $playlist)
                                <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="path" :value="__('Path')" />
                        <x-text-input id="path" class="block w-full mt-1" type="file" name="path"
                            :value="old('path')" required autofocus autocomplete="path" />
                        <x-input-error :messages="$errors->get('path')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="cover" :value="__('Cover')" />
                        <x-text-input id="cover" class="block w-full mt-1" type="file" name="cover"
                            :value="old('cover')" required autofocus autocomplete="cover" />
                        <x-input-error :messages="$errors->get('cover')" class="mt-2" />
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
