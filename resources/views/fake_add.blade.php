@extends('layouts.app')

@section('content')
    <div class="row pt-5 d-flex justify-content-center">
        <div class="col-lg-6 p-4 rounded border">
            @if($errors->all())
            <div class="alert alert-danger" role="alert">
                <ul class="m-2">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('fake-add.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">Genre</label>
                    <input type="text" class="form-control" name="genre" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">Permalink</label>
                    <input type="text" class="form-control" name="permalink" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">Publisher permalink</label>
                    <input type="text" class="form-control" name="publisher_permalink" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">License</label>
                    <input type="text" class="form-control" name="license" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">Stream URL</label>
                    <input type="text" class="form-control" name="stream_url" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">Artwork URL</label>
                    <input type="text" class="form-control" name="artwork_url" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="">Duration</label>
                    <input type="number" class="form-control" name="duration" placeholder="..." required>
                </div>
                <div class="form-group pt-2">
                    <button type="submit" class="btn btn-bleak w-100">Fake-add</button>
                </div>
            </form>

        </div>
    </div>
@endsection
