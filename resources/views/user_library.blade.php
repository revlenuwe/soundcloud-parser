@extends('layouts.app')

@section('content')
    <div class="row pt-5">
        @forelse($tracks as $track)
            <div class="col-lg-12 mb-3">
                <h2 class="mb-3">Your tracks library</h2>
                <hr>
                <div class="rounded border-bold border-bleak p-2">
                    <div class="media p-1">
                        <img class="mr-3 ml-2 mr-2 rounded" width="110" src="{{ $track->artwork_url }}" alt="{{ $track->title }}">
                        <div class="row w-100 p-1">
                            <div class="col-lg-8">
                                <h4 class="text-bleak pb-4">{{ $track->title }}</h4>
                                <p>#{{ $track->genre }}</p>
                            </div>
                            <div class="col-lg-4 d-flex align-items-end justify-content-end">
                                <div class="d-flex">
                                    <a href="{{ route('download.process', ['track_url' => $track->permalink]) }}" class="btn btn-bleak m-1 f-14"><i class="fas fa-save"></i></a>
                                    <a href="{{ $track->permalink }}" target="_blank" class="btn btn-bleak f-14 m-1"><i class="fas fa-link"></i></a>
                                    <form action="{{ route('you.tracks.delete', $track->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger f-14 m-1"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <h2 class="m-0">Your tracks library</h2>
                    <a href="{{ route('parse.index') }}" class="btn btn-bleak">Add track</a>
                </div>
                <hr>
            </div>
        @endforelse
    </div>
@endsection

