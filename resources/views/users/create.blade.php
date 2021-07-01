@extends('layouts.app')

@section('title')
<title>Tamnbah User</title>
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

                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                            required>
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                            required>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                            <option value="">Pilih</option>
                            @foreach ($role as $row)
                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('role') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-send"></i> Simpan
                        </button>
                    </div>
                </form>
                @slot('footer')
                ​
                @endslot
            </x-card>
        </div>
    </div>
@endsection


{{-- @extends('layouts.app')
​
@section('title')
<title>Add New Users</title>
@endsection
​
@section('content')
<div class="row">
    <div class="col-md-12">
        <x-card>
            @slot('title')

            @endslot

            @if (session('error'))
            <x-alert type="danger">
                {!! session('error') !!}
            </x-alert>
            @endif

            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                        required>
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                        required>
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                        <option value="">Pilih</option>
                        @foreach ($role as $row)
                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('role') }}</p>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-send"></i> Simpan
                    </button>
                </div>
            </form>
            @slot('footer')
            ​
            @endslot
        </x-card>
    </div>
</div>
@endsection --}}
