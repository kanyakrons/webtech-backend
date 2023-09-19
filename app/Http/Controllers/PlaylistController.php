<?php

namespace App\Http\Controllers;

use App\Models\Enums\PlaylistAccessibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use Illuminate\Support\Facades\Gate;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //Gate::authorize('viewAny', Playlist::class);


        if(Gate::denies('viewAny', Playlist::class)){
            return redirect()->to('/');
        }

        $user = Auth::user();
        $playlists = Playlist::with('songs')->privateList()->ofUser($user->id)->get();
        return view('playlists.index', [
            'playlists' => $playlists
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Playlist::class);
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Playlist::class);

        $request->validate([
            'name' => ['required', 'min:4', 'max:100']
        ]);

        $playlist = new Playlist();
        $playlist->accessibility = PlaylistAccessibility::PRIVATE;
        $playlist->name = $request->get('name');
        $request->user()->playlists()->save($playlist);

        return redirect()->route('playlists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        Gate::authorize('update', $playlist);
        return view('playlists.edit', ['playlist' => $playlist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $playlist)
    {
        Gate::authorize('update', $playlist);
        $request->validate([
            'name' => ['required', 'min:4', 'max:255']
        ]);

        $playlist->name = $request->get('name');
        $playlist->save();
        return redirect()->route('playlist.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
