<!-- Добавление стоп -->
 <form class="form-horizontal form_ajax" action="/marka/ajax/" method="post">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Добавить список</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        <div class="send__result">
          <div class="result__title"></div>
          <div class="result__text"></div>
        </div>
        <div class="model_hidden">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="control-label">Название (новое на новой строке)</label>
							<textarea name="name" class="form-control" rows="3"></textarea>
						</div>
					</div>   
        </div>  
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <span class="model_hidden">
          <input type="hidden" name="action" value="add">
          <button type="submit" class="btn btn-primary">Сохранить</button>
        </span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</form>