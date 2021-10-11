<?php

    if( isset($_POST['code']) ) {
        require_once __DIR__ . '/verify/vendor/autoload.php';
        $basic  = new \Vonage\Client\Credentials\Basic("5bb2a1ad", "iYMHgsc5QG5uegFP");
        $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));

        try {
            $verification = $client->verify()->check( $_POST['requestid'], $_POST['code']);
            echo "Verification was successful (status: " . $verification->getStatus() . ")\n";
        } catch (Exception $e) {
            header( "Location: ../request.php?phone=".$_POST['phone']."&requestid=".$_POST['requestid']."&error=true" );
            //echo "Verification failed with status " . $e->getCode()
                //. " and error text \"" . $e->getMessage() . "\"\n";
        }

        

        //var_dump($result->getResponseData());
    } else {
        header( "Location: ../request.php?phone=".$_POST['phone']."&requestid=".$_POST['requestid'] );
    }