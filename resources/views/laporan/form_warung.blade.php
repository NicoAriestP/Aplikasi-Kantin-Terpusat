<div class="modal fade" id="modal-form-warung" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('laporan.index') }}" method="get" data-toggle="validator" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih Warung</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_warung" class="col-lg-2 col-lg-offset-1 control-label">Pilih Warung :</label>
                        <div class="col-lg-6">
                            <!-- <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control datepicker" required autofocus
                                value="{{ request('tanggal_awal') }}"
                                style="border-radius: 0 !important;"> -->
                            <select name="nama_warung" id="nama_warung" class="form-control" required>
                                <option value="">Pilih Warung</option>
                                @foreach ($warung as $key => $item)
                                    <option value="{{ request('nama_warung') }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
