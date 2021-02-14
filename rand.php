<!DOCTYPE html>
<html>
<body>

<?php 
  
// This function will return a random 
// string of specified length 
function random_strings($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
} 
  
// This function will generate 
// Random string of length 10 
echo random_strings(10); 
  
echo "\n"; 
  
// This function will generate 
// Random string of length 8 
echo random_strings(8); 
  
?> 

</body>
</html>
