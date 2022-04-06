<?php
//Connect til DB
include "./includes/_connect.php";

$stmt = getAllFromTable("users");

while ($row = $stmt->fetch()) {

    // Sørger for man ikke kan slette sig selv, ved ikke at vise rækken hvis rowID er lig ens sessionID
    if ($row['userid'] == $_SESSION['userid']) {
        continue;
    }
?>
    <tr class="border border-white/50">
        <td class="p-2 text-center border border-white/50 border-b-2"><?= $row['dbUsername'] ?></td>
        <td class="p-2 text-center border border-white/50 border-b-2"><?= $row['firstname'] ?></td>
        <td class="p-2 text-center border border-white/50 border-b-2"><?= $row['lastname'] ?></td>
        <td class="p-2 text-center border border-white/50 border-b-2"><?= $row['accesslevel'] ?></td>
        <td class="p-2 text-center border border-white/50 border-b-2"><a class="flex justify-center" href="deleteUsers.php?id=<?= $row['userid'] ?>">
                <span class="crosssign flex justify-center items-center w-6 h-6 bg-red-500 rounded-full">
                    <div class="crosssign_stem absolute w-1 h-3 bg-white -rotate-45"></div>
                    <div class="crosssign_stem_right absolute w-1 h-3 bg-white rotate-45"></div>
                </span>
            </a></td>
    </tr>
<?php
}
