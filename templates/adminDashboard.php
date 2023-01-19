<?php
require "../classes/DbConnection.php";
require "../classes/AdminCrud.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>planet Dev </title>
</head>

<body>
    <nav class="flex justify-center bg-slate-400 shadow-lg p-2 sticky top-0 z-50 bg-opacity-50">
        <div class="flex justify-start">
            <img src="images/images.png" alt="" srcset="" class="h-10 mr-11 cursor-pointer inline rounded-full border-3">
        </div>
        <a href="/dashboard" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Home</a>
        <a href="/team" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Articles</a>
        <a href="/projects" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Users</a>
        <a href="/reports" class="font-bold px-3 py-2 mx-3 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Repoop</a>
    </nav>
    <div class="flex ">
        <?php require "./sidebar.php" ?>
        <main class="w-9/12">
            <div class="flex flex-wrap  border-2">
                <?php require "../templates/articles.php"; ?>
            </div>
            <?php require "../templates/form.php"; ?>
        </main>
    </div>

</body>
</html>