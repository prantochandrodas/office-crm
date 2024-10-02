<!DOCTYPE html>
<html>
<head>
    <title>Client Mail</title>
</head>
<body>
    <h1>Hello {{$clientName}},</h1>
    <p>{!! $messageContent !!}</p>
    <p>Best Regards,<br>From {{generalSetting()->company_name}}</p>
</body>
</html>
