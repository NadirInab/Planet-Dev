<?php  
    // require "./classes/DbConnection.php" ;
    $connection = new DbConnection() ;
    $connect = $connection->connect() ;

    $articles = AdminCrud::fetchArticles($connect) ;
?>
<?php foreach($articles as $article) :  ?>
<div class="mr-2 mt-1 max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
       <div class="text-center">
       <img src="./images/<?= $article['image']?>" alt="" class="rounded-full">
       </div>
    <a href="#">
        <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $article["title"] ?></h5>
    </a>
    <p class="mb-3 text-center font-normal text-gray-700 dark:text-gray-400"><?= $article["body"] ?></p>
    <!-- <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Read more
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a> -->
    <div class="mt-3">
        <button class="text-gray-900 bg-green-300 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white  dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">UpDate</button>
        <button class="text-gray-900 bg-red-900 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Delete</button>
    </div>
</div>
<?php endforeach ; ?>