$(document).ready(function() {
    

        window.addEventListener('dfMessengerLoaded', function (event) {
            const dfMessenger = document.querySelector('df-messenger');
            console.log(dfMessenger)
            const r2 = dfMessenger.getAttribute("session-id");
                console.log(r2)
            
            dfMessenger.addEventListener('df-request-sent', async function (event) {
                const r2 = dfMessenger.getAttribute("session-id");
                console.log(r2)
                const PROJECT_ID = "proyectosamantha";
                const REGION_ID = "global";
                const AGENT_ID = "samantha1";
                const valor = {
                    "queryInput": {
                      "text": {
                        "text": "hola"
                      },
                      "languageCode": "en"
                    },
                    "queryParams": {
                      "timeZone": "America/Los_Angeles"
                    }
                  }
                $.ajax({
                    type: "POST",
                    url: "https://"+REGION_ID+"-dialogflow.googleapis.com/v3/projects/"+PROJECT_ID+"/locations/"+REGION_ID+"/agents/"+AGENT_ID+"/sessions/test:detectIntent",
                    data: valor,
                    dataType:'text',
                    success: function (r) {
                                console.log(r);
                                verCarrito();
                            },    error : function(xhr, status) {
                                console.log(status);
                                console.log(xhr);
                                console.log('Disculpe, existió un problema');
                            },
                    
                });
            })
        })
})
function hola(){

    console.log("hola");
  var clientId = '101238618332316960775';
  var redirectUri = 'https://www.googleapis.com/robot/v1/metadata/x509/cuentaservicio1%40proyectosamantha.iam.gserviceaccount.com';
  var scope = 'https://www.googleapis.com/auth/dialogflow';
  var authUrl = 'https://accounts.google.com/o/oauth2/auth' +
    '?client_id=' + clientId +
    '&redirect_uri=' + redirectUri +
    '&scope=' + scope +
    '&response_type=code';
  // Open the authorization URL in a new window
  window.open(authUrl, '_blank', 'height=600, width=450');
}