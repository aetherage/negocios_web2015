<h2>{{almacenTitle}}</h2>
<a href="index.php?page=almacenes">Listado de Almacenes</a>
<form action="index.php?page=almacen&acc={{almacenMode}}" method="post">
  <div>
    <label class="col4" for="al_id">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{al_id}}"/>
    <input type="hidden" id="al_id" name="al_id" value="{{al_id}}"/>
  </div>
  
  <div>
    <label class="col4" for="al_des">Nombre del Almacen</label>
    <input class="col8" type="text" id="al_des" name="al_des" value="{{al_des}}" {{disabled}}/>
  </div>
    <div>
    <label class="col4" for="al_sup_al">Super Almacen</label>
    <input class="col8" type="text" id="al_sup_al" name="al_sup_al" value="{{al_sup_al}}" {{disabled}}/>
  </div>

     <div>
    <label class="col4" for="al_tip">Tipo</label>
    <select class="col8" id="al_tip" name="al_tip" {{disabled}}>
      <option value="SICUB" {{sicubSelected}}>Cubierto</option>
      <option value="NOCUB" {{nocubSelected}}>Descubierto</option>
    </select>
  </div>

    <div>
    <label class="col4" for="al_dir">Dirección</label>
    <input class="col8" type="text" id="al_dir" name="al_dir" value="{{al_dir}}" {{disabled}}/>
  </div>
    <div>
    <label class="col4" for="al_tel">Teléfono Principal</label>
    <input class="col8" type="text" id="al_tel" name="al_tel" value="{{al_tel}}" {{disabled}}/>
  </div>
    <div>
    <label class="col4" for="al_tel2">Teléfono Secundario</label>
    <input class="col8" type="text" id="al_tel2" name="al_tel2" value="{{al_tel2}}" {{disabled}}/>
  </div>

   
        <div>
    <label class="col4" for="al_mate">Materiales de Manejo</label>
    <select class="col8" id="al_mate" name="al_mate" {{disabled}}>
      <option value="SICUB" {{sicubSelected}}>Cubierto</option>
      <option value="NOCUB" {{nocubSelected}}>Descubierto</option>
    </select>
  </div>
   
    <div>
    <label class="col4" for="al_emp_id">Código de la Empresa</label>
    <input class="col8" type="text" id="al_emp_id" name="al_emp_id" value="{{al_emp_id}}" {{disabled}}/>
  </div>

    
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{almacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
