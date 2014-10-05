<script type="text/javascript">

    $(function() {


        $( "#FECHAFIN_COM" ).datepicker();
        $( "#FECHAINICIO_COM" ).datepicker();

        $( "#Calendar1" ).on("click", function(){
             $( "#FECHAINICIO_COM" ).datepicker("show");
        });
        
        $( "#Calendar2" ).on("click", function(){
             $( "#FECHAFIN_COM" ).datepicker("show");
        });



        $('#Guardar').click(function() {

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

            var parametros = {
            'MEC_ORIGEN'        : MEC_ORIGEN,
            'INST_GENERA'       : INST_GENERA,
            'UR'                : UR,
            'TIPO_REP'          : TIPO_REP,
            'TEMA'              : TEMA,
            'TIPO_COM'          : TIPO_COM,
            'EVENTO'            : EVENTO,
            'URL_EVENTO'        : URL_EVENTO,
            'FECHAINICIO_COM'   : FECHAINICIO_COM,
            'FECHAFIN_COM'      : FECHAFIN_COM

            }

            if(FECHAFIN_COM == ''){
                $('#FECHAFIN_COM').focus();
                $("#FECHAFIN_COM-div").addClass("has-error");
                $("#FECHAFIN_COM-div span").css("display","block");
            }
            if(FECHAINICIO_COM == ''){
                $('#FECHAINICIO_COM').focus();
                $("#FECHAINICIO_COM-div").addClass("has-error");
                $("#FECHAINICIO_COM-div span").css("display","block");
            }
            if(URL_EVENTO == ''){
                $('#URL_EVENTO').focus();
                $("#URL_EVENTO-div").addClass("has-error");
                $("#URL_EVENTO-div span").css("display","block");
            }
            if(EVENTO == ''){
                $('#EVENTO').focus();
                $("#EVENTO-div").addClass("has-error");
                $("#EVENTO-div span").css("display","block");
            }
            if(TIPO_COM == ''){
                $('#TIPO_COM').focus();
                $("#TIPO_COM-div").addClass("has-error");
                $("#TIPO_COM-div span").css("display","block");
            }
            if(TEMA == ''){
                $('#TEMA').focus();
                $("#TEMA-div").addClass("has-error");
                $("#TEMA-div span").css("display","block");
            }                        
            if(TIPO_REP == ''){
                $('#TIPO_REP').focus();
                $("#TIPO_REP-div").addClass("has-error");
                $("#TIPO_REP-div span").css("display","block");
            }               
            if(UR == ''){
                $('#UR').focus();
                $("#UR-div").addClass("has-error");
                $("#UR-div span").css("display","block");
            }   
            if(INST_GENERA == ''){
                $('#INST_GENERA').focus();
                $("#INST_GENERA-div").addClass("has-error");
                $("#INST_GENERA-div span").css("display","block");
            }           
            if(MEC_ORIGEN == ''){
                $('#MEC_ORIGEN').focus();
                $("#MEC_ORIGEN-div").addClass("has-error");
                $("#MEC_ORIGEN-div span").css("display","block");
            }                                                   

            if(MEC_ORIGEN == '' || INST_GENERA == '' || UR == '' || TIPO_REP == '' || TEMA == '' || TIPO_COM == '' || 
            EVENTO == '' || URL_EVENTO == '' || FECHAINICIO_COM == '' || FECHAFIN_COM == ''){
            return false;
            }


            $.ajax({
                url : "./comision.php",
                type: 'post',
                dataType: 'text',
                data: parametros,
                success: function(res){
                    if(res==1){
                        alert("Exito")
                    }else{
                        alert("Error")
                    }
                }
            });
        });

    }); 

</script>
<div class ="row">
    <div class="col-xs-12 text-center">
        <h1>Nueva Comisión</h1>
    </div>
    <div class ="col-xs-12 col-sm-8 col-sm-offset-2 ">
        <form role="form">
            <div class   ="form-group">
                <label>Número de comisión</label>
                <p class     ="form-control-static">1</p>
            </div>
            <div class   ="form-group has-feedback" id='MEC_ORIGEN-div'>
                <label for   ="MEC_ORIGEN">Mecanismo que origina la comisión (invitación / requerimiento de Unidad Responsable)</label>
                <input type  ="text" class="form-control" id="MEC_ORIGEN" placeholder="Ingresa mecanismo">
            </div>
            <div class   ="form-group" id='INST_GENERA-div'>
                <label for   ="INST_GENERA">Quién invita / qué UR solicita</label>
            <input type          ="text" class="form-control" id="INST_GENERA" placeholder="Ingresa quién invita">
            </div>
            <div class   ="form-group" id='UR-div'>
                <label for   ="UR">Unidad Responsable</label>
                <input type  ="text" class="form-control" id="UR" placeholder="Ingresa unidad responsable">
            </div>
            <div class   ="form-group" id='TIPO_REP-div'>
                <label for   ="TIPO_REP">Tipo de representación requerida</label>
                <input type  ="text" class="form-control" id="TIPO_REP" placeholder="Ingresa tipo de representación requerida">
            </div>
            <div class   ="form-group" id='TEMA-div'>
                <label for   ="TEMA">Tema</label>
                <input type  ="text" class="form-control" id="TEMA" placeholder="Ingresa el tema">
            </div>
            <div class   ="form-group" id='TIPO_COM-div'>
                <label for   ="TIPO_COM">Tipo de comisión</label>
                <input type  ="text" class="form-control" id="TIPO_COM" placeholder="Ingresa el tipo de comisión">
            </div>
            <div class   ="form-group" id='EVENTO-div'>
                <label for   ="EVENTO">Nombre del evento o actividad principal a la que se asiste</label>
                <input type  ="text" class="form-control" id="EVENTO" placeholder="Ingresa el evento o actividad">
            </div>
            <div class   ="form-group" id='URL_EVENTO-div'>
                <label for   ="URL_EVENTO">URL del evento</label>
                <input type  ="datetime" class="form-control" id="URL_EVENTO" placeholder="Ingresa el url del evento">
            </div>
            <div class   ="form-group" id='FECHAINICIO_COM-div'>
                <label for   ="FECHAINICIO_COM" >Fecha de inicio de participación en el evento o actividad</label>
                <div class="input-group">
                    <input type  ="text" class="form-control" id="FECHAINICIO_COM" placeholder="Ingresa fecha de inicio">
                    <span class="input-group-addon" id='Calendar1'><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <div class   ="form-group" id='FECHAFIN_COM-div'>
                <label for   ="FECHAFIN_COM" >Fecha de fin de participación en el evento o actividad</label>
                <div class="input-group">
                    <input type  ="text" class="form-control" id="FECHAFIN_COM" placeholder="Ingresa fecha de fin">
                    <span class="input-group-addon" id='Calendar2'><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <button type ="submit" class="btn btn-default" id="Guardar" onClick="return false;">Guardar</button>
        </form>
    </div>
</div>