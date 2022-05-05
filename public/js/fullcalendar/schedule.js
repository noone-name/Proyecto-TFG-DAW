document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('schedule');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",

      headerToolbar:{
        left: 'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,listWeek'
      },

      dateClick:function(dataForm) {
        $('#FullCalendarEvent').modal('show')
      }


    });
    calendar.render();
  });
