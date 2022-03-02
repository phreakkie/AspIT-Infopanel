<?php
//Connect til DB
include "./includes/_connect.php";

$stmt = getAllFromTable("inews");

while ($row = $stmt->fetch()) {
?>
    <tr class="">
        <td class="p-3  text-center border-x-2 border-white border-y-4"><?php echo substr($row['descWhere'], 0, 30); ?></td>
        <td class="p-3  text-center border-x-2 border-white border-y-4"><?php echo substr($row['descWhat'], 0, 30); ?></td>
        <td class="p-3  text-center border-x-2 border-white border-y-4"><?php echo substr($row['src'], 0, 30); ?></td>
        <td class="p-3  text-center border-x-2 border-white border-y-4"><?php echo substr($row['alt'], 0, 30); ?></td>
        <td class="p-3  text-center border-x-2 border-white border-y-4"><a class=" flex justify-center hover:underline" href="updateNews.php?updateID=<?= $row['id'] ?>">Opdater</a></td>
        <td class="p-3  text-center border-x-2 border-white border-y-4"><a class=" flex justify-center" href="updateNews.php?deleteID=<?= $row['id'] ?>">
                <span class="crosssign flex justify-center items-center w-6 h-6 bg-red-500 rounded-full">
                    <div class="crosssign_stem absolute w-1 h-3 bg-white -rotate-45"></div>
                    <div class="crosssign_stem_right absolute w-1 h-3 bg-white rotate-45"></div>
                </span>
            </a></td>
        <td class="p-3  text-center border-x-2 border-white border-y-4"><?php substr($row['alt'], 0, 30); ?>
            <a href="">
                <input name="active" type="checkbox">
            </a>
        </td>
    </tr>
<?php
}