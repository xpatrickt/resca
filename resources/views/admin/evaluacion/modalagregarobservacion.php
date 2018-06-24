 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-agregarobservacion">
      {{Form::Open(array('action'=>array('EvaluacionController@destroy',$obs->idobservacion),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-body">

                
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