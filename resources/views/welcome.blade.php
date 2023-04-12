<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
rel="stylesheet"
/>
    <title>Document</title>
</head>
<body>
    

   <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-12 col-lg-6 row shadow-sm">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="https://www.grupopabsa.com">
                        <img src="../../img/logo.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-12 text-center mt-4">
                    <h1>Aplicación RH</h1>
                    @if (session('enviado'))
                    <div class="alert alert-success alert-sm h3">
                        {{session('enviado')}}
                    </div>
                        
                    @endif
                </div>
            <form action="{{route('rh')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="col-12">
                    <div class="row justify-content-center m-5">
                        <div class="col-12 h5 p-2">
                            Nombre Completo:
                        </div>
                        <div class="col-12 ">
                            <input type="text" name="nombre" class="form-control p-2" required>
                        </div>

                        <div class="col-12  h5 mt-4">
                            Teléfono:
                        </div>
                        <div class="col-12 ">
                            <input type="text" name="telefono" class="form-control p-2" required>
                        </div>

                        <div class="col-12  h5 mt-4">
                            Correo Eléctronico:
                        </div>
                        <div class="col-12 ">
                            <input type="text" name="email" class="form-control p-2" required>
                        </div>

                        <div class="col-12 h5 mt-4">
                            Edad:
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control p-2" name="edad" id="" required>
                        </div>

                        <div class="col-12 h5 mt-4">
                            Escolaridad:
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control p-2" name="escolaridad" required>
                        </div>


                        <div class="col-12 h5 mt-4">
                            Curriculum Vitae
                        </div>
                        <div class="col-12">
                            <input type="file" accept=".docx, .pdf, .doc" name="curriculum" class="form-control" required>
                        </div>


                        <div class="col-12 mt-5 text-center">
                            <button class="btn btn-success">
                                Enviar Datos
                            </button>
                        </div>


                    </div>
                </div>
            </form>


            </div>
        </div>
    </div>
   </div>




    <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
</body>
</html>