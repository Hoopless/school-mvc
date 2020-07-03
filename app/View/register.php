<?php require_once APPROOT . "/view/Fragements/Global/header.php"; ?>

<div class="container mx-auto">
    <form action="" method="post">
        <div class="bg-gray-300 px-6 py-6 w-2/4 mx-auto">
            <h2 class="text-2xl mb-2">Registeren</h2>
            <p>Hier kunt u een account aanmaken om bij onze prachtige bikecenter fietsen te kopen!</p>
            <div class=" mt-5 flex flex-wrap">
                <label class="w-full text-lg mb-1" for="name">Naam</label>
                <input class="w-full px-4 py-3 rounded border <?php echo isset($data['errors']['name']) ? " border-red-600" : "" ?>" type="text"
                       name="name"
                       id="name">
                <div class="text-xs mt-1 text-red-600 errors">
                    <?php echo isset($data['errors']['name']) ? $data['errors']['name'] : "" ?>
                </div>
            </div>
            <div class=" mt-5 flex flex-wrap">
                <label class="w-full text-lg mb-1" for="email">E-mail</label>
                <input class="w-full px-4 py-3 rounded border <?php echo isset($data['errors']['email']) ? " border-red-600" : "" ?>" type="email"
                       name="email"
                       id="email">
                <div class="text-xs mt-1 text-red-600 errors">
                    <?php echo isset($data['errors']['email']) ? $data['errors']['email'] : "" ?>
                </div>
            </div>
            <div class=" mt-5 flex flex-wrap">
                <label class="w-full text-lg mb-1" for="password">Password</label>
                <input class="w-full px-4 py-3 rounded border <?php echo isset($data['errors']['password']) ? " border-red-600" : "" ?>" type="password"
                       name="password"
                       id="password">
                <div class="text-xs mt-1 text-red-600 errors">
                    <?php echo isset($data['errors']['password']) ? $data['errors']['password'] : "" ?>
                </div>
            </div>

            <div class="w-full mt-5 text-red-600">
                <?php echo isset($data['errors']['logged_in']) ? $data['errors']['logged_in'] : "" ?>
            </div>

            <div class="w-full mt-5 flex justify-end">
                <button type="submit" class="px-4 text-white hover:bg-green-600 py-2 bg-green-400 rounded-lg">
                    Registeren <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>

            <div class="w-full mt-5 text-red-600">
                <?php echo isset($data['errors']['registered']) ? $data['errors']['registered'] : "" ?>
            </div>
        </div>


    </form>
</div>



<?php require_once APPROOT . "/view/Fragements/Global/footer.php"; ?>

