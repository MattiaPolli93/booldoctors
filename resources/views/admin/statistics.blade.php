@extends('layouts.app')

@section('title')
    BoolDoctors - Statistics
@endsection

@section('content')
<div class="my_container">
  <h1 class="stat_title">Le tue statistiche</h1>
  <canvas id="myChart" width="100" height="100"></canvas>
  <p class="link_dashboard"><a href="{{ route('admin.profile.index') }}">Torna alla Dashboard</a></p>
  
</div>


<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
<script>dayjs().format()</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var ctx = document.getElementById('myChart');
var commenti = {!! $comments->toJson() !!};
var messaggi = {!! $messages->toJson() !!};
// console.log(commenti.length);
const primaDataCommento = commenti[0].added_on;
let date1 = dayjs(primaDataCommento);

const primaDataMessaggio = messaggi[0].added_on;
const date2 = dayjs(primaDataMessaggio);
if (date2 < date1) {
  date1 = date2;
}

var now = dayjs();

var diff = now.diff(date1, 'month');

var months = [];
var recensioniMese = [];
var messaggiMese = [];

var x = 1;
let i = 0;
if (date1.$M == 0) {
  diff++;
  i++;
  x--;
}
for (i; i <= diff; i++) {
  var numeroMese = date1.$M + i + x;
  months.push(numeroMese + '/2021');

  var countRec = 0;
  var countMes = 0;
  for (let j = 0; j < commenti.length; j++) {

    if (numeroMese == dayjs(commenti[j].added_on).$M + 1) {
      countRec++;
    }
  }
  for (let j = 0; j < messaggi.length; j++) {
    if (numeroMese == dayjs(messaggi[j].added_on).$M + 1) {
      countMes++;
   }
  }
  recensioniMese.push(countRec);
  messaggiMese.push(countMes);
}


var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [
          {
            label: 'Numero di recensioni',
            data: recensioniMese,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        },
        {
            label: 'Numero di messaggi ricevuti',
            data: messaggiMese,
            backgroundColor: [
                'blue',
            ],
            borderColor: [
                'blue',
            ],
            borderWidth: 1
        },
      ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                stepSize: 1
              }
            }
        }
    }
});
</script>


@endsection
