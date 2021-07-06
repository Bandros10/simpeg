<div class="modal fade" id="add_karyawan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="{{route('data_pegawai.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" class="form-control" name="nama_depan"
                                        placeholder="Masukan Nama Depan" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nama">Nama Belakang</label>
                                    <input type="text" class="form-control" name="nama_belakang"
                                        placeholder="Masukan Nama Belakang" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan"
                                        placeholder="Jabatan pegawai" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option selected disabled>- Status -</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control" required>
                                        <option selected disabled>- Agama -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="kristen Protestan">Kristen Protestan</option>
                                        <option value="kristen Katolik">Kristen Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option selected disabled>- Jenis Kelamin -</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Alamat email" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" name="telepon" maxlength="12" placeholder="Nomer telepon" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tanggungan">Tanggungan</label>
                                    <input type="text" class="form-control" name="tanggungan"
                                        placeholder="jumlah tanggungan" required>
                                        <sup style="color: red">*ketikan 0 bila tidak memiliki tanggungan</sup>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" required></textarea>
                                <sup style="color: red">*alamat harus sesuai dengan kartu tanda penduduk</sup>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        placeholder="Tempat Lahir" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tanggal-lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pend_terkhir">Pendidikan terkhir</label>
                                    <select name="pend_terakhir" class="form-control" required>
                                        <option selected disabled>- Pendidikan Terakhir -</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP SEDERAJAT">SMP SEDERAJAT</option>
                                        <option value="SMA SEDERAJAT">SMA SEDERAJAT</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pend-ditempuh">Pendidikan Ditempuh Saat ini</label>
                                    <input type="text" class="form-control" name="pend_ditempuh"
                                        placeholder="pendidikan ditempuh">
                                    <sup style="color: red">*bila tidak sedang menempuh pendidikan kosongkan</sup>
                                </div>
                            </div>
                        </div>
                        <button type="submit" onclick="return confirm('apa data sudah benar')" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
