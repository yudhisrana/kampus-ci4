<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li>Master Data Admin</li>
            <li class="active">Input Data Admin</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Input Admin</h3>
                    <hr />

                    <!-- form -->
                    <form action="<?= base_url('admin/simpan-admin'); ?>" method="post">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Admin</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Admin" required>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label for="username">Username Admin</label>
                            <input type="text" class="form-control" onkeypress="return goodchars(event, 'abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890', this)" name="username" id="username" placeholder="Masukan Username Admin" required>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label for="level">Akses Level</label>
                            <select class="form-control" name="level" id="level" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="2">Kepala Perpustakaan</option>
                                <option value="3">Admin Perpustakaan</option>
                            </select>
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>