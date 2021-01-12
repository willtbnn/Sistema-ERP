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
        $('#visualizaTudo #address_neigh').text(info.event.extendedProps.address_neigh);
        $('#visualizaTudo #address_city').text(info.event.extendedProps.address_city);
        $('#visualizaTudo #address_state').text(info.event.extendedProps.address_state);
        $('#visualizaTudo #address_zipcode').text(info.event.extendedProps.address_zipcode);
        $('#visualizaTudo #address_number').text(info.event.extendedProps.address_number);
        $('#visualizaTudo #address2').text(info.event.extendedProps.address2);
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title m-auto" id="staticBackdropLabel">Informações adicionadas pelo consultor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
        <div class="row">
              <h5 class="col-sm-12 text-center" id="title" style="color:<?php echo $events[0]['color'];?>;"></h5>
            </div>
          <div class="row justify-content-center">
            <p class="col-md-4 pt-3"><b> Id do agendamento</b>
              <i id="id" ></i>
            </p>
            <p class="col-md-4 pt-3"><b>Consultor</b>
            <i id="name_user" ></i>
            </p>
          </div>
          <div class="row justify-content-center">
            <p class="col-sm-4 pt-3"><b>Data Marcada: </b>
              <i id="start" ></i>
            </p>
            <p class="col-md-4 pt-3"><b>Hora Marcada: </b>
              <i id="hour" ></i>
            </p>
          </div>
          <div class="row justify-content-center">
            <p class="col-sm-4 pt-3"><b>Nome do Cliente: </b>
              <i  id="name"></i>
            </p>
            <p class="col-sm-4 pt-3"><b>Email do Cliente: </b>
              <i  id="email" ></i>
            </p>
            <p class="col-sm-4 pt-3"><b>Telefone do cliente: </b>
            <i  id="phone" ></i></p>
          </div>
          <div class="row justify-content-center">
            <p class="col-sm-4 pt-3"><b>CEP: </b>
              <i  id="address_zipcode" ></i>
            </p>
            <p class="col-sm-4 pt-3"><b>Endereço: </b>
              <i  id="address" ></i>
            </p>
            <p class="col-sm-4 pt-3"><b>Nº: </b>
              <i  id="address_number" ></i>
            </p>
            <p class="col-sm-4 pt-3"><b>Bairro: </b>
              <i  id="address_neigh" ></i>
            </p>
            <p class="col-sm-4 pt-3"><b>Cidade: </b>
              <i  id="address_city" ></i>
            </p>
            <p class="col-sm-4 pt-3"><b>UF: </b>
              <i  id="address_state" ></i>
            </p>
          </div>
          <div class="row justify-content-center">
            <p class="col-sm-6 text-center"><b>Complemento: </b>
              <i  id="address2" ></i>
            </p>
            <p class="col-sm-6 text-success"><b>Custo: </b>
            R$ <i  id="cost" ></i></p>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
        </div>
      </div>
    </div>
  </div>
  <?=$render('footer');?>