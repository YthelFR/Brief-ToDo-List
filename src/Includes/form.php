<!-- ----- FORMULAIRE DE TACHES ----- -->
<div class="flex items-center justify-center p-26 h-auto">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
        <div action="https://formbold.com/s/FORM_ID" method="POST">
            <div class="-mx-3 flex flex-wrap">
                <?php if ($Messages_Erreurs === 1) { ?>
                    <div class="message echec">Veuillez remplir tous les champs.</div>
                <?php } ?>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="taskName" class="mb-3 block text-base font-medium text-white">
                            Nom de la tâche
                        </label>
                        <input type="text" name="taskName" id="taskName" placeholder="Nom de la tâche" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        <?php if ($Messages_Erreurs === 2) { ?>
                            <div class="message echec">Veuillez remplir le champ.</div>
                        <?php } ?>
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="dateTask" class="mb-3 block text-base font-medium text-white">
                            Date
                        </label>
                        <input type="date" name="dateTask" id="dateTask" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        <?php if ($Messages_Erreurs === 3) { ?>
                            <div class="message echec">Veuillez sélectionner une date.</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label for="titleTask" class="mb-3 block text-base font-medium text-white">
                    Catégorie de la tâche
                </label>
                <select name="titleTask" id="titleTask" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                    <option value="">--Choisissez une catégorie--</option>
                    <option value="personnel">Personnel</option>
                    <option value="travail">Travail</option>
                    <option value="famille">Famille</option>
                    <option value="amis">Amis</option>
                </select>
            </div>

            <div class="mb-5">
                <div class="mb-2">
                    <label for="entry" class="mb-3 block text-base font-medium text-white">
                        Priorité :
                    </label>
                    <?php if ($Messages_Erreurs === 4) { ?>
                        <div class="message echec">Veuillez sélectionner une priorité.</div>
                    <?php } ?>
                    <div class="flex p-2 w-full justify-center space-x-10">
                        <div class="radio">
                            <input name="answer" type="radio" id="buttonNormal" hidden="hidden" value="B" />
                            <label for="buttonNormal" class="min-w-auto w-32 h-32 bg-blue-300 p-2 rounded-full hover:bg-blue-500 text-white font-semibold transition-rotation duration-300 hover:rotate-45 ease-in-out  flex justify-center items-center">
                                NORMAL
                            </label>
                        </div>
                        <div class="radio">
                            <input name="answer" type="radio" id="buttonImportant" hidden="hidden" value="C" />
                            <label for="buttonImportant" class="min-w-auto w-32 h-32 bg-amber-300 p-2 rounded-full hover:bg-amber-500 text-white font-semibold transition-rotation duration-300 hover:translate-y-2 ease-in-out  flex justify-center items-center">
                                IMPORTANT
                            </label>
                        </div>
                        <div class="radio">
                            <input name="answer" type="radio" id="buttonUrgent" hidden="hidden" value="D" />
                            <label for="buttonUrgent" class="min-w-auto w-32 h-32 bg-red-300 p-2 rounded-full hover:bg-red-500 text-white font-semibold transition-rotation duration-300 hover:-rotate-45 ease-in-out  flex justify-center items-center">
                                URGENT
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mb-5">
                <label for="descriptionTask" class="mb-3 block text-base font-medium text-white">
                    Description
                </label>
                <input type="text" name="descriptionTask" id="descriptionTask" placeholder="Description de la tâche..." class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div>
                <button class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Envoyer
                </button>
            </div>
                    </div>
    </div>
</div>