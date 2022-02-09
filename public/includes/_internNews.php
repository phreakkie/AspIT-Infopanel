<?php
//Connect til DB
include "./includes/_connect.php";

//Hent data fra "inews"-tabellen
$sql = "SELECT * FROM inews";
$stmt = $connection->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch()) {
?>
    <div class="col-span-3 text-white pl-8">
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
    <div class="pt-4 pr-4 col-span-2 justify-self-end">
        <img class="h-[300px]" src="<?php echo $row['src']; ?>" alt="<?php echo $row['alt']; ?>" />
    </div>
<?php
}
?>