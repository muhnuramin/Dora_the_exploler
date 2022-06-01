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
                // 'click_action' => $url,
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
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
