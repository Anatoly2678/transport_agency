<html lang="ru">

<?php $title ="Список агентств"; include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>

<body>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/menu.php");?>
    <!-- https://examples.bootstrap-table.com/#methods/filter-by.html#view-source -->
    <div id="toolbar">
        <button id="button" class="btn btn-secondary">
            filterBy
        </button>
        <button id="custom" class="btn btn-secondary">
            filterBy custom
        </button>
    </div>
    <table data-toggle="table" data-url="agency-list-json.php" id="table" data-show-pagination-switch="true"
        data-pagination="true" data-height="660">
        <thead>
            <tr>
                <th data-field="uniq_id" data-visible="false">ИД</th>
                <th data-formatter="nameFormatter">Наименование</th>
                <th data-formatter="contactFormatter">Контакты</th>
                <th data-field="is_confirm" data-formatter="boolFormatter">Подтвержден</th>
                <th data-field="disabled" data-formatter="boolFormatter">Отключен</th>
                <th data-field="action" data-formatter="actionFormatter" data-events="actionEvents">
                    Действие
                </th>
            </tr>
        </thead>
    </table>
</body>

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/modal-window.php");?>

</html>

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/footer-content.php");?>


<script>
const $table = $('#table')
const $button = $('#button')
const $customButton = $('#custom')

$(function() {
    $button.click(function() {
        $table.bootstrapTable('filterBy', {
          uniq_id: ['0ffbe805-0f1c-11f0-8136-00ffeb5773c7', '4fc4ed33-0f1c-11f0-8136-00ffeb5773c7']
        })
    })

    $customButton.click(function() {
        $table.bootstrapTable('filterBy', {
            id: 4
        }, {
            filterAlgorithm: (row, filters) => row.id % filters.id === 0
        })
    })
})

window.actionEvents = {
    'click .btn'(e, value, row, index) {
        $("#staticModalWindow #staticModalWindowLabel").html(`${row.name} - Подтверждение`);
        $("#staticModalWindow #staticModalWindowBody").html(
            `Email: ${row.email}<br/>Телефон: ${row.phone}<br/>Менеджер: ${row.manager}<br/>Инн: ${row.inn}`);
        $("#staticModalWindow #staticModalConfirmBtn").attr("data-url", "agency_confirm.php")
        $("#staticModalWindow #staticModalConfirmBtn").attr("data-id", row.uniq_id)
        $('#staticModalWindow').modal('show');
    }
}

window.actionFormatter = () =>
    '<button class="btn btn-secondary" data-toggle="modal" data-target="#modalConfirmAgency">Подтвердить</button>'
window.boolFormatter = (value) => {
    return (value != 0 ? "Да" : "Нет");
}

window.nameFormatter = (value, row) => {
    return `${row.name}<br/>Инн: ${row.inn}`;
}
window.contactFormatter = (value, row) => {
    return `Email: ${row.email}<br/>Телефон: ${row.phone}<br/>Менеджер: ${row.manager}`;
}
</script>