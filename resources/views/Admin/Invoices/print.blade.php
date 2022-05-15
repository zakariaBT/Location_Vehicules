
<!-- Main content -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>&nbsp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="{{asset('css/print.css')}}" rel="stylesheet" />

</head>
<body>
<body onload="window.print();">
    <div id="container">
      <section id="memo">
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" style="object-fit: contain;" width="50" />
        </div>

        <div class="company-info">
          <div>AGENCE DE LOCATION</div>

          <br />

          <span>FES</span>
          <span>30000</span>

          <br />

          <span>06646455678654</span> <br />
          <span>agence.location@gmail.com</span>
        </div>

      </section>

      <section id="invoice-title-number">

        <span id="title">Facture</span>
        <span id="number">#{{$invoice->invoice_number}}</span>

      </section>

      <div class="clearfix"></div>

      <section id="client-info">
        <span>Pour:</span>
        <div>
          <span class="bold">{{$invoice->reservation->user->name}}</span>
        </div>

        <div>
          <span>{{$invoice->reservation->user->address}}</span>
        </div>

        <div>
          <span>{{$invoice->reservation->user->phone_number}}</span>
        </div>

        <div>
          <span>{{$invoice->reservation->user->email}}</span>
        </div>

      </section>

      <div class="clearfix"></div>

      <section id="items">

        <table cellpadding="0" cellspacing="0">

          <tr>
            <th>Vehicule</th>
            <th>Agence de départ</th>
            <th>Agence d'arrivée</th>
            <th>Nombre de jours</th>
            <th>Prix</th>
            <th>TVA </th>
            <th>Remise</th>
          </tr>

          <tr>
            <td>{{$invoice->reservation->vehicule->name}}</td>
            <td>{{$invoice->reservation->start_Agency->name}}</td>
            <td>{{$invoice->reservation->start_Agency->name}}</td>
            <td>{{$invoice->reservation->NumberOfDays()}}</td>
            <td>{{$invoice->price}}</td>
            <td>{{$invoice->TVA}}%</td>
            <td>{{$invoice->discount}}%</td>
          </tr>

        </table>

      </section>

      <section id="sums">

        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>MONTANT HT</th>
            <td class="bold">{{$invoice->price}}</td>
          </tr>

          <tr data-iterate="discount">
            <th>Remise %</th>
            <td>({{$invoice->discount}}%) <span class="bold">{{$invoice->price-($invoice->price*$invoice->discount/100)}}</span></td>
          </tr>

          <tr data-iterate="tax">
            <th>TVA %</th>
            <td>({{$invoice->TVA}}%) <span class="bold">{{$invoice->price-($invoice->price*$invoice->TVA/100)}}</span></td>
          </tr>


          <tr data-hide-on-quote="true">
            <th>TOTAL</th>
            <td>{{$invoice->price-($invoice->price*($invoice->TVA+$invoice->discount)/100)}}</td>
          </tr>

        </table>

        <div class="clearfix"></div>

      </section>

      <div class="clearfix"></div>


        <div id="invoice-info" class="bold">
          <span>Crée le:</span> <span>{{$invoice->created_at->format('d-m-Y')}}</span>
        </div>


      <section id="terms">

        <div class="notes">Veuillez envoyer votre paiement avant le {{$invoice->created_at->format('d-m-Y')}} </div>

        <br />

        <div class="payment-info">
          <div class="bold">Details du payement:</div>
          <div>&bull; ACC 123006705</div>
          <div>&bull; IBAN MA100000060345</div>
          <div>&bull; SWIFT BOA447</div>
        </div>

      </section>

      <div class="clearfix"></div>

      <div class="thank-you">Merci !</div>

      <div class="clearfix"></div>
    </div>
</body>
</html>
