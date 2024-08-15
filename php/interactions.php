<?php
    include('connect.php');
    $array = array();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/interactions.css">
    <title> Interactions | Gastronomy Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- OFFCANVAS -->
    <div class="container-fluid py-2 inicioBar">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 offset-xl-0 offset-lg-0 offset-md-1 ms-5">
                <div class="sideBar">
                    <button class="btn ms-xl-1" id="botoncito" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <picture> <img src="../img/list-verde.svg" alt=""></picture> 
                    </button>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                        <h5 class="offcanvas-title ms-3" id="offcanvasExampleLabel">Interactions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="dropdown mt-3">
                                <ul>
                                    <li><a class="dropdown-item" href="../html/index.html">Home</a></li>
                                    <li><a class="dropdown-item" href="../php/vocabulary.php">Vocabulary</a></li>
                                    <li><a class="dropdown-item" href="../php/concepts.php">Concepts</a></li>
                                    <li><a class="dropdown-item" href="../php/interactions.php" id="selected">Interactions</a></li>
                                    <li><a class="dropdown-item" href="../php/playground.php">Playground</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 mt-2 barraBuscar">
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                </form>
            </div>
            <div class="col-xl-1 col-lg-1 col-md-2 col-sm-1 offset-xl-1 offset-lg-1 offset-md-0 offset-sm-1">
                <div class="logoNavBar ps-xl-5 ps-lg-0 ps-md-5">
                    <img src="../img/logoSena.webp" alt="" style="width: 50px;">
                </div>
            </div>
        </div>
    </div>
    <!--Categories-->
    <div class="container mt-5">
        <div class="categories">
            <!--DROPDOWN DE CATEGORIAS-->
            <div class="botonesVocabulario">
                <!--Boton para añadir vocabulario-->
                <div class="botonInsertar">
                    <button type="button" class="Insertar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <picture> <img src="../img/agregar.png" alt=""> </picture>
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Interactions</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="insertInteractions.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                            <label for="imageVocabulary" class=" image form-label">Image</label>
                                            <input type="file" class="form-control" name="imageInteractions" id="imageVocabulary" multiple required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">Title Video</label>
                                            <input type="text" class="form-control" name="titleInteractions" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">Link Video</label>
                                            <input type="text" class="form-control" name="linkInteractions" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">Autor Video</label>
                                            <input type="text" class="form-control" name="autorInteractions" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">Descripction Video</label>
                                            <input type="text" class="form-control" name="descriptionInteractions" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="add btn">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="botonInsertarText">
                        <span>Add Interactions</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!--Cards Interactions-->

    <div class="container mt-5">
        <div class="row">

        <?php
            if($ejecutar = mysqli_query($varConexion, "SELECT * FROM social") ){
                while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                    $e = array();
        ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-1">
                <div class="cardInteractions">
                    <div class="imgCardInteractions">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row[1])?>" alt="">
                    </div>
                    <a href="<?php echo $row[2]?>" target="_blank">
                        <div class="buttonPlay">
                            <div class="imgPlay">
                                <img src="../img/play.png" alt="">
                            </div>
                            <div class="textPlay">
                                <span>Watch</span>
                            </div>
                        </div>
                    </a> 
                    <div class="textInteractions">
                        <h2><?php echo $row[3]?></h2>
                        <h3><?php echo $row[4]?></h3>
                        <p><?php echo $row[5]?></p>
                    </div>
                    <div class="infoYoutube">
                        <div class="Youtube">
                            <span>YouTube</span>
                        </div>
                        <div class="duracion">
                            <div class="imgDuracion">
                                <img src="../img/duracion.png" alt="">
                            </div>
                            <div class="textDuracion">
                                <p>1h 10m 11s</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                    array_push ($array, $e);
                }
            ?>
            
        </div>
    </div>
        
    <!--Footer-->
    <footer class="container-fluid">
        <div class="iconos pt-2">
            <a href=""><img src="../img/imgSocial/instagram.webp" width ="30"></a>
            <a href=""><img src="../img/imgSocial/facebook.webp" width="30"></a>
            <a href=""><img src="../img/imgSocial/twitter.webp" width="30"></a>
            <a href=""><img src="../img/imgSocial/youtube.webp" width="30"></a>
            <a href=""><img src="../img/imgSocial/linkedin.webp" width="30"></a>
        </div>
        <div class="socialSena ">
            <a href=""> <h2>@SENAComunica</h2> </a>
        </div>
        <div class="urlSena pb-2">
            <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blank"> <h3>www.sena.edu.co</h3> </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>