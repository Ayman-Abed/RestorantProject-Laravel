        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2015 <a href="#">Your Website Link.</a> Theme by <a href="http://themewagon.com/"  target="_blank">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="{{ asset('UI/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('UI/js/owl.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('UI/js/jquery.mixitup.min.js')}}" ></script>
        <script src="{{ asset('UI/js/wow.min.js')}}"></script>
        <script src="{{ asset('UI/js/jquery.validate.js')}}"></script>
        <script type="text/javascript" src="{{ asset('UI/js/jquery.hoverdir.js')}}"></script>
        <script type="text/javascript" src="{{ asset('UI/js/jQuery.scrollSpeed.js')}}"></script>
        <script src="{{ asset('UI/js/script.js')}}"></script>
        <script src="{{ asset('UI/js/bootstrap-datetimepicker.min.js')}}"></script>


        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


        @if ($errors->count() > 0)
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error("{{ $error }}");
                </script>

            @endforeach
        @endif



        {{-- For Date and Time --}}
        <script>
            $(function() {
                $("#datepicker").datetimepicker({
                     format: 'yyyy-mm-dd hh:ii',
                     showMeridian: true,
                     autoclose: true,
                     todayBtn: true
                });
            });
        </script>




        {!! Toastr::message() !!}


    


    </body>
</html>
