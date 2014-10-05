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
    <?php
		if($rol!=2){
	?>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menú <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li class="divider"></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Link 4</a></li>
            <li class="divider"></li>
            <li><a href="#">Link 5</a></li>
          </ul>
        </li>
      </ul>
    <?php
		}
	?>
      <ul class="nav navbar-nav navbar-right">
      	<form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar...">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <li>
          <a href="?id=1000" title="Cerrar sesión" class="glyphicon glyphicon-off"></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>