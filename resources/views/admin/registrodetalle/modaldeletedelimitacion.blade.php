        


        <div class="modal modal-danger fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-deletedelimitacion-{{$delimitacion->iddelimitacionestudio}}">
      {{Form::Open(array('action'=>array('RegistrodetalleController@destroy',$delimitacion->iddelimitacionestudio),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar Delimitación</h4>
              </div>
              <div class="modal-body">
                 <input type="hidden" id="idestudiodelimitacion" name="idestudiodelimitacion" class="form-control" value="{{$estudio->idestudio}}">
                <p>Confirme si desea Eliminar la Delimitación: {{$delimitacion->departamento}}-{{$delimitacion->provincia}}-{{$delimitacion->distrito}}?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline">Confirmar</button>
              </div>
     
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      {{Form::Close()}}
        </div>
