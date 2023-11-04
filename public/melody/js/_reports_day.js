    // window.onload= function(){
        var fecha= new Date(); //fecha actual
        var mes= fecha.getMonth()+1;  //mes
        var dia= fecha.getDate(); //dia
        var anio= fecha.getFullYear(); //año
        
        if(dia<10)
         dia='0'+dia; 
        if(mes<10)
         mes='0'+mes; 
        
        document.getElementById('fecha_dia').value=anio+"-"+mes+"-"+dia;
    // }