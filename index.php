<?php
  include('database\database.php');
  include('partials\header.php');
  include('partials\sidebar.php');

$sql = "SELECT * FROM pure_pour";
$pure_pour = $conn->query($sql);

  // Your PHP BACK CODE HERE

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
                  <button class="btn btn-primary btn-sm mt-4 mx-3">Add Order</button>
                </div>
              </div>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Drink Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Flavor</th>
                    <th scope="col">Preference</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Service Type</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">5</th>
                    <td>Diether Resulta</td>
                    <td></td>
                    <td>47</td>
                    <td>2011-04-19</td>
                    <td>Diether Resulta</td>
                    <td>Diether Resulta</td>
                    <td>Diether Resulta</td>
                    <td>Diether Resulta</td>
                    <td>Diether Resulta</td>
                    <td class="d-flex justify-content-center">
                      <button class="btn btn-success btn-sm mx-1">Edit</button>
                      <button class="btn btn-primary btn-sm mx-1" title="View Employee Information" data-bs-toggle="modal" data-bs-target="#editInfo">View</button>
                      <button class="btn btn-danger btn-sm mx-1">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
            <div class="mx-4">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
            </div>
          </div>

        </div>

        
      </div>

      <!-- Modal -->
      <div class="modal fade" id="editInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editInfoLabel">Employee Information</h1>
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
    </section>

  </main><!-- End #main -->
<?php
include('partials\footer.php');
?>