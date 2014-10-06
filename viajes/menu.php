<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./"><span class="glyphicon glyphicon-home"></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php if($rol!=2){?>
    <?php }?>
      <ul class="nav navbar-nav navbar-right">
		<?php if($rol!=1){?>
            <form class="navbar-form navbar-left" role="search" action="./" method="get" id='FrmBusqueda'>
              <div class="form-group">
                  <input type='hidden' name='id' value='<?php if($rol=='0') echo 10; else echo 2;?>'>
                  <input type='hidden' id='se' name='se'>
                  <input type="search" name="criterio" id="criterio" class="form-control" placeholder="Buscar..." onKeyUp="javascript:autocompletar()" />
                  <button type="button" id='btnBuscar' class="btn btn-default">Buscar</button>
              </div>
              <div id="opciones"></div>
            </form>
		<?php }?>
        <li>
          <a href="?id=1000" title="Cerrar sesión" class="glyphicon glyphicon-off"></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script>
  $('#btnBuscar').click(function(){
    var Criterio = $('#criterio').val();
    if(Criterio == ''){
      return false;
    }
    else{
      $('#FrmBusqueda').submit();
    }
  });
</script>