<?php
// require_once("database.php");
// $db = new Database();
// print_r($db);


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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>
                            <button class="btn btn-outline-success my-2 my-sm-0">Edit</button>
                            <button class="btn btn-outline-danger my-2 my-sm-0">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>
                            <button class="btn btn-outline-success my-2 my-sm-0">Edit</button>
                            <button class="btn btn-outline-danger my-2 my-sm-0">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>
                            <button class="btn btn-outline-success my-2 my-sm-0">Edit</button>
                            <button class="btn btn-outline-danger my-2 my-sm-0">Delete</button>
                        </td>
                    </tr>
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
                    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
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
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
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
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $('#modalAdd').on('shown.bs.modal', function() {
        $('#nama_cashier').trigger('focus')
    })
</script>

</html>