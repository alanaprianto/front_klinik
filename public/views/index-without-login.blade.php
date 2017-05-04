<!DOCTYPE html>
<html lang="en" ng-app="adminApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @yield('title')
        <link href="/assets/images/logo/logo-sm.png" rel="icon">

        <link href="../assets/plugins/metismenu/metisMenu.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/plugins/semantic/semantic.css" rel="stylesheet">
        <link href="../assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/dataTables.semanticui.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/responsive.semanticui.min.css" rel="stylesheet">
        <link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet">
        <link href="../assets/plugins/ngDialog/ngDialog.css" rel="stylesheet">

        <link href="../assets/css/index.css" rel="stylesheet">

        @yield('css')
        
    </head>
    <body ng-app="adminApp" ng-cloak>
        
        @yield('view')

        <!-- Main Javascript -->
        <script src="{{asset('../assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('../assets/js/angular.min.js')}}"></script>
        <script src="{{asset('../assets/js/angular-cookies.js')}}"></script>
        <script src="{{asset('../assets/js/angular-resource.js')}}"></script>
        <!-- Plugins -->
        <script src="{{asset('../assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/semantic/semantic.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/datatables/js/dataTables.semanticui.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/datatables/js/responsive.semanticui.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/sweetalert/ngSweetalert.js')}}"></script>
        <script src="{{asset('../assets/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script src="{{asset('../assets/plugins/ngDialog/ngDialog.js')}}"></script>
        <script src="{{asset('../assets/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('../assets/plugins/angular-moment/angular-moment.js')}}"></script>
        <script src="http://code.responsivevoice.org/responsivevoice.js"></script>

        <script src="{{asset('../views/app-without-login.js')}}"></script>
        <script src="{{asset('../views/config/config.js')}}"></script>

        <script src="{{asset('../views/serviceCommon.js')}}"></script>
        <script src="{{asset('../views/serviceLoket.js')}}"></script>
        <script src="{{asset('../views/servicePenataJasa.js')}}"></script>
        <script src="{{asset('../views/serviceKasir.js')}}"></script>
        <script src="{{asset('../views/serviceApotek.js')}}"></script>
        <script src="{{asset('../views/serviceAdmin.js')}}"></script>

        
        @yield('scripts')

        <script type="text/javascript">
            /* loader */
            $(window).on('load', function(){
                $('#loader').transition('fade');
            })

            $(function(){
                /* menu sidebar toggle */
                /* mobile display */
                $(document).on('click', '.module-left-bars', function(){
                    var vis = $('.module-left-container').hasClass("visible"); 
                    $('.module-left-container').transition('slide right');
                    
                    if(vis == false){
                        $('.module-content-container').addClass('mobile-ver');
                        $(this).empty().append('<i class="ti-close"></i>');
                        $('.module-content-container').css("position", "fixed");
                    }else{
                        $('.module-content-container').removeClass('mobile-ver');
                        $(this).empty().append('<i class="ti-menu"></i>');
                        $('.module-content-container').css("position", "relative");
                    }
                });
                $(document).on('click', '.mobile-ver', function(){
                    $(this).removeClass('mobile-ver');
                    $('.module-left-container').transition('slide right');
                    $('.module-left-bars').empty().append('<i class="ti-menu"></i>');
                    $('.module-content-container').css("position", "relative");
                });

                /* metismenu */
                $('#module-left-menu').metisMenu();

                /* slimscroll */
                $('.module-left-nav').slimScroll({
                    height: '100%',
                    size: '10px'
                });
            });

            var datatableSettings = '';

            $(document).ready(function(){
                /* datatable */
                // datatableSettings = $('#example').DataTable({
                //     'dom':'<"top"f>rt<"bottom"<"col-md-6"i><"col-md-6 right"p>><"clear">',
                //     'language': {
                //         'zeroRecords': 'Maaf, Data tidak ditemukan',
                //         'infoEmpty' : 'Tidak ada record data',
                //         'info' : 'Halaman _PAGE_ dari _PAGES_. Total records: _TOTAL_',
                //         'search': '<form class="ui form"><div class="field"><div class="ui left icon input"><i class="search icon"></i> _INPUT_ </div></div></form>',
                //         'searchPlaceholder': 'Search...',
                //         'paginate':{
                //             'previous': '&laquo',
                //             'next': '&raquo'

                //         },
                //         'infoFiltered': '<br/>(dari _MAX_ total record)',
                //         'responsive': true,
                //         'columnDefs': [
                //             { 'responsivePriority': 1, 'targets': 0 },
                //             { 'responsivePriority': 2, 'targets': -1 }
                //         ]
                //     }
                // });
            });
        </script>
  </body>
</html>
