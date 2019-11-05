<!DOCTYPE html>
<html>
    <head>
        <title>Seasonal Foods</title>
        <link type="image/x-icon" rel="shortcut icon" href="images/logo/logo-face.png" />
        <link type="image/x-icon" rel="icon" href="images/logo/logo-face.png"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/fontawesome-all.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/style.css"/>
        <script src="<?php echo base_url() ?>public/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>/public/js/app.js"></script>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    </head>
    <body>
        <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
<!--        -------------------------------- HEADER ------------------------------------------>
        <?php echo isset($header)?$header:"" ?>
<!--        -------------------------------- BANNER ------------------------------------------>
        <?php echo isset($banner)?$banner:"" ?>
<!--        -------------------------------- BODY ------------------------------------------>
        <?php echo isset($body)?$body:"" ?>
<!--        -------------------------------- FOOTER ------------------------------------------>
        <?php echo isset($footer)?$footer:"" ?>
        
        <script> 
            $(document).ready(function(){
                function formatCurrency(number){
            var n = number.split('').reverse().join("");
            var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
            return  n2.split('').reverse().join('');
        }
            })
        </script>
    </body>
</html>