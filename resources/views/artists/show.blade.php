@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Artist: {{ $artist->name }}
    </h1>

    <div>
        <a class="inline-block py-2 px-4 border border-gray-700 bg-pink-100"
            href="{{ route('artists.edit', ['artist' => $artist]) }}">
            Edit Artist
        </a>
        <a>
            @if($artist->songs->isEmpty())
                <form class="inline-block"
                    action="{{ route('artists.destroy', ['artist' => $artist]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-block py-2 px-4 border border-gray-700 bg-pink-100">
                        Delete Artist
                    </button>
                </form>
            @endif
        </a>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4">
            <h2 class="text-xl font-semibold text-gray-800">Songs</h2>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($artist->songs as $song)
                <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                    <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-800">{{ $song->title }}</h3>
                        <p class="text-gray-600 text-base">{{ $song->artist->name }}</p>
                    </div>
                    <span class="text-gray-400">{{ $song->duration_to_string }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection