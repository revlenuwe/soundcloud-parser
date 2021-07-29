@extends('layouts.app')

@section('content')
    <div class="row pt-5 d-flex justify-content-center">
        <div class="col-lg-6 p-4 rounded border">
            <h3 class="text-center pb-2">Sign up</h3>
            @if($errors->all())
                <div class="alert alert-danger" role="alert">
                    <ul class="m-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="bill@example.com">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="kolman">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="***">
                </div>
                <div class="form-group">
                    <label for="">Password confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="***">
                </div>
                <div class="form-group pt-2">
                    <button type="submit" class="btn btn-bleak w-100">Sign up</button>
                </div>
            </form>

        </div>
    </div>
@endsection
