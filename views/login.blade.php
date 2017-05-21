<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Compraventa la Amistad  </title>

    <!-- Bootstrap -->
    <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{url('build/css/custom.min.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
    
    


  </head>

  <body class="login">


    <div>
              @if(Session::has('message'))
                <div id="alert">
                  <div class="col-sm-12 hr hr-18 hr-double dotted"></div>
                  <div class="col-sm-4 col-xs-12 col-sm-offset-4 alert alert-{{Session::get('class')}}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('message')}}
                  </div>
                </div>
              @endif
              
      <br>
      {{-- {{Hash::make(33333333)}} --}}

      <div class="login_wrapper">
      
        <div class="animate form login_form">
     

          <section class="login_content">

            <form action="check" method="POST">
              <h1>Iniciar Sesión</h1>
              <br>
              {{base64_decode('$2y$10$O7TkewFeYKlwMbISuSKMoelVvwYBxFpar94.Ec0uPwYHw3wk1B/gO')}}
              <div>
                <input type="text" name="user" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" href="check">Iniciar Sesión</button>
                {{-- <input type="submit" class="btn btn-default submit" value="Iniciar Sesión"> --}}

                
              </div>




              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-xing"></i> Compraventa la Amistad</h1>
                  <p>©2016 Todos los Derechos Reservados - Felipe Medel</p> 
                
                </div>

              </div>
            </form>

          </section>

        </div>




        
      </div>
    </div>
    <script type="text/javascript">

    // Tiempo del mensaje
      $('#alert').fadeOut(6000, function() {
        $(this).remove();
      });
    </script>
  </body>

</html>
