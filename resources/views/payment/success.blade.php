<!DOCTYPE html>
<html>
  <head>
    <title>Payment successful</title>
    <script>var time = '' || 10000;
      if ('https://horsestation.store/') {
        setTimeout(function () {
          - window.location = "https://horsestation.store/"
        }, time);
      }
    </script>
    <style type="text/css">
      *,
      *:after,
      *:before {
        box-sizing: border-box;
        font-family: Sans-Serif;
      }
      .tick {
        display: inline-block;
        transform: rotate(45deg);
        height: 36px;
        width: 18px;
        border-bottom: solid 3px #2196f3;
        border-right: solid 3px #2196f3;
        margin-bottom: 8px;
      }
      .tick-container {
        padding: 20px;
        border-radius: 100px;
        height: 56px;
        width: 56px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        background: #fff;
        margin-bottom: 12px;
      }
      body {
        background: white;
        margin: 0;
        background: #2196f3;
        text-align: center;
      }
      .heading {
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-bottom: 32px;
      }
      .container {
        color: #fff;
        margin: auto;
        padding: 32px 16px 16px;
      }
      .text-container {
        line-height: 1.8em;
      }
      .primary-button {
        color: #2196f3;
        background-color: #fff;
        padding: 12px 16px;
        display: inline-block;
        margin-top: 32px;
        border-radius: 6px;
        text-decoration: none;
        text-transform: uppercase;
      }
    </style>
  </head>
  <body style="font-family:sans-serif;">
    <div class="container">
      <div class="heading"><span class="tick-container"><i class="tick" style="color:green;">&nbsp;</i></span><span>Your payment is successful Your and Order Number are</span></div>
     <h4 style="text-align: center">{{$data['response']['orderReferenceNumber']}}</h4> 
      <div class="text-container">
        <div>Click the button below, if you are not redirected to the website.</div><a class="primary-button" href="https://horsestation.store/">Go to Website</a>
      </div>
    </div>
  </body>
</html>