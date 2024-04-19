@extends('layouts.main')
@section('title', 'Booking')
@section('active-book', 'active')
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
        h4{
            color: #FFFFFF;
        }
    </style>
    <main class="pt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mt-2">
                <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card mt-2 mb-3">
                    <div class="card-body">
                        <h3 class="mb-3"><span><strong>Booking</strong></span> Lapangan</h3>
                        @if (session('failed-booking')[0] ?? false)
                            <div class="alert alert-danger col-log-11" role="alert">
                                Jadwal yang Anda masukkan telah dipesan oleh seseorang, harap memasukkan jadwal booking yang lain!
                            </div>
                        @endif
                        <div class="mb-4">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('booking.post') }}" method="POST">
                                            @csrf
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="name">Nama</label>
                                                                {{-- <input required type="text" name="name" class="form-control" value="{{old('name')}}"> --}}
                                                                <input required type="text" name="name" class="form-control" value="{{ old('name') }}" pattern="[A-Za-z\s\-']+" title="Hanya huruf, spasi, tanda hubung, dan petik tunggal yang diperbolehkan" minlength="5" maxlength="100">
                                                            </div>
                                                            </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="no_tlp">No. Telp.</label>
                                                                <input required type="number" name="no_tlp" class="form-control" value="{{old('no_tlp')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="lokasi">Lokasi</label>
                                                                <select name="lokasi" class="form-select" id="lokasi" required value="{{old('lokasi')}}">
                                                                    <option value="" disabled selected>-- Pilih Lokasi --</option>
                                                                    <option value="indoor" @selected(old('lokasi') == 'indoor')>Indoor</option>
                                                                    <option value="outdoor" @selected(old('lokasi') == 'outdoor')>Outdoor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="jenis">Tipe</label>
                                                                <select required name="jenis" class="form-select" id="jenis">
                                                                    <option value="" disabled selected>-- Pilih Tipe --</option>
                                                                    <option value="reguler"  @selected(old('jenis') == 'reguler')>Reguler</option>
                                                                    <option value="matras" @selected(old('jenis') == 'matras')>Matras</option>
                                                                    <option value="rumput" @selected(old('jenis') == 'rumput')>Rumput</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Waktu Chekin</label>
                                                                <input required type="datetime-local" class="form-control" name="date_start" value="{{ old('date_start') }}" min="{{ date('Y-m-d\TH:i') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Waktu Checkout</label>
                                                                <input required type="datetime-local" class="form-control" name="date_end" value="{{ old('date_end') }}" min="{{ date('Y-m-d\TH:i') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mt-1 mb-3">
                                                        <div class="card-header bg-dark">
                                                            *Tambahan <span><strong>Sewa</strong></span>
                                                        </div>
                                                        <div class="card-body text">
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="sewa_sepatu" id="sewa_sepatu" class="form-check-input" @checked(old('sewa_sepatu'))>
                                                                <label class="form-check-label" for="sewa_sepatu">Sepatu Rp 50.000/jam</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="sewa_kostum" id="sewa_kostum" class="form-check-input">
                                                                <label class="form-check-label" for="sewa_kostum">Kostum Rp 45.000/jam</label>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-dark w-100 mt-1 mb-2">Checkout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mt-2 mb-3">
                    <div class="card-body">
                        <h3 class="mb-3"><span><strong>Daftar</strong></span> Booking</h3>
                        <div class="mb-4">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (session('failed-booking')[0] ?? false)
                                                    @foreach (session('failed-booking') as $b)
                                                        <tr>
                                                            <td><span><strong>{{ $b->name }}</strong></span> ({{ $b->no_tlp }})
                                                                <br>Lapangan {{ $b->lapangan->lokasi }} - {{ $b->lapangan->jenis }}
                                                                <br>Waktu checkin: {{ $b->getDateStart() }}
                                                                <br>Waktu checkout: {{ $b->getDateEnd() }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection