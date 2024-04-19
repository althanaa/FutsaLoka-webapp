@extends('layouts.main')
@section('title', 'History')
@section('active-hist', 'active')
@section('content')
  <style>
    @font-face{
      font-family: 'Plus Jakarta Sans';
      src: url('fonts/PlusJakartaSans-Medium.ttf');
    }
    body{
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
  <div class="">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb mt-4">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
      </ol>
    </nav>
    <div class="justify-content-center">
      <div class="card mt-4 mb-3">
        <div class="card-body">
          <h3 class="mb-3"><span><strong>Riwayat</strong></span> Transaksi</h3>
          <div class="mb-4">
            <div class="card">
              <div class="card">
                <div class="card-header bg-dark d-flex justify-content-between">
                  <div>
                    Filter tanggal
                    <input type="date" id="startDate" onchange="filterFunction()" class="form-control-sm ms-2 me-2"/>
                    s/d
                    <input type="date" id="endDate" onchange="filterFunction()" class="form-control-sm ms-2 me-2"/>
                    <button class="btn btn-secondary btn-sm" onclick="resetFilter()">Reset</button>
                  </div>
                  <div class="ms-auto">
                    Cari nama <input class="form-control-sm ms-2" type="text" id="myInputName" onkeyup="filterFunction()" placeholder="Search for names.." />
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-stripped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>No. Telp.</th>
                          <th>Sewa</th>
                          {{-- <th>Jenis</th> --}}
                          {{-- <th>Harga perjam</th> --}}
                          <th>Durasi</th>
                          <th>Waktu Checkin</th>
                          <th>Waktu Checkout</th>
                          <th>Total Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bookings as $b)
                          <tr>
                            <td class="text-nowrap">{{ $loop->iteration }}</td>
                            <td class="text-nowrap">{{ $b->name }}</td>
                            <td class="text-nowrap">{{ $b->no_tlp }}</td>
                            <td class="text-nowrap">Lapangan {{ $b->lapangan->lokasi }} - {{ $b->lapangan->jenis }}</td>
                            {{-- <td class="text-nowrap">{{ $b->lapangan->jenis }}</td> --}}
                            {{-- <td>Rp. {{ number_format($b->lapangan->price) }}</td> --}}
                            <td class="text-nowrap">{{ $b->getDuration() }}</td>
                            <td class="text-nowrap">{{ $b->getDateStart() }}</td>
                            <td class="text-nowrap">{{ $b->getDateEnd() }}</td>
                            <td class="text-nowrap">Rp {{ number_format($b->total_price) }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        function filterFunction() {
          // Declare variables
          var inputName, filterName, startDate, endDate, table, tr, tdName, tdDate, i, txtValueName, txtValueDate;
          inputName = document.getElementById("myInputName");
          filterName = inputName.value.toUpperCase();
          startDate = new Date(document.getElementById("startDate").value);
          endDate = new Date(document.getElementById("endDate").value);
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query and date range
          for (i = 0; i < tr.length; i++) {
            tdName = tr[i].getElementsByTagName("td")[1];
            tdDate = tr[i].getElementsByTagName("td")[5];
            if (tdName && tdDate) {
              txtValueName = tdName.textContent || tdName.innerText;
              txtValueDate = new Date(tdDate.textContent || tdDate.innerText);
              if (
                (txtValueName.toUpperCase().indexOf(filterName) > -1) &&
                (isNaN(startDate) || txtValueDate >= startDate) &&
                (isNaN(endDate) || txtValueDate <= endDate)
              ) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        function resetFilter() {
          // Mengatur nilai input tanggal ke null
          document.getElementById("startDate").value = "";
          document.getElementById("endDate").value = "";

          // Memanggil fungsi filterFunction() untuk memperbarui tampilan tabel
          filterFunction();
        }
      </script>
                            
    </div>
@endsection