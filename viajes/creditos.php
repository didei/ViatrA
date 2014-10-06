<?php
	session_start();
	if(!isset($_SESSION['uid']) || !isset($_SESSION['name-user']) || !isset($_SESSION['rol'])){
		echo "<script> document.location='../'; </script>";
		exit;
	}
?>
<div class="col-md-12 col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Créditos del sistema</h3>
        </div>
        <div class="panel-body row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                Alejandro Ayón<img src="../imgs/team/ayon.png">
                Diego Muñoz<img src="../imgs/team/diego.png">
                Favián Flores<img src="../imgs/team/favian.png">
                Roberto Rodríguez<img src="../imgs/team/rober.png">
                Sergio palomares<img src="../imgs/team/sergio.png">
            </div>
        </div>
    </div>
</div>