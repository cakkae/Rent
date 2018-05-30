<table>
    <tr>
        <th>Naziv</th>
        <th>Brend</th>
        <th>Cijena</th>
        <th>Gorivo</th>
        <th>Godište</th>
        <th>Broj sjedi[ta</th>
        <th>Slika</th>
    </tr>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $.getJSON("podaci.php", function(data))
    {
        var items = [];
        $.each(data, function(key, val){
            items.push("<tr>");
            items.push("<td id=''"+key+">"+val.id+"</td>");
             items.push("<td id=''"+key+">"+val.VehiclesTitle+"</td>");
              items.push("<td id=''"+key+">"+val.VehiclesBrand+"</td>");
               items.push("<td id=''"+key+">"+val.PricePerDay+"</td>");
                items.push("<td id=''"+key+">"+val.FuelType+"</td>");
                 items.push("<td id=''"+key+">"+val.ModelYear+"</td>");
                  items.push("<td id=''"+key+">"+val.SeatingCapacity+"</td>");
                   items.push("<td id=''"+key+">"+val.Vimage1+"</td>");
            items.push("</tr>");
        });
        $("<tbody/>", {html: items.join("")}).appendTo("table");
    });
</script>