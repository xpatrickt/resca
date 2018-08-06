 <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-detalledocumento-{{$est->idestudio}}">
      {{Form::Open(array('action'=>array('RegistroController@destroy',$est->idestudio),'method'=>'delete'))}}
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <h4 class="modal-title">Estudio: <font style="text-transform: uppercase;">{{$est->nombreestudio}} </font></h4>
              </div>
              <div class="modal-body">
  <!--TABS DELIMITACION Y DOCUMENTO ESTUDIO*******************************************************-->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#documentos" data-toggle="tab">Documentos de Estudio</a></li>
            </ul>
            <div class="tab-content">

      <!--TAB DOCUMENTO*******************************************************-->
          <div class="active tab-pane" id="documentos">
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
             <table id="tabladocumento" class="table table-hover table-striped">
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