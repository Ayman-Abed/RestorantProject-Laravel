<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

        <title>Mamma's Kitchen</title>

        <link rel="stylesheet" href="{{ asset('UI/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/animate.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/pricing.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('UI/css/bootstrap-datetimepicker.min.css')}}">

        
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


        <script src="{{ asset('UI/js/jquery-1.11.2.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('UI/js/jquery.flexslider.min.js')}}"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>

        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(24.909439, 91.833800),
                    zoom: 16,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(24.909439, 91.833800),
                    title:"Mamma's Kitchen Restaurant"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>



    </head>