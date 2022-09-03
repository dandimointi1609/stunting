<div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Vertical Form</h4>
                                <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" placeholder="Apartment, studio, or floor">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected="selected">Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Zip</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Check me out</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                               {{-- <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                                <form class="form-valide" action="/balita" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama"><b>Nama Balita</b></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_balita" placeholder="Masukan Nama" name="nama_balita" value="{{ old('nama_balita') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jenis kelamin"><b>Kelamin</b></label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                                <option value=""></option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                </div>


                                <div class="form-group row"{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                                    <div class="col-md-3">
                                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row" {{ $errors->has('bb_lahir') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="nama_puskes" >BB lahir</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="bb_lahir" name="bb_lahir">
                                    </div>
                                </div>

                                <div class="form-group row" {{ $errors->has('tb_lahir') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="nama_puskes">TB Lahir</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="tb_lahir" name="tb_lahir">
                                    </div>
                                </div>

                                <div class="form-group row" {{ $errors->has('nama_ortu') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="nama_puskes">Nama orang tua</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
                                    </div>
                                </div>


                                <div class="form-group row" {{ $errors->has('id_puskes') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="id_puskes">Puskesmas
                                    </label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                        <input  class="form-control" id="id_puskes" type="hidden" name="id_puskes" value="{{ old('id_puskes') }}" readonly="" required >
                                        <input type="text" class="form-control" id="nama_puskes" type="text" name="nama_puskes" value="{{ old('nama_puskes') }}" required readonly="" >
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><span class="fa fa-search"></span></button>
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row" {{ $errors->has('alamat') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="nama_puskes">Alamat</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                </div>

                                <div class="form-group row" {{ $errors->has('kode_desa') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="kode_desa">Desa
                                    </label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                        <input  class="form-control" id="kd_desa" type="" name="kode_desa" value="{{ old('kode_desa') }}" readonly="" required >
                                        <input type="text" class="form-control" id="nama_desa" type="text" name="nama_desa" value="{{ old('nama_desa') }}" required readonly="" >
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"></span></button>
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row"{{ $errors->has('tgl_pengukuran') ? ' has-error' : '' }}">
                                    <label class="col-lg-4 col-form-label" for="tgl_pengukuran" class="col-md-4 control-label">Tanggal Pengukuran</label>
                                    <div class="col-md-3">
                                    <input id="tgl_pengukuran" type="date" class="form-control" name="tgl_pengukuran" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" >
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_pengukuran') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="bb"><b>Berat Badan(kg)</b></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="bb" placeholder="Masukan Berat Badan" name="bb" value="{{ old('bb') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="tb"><b>Tinggi Badan(cm)</b></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="tb" placeholder="Masukan Tinggi Badan" name="tb" value="{{ old('tb') }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="Hasil"><b>Hasil</b></label>
                                        <div class="col-md-3">
                                        <select class="form-control" name="hasil" value="{{ old('hasil') }}">
                                            <option value=""></option>
                                            <option value="pendek">Pendek</option>
                                            <option value="sangatpendek">Sangat Pendek</option>
                                        </select>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}