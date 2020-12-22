
<?=$render('headerCalendar', [
    'loggedUser'=>$loggedUser,
    'events' => $events
    ]);?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      locale: 'pt-br',
      //   initialDate: '2020-09-12',//comentar para pegar a data atual
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events:<?php echo json_encode($events)?>,
      eventClick: function(info) {
        info.jsEvent.preventDefault();
        $('#visualizaTudo #id').text(info.event.id);
        $('#visualizaTudo #title').text(info.event.title);
        $('#visualizaTudo #start').text(info.event.start.toLocaleString());
        $('#visualizaTudo #hour').text(info.event.extendedProps.hour.toLocaleString());
        $('#visualizaTudo #name_user').text(info.event.extendedProps.name_user);
        $('#visualizaTudo #name').text(info.event.extendedProps.name);
        $('#visualizaTudo #email').text(info.event.extendedProps.email);
        $('#visualizaTudo #address').text(info.event.extendedProps.address);
        $('#visualizaTudo #phone').text(info.event.extendedProps.phone);
        $('#visualizaTudo #cost').text(info.event.extendedProps.cost);
        $('#visualizaTudo').modal('show')
      },
    });
    calendar.render();
  });
  
  

</script>
</head>
<body class="container-fluid">
  
  <div id='calendar' class="m-auto pt-5"></div>
  <!-- Modal -->
  <div class="modal fade" id="visualizaTudo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">informações adicionada pelo consultor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <dl class="row">
            <dt class="col-sm-3">Numero do enveto</dt>
            <dd class="col-sm-9" id="id" ></dd>
          </dl>
          <dl class="row">
            <dd class="col-sm-9" id="title" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Data Marcada</dt>
            <dd class="col-sm-9" id="start" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Hora Marcada</dt>
            <dd class="col-sm-9" id="hour" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Nome do Cliente</dt>
            <dd class="col-sm-9" id="name"></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Email do Cliente</dt>
            <dd class="col-sm-9" id="email" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Consultor</dt>
            <dd class="col-sm-9" id="name_user" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Endereço da Visita</dt>
            <dd class="col-sm-9" id="address" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Telefone do cliente</dt>
            <dd class="col-sm-9" id="phone" ></dd>
          </dl>
          <dl class="row">
            <dt class="col-sm-3">Custo</dt>
            <dd class="col-sm-9" id="cost" ></dd>
          </dl>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?=$render('footer');?>