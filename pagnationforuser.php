<?php

session_start();
if(isset($_SESSION['user'])){
  $iduser = $_SESSION['user'];
 
  require_once 'productDAO.php';
  $productDAO = new produitDAO();
  $products = $productDAO->get_product();
  
  
  
  require_once 'commandeDAO.php';
  
  $commandeDAO = new commandeDAO();
  if(isset($_GET['cart'])){
         $idProduct = $_GET['cart'];
      
  $commande = $commandeDAO->add_Commande($iduser,$idProduct);

  require_once 'command_productDAO.php';
  $commande_productDAO = new commande_proDAO(); 
  $add_to_commande_produit = $commande_productDAO->add_commande_product($commande,$idProduct);
  
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
      <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 ">
          <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
              <a href="https://flowbite.com" class="flex items-center">
                  <img src="img\png-transparent-arduino-computer-software-library-electronics-computer-electronics-baby-computer-thumbnail.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                  <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">elctroNacer</span>
              </a>
             
              <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                  <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                  <li>
                      <a href="pagnation.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">pagnation</a>
                  </li>
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
                      <a href="crud.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">create</a>
                  </li>
                  <a href="cart.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">create</a>

                  </ul>
              </div>
          </div>
      </nav>
  </header>
      
     
  <div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>
      <form class="flex flex-col md:flex-row gap-3" method = "GET">
      <div class="flex">
          <input type="number" name = "prix_start" placeholder="prix start"
        class="w-[50px] md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
        >
        <input type="number" name = "prix_end" placeholder="prix end"
        class="w-[50px] md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
        >
          <button type="submit" name = "send" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
      </div>
      
   
  </form>
  <form method = "GET">
  <select name="category"
      class="w-[120px] h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
      <option value="all" >All</option>
      <?php
      
       ?>
       
                   
        
    </select>
    <button type="submit" name = "sendcategory" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
  
  </form>
  
  <?php
       
         ?>
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      <?php
      
      foreach($products as $pro){
           ?>
           <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="img/<?=$pro->getImage()?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-[200px] w-[400px] object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700"><?=$pro->getName()?></h3>
          <p class="mt-1 text-lg font-medium text-gray-900"><?=$pro->getNew_price()?></p>
          <form  method= "GET">
            
            <button name = "cart" value = '<?=$pro->getId()?>' class="inline-flex bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800" onclick="addProduct()">Add Another Product</button>
          </form>
  
  
        </a>
         <?php
         }
         ?>
        
      
        
  
  
       
      </div>
    </div>
   
  
  </body>
  </html>
  <?php
  
}
else{
  header("Location:sign.php");
}

?>
