<?php

$db = new DbConnectClass();
$agency = new AgencyModel();
$agency->GetAgencyInfoByUid($db, $userId);
$info = $agency->displayTextInfo();
$now = new DateTime();
?>

<div class="alert alert-success" role="alert">
    <div class="col-3">
        <label for="createdAt" class="form-label" name="createdAt">Дата заявки</label>
        <input type="date" class="form-control form-control-sm" id="createdAt" disabled required
            value="<?php echo ($now->format('Y-m-d')) ?>">
    </div>
    <div class="col-9">
        <label for="agencyInfo" class="form-label">Агентство (инфо)</label>
        <input type="text" class="form-control form-control-sm" id="agencyInfo" disabled required value="<?php echo ($info) ?>">
    </div>
    <div class="col-12">
        <label for="paymentType" class="form-label">Оплата</label>
        <input type="text" class="form-control form-control-sm" id="paymentType" name="paymentType" required  title="Укажите вид оплаты">
    </div>
    <div class="col-12">
        <label for="comment" class="form-label">Комментарий</label>
        <textarea type="text" class="form-control form-control-sm" id="comment" name="comment"> </textarea>
    </div>
    <input type="hidden" name="agency_id" value="<?php echo($userId) ?>">
</div>