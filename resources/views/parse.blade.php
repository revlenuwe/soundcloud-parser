@extends('layouts.app')

@section('content')
    <div class="row pt-5 d-flex justify-content-center">
        <div class="col-lg-6 p-4 rounded border">
            <form action="{{ route('parse.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">SoundCloud link</label>
                    <input type="text" name="track_url" class="form-control" placeholder="https://soundcloud.com/lxst_cxntury/distortion">
                </div>
                <div class="form-group pt-2">
                    <button type="submit" class="btn btn-bleak w-100">Add to library</button>
                </div>
            </form>

        </div>
    </div>
@endsection
