<?php
include('database.php');

$productsPerPage = 4;

$totalProducts = 0;
$sql = "SELECT * from Product";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {

    $totalProducts++;

}

// Get the current page from the URL or set a default
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $productsPerPage;

// Query to retrieve products with pagination
$sql = "SELECT * FROM product LIMIT $offset, $productsPerPage";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display product information in HTML
        echo '<div class="product">';
        echo '<img src="' . $row["image_data"] . '" alt="' . $row["Name"] . '">';
        echo '<h3>' . $row["Name"] . '</h3>';
        echo '<p>' . $row["Description"] . '</p>';
        echo '<p>Price: $' . $row["price"] . '</p>';
        echo '</div>';
    }
 
    $totalPages = ceil($totalProducts / $productsPerPage);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
    echo '</div>';
} else {
    echo "No products found.";
}

$conn->close();
?>