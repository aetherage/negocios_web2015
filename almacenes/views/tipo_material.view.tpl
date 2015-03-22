<h2>{{tipo_materialTitle}}</h2>
<a href="index.php?page=tipo_materiales">Listado de Tipos de Materiales</a>
<form action="index.php?page=tipo_material&acc={{tipo_materialMode}}" method="post">
  <div>
    <label class="col4" for="tipma_id">Código Tipo de Material</label>
    <input class="col8" type="text" disabled="disabled" value="{{tipma_id}}"/>
    <input type="hidden" id="tipma_id" name="tipma_id" value="{{tipma_id}}"/>
  </div>
  <div>
    <label class="col4" for="tipma_des">Descripción del Tipo de Material</label>
    <input class="col8" type="text" id="tipma_des" name="tipma_des" value="{{tipma_des}}" {{disabled}}/>
  </div>
    
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{tipo_materialMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
