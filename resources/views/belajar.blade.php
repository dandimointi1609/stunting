<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Form Dinamis</title>
  </head>
  <body class="bg-secondary text-white">
    <div class="container">
      <h1 class="text-center mt-5">Dropdown Dinamis Dengan Laravel Jquery Ajax</h1>
      <hr />
      <form>
      <div class="row mb-3">
      <div class="col-3">
        <label  class="form-label">Kabupaten</label>
        </div>
        <div class="col-9">
          <select class="form-select form-select-lg" name="kecamatan" id="kecamatan">
            <option selected>---Pilih Kecamatan---</option>
            @foreach ($kecID as $r_kec)
                <option  value="{{$r_kec->kd_kecamatan}}">{{$r_kec->nama_kecamatan}}</option>
            @endforeach
          </select>
          </div>
        </div>
 
 
        <div class="row mb-3">
        <div class="col-3">
        <label  class="form-label">Desa</label>
        </div>
        <div class="col-9">
          <select class="form-select form-select-lg" name="desa" id="desa">
            <option selected>---Pilih Desa---</option>
          </select>
        </div>
        </div>
 
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{url('wilayah.js')}}"></script>
  </body>
</html>