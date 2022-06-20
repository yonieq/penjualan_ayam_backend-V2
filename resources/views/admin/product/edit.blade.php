@extends('admin.layouts.master')

<body>

  <!-- ======= Header ======= -->
@section('header')

  <!-- ======= Sidebar ======= -->
@section('sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Input Data Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Data Product</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $products->name) }}" required>
                  </div>

                  <!-- error message untuk title -->
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $products->image) }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="desc" class="col-sm-2 col-form-label">Kererangan</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required>{{ old('desc', $products->desc) }}</textarea>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $products->price) }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="weigth" class="col-sm-2 col-form-label">Berat</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error('weigth') is-invalid @enderror" name="weigth" value="{{ old('weigth', $products->weigth) }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('weigth')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="weigth" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok', $products->stok) }}" required>
                    </div>
  
                    <!-- error message untuk title -->
                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                    <a href="{{ route('product.index') }}" class="btn btn-md btn-danger">Kembali</a>
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