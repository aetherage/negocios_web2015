<h2>{{empresaTitle}}</h2>
<a href="index.php?page=empresas">Listado de Empresas</a>
<form action="index.php?page=empresa&acc={{empresaMode}}" method="post">
  <div>
    <label class="col4" for="emp_id">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{emp_id}}"/>
    <input type="hidden" id="emp_id" name="emp_id" value="{{emp_id}}"/>
  </div>
  <div>
    <label class="col4" for="emp_des">Nombre del Empresa</label>
    <input class="col8" type="text" id="emp_des" name="emp_des" value="{{emp_des}}" {{disabled}}/>
  </div>
    <div>
    <label class="col4" for="emp_rtn">Rtn Empresa</label>
    <input class="col8" type="text" id="emp_rtn" name="emp_rtn" value="{{emp_rtn}}" {{disabled}}/>
  </div> 
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{empresaMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
