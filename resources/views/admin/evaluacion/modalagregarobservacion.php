 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-agregarobservacion">
      {{Form::Open(array('action'=>array('EvaluacionController@destroy',$obs->idobservacion),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
             <div class="modal-body">



 <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#agregarobservacion" data-toggle="tab">Agregar Observacion</a></li>
              <li><a href="#agregardocumento" data-toggle="tab">Agregar Documento</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="agregarobservacion">
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
              <!-- /.tab-pane -->
              <div class="tab-pane" id="agregardocumento">
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
              <!-- /.tab-pane -->
             
            </div>
            <!-- /.tab-content -->
          </div>
            </div>
           </div>
          </div>
      {{Form::Close()}}
        </div>