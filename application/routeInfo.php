<?php
use Core\Selector\SelectorComponent;

$route = new RouteModel();
$transport = new TransportModel();
$routeTransport = new RouteTransportListModel();

$routeList = $route->GetActiveList($db);
$transportList = $transport->GetActiveList($db);
$routeTransportList = $routeTransport->getActiveList($db);

?>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Направление в:</h4>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="toForm">
        <label class="form-check-label" for="toForm">Включить</label>
    </div>
    <div id="toFormBlock">
        <div class="row">
            <div class="col-6">
                <?php
                SelectorComponent::Show("routeTo", "Направление", $routeList, true, "Укажите Направление");
                ?>
            </div>
            <div class="col-6">
                <?php
                SelectorComponent::Show("transportTo", "Транспорт", $routeTransportList, true, "Укажите Транспорт");
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="flightTo" class="form-label">Рейс</label>
                <input type="text" class="form-control form-control-sm" id="flightTo" name="flightTo" required
                    title="Укажите Рейс">
            </div>
            <div class="col">
                <label for="cityTo" class="form-label">Прибытие (страна\город)</label>
                <input type="text" class="form-control form-control-sm" id="cityTo" name="cityTo"
                    title="Укажите Прибытие (страна\город)">
            </div>
            <div class="col">
                <label for="dateTo" class="form-label">Дата</label>
                <input type="date" class="form-control form-control-sm" id="dateTo" name="dateTo" required
                    title="Укажите Дата прибытия">
            </div>
            <div class="col">
                <label for="timeTo" class="form-label">Время</label>
                <input type="time" class="form-control form-control-sm" id="timeTo" name="timeTo" required
                    title="Укажите Время прибытия">
            </div>
        </div>
    </div>
</div>

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Направление из:</h4>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="fromForm">
        <label class="form-check-label" for="toForm">Включить</label>
    </div>
    <div id="fromFormBlock">
        <div class="row">
            <div class="col-6">
                <?php
                SelectorComponent::Show("routeFrom", "Направление", $routeList, true, "Укажите Направление");
                ?>
            </div>
            <div class="col-6">
                <?php
                SelectorComponent::Show("transportFrom", "Транспорт", $routeTransportList, true, "Укажите Транспорт");
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="flightFrom" class="form-label">Рейс</label>
                <input type="text" class="form-control form-control-sm" id="flightFrom" name="flightFrom" required
                    title="Укажите Рейс">
            </div>
            <div class="col">
                <label for="cityFrom" class="form-label">Убытие (страна\город)</label>
                <input type="text" class="form-control form-control-sm" id="cityFrom" name="cityFrom"
                    title="Укажите Убытие (страна\город)">
            </div>
            <div class="col">
                <label for="dateFrom" class="form-label">Дата</label>
                <input type="date" class="form-control form-control-sm" id="dateFrom" name="dateFrom" required
                    title="Укажите Дата Убытия">
            </div>
            <div class="col">
                <label for="timeFrom" class="form-label">Время</label>
                <input type="time" class="form-control form-control-sm" id="timeFrom" name="timeFrom" required
                    title="Укажите Время Убытия">
            </div>
        </div>
    </div>
</div>