<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Playlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $playlist->name }}
                    <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                    </form>
                    <a href="{{ route('playlist.edit', $playlist->id) }}" class="text-blue-500">{{ __('Edit') }}</a>

                    <article class="mt-4">
                        @foreach ($playlist->songs as $song)
                            <h2>
                                <img src="/storage/songs/{{ $song->title }}" alt="cover">
                                <a href="{{ route('song.show', $song->id) }}">{{ $song->title }}</a>
                            </h2>
                        @endforeach
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
