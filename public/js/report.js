const generateReport = document.getElementById('generateReport');
const type_repo = document.getElementById('type_repo');
const sensores = document.getElementById('sensores');
const report_sensor = document.getElementById('report_sensor');
const date_data_report = document.getElementById('date_data_report');
const info = document.getElementById('info');
const dates = document.getElementById('dates');

sensores.style.display = 'none'
dates.style.display = 'none'


type_repo.addEventListener('change', () =>     type_repo.value === 'gen' ? sensores.style.display = 'none' : sensores.style.display = 'block');

date_data_report.addEventListener('change', () => date_data_report.value === 'now' ? dates.style.display = 'none' : dates.style.display = 'block');

generateReport.addEventListener('click', function () {

    let device_id = document.getElementById('id').value;
    let dateStart = document.getElementById('dateStart').value;
    let dateEnd = document.getElementById('dateEnd').value;
    let body = {};
    if (type_repo.value === 'gen'){


        if (date_data_report.value === 'now'){//este mes
            body = JSON.stringify({
                info: info.value,
                date: 'now',
                type: 'gen',
                device_id: device_id,
            })
        }else{
            body = JSON.stringify({
                info: info.value,
                date: 'date_esp',
                dateStart: dateStart,
                dateEnd: dateEnd,
                type: 'gen',
                device_id: device_id,
            })
        }

    }else{//reporte por sensor en especifico


        if (date_data_report.value === 'now'){
            body = JSON.stringify({
                info: info.value,
                date: 'now',
                type: 'sen',
                device_id: device_id,
                sensor_id: report_sensor.value
            })
        }else{
            body = JSON.stringify({
                info: info.value,
                date: 'date_esp',
                dateStart: dateStart,
                dateEnd: dateEnd,
                type: 'gen',
                device_id: device_id,
                sensor_id: report_sensor.value
            })
        }


    }


    fetch(routeGenerateReport, {
        method: 'POST',
        body: body,
        headers: headers
    }).then((response) => response.json())
        .then(function (data) {
            console.log(data)
            if (data.status === 'success') {
                //location.href = '/home'
            } else {
               //location.reload();
            }
        });


});
