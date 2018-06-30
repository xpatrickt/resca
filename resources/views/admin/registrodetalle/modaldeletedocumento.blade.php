        <div class="modal modal-danger fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-deletedocumento-{{$documento->iddocumentoestudio}}">
      {{Form::Open(array('action'=>array('RegistrodetalleController@edit',$documento->iddocumentoestudio),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar Documento</h4>
              </div>
              <div class="modal-body">
                 <input type="hidden" id="idestudiodocumento" name="idestudiodocumento" class="form-control" value="{{$estudio->idestudio}}">
                <p>Confirme si desea Eliminar el Documento: {{$documento->descdocumentoestudio}}?</p>
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
