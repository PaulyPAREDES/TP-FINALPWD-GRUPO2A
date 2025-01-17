<!-- ____________________________________ NAV INSEGURO _____________________________ -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <div class="mx-auto">
            <img src="../../Archivos/Imagenes/logoBlanco.png" alt="Logo de la empresa" width="110">
        </div>
        <div class="container-fluid">
            <div class="container-fluid d-flex justify-content-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-Toggler" aria-controls="navbar-Toggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-Toggler">
                <ul class="nav navbar-nav d-flex align-items-center">
                    <?php
                    $current_page = $_SERVER['REQUEST_URI'];
                    $menu_items = [
                        "home.php" => "Inicio",
                        "mostrarProductos.php?nombre=Mates" => "Mates",
                        "mostrarProductos.php?nombre=Yerbas" => "Yerbas",
                        "mostrarProductos.php?nombre=Bombillas" => "Bombillas",
                        "mostrarProductos.php?nombre=Termos" => "Termos",
                        "mostrarProductos.php?nombre=SETS" => "Sets"
                    ];

                    foreach ($menu_items as $href => $label) {
                        $active = strpos($current_page, $href) !== false ? "active" : "";
                        echo "<li class='nav-item mx-2 flex-grow-1'>
                                <a class='nav-link $active' href='$href'>$label</a>
                              </li>";
                    }
                    ?>

                    <li class="nav-item login logo mx-4 flex-grow-1">
                        <i class="bi bi-person-fill fa-3x zoom-icon " data-bs-toggle="modal" data-bs-target="#modalLogin" tabindex="-1"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<?php
include_once("login.php");
include_once("crearCuenta.php");
?>