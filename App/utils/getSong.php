<?php
    function getSong($key, $title, $singer, $genre, $year_created) {
        return '
            <tr class="song-instance flex-justify-between">
                <td>' . $key . '</td>
                <td>
                    <img src="./public/images/album.svg" alt="song-img">
                    <p>' . $title . '</p>
                    <p>' . $singer . '</p>
                </td>
                <td>' . $genre . '</td>
                <td>' . $year_created . '</td>
            </tr>
        ';
    }
?>