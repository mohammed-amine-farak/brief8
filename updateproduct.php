
<?php
session_start();
require 'productDAO.php';
$productDAO = new produitDAO();
$update = $productDAO->get_data($_SESSION['selctedid']);


if(isset($_POST['send'])){
$name = $_POST['name'];
$old_price = $_POST['old_price'];
$new_price = $_POST['new_price'];
$stock = $_POST['stock'];

$filename = $_FILES["img"]["name"];
$tempname = $_FILES["img"]["tmp_name"];
$folder = "./img/" . $filename;

move_uploaded_file($tempname, $folder);
 
$updateProduct = $productDAO->updateProduct($_SESSION['selctedid'],$name,$old_price,$new_price,$stock,$filename);
// mysqli_query($data,"UPDATE product SET name = '$name', old_price = '$old_price', new_price='$new_price' , stock='$stock' , category = '$category' , image = '$filename' WHERE id like '%{$_SESSION['selctedid']}%' ");

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
<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 mb-[40px]">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="img\png-transparent-arduino-computer-software-library-electronics-computer-electronics-baby-computer-thumbnail.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">elctroNacer</span>
            </a>
           
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                   
                    <li>
                        <a href="listOfproduct.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">product</a>
                    </li>
                    <li>
                        <a href="chowTheUsers.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">users</a>
                    </li>
                    <li>
                        <a href="crud.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">create</a>
                    </li>
                    <li>
                        <a href="pagnation.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">pagnation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
      <form  method="POST" enctype="multipart/form-data">
      <?php
            foreach($update as $up){
            
             ?>
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                  <input type="text" name="name" value = "<?=$up->getName()?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
              </div>
              <div class="w-full">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">old price</label>
                  <input type="number" name ="old_price" value = "<?=$up->getOld_price()?>" placeholder = "old-price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
              </div>
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">new Price</label>
                  <input type="number" name ="new_price" value = "<?=$up->getNew_price()?>" placeholder = "new-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
            
              <div>
               
                  <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">stock</label>
                  <input type="number" name = "stock" value = "<?=$up->getStock()?>" placeholder = "stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="">
              </div> 
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">images</label>
                  <input type="file" name = "img" value = "<?=$up->getImage()?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
              </div>

              <?php
            }
                ?>
          </div>
          <button type="submit" name = "send" class="inline-flex  bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              update the  product
          </button>
          
      </form>
      <button type="submit"  class="inline-flex  bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
          <a href="creatCategory.php">create the category</a> 
          </button>
  </div>

</body>
</html>