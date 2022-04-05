<?php

$FIREBASE_SERVER_KEY = 'AAAAZfo69KE:APA91bE5e2i3uuU72oStelpOKKQL1L-XJ75qT7lH-fbzA5gc14YGVbfUVOEwq7wyqv8ZBY9de8I0G8d1IY-NwlxupOb02shAcayvdhGOo2xp-tuyA0W3m_WyTtW4rz5kJkAS8V7DsaQB';

define('FCM_AUTH_KEY', $FIREBASE_SERVER_KEY);

function sendPush($to, $title, $body, $icon, $url)
{
    $FIREBASE_TOKEN = $to;
    $postdata = json_encode(
        [
            'notification' =>
            [
                'title' => $title,
                'body' => $body,
                'icon' => $icon,
                'click_action' => $url
            ],
            'to' => $FIREBASE_TOKEN
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
