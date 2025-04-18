<?php
    if (!class_exists('LoginModel')) { require $_SERVER['DOCUMENT_ROOT']."/login/loginModel.php"; }

    $login = new LoginModel();
    $checkToken = $login->CheckToken();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Главная</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Агентство
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/agency/agencyReg.php">Регистрация</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/agency/agencyCabinet.php">Кабинет</a></li>
                        <li><a class="dropdown-item" href="/agency/agencyList.php">Список</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Маршрут
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/route/transport/transportReg.php">Транспорт</a></li>
                        <li><a class="dropdown-item" href="/route/route/routeReg.php">Направления</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/route/transport-route.php">Маршруты</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Заявка
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Физ лицо</a></li>
                        <li><a class="dropdown-item" href="#">Агентство</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Все заявки</a></li>
                    </ul>
                </li>
                
                <?php
                    if($checkToken == false) {
                ?>               
                    <li class="nav-item">
                        <a class="nav-link" href="/login/login.php">Авторизация</a>
                    </li> 
                <?php } ?>
                <?php
                    if($checkToken) {
                ?>               
                    <li class="nav-item">
                        <a class="nav-link" href="/login/logout.php">Выход</a>
                    </li>
                <?php } ?>

                <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
            </ul>
        </div>
    </div>
</nav>

