<?php
include "./includes/_connect.php";

$stmt = getAllFromTable("events");

while ($row = $stmt->fetch()) {
    $date = $row['date'];
    $date = date("d-m-Y", strtotime($date));
?>
    <tr class="">
        
        <td class="p-3  text-center border-x-2 border-white/50 border-y-4"><?php echo substr($date, 0, 30); ?></td>
        <td class="p-3  text-center border-x-2 border-white/50 border-y-4"><?php echo substr($row['descr'], 0, 30); ?></td>
        <td class="p-3  text-center border-x-2 border-white/50 border-y-4"><?=($row['flag']==1?'Ja':'Nej'); ?></td>
        
        <!-- Opdater knap -->
        <td class="p-3  text-center border-x-2 border-white/50 border-y-4"><a class=" flex justify-center text-black hover:bg-green-400 px-1 py-1 bg-green-500 rounded" href="updateEvents.php?updateID=<?= $row['id'] ?>">Opdatér</a></td>
        <!-- Slet knap -->
        <td class="p-3  text-center border-x-2 border-white/50 border-y-4"><a class=" flex justify-center" href="updateEvents.php?deleteID=<?= $row['id'] ?>">
                <span class="crosssign flex justify-center items-center w-6 h-6 bg-red-500 rounded-full">
                    <div class="crosssign_stem absolute w-1 h-3 bg-white -rotate-45"></div>
                    <div class="crosssign_stem_right absolute w-1 h-3 bg-white rotate-45"></div>
                </span>
            </a></td>
    </tr>
<?php
}