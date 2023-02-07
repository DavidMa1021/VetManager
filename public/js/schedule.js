


document.addEventListener('DOMContentLoaded', function() {
    let form = document.querySelector('form');

    var calendarEl = document.getElementById('schedule');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      headerToolbar:{
        left:'prev,next today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,listWeek'
      },

      events: 'http://localhost:8000/appointments/show',

      dateClick: function(info){
        form.reset();
        form.start_date.value = info.dateStr;
        form.end_date.value = info.dateStr;
        $('#appointment').modal('show');
      },
      eventClick:function(info){
        var appointment = info.event;
        console.log(appointment.id);
      }
    });
    calendar.render();

    document.getElementById('btn-save').addEventListener('click', function(){
        const data = new FormData(form);
        console.log(data);

    //     axios.post('http://localhost:8000/appointments', data).
    //     then(
    //         (res) =>{
    //             $('#appointment').modal('hide');
    //         }
    //     ).catch(
    //         err =>{
    //            if(err.response){
    //             console.log(err.response.data);
    //            } 
    //         }
    //     )

    });
});