$(document).ready(function () {
    var toursURL = "http://localhost/ekasamen/explore_california_api.php/tours";

    $.get(toursURL, function (data) {
        //parse data from JSON
        var toursArray = JSON.parse(data);
        //check array længde for at se om hele ordre tabellen findes efter json er parset
        var count = toursArray.length;
        console.log(count);

        var toursTable= "<table id='toursTable'><tr><th>tourId</th>";
        toursTable+= "<th>packageId</th>";
        toursTable+= "<th>tourName</th>";
        toursTable+= "<th>blurb</th>";
        toursTable+= "<th>description</th>";
        toursTable+= "<th>price</th>";
        toursTable+= "<th>difficulty</th>";
        toursTable+= "<th>region</th>";
        toursTable+= "<th>keywords</th></tr>";

        for(var i = 0; i < toursArray.length; i++){
            toursTable+="<tr><td>"+ toursArray[i].tourId + "</td>";
            toursTable+="<td>" + toursArray[i].packageId + "</td>";
            toursTable+="<td>" + toursArray[i].tourName + "</td>";
            toursTable+="<td>" + toursArray[i].blurb + "</td>";
            toursTable+="<td>" + toursArray[i].description + "</td>";
            toursTable+="<td>" + toursArray[i].price + "</td>";
            toursTable+="<td>" + toursArray[i].difficulty + "</td>";
            toursTable+="<td>" + toursArray[i].region + "</td>";
            toursTable+="<td>" + toursArray[i].keywords + "</td></tr>";
        }

        toursTable+= "</table>";

        //$("orders").html = toursTable;
        document.getElementById("tours").innerHTML = toursTable;

    });
});