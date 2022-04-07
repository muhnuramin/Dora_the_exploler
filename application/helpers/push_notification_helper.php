<?php

$FIREBASE_SERVER_KEY = 'AAAAZfo69KE:APA91bE5e2i3uuU72oStelpOKKQL1L-XJ75qT7lH-fbzA5gc14YGVbfUVOEwq7wyqv8ZBY9de8I0G8d1IY-NwlxupOb02shAcayvdhGOo2xp-tuyA0W3m_WyTtW4rz5kJkAS8V7DsaQB';
// $FIREBASE_SERVER_KEY = 'AAAAqz2xEW8:APA91bEGm03GoS-sVSZpH5-AEndn__RPrH4Qdhat62ERzUcvOK_03YxH6Z_Dr0XGT4em3kDCBX4keBbGf9vMzeSECpkvTcesL5LBSzbA46ijzZatwLZjMpBSuTHO2a_8buugylUv07kt';

define('FCM_AUTH_KEY', $FIREBASE_SERVER_KEY);

function sendPush($to, $title, $body, $icon, $url, $type, $id)
{
    $FIREBASE_TOKEN = $to;
    $postdata = json_encode(
        [
            'notification' =>
            [
                'title' => $title,
                'body' => $body,
                'icon' => $icon,
                'click_action' => $url,
            ],
            'data' => [
                'type' => $type,
                'id' => $id
            ],
            'to' => $FIREBASE_TOKEN,
        ]
    );

    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json' . "\r\n"
                . 'Authorization: key=' . FCM_AUTH_KEY . "\r\n",
            'content' => $postdata
        )
    );

    $context  = stream_context_create($opts);

    $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);
    if ($result) {
        return json_decode($result);
    } else return false;
}

// $keyclient = 'eQW_8AV1T5iZUZ8VWGaEh1:APA91bFDJ7xQvPXG6Ev5H8i4cN9Rv7OZmJVMpI6cX2UpZokJoooPSfw3WMOizraSxi_vBWWP_evl8f4t1Bxwx52WmOMTcpJwMk7z0ujq_buZDZ1H1BnrzLBvPsZQohj0BF46Rp8NkG8F';

// sendPush($keyclient, 'Ridlo', 'And this is the text.', 'https://www.gstatic.com/mobilesdk/160503_mobilesdk/logo/2x/firebase_28dp.png', 'https://google.co.id/');

// {
//     "notification": {
//        "title": "Your Title",
//        "text": "Your Text",
//        "click_action": "OPEN_ACTIVITY_1"
//     },
//     "data": {
//        "<some_key>": "<some_value>"
//     },
//     "to": "<device_token>"
//  }

// And with this in your app you can add below code in your activity to be called:

// <intent-filter>
//     <action android:name="OPEN_ACTIVITY_1" />
//     <category android:name="android.intent.category.DEFAULT" />
// </intent-filter>

// function sendGCM($message, $id) {


//     $url = 'https://fcm.googleapis.com/fcm/send';

//     $fields = array (
//             'registration_ids' => array (
//                     $id
//             ),
//             'data' => array (
//                     "message" => $message
//             )
//     );
//     $fields = json_encode ( $fields );

//     $headers = array (
//             'Authorization: key=' . "YOUR_KEY_HERE",
//             'Content-Type: application/json'
//     );

//     $ch = curl_init ();
//     curl_setopt ( $ch, CURLOPT_URL, $url );
//     curl_setopt ( $ch, CURLOPT_POST, true );
//     curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
//     curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
//     curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

//     $result = curl_exec ( $ch );
//     echo $result;
//     curl_close ( $ch );
// }

// 
?>

<!-- $message is your message to send to the device

$id is the devices registration token

YOUR_KEY_HERE is your Server API Key (or Legacy Server API Key) -->