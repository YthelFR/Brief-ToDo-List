<?php
use src\Models\User;
?>

<!-- ----- ESPACE CONNEXION ----- -->
<div id="navbar" class="hidden right-0 w-18 bg-white  w-80 m-auto my-5 shadow-md">
    <div class="py-8 px-8 rounded-xl">
        <h1 class="font-medium text-2xl mt-3 text-center">Connexion</h1>
        <form action="" class="mt-6">
            <div class="my-5 text-sm">
                <label for="username" class="block text-black">Nom d'utilisateur</label>
                <input type="text" autofocus id="username" class="emailInput rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Nom d'utilisateur" />
                <?php if ($Messages_Erreurs === 5) { ?>
                    <div class="message echec">Veuillez remplir le champ.</div>
                <?php } ?>
            </div>
            <div class="my-5 text-sm">
                <label for="password" class="block text-black">Mot de passe</label>
                <input type="password" id="password" class="passwordInput rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Mot de passe" />
                <?php if ($Messages_Erreurs === 5) { ?>
                    <div class="message echec">Veuillez remplir le champ.</div>
                <?php } ?>
                <div class="flex justify-end mt-2 text-xs text-gray-600">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
            </div>

            <button class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-black w-full">Se connecter</button>
        </form>

        <div class="flex md:justify-between justify-center items-center mt-10">
            <div style="height: 1px;" class="bg-gray-300 md:block hidden w-4/12"></div>
            <p class="md:mx-2 text-sm font-light text-gray-400"> Connexion Réseaux </p>
            <div style="height: 1px;" class="bg-gray-300 md:block hidden w-4/12"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-2 mt-7">
            <div>
                <button class="text-center w-full text-white bg-blue-900 p-3 duration-300 rounded-sm hover:bg-blue-700">Facebook</button>
            </div>
            <div>
                <button class="text-center w-full text-white bg-blue-400 p-3 duration-300 rounded-sm hover:bg-blue-500">Twitter</button>
            </div>
        </div>

        <p class="mt-12 text-xs text-center font-light text-gray-400"> Vous n'avez pas de compte ? <a href="#" class="text-black font-medium"> Créez-le ! </a> </p>

    </div>
</div>