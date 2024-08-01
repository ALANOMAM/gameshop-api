@extends('layouts.app')

@section('content')



<!--oggetto che mi viene dal file "StatsController"-->
 {{--@dump($orders)--}}

<!--SEZIONE HTML DEL GRAFICO, OVVERO QUELLO CHE RENDE TUTTO VISIBILE START-->
<div class="container">
    <h1 class="text-center mb-4 mt-4">STATS PAGE</h1>

 <div class="col-12 mb-5 m-auto">
  <h2 class="fs-4 text-center">Amount of sales in euros per month</h2>
    <canvas id="myChart"></canvas>
</div>

</div>
<!--SEZIONE HTML DEL GRAFICO, OVVERO QUELLO CHE RENDE TUTTO VISIBILE END-->


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <!--<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>-->
   
 
 <script>

   //cambio l'oggetto degli ordini da php a js poi li leggo
   let orders_in_js_encoded = '<?php echo json_encode($orders); ?>';
   let orders_in_js_decoded = JSON.parse(orders_in_js_encoded);
   //console.log(orders_in_js_decoded);

   const ctx = document.getElementById('myChart');
   /* const Data = [
   { month: 'Gennaio', count: 10 },
   { month: 'Febbraio', count: 20 },
     { month: 'Marzo', count: 15 },
   { month: 'Aprile', count: 40 },
     { month: 'Maggio', count: 5 },
             ];*/

  //il mio array che conterrà le componenti x e y del mio grafico          
   const data = [];
   //salvo i possibili mesi dell'anno
   const month_names = ["", "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];


   //pusho le componenti x e y del mio grafico dentro l'array
for(let i=0; i< orders_in_js_decoded.length; i++){

     // associazione del mese in italiano e aggiunta dell'anno
     let month_name = month_names[orders_in_js_decoded[i].month];
     // Aggiunta dell'anno
     let year = orders_in_js_decoded[i].year; 

     // Combinazione del mese e dell'anno
     data.push({ month: month_name + ' ' + year, cash_in: orders_in_js_decoded[i].total_sales }); 
   } 
   

           
   new Chart(ctx, {
       type: 'bar',
       data: {
         //dato nell'asse delle x 
         // labels:['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'] ,
         labels: data.map(row => row.month) ,
         datasets: [{
         //nome tabella    
         label: 'Monthly sales statistics' ,
         
         
         //dato nell'asse delle y 
         //data: [65, 59, 80, 81, 56, 55, 40, 100],
        data: data.map(row => row.cash_in),
        backgroundColor: 'rgba(249, 170, 1, 1)',  // Colore delle barre

         //riempie o no la parte sotto la linea del grafico
         fill: true,
         // Aggiunta  per colore di background
         borderColor: 'rgb(75, 192, 192)',
           tension: 0.1
         }]
       },
       options: {
         scales: {
           y: {
             beginAtZero: true,
             // Aggiunta MARIO per simbolo Euro asse y
             ticks: {
               callback: function(value, index, values) {
                 return value + ' €';
               }
             }
           }
         }
       }
     }); 

 </script>



    
@endsection