// Get Ajax
$(document).ready(function(){
    var url = window.location.origin;
    $.ajax({
        url: url+'/admin/lineUsers',
        type: 'GET',
    })
    .done(function(data) {
        new Chart(document.getElementById("lineUsers"), {
          type: 'line',
          data: {
            labels: data.monthsPassed,
            datasets: [
                { 
                    data: data.countUsersMonth,
                    label: "Registro de Usuarios",
                    borderColor: "rgba(54, 162, 235, 1)",
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    fill: true,
                    borderWidth: 1.6
                },
                { 
                    data: data.countRecordsMonth,
                    label: "Encriptaciones",
                    borderColor: "rgba(255,99,132,1)",
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    fill: true,
                    borderWidth: 1.6
                }
            ]
          },
            options: {
                title: {
                    display: true,
                    text: 'Seguimiento de usuarios registrados'
                }
            }
        });
        new Chart(document.getElementById("pieUsers"), {
            type: 'pie',
            data: {
                labels: ["Registrados", "No registrados"],
                datasets: [{
                    data: data.recordsComprare,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255,99,132,1)',  
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Comparativa de textos Encriptados'
                }
            }
        });
    })
    .fail(function() {
        console.log("error");
    });
    
});