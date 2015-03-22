<h2>Trabajar con Almacenes</h2>
<div class="col12 right clean">
  <a href="index.php?page=almacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col1 hd">Código</div>
    <div class="col1 hd">Descripción</div>
    <div class="col1 hd">Super Almacen</div>
    <div class="col1 hd">Sub Almacen</div>
    <div class="col1 hd">Tipo</div>
    <div class="col1 hd">Dirección</div>
    <div class="col1 hd">Teléfono Principal</div>
    <div class="col1 hd">Teléfono Secundario</div>
    <div class="col1 hd">Materiales</div>
    <div class="col1 hd">Código Empresa</div>
  </div>
  {{foreach almacenes}}
  <div class="row">
    <div class="col1">{{al_id}}</div>
    <div class="col1">{{al_des}}</div>
    <div class="col1">{{al_sup_al}}</div>
    <div class="col1">{{al_sub_al}}</div>
    <div class="col1">{{al_tip}}</div>
    <div class="col1">{{al_dir}}</div>
    <div class="col1">{{al_tel}}</div>
    <div class="col1">{{al_tel2}}</div>
    <div class="col1">{{al_mate}}</div>
    <div class="col1">{{al_emp_id}}</div>
    
    <div class="col2">
      <a href="index.php?page=almacen&acc=upd&al_id={{al_id}}">Update</a> |
      <a href="index.php?page=almacen&acc=dlt&al_id={{al_id}}">Delete</a>
    </div>
    
  </div>
  {{endfor almacenes}}
</div>
