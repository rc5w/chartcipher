<? 
include "connect.php";

$tablename = "vocaltypes";

$uppercasesingle = "Vocal Type";
$lowercasesingle = strtolower( $uppercasesingle );
$uppercase = $uppercasesingle . "s"; 
$lowercase = strtolower( $uppercase );
$admin_hasadvsearch = true;
$extracolumnsizes = array( "InfoDescr" => 40 );
$extracolumns = array( "InfoDescr"=> "Info <b>DO NOT USE QUOTES</b>"  );


include "generic.php";
?>