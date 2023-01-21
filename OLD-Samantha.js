$(document).ready(function() {
    const dfMessenger = document.querySelector('df-messenger');
    console.log(dfMessenger)
    window.addEventListener('dfMessengerLoaded', function (event) {
        $r2 = dfMessenger.getAttribute("session-id");

        const instance = axios.create();
        
        instance.interceptors.response.use(response => {
          // check if the response is in JSON format
          if (response.headers['content-type'] === 'application/json') {
            // manipulate the response data as needed
            response.data = { ...response.data, timestamp: Date.now() };
          }
          return response;
        }, error => {
          return Promise.reject(error);
        });
        
        instance.post('https://dialogflow.cloud.google.com/v1/cx/integrations/messenger/webhook/b19c8cbd-5ddc-4764-8ddb-00cda9cc93f1/sessions/'+$r2)
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
// $.ajax({
//     type: "POST",
//     url: "https://global-dialogflow.googleapis.com/v3/projects/proyectosamantha/locations/global/agents/samantha1/sessions/test-session-123:detectIntent",
//     data: cadena,
//     dataType:'json',
//     success: function (r) {
//                 if (r == 1) {
//                     console.log(r+"hola1");
                    
//                 } else {
//                     console.log("hola2");
//                 }
//             },
    
// });
// {
//     "type": "service_account",
//     "project_id": "proyectosamantha",
//     "private_key_id": "3738c1b9a7044921c35afdc7981bf3a2d31953e0",
//     "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCkgL5vUAhdgblH\nMcOatIIGAkLslGf2BJ+xVKmKnufBZG1TNBD2S8ZVTsODuIFCMxqKOMMG9o8HQlvV\ncemCg+FWUC4SfwDUZWcdjdE6YN3RsdP+5HO8xpRj7Ib6QbK167o34999HPM3ofJI\nhjmQb7AkJ4TuXtY00ddQ23QLJo+CNLUW4wQZiI5Rihw9D/XdXCrR3ENG74/6Zegn\nfFIZxK1r3uoQzzFS6J0PKamkmQcHlJwcg5uOUrALtDMJdI86b3KO7qve8Aa7w+dz\nCrpeS5EkeJk0gsw1kSk+p59gfSsjLJqn+L2NnMxOk+aWhSw7xs6kQo+UHnWja0XR\n3fTC7B5pAgMBAAECggEABlIYjxocAizDd9X0ijeUleLFG8Y9gt1NXgDO5V/C76I6\nVaO24aHKeHlm54Mhu0+Pnd89tiEn4HtnICnI8z36POjmhkkpON//EOqDryqs5zte\nFgmE3WxjY/4A9zFqSpVowbBApHPl7/2p26nFoTQ7aD44/Dg6YovsCiQufqWwBqyM\nJkqiat4tvHuqsD7AuDt3aNisGflGMi6aUDzRIvtdChiecZ5dk6o0BiSBfxqURdtt\nNIArkGAmYyfq/TtkAs01BvE9DM+8z+6FVKR//BXgv06uyo3w03TkIBOHQFdo67t+\ntNH4dw/XXcLpCGWUypJ1+bdnAOz7SPzXd1YtV9QmkQKBgQDmvy+6vJnmeSmlunDy\netrSgjnUpxX2fZBL7y/vHbJ8kR3aqiELnyPasWfpstELN9Xj53XAUr5LYOUVNseH\ngD7sjdYWjF+yRgKDJOIoMRFujJvgSZm27b/A0BDtmppyVypO8iv+7VZ6LzQwROc+\nPmbaR+SL9KdmleZHW/nl0JyCeQKBgQC2gZuAacupCTkW13b/7gTLHsozSgvhSqIk\n0f/fZwU9RjIeNP/JxTnk1Tuxa8Gd6CY0w7Mt3gpsL0HuFvRsd+vXlhgdJt7NF12b\nvu6//hhJIUrM8k7sZaWOth5KzTojVoIEG37eAt6K/hbafggy+lZhc9nhe0zL4dRl\nvqD7DuD/cQKBgQCZ2eYIG1J+IlFLiBlhA9s9Osk2acWyGRyKFMwgIevtNJD0SDVK\nW2x7l4gSgUDyuuLpV13iwwjQl6WG1ISLa04JSbTySdxQsG9iY8hLRhQ6YpRYIprU\nJoeRFuoCku/hxw6VntEI49SiGTEx8e9BSDgp2H+hdZncQ5xL/h6MReDk+QKBgEMz\nzlKmojuIDeF/TW5H8rPojoP8TAuVM8djHFji0mcRpfrBgT6GxR6h9e0KxKykgw0C\n0sOc8zGK5TgKc85NCibEOfTiD0BtziY/VCKWKdMj0ytMPguGEkROgzEACNxiSlXA\n2iJd5BxCG6AwsEw1KgGQazY/9LNOYKtmWliXzfnBAoGANLIT87/vdST7WEaPBET0\n8zmCtupp6hYWA0nwp4YsK+Ig70DWVneBMw31xLw+ybtm3VLiRvI9ddFUxmWgaDyw\nJbNZCzxnjy4Ox+UCLPafFaYUE1N+nTIZYBffEBRriTloKxPLRVtbHOyPbA/iZwmC\nZnken57vx6QSFXl6hoxn3uA=\n-----END PRIVATE KEY-----\n",
//     "client_email": "cuentaservicio1@proyectosamantha.iam.gserviceaccount.com",
//     "client_id": "101238618332316960775",
//     "auth_uri": "https://accounts.google.com/o/oauth2/auth",
//     "token_uri": "https://oauth2.googleapis.com/token",
//     "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
//     "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/cuentaservicio1%40proyectosamantha.iam.gserviceaccount.com"
//   }
//$r2 = dfMessenger.shadowRoot.querySelector("intent");
const ahorasi = dfMessenger.intent
console.log($r2);
console.log(ahorasi)
//     js = 
//     "var performance = window.performance || window.mozPerformance" +
//                     " || window.msPerformance || window.webkitPerformance || {};" +
//     " return performance.getEntries() || {};";
//  netData = executeJavaScript(js).toString();
//  logger.info("Network traffic: {}", netData);
// var texto = event.detail.response.queryResult.queryText
// console.log(texto);

    dfMessenger.addEventListener('df-request-sent', function (event) {
        $r2 = dfMessenger.getAttribute("session-id");
        

        const instance = axios.create();

        instance.interceptors.response.use(response => {
        // check if the response is in JSON format
        if (response.headers['content-type'] === 'application/json') {
            // manipulate the response data as needed
            response.data = { ...response.data, timestamp: Date.now() };
        }
        return response;
        }, error => {
        return Promise.reject(error);
        });

        instance.get('https://jsonplaceholder.typicode.com/todos/1')
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.log(error);
        });
        // const { fetch: originalFetch } = window;
        // window.fetch = async (...args) => {
        // let [resource, config] = args;

        // let response = await originalFetch(resource, config);

        // // response interceptor
        // const json = () =>
        //     response
        //     .clone()
        //     .json()
        //     .then((data) => ({ ...data, ResposnseId: `Intercepted: ${data.ResposnseId}` }));

        // response.json = json;
        // return response;
        // };

        // fetch('https://dialogflow.cloud.google.com/v1/cx/integrations/messenger/webhook/b19c8cbd-5ddc-4764-8ddb-00cda9cc93f1/sessions/'+$r2)
        // .then((response) => response.json())
        // .then((json) => console.log(json))
        // .catch(err => console.error(err));

// log
// {
//     "userId": 1,
//     "id": 1,
//     "title": "Intercepted: delectus aut autem",
//     "completed": false
// }
        //$r2 = dfMessenger.shadowRoot.querySelector("intent");
const ahorasi = dfMessenger.intent
console.log($r2);

    dfMessenger.addEventListener('df-response-received', function (event, event1, event2) {
        console.log(event);
        console.log(event1);
        console.log(event2);
        var largofulfilllmentMessages = event.detail.response.queryResult.fulfillmentMessages.length;
        var texto = new Array(largofulfilllmentMessages);
        for(i=0; i<largofulfilllmentMessages; i++){
            var largotext = event.detail.response.queryResult.fulfillmentMessages[i].text.text.length;
            texto[i] = new Array(largotext);
             for(j=0; j<largotext; j++){
                texto[i][j] = event.detail.response.queryResult.fulfillmentMessages[i].text.text[j];
                //TEXTOS RECIBIDOS//
                if(texto[i][j] != undefined && texto[i][j] != null){
                    console.log(texto[i][j]);
                }
             }
        }
        var time = event.timeStamp;
        if(time != undefined && time != null){
            //TIMESTAMP RECIBIDO//
            console.log(time);
        }
    })
})
})

XMLHttpRequest.prototype.realSend = XMLHttpRequest.prototype.send;
XMLHttpRequest.prototype.send = function(value) {
this.addEventListener("progress", function(){
    console.log("Loading. Here you can intercept...");
    console.log(value)
}, false);
this.realSend(value);
console.log(value)
};

//  js = 
//    "var performance = window.performance || window.mozPerformance" +
//                    " || window.msPerformance || window.webkitPerformance || {};" +
//    " return performance.getEntries() || {};";
// netData = executeJavaScript(js).toString();
// logger.info("Network traffic: {}", netData);
})


//