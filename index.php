<?php 
    
    if(isset($_POST["submit"])){
        echo "<pre>" ;
            var_dump($_POST) ;
        echo "</pre>" ;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="flex justify-center bg-slate-400 shadow-lg p-2 sticky top-0 z-50 bg-opacity-50">
        <div class="flex justify-start">
            <img src="images/images.png" alt="" srcset="" class="h-10 mr-11 cursor-pointer inline rounded-full">
        </div>
        <a href="/dashboard" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Home</a>
        <a href="/team" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Articles</a>
        <a href="/projects" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Users</a>
        <a href="/reports" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Repo</a>
    </nav>
    <article class="h-screen mx-auto mt-3 p-3 w-9/12">
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

    <script src="app.js"></script>
</body>
</html>