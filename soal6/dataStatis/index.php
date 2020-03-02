<?php

$data = array(
    array("id" => 0, "cashierName" => "fajar", "productName" => "ayam goreng", "cateName" => "makanan", "price" => "7.500"),
    array("id" => 1, "cashierName" => "budi", "productName" => "indomie", "cateName" => "makanan", "price" => "6.500"),
    array("id" => 6, "cashierName" => "agus", "productName" => "capucino", "cateName" => "minuman", "price" => "8.000"),
    array("id" => 9, "cashierName" => "indra", "productName" => "nasi goreng", "cateName" => "makanan", "price" => "10.500")
);


if (isset($_POST['submit'])) {

    $id = rand(10, 100);
    $cashier = $_POST['nama_cashier'];
    $cate = $_POST['category'];
    $prod = $_POST['nama_product'];
    $harga = $_POST['harga'];

    $arrayValue = array($id, $cashier, $prod, $cate, $harga);
    $arrayKey = array(
        "id", "cashierName", "productName", "cateName", "price"
    );
    $hasil = array_combine($arrayKey, $arrayValue);
    array_push($data, $hasil);
}

// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div>
        <nav class="navbar navbar-dark bg-dark">

            <div class="container">
                <a class="navbar-brand">Arkademy</a>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalAdd">ADD</button>

            </div>
        </nav>
    </div>

    <br>
    <br>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div id="facetPanel" class="col-sm-3 col-md-3 sidebar collapse">
                    <div id="clearFilters"></div>
                    <ul class="nav nav-sidebar">
                        <div className="panel panel-primary behclick-panel">
                            <li>
                                <div id="AuthorFacet">
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 results_section">
                    <div id="results" class="row placeholders">
                    </div>
                    <div id="pager" class="row">
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cashier</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="dataTabel">


                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal ADD -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-form-label">Nama Cashier</label>
                            <input type="text" class="form-control" name="nama_cashier" id="nama_cashier" autofocus="" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Category</label>
                            <input type="text" class="form-control" name="category" id="category" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Product</label>
                            <input type="text" class="form-control" name="nama_product" id="nama_product" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Harga </label>
                            <input type="text" class="form-control" name="harga" id="harga" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Tambah Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-form-label">Nama Cashier</label>
                            <input type="text" class="form-control" name="getCashier" id="getCashier" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Category</label>
                            <input type="text" class="form-control" name="getCategory" id="getCategory" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Product</label>
                            <input type="text" class="form-control" name="getProduct" id="getProduct" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Harga </label>
                            <input type="text" class="form-control" name="getHarga" id="getHarga" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit">Edit Data</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal HAPUS -->
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <br>
                    <h2 id="dataHapus">Data fajar ID 2</h2>
                    ...
                    <br><br><br><br><br>
                </div>
                <div class="text-center text-success">
                    <h3>Berhasil Dihapus</h3>
                    <br><br>
                </div>
            </div>
        </div>
    </div>


</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    var data = <?= json_encode($data); ?>;
    var hasil = data;
    let bolehSubmit = true;
    $('#modalAdd').on('shown.bs.modal', function() {
        $('#nama_cashier').trigger('focus')
        $('#submit').attr('disabled', 'true');

        $('form').on('change', function(event) {
            $('#submit').removeAttr('disabled');
            $('#submit').one('click', function(e) {
                if (bolehSubmit == true) {

                    // let hasil = data
                    let coba = {}
                    let x = Math.floor(Math.random() * (1000 - 100) + 100);

                    coba.id = x;
                    coba.cashierName = $('#nama_cashier').val()
                    coba.cateName = $('#category').val()
                    coba.productName = $('#nama_product').val()
                    coba.price = $('#harga').val()
                    hasil.push(coba);
                    LoadData(hasil);
                    bolehSubmit = false;
                } else {
                    return
                }

            })
        });
    });
    $('#modalAdd').on('hide.bs.modal', function(event) {
        $('input').each(function() {
            $(this).val('')
        })
        bolehSubmit = true
    });

    $('#modalEdit').on('show.bs.modal', function(event) {
        // let hasil = data
        let a = $(event.relatedTarget).parentsUntil("tbody")
        let i = a[1].sectionRowIndex

        $('#getCashier').val(hasil[i].cashierName);
        $('#getCategory').val(hasil[i].cateName);
        $('#getProduct').val(hasil[i].productName);
        $('#getHarga').val(hasil[i].price);
        $('#edit').attr('disabled', 'true');

        $('form').on('change', function(event) {
            $('#edit').removeAttr('disabled');
        })
    });

    $('#modalHapus').on('show.bs.modal', function(event) {
        // let hasil = data
        let a = $(event.relatedTarget).parentsUntil("tbody")
        let i = a[1].sectionRowIndex

        $('#dataHapus').text('Data ' + hasil[i].cashierName + ' ID #' + hasil[i].id)

        hasil.splice(i, 1)
        LoadData(hasil);
    });
    $('#modalHapus').on('hide.bs.modal', function(event) {
        $('#dataHapus').text('')
    });


    LoadData(data)

    function LoadData(a) {
        let hasil = a
        // console.log(data);
        // console.log(hasil);

        $('#dataTabel').html("");
        for (let i = 0; i < hasil.length; i++) {

            $('#dataTabel').append(`<tr data-nomor=` + hasil[i].id + `>
                                <th scope="row">` + (i + 1) + `</th>
                                <td>` + hasil[i].cashierName + `</td>
                                <td>` + hasil[i].productName + `</td>
                                <td>` + hasil[i].cateName + `</td>
                                <td>` + hasil[i].price + `</td>
                                <td>
                                    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalEdit">Edit</button>
                                    <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#modalHapus">Delete</button>
                                </td>
                            </tr>`)
        }
    }
</script>

</html>