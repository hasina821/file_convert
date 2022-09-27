<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <div class=" mt-24 w-3/4 mx-auto rounded-md palette1">
        <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between">
            <div class="flex w-0 flex-1 items-center">
                <span class="flex rounded-lg bg-indigo-800 p-2">
                </span>
                <p class="ml-3 truncate font-medium text-white">
                <span class="text-center">Veuillez choisir les deux fichier</span>
                </p>
            </div>
            </div>
        </div>
    </div>
    <div class="px-1.5 py-1.5">
    </div>
    <div class="  mt-4 items-center  w-3/4 pl">
        <form class="flex flex-wrap" action="controller/controller.php" enctype="multipart/form-data" method="post" action="accueil.php?action=posting/conversion">
            <div  class="col-span-1 mt-8">
                <label for="">Input file :</label>
                <input type="file" class="text-white active:bg-blueGray-600 text-sm font-bold  px-2 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150 palette1 py-2 w-1/2 cursor-pointer" name="input">
            </div>
            <div class="col-span-1 mt-8">
                <label for="">Output  file :</label>
                <input type="file" class="text-white active:bg-blueGray-600 text-sm font-bold  px-2 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 palette1 py-2 w-1/2 cursor-pointer" value="Selectionner" name="output">
            </div>
            <div class="col-span-3 mt-8 ">
                <input type=submit class="text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1   ease-linear transition-all duration-150 bg-teal-700 cursor-pointer align-left pl2" value="Compiler"/>
            </div>
        </form>
    </div>
    </div>
    
    <div>

    </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('./view/layout.php') ?>