<?php $title = "Result"; ?>
<?php ob_start(); ?>
<div class="palette1 mt-24 w-3/4 mx-auto rounded-md">
        <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between">
            <div class="flex w-0 flex-1 items-center">
                <span class="flex rounded-lg bg-indigo-800 p-2">
                </span>
                <p class="ml-3 truncate font-medium text-white">
                <span class="text-center">Resultat</span>
                </p>
            </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-8 mt-8 gap-2" >
    <div>
    </div>
    <div>
            <button class="text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 palette1 " type="button"><?php echo $lien ?>
            ><span class="text-italic text-black">Download</span></button>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>