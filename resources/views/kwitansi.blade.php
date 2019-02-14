@extends('master')
@section('content')
    {!! Form::open() !!}
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('no_kwitansi', 'No. Kwitansi') !!}
                {!! Form::number('no_kwitansi', null, ['class' => 'form-control required']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('terima_dari', 'Sudah Terima Dari') !!}
                {!! Form::text('terima_dari', null, ['class' => 'form-control required']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('jumlah', 'Banyaknya Uang') !!}
                {!! Form::number('jumlah', null, ['class' => 'form-control required']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('tanggal', 'Tanggal Pembuatan') !!}
                <div class="input-group datetimepicker">
                    {!! Form::text('tanggal', date('d-m-Y'), ['class' => 'form-control required']) !!}
                    <span class="input-group-addon">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('nama', 'Penanda Tangan') !!}
                {!! Form::text('nama', null, ['class' => 'form-control required']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('pembayaran', 'Untuk Pembayaran') !!}
                {!! Form::textarea('pembayaran', null, ['class' => 'form-control required', 'rows' => 5]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! link_to('kwitansi', 'Generate', ['class' => 'btn btn-primary btn-generate', 'target' => '_blank']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('js')
{!! Html::script('js/kwitansi.js') !!}
<script>
    $(document).ready(function () {
        Kwitansi.initFormKwitansi();
    });
</script>
@endpush