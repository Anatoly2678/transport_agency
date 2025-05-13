<?php require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include('loginPost.php');
?>

<!DOCTYPE html>
<html lang="ru">
<style>
    .msg-text {
        text-align: center;
        font-size: 18px;
        font-weight: 400;
    }
</style>

<?php $title = "Авторизация";
include($_SERVER['DOCUMENT_ROOT'] . "/includes/head-contents.php"); ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/menu.php"); ?>
    <?php if (isset($_POST["submit"]) == false) { ?>
        <div class="container-md">
            <form class="row g-3" method="POST">
                <div class="col-6">
                    <label for="inn" class="form-label">ИНН</label>
                    <input type="text" class="form-control" id="inn" name="inn" placeholder="ИНН" required minlength="10"
                        maxlength="12" pattern="\d{10,12}" value="000000000000">
                        <!-- 053320079694 -->
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required value="11">
                    <!-- 1 -->
                </div>
                <div class="col-12">
                    <input type="hidden" name="is_submit" value="true">
                    <button type="submit" class="btn btn-primary" name="submit">Войти</button>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col">
                    <a href="/agency-registration">Зарегистрироваться</a>
                </div>
                <div class="col">
                    <a href="#">Восстановить пароль</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container-md">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label msg-text"><?php echo ($msg); ?></label>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>