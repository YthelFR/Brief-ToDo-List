

<div class="pl-5 pr-5" id="listeTaches">
    <div class="flex pb-10 pt-10 w-full justify-center space-x-0 ">
        <div class="min-w-auto w-48 h-10 bg-neutral-50 p-2 rounded-l-full text-black font-semibold  ">
            Nom
        </div>
        <div class="min-w-auto w-48 h-10 bg-neutral-200 p-2 rounded-none hover:bg-neutral-400 text-black hover:text-white font-semibold hover:delay-100 ">
            Catégorie
        </div>
        <div class="min-w-auto w-48 h-10 bg-neutral-500 p-2 rounded-none hover:bg-neutral-700 text-white font-semibold hover:delay-100">
            Date
        </div>
        <div class="min-w-auto w-48 h-10 bg-green-300 p-2 rounded-r-full hover:bg-green-500 text-white font-semibold hover:delay-100">
            Priorité
        </div>
    </div>
</div>

<div class="pl-5 pr-5">
    <?php

    foreach ($tasks as $task) {
        echo "
        <div class='min-w-auto w-48 h-10 bg-neutral-50 p-2 rounded-l-full text-black font-semibold'>
        <div class=' pl-4 mt-2 h-12 truncate'>" . $task->getTitle() . " </div>
        <div class=' pl-4 italic capitalize text-sm' > " . $task->getName() . "</div>
        <div class=' text-displxl text-black bold pl-4'>" . $task->getDescription() . "€</div></div>";
    }
    ?>
</div>