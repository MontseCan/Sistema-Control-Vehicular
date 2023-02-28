<?php

use webvimark\modules\UserManagement\models\User;
?>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i>
                <a href="/site/index">
                    <img src="/images/gd.ico" alt="ControlVehicular" width="60px" />

                </a>
            </i>
        </div>
        <ul class="nav-links">
            <?php if (Yii::$app->user->isSuperAdmin) { ?>
                <li>
                    <a href="/unidad/index">
                        <i class='fa-solid fa-car-side'></i>
                        <span class="link_name">Unidades</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/unidad/index">Unidades</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/servicio/index">
                        <i class='fa-solid fa-screwdriver-wrench'></i>
                        <span class="link_name">Servicios</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/servicio/index">Servicios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/registro/index">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span class="link_name">Bitácora</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/registro/index">Bitácora</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/detalle/index">
                        <i class="fa-solid fa-list-check"></i>
                        <span class="link_name">Check List</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/detalle/index">Check List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/empresa/index">
                        <i class='fa-solid fa-building'></i>
                        <span class="link_name">Empresas</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/empresa/index">Empresas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/encargado/index">
                        <i class='fa-solid fa-user'></i>
                        <span class="link_name">Encargados</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/encargado/index">Encargados</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='fas fa-tachometer-alt'></i>
                            <span class="link_name ">Administración</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="/user-management/user/index">Usuarios</a></li>
                        <li><a href="/user-management/role/index">Roles</a></li>
                        <li><a href="/user-management/permission/index">Permisos</a></li>
                        <li><a href="/user-management/auth-item-group/index">Grupo de permisos</a></li>
                    </ul>
                </li>

                </li>

            <?php } else if (User::hasRole(['encargados'])) { ?>
                <li>
                    <a href="/unidad/index">
                        <i class='fa-solid fa-car-side'></i>
                        <span class="link_name">Unidades</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/unidad/index">Unidades</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/servicio/index">
                        <i class='fa-solid fa-screwdriver-wrench'></i>
                        <span class="link_name">Servicios</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/servicio/index">Servicios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/registro/index">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span class="link_name">Bitácora</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/registro/index">Bitácora</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/detalle/index">
                        <i class="fa-solid fa-list-check"></i>
                        <span class="link_name">Check List</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/detalle/index">Check List</a></li>
                    </ul>
                </li>


            <?php } else if (User::hasRole(['controlarias'])) { ?>
                <li>
                    <a href="/unidad/index">
                        <i class='fa-solid fa-car-side'></i>
                        <span class="link_name">Unidades</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/unidad/index">Unidades</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/servicio/index">
                        <i class='fa-solid fa-screwdriver-wrench'></i>
                        <span class="link_name">Servicios</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/servicio/index">Servicios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/registro/index">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span class="link_name">Bitácora</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/registro/index">Bitácora</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/detalle/index">
                        <i class="fa-solid fa-list-check"></i>
                        <span class="link_name">Check List</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/detalle/index">Check List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/empresa/index">
                        <i class='fa-solid fa-building'></i>
                        <span class="link_name">Empresas</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/empresa/index">Empresas</a></li>
                    </ul>
                </li>
                <li>

                <?php } else if (User::hasRole(['administradores'])) { ?>
                <li>
                    <a href="/unidad/index">
                        <i class='fa-solid fa-car-side'></i>
                        <span class="link_name">Unidades</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/unidad/index">Unidades</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/servicio/index">
                        <i class='fa-solid fa-screwdriver-wrench'></i>
                        <span class="link_name">Servicios</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/servicio/index">Servicios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/registro/index">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span class="link_name">Bitácora</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/registro/index">Bitácora</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/detalle/index">
                        <i class="fa-solid fa-list-check"></i>
                        <span class="link_name">Check List</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/detalle/index">Check List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/empresa/index">
                        <i class='fa-solid fa-building'></i>
                        <span class="link_name">Empresas</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/empresa/index">Empresas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/encargado/index">
                        <i class='fa-solid fa-user'></i>
                        <span class="link_name">Encargados</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name " href="/encargado/index">Encargados</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>


    <script src="https://kit.fontawesome.com/732eb82e7d.js" crossorigin="anonymous"></script>

</body>

</html>