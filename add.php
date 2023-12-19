<?php
// Assuming you have a database connection established
// $this->db = new PDO($dsn, $username, $password);

// Function to handle the form submission and insert products into the database
function addProducts($products)
{
    foreach ($products as $product) {
        $name = $product['name'];
        $price = $product['price'];

        // Add additional fields as needed

        $insert = "INSERT INTO product (name, price) VALUES (:name, :price)";
        $stmt = $this->db->prepare($insert);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);

        // Add additional bindParam statements for additional fields

        $stmt->execute();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Assuming your form has fields like 'name[]', 'price[]', etc.
    $names = $_POST['name'];
    $prices = $_POST['price'];

    // Add additional fields as needed

    $products = [];

    // Combine the submitted data into an array
    for ($i = 0; $i < count($names); $i++) {
        $products[] = [
            'name' => $names[$i],
            'price' => $prices[$i],
            // Add additional fields as needed
        ];
    }

    // Call the function to insert products into the database
    addProducts($products);

    echo "Products added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
</head>
<body>

<form method="post" action="">
    <!-- Assuming you want to add multiple products at once -->
    <label for="name">Product Name:</label>
    <input type="text" name="name[]" required>
    <label for="price">Product Price:</label>
    <input type="text" name="price[]" required>

    <!-- Add additional fields as needed -->

    <hr>

    <label for="name">Product Name:</label>
    <input type="text" name="name[]" required>
    <label for="price">Product Price:</label>
    <input type="text" name="price[]" required>

    <!-- Add additional fields as needed -->

    <hr>

    <!-- Add more product input fields as needed -->

    <input type="submit" name="submit" value="Add Products">
</form>

</body>
</html>
