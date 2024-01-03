<?php
session_start();
require_once 'productDAO.php';
$productDAO = new produitDAO();



if (isset($_GET['send'])) {
    $names = $_GET['name'];
    $old_prices = $_GET['old_price'];
    $new_prices = $_GET['new_price'];
    $stocks = $_GET['stock'];
    $categories = $_GET['category'];
    $quantite_mins = $_GET['stock-min'];
    $code_barres = $_GET['code-barre'];
    $offer_prices = $_GET['offre_de_prix'];
    
   $create_product = $productDAO->create_product($names, $old_prices, $new_prices, $stocks, $categories, $code_barres, $offer_prices, $quantite_mins);
   header('location:listOfproduct.php');
    }
    

   

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form id="productForm" action="" method="GET">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">name</th>
                    <th scope="col" class="px-6 py-3">offre_de_prix</th>
                    <th scope="col" class="px-6 py-3">code-barre</th>
                    <th scope="col" class="px-6 py-3">stock-min</th>
                    <th scope="col" class="px-6 py-3">stock</th>
                    <th scope="col" class="px-6 py-3">category</th>
                    <th scope="col" class="px-6 py-3">img</th>
                    <th scope="col" class="px-6 py-3">description</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700" id="productFields">
                    <td class="px-6 py-4">
                        <input type="text" name="name[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="old_price[]" placeholder="old-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="new_price[]" placeholder="new-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </td>
                    <td class="px-6 py-4">
                        <select name="category[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <?php
                            $data = mysqli_connect('localhost', 'root', '', 'elctro'); 
                            $get_data = "SELECT * FROM category WHERE statu = 'yes'";
                            $query = mysqli_query($data, $get_data);
                            while ($row = mysqli_fetch_assoc($query)) {
                                $name = $row['name'];
                            ?>
                                <option value="<?= $name ?>"><?= $name ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="stock[]" placeholder="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="">
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="stock-min[]" placeholder="quantite min" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="">
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" name="code-barre[]" placeholder="code barre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="">
                    </td>
                    <td class="px-6 py-4">
                        <input type="file" name="img[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="inline-flex bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800" onclick="addProduct()">Add Another Product</button>
        <button type="submit" name="send" class="inline-flex bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Add product
        </button>
    </form>
    <button type="submit" class="inline-flex bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        <a href="creatCategory.php">create the category</a> 
    </button>
    <br><br>
</div>

<script>
    function addProduct() {
        const productFields = document.getElementById('productFields');
        const newProduct = productFields.cloneNode(true);

       

        document.getElementById('productForm').appendChild(newProduct);
    }
</script>

</body>
</html>
