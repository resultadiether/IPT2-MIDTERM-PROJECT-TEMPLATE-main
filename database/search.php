<?php
include('database.php');

$limit = 5; // 5 NUMBER OF RECORDS PER PAGE
$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit; // TO CALCULATE THE STARTING POINT FOR PAGINATION

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : ""; // TO SANITIZE USER INPUT

if (!empty($search)) {
    // SEARCH QUERY WITH PAGINATION
    $query = "SELECT * FROM pure_pour 
              WHERE CUSTOMER_NAME LIKE '%$search%' 
              OR DRINK_NAME LIKE '%$search%' 
              OR CATEGORY LIKE '%$search%' 
              OR PREFERENCE LIKE '%$search%' 
              OR SIZE LIKE '%$search%' 
                OR PRICE LIKE '%$search%' 
                OR SERVICE_TYPE LIKE '%$search%' 
              LIMIT $start, $limit";

    // COUNT TOTAL SEARCH RESULTS
    $count_query = "SELECT COUNT(*) as total FROM pure_pour 
                    WHERE CUSTOMER_NAME LIKE '%$search%' 
              OR DRINK_NAME LIKE '%$search%' 
              OR CATEGORY LIKE '%$search%' 
              OR PREFERENCE LIKE '%$search%' 
              OR SIZE LIKE '%$search%' 
                OR PRICE LIKE '%$search%' 
                OR SERVICE_TYPE LIKE '%$search%'";
} else {
    // DEFAULT QUERY IF NO SEARCH
    $query = "SELECT * FROM pure_pour LIMIT $start, $limit";
    $count_query = "SELECT COUNT(*) as total FROM pure_pour";
}

// EXECUTE QUERIES
$query_run = mysqli_query($conn, $query);
$result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$total_pages = ceil($total_records / $limit);
?>