
<?php
$page_title = 'All Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
// page_require_level(2);
$products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="pull-left m-5">
          <input type="text" id="search_product" onkeyup="searchByProduct()" placeholder="Search by product names.." title="Type in a name">
        </div>
        <div class="pull-left m-15">
          <input type="text" id="search_categorie" onkeyup="searchByCategory()" placeholder="Search by categorie.." title="Type in a name">
        </div>
        <div class="pull-left m-5">
          <input type="text" id="search_date" onkeyup="searchByDate()" placeholder="Search by date.." title="Type in a name">
        </div>
        <!-- <div class="pull-left">
          <input type="text" id="search_field" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        </div> -->
        <div class="pull-right margin-left">
          <a href="add_product.php" class="btn btn-primary">Add New</a>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th> Photo</th>
              <th> Product Title </th>
              <th class="text-center" style="width: 10%;"> Categorie </th>
              <th class="text-center" style="width: 10%;"> Instock </th>
              <th class="text-center" style="width: 10%;"> Buying Price </th>
              <th class="text-center" style="width: 10%;"> Saleing Price </th>
              <th class="text-center" style="width: 10%;"> Product Added </th>
              <th class="text-center" style="width: 100px;"> Actions </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product) : ?>
              <tr>
                <td class="text-center"><?php echo count_id(); ?></td>
                <td>
                  <?php if ($product['media_id'] === '0') : ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                  <?php else : ?>
                    <img class="img-avatar img-circle" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                  <?php endif; ?>
                </td>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$product['id']; ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_product.php?id=<?php echo (int)$product['id']; ?>" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </tabel>
      </div>
    </div>
  </div>
</div>
<script>
  function searchByProduct() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_product");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  function searchByCategory() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_categorie");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }


  function searchByDate() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_date");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[7];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>
<?php include_once('layouts/footer.php'); ?>
