<html>
    <body>
        <?php
            echo "<h2>Just to demonstrate</h2><br>";
        ?>

        <?php
            $imageSizes = array(
                "400x",
                "800x",
                "1200x",
                "2400x"
            );
        ?>
        <table>
            <tr>
                <th>Image</th>
                <th>Quality</th>
                <?php
                for($i=0; $i<count($imageSizes); $i++) {
                    echo "<th>ImageSize<br>Filesize</th>";
                }
                ?>
            </tr>

            <?php
                $newsize="1200x";
                for ($quality = 5; $quality > 0; $quality -= 5) {
                    $pictureName = "C:/temp/picture-test/Haftpflicht-kfz_${quality}q_${newsize}.jpg";
                    echo "<tr><td>";
                    echo "<img src=\"file:///$pictureName\" style=\"width:400px\" />";
                    echo "</td>";
                    echo "<td>$quality</td>";

                    for($i=0; $i<count($imageSizes); $i++) {
                        $imageSize=$imageSizes[$i];

                        $pictureName = "C:/temp/picture-test/Haftpflicht-kfz_${quality}q_${imageSize}.jpg";
                        $filesize = filesize("$pictureName");
                        echo "<td>$imageSize<br>$filesize</td>";
                    }
                    echo "</tr>";
                }
            ?>

        </table>
    </body>
</html>
