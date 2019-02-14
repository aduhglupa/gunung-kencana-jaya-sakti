@extends('master')
@section('content')
    {!! Form::open() !!}
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('no_invoice', 'No. Invoice') !!}
                {!! Form::text('no_invoice', null, ['class' => 'form-control required']) !!}
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
                {!! Form::label('client', 'Client') !!}
                {!! Form::text('client', null, ['class' => 'form-control required']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('venue', 'Venue') !!}
                {!! Form::text('venue', null, ['class' => 'form-control required']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-10">
            {!! Form::button('<i class="fa fa-plus"></i> Tambah', ['class' => 'btn btn-success btn-add-product']) !!}
        </div>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="table_product">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="template" class="hidden">
                        <td><span class="number"></span></td>
                        <td>{!! Form::textarea('products[][description]', null, ['class' => 'form-control required excepted', 'disabled', 'rows' => 2]) !!}</td>
                        <td>{!! Form::number('products[][quantity]', null, ['class' => 'form-control required excepted', 'disabled']) !!}</td>
                        <td>{!! Form::number('products[][price]', null, ['class' => 'form-control required excepted', 'disabled']) !!}</td>
                        <td>{!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-xs btn-delete-product']) !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('note', 'Note') !!}
                {!! Form::textarea('note', null, ['class' => 'form-control required', 'rows' => 5]) !!}
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
            {!! link_to('invoice', 'Generate', ['class' => 'btn btn-primary btn-generate', 'target' => '_blank']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('js')
{!! Html::script('js/kwitansi.js') !!}
<script>
    $(document).ready(function () {
        Kwitansi.initFormInvoice();
    });
</script>
@endpush