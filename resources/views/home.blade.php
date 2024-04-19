@extends('layouts.main')
@section('title', 'Home')
@section('active-home', 'active')
@section('content')
    <style>
        @font-face {
            font-family: 'Plus Jakarta Sans';
            src: url('fonts/PlusJakartaSans-Medium.ttf');
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .back-image {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            filter: blur(2px);
        }
        .card-header{
            color: #FFFFFF;
        }
    </style>
    <div class="container">
        <div class="text-center">
            <h2 class="mt-3"><img class="header" src="{{ asset('images/FutsaLoka.png') }}" style="width: 200px;"> Surabaya</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card mt-2 mb-3">
                    <div class="card-body">
                        <h3 class="mb-3"><span><strong>Pricelist</strong></span> Lapangan</h3>
                        <div class="mb-4">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header text-center bg-dark">
                                        Lapangan <span><strong>Indoor</strong></span>
                                    </div>
                                    <div class="card-body text">
                                        <h5 class="card-title">Reguler</h5>
                                        <p class="card-text">Rp 300.000/jam</p>
                                        <h5 class="card-title">Matras</h5>
                                        <p class="card-text">Rp 250.000/jam</p>
                                        <h5 class="card-title">Rumput</h5>
                                        <p class="card-text">Rp 200.000/jam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="card">
                                <div class="card-header text-center bg-dark">
                                    Lapangan <span><strong>Outdoor</strong></span>
                                </div>
                                <div class="card-body text">
                                    <h5 class="card-title">Reguler</h5>
                                    <p class="card-text">Rp 250.000/jam</p>
                                    <h5 class="card-title">Matras</h5>
                                    <p class="card-text">Rp 200.000/jam</p>
                                    <h5 class="card-title">Rumput</h5>
                                    <p class="card-text">Rp 150.000/jam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mt-2 mb-3">
                    <div class="card-body">
                        <h3 class="mb-3"><span><strong>Ekstra</strong></span> Sewa</h3>
                        <div class="mb-4">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body text">
                                        <h5 class="card-title">Sepatu</h5>
                                        <p class="card-text">Rp 50.000/jam</p>
                                        <h5 class="card-title">Kostum</h5>
                                        <p class="card-text">Rp 45.000/jam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card mt-2 mb-3">
                    <div class="card-body">
                        <h3 class="mb-3"><span><strong>Tata Cara</strong></span> Penyewaan</h3>
                        <div class="mb-4">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body text">
                                        <ol class="mt-2.5">
                                            <li>Pilih jenis lapangan yang tersedia (Indoor/Outdoor).</li>
                                            <li>Pilih ekstra sewa yang tersedia, jika ingin menambahkan.</li>
                                            <li>Isi formulir penyewaan dengan lengkap dan benar.</li>
                                            <li>Lakukan pembayaran sesuai petunjuk yang telah diberikan.</li>
                                            <li>Tunggu konfirmasi dari pihak penyewa.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection