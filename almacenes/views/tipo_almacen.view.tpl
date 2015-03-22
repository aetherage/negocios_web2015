<h2>{{tipo_almacenTitle}}</h2>
<a href="index.php?page=tipo_almacenes">Listado de Tipos de Almacenes</a>
<form action="index.php?page=tipo_almacen&acc={{tipo_almacenMode}}" method="post">
  <div>
    <label class="col4" for="tipal_id">Código Tipo de Almacen</label>
    <input class="col8" type="text" disabled="disabled" value="{{tipal_id}}"/>
    <input type="hidden" id="tipal_id" name="tipal_id" value="{{tipal_id}}"/>
  </div>
  <div>
    <label class="col4" for="tipal_des">Descripción del Tipo de Almacen</label>
    <input class="col8" type="text" id="tipal_des" name="tipal_des" value="{{tipal_des}}" {{disabled}}/>
  </div>
    
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{tipo_almacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
