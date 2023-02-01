<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('dashboard') }}" method="get" data-toggle="validator" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih Warung</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id_warung" class="col-lg-2 col-lg-offset-1 control-label">Daftar Warung :</label>
                        <div class="col-lg-6">
                            <select name="id_warung" id="id_warung" class="form-control" required>
                                <option selected value="{{ request('id_warung') }}">
                                    {{ $namaWarungDipilih ?? 'Pilih Warung' }}
                                </option>
                                @foreach ($allWarung as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
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
