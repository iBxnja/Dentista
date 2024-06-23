document.addEventListener('DOMContentLoaded', function () {
  
    console.log('¡DOM cargado correctamente para trabajar!.');
    
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: "es",
        initialView: 'dayGridMonth',
        events: function (fetchInfo, successCallback, failureCallback) {
            // Obtén la lista actualizada de citas desde el servidor
            $.ajax({
                url: '/inicio/cita-listar/events', // Ajusta la ruta según tu aplicación
                type: 'GET',
                success: function (data) {
                    console.log('Respuesta del servidor:', data);
                    // Éxito: Transforma los datos y llámalo con successCallback
                    var eventosTransformados = data.map(function (cita) {
                        return {
                            title: cita.titulo,
                            start: cita.fecha
                        };
                    });
    
                    successCallback(eventosTransformados);
                },
                error: function (error) {
                    console.error('Error al obtener las citas:', error);
                    failureCallback();
                }
            });
        },
        // ... Otras configuraciones del calendario
    });
    
    calendar.render();


   




    console.log('-------------------------------------------------------');
    function crearCita() {
        // Obtén los datos del formulario
        var nombre = document.querySelector('input[name="nombre"]').value;
        var fecha = document.querySelector('input[name="fecha"]').value;
    
        // Obtén el token CSRF
        var csrfToken = document.querySelector('input[name="_token"]').value;
    
        // Envia los datos al servidor utilizando AJAX
        $.ajax({
            url: '/inicio/cita-listar/crear',
            type: 'POST',
            data: {
                _token: csrfToken,
                nombre: nombre,
                fecha: fecha
            },
            success: function (data) {
                // Éxito: Actualiza el calendario con la nueva cita
                actualizarCalendario(data);
            },
            error: function (error) {
                console.error('Error al crear la cita:', error);
                alert('Error al crear la cita. Consulta la consola para más detalles.');
            }
        });
    }


    function actualizarCalendario(nuevaCita) {
        console.log('Llamada a actualizarCalendario');
    
        var calendarEl = document.getElementById('calendar');
    
        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl);
            calendar.addEvent({
                title: nuevaCita.title,
                start: nuevaCita.start
            });
    
            // Refleja visualmente la nueva cita en el calendario
            calendar.render();
    
            alert('Cita agendada correctamente');
    
            // Limpia el formulario
            document.querySelector('input[name="nombre"]').value = '';
            document.querySelector('input[name="fecha"]').value = '';
        } else {
            console.error('Elemento del calendario no encontrado.');
        }
    }





















    
// -----------------------------------------------------------------------------------------------


});