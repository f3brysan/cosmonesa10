@extends('front.layouts.main')
@section('title', 'Payment Checkout')

@section('body')
    <!-- Begin:: Checkout Section -->
    <section class="cartPage">
        <div class="container">
            <div class="row woocommerce">
                <div class="col-md-12">
                    <h3 id="order_review_heading">Transactions History</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Uraian</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->code }}</td>
                                        <td>{{ $transaction->note }}</td>
                                        <td class="text-right">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ ucfirst($transaction->payment_status) }}<br>
                                            @if ($transaction->payment_status == 'unpaid')
                                                {{ Carbon\Carbon::parse($transaction->void_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($transaction->payment_status == 'unpaid')
                                                <a href="{{ URL::to('checkout/'. Crypt::encrypt($transaction->id)) }}" class="btn btn-sm btn-warning">Bayar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Checkout Section -->
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
