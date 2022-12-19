@extends('layouts.app')

@section('content')
<div class="container box-facility d-flex align-items-center justify-content-center flex-column">
    <table id="example" class="w-100 table table-striped " style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="10%">Kode Order</th>
                <th width="10%">Nama Pembeli</th>
                <th width="10%">Voucher</th>
                <th width="10%">Pembayaran</th>
                <th width="10%">Diskon</th>
                <th width="10%">Ongkir</th>
                <th width="10%">Harga Total</th>
                <th width="10%">Address</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0;  @endphp
            @foreach($data as $dat)
            @php
                $i++;
            @endphp
            <tr class="text-center">
                <td class="text-center align-middle">{{ $dat['kode_order'] }}</td>
                <td class="text-center align-middle">{{ $dat['id_user'] }}</td>
                <td class="text-center align-middle">{{ $dat['voucher'] }}</td>
                <td class="text-center align-middle">{{ $dat['pembayaran'] }}</td>
                <td class="text-center align-middle">{{ $dat['ongkir'] }}</td>
                <td class="text-center align-middle">{{ $dat['diskon'] }}</td>
                <td class="text-center align-middle">{{ $dat['harga_total'] }}</td>
                <td class="text-center align-middle">{{ $dat['address'] }}</td>
                <td>
                    <p>{{ $dat['status'] }}</p>
                    <form action="statusAksesoris" method="POST" class="d-flex">
                        @csrf
                        <input type="hidden" name="id" value="{{ $dat['id'] }}">
                        <select name="status" id="status">
                            <option value="">status</option>
                            <option value="konfirmasi_pembayaran">Konfirmasi Pembayaran</option>
                            <option value="pesanan_diterima">Pesanan Diterima</option>
                            <option value="progress">Sedang diproses</option>
                            <option value="pengiriman">Pengiriman</option>
                            <option value="order_selesai">Order Selesai</option>
                        </select>
                        <input type="submit" class="btn btn-sm btn-danger" value="change">
                    </form>
                </td>
            </tr>
            @endforeach
    </tbody>
    </table>
</div>
@endsection
