<?php
//Connect til DB
include "./includes/_connect.php";

//Hent data fra "inews"-tabellen
$stmt = active();

while ($row = $stmt->fetch()) {
?>
    <div class="grid grid-cols-5 p-8 glide__slide">
        <div class="col-span-3 text-white   flex-grow">
            <h2 class="text-3xl mt-10 mb-8">Elever i Praktik</h2>
            <p class="text-2xl mb-8">
                <?php
                echo $row['descWhere'];
                ?>
            </p>
            <p class="text-2xl"><?php
                                echo $row['descWhat'];
                                ?></p>
        </div>
        <div class="col-span-2 justify-self-end h-[380px]">
            <img class=" h-full w-auto" src="<?php echo $row['src']; ?>" alt="<?php echo $row['alt']; ?>" />
        </div>
    </div>
<?php
}
