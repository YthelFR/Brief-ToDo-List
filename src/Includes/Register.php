<!-- REGISTER -->
<div id="registerBar" class=" right-0 bg-white w-80 m-auto my-5 shadow-md">
    <div class="py-8 px-8 rounded-xl">
        <h1 class="font-medium text-2xl mt-3 text-center">Inscription</h1>
        <div action="" class="mt-6">
            <div class="my-5 text-sm">
                <label class="block text-black" for="lastName">Nom</label>
                <input class="lastName rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" type="text" name="lastName" id="lastName" placeholder="Nom" />
            </div>
            <div class="my-5 text-sm">
                <label class="block text-black" for="firstName">Prénom</label>
                <input class="firstName rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" type="text" name="firstName" id="firstName" placeholder="Prénom" />
            </div>
            <div class="my-5 text-sm">
                <label class="block text-black" for="mail">Mail</label>
                <input class="email rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" type="text" name="mail" id="mail" placeholder="@Mail" />
            </div>

            <div class="my-5 text-sm">
                <label class="block text-black" for="password">Mot de passe</label>
                <input class="password rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" type="text" name="password" id="password" placeholder="Mot de passe" />
            </div>
            <div class="my-5 text-sm">
                <label class="block text-black" for="confirm">Confirmer le Mot de passe</label>
                <input class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" type="text" name="confirm" id="confirm" placeholder="Confirmer le mot de passe" />
            </div>

            <button id="btn-inscription" onclick="CreateThisUser()" type="submit" name="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">S'inscrire</button>
            <button type="submit" class="w-full mt-6 mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">Connexion</button>
        </div>
    </div>
</div>