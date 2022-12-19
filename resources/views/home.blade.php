@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex flex-column align-items-center">
                         <a href="adminpanel/ordercasing"><button class="btn-lg btn-info btn mt-5" style="color:white">Order Casing</button></a>
                         <a href="adminpanel/orderaksesoris"><button class="btn-lg btn-info btn mt-5" style="color:white">Order Aksesoris</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
