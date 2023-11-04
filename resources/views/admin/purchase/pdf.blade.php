<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes de compras</title>
    <style>
        body {
            font-family: arial, sans-serif;
            font-size: 14px;
        }

        #tabla_datos_proveedor {
            border: 1px solid #000;
            float: left;
            width: 40%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        #tabla_datos_proveedor thead {
            padding: 10px;
            text-align: left;
        }

        #compra_num {
            float: right;
            padding: 10px;
            text-align: center;
            /* background: #33AFFF; */
            background: rgb(82, 180, 99);
        }

        section {
            clear: left;
            margin-top: 20px;
        }

        #compra_num,
        #tabla_encabezado {
            color: #fff;
            font-size: 15px;
        }

        #tabla_datos_comprador {
            width: 100%;
            border-spacing: 0;
            text-align: center;
        }

        #tabla_datos_comprador thead {
            padding: 20px;
            /* background: #33AFFF; */
            background: rgb(82, 180, 99);
            text-align: center;
        }

        #tabla_datos_producto {
            width: 100%;
            border-spacing: 0;
            text-align: center;
        }

        #tabla_datos_producto thead {
            padding: 20px;
            /* background: #33AFFF; */
            background: rgb(82, 180, 99);
            text-align: center;
        }
    </style>
</head>

<body>
    <header style="">
        <div>
            <table id="tabla_datos_proveedor" class="table table-striped">
                <thead>
                    <tr>
                        <th id="">Datos del proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p style="margin: 0;">Nombre: {{$purchase->provider->prov_name}}</p>
                            <p style="margin: 0;">RUC: {{$purchase->provider->prov_ruc}}</p>
                            <p style="margin: 0;">Celular: {{$purchase->provider->prov_phone}}</p>
                            <p style="margin: 0;">Email: {{$purchase->provider->prov_email}}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="compra_num">
            <p style="margin: 0;">Número de compra</p>
            <p style="margin: 0;">{{$purchase->id}}</p>
        </div>
    </header>
    <br><br>

    <section>
        <div>
            <table id="tabla_datos_comprador">
                <thead>
                    <tr id="tabla_encabezado">
                        <th>Comprador</th>
                        <th>Fecha de compra</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$purchase->user->name}}</td>
                        <td>{{date("d/m/y H:i:s", strtotime($purchase->purc_date))}}</td>
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
                        <th>Precio compra (PEN)</th>
                        <th>Cantidad</th>
                        <th>Subtotal (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseDetails as $purchaseDetail)
                    <tr>
                        <td>{{$purchaseDetail->product->prod_name}}</td>
                        <td>{{$purchaseDetail->pude_price}}</td>
                        <td>{{$purchaseDetail->pude_quantity}}</td>
                        <td>S/ {{number_format($purchaseDetail->pude_quantity*$purchaseDetail->pude_price,2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p style="text-align:right;">SUBTOTAL:</p>
                        </th>
                        <th>
                            <p style="text-align:right;">
                                S/ {{number_format($subtotal,2)}}
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p style="text-align:right;">TOTAL IMPUESTO ({{$purchase->purc_tax}}%):</p>
                        </th>
                        <th>
                            <p style="text-align:right;">
                                S/ {{number_format($subtotal*$purchase->purc_tax/100,2)}}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p style="text-align:right;">TOTAL:</p>
                        </th>
                        <th>
                            <p style="text-align:right;">S/ {{number_format($purchase->purc_total,2)}}</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

</body>

</html>