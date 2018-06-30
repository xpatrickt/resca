        <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-documentoobservacion-{{$idobservacion}}"
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-body">
              <div class="box-body">
                






                <div class="form-group">

                  <label for="nombree">Nombre</label>
                  <input type="text" name="nombree" value="{{$idobservacion}}" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre de Resolución</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre de Resolución">
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de Resolución</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="fecha">
                </div>
                </div>

                <div class="form-group">
                  <label for="documento">Subir Documento de Resolución</label>
                  <input type="file" name="documento" class="form-control" placeholder="Seleccione Resolución">
                </div>
                                                
                <div class="form-group">
                  <input type="hidden" name="idestado" value="8" />
                </div>              
                 <div class="form-group">
                  <input type="hidden" name="idestudio" value="{{$idobservacion}}" class="form-control" placeholder="">
                </div>   
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
              </div>
            






            
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
