<?php
//Get your user UserCode and API token from https://www.lessannoyingcrm.com/app/Settings/Api

$UserCode = "81434";
$APIToken = "HJQKB86T68Z57X334HRYK6DGXHQBNCG54GN7J29VFRSQ6WFQ0M";


//The first step is to create a contact
$Function = "CreateContact";

//Just put the contact info into an array...
$Parameters = array(
    "FullName" => "Please Work",
    "Email"=>array(
                0=>array(
                    "Text"=>"$_REQUEST[email]",
                    "Type"=>"Work"
                )
            ),
);

//...And then use the "CallAPI" function to send the information to LACRM
$Result = CallAPI($UserCode, $APIToken, $Function, $Parameters);
//That's it, the contact will now show up in the CRM!
//Get the new ContactId
$ContactId = $Result['ContactId'];

//Now we'll add the contact to a group. NOTE: If the GroupName has any spaces in it,
//you need to replace them all with underscores (_)
$Function = "AddContactToGroup";
$Parameters = array(
    "ContactId"=>$ContactId,
    "GroupName"=>"Webinar_Signup" //Make sure you replace any spaces with underscores (_)
);

$Result = CallAPI($UserCode, $APIToken, $Function, $Parameters);

/*
There are all kinds of other things you might want to do here as well such as:
    -Set a task to follow up with the contact (https://www.lessannoyingcrm.com/help/topic/API_Example_Code_PHP/11/)
    -Add the contact as a lead (https://www.lessannoyingcrm.com/help/topic/API_Example_Code_PHP/87/)
    -Add the contact to a group (https://www.lessannoyingcrm.com/help/topic/API_Example_Code_PHP/13/)
    -Send an email to yourself letting you know a form was submitted (you can use the PHP "mail" function)
*/

//Now forward the visitor to an html page confirming that we got their contact info
header('location:/blog');
exit;
/*
    This function takes all of the settings needed to call the API and puts them into
    one long URL, and then it makes an HTTP request to that URL.
*/
function CallAPI($UserCode, $APIToken, $Function, $Parameters){
    $APIResult = file_get_contents("https://api.lessannoyingcrm.com?UserCode=$UserCode&APIToken=$APIToken&".
                "Function=$Function&Parameters=".urlencode(json_encode($Parameters)));
    $APIResult = json_decode($APIResult, true);

    if(@$APIResult['Success'] === true){
    }
    else{
        echo "API call failed. Error:".@$APIResult['Error'];
        exit;
    }
    return $APIResult;
}
