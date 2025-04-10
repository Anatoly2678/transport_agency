<div class="modal fade" id="staticModalWindow" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticModalWindowLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalWindowLabel">..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="staticModalWindowBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Закрыть</button>
        <button type="button" class="btn btn-primary" data-url="" data-id="" id="staticModalConfirmBtn" onclick="confirmModal()">Подтвердить</button>
      </div>
    </div>
  </div>
</div>

<script>
function closeModal() {
    $('#staticModalWindow').modal('hide');
}
function confirmModal() {
    let url = $("#staticModalWindow #staticModalConfirmBtn").attr( "data-url");
    let id = $("#staticModalWindow #staticModalConfirmBtn").attr( "data-id");
    console.log(`${url}/?id=${id}`);
    $('#staticModalWindow').modal('hide');
}
</script>