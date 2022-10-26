<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>
</head>
<body>
    <?php 
        if (isset($_GET["searchkey"])) {
            echo "<h1>Search: " . $_GET["searchkey"] . "</h1>";
        }
        else {
            echo "<h1>Songs</h1>";
        }
    ?>

    <div class="contents">
        <div id="controls">
            <form id="control_form">
                <input type="text" id="searchkey" value="<?php if (isset($_GET["searchkey"])) echo $_GET["searchkey"]?>" hidden>
                <div id="sort-menu">
                    Title: 
                    <select name="titleorder" id="titleorder" onchange="reloadList()">
                        <option value="1" selected>Ascending</option>
                        <option value="-1">Descending</option>
                        <option value="0">-</option>
                    </select>
                    Year Released:
                    <select name="yearorder" id="yearorder" onchange="reloadList()">
                        <option value="1">Ascending</option>
                        <option value="-1">Descending</option>
                        <option value="0" selected>-</option>
                    </select>

                </div>

                <div id="filter-menu">
                    Genre:
                    <div id="filter-menu-options">
                        <?php 
                            foreach ($data["genres"] as $genre) {
                                echo "<input type='checkbox' class='genre-checkbox' name='genre[]' value='" . $genre . 
                                "' onclick='reloadList()'>" . $genre . "</input>";
                            }
                        ?>
                    </div>
                </div>

                <div id="searchbase-menu">
                    Search based on:
                    <select name="searchbase" id="searchbase" onchange="reloadList()">
                        <option value="all">All</option>
                        <option value="title">Title</option>
                        <option value="artist">Artist</option>
                        <option value="year">Year Released</option>
                    </select>
                </div>
            </form>
        </div>
        <div id="song-list"></div>
        <div id="pagination"></div>
    </div>
    
    <script>
        function reloadList(page = 1) {
            let request = new XMLHttpRequest();

            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(request.responseText);
                    let response = JSON.parse(request.responseText);

                    // Songs list
                    songListHTML = "";

                    if (response.data.length > 0) {
                        response.data.forEach(song => {
                            songListHTML += "<a href='/index.php/songs/" + song.song_id + "'><div>"; 
                            songListHTML += "<span>" + song.judul + "</span>"
                            songListHTML += "<span>" + song.penyanyi + "</span>"
                            songListHTML += "<span>" + song.tahun_terbit + "</span>"
                            songListHTML += "<span>" + song.genre + "</span>"
                            songListHTML += "</div></a>";
                        });
                    }
                    else {
                        songListHTML = "<h2>No Songs Found</h2>"
                    }

                    document.getElementById("song-list").innerHTML = songListHTML;

                    // Pagination links
                    let paginationHTML = "";
                    if (response.data.length > 0) {
                        if (page == 1) {
                            paginationHTML += "<a class='pagination-link active' href='javascript:reloadList(1)'>1</a>";
                        }
                        else if (page == response.totalPages && response.totalPages > 2) {
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page-1) + ")'>Previous</a>";
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page-2) + ")'>" + (page-2) + "</a>";
                        }
                        else {
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page-1) + ")'>Previous</a>";
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page-1) + ")'>" + (page-1) + "</a>";
                        }

                        if (page == 1 && response.totalPages > 2) {
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page+1) + ")'>" + (page+1) + "</a>";
                        }
                        else if (page == response.totalPages && response.totalPages > 2) {
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page-1) + ")'>" + (page-1) + "</a>";
                        }
                        else if (response.totalPages > 2) {
                            paginationHTML += "<a class='pagination-link active' href='javascript:reloadList(" + (page) + ")'>" + (page) + "</a>";
                        }

                        if (page == response.totalPages && response.totalPages > 1) {
                            paginationHTML += "<a class='pagination-link active' href='javascript:reloadList(" + (page) + ")'>" + (page) + "</a>";
                        }
                        else if (page == 1 && response.totalPages > 2) {
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page+2) + ")'>" + (page+2) + "</a>";
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page+1) + ")'>Next</a>";
                        }
                        else if (response.totalPages > 2) {
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page+1) + ")'>" + (page+1) + "</a>";
                            paginationHTML += "<a class='pagination-link' href='javascript:reloadList(" + (page+1) + ")'>Next</a>";
                        }
                    }
                    
                    document.getElementById("pagination").innerHTML = paginationHTML;
                }
            }

            const urlParams = new URLSearchParams(window.location.search);

            let genreCheckboxes = document.getElementsByName("genre[]");
            let genre = []

            for (let i = 0; i < genreCheckboxes.length; i++) {
                if (genreCheckboxes[i].checked) {
                    genre.push(genreCheckboxes[i].value);
                }
            }

            const requestURLParams = new URLSearchParams({
                page: page,
                searchkey: document.getElementById("searchkey").value,
                base: document.getElementById("searchbase").value,
                titleorder: document.getElementById("titleorder").value,
                yearorder: document.getElementById("yearorder").value,
                genre: genre
            });

            request.open("GET", "/index.php/api/songs?" + requestURLParams.toString());
            request.send();
        }

        reloadList();
    </script>
</body>
</html>