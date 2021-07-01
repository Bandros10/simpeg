@extends('layouts.app')

@section('title')
<title>Users</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <x-card>
            @slot('title')
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah Baru</a>
            @endslot

            @if (session('success'))
            <x-alert type="success">
                {!! session('success') !!}
            </x-alert>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($users as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                @foreach ($row->getRoleNames() as $role)
                                <label for="" class="badge badge-info">{{ $role }}</label>
                                @endforeach
                            </td>
                            <td>
                                <label class="badge badge-success">Aktif</label>
                            </td>
                            <td>
                                @if (auth()->user()->can('edit')||auth()->user()->can('delete'))
                                <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('users.roles', $row->id) }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-user-secret"></i></a>
                                    <a href="{{ route('users.edit', $row->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @slot('footer')
            ​
            @endslot
        </x-card>
    </div>
</div>
@endsection
