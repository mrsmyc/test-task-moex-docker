<div class="col-md-3">
  <h1>Валюты</h1>
  <div class="d-flex flex-row justify-content-between">
    <?foreach($data as $key => $item):?>
      <div class="card">
        <div class="card-header">
          <p><?=$key?></p>  
        </div>
        <div class="card-body">
          <p><?=$item?></p>        
        </div>
      </div>
    <?endforeach?>
  </div>
</div>