<?php require_once APPROOT . "/View/Fragements/Global/header.php"; ?>

<div class="container mx-auto">
    <h1 class="text-2xl">Overzicht fietsen</h1>

    <?php if ($data['radius']) { ?>
        <div class="min-radius">
            Overazicht fietsen met een minimale radius van <?php echo $data['radius'] ?> km.
        </div>
    <?php } ?>

    <div class="w-full">
        <ul class="ml-4 list-disc">

            <?php foreach ($data['bikes'] as $bike) {
                echo "
            <li> {$bike['name']} heeft radius {$bike['radius']} km</li>
            ";
            } ?>
        </ul>


    </div>
</div>

<?php require_once APPROOT . "/view/Fragements/Global/footer.php"; ?>

