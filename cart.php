<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
        <h1 class="text-2xl font-bold my-4">Shopping Cart</h1>
        <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
      Checkout
    </button>
    </div>
    <div class="mt-8">
        <div class="flex flex-col md:flex-row border-b border-gray-400 py-4">
            <div class="flex-shrink-0">
                <img src="https://picsum.photos/id/237/150/150" alt="Product image" class="w-32 h-32 object-cover">
            </div>
            <div class="mt-4 md:mt-0 md:ml-6">
                <h2 class="text-lg font-bold">Product Title</h2>
                <p class="mt-2 text-gray-600">Product Description</p>
                <div class="mt-4 flex items-center">
                    <span class="mr-2 text-gray-600">Quantity:</span>
                    <div class="flex items-center">
                        <button class="bg-gray-200 rounded-l-lg px-2 py-1" disabled>-</button>
                        <span class="mx-2 text-gray-600">1</span>
                        <button class="bg-gray-200 rounded-r-lg px-2 py-1" disabled>+</button>
                    </div>
                    <span class="ml-auto font-bold">$20.00</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row border-b border-gray-400 py-4">
            <div class="flex-shrink-0">
                <img src="https://picsum.photos/id/237/150/150" alt="Product image" class="w-32 h-32 object-cover">
            </div>
            <div class="mt-4 md:mt-0 md:ml-6">
                <h2 class="text-lg font-bold">Product Title</h2>
                <p class="mt-2 text-gray-600">Product Description</p>
                <div class="mt-4 flex items-center">
                    <span class="mr-2 text-gray-600">Quantity:</span>
                    <div class="flex items-center">
                        <button class="bg-gray-200 rounded-l-lg px-2 py-1" disabled>-</button>
                        <span class="mx-2 text-gray-600">1</span>
                        <button class="bg-gray-200 rounded-r-lg px-2 py-1" disabled>+</button>
                    </div>
                    <span class="ml-auto font-bold">$15.00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-end items-center mt-8">
        <span class="text-gray-600 mr-4">Subtotal:</span>
        <span class="text-xl font-bold">$35.00</span>
    </div>
</div>
</body>
</html>