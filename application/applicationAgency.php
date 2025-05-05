<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$userId = LoginModel::GetToken();
if (empty($userId)) {
    exit(header("Location: /login/login.php"));
}
?>
<!DOCTYPE html>
<html lang="ru">
<?php $title = "Заявка от агентства";
include($_SERVER['DOCUMENT_ROOT'] . "/includes/head-contents.php"); ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/menu.php"); ?>
    <div class="container-md">
        <form class="row g-3" method="POST" id="application-reg-form" action="createAgencyApplication.php">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Агентство/Заказчик
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <?php include("agencyInfo.php"); ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed1" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Туристы
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <?php include("clientInfo.php"); ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed1" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseThree">
                            Транспорт
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <?php include("routeInfo.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type="hidden" name="is_submit" value="true">
                <button type="submit" class="btn btn-primary" name="submit"
                    id="add-agency-application">Зарегистрировать</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>

<script>

    $("#add-client-btn").click(function () {
        $("#clients_block div").each(function (i) {
            if (this.style.display == "none") {
                this.style.display = "flex";
                $('[id="' + this.id + '"]:visible').find(":input").attr("required", "required");
                return false;
            }
        });
    });

    $("#add-agency-application").click(function () {
        var validator = $('#application-reg-form').validate();
        validator.form();
    });
</script>

<script>
    let route;
        let transport;
        let routeTransportList;
    init();

    $("#routeTo").change(function () {
        syncTransportSelector('#routeTo', '#transportTo');
    });

    $("#routeFrom").change(function () {
        syncTransportSelector('#routeFrom', '#transportFrom');
    });

    $("#toForm").change(function () {
        showHideFormBlock("#toForm", "#toFormBlock");
    });

    $("#fromForm").change(function () {
        showHideFormBlock("#fromForm", "#fromFormBlock");
    });

    function init() {
        showHideFormBlock("#toForm", "#toFormBlock");
        showHideFormBlock("#fromForm", "#fromFormBlock");

        route = <?php echo json_encode($routeList); ?>;
         transport = <?php echo json_encode($transportList); ?>;
         routeTransportList = <?php echo json_encode($routeTransportList); ?>;

        console.log(route);
        console.log(transport);
        console.log(routeTransportList);
    }

    function showHideFormBlock(checkBoxId, formBlockId) {
        var toFormChecked = $(checkBoxId).is(":checked");
        if (toFormChecked == false) {
            $(formBlockId).hide();
        }
        else {
            $(formBlockId).show();
        }
    }

    function syncTransportSelector(routeSelector, transportSelector) {
        let selectId = $(routeSelector).val();
        const newRouteList = routeTransportList.filter(v => v.route_id == selectId);
        var value = $(transportSelector + ' :selected').text();
        $(transportSelector).empty().append('<option selected>' + value + '</option>');
        $.each(newRouteList, function (key, val) {
            $(transportSelector).append($('<option value="' + val.transport_id + '" >' + val.showName + '</option>'));
        });
    }
</script>