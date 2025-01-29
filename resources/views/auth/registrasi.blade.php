<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">

                  <div class="card mb-3">

                    <div class="card-body">

                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                        <p class="text-center small">Enter your personal details to create account</p>
                      </div>

                      <form class="row g-3 needs-validation" action="{{route('store.regis')}}" method="POST" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="yourName" class="form-label">NIS</label>
                                    <input type="text" name="nis" class="form-control @error('nis')
                                    is-invalid
                                    @enderror" id="yournis" required>
                                    @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                  <label for="yourName" class="form-label">Nama</label>
                                  <input type="text" name="nama" class="form-control @error('nama')
                                    is-invalid
                                  @enderror" id="yourName" required>
                                  @error('nama')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                    </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Jurusan</label>
                                    <select name="jurusan" class="form-select @error('jurusan')
                                    is-invalid
                                    @enderror" aria-label="Default select example">
                                    <option selected disabled>Choose...</option>
                                    @foreach($jurusan as $s)
                                    <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email')
                                      is-invalid
                                    @enderror" id="yourEmail" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password')
                                      is-invalid
                                    @enderror" id="yourPassword" required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="" class="form-label">Sekolah</label>
                                    <select name="sekolah" class="form-select @error('sekolah')
                                    is-invalid
                                    @enderror" aria-label="Default select example">
                                    <option selected disabled>Choose...</option>
                                    @foreach($sekolah as $s)
                                    <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="" class="form-label">Guru</label>
                            <select name="guru" class="form-select @error('guru')
                            is-invalid
                            @enderror" aria-label="Default select example">
                            <option selected disabled>Choose...</option>
                            @foreach($guru as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                          <label for="yourUsername" class="form-label">No Handphone</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp')
                            is-invalid
                            @enderror" required>
                            @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat')
                            is-invalid
                            @enderror" placeholder="Masukan Alamat"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Create Account</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Sudah Punya Akun? <a href="{{route('login')}}">Log in</a></p>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>

          </section>

        </div>
    </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{url('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{url('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{url('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{url('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{url('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('assets/js/main.js')}}"></script>

</body>

</html>
