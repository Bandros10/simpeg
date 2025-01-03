@extends('layouts.app')

@section('title')
<title>Users</title>
@endsection

@section('css')
<style type="text/css">
    .tab-pane {
        height: 150px;
        overflow-y: scroll;
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <x-card>
            @slot('title')
            <h4 class="card-title">Add New Permission</h4>
            @endslot
            ​
            <form action="{{ route('users.add_permission') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <select type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                        <option disabled selected>-Pilih Permission-</option>
                        <option value="edit">Edit</option>
                        <option value="delete">Delete</option>
                    </select>
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">
                        Add New
                    </button>
                </div>
            </form>
            @slot('footer')
            ​
            @endslot
        </x-card>
    </div>
    <div class="col-md-8">
        <x-card>
            @slot('title')
            Set Permission to Role
            @endslot
            ​
            @if (session('success'))
            <x-alert type="success">
                {{ session('success') }}
            </x-alert>
            @endif

            <form action="{{ route('users.roles_permission') }}" method="GET">
                <div class="form-group">
                    <label for="">Roles</label>
                    <div class="input-group">
                        <select name="role" class="form-control">
                            @foreach ($roles as $value)
                            <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>
                                {{ $value }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-danger">Check!</button>
                        </span>
                    </div>
                </div>
            </form>

            @if (!empty($permissions))
            <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">Permissions</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                @php $no = 1; @endphp
                                @foreach ($permissions as $key => $row)
                                <input type="checkbox" name="permission[]" class="minimal-red" value="{{ $row }}"
                                    {{ in_array($row, $hasPermission) ? 'checked':'' }}> {{ $row }} <br>
                                @if ($no++%4 == 0)
                                <br>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-send"></i> Set Permission
                    </button>
                </div>
            </form>
            @endif
            @slot('footer')

            @endslot
        </x-card>
    </div>
</div>
@endsection
