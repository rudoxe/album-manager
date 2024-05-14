<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Song') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <article>
                        <h2>
                            {{ $song->title }}
                        </h2>
                        <p>
                            {{ $song->artist }}
                        </p>
                        <p>
                            {{ $song->album }}
                        </p>

                        <p>
                            {{ $song->year }}
                        </p>

                        <p>
                            {{ $song->genre }}
                        </p>

                        <p>
                            {{ $song->duration }}
                        </p>

                        <img src="/storage/cover/{{ $song->cover }}" alt="cover">



                        <form action="{{ route('song.destroy', $song->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>{{ __('Delete') }}</x-danger-button>
                        </form>

                        <a href="{{ route('song.edit', $song->id) }}" class="text-blue-500">{{ __('Edit') }}</a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
