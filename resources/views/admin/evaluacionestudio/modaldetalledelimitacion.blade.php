 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-detalledelimitacion-{{$est->idestudio}}">
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
              <li class="active"><a href="#delimitaciones" data-toggle="tab">Delimitaciones de Estudio</a></li>
            </ul>
            <div class="tab-content">

     <!--TAB DELIMITACION *******************************************************-->

          <div class="active tab-pane" id="delimitaciones">
            <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">
            <table id="tabladelimitacion" class="table table-hover table-striped">
            </table>
           </div>
          </div>
          </div>
      <!-- FIN TAB DELIMITACION-->
     
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