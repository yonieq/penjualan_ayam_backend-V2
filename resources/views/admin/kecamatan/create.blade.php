@extends('admin.layouts.master')

<body>

  <!-- ======= Header ======= -->
@section('header')

  <!-- ======= Sidebar ======= -->
@section('sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Input Kecamatan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Data Kecamatan</li>
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
              <form action="{{ route('kecamatan.store') }}" method="POST">

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
                    <label for="kabupaten_id" class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                      <select name="kabupaten_id" class="form-control @error('kabupaten_id') is-invalid @enderror" required>
                          <option value="">======= Pilih Kabupaten =======</option>
                          @foreach ($kabupaten as $item)
                          <option value="{{ old('name',$item->id) }}">{{ old('name',$item->name) }}</option>
                          @endforeach
                      </select>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('kabupaten_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Ongkir</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error('ongkir') is-invalid @enderror" name="ongkir" value="{{ old('ongkir') }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('ongkir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kecamatan.index') }}" class="btn btn-md btn-danger">Kembali</a>
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