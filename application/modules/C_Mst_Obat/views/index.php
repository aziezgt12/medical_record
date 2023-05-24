<style>
    .opacity-50 {
        opacity: 0.5;
    }

    .pointer-events-none {
        pointer-events: none;
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-0 header-title">List Of Master Obat</h4>
                </div>
                <div class="col-md-6">
                    <button class='btn btn-primary float-right col-md-3 open-modal'>Tambah Data</button>
                </div>
            </div>
                <hr>
               

                    <table class="datatable table table-striped table-bordered dt-responsive nowrap table-search" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <th class="nowrap w-10">Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach($listObat as $val)
                        {
                            echo "<tr>";
                            echo "<td>$val->kode_obat</td>";
                            echo "<td>$val->nama_obat</td>";
                            echo "<td>$val->jenis_obat</td>";
                            echo "<td>Rp. ". number_format($val->harga, '2',',')."</td>";
                            echo "<td>$val->satuan</td>";
                            echo "<td>$val->stok</td>";
                            echo "<td hidden>$val->harga</td>";
                            echo "<td hidden>$val->id</td>";
                            echo "<td>
                                    <button class='btn btn-danger' onclick='deleted(".$val->id.")'>Delete</button>
                                    <button class='btn btn-primary open-modal'>Edit</button>
                                </td>";
                            echo "</tr>";
                        } ?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
    <!-- <div class="col-xl-4">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Riwayat Kunjungan</h4>
                <hr>
                <p class="sub-title">Use the tab JavaScript plugin—include
                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                    file—to extend our navigational tabs and pills to create tabbable panes
                    of local content, even via dropdown menus.</p>



            </div>
        </div>
    </div> -->
</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Obat</label>
                        <input type="hidden" class="form-control" name="id">
                        <input type="text" class="form-control" name="kode_obat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Obat</label>
                        <input type="text" class="form-control" name="jenis_obat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Satuan</label>
                        <input type="text" class="form-control" name="satuan">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga</label>
                                <input type="text" class="form-control" name="harga">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Stok Awal</label>
                                <input type="text" class="form-control" name="stok">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-group-user btn-action" onclick="save()" >Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
  // Event delegation for the "Edit" button click
        $(document).on('click', '.open-modal', function() {
            $("#exampleModalLongTitle").html("Form Create Obat")
        //     $(".btn-action").attr('onclick', 'save()');
            $("#modalForm").modal('show')
            // Get the parent table row (tr)
            var row = $(this).closest('tr');

            // Get the text content of each cell in the row
            var kodeObat = row.find('td:eq(0)').text();
            var namaObat = row.find('td:eq(1)').text();
            var jenisObat = row.find('td:eq(2)').text();
            var harga = row.find('td:eq(6)').text();
            var stok = row.find('td:eq(5)').text();
            var satuan = row.find('td:eq(4)').text();
            var id = row.find('td:eq(7)').text();

            // Populate the form fields with the retrieved values
            $('#form-data input[name="kode_obat"]').val(kodeObat);
            $('#form-data input[name="nama_obat"]').val(namaObat);
            $('#form-data input[name="jenis_obat"]').val(jenisObat);
            $('#form-data input[name="harga"]').val(harga);
            $('#form-data input[name="stok"]').val(stok);
            $('#form-data input[name="satuan"]').val(satuan);
            $('#form-data input[name="id"]').val(id);

            if(id > 0)
            {
                $('#form-data input[name="kode_obat"]').attr('readonly', true);
                $('#form-data input[name="stok"]').attr('readonly', true);
            }else{
                $('#form-data input[name="kode_obat"]').attr('readonly', false);
                $('#form-data input[name="stok"]').attr('readonly', false);

            }

            // Call your edit function or perform any other desired actions
            // ...

            // Prevent the default button click behavior
            return false;
        });
    });

    // function openModal(id = null)
    // {
    //     // if(id == null){
    //     //     $("#exampleModalLongTitle").html("Form Create Obat")
    //     //     $(".btn-action").attr('onclick', 'save()');
    //     //     $("#modalForm").modal('show')
    //     // }else{
    //         var row = $(this).closest('tr');

    //         // Get the text content of each cell in the row
    //         var kodeObat = row.find('td:eq(0)').text();
    //         var namaObat = row.find('td:eq(1)').text();
    //         var jenisObat = row.find('td:eq(2)').text();
    //         var harga = row.find('td:eq(3)').text();
    //         var stok = row.find('td:eq(4)').text();
    //         $('#form-data input[name="kode_obat"]').val(kodeObat);
    //         $('#form-data input[name="nama_obat"]').val(namaObat);
    //         $('#form-data input[name="jenis_obat"]').val(jenisObat);
    //         $('#form-data input[name="harga"]').val(harga);
    //         $('#form-data input[name="stok"]').val(stok);


    //     // }
    // }
    function save()
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "It will be saved!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url("C_Mst_Obat/save") ?>",
                        data: $("#form-data").serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            setTimeout(() => {
                                if (response.code == 200) {
                                    sw_alert("Success", String(response.message), "success");
                                    setTimeout(() => {
                                        location.reload()
                                    }, 3000);
                                } else {
                                    sw_alert("Error", String(response.message), "error");
                                    $('.btn-save').html('Save');
                                }
                                
                            $('.btn-action').html('save');
                            $('.btn-action').attr('disabled', false);
                            }, 3000);


                        },
                        error:  function (jqXHR, textError) { 
                            console.log(jqXHR);
                            console.log(textError);
                         }
                    });
                });
            },
        });
    }

    function deleted(id)
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "It will be deleted!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url("C_Mst_Obat/delete") ?>",
                        data: {
                            'id' : id
                        },
                        dataType: "json",
                        beforeSend: function() {
                            // $('#spinnerSave').attr('class', 'spinner-border spinner-border-sm')
                            $('.btn-action').html('Loading...');
                            $('.btn-action').attr('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            setTimeout(() => {
                                if (response.code == 200) {
                                    sw_alert("Success", String(response.message), "success");
                                    setTimeout(() => {
                                        location.reload()
                                    }, 3000);
                                } else {
                                    sw_alert("Error", String(response.message), "error");
                                    $('.btn-save').html('Save');
                                }
                                
                            $('.btn-action').html('save');
                            $('.btn-action').attr('disabled', false);
                            }, 3000);


                        },
                        error:  function (jqXHR, textError) { 
                            console.log(jqXHR);
                            console.log(textError);
                         }
                    });
                });
            },
        });
    }
</script>

<?php $this->load->view("_partials/script") ?>