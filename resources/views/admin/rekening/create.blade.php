@extends('admin.layouts.master')

<body>

  <!-- ======= Header ======= -->
@section('header')

  <!-- ======= Sidebar ======= -->
@section('sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Input Rekening</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Data Rekening</li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form action="{{ route('rekening.store') }}" method="POST">

                @csrf

                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                  </div>

                  <!-- error message untuk title -->
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="row mb-3">
                    <label for="atas_nama" class="col-sm-2 col-form-label">Atas Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" name="atas_nama" value="{{ old('atas_nama') }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('atas_nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="no_rekening" class="col-sm-2 col-form-label">No. Rekening</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" value="{{ old('no_rekening') }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('no_rekening')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('rekening.index') }}" class="btn btn-md btn-danger">Kembali</a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @section('footer')

    @endsection

</body>

</html>