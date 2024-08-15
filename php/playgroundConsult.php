<?php
    include('connect.php');
    $array = array();
    $consulta = $_POST['playC']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayGround</title>
    <link rel="stylesheet" href="../css/playground.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                        <h3 class="offcanvas-title ms-3" id="offcanvasExampleLabel">PlayGround</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="dropdown mt-3">
                                <ul>
                                    <li><a class="dropdown-item" href="../html/index.html">Home</a></li>
                                    <li><a class="dropdown-item" href="../php/vocabulary.php">Vocabulary</a></li>
                                    <li><a class="dropdown-item" href="../php/concepts.php">Concepts</a></li>
                                    <li><a class="dropdown-item" href="../php/interactions.php">Interactions</a></li>
                                    <li><a class="dropdown-item" href="../php/playground.php" id="selected">Playground</a></li>
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
                    <img src="../img/logo_sena_verde.webp" alt="" style="width: 50px;">
                </div>
            </div>
        </div>
    </div>
    
    <!--Categories-->
    
    <!--Categories-->
    <div class="container mt-4">
        <div class="categories">
            <!--DROPDOWN DE CATEGORIAS-->
            <div class="botonesVocabulario">
                <!--Dropdown para elegir la categoria-->
                <div class="dropdown">
                    <button class="btn dropdown-toggle dropi" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
                    <ul class="dropdown-menu">
                        <form action="playground.php" method="post">
                            <button class="dropdown-item" type="submit"> All Games </button>
                        </form>
                        <form action="playgroundConsult.php" method="post">
                        <?php
                            if($ejecutar = mysqli_query($varConexion, "SELECT * FROM gameTypes") ){
                                while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                    $e = array();
                        ?>
                            <button name="playC" type="submit" class="dropdown-item" value="<?php echo $row[0]?>"> <?php echo $row[1]?> </button>
                        <?php
                                }    
                            }
                        ?>
                        </form>
                        <!--Necesita ciclo de las categorias--> 
                    </ul>
                </div>
                <!--Boton para añadir vocabulario-->
                <div class="botonInsertar">
                    <button type="button" class="Insertar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <picture> <img src="../img/agregar.png" alt=""> </picture>
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Add Game</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="insertPlayground.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">GameTitle</label>
                                            <input type="text" class="form-control" name="titleGame" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">Game Description</label>
                                            <input type="text" class="form-control" name="descriptionGame" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameWord" class=" name form-label">Game Link</label>
                                            <input type="text" class="form-control" name="linkGame" id="nameWord" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoriasSelect" class="audio form-label">Game Type</label>
                                            <select class="form-select" name="category" id="categoriasSelect" required>
                                                <option value="">-</option>
                                                <?php
                                                    if($ejecutar = mysqli_query($varConexion, "SELECT * FROM gameTypes") ){
                                                        while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                                            $e = array();
                                                ?>
                                                    <option value=<?php echo $row[0]?>> <?php echo $row[1]?> </option>
                                                <?php
                                                        }    
                                                    }
                                                ?>
                                            </select>
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
                        <span>Add Games</span>
                    </div>
                </div>
            </div>


            <!--CARD SEGUN CATEGORIA-->
            <!--Esta linea de codigo solo debe aparecer cuando se filtra según el tipo de juego-->
            <?php
                if($ejecutar = mysqli_query($varConexion, "SELECT * FROM gameTypes WHERE id = '".$consulta."'") ){
                    while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                        $e = array();
            ?>

                <?php
                    if($row[0] == 1){
                ?>
                    <div class="categoria shadow-sm py-3 px-4 bg-body-tertiary ">
                        <div class="imgCategoria">
                            <img src="../img/crucigrama.png" alt="">
                        </div>
                        <div class="textCategoria">
                            <h2> Crosswords </h2>
                            <?php
                                if($ejecutar = mysqli_query($varConexion, "SELECT count(*) FROM games WHERE idGameType = '".$consulta."' " ) ){
                                    while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                        $e = array();
                            ?>
                            <span><?php echo $row[0]?> Found</span>
                            <?php
                                    }    
                                }
                            ?>
                        </div>
                    </div>
                <?php
                    }else if ($row[0] == 2){
                ?>

                    <div class="categoria shadow-sm py-3 px-4 bg-body-tertiary ">
                        <div class="imgCategoria">
                            <img src="../img/wordsBlanco.png" alt="">
                        </div>
                        <div class="textCategoria">
                            <h2> Wordsearchs </h2>
                            <?php
                                if($ejecutar = mysqli_query($varConexion, "SELECT count(*) FROM games WHERE idGameType = '".$consulta."' " ) ){
                                    while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                        $e = array();
                            ?>
                            <span><?php echo $row[0]?> Found</span>
                            <?php
                                    }    
                                }
                            ?>
                        </div>
                    </div>
                <?php
                    }else if ($row[0] == 3){
                ?>
                    <div class="categoria shadow-sm py-3 px-4 bg-body-tertiary ">
                        <div class="imgCategoria">
                            <img src="../img/conectar.png" alt="">
                        </div>
                        <div class="textCategoria">
                            <h2> Connect Words </h2>
                            <?php
                                if($ejecutar = mysqli_query($varConexion, "SELECT count(*) FROM games WHERE idGameType = '".$consulta."' " ) ){
                                    while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                        $e = array();
                            ?>
                            <span><?php echo $row[0]?> Found</span>
                            <?php
                                    }    
                                }
                            ?>
                        </div>
                    </div>
                <?php
                    }else if ($row[0] == 4){
                ?>
                    <div class="categoria shadow-sm py-3 px-4 bg-body-tertiary ">
                        <div class="imgCategoria">
                            <img src="../img/memoria.png" alt="">
                        </div>
                        <div class="textCategoria">
                            <h2> Memory Games </h2>
                            <?php
                                if($ejecutar = mysqli_query($varConexion, "SELECT count(*) FROM games WHERE idGameType = '".$consulta."' " ) ){
                                    while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                        $e = array();
                            ?>
                            <span><?php echo $row[0]?> Found</span>
                            <?php
                                    }    
                                }
                            ?>
                        </div>
                    </div>
                <?php
                    }else if ($row[0] == 5){
                ?>
                    <div class="categoria shadow-sm py-3 px-4 bg-body-tertiary ">
                        <div class="imgCategoria">
                            <img src="../img/otros.png" alt="">
                        </div>
                        <div class="textCategoria">
                            <h2> Other Games </h2>
                            <?php
                                if($ejecutar = mysqli_query($varConexion, "SELECT count(*) FROM games WHERE idGameType = '".$consulta."' " ) ){
                                    while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                                        $e = array();
                            ?>
                            <span><?php echo $row[0]?> Found</span>
                            <?php
                                    }    
                                }
                            ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
            <?php      
                    }    
                }
            ?>
        </div>
    </div>

    <!--Cards-->
        <div class="container mt-5">
            <div class="row">
                <!--Añadir ciclo para la tabla games-->
                <?php
                    if($ejecutar = mysqli_query($varConexion, "SELECT * FROM games WHERE idGameType = '".$consulta."'") ){
                        while ($row = $ejecutar -> fetch_array (MYSQLI_NUM)){
                            $e = array();
                ?>

                    <?php
                        if ($row[4]== 1){
                    ?>
                    <!--Hacer un condicional que muestre este codigo si el juego es un crucigrama(columna gameType)-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-3 ">
                        <div class="tarjeta p-3">
                            <div class="imgCard">
                                <img src="../img/crucigrama.png" alt="">
                            </div>
                            <div class="descriptionCard pb-2">
                                <h2><?php echo $row[2]?></h2>
                                <p align="justify"><?php echo $row[3]?></p>
                            </div>
                            <div class="botonPlay px-5">
                                <!--Link del juego-->
                                <a href= "<?php echo $row[1]?>" class="btn">Play</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }else if ($row[4]== 2){
                    ?>
                        <!--Hacer un condicional que muestre este codigo si el juego es una sopa de letras(columna gameType)-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-3 ">
                        <div class="tarjeta p-3">
                            <div class="imgCard">
                                <img src="../img/wordsBlanco.png" alt="">
                            </div>
                            <div class="descriptionCard pb-2">
                                <h2><?php echo $row[2]?></h2>
                                <p align="justify"><?php echo $row[3]?></p>
                            </div>
                            <div class="botonPlay px-5">
                                <!--Link del juego-->
                                <a href= "<?php echo $row[1]?>" class="btn">Play</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }else if ($row[4]== 3){
                    ?>

                    <!--Hacer un condicional que muestre este codigo si el juego es un conecta palabra(columna gameType)-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-3 ">
                        <div class="tarjeta p-3">
                            <div class="imgCard">
                                <img src="../img/conectar.png" alt="">
                            </div>
                            <div class="descriptionCard pb-2">
                                <h2><?php echo $row[2]?></h2>
                                <p align="justify"><?php echo $row[3]?></p>
                            </div>
                            <div class="botonPlay px-5">
                                <!--Link del juego-->
                                <a href= "<?php echo $row[1]?>" class="btn">Play</a>
                            </div>
                        </div>
                    </div>

                    <?php
                        }else if ($row[4]== 4){
                    ?>

                    <!--Hacer un condicional que muestre este codigo si el juego es un conecta palabra(columna gameType)-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-3 ">
                        <div class="tarjeta p-3">
                            <div class="imgCard">
                                <img src="../img/memoria.png" alt="">
                            </div>
                            <div class="descriptionCard pb-2">
                                <h2><?php echo $row[2]?></h2>
                                <p align="justify"><?php echo $row[3]?></p>
                            </div>
                            <div class="botonPlay px-5">
                                <!--Link del juego-->
                                <a href= "<?php echo $row[1]?>" class="btn">Play</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }else if ($row[4]== 5){
                    ?>

                    <!--Hacer un condicional que muestre este codigo si el juego es un conecta palabra(columna gameType)-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mt-3 ">
                        <div class="tarjeta p-3">
                            <div class="imgCard">
                                <img src="../img/otros.png" alt="">
                            </div>
                            <div class="descriptionCard pb-2">
                                <h2><?php echo $row[2]?></h2>
                                <p align="justify"><?php echo $row[3]?></p>
                            </div>
                            <div class="botonPlay px-5">
                                <!--Link del juego-->
                                <a href= "<?php echo $row[1]?>" class="btn">Play</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                <?php
                        }    
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
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>