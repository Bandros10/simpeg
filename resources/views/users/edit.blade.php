@extends('layouts.app')

@section('title')
<title>Users</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <x-card>
            @slot('title')

            @endslot

            @if (session('error'))
            <x-alert type="danger">
                {!! session('error') !!}
            </x-alert>

            @endif

            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"
                        class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required readonly>
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                    <p class="text-warning">Biarkan kosong, jika tidak ingin mengganti password</p>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-send"></i> Update
                    </button>
                </div>
            </form>
            @slot('footer')
            @endslot
        </x-card>
    </div>
</div>
@endsection
