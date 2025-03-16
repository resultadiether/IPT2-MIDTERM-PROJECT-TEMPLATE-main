<?php
include('../database/database.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch the current details of the music entry
  $sql = "SELECT * FROM pure_pour WHERE CUSTOMER_ID = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    die("Record not found");
  }
} else {
  die("No ID provided");
}
?>

<?php include('../partials/header.php'); ?>
<?php include('../partials/sidebar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pure Pour Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="../index.php">Pure Pour</a></li>
        <li class="breadcrumb-item active">Pure Pour Details</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pure Pour Details</h5>
            <p><strong>Customer ID:</strong> <?php echo $row['CUSTOMER_ID']; ?></p>
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
  </section>
</main><!-- End Main -->

<?php include('../partials/footer.php'); ?>
            

        
