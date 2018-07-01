        <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-observacion">
      {{Form::Open(array('action'=>array('SeguimientoController@destroy',$obs->idobservacion),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <div>
                <div class="mailbox-read-info">
                <h3>{{$obs->asuntoobservacion}}</h3>
                <h5>Evaluador: {{$obs->nombres}}
                  <span class="mailbox-read-time pull-right">{{$obs->created_at}}</span></h5>
              </div>
                <div class="mailbox-read-message">
                {!!$obs->descripcionobservacion!!}
              </div>
              </div>
              <div id="documentosobservacion" class="box-footer">
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

