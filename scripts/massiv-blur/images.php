<html>
    <body>
        <?php
            echo "<h2>Just to demonstrate</h2><br>";
            $imageName="$argv[1]";
        ?>

        <?php
            $imageSizes = array(
                "800x"
            );
        ?>
        <table>
            <tr>
                <th>Original</th>
                <th>Blur 0x3->jpg</th>
                <th>Blur 0x3->svg</th>
<!--
                <th>Blur 0x6</th>
                <th>Blur 0x8</th>
-->
                <th>Quality</th>
                <?php
                for($i=0; $i<count($imageSizes); $i++) {
                    echo "<th>ImageSize (in Pixel)<br>Filesize (in Bytes)</th>";
                }
                ?>
            </tr>

            <?php
                $toShowSize="800x";
                for ($quality = 80; $quality > 0; $quality -= 5) {
                    echo "<tr>";

                    $pictureFilename = "C:/temp/blur-test/${imageName}_${quality}q_${toShowSize}.svg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:600px\" />";
                    echo "</td>";

                    $pictureFilename = "C:/temp/blur-test/${imageName}_${quality}q_${toShowSize}_a.jpg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:600px\" />";
                    echo "</td>";

                    $pictureFilename = "C:/temp/blur-test/${imageName}_${quality}q_${toShowSize}_b.svg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:600px\" />";
                    echo "</td>";

#                    $pictureFilename = "C:/temp/blur-test/${imageName}_${quality}q_${toShowSize}_c.jpg";
#                    echo "<td>";
#                    echo "<img src=\"file:///$pictureFilename\" style=\"width:400px\" />";
#                    echo "</td>";

                    echo "<td>$quality</td>";

                    for($i=0; $i<count($imageSizes); $i++) {
                        $imageSize=$imageSizes[$i];

                        $pictureFilename = "C:/temp/blur-test/${imageName}_${quality}q_${imageSize}.jpg";
                        $filesize = filesize("$pictureFilename");
                        $pictureFilenameA = "C:/temp/blur-test/${imageName}_${quality}q_${imageSize}_a.jpg";
                        $filesizeA = filesize("$pictureFilenameA");
                        $pictureFilenameB = "C:/temp/blur-test/${imageName}_${quality}q_${imageSize}_b.svg";
                        $filesizeB = filesize("$pictureFilenameB");
                        $pictureFilenameC = "C:/temp/blur-test/${imageName}_${quality}q_${imageSize}_c.jpg";
                        $filesizeC = filesize("$pictureFilenameC");
                        echo "<td>";
						echo "$imageSize<br>Original: $filesize<br>blur 0x3: $filesizeA<br>";
						echo "blur 0x4: $filesizeB<br>";
#						echo "blur 0x6: $filesizeB<br>blur 0x8: $filesizeC";
						echo "</td>";
                    }
                    echo "</tr>";
                }
            ?>

        </table>
    </body>
</html>
