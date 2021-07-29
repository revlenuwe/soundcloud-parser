<?php

namespace App\Http\Controllers;

use App\Http\Requests\FakeAddTrackRequest;
use App\Models\Track;
use App\Services\SoundCloud;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index() {
        $tracks = Track::all();

        return view('index', compact('tracks'));
    }

    public function create(FakeAddTrackRequest $request) {
        auth()->user()->tracks()->create($request->validated());

        return redirect()->route('index');
    }

    public function download(Request $request, SoundCloud $parserService){
        return $parserService->downloadTrack($request->track_url);
    }

    public function delete(Track $track){
        $this->authorize('touch', $track);

        $track->delete();

        return back();
    }

    public function parseTrack(Request $request, SoundCloud $parserService){
        $trackData = $parserService->getTrackData($request->track_url);
        auth()->user()->tracks()->create([
            'title' => $trackData->title,
            'genre' => $trackData->genre,
            'publisher_permalink' => $trackData->user->permalink,
            'artwork_url' => $trackData->artwork_url,
            'permalink' => $trackData->permalink_url,
            'license' => $trackData->license,
            'stream_url' => $trackData->stream_url,
            'duration' => $trackData->duration,
        ]);

        return redirect()->route('you.tracks.index');
    }
}
