        <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-respuesta-{{$res->idrespuestaobservacion}}" >
      {{Form::Open(array('action'=>array('EvaluacionController@destroy',$res->idrespuestaobservacion),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <div>
                <div class="mailbox-read-info">
                <h3>{{$res->asuntorespuesta}}</h3>
                <h5>Observacion: {{$res->asuntoobservacion}}
                  <span class="mailbox-read-time pull-right">{{$res->created_at}}</span></h5>
              </div>
                <div class="mailbox-read-message">
                {!!$res->descripcionrespuesta!!}
              </div>
             </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
              </div>
     
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      {{Form::Close()}}
        </div>