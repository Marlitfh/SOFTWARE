
// alert('0909099');

// $(function () {
//     var varCompra= document.getElementById('compras').getContext('2d');
//     // chartjs.org = documentación
//     var charCompra = new Chart(varCompra, {
//         type: 'bar',
//         data: {
//             labels: [<?php foreach($comprasmes as $reg)
//                 {
//                 setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
//                 $mes_traducido= strftime('%B', strtotime($reg->mes));

//                 echo '"'.$mes_traducido.'",';} ?>],
//                 datasets: [{
//                     label: 'Compras',
//                     data: [<?php foreach ($comprasmes as $reg){echo ''.$reg->totalmes.',';} ?>],
//                     backgroundColor:'rgba(60, 179, 113, 1)',
//                     borderColor: 'rgba(61, 180, 111, 0.2)', //'rgba(255, 99, 132, 1)',
//                     borderWith: 3
//                 }]
//             },
//             options:{ scales:{ yAxes:[{ ticks:{beginAtZero:true} }] } }
//         });


//         var varVenta= document.getElementById('ventas').getContext('2d');
//         var charVenta = new Chart(varVenta, {
//         type: 'bar',
//         data: {
//             labels: [<?php foreach($ventasmes as $reg)
//                 {
//                 setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
//                 $mes_traducido= strftime('%B', strtotime($reg->mes));

//                 echo '"'.$mes_traducido.'",';} ?>],
//                 datasets: [{
//                     label: 'Ventas',
//                     data: [<?php foreach ($ventasmes as $reg){echo ''.$reg->totalmes.',';} ?>],
//                     backgroundColor:'rgba(0, 0, 255, 0.8)', //rgba(20, 204, 20, 1)
//                     borderColor: 'rgba(54, 162, 235, 0.2)',
//                     borderWith: 1
//                 }]
//             },
//             options:{ scales:{ yAxes:[{ ticks:{beginAtZero:true} }] } }
//         });


//         var varVenta= document.getElementById('ventas_diarias').getContext('2d');
//         var charVenta = new Chart(varVenta, {
//         type: 'bar',  //bar
//         data: {
//             labels: [<?php foreach($ventasdia as $vd)
//                 {
//                     $dia= $vd->dia;

//                 echo '"'.$dia.'",';} ?>],
//                 datasets: [{
//                     label: 'Ventas',
//                     data: [<?php foreach ($ventasdia as $reg){echo ''.$reg->totaldia.',';} ?>],
//                     backgroundColor:'rgba(0, 0, 255, 0.8)',
//                     borderColor: 'rgba(0, 0, 255, 0.2)',
//                     borderWith: 1
//                 }]
//             },
//             options:{ scales:{ yAxes:[{ ticks:{beginAtZero:true} }] } }
//         });


//     });