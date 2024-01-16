<?php
$value = isset($_POST['item']) ? $_POST['item'] : 1; //to be displayed
if(isset($_POST['incqty'])){
   $value += 1;
}

if(isset($_POST['decqty'])){
   $value -= 1;                                            
}
?>

<form method='post'>
   <!--<input type='hidden' name='item'/> Why do you need this?-->
   <td>
       <button name='incqty'>+</button>
       <input type='text' size='1' name='item' value='<?= $value; ?>'/>
       <button name='decqty'>-</button>
   </td>
</form>