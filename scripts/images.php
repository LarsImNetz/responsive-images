<html>
    <body>
        <?php
            echo "<h2>Just to demonstrate</h2><br>";
            $imageName="$argv[1]";
        ?>

        <?php
            $imageSizes = array(
                "2400x",
                "1200x",
                "800x",
                "400x"
            );
        ?>
        <table>
            <tr>
                <th>Image triangle</th>
                <th>Image adaptive_resize</th>
                <th>Image Gaussian</th>
                <th>Image Filter Cosine</th>
                <th>Quality</th>
                <?php
                for($i=0; $i<count($imageSizes); $i++) {
                    echo "<th>ImageSize (in Pixel)<br>Filesize (in Bytes)</th>";
                }
                ?>
            </tr>

            <?php
                $toShowSize="400x";
                for ($quality = 80; $quality > 0; $quality -= 5) {
                    echo "<tr>";

                    $pictureFilename = "C:/temp/picture-test/${imageName}_${quality}q_${toShowSize}.jpg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:400px\" />";
                    echo "</td>";

                    $pictureFilename = "C:/temp/picture-test/${imageName}_${quality}q_${toShowSize}_a.jpg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:400px\" />";
                    echo "</td>";

                    $pictureFilename = "C:/temp/picture-test/${imageName}_${quality}q_${toShowSize}_b.jpg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:400px\" />";
                    echo "</td>";

                    $pictureFilename = "C:/temp/picture-test/${imageName}_${quality}q_${toShowSize}_c.jpg";
                    echo "<td>";
                    echo "<img src=\"file:///$pictureFilename\" style=\"width:400px\" />";
                    echo "</td>";

                    echo "<td>$quality</td>";

                    for($i=0; $i<count($imageSizes); $i++) {
                        $imageSize=$imageSizes[$i];

                        $pictureFilenameTriangle = "C:/temp/picture-test/${imageName}_${quality}q_${imageSize}.jpg";
                        $filesizeTriangle = filesize("$pictureFilenameTriangle");
                        $pictureFilenameA = "C:/temp/picture-test/${imageName}_${quality}q_${imageSize}_a.jpg";
                        $filesizeA = filesize("$pictureFilenameA");
                        $pictureFilenameB = "C:/temp/picture-test/${imageName}_${quality}q_${imageSize}_b.jpg";
                        $filesizeB = filesize("$pictureFilenameB");
                        $pictureFilenameC = "C:/temp/picture-test/${imageName}_${quality}q_${imageSize}_c.jpg";
                        $filesizeC = filesize("$pictureFilenameC");
                        echo "<td>$imageSize<br>Triangle: $filesizeTriangle<br>Adaptive: $filesizeA<br>Gaussian: $filesizeB<br>Gaussian sharpen: $filesizeC</td>";
                    }
                    echo "</tr>";
                }
            ?>

        </table>
    </body>
</html>
