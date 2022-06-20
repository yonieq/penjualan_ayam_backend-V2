@extends('admin.layouts.master')

<body>

  <!-- ======= Header ======= -->
@section('header')

  <!-- ======= Sidebar ======= -->
@section('sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Setting Toko</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Setting Toko</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
             @endif

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form action="{{ route('settingtoko.update', $toko->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" name="nama_toko" value="{{ old('nama_toko', $toko->nama_toko) }}" required>
                  </div>

                  <!-- error message untuk title -->
                  @error('nama_toko')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="row mb-3">
                    <label for="pemilik_toko" class="col-sm-2 col-form-label">Pemilik Toko</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('pemilik_toko') is-invalid @enderror" name="pemilik_toko" value="{{ old('pemilik_toko', $toko->pemilik_toko) }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('pemilik_toko')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                    <a href="{{ route('settingtoko.index') }}" class="btn btn-md btn-danger">Kembali</a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @section('footer')

  @endsection

</body>

</html>