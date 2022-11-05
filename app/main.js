$( function(){
    $('.form-element').on('change',function(){
        $('#resultBox').text('Idle')
    })

    $('#method').on('change', showHideParametersBox)

    showHideParametersBox()
    testIt()
})

function showHideParametersBox(){

    $('#parameters').toggle($('#method').val() !== 'get' )
}

function requestMessage(url, method, parameters, has_basic_auth = false){
    var message = ''
    message += 'url:        ' + url + '<br>';
    message += 'method:     ' + method + '<br>';
    message += 'parameters: ' + parameters + '<br>';
    message += (has_basic_auth?'has basic_auth':'');
    $('#requestBox').html(message)
}

function testIt() 
{
    urlInput = $('#url').val()
    methodInput = $('#method').val()
    parameters = $('#parameters').val()
    username = $('#auth_user').val()
    password = $('#auth_pass').val()
    has_basic_auth = username.length>0 && password.length>0

    requestMessage(urlInput, methodInput, parameters, has_basic_auth)

    $('#resultBox').text('Requesting ...')
    $.ajax
    ({
        url: urlInput,
        type: 'json',
        method: methodInput,
        data: methodInput == 'get'? '[]':JSON.parse(parameters),
        beforeSend: function (xhr) {
            if(has_basic_auth){
                xhr.setRequestHeader ("Authorization", 
                    "Basic " + btoa(username + ":" + password)
                )
            }
        },
        error: function(xhr, status, error){
            console.log(xhr, status, error);
            $('#resultBox').removeClass("gray green").addClass("red").text('error!');
        },
        success: function(data) 
        {
            console.log(data);
            $('#logResult').text(JSON.stringify(data))
            $('#resultBox').removeClass("gray red").addClass("green").text('success');
        }
    });
    return false
}
