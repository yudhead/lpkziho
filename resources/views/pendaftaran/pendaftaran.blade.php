@extends('layout.index')
@section('content')

  <div class="content">


    <div class="content_inner">

      <div class="title title_on_bottom with_image" style="">
        <div class="image responsive">
          <link href="{{ asset('assets/wp-includes/css/pendaftaran.min84fc.css') }}" rel="stylesheet">
        </div>
        <div class="title_holder">
          <div class="container">
            <div class="container_inner clearfix">
              <div class="title_on_bottom_wrap">
                <div class="title_on_bottom_holder">
                  <div class="title_on_bottom_holder_inner">

                    <h1><span>PENDAFTARAN</span></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container">
        <div class="container_inner clearfix">

          <div class="vc_row wpb_row " style="text-align:left;">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                  <h3 style="text-align: left" class="vc_custom_heading"><strong> FORM PENDAFTARAN </strong> </h3>
                  <div class="separator normal"></div>

                  <!-- Your registration form content -->
                  <form method="POST" action="{{ url('pendaftaran') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Isi form di sini -->

                    <label for="harie">Durasi Pelatihan:</label>
                    <select id="harie" name="harie" class="@error('harie') is-invalid @enderror" required>
                      <option value="6 hari">6 Hari</option>
                      <option value="10 hari">10 Hari</option>
                      <option value="15 hari">15 Hari</option>
                    </select>


                    @error('pelatihan')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <div id="harieInput" class="small-input-container" style="display:none;">
                      <div class="form-group">
                        <label for="foto_ijazah">Foto Ijazah:</label>
                        <input type="file" id="foto_ijazah" name="foto_ijazah" style="display:flex"
                          class="small-input @error('foto_ijazah') is-invalid @enderror" accept="image/*">
                        @error('foto_ijazah')
                          <span class="text-danger full-width">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="pas_foto">Pas Foto:</label>
                        <input type="file" id="pas_foto" name="pas_foto" style="display:flex"
                          class="small-input @error('pas_foto') is-invalid @enderror" accept="image/*">
                        @error('pas_foto')
                          <span class="text-danger full-width">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror



                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    @error('email')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="nohp">Nomor HP:</label>
                    <input type="text" id="nohp" name="nohp" required>
                    @error('nohp')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="@error('jenis_kelamin') is-invalid @enderror"
                      required>
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="pelatihan">Jenis Pelatihan:</label>
                    <select id="pelatihan" name="pelatihan" class="@error('pelatihan') is-invalid @enderror" required>
                      <option value="">Pilih Jenis Pelatihan</option>
                      @foreach ($programStudies as $programStudy)
                        <option value="{{ $programStudy->kode_program_studi }}">{{ $programStudy->nama_program_studi }}
                        </option>
                      @endforeach
                    </select>
                    @error('pelatihan')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" required>
                    @error('alamat')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="sekolah">Pendidikan Terakhir:</label>
                    <input type="text" id="sekolah" name="sekolah" required>
                    @error('sekolah')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="agama">Agama:</label>
                    <input type="text" id="agama" name="agama" required>
                    @error('agama')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="kota_lahir">Kota Kelahiran:</label>
                    <input type="text" id="kota_lahir" name="kota_lahir" required>
                    @error('kota_lahir')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="tgl_lahir">Pilih Tanggal Lahir:</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="YYYY-MM-DD">
                    @error('tgl_lahir')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="foto_ktp">Foto KTP:</label>
                    <input type="file" id="foto_ktp" name="foto_ktp" accept="image/*" required>



                    <p>Contoh Foto KTP:</p>
                    <img src="{{ asset('storage/fotocontoh/ktp.png') }}" alt="Contoh Foto KTP">

                    @error('foto_ktp')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror


                    <label for="nik">NIK:</label>
                    <input type="text" id="nik" name="nik" required>
                    @error('nik')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror


                    <label for="tanggal_terbit">Tanggal Terbit:</label>
                    <input type="date" id="tanggal_terbit" name="tanggal_terbit" placeholder="YYYY-MM-DD">
                    @error('tanggal_terbit')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror

                    <label for="tanggal_berakhir">Tanggal Berakhir:</label>
                    <input type="text" id="tanggal_berakhir" name="tanggal_berakhir"
                      placeholder="YYYY-MM-DD atau 'seumur hidup'" value="{{ old('tanggal_berakhir') }}">
                    @error('tanggal_berakhir')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror


                    <label for="nama_ibu">Nama Ibu Kandung:</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" required>
                    @error('nama_ibu')
                      <span class="text-danger full-width">{{ $message }}</span>
                    @enderror


                    <form action="proses.php" method="POST">
                      <label for="pekerjaan">Status Pekerjaan:</label>
                      <select id="pekerjaan" name="pekerjaan" class="@error('pekerjaan') is-invalid @enderror"
                        required>
                        <option value="">Pilih Jenis Pekerjaan</option>
                        <option value="Bekerja">Bekerja</option>
                        <option value="FreeLance">FreeLance</option>
                        <option value="Mencari_Kerja">Mencari Pekerjaan</option>
                      </select>
                      @error('pekerjaan')
                        <span class="text-danger full-width">{{ $message }}</span>
                      @enderror

                      <div id="bekerjaInput" class="small-input-container" style="display:none;">
                        <label for="bekerja_detail">Detail Pekerjaan:</label>
                        <input type="text" id="bekerja_detail" name="bekerja_detail" style="display:block"
                          class="small-input @error('bekerja_detail') is-invalid @enderror">
                        @error('bekerja_detail')
                          <span class="text-danger full-width">{{ $message }}</span>
                        @enderror
                      </div>

                      <div id="freelanceInput" class="small-input-container" style="display:none;">
                        <label for="freelance_detail">Detail Pekerjaan FreeLance:</label>
                        <input type="text" id="freelance_detail" name="freelance_detail" style="display:block"
                          class="small-input @error('freelance_detail') is-invalid @enderror">
                        @error('freelance_detail')
                          <span class="text-danger full-width">{{ $message }}</span>
                        @enderror
                      </div>

                      <button type="submit">Simpan</button>


                      <script>
                        document.getElementById('harie').addEventListener('click', function() {
                          var harieInput = document.getElementById('harieInput');
                          if (this.value === '15 hari') {
                            harieInput.style.display = 'contents';
                          } else if (this.value === '10 hari') {
                            harieInput.style.display = 'contents';
                          } else {
                            harieInput.style.display = 'none';
                          }
                        });

                        document.getElementById('pekerjaan').addEventListener('click', function() {
                          var pekerjaan = this.value;
                          var bekerjaInput = document.getElementById('bekerjaInput');
                          var freelanceInput = document.getElementById('freelanceInput');

                          if (pekerjaan === 'Bekerja') {
                            bekerjaInput.style.display = 'block';
                            freelanceInput.style.display = 'none';
                          } else if (pekerjaan === 'FreeLance') {
                            bekerjaInput.style.display = 'none';
                            freelanceInput.style.display = 'block';
                          } else {
                            bekerjaInput.style.display = 'none';
                            freelanceInput.style.display = 'none';
                          }
                        });
                      </script>
                    </form>
                  </form>
                  @if (session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div>
                  @endif

                  @if (session('error'))
                    <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div id="toast-container" class="toast-container position-fixed p-3"
        style="top: 20px; right: 20px; z-index: 1050">
        <div id="toast-success" class="toast bg-success text-white" role="alert" aria-live="assertive"
          aria-atomic="true" data-delay="5000">
          <div class="toast-body">
            Registrasi berhasil disimpan!
          </div>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          @if (session('success'))
            // Show success toast
            var toastSuccess = document.getElementById('toast-success');
            var toast = new bootstrap.Toast(toastSuccess);
            toast.show();
          @endif
        });
      </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var textInput = document.getElementById('tanggal_berakhir');

        textInput.addEventListener('dblclick', function() {
            textInput.type = 'date';
            textInput.placeholder = 'YYYY-MM-DD';
        });

        textInput.addEventListener('blur', function() {
            if (textInput.type === 'date' && textInput.value === '') {
                textInput.type = 'text';
                textInput.placeholder = "YYYY-MM-DD atau 'seumur hidup'";
            }
        });
    });
</script>

    </div>
  </div>
@endsection
