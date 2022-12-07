let websiteURL = "http://127.0.0.1:8000/";

$(document).on("click", "#search", function () {
    let trackingNumber = $("#trackingNumber").val();
    $("#result_tracking").empty();
    
    $.ajax({
        url: `${websiteURL}api/tracking`,
        type: "POST",
        data: {
            trackingNumber: trackingNumber,
        },
        beforeSend: function () {
            $("#image-loading").show();
        },
        success: function (response) {
            
            let html = "";
            let no = 1;

            for (let index = 0; index < response.data.length; index++) {
                html += `<tr>
                    <td>${no}</td>
                    <td>${response.data[index].track_number}</td>
                    <td>${ response.data[index].dataShipment == null ? 'Cannot find ticket information' : response.data[index].dataShipment.status }</td>
                    <td>${ response.data[index].dataShipment == null ? '-' : response.data[index].dataShipment.dilivered.date + ' : ' + response.data[index].dataShipment.dilivered.time }</td>
                    <td>${ response.data[index].dataShipment == null ? '-' : response.data[index].dataShipment.shipmentTo.city + ', ' + response.data[index].dataShipment.shipmentTo.state + ', ' + response.data[index].dataShipment.shipmentTo.country }</td>
                    <td>${ response.data[index].dataShipment == null ? '-' : response.data[index].dataShipment.service }</td>
                </tr>`

                no++;
            }

            $("#image-loading").hide();
            $("#result_tracking").html(html);

        },
        error: function (response) {
            $("#image-loading").hide();
            alert(response.responseJSON.message);
        },
    });
});
