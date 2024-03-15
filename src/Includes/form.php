<!-- ----- FORMULAIRE DE TACHES ----- -->
<div class="flex items-center justify-center p-26 h-auto">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
        <form action="https://formbold.com/s/FORM_ID" method="POST">
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="fName" class="mb-3 block text-base font-medium text-white">
                            Nom de la tâche
                        </label>
                        <input type="text" name="fName" id="fName" placeholder="Nom de la tâche" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-white">
                            Date
                        </label>
                        <input type="date" name="date" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label for="guest" class="mb-3 block text-base font-medium text-white">
                    Libellé de la tâche
                </label>
                <select name="guest" id="guest" placeholder="--- Sélectionnez une catégorie---" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">--Choisissez une catégorie--</option>
                    <option value="personnel">Personnel</option>
                    <option value="travail">Travail</option>
                    <option value="famille">Famille</option>
                    <option value="amis">Amis</option>
                </select>
            </div>

            <div class="mb-5">
                <div class="flex p-2 w-full justify-center space-x-10">
                    <button class="min-w-auto w-28 h-28 bg-blue-300 p-2 rounded-full hover:bg-blue-500 text-white font-semibold transition-rotation duration-300 hover:rotate-45 ease-in-out">
                        Faible
                    </button>
                    <button class="min-w-auto w-28 h-28 bg-orange-300 p-2 rounded-full hover:bg-orange-500 text-white font-semibold transition-rotation duration-300 hover:translate-y-2 ease-in-out">
                        Important
                    </button>
                    <button class="min-w-auto w-28 h-28 bg-red-300 p-2 rounded-full hover:bg-red-500 text-white font-semibold transition-rotation duration-300 hover:-rotate-45 ease-in-out">
                        Urgent
                    </button>
                </div>
            </div>
            <div class="mb-5">
                <label for="tDescription" class="mb-3 block text-base font-medium text-white">
                    Description
                </label>
                <input type="text" name="tDescription" id="tDescription" placeholder="Description de la tâche..." class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div>
                <button class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
</div>
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
</div>