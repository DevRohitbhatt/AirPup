<?php
require 'lib/functions.php';

// $petsJson = file_get_contents('data/pets.json');
// $pets = json_decode($petsJson, true);
$pets = get_pets();

$pets = array_reverse($pets);

$cleverWelcomeMessage = 'All the love, none of the crap!';
$pupCount = count($pets);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'layout/header.php'; ?>

<div class="jumbotron">
    <div class="container">
        <h1><?php echo strtoupper(strtolower($cleverWelcomeMessage)); ?></h1>

        <p>Over <?php echo $pupCount ?> pet friends!</p>

        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($pets as $cutePet) { ?>
            <div class="col-md-4 pet-list-item">
                <h2><?php echo $cutePet['name']; ?></h2>

                <img src="/images/<?php echo $cutePet['image']; ?>" class="img-rounded" />

                <blockquote class="pet-details">
                    <span class="label label-info"><?php echo $cutePet['breed']; ?></span>
                    <?php

                    if (!array_key_exists('age', $cutePet) || $cutePet['age'] == '') {
                        echo 'Unknown';
                    } elseif ($cutePet['age'] == 'hidden') {
                        echo '(contact owner for age)';
                    } else {
                        echo $cutePet['age'];
                    }
                    ?>
                    <?php echo $cutePet['weight']; ?> lbs
                </blockquote>

                <p>
                    <?php echo $cutePet['bio']; ?>
                </p>
            </div>
        <?php } ?>
    </div>

    <hr>

    <?php include 'layout/footer.php'; ?>