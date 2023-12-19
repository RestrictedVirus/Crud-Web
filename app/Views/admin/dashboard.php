<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <title>Dashboard</title>
</head>

<body
>
  <div class="container-fluid text-center text-light bg-secondary py-4">
    <h1 class="fs-2 fw-bold">Admin Dashboard</h1>
    <hr class="bg-light">
  </div>

  <div class="container mt-4 ">
    <button type="button" class="btn btn-success mb-2 float-end" data-bs-toggle="modal"
      data-bs-target="#myProductModal">
      Add Product
    </button>
  </div>

  <div class="container mt-2">
    <table class="table table-bordered table-responsive" id="ProductTB">
      <tr class="table-secondary">
        <th class="text-center d-none">Id</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Unit</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Price</th>
        <th class="text-center">Action</th>
      </tr>
      <?php foreach ($product as $product_list): ?>
        <tr>
          <td class="d-none">
            <?= esc($product_list['id']) ?>
          </td>
          <td>
            <?= esc($product_list['product_name']) ?>
          </td>
          <td>
            <?= esc($product_list['unit']) ?>
          </td>
          <td>
            <?= esc($product_list['quantity']) ?>
          </td>
          <td>
            <?= esc($product_list['price']) ?>
          </td>
          <td class="text-center">
            <button type="button" class="btn btn-success btnUpdateProduct mb-2" data-bs-toggle="modal"
              data-bs-target="#updateProductModal">Update</button>
            <button type="button" class="btn btn-danger btndeleteProduct mb-2" data-bs-toggle="modal"
              data-bs-target="#deleteProductModal">Delete</button>
          </td>
        </tr>
      <?php endforeach ?>
    </table>

    <?= $pager->links() ?>
  </div>

  <!-- ADD -->
  <div class="container">
    <div class="modal fade" id="myProductModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myProductModalLabel">Add New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/addproduct') ?>" method="post">
              <div class="form-group p-3">
                <label for="formControlInput" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" placeholder="">
                <label for="formControlInput" class="form-label">Product Unit</label>
                <select class="form-select" aria-label="Default select" name="unit">
                  <option value="Pcs">Pcs</option>
                  <option value="Bundle">Bundle</option>
                  <option value="Pack">Pack</option>
                </select>
                <label for="formControlInput" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="">
                <label for="formControlInput" class="form-label">Product Price</label>
                <input type="number" class="form-control" name="price" placeholder="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Update -->
  <div class="container">
    <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/update_product') ?>" method="post">
              <div class="form-group p-3">
                <div class="form-group d-none">
                  <label for="id">ID:</label>
                  <input type="hidden" class="productId" name="id">
                </div>
                <label for="formControlInput" class="form-label">Product Name</label>
                <input type="text" class="form-control productName" name="product_name" placeholder="">
                <label for="formControlInput" class="form-label">Product Unit</label>
                <select class="form-select" aria-label="Default select" name="unit">
                  <option value="Pcs">Pcs</option>
                  <option value="Bundle">Bundle</option>
                  <option value="Pack">Pack</option>
                </select>
                <label for="formControlInput" class="form-label">Product Quantity</label>
                <input type="number" class="form-control quantity" name="quantity" placeholder="">
                <label for="formControlInput" class="form-label">Product Price</label>
                <input type="number" class="form-control price" name="price" placeholder="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE -->
  <div class="container">
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/delete_product') ?>" method="post">
              <div class="form-group p-3">
                <div class="form-group d-none">
                  <label for="id">ID:</label>
                  <input type="hidden" class="delProductId" name="id">
                </div>
                <h4>Do you want to delete this product? <strong><u><span class="delProductName"></span></u></strong>
                </h4>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-success">Delete Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-5 fixed-bottom">
    <div class="btn btn-dark">
      <a href="<?= site_url('main/logout') ?>" class="text-light text-decoration-none"><b>Logout</b></a>
    </div>
  </div>

</body>

<script>
  $(document).ready(function () {
    $("#ProductTB").on('click', '.btnUpdateProduct', function () {
      let currentRow = $(this).closest("tr");
      let productId = currentRow.find("td:eq(0)").text();
      let productName = currentRow.find("td:eq(1)").text();
      let unit = currentRow.find("td:eq(2)").text();
      let quantity = currentRow.find("td:eq(3)").text();
      let price = currentRow.find("td:eq(4)").text();

      $(".productId").val(productId);
      $(".productName").val(productName);
      $(".unit").val(unit);
      $(".quantity").val(quantity);
      $(".price").val(price);
    })
    $("#ProductTB").on('click', '.btndeleteProduct', function () {
      let currentRow = $(this).closest("tr");
      let productId = currentRow.find("td:eq(0)").text();
      let productName = currentRow.find("td:eq(1)").text();

      $(".delProductId").val(productId)
      $(".delProductName").text(productName);
    });
  });
</script>

</html>