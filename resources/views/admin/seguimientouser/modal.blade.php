 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-historial-{{$est->idestudio}}">
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
              <li class="active"><a href="#historial" data-toggle="tab">Historial de Registro Ambiental</a></li>
            </ul>
            <div class="tab-content">

      <!--TAB HISTORIAL*******************************************************-->
          <div class="active tab-pane" id="historial">
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
             <table id="tablahistorial" class="table table-hover table-striped">
            </table>
           </div>
           </div>
          </div>
      <!-- FIN TAB HISTORIAL-->
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
</div>