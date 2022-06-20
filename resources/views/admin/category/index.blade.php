@extends('admin.layouts.master')

<body>
@include('sweetalert::alert')
  <!-- ======= Header ======= -->
@section('header')
  <!-- End Header -->

@section('sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Data Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Kategori</h5>
              <a href="{{ route('category.create') }}" class="btn btn-md btn-primary mb-3 float-right">Tambah Data</a>
              {{-- <a href="customer-pdf" target="_blank" class="btn btn-md btn-secondary mb-3 float-right">Export PDF</a>
              <a href="customer-excel" target="_blank" class="btn btn-md btn-success mb-3 float-right">Export Excel</a> --}}

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @forelse ($categories as $item)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{$item->name}}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('category.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('category.edit', $item->id) }}"
                                class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                  </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="13">Data tidak tersedia</td>
                </tr>
                @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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