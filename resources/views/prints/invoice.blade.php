@extends('prints.master')
@section('header')
    <table>
        <tbody>
        <tr>
            <td rowspan="2" class="left"><img src="{{ public_path('assets/logo.jpg') }}" width="3000px" height="auto"></td>
            <td width="15%"></td>
            <td width="20%" class="left big">INVOICE</td>
        </tr>
        <tr>
            <td class="left">Date</td>
            <td class="left">: {{ $data['tanggal'] }}</td>
        </tr>
        <tr>
            <td class="small left">MOBILE. 08129043589/0215526929 <br>EMAIL. Gunungkencanajs@gmail.com</td>
            <td class="left">NUMBER#</td>
            <td class="left">: {{ strtoupper(trim($data['no_invoice'])) }}</td>
        </tr>
        </tbody>
    </table>
@endsection
@section('content')
    <div class="content">
        <table>
            <tbody>
            <tr>
                <td class="title" width="20%">Client</td>
                <td width="10%">:</td>
                <td>{{ strtoupper($data['client']) }}</td>
            </tr>
            <tr>
                <td class="title" width="20%">Venue</td>
                <td width="10%">:</td>
                <td>{{ strtoupper($data['venue']) }}</td>
            </tr>
            <tr>
                <td class="title" width="20%">Product</td>
                <td width="10%">:</td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <table id="table_product">
            <tbody>
            <tr class="row-head">
                <td>No.</td>
                <td>Description</td>
                <td>Quantity</td>
                <td class="center">Price</td>
            </tr>
            @php
            $total = 0;
            @endphp
            @foreach($data['products'] as $product)
                <tr>
                    <td class="top">{{ $loop->iteration }}</td>
                    <td class="top">{!! nl2br($product['description']) !!}</td>
                    <td class="top">{{ $product['quantity'] }}</td>
                    <td class="center top">{{ number_format($product['price'], 0) }}</td>
                </tr>
                @php $total += $product['quantity'] * $product['price'];@endphp
            @endforeach
            <tr class="row-foot">
                <td colspan="3"><strong>Total</strong></td>
                <td class="center">{{ number_format($total, 0) }}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
            <tr>
                <td class="title" width="20%">Note</td>
                <td width="10%">:</td>
                <td>{!! nl2br($data['note']) !!}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
            <tr>
                <td width="70%">
                    <span class="title">Approved By:</span>
                    <br>
                    Client:
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    ({{ strtoupper($data['client']) }})
                </td>
                <td>
                    <span class="title">Prepared By:</span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    (LIE JESTIN)
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('css')
<style>
    body {
        margin-top: 1300px;
    }
</style>
@endpush