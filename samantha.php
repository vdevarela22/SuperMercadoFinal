<head>
<meta name="viewport" content="width-device-width, initial-scale=1">
</head>
<body>
<!-- <h1 id="test">Hola</h1>
<button id="hopebutton">ASD</button> -->
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger-cx/bootstrap.js?v=1"></script>
<df-messenger
  id="idchat"
  df-cx="true"
  chat-title="samantha1"
  agent-id="b19c8cbd-5ddc-4764-8ddb-00cda9cc93f1"
  language-code="es"
></df-messenger>
<button id="authenticate" onclick="hola()">Authenticate with Dialogflow</button>

<script src="dist/js/jquery.js"></script>
<script src="dist/js/popper.min.js"></script>
<script src="dist/js/functions.js"></script>
<script src="functionsSamantha.js"></script>
<link href="bootstrap-5.2.2-dist/css/bootstrap.min.css" rel="stylesheet" >
<link href="dist/css/style.css" rel="stylesheet" >
<script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
<html lang=en><meta charset=utf-8><meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width"><title>Error 405 (Bad Request)!!1</title><style nonce="N3QJW8cTMHDWlO-SNoi0Kg">*{margin:0;padding:0}html,code{font:15px/22px arial,sans-serif}html{background:#fff;color:#222;padding:15px}body{color:#222;text-align:unset;margin:7% auto 0;max-width:390px;min-height:180px;padding:30px 0 15px;}* > body{background:url(//www.google.com/images/errors/robot.png) 100% 5px no-repeat;padding-right:205px}p{margin:11px 0 22px;overflow:hidden}pre{white-space:pre-wrap;}ins{color:#777;text-decoration:none}a img{border:0}@media screen and (max-width:772px){body{background:none;margin-top:0;max-width:none;padding-right:0}}#logo{background:url(//www.google.com/images/branding/googlelogo/1x/googlelogo_color_150x54dp.png) no-repeat;margin-left:-5px}@media only screen and (min-resolution:192dpi){#logo{background:url(//www.google.com/images/branding/googlelogo/2x/googlelogo_color_150x54dp.png) no-repeat 0% 0%/100% 100%;-moz-border-image:url(//www.google.com/images/branding/googlelogo/2x/googlelogo_color_150x54dp.png) 0}}@media only screen and (-webkit-min-device-pixel-ratio:2){#logo{background:url(//www.google.com/images/branding/googlelogo/2x/googlelogo_color_150x54dp.png) no-repeat;-webkit-background-size:100% 100%}}#logo{display:inline-block;height:54px;width:150px}</style><main id="af-error-container" role="main"><a href=//www.google.com><span id=logo aria-label=Google role=img></span></a><p><b>405.</b> <ins>That’s an error.</ins><p>The server cannot process the request because it is malformed. It should not be retried. <ins>That’s all we know.</ins></main>
<script src="axios.min.js_1.2.1/axios.min.js"></script>
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->

</body>



<!-- // require 'vendor/autoload.php';

// use Google\Cloud\Storage\StorageClient;



// $storage = new StorageClient([
//     'keyFile' => json_decode(file_get_contents('key.json'), true)
// ]);
// $storage = new StorageClient([
//     'projectId' => 'proyectosamantha'
// ]);
// use Google\Cloud\Dialogflow\V2\IntentsClient;

// $intentsClient = new IntentsClient();
// try {
//     $formattedParent = $intentsClient->agentName('[proyectosamantha]');
//     $intents = [];
//     $operationResponse = $intentsClient->batchDeleteIntents($formattedParent, $intents);
//     $operationResponse->pollUntilComplete();
//     if ($operationResponse->operationSucceeded()) {
//         // operation succeeded and returns no value
//     } else {
//         $error = $operationResponse->getError();
//         // handleError($error)
//     }
//     // Alternatively:
//     // start the operation, keep the operation name, and resume later
//     $operationResponse = $intentsClient->batchDeleteIntents($formattedParent, $intents);
//     $operationName = $operationResponse->getName();
//     // ... do other work
//     $newOperationResponse = $intentsClient->resumeOperation($operationName, 'batchDeleteIntents');
//     while (!$newOperationResponse->isDone()) {
//         // ... do other work
//         $newOperationResponse->reload();
//     }
//     if ($newOperationResponse->operationSucceeded()) {
//         // operation succeeded and returns no value
//     } else {
//         $error = $newOperationResponse->getError();
//         // handleError($error)
//     }
// } finally {
//     $intentsClient->close();
// }
?> -->