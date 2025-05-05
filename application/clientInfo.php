<div id="clients_block" class="alert alert-success" role="alert">
    <?php
    for ($i = 0; $i < $maxClient; $i++) {
        $isSHide = $i >= $hideClientCounter;
        ?>

        <div class="accordion-body row" id="client-info_<?php echo ($i) ?>" style="padding: 2px 10px;margin: 0; <?php echo ($isSHide ? 'display:none' : '') ?>" >
            <div class="col">
                <label for="fam_<?php echo ($i) ?>" class="form-label">Фамилия</label>
                <input type="text" class="form-control form-control-sm" id="fam_<?php echo ($i) ?>" name="fam[]" <?php echo ($isSHide ? '' : 'required') ?> title="Укажите фамилию">
            </div>
            <div class="col">
                <label for="name_<?php echo ($i) ?>" class="form-label">Имя</label>
                <input type="text" class="form-control form-control-sm" id="name_<?php echo ($i) ?>" name="name[]" <?php echo ($isSHide ? '' : 'required') ?> title="Укажите имя">
            </div>
            <div class="col-2">
                <label for="dob_<?php echo ($i) ?>" class="form-label">Дата рождения</label>
                <input type="date" class="form-control form-control-sm" id="dob_<?php echo ($i) ?>" name="dob[]" <?php echo ($isSHide ? '' : 'required') ?> title="Укажите дату рождения">
            </div>
        </div>

    <?php } ?>

    <div class="accordion-body row">
        <input name="client-btn" id="add-client-btn" class="col-auto btn btn-secondary btn-sm" value="Добавить туриста"
            type="button" />
    </div>
</div>