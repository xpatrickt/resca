 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-agregarrespuesta-{{$obs->idobservacion}}">
      {!!Form::model($estudio,['route'=>['admin.seguimiento.update',$obs->idobservacion],'method' =>'PUT','files'=>'true'])!!} 
             {{Form::token()}}
          <div class="modal-dialog">
            <div class="modal-content" >
               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Respuesta Observación: {{$obs->asuntoobservacion}}</h4>
              </div>
             <div class="modal-body">
               <div class="box-body no-padding">
              <div class="form-group">
                <input class="form-control" placeholder="Asunto:">
              </div>
              <div class="form-group">
                    <textarea id="descripcionrespuesta" class="form-control" style="height: 200px">
                    </textarea>
              </div>
                <div class="form-group">
                  <label for="descripciondocumento">Descripción Documento</label>
                  <input type="text" id="descripciondocumento" name="descripciondocumento" class="form-control" placeholder="Ingrese Descripción">
                </div>
                <div class="form-group">
                  <label for="url">Subir Documento</label>
                  <input type="file" name="urlobs" id="urlobs" class="form-control" placeholder="Seleccione Documento">
                </div>
              </div>
              </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">guardar</button>
              </div>

            </div>
          </div>
      {{Form::Close()}}
 </div>