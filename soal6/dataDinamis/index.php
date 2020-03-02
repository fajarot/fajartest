<?php
require_once("database.php");
$db = new Database();


if (isset($_POST['submit'])) {
    $data = array($_POST['produk'], $_POST['harga'], $_POST['kategori'], $_POST['kasir']);
    $db->TambahData($data);
}
if (isset($_POST['edit'])) {
    $data = array($_POST['getProduct'], $_POST['getHarga'], $_POST['getID']);
    $db->EditData($data);
}
if (isset($_GET['delete'])) {
    $db->DeleteData($_GET['id']);
}

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
                    <?php
                    $dataAwal = $db->GetAllData();
                    foreach ($dataAwal as $key => $value) {
                        echo ('<tr data-nomor=' .  $value['id']  . '>
                            <th scope="row">' .  ($key + 1)  . '</th>
                            <td>' .  $value['CashierName']  . '</td>
                            <td>' .  $value['ProductName']  . '</td>
                            <td>' .  $value['CateName']  . '</td>
                            <td>' .  $value['price']  . '</td>
                            <td>
                                <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalEdit">Edit</button>
                                <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#modalHapus">Delete</button>
                            </td>
                        </tr>

                            ');
                    }
                    ?>
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
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-form-label">Nama Cashier</label>
                            <input type="text" class="form-control" name="kasir" id="kasir" autofocus="" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Category</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Product</label>
                            <input type="text" class="form-control" name="produk" id="produk" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Harga </label>
                            <input type="text" class="form-control" name="harga" id="harga" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" id="submit">
                </div>
                </form>
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
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-form-label">ID</label>
                            <input type="text" class="form-control" name="getID" id="getID" readonly />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Cashier</label>
                            <input type="text" class="form-control" name="getCashier" id="getCashier" readonly />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Category</label>
                            <input type="text" class="form-control" name="getCategory" id="getCategory" readonly />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Product</label>
                            <input type="text" class="form-control" name="getProduct" id="getProduct" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Harga </label>
                            <input type="text" class="form-control" name="getHarga" id="getHarga" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="edit" id="edit">
                </div>
                </form>
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
    var data = <?= json_encode($dataAwal); ?>;
    var hasil = data;
    $('#modalAdd').on('shown.bs.modal', function() {
        $('#nama_cashier').trigger('focus')
    })


    $('#modalEdit').on('show.bs.modal', function(event) {
        // let hasil = data
        let a = $(event.relatedTarget).parentsUntil("tbody")
        let i = a[1].sectionRowIndex

        $('#getID').val(hasil[i].id);
        $('#getCashier').val(hasil[i].CashierName);
        $('#getCategory').val(hasil[i].CateName);
        $('#getProduct').val(hasil[i].ProductName);
        $('#getHarga').val(hasil[i].price);
        $('#edit').attr('disabled', 'true');

        $('form').on('change', function(event) {
            $('#edit').removeAttr('disabled');
        })
    });


    $('#modalHapus').on('show.bs.modal', function(event) {
        let a = $(event.relatedTarget).parentsUntil("tbody")
        let i = a[1].sectionRowIndex

        $('#dataHapus').text('Data ' + hasil[i].CashierName + ' ID #' + hasil[i].id)

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.reload()
            }
        };
        xmlhttp.open("GET", "index.php?delete=true&id=" + hasil[i].id, true);
        xmlhttp.send();
    });
    $('#modalHapus').on('hide.bs.modal', function(event) {
        $('#dataHapus').text('')
    });
</script>

</html>