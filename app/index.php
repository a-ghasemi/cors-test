<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test CORS</title>

    <link rel="stylesheet" href="./main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./main.js"></script>
</head>
<body>
    <div class="boxView basicAuth">
        <span class="title">Basic Auth</span>
        username: <input type="text" id="auth_user" value="<?php echo getenv('BASIC_AUTH_USERNAME'); ?>" />
        <br>
        password: <input type="text" id="auth_pass" value="<?= getenv('BASIC_AUTH_PASSWORD'); ?>" />
        <br>
        <span class="note">Just leave these empty in case of no basic auth</span>
    </div>
    <div class="boxView">
        <form action="" onsubmit="testIt(); return false;">
            Method: <select id="method" class="form-element">
                <option value="get" selected>GET</option>
                <option value="post">POST</option>
                <option value="put">PUT</option>
                <option value="options">OPTIONS</option>
                <option value="delete">DELETE</option>
                <option value="patch">PATCH</option>
            </select>
            <br>
            Url: <input class="form-element" type="text" id="url" value="http://migrant.datarivers.org:5000/articles/1/" />
            <br>
            Parameters: <textarea class="form-element" id="parameters" value=""" rows="3"></textarea>
            <button type="submit">Send Request</button>
        </form>
    </div>
    <hr>
    <div class="boxView">
        <span class="title">Request: </span>
        <span id="requestBox" class="gray">---</span>
    </div>
    <div class="boxView">
        <span class="title">Response: </span>
        <div>Status: <span id="resultBox" class="gray">Idle</span></div>
        <div id="logResult"></div>
    </div>
</body>
</html>