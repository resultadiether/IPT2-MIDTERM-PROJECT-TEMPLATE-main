<?php
  include('database/database.php');
  include('partials/header.php');
  include('partials/sidebar.php');
  include('database/database.php');
  include('database/search.php');

  $results_per_page = 10; // Number of results per page
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $start_from = ($page - 1) * $results_per_page;

  $sql_total = "SELECT COUNT(*) AS total FROM pure_pour";
  $result_total = $conn->query($sql_total);
  $total_records = $result_total->fetch_assoc()['total'];
  $total_pages = ceil($total_records / $results_per_page);

  $sql = "SELECT * FROM pure_pour LIMIT $start_from, $results_per_page";
  $pure_pour = $conn->query($sql);

  if (!$pure_pour) 
    die("Query failed: " . $conn->error);

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pure Pour Management System</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">General</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php
                // USE SEARCH QUERY FROM search.php
                if (!empty($search)) {
                    $query_run = mysqli_query($conn, $query);
                } else {
                    $query = "SELECT * FROM pure_pour LIMIT $start, $limit";
                    $query_run = mysqli_query($conn, $query);
                }
              ?>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h5 class="card-title">Default Table</h5>
              </div>
              <div>
                <button class="btn btn-primary btn-sm mt-4 mx-3" data-bs-toggle="modal" data-bs-target="#addOrderModal">Add Order</button>
              </div>
            </div>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">CUSTOMER NAME</th>
                  <th scope="col">DRINK NAME</th>
                  <th scope="col">CATEGORY</th>
                  <th scope="col">PREFERENCE</th>
                  <th scope="col">SIZE</th>
                  <th scope="col">PRICE(php)</th>
                  <th scope="col">SERVICE</th>
                  <th scope="col">ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($query_run) {
                foreach ($query_run as $row) {
                ?>
                <?php if ($pure_pour->num_rows > 0) : ?>
                  <?php while ($row = $pure_pour->fetch_assoc()) : ?>
                    <tr>
                      <th scope="row"><?php echo $row['CUSTOMER_ID']; ?></th>
                      <td><?php echo  $row['CUSTOMER_NAME']; ?></td>
                      <td><?php echo $row['DRINK_NAME']; ?></td>
                      <td><?php echo $row['CATEGORY']; ?></td>
                      <td><?php echo $row['PREFERENCE']; ?></td>
                      <td><?php echo $row['SIZE']; ?></td>
                      <td><?php echo $row['PRICE']; ?></td>
                       <td><?php echo $row['SERVICE_TYPE']; ?></td>
                      <td class="d-flex justify-content-center">
                      <button class="btn btn-success btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#editOrderModal<?php echo $row['CUSTOMER_ID']; ?>">Edit</button>
                        <a href="database/view.php?id=<?php echo $row['CUSTOMER_ID']; ?>" class="btn btn-primary btn-sm mx-1">View</a>
                        <a href="database/delete.php?CUSTOMER_ID=<?php echo $row['CUSTOMER_ID']; ?>" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                      </td>
                    </tr>
                      <!-- Edit Order Modal -->
    <div class="modal fade" id="editOrderModal<?php echo $row['CUSTOMER_ID']; ?>" tabindex="-1" aria-labelledby="editOrderModalLabel<?php echo $row['CUSTOMER_ID']; ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editOrderModaatedlLabel<?php echo $row['CUSTOMER_ID']; ?>">Edit Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="database/update.php?id=<?php echo $row['CUSTOMER_ID']; ?>">
                              <input type="hidden" name="CUSTOMER_ID" value="<?php echo $row['CUSTOMER_ID']; ?>">
                              <div class="mb-3">
                                <label for="CUSTOMER_NAME" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="CUSTOMER_NAME" name="CUSTOMER_NAME" value="<?php echo $row['CUSTOMER_NAME']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="DRINK_NAME" class="form-label">Drink Name</label>
                                <input type="text" class="form-control" id="DRINK_NAME" name="DRINK_NAME" value="<?php echo $row['DRINK_NAME']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="CATEGORY" class="form-label">Category</label>
                                <input type="text" class="form-control" id="CATEGORY" name="CATEGORY" value="<?php echo $row['CATEGORY']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="PREFERENCE" class="form-label">Preference</label>
                                <input type="text" class="form-control" id="PREFERENCE" name="PREFERENCE" value="<?php echo $row['PREFERENCE']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="SIZE" class="form-label">Size</label>
                                <input type="text" class="form-control" id="SIZE" name="SIZE" value="<?php echo $row['SIZE']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="PRICE" class="form-label">Price</label>
                                <input type="text" class="form-control" id="PRICE" name="PRICE" value="<?php echo $row['PRICE']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="SERVICE_TYPE" class="form-label">Service Type</label>
                                <input type="text" class="form-control" id="SERVICE_TYPE" name="SERVICE_TYPE" value="<?php echo $row['SERVICE_TYPE']; ?>" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Update Order</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Edit Order Modal -->
                  <?php endwhile; ?>
                <?php else : ?>
                  <tr>
                    <td colspan="8" class="text-center">No records found</td>
                  </tr>
                <?php endif; ?>
              </tbody>
              <?php
                }
              }else {
                echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
              }
              ?>
            </table>

            <!-- End Default Table Example -->
            </div>
          <div class="mx-4">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <?php if ($page > 1): ?>
                  <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page - 1; ?>">Previous</a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php if ($page < $total_pages): ?>
                  <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page + 1; ?>">Next</a></li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
        </div>

      </div>
    </div>


    <!-- Add Order Modal -->
    <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addOrderModalLabel">Add Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="database/create.php">
              <div class="mb-3">
                <label for="CUSTOMER_NAME" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="CUSTOMER_NAME" name="CUSTOMER_NAME" required>
              </div>
              <div class="mb-3">
                <label for="DRINK_NAME" class="form-label">Drink Name</label>
                <input type="text" class="form-control" id="DRINK_NAME" name="DRINK_NAME" required>
              </div>
              <div class="mb-3">
                <label for="CATEGORY" class="form-label">Category</label>
                <input type="text" class="form-control" id="CATEGORY" name="CATEGORY" required>
              </div>
              <div class="mb-3">
                <label for="PREFERENCE" class="form-label">Preference</label>
                <input type="text" class="form-control" id="PREFERENCE" name="PREFERENCE" required>
              </div>
              <div class="mb-3">
                <label for="SIZE" class="form-label">Size</label>
                <input type="text" class="form-control" id="SIZE" name="SIZE" required>
              </div>
              <div class="mb-3">
                <label for="PRICE" class="form-label">Price</label>
                <input type="text" class="form-control" id="PRICE" name="PRICE" required>
              </div>
              <div class="mb-3">
                <label for="SERVICE_TYPE" class="form-label">Service Type</label>
                <input type="text" class="form-control" id="SERVICE_TYPE" name="SERVICE_TYPE" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Order</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Add Order Modal -->
     

    <!-- Modal -->
    <div class="modal fade" id="editInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editInfoLabel">Order Information</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- View Pure Pour Modal -->
    <div class="modal fade" id="viewPurePourModal<?php echo $row['CUSTOMER_ID']; ?>" tabindex="-1" aria-labelledby="viewPurePourModalLabel" aria-hidden="true">
      <div class="modal-dialog">">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewPurePourModalLabel<?php echo $row['CUSTOMER_ID']; ?>">Pure Pour Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>id:</strong> <?php echo $row['CUSTOMER_ID']; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $row['CUSTOMER_NAME']; ?></p>
            <p><strong>Drink Name:</strong> <?php echo $row['DRINK_NAME']; ?></p>
            <p><strong>Category:</strong> <?php echo $row['CATEGORY']; ?></p>
            <p><strong>Prefence:</strong> <?php echo $row['PREFERENCE']; ?></p>
            <p><strong>Size:</strong> <?php echo $row['SIZE']; ?></p>
            <p><strong>Price:</strong> <?php echo $row['PRICE']; ?></p>
            <p><strong>Service_Type:</strong> <?php echo $row['SERVICE_TYPE']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

  </section>

</main><!-- End View Pure Pour Modal -->

<?php
include('partials/footer.php');
?>