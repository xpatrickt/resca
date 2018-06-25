 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-agregarobservacion">
      {{Form::Open(array('action'=>array('EvaluacionController@destroy',$obs->idobservacion),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
             <div class="modal-body">


                <div class="box-body no-padding">
              <div class="form-group">
                <input class="form-control" placeholder="Asunto:">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px">
                      
                    </textarea>
              </div>
                  <tfoot>
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                </tfoot>
              </div>
              </div>
            </div>
          </div>
      {{Form::Close()}}
        </div>