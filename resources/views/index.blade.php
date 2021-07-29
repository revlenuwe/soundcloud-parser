@extends('layouts.app')

@section('content')
    <div class="row pt-5">
        <div class="col-lg-12">
            <div class="mb-2">
                <a href="{{ route('parse.index') }}" class="btn btn-bleak">Add track</a>
                <a href="{{ route('fake-add.index') }}" class="btn btn-bleak">Fake-add</a>
            </div>

            <hr>
        </div>
        @forelse($tracks as $track)
        <div class="col-lg-12 mb-3">
            <div class="rounded border-bold border-bleak p-2">
                <div class="media p-1">
                    <img class="mr-3 ml-2 mr-2 rounded" width="110" src="{{ $track->artwork_url }}" alt="{{ $track->title }}">
                    <div class="row w-100 p-1">
                        <div class="col-lg-8">
                            <h4 class="text-bleak pb-4">{{ $track->title }}</h4>
                            <p>#{{ $track->genre }}</p>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end justify-content-end">
                            <div>
                                <small class="pr-4">Added by <b>{{ $track->user->username }}</b></small>
                                <a href="{{ route('download.process', ['track_url' => $track->permalink]) }}" class="btn btn-bleak f-14"><i class="fas fa-save"></i></a>
                                <a href="{{ $track->permalink }}" target="_blank" class="btn btn-bleak f-14"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-12">
            <h2>Wtf</h2>
        </div>
        @endforelse
    </div>
@endsection

