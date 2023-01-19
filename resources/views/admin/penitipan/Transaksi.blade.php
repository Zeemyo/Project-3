@extends('Layout.main')

@section('container')
    <h1 class="mb-5 text-center">Transactions</h1>

    <table class="table table-white text-white text-center mt-3" width="100%">
        <thead>
            <tr>
                <td>Nomor Order</td>
                <td>VA Number</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id_penitipan }}</td>
                    <td>{{ $transaction->midtrans_va_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
