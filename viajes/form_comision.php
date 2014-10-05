<?php
    if ($_SESSION['rol'] == ""){
        header( "Status: 301 Moved Permanently", false, 301);
        header("Location: ../");
        exit();
    }else{?>
        <div class ="row">
            <div class="col-xs-12 text-center">
                <h1>Nueva Comisión</h1>
            </div>
            <div class ="col-xs-12 col-sm-10 col-sm-offset-1">
                <form role="form">
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#comision">
                              Detalles de la comisión
                            </a>
                          </h4>
                        </div>
                        <div id="comision" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <div class   ="form-group col-xs-12 col-sm-4" id='CONSECUTIVO-div'>
                                <label for='CONSECUTIVO'>Número de comisión*</label>
                                <input type = 'hidden' value="<?php echo $_SESSION['uid'] ?>" id='UID' >
                                <input type ="text" class="form-control" id="CONSECUTIVO" placeholder="Ingresa consecutivo">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-8" id='MEC_ORIGEN-div'>
                                <label for   ="MEC_ORIGEN">Mecanismo que origina la comisión*</label>
                                <select id="MEC_ORIGEN" class="form-control">
                                    <option value="0" selected>Elige mecanismo</option>
                                    <option>Invitación</option>
                                    <option>Requerimiento de UR</option>
                                </select>
                            </div>
                            <div class ="form-group col-xs-12" id='INST_GENERA-div'>
                                <label for ="INST_GENERA">Quién invita / qué UR solicita*</label>
                                <input type ="text" class="form-control" id="INST_GENERA" placeholder="Ingresa quién invita">
                            </div>
                            <div class   ="form-group col-xs-12" id='UR-div'>
                                <label for   ="UR">Unidad Responsable</label>
                                <input type  ="text" class="form-control" id="UR" placeholder="Ingresa unidad responsable">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_REP-div'>
                                <label for   ="TIPO_REP">Tipo de representación requerida*</label>
                                <input type  ="text" class="form-control" id="TIPO_REP" placeholder="Ingresa tipo de representación">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_COM-div'>
                                <label for   ="TIPO_COM">Tipo de comisión*</label>
                                <input type  ="text" class="form-control" id="TIPO_COM" placeholder="Ingresa tipo de comisión">
                            </div>
                            <div class   ="form-group col-xs-12" id='TEMA-div'>
                                <label for   ="TEMA">Tema*</label>
                                <input type  ="text" class="form-control" id="TEMA" placeholder="Ingresa el tema">
                            </div>
                            <div class   ="form-group col-xs-12" id='EVENTO-div'>
                                <label for   ="EVENTO">Nombre del evento o actividad principal a la que se asiste*</label>
                                <input type  ="text" class="form-control" id="EVENTO" placeholder="Ingresa el evento o actividad">
                            </div>
                            <div class   ="form-group col-xs-12" id='URL_EVENTO-div'>
                                <label for   ="URL_EVENTO">URL del evento</label>
                                <input type  ="text" class="form-control" id="URL_EVENTO" placeholder="Ingresa el url del evento">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='FECHAINICIO_COM-div'>
                                <label for   ="FECHAINICIO_COM" >Fecha de inicio de participación en el evento o actividad*</label>
                                <div class="input-group">
                                    <input type  ="datetime" class="form-control" id="FECHAINICIO_COM" disabled placeholder="Ingresa fecha de inicio">
                                    <span class="input-group-addon" id='Calendar1'><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='FECHAFIN_COM-div'>
                                <label for   ="FECHAFIN_COM" >Fecha de fin de participación en el evento o actividad*</label>
                                <div class="input-group">
                                    <input type  ="datetime" class="form-control" id="FECHAFIN_COM" disabled placeholder="Ingresa fecha de fin">
                                    <span class="input-group-addon" id='Calendar2'><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#coltraslado">
                              Detalles de traslado
                            </a>
                          </h4>
                        </div>
                        <div id="coltraslado" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <div class   ="form-group col-xs-12 col-sm-4" id='TIPO_VIAJE-div'>
                                <label for   =" TIPO_VIAJE">Tipo de viaje*</label>
                                <select class='form-control' id="TIPO_VIAJE">
                                    <option value="0">Elige tipo</option>
                                    <option >Nacional</option>
                                    <option >Internacional</option>
                                </select>
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-8" id='ACUERDO-div'>
                                <label for   =" ACUERDO">No. de acuerdo de autorización del pleno / de coordinadores</label>
                                <input type  ="text" class="form-control" id="ACUERDO" placeholder=" Ingresa acuerdo">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='OFICIO-div'>
                                <label for   =" OFICIO">No. de oficio de comisión</label>
                                <input type  ="text" class="form-control" id="OFICIO" placeholder=" Ingresa oficio">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='CUBRE_PASAJE-div'>
                                <label for   =" CUBRE_PASAJE">Institución que cubre pasaje</label>
                                <input type  ="text" class="form-control" id="CUBRE_PASAJE" placeholder=" Ingresa la institución ">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='TIPO_PASAJE-div'>
                                <label for   =" TIPO_PASAJE">Tipo de pasaje*</label>
                                <select id="TIPO_PASAJE" class="form-control">
                                    <option value="0">Elige tipo</option>
                                    <option>Terrestre</option>
                                    <option data-toggle='collapse' data-target="#Detalle_vuelo">Aereo</option>
                                    <option>Maritimo</option>
                                </select>
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6" id='GASTO_PASAJE-div'>
                                <label for   ="GASTO_PASAJE">Gasto por concepto de pasaje en M.N</label>
                                <input type  ="text" class="form-control" id="GASTO_PASAJE" placeholder=" Ingresa la institución ">
                            </div>
                            <div id='Detalle_vuelo' class="collapse in col-xs-12">
                                <div class   ="form-group col-xs-12 col-sm-6" id='LINEA_ORIGEN-div'>
                                    <label for   ="LINEA_ORIGEN">Aerolina(s) de vuelo(s) de ida*</label>
                                    <input type  ="text" class="form-control" id="LINEA_ORIGEN" placeholder=" Ingresa aerolina(s) ">
                                </div> 
                                <div class   ="form-group col-xs-12 col-sm-6" id='VUELO_ORIGEN-div'>
                                    <label for   ="VUELO_ORIGEN">Numero(s) de vuelo de ida*</label>
                                    <input type  ="text" class="form-control" id="VUELO_ORIGEN" placeholder=" Ingresa el numero(s) ">
                                </div>
                                <div class   ="form-group col-xs-12 col-sm-6" id='LINEA_REGRESO-div'>
                                    <label for   ="LINEA_REGRESO">Aerolina(s) de vuelo(s) de regreso*</label>
                                    <input type  ="text" class="form-control" id="LINEA_REGRESO" placeholder=" Ingresa aerolina(s) ">
                                </div> 
                                <div class   ="form-group col-xs-12 col-sm-6" id='VUELO_REGRESO-div'>
                                    <label for   ="VUELO_REGRESO">Numero(s) de vuelo de regreso*</label>
                                    <input type  ="text" class="form-control" id="VUELO_REGRESO" placeholder=" Ingresa el numero(s) ">
                                </div>
                            </div>    
                            <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='PAIS_ORIGEN-div'>
                                <label for   =" PAIS_ORIGEN">Pais de origen*</label>
                                <input type  ="text" class="form-control" id="PAIS_ORIGEN" placeholder=" Ingresa pais ">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='ESTADO_ORIGEN-div'>
                                <label for   =" ESTADO_ORIGEN">Estado de origen*</label>
                                <input type  ="text" class="form-control" id="ESTADO_ORIGEN" placeholder=" Ingresa estado ">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='CIUDAD_ORIGEN-div'>
                                <label for   =" CIUDAD_ORIGEN">Ciudad de origen*</label>
                                <input type  ="text" class="form-control" id="CIUDAD_ORIGEN" placeholder=" Ingresa ciudad ">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='PAIS_DESTINO-div'>
                                <label for   =" PAIS_DESTINO">Pais de destino*</label>
                                <input type  ="text" class="form-control" id="PAIS_DESTINO" placeholder=" Ingresa pais ">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='ESTADO_DESTINO-div'>
                                <label for   =" ESTADO_DESTINO">Estado de destino*</label>
                                <input type  ="text" class="form-control" id="ESTADO_DESTINO" placeholder=" Ingresa estado ">
                            </div>
                            <div class   ="form-group col-xs-12 col-sm-6 col-md-4" id='CIUDAD_DESTINO-div'>
                                <label for   =" CIUDAD_DESTINO">Ciudad de destino*</label>
                                <input type  ="text" class="form-control" id="CIUDAD_DESTINO" placeholder=" Ingresa ciudad ">
                            </div>     
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type ="submit" class="btn btn-default" id="Guardar" onClick="return false;">Guardar</button>
                </form>
            </div>
        </div>
<?php 
    }
 ?>
 <script type="text/javascript">

    $(function() {


        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy/mm/dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };

        $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );

        $( "#FECHAFIN_COM" ).datepicker();
        

        $( "#Calendar1" ).on("click", function(){
             $( "#FECHAINICIO_COM" ).datepicker();
             $( "#FECHAINICIO_COM" ).datepicker("show");
        });
        
        $( "#Calendar2" ).on("click", function(){
             $( "#FECHAFIN_COM" ).datepicker();
             $( "#FECHAFIN_COM" ).datepicker("show");
        });

        $( "#coltraslado").collapse('hide');
        $( "#Detalle_vuelo").collapse('hide');
        $( "#TIPO_PASAJE").on('change', function(){
            if($("#TIPO_PASAJE").value == "Terrestre")
                $( "#Detalle_vuelo").collapse('show');
            else
                $( "#Detalle_vuelo").collapse('hide');
        });


        $('#Guardar').click(function() {

            var CONSECUTIVO         = $('#CONSECUTIVO').val();
            var MEC_ORIGEN          = $('#MEC_ORIGEN').val();
            var INST_GENERA         = $('#INST_GENERA').val();
            var UR                  = $('#UR').val();
            var TIPO_REP            = $('#TIPO_REP').val();
            var TEMA                = $('#TEMA').val();
            var TIPO_COM            = $('#TIPO_COM').val();
            var EVENTO              = $('#EVENTO').val();
            var URL_EVENTO          = $('#URL_EVENTO').val();
            var FECHAINICIO_COM     = $('#FECHAINICIO_COM').val();
            var FECHAFIN_COM        = $('#FECHAFIN_COM').val();
            var TIPO_VIAJE          = $('#TIPO_VIAJE').val();
            var ACUERDO             = $('#ACUERDO').val();
            var OFICIO              = $('#OFICIO').val();
            var CUBRE_PASAJE        = $('#CUBRE_PASAJE').val();
            var TIPO_PASAJE         = $('#TIPO_PASAJE').val();
            var GASTO_PASAJE        = $('#GASTO_PASAJE').val();
            var PAIS_ORIGEN         = $('#PAIS_ORIGEN').val();
            var ESTADO_ORIGEN       = $('#ESTADO_ORIGEN').val();
            var CIUDAD_ORIGEN       = $('#CIUDAD_ORIGEN').val();
            var PAIS_DESTINO        = $('#PAIS_DESTINO').val();
            var ESTADO_DESTINO      = $('#ESTADO_DESTINO').val();
            var CIUDAD_DESTINO      = $('#CIUDAD_DESTINO').val();
            var UID                 = $('#UID').val();

            if(CIUDAD_DESTINO == '' || CIUDAD_DESTINO == null){
                $('#CIUDAD_DESTINO').focus();
                $("#CIUDAD_DESTINO-div").addClass("has-error");
            }
            if(ESTADO_DESTINO == '' || ESTADO_DESTINO == null){
                $('#ESTADO_DESTINO').focus();
                $("#ESTADO_DESTINO-div").addClass("has-error");
            }
            if(PAIS_DESTINO == '' || PAIS_DESTINO == null){
                $('#PAIS_DESTINO').focus();
                $("#PAIS_DESTINO-div").addClass("has-error");
            }
            if(CIUDAD_ORIGEN == '' || CIUDAD_ORIGEN == null){
                $('#CIUDAD_ORIGEN').focus();
                $("#CIUDAD_ORIGEN-div").addClass("has-error");
            }
            if(ESTADO_ORIGEN == '' || ESTADO_ORIGEN == null){
                $('#ESTADO_ORIGEN').focus();
                $("#ESTADO_ORIGEN-div").addClass("has-error");
            }
            if(PAIS_ORIGEN == '' || PAIS_ORIGEN == null){
                $('#PAIS_ORIGEN').focus();
                $("#PAIS_ORIGEN-div").addClass("has-error");
            }
            if(TIPO_PASAJE == 'Aereo'){
                if(VUELO_REGRESO == '' ){
                    $('#VUELO_REGRESO').focus();
                    $("#VUELO_REGRESO-div").addClass("has-error");
                }
                if(LINEA_REGRESO == '' ){
                    $('#LINEA_REGRESO').focus();
                    $("#LINEA_REGRESO-div").addClass("has-error");
                }
                if(VUELO_ORIGEN == '' ){
                    $('#VUELO_ORIGEN').focus();
                    $("#VUELO_ORIGEN-div").addClass("has-error");
                }
                if(LINEA_ORIGEN == '' ){
                    $('#LINEA_ORIGEN').focus();
                    $("#LINEA_ORIGEN-div").addClass("has-error");
                }
            }
            if(TIPO_PASAJE == '0'){
                $('#TIPO_PASAJE').focus();
                $("#TIPO_PASAJE-div").addClass("has-error");
            }
            if(TIPO_VIAJE == '0'){
                $('#TIPO_VIAJE').focus();
                $("#TIPO_VIAJE-div").addClass("has-error");
            }
            if(FECHAFIN_COM == ''){
                $('#FECHAFIN_COM').focus();
                $("#FECHAFIN_COM-div").addClass("has-error");
            }
            if(FECHAINICIO_COM == ''){
                $('#FECHAINICIO_COM').focus();
                $("#FECHAINICIO_COM-div").addClass("has-error");
            }
            if(EVENTO == ''){
                $('#EVENTO').focus();
                $("#EVENTO-div").addClass("has-error");
            }
            if(TIPO_COM == ''){
                $('#TIPO_COM').focus();
                $("#TIPO_COM-div").addClass("has-error");
            }
            if(TEMA == ''){
                $('#TEMA').focus();
                $("#TEMA-div").addClass("has-error");
            }                        
            if(TIPO_REP == ''){
                $('#TIPO_REP').focus();
                $("#TIPO_REP-div").addClass("has-error");
            }                 
            if(INST_GENERA == ''){
                $('#INST_GENERA').focus();
                $("#INST_GENERA-div").addClass("has-error");
            }           
            if(MEC_ORIGEN == 0){
                $('#MEC_ORIGEN').focus();
                $("#MEC_ORIGEN-div").addClass("has-error");
            }
            if(CONSECUTIVO == ''){
                $('#CONSECUTIVO').focus();
                $("#CONSECUTIVO-div").addClass("has-error");
            }                                                   

            if(
                MEC_ORIGEN      == '' || 
                INST_GENERA     == '' || 
                UR              == '' || 
                TIPO_REP        == '' || 
                TEMA            == '' || 
                TIPO_COM        == '' || 
                EVENTO          == '' ||     
                URL_EVENTO      == '' || 
                FECHAINICIO_COM == '' || 
                FECHAFIN_COM    == '')
            {
                return false;
            }

            if( 
                TIPO_VIAJE      == '0' ||
                TIPO_PASAJE     == '0' ||
                PAIS_ORIGEN     == ''  || PAIS_ORIGEN       == null ||
                ESTADO_ORIGEN   == ''  || ESTADO_ORIGEN     == null ||
                CIUDAD_ORIGEN   == ''  || CIUDAD_ORIGEN     == null ||
                PAIS_DESTINO    == ''  || PAIS_DESTINO      == null ||
                ESTADO_DESTINO  == ''  || ESTADO_DESTINO    == null ||
                CIUDAD_DESTINO  == ''  || CIUDAD_DESTINO    == null)
            {
                return false;
            }

            if(TIPO_PASAJE == 'Aereo'){ 
                var LINEA_ORIGEN    = $('#LINEA_ORIGEN').val();
                var VUELO_ORIGEN    = $('#VUELO_ORIGEN').val();
                var LINEA_REGRESO   = $('#LINEA_REGRESO').val();
                var VUELO_REGRESO   = $('#VUELO_REGRESO').val();  
                if( LINEA_ORIGEN    == ''  ||
                    VUELO_ORGEN     == ''  || 
                    LINEA_REGRESO   == ''  || 
                    VUELO_REGRESO   == '')
                {
                    $(function () { $('#Detalle_vuelo').collapse('toggle')});
                    return false;
                }
            }

            var parametros = {
                'UID'               : UID,
                'CONSECUTIVO'       : CONSECUTIVO,
                'MEC_ORIGEN'        : MEC_ORIGEN,
                'INST_GENERA'       : INST_GENERA,
                'TIPO_REP'          : TIPO_REP,
                'UR'                : UR,
                'TEMA'              : TEMA,
                'TIPO_COM'          : TIPO_COM,
                'EVENTO'            : EVENTO,
                'URL_EVENTO'        : URL_EVENTO,
                'FECHAINICIO_COM'   : FECHAINICIO_COM,
                'FECHAFIN_COM'      : FECHAFIN_COM,
                'TIPO_VIAJE'        : TIPO_VIAJE,
                'ACUERDO'           : ACUERDO,
                'OFICIO'            : OFICIO,
                'CUBRE_PASAJE'      : CUBRE_PASAJE,
                'TIPO_PASAJE'       : TIPO_PASAJE,
                'GASTO_PASAJE'      : GASTO_PASAJE,
                'LINEA_ORIGEN'      : LINEA_ORIGEN,
                'VUELO_ORIGEN'      : VUELO_ORIGEN,
                'LINEA_REGRESO'     : LINEA_REGRESO,
                'VUELO_REGRESO'     : VUELO_REGRESO,
                'PAIS_ORIGEN'       : PAIS_ORIGEN,
                'ESTADO_ORIGEN'     : ESTADO_ORIGEN,
                'CIUDAD_ORIGEN'     : CIUDAD_ORIGEN,
                'PAIS_DESTINO'      : PAIS_DESTINO,
                'ESTADO_DESTINO'    : ESTADO_DESTINO,
                'CIUDAD_DESTINO'    : CIUDAD_DESTINO
            }
            
            $.ajax({
                url : "./comision.php",
                type: 'post',
                dataType: 'text',
                data: parametros,
                success: function(res){
                    if(res==1){
                        alert("Comision creada");
                        location.href='?id=2';
                    }else{
                        alert(res)
                    }
                }
            });
        });

    }); 

</script>