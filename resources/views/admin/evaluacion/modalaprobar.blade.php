<div class="modal modal-success fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-aprobar-{{$estudio->idestudio}}">
      {!! Form::model($estudio, ['route' => ['admin.evaluacion.update', $estudio->idestudio],'method' => 'PUT']) !!}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">APROBAR ESTUDIO</h4>
              </div>
              <div class="modal-body">
                <p>Confirme si desea APROBAR EL ESTUDIO?</p>
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