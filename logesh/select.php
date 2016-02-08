<html>
<body>
 <form name="f1" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">     

<?php
interface formSelectInterface{

    function renderOption($option); 
    public function render();
}
class formselect implements formSelectInterface
{
 public  $value;
 public  $class;
 public  $name;
 public  $option;  

 function renderOption($option)
 {
    
    $this->option =$option;
    
 }
public function render()
{
    echo $this->name.":";
echo "<select name=". $this->name ." " ."class=".$this->class.">";
 for ($i=0;$i<count($this->option);$i++)
    {
     echo "<option value=".$this->value[$i].">".$this->option[$i]."</option>";        
    }

echo "</select>";
echo "<br>";
}
}
$object1_formselect = new formselect();
$object1_formselect->class = "make";
$object1_formselect->value = array('0','1','2');
$object1_formselect->name  = "make"; 
$object1_formselect->option=array('Audi','Mercedes_Benz','jaguar');
$object1_formselect->renderOption($object1_formselect->option);
$object1_formselect->render();

$object2_formselect = new formselect();
$object2_formselect->class = "model";
$object2_formselect->value = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22');
$object2_formselect->name  = "model"; 
$object2_formselect->option=array('A1','A3','A4','A6','R8','TT','Q3','Q5','Q7','A-class','B-class','c-class','CLA-class','E-class','G-class','GLA-class','S-class','V-class','AMG TT','F-Type','VE','XF','XJ');
$object2_formselect->renderOption($object2_formselect->option);
$object2_formselect->render();

$object3_formselect = new formselect();
$object3_formselect->class = "year";
$object3_formselect->value = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');
$object3_formselect->name  = "year"; 
$object3_formselect->option=array('2010','2003','2001','2004','2015','2006','2011','2008','2005','1997','1993','2013','1996','1979','1972','1996','2014','2012','2009','2008','2003');
$object3_formselect->renderOption($object3_formselect->option);
$object3_formselect->render();

?>


<?php


if(isset($_POST['make']))
{
    $make = $_POST['value']; 
    echo $make;
}

if(isset($_POST['model']))
{
    $model = $_POST['value']; 
    echo $model;
}


if(isset($_POST['year']))
{
    $model = $_POST['value']; 
    echo $model;
}


?>
</form>
</body>
</html>