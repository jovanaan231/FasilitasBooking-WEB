<?php $this->load->view('admin/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Verifikasi Peminjaman</h3>
            </div>
            <div class="box-body">
                <form data-parsley-validate action="<?php echo base_url('data_peminjaman_pinjam/aksiverifikasi') ?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="peminjaman_id" value="<?php echo $peminjaman[0]->peminjaman_id ?>">
                            <input type="text" readonly value="<?php echo $peminjaman[0]->nama_lengkap ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Fasilitas</label>
                            <input type="text" readonly value="<?php echo $peminjaman[0]->nama_fasilitas ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" readonly value="<?php echo $peminjaman[0]->nama_kategori ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="text" readonly value="<?php echo $this->modelku->format_tanggal($peminjaman[0]->tanggal) ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Sampai</label>
                            <input type="text" readonly value="<?php echo $this->modelku->format_tanggal($peminjaman[0]->tanggal) ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Kegiatan</label>
                            <textarea type="text" rows="5" readonly value="<?php echo $peminjaman[0]->deskripsikegiatan ?>" class="form-control" required><?php echo $peminjaman[0]->deskripsikegiatan ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Bukti Pernyataan</label>
                            <br><br>
                            <img width="400" src="<?php echo base_url('upload/' . $peminjaman[0]->bukti) ?>">
                        </div>
                        <div class="form-group">
                            <label>Aksi</label>
                            <select class="form-control" id="aksi" name="status" required>
                                <option value="">Pilih Aksi</option>
                                <option value="1">Setuju</option>
                                <option value="2">Tolak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alasan Di Tolak</label>
                            <textarea name="keteranganditolak" id="reject" class="form-control" placeholder="Alasan Di Tolak" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <button class="btn btn-info" type="submit">Simpan</button>
                            <a class="btn btn-default" href="<?php echo base_url('data_peminjaman_pinjam') ?>">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#aksi').change(function() {
            if ($(this).val() === '2') {
                $('#reject').attr('disabled', false);
            } else {
                $('#reject').attr('disabled', 'disabled');
            }
        });

    });
</script>
<?php $this->load->view('admin/footer') ?>