@extends('layouts.app')

@section('title')
<title>Users</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('users.set_role', $user->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <x-card>
                @slot('title')
                Set Role
                @endslot

                @if (session('success'))
                <x-alert type="success">
                    {{ session('success') }}
                </x-alert>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>:</td>
                                <td>
                                    @foreach ($roles as $row)
                                    <input type="radio" name="role" {{ $user->hasRole($row) ? 'checked':'' }}
                                        value="{{ $row }}"> {{  $row }} <br>
                                    @endforeach
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                @slot('footer')
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm float-right">
                        Set Role
                    </button>
                </div>
                @endslot
            </x-card>
        </form>
    </div>
</div>
@endsection
