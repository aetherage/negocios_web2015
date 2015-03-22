<h2>Trabajar con Empresas</h2>
<div class="col12 right clean">
  <a href="index.php?page=empresa&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col3 hd">Código</div>
    <div class="col4 hd">Empresa</div>
    <div class="col3 hd">RTN Empresa</div>

  </div>
  {{foreach empresas}}
  <div class="row">
    <div class="col3">{{emp_id}}</div>
    <div class="col4">{{emp_des}}</div>
    <div class="col3">{{emp_rtn}}</div>
    
    <div class="col2">
      <a href="index.php?page=empresa&acc=upd&emp_id={{emp_id}}">Update</a> |
      <a href="index.php?page=empresa&acc=dlt&emp_id={{emp_id}}">Delete</a>
    </div>
    
  </div>
  {{endfor empresas}}
</div>
