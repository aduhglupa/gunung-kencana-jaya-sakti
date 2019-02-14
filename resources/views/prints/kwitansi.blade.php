@extends('prints.master')
@section('header')
    <table >
        <tbody>
        <tr>
            <td rowspan="2" class="left"><img src="{{ public_path('assets/logo.jpg') }}" width="3000px" height="auto"></td>
            <td></td>
            <td class="title title-bordered left" style="vertical-align: bottom" width="13%">KWITANSI NO.</td>
            <td class="subtitle" rowspan="2">{{ $data['no_kwitansi'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td class="title left">Receipt No.</td>
        </tr>
        </tbody>
    </table>
@endsection
@section('content')
    <div class="content">
        <table>
            <tbody>
            <tr>
                <td class="title title-bordered" width="20%">Sudah Terima Dari</td>
                <td width="10%">:</td>
                <td class="subtitle"><p class="p-100">{{ strtoupper($data['terima_dari']) }}</p></td>
            </tr>
            <tr>
                <td class="title">Received From</td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
            <tr>
                <td class="title title-bordered" width="20%">Banyaknya Uang</td>
                <td width="10%">:</td>
                <td class="subtitle border-outside" rowspan="2" style="padding: 10px;"><p class="p-100">{{ number2word($data['jumlah']) }} Rupiah.</p></td>
            </tr>
            <tr>
                <td class="title">Amount Received</td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
            <tr>
                <td class="title title-bordered" width="20%">Untuk Pembayaran</td>
                <td width="10%">:</td>
                <td class="subtitle" rowspan="2"><p class="p-100">{!! nl2br($data['pembayaran']) !!}</p></td>
            </tr>
            <tr>
                <td class="title">In Payment Of</td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table>
            <tbody>
            <tr>
                <td width="5%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td class="right">Tangerang, {{ $data['tanggal'] }}</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td rowspan="2" class="border-nominal">Rp.</td>
                <td rowspan="2" class="border-nominal center">{{ number_format($data['jumlah'], 0) }}</td>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td class="right">{{ $data['nama'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('footer')
    <table>
        <tr>
            <td width="10%" style="vertical-align: top">Catatan :</td>
            <td style="vertical-align: top">
                1. Pembayaran di Transfer ke : Bank Danamon <br>
                Rek. 008800080668 Cab. Kuningan - Jakarta <br>
                A/N : PT. SUPEREX RAYA <br>
                2. Pembayaran dianggap sah setelah cek/giro telah diuangkan
            </td>
            <td width="30%"></td>
        </tr>
    </table>
@endsection