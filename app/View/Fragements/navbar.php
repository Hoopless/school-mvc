<div class="w-full bg-red-500 text-white flex flex-wrap justify-between">
    <div class="logo flex">
        <div class="px-4 py-5">
            <?php require APPROOT . "/../public/svg/bike-logo.svg" ?>
        </div>

        <div class="ml-10 flex flex-wrap justify-around">
            <a href="<?php echo DOMAIN . URLROOT . "/" ?>"
               class="hover:bg-red-200 hover:text-black px-4 py-5 text-xl">
                Home
            </a>
            <a href="<?php echo DOMAIN . URLROOT . "/about" ?>"
               class="hover:bg-red-200 hover:text-black px-4 py-5 text-xl">
                About
            </a>
        </div>
    </div>

    <div class="nav flex flex-wrap justify-around">
        <?php if (isset($_SESSION['logged_in'])) : ?>
            <a href="<?php echo DOMAIN . URLROOT . "/logout" ?>"
               class="hover:bg-red-200 hover:text-black px-4 py-5  h-full text-xl">
                Logout <i class="ml-4 fas fa-sign-out-alt"></i>
            </a>
        <?php else : ?>

            <a href="<?php echo DOMAIN . URLROOT . "/login" ?>"
               class="hover:bg-red-200 hover:text-black px-4 py-5  h-full text-xl">
                Login
            </a>

            <a href="<?php echo DOMAIN . URLROOT . "/register" ?>"
               class="hover:bg-red-200 hover:text-black px-4 py-5  text-xl">
                Register
            </a>
        <?php endif; ?>

    </div>
</div>