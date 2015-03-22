<h2>Trabajar con Tipos de Almacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=tipo_almacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col2 hd">Código</div>
    <div class="col8 hd">Descripción</div>
  </div>
  {{foreach tipo_almacenes}}
  <div class="row">
    <div class="col2">{{tipal_id}}</div>
    <div class="col8">{{tipal_des}}</div>
    
    <div class="col2">
      <a href="index.php?page=tipo_almacen&acc=upd&tipal_id={{tipal_id}}">Update</a> |
      <a href="index.php?page=tipo_almacen&acc=dlt&tipal_id={{tipal_id}}">Delete</a>
    </div>
    
  </div>
  {{endfor tipo_almacenes}}
</div>
