<?php 

if (sizeof($results) > 0)
{
foreach ($results as $row)
{
echo $row->Id . " ";
echo $row->Username . " ";
echo $row->Password . " ";
echo "<br/>";
}
}
?>