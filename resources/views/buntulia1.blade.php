<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    table,
    th,
    td {
        border: 1px solid black;
    }
    
    th,
    td {
        padding: 10px;
    }
    
    th {
        background-color: rgb(19, 110, 170);
        color: white;
    }
    
    tr:hover {
        background-color: #f5f5f5;
    }
    </style>
    </head>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">LAPORAN : BULANAN</h4>
                        <div class="row">
                            <div class="col-sm-2 col-auto">
                                <select id="status" class="form-control">
                                    <option value="0">semua</option>
                                    <option value="1">AKAP</option>
                                    <option value="2">AKDP</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-auto"><input type="date" class="form-control form-control-sm" /></div>
                            <div class="col-sm-4 col-auto"><input type="date" class="form-control form-control-sm" /></div>
                            <div class="col-sm-2 col-auto" align="right">
                                <button type="submit" class="btn btn-primary mb-2">submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="width:100%;height:500px;overflow:auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center>NO</center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>TANGGAL</center>
                                    </th>
                                    <th colspan="2" width="15%">
                                        <center>KEDATANGAN</center>
                                    </th>
                                    <th colspan="2" width="15%">
                                        <center>KEBERANGKATAN</center>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <center>KENDARAAN</center>
                                    </th>
                                    <th>
                                        <center>PENUMPANG</center>
                                    </th>
                                    <th>
                                        <center>KENDARAAN</center>
                                    </th>
                                    <th>
                                        <center>PENUMPANG</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i=0; $i < 20 ; $i++):?>
                                <tr>
                                    <td>
                                        <center><b><?= $i ?></b></center>
                                    </td>
                                    <td>
                                        <center>12-12-2022</center>
                                    </td>
                                    <td>
                                        <center>bus</center>
                                    </td>
                                    <td>
                                        <center><?= $i ?></center>
                                    </td>
                                    <td>
                                        <center><?= $i ?></center>
                                    </td>
                                    <td>
                                        <center><?= $i ?></center>
                                    </td>
                                </tr>
                                <?php endfor; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>
                                        <center>TOTAL</center>
                                    </th>
                                    <th>
                                        <center>123</center>
                                    </th>
                                    <th>
                                        <center>123</center>
                                    </th>
                                    <th>
                                        <center>54</center>
                                    </th>
                                    <th>
                                        <center>234</center>
                                    </th>
                                </tr>
                                <!-- <tr>
                                        <th rowspan="2" width="5%"><center>NO</center></th>
                                        <th rowspan="2" width="10%"><center>TANGGAL</center></th>
                                        <th><center>KENDARAAN</center></th>
                                        <th><center>PENUMPANG</center></th>
                                        <th><center>KENDARAAN</center></th>
                                        <th><center>PENUMPANG</center></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" width="15%"><center>KEDATANGAN</center></th>
                                        <th colspan="2" width="15%"><center>KEBERANGKATAN</center></th>
                                    </tr> -->
                            </tfoot>
                        </table>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>