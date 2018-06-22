        <div class="modal modal-danger fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create-{{$est->idestudio}}">
              <div class="box-body">
              	{!!Form::open(array('url'=>'admin/asignarevaluador','method'=>'POST','autocomplete'=>'off'))!!}
              	{{Form::token()}}
                     <div class="form-group">
                  <label for="ruc">RUC</label>
                  <input type="text" name="ruc" class="form-control" placeholder="Ingrese RUC">
                </div>
                <div class="form-group">
                  <label for="persona">Persona</label>
                  <select name="idpersona" class="form-control select2" data-placeholder="Seleccione un evaluador">
                    @foreach ($personas as $per)
                      <option value="{{$per->idpersona}}">{{$per->nombrepersona}} </option>
                    @endforeach
                  </select>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
				{!!Form::close()!!}
	          </div>
        </div>
