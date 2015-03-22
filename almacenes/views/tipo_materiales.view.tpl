<h2>Trabajar con Tipos de Materiales</h2>
<div class="col12 right clean">
  <a href="index.php?page=tipo_material&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col2 hd">Código</div>
    <div class="col8 hd">Descripción</div>
  </div>
  {{foreach tipo_materiales}}
  <div class="row">
    <div class="col2">{{tipma_id}}</div>
    <div class="col8">{{tipma_des}}</div>
    
    <div class="col2">
      <a href="index.php?page=tipo_material&acc=upd&tipma_id={{tipma_id}}">Update</a> |
      <a href="index.php?page=tipo_material&acc=dlt&tipma_id={{tipma_id}}">Delete</a>
    </div>
    
  </div>
  {{endfor tipo_materiales}}
</div>
