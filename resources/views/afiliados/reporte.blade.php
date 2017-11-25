<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Resultados de consulta</title>
        <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <style>
            @page { margin: 180px 50px; }
            #header {
                position: fixed; 
                left: 0px; 
                top: -180px; 
                right: 0px; 
                height: 150px; 
                text-align: center;
            }
            #footer {
                position: fixed; 
                left: 0px; 
                bottom: -180px; 
                right: 0px; 
                height: 150px; 
            }
            #footer .page:after {
                content: counter(page, upper-roman);
            }
        </style>
    </head>
    <body marginwidth="0" marginheight="0">
        <div id="header">
            <div style="float:left">
                <img src="{{ asset('assets/images/logo_udo.png') }}" width="100px" height="auto" style="margin: 0.5em;">
            </div>
            <div style="float:right">
                <img src="{{ asset('assets/images/logo.jpeg') }}" width="auto" height="100px" style="margin: 0.5em;">
            </div>
            <br>
            <div style="padding-top: 110px; text-align:center">
                <h2><b><u>Nómina de afiliados</u></b></h2>
                <p style="padding-top: -10px;"><b><u>(Estado: {{ $estado }} y Dependencia: {{ $dependencia }})</u></b></p>
            </div>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="0" cellspacing="0" id="cabecera" border="0" width="100%" style="padding-top: 40px;">
            <thead>
                <tr style="color:red; text-transform: uppercase">
                    <th><u>Cédula</u></th>
                    <th><u>Nombres</u></th>
                    <th><u>Apellidos</u></th>
                </tr>
            </thead>
            <tbody style="padding-top: 100px">
                <tr>
                    <td colspan="5"><br></td>
                </tr>
                @foreach($atletas as $atleta)
                <tr>
                    <td>{{ number_format($atleta->cedula, 0, '', '.') }}</td>
                    <td>{{ $atleta->nombre }}</td>
                    <td>{{ $atleta->apellido }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>      
    </body>
</html>