<?php
    require_once __DIR__ . '/verify/vendor/autoload.php';
    var_dump( $_POST);
    //die;
    if( isset($_POST['email'] ) && isset($_POST['password']) && isset($_POST['phone']) ) {
        
        $basic  = new \Vonage\Client\Credentials\Basic("5bb2a1ad", "iYMHgsc5QG5uegFP");
        $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));

        $request = new \Vonage\Verify\Request( "52".$_POST['phone'], "Difusion C");
        $response = $client->verify()->start($request);

        header( "Location: ../request.php?phone=".$_POST['phone']."&requestid=".$response->getRequestId() );
    } else {
        header( "Location: ../" );
    }