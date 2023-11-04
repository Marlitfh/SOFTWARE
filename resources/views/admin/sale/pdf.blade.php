<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
            font-family: arial, sans-serif;
            font-size: 14px;
        }
        #tabla_datos_cliente {
            border: 1px solid #000;
            float: left;
            width: 40%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        #tabla_datos_cliente thead {
            padding: 10px;
            text-align: left;
        }

        #venta_num {
            float: right;
            padding: 10px;
            text-align: center;
            background: #33AFFF;
        }

        section {
            clear: left;
            margin-top: 20px;
        }

        #venta_num,
        #tabla_encabezado {
            color: #fff;
            font-size: 15px;
        }

        #tabla_datos_vendedor {
            width: 100%;
            border-spacing: 0;
            text-align: center;
        }

        #tabla_datos_vendedor thead {
            padding: 20px;
            background: #33AFFF;
            text-align: center;
        }

        #tabla_datos_producto {
            width: 100%;
            border-spacing: 0;
            text-align: center;
        }

        #tabla_datos_producto thead {
            padding: 20px;
            background: #33AFFF;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <table id="tabla_datos_cliente" class="table table-striped">
                <thead>
                    <tr>
                        <th id="">Datos del cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p style="margin: 0;">Nombre: {{$sale->client->clie_name}}</p>
                            <p style="margin: 0;">DNI: {{$sale->client->clie_dni}}</p>
                            <p style="margin: 0;">Celular: {{$sale->client->clie_phone}}</p>
                            <p style="margin: 0;">Email: {{$sale->client->clie_email}}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="venta_num">
            <p style="margin: 0;">Número de venta</p>
            <p style="margin: 0;">{{$sale->id}}</p>
        </div>
    </header>
    <br><br>
    <section>
        <div>
            <table id="tabla_datos_vendedor">
                <thead>
                    <tr id="tabla_encabezado">
                        <th>Vendedor</th>
                        <th>Fecha de venta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$sale->user->name}}</td>
                        <td>{{date("d/m/y H:i:s", strtotime($sale->sale_date))}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div>
            <table id="tabla_datos_producto">
                <thead>
                    <tr id="tabla_encabezado">
                        <th>Producto</th>
                        <th>Precio de venta (PEN)</th>
                        <th>Cantidad</th>
                        <th>Descuento(%)</th>
                        <th>Subtotal (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                    <tr>
                        <td>{{$saleDetail->product->prod_name}}</td>
                        <td>{{$saleDetail->sade_price}}</td>
                        <td>{{$saleDetail->sade_quantity}}</td>
                        <td>{{$saleDetail->sade_discount}} %</td>
                        <td>S/ {{number_format($saleDetail->sade_quantity*$saleDetail->sade_price - (($saleDetail->sade_quantity*$saleDetail->sade_price) * $saleDetail->sade_discount / 100),2)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p style="text-align:right;">SUBTOTAL:</p>
                        </th>
                        <th>
                            <p style="text-align:right;">
                                S/ {{number_format($subtotal,2)}}
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p style="text-align:right;">TOTAL IMPUESTO ({{$sale->sale_tax}}%):</p>
                        </th>
                        <th>
                            <p style="text-align:right;">S/ {{number_format($subtotal*$sale->sale_tax/100,2)}}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p style="text-align:right;">TOTAL:</p>
                        </th>
                        <th>
                            <p style="text-align:right;">S/ {{number_format($sale->sale_total,2)}}</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>