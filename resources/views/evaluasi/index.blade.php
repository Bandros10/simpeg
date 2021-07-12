@extends('layouts.app')
@section('title')
<title>Evaluasi Kerja</title>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <x-card>
            @slot('title')
            Tambah
            @endslot
            <form action="{{route('evaluasi.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Keterangan</label>
                    <textarea type="text" name="keterangan"
                    class="form-control {{ $errors->has('keterangan') ? 'is-invalid':'' }}" id="keterangan"
                    required></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Bobot</label>
                    <input type="number" name="bobot" class="form-control {{ $errors->has('bobot') ? 'is-invalid':'' }}"
                        id="bobot" required>
                </div>
                <button class="btn btn-primary">Simpan</button>
                @slot('footer')

                @endslot
            </form>
        </x-card>
    </div>
    <div class="col-md-8">
        <x-card>
            @slot('title')
            List Role
            @endslot

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Keterangan</td>
                            <td>Bobot</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($data as $evaluasi)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $evaluasi->keterangan }}</td>
                            <td>{{ $evaluasi->bobot }}</td>
                            <td>
                                <form action="{{route('evaluasi.destroy',$evaluasi->id_evaluasi)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            ​
            <div class="float-right">
                {!! $data->links() !!}
            </div>
            @slot('footer')
            ​
            @endslot
        </x-card>
    </div>
</div>


@endsection
