<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($songs) > 0)
                        @foreach ($songs as $song)
                            <article>
                                <h2>
                                    <a href="{{ route('song.show', $song->id) }}">{{ $song->title }}</a>
                                </h2>
                            </article>
                        @endforeach
                        <a href="{{ route('song.create') }}" class="text-blue-500">Create</a>
                    @else
                        <p>No songs found.</p>
                        <a href="{{ route('song.create') }}" class="text-blue-500">Create</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
