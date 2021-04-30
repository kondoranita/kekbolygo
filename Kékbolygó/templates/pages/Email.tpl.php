 <link rel="stylesheet" href="./styles/style.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center" name="elso">
              
					</div>
					
                   <form method=post>
				   <table border=1 align=center>
				   <tr><td><img src="./images/kep7.png" ></td></tr>
				<tr><td style="align:left;">Címzett <input class="long"  type=text name=cimzett required></td></tr>
				<tr><td style="align:left;"> <center> Tárgy<input  class="long" type=text name=targy  required></td></tr>
				 
				 <tr><td> <textarea rows="20" cols="75" name="uzenet" ></textarea></td></tr>
				<tr><td><br><input type=submit class="button" name=gomb value="Küldés"  style="background-color:green; height:50px;width:200px;"><br></td></tr>
				    </table> 
				
				  </form>

                 <?php

if(isset($_POST['cimzett']) && isset($_POST['targy']) && isset($_POST['uzenet'])) {

try{
$datum=date("Y-m-d");

$dbh = new PDO('mysql:host=mysql.omega:3306;dbname=drkondoranita', 'drkondoranita', 'drkondoranita123456',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

$sqlInsert = "insert into Levelezes(id, cimzett, targy, uzenet, datum)
values(0, :cimzett, :targy, :uzenet, :datum)";


$stmt = $dbh->prepare($sqlInsert);
$stmt->execute(array(':cimzett' => $_POST['cimzett'], ':targy' => $_POST['targy'],
':uzenet' => $_POST['uzenet'], ':datum' => $datum));

}
catch(PDOException $e)
{
	
	echo "Hiba: ".$e->getMessage();
	
}
}
?>


            </div>
        </div>
    </div>
</div>

