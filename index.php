<?php 
    
    if(isset($_POST["submit"])){
        echo "<pre>" ;
            var_dump($_POST) ;
        echo "</pre>" ;
    }

    require "./templates/header.php" ;
?>
    <main class="grid gap-2">
    <aside class="bg-gray-600 col-span-4">
    <div>
        <ul class="flex">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
        </ul>
    </div>
    </aside>
    <article class="col-span-12 mx-auto mt-3 p-3">
        <form id="form" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Title
                </label>
                <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="title">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Image
                </label>
                <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none p-2" type="file">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Body
                </label>
                <textarea name="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="body" type="text" placeholder="body"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button name="submit" type="submit" class="bg-zinc-600 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-gray-200 focus:shadow-outline">
                    Submit
                </button>
                <button id="addArticle" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-gray-900 focus:shadow-outline">
                    Add Article
                </button>
            </div>
        </form>
    </article>
    </main>
<?php require "./templates/footer.php" ?>