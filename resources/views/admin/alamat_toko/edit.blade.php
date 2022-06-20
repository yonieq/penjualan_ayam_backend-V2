@extends('admin.layouts.master')

<body>

  <!-- ======= Header ======= -->
@section('header')

  <!-- ======= Sidebar ======= -->
@section('sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Alamat Toko</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Alamat Toko</li>
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
              <form action="{{ route('alamat_toko.update', $toko->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="weigth" class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kabupaten_id" id="exampleFormControlSelect2">
                            @foreach($kabupaten as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                    <label for="weigth" class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kecamatan_id" id="exampleFormControlSelect2">
                            @foreach($kecamatan as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('kecamatan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control @error('detail') is-invalid @enderror" name="detail">{{ old('detail', $toko->detail) }}</textarea>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('detail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                    <a href="{{ route('alamat_toko.index') }}" class="btn btn-md btn-danger">Kembali</a>
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