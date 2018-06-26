 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-detalle-{{$est->idestudio}}">
      {{Form::Open(array('action'=>array('RegistroController@destroy',$est->idestudio),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Estudio: <font style="text-transform: uppercase;">{{$est->nombreestudio}} </font></h4>
              </div>
              <div class="modal-body">
  <!--TABS DELIMITACION Y DOCUMENTO ESTUDIO*******************************************************-->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#delimitaciones" data-toggle="tab">Documentos de Estudio</a></li>
              <li><a href="#documentos" data-toggle="tab">Levantamientos de Observación</a></li>
            </ul>
            <div class="tab-content">

     <!--TAB DELIMITACION *******************************************************-->

          <div class="active tab-pane" id="delimitaciones">
            <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">
            <table id="tabla2" class="table table-hover table-striped">
           <thead>
                <tr>
                  <th>Documento</th>
                  <th>Tipo</th>
                  <th>Fecha</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
               
                </tbody>
                 <tfoot>
                </tfoot>
            </table>
           </div>
              </div>
          </div>
      <!-- FIN TAB DELIMITACION-->
      <!--TAB DOCUMENTO*******************************************************-->
          <div class="tab-pane" id="documentos">
            <div class="box-header with-border">
              <h3 class="box-title">Levantamiento de Observaciones </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">

             <table id="tabla3" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Observación</th>
                  <th>Respuesta</th>
                  <th>Fecha</th>
                 </tr>
                </thead>
                <tbody>
                 
                </tbody>
              <tfoot>
             </tfoot>
            </table>
           </div>
           </div>
          </div>
      <!-- FIN TAB DOCUMENTO-->
          </div>
          </div>

 <!-- FIN TAB DELIMITACION Y DOCUMENTO ESTUDIO-->
              
        </div>
        <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
    <!--   <button type="submit" class="btn bg-purple">Confirmar</button>        -->
    </div>
    </div>
  </div>
 {{Form::Close()}}
</div>