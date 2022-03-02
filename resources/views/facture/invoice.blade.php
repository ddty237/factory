<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ public_path('vendor/invoices/bootstrap.min.css') }}">


    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div class="row">

            <div class="text-right">
                {{$donnees[0]['reference_contrat']}}
                <br>
                <div style="margin-bottom: 0px">&nbsp;</div>
            </div>
            <div class="col-xs-7">
                <strong>{{$donnees[0]['delegation']}}</strong><br>
                <div style="margin-bottom: 0px">&nbsp;</div>
                <div style="margin-bottom: 0px">&nbsp;</div>
                <strong>{{$facture->numero_facture.'bis'}}</strong><br>
                <strong>{{$donnees[0]['created_at']}}</strong><br>
                {{$facture->periode}} <br>
                Imputation budgétaire : {{$donnees[0]['imputation_budgetaire']}} <br>
                Compte collectif : {{$donnees[0]['compte_collectif']}} <br>
                Compte auxilliaire : {{$donnees[0]['compte_auxilliaire']}} <br>
            </div>
        </div>

        <div class="text-right">
            <div class="col-xs-7">
                <strong>{{$donnees[0]['client']}}</strong><br>
                <strong>{{$donnees[0]['code_postal']}}</strong><br>
                <strong>{{$donnees[0]['ville']}}</strong><br>
                Tél : {{$donnees[0]['telephone']}}
                @if ($donnees[0]['telephone2'])
                    / {{$donnees[0]['telephone2']}}
                @endif <br>
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-5">
                <div class="text-center">{{$donnees[0]['product_description']}}</div>
                <div style="margin-bottom: 0px">&nbsp;</div>
            </div>
        </div>


        <table style="width:100%">
            <tr>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <td>
                  <p><strong>{{$donnees[0]['product_name']}}</strong></p><br>
              </td>
              <td>
                  @if ($donnees[0]['observations']->isEmpty())
                      <div class="d-flex justify-content-between">
                        <p style="padding-right: 20px" class="text-right">{{$donnees[0]['montant_total']}}</p>
                      </div>
                  @else
                    @for ($i = 0; $i < $donnees[0]['observations']->count('montant'); $i++)
                        <div class="d-flex justify-content-between">
                            <p class="text-left">{{$donnees[0]['observations'][$i]['subproduct_name']}} {{$donnees[0]['observations'][$i]['format']}} ({{$donnees[0]['observations'][$i]['type']}}) </p>
                            <p class="text-right">{{$donnees[0]['observations'][$i]['quantite']}} * {{$donnees[0]['observations'][$i]['montant']}}</p>
                        </div><br>
                    @endfor
                  @endif
              </td>
            </tr>
          </table>
          <div style="margin-bottom: 0px">&nbsp;</div>
          <p style="padding: 0 210px">Montant hors taxes  &nbsp;&nbsp;&nbsp;&nbsp;  {{$donnees[0]['montant_total']}}</p>
          <p style="padding: 0 210px">Net à payer  &nbsp;&nbsp;&nbsp;&nbsp;  {{$donnees[0]['montant_total']}} Fcfa</p>

            <div style="margin-bottom: 0px">&nbsp;</div>
          <p class="padding: 0 20px">Arrêté la présente facture à la somme de : {{$montant_chiffre}} Fcfa </p>
        </div>
        <div class="page-break"></div>


        <div>
            <div class="row">

                <div class="text-right">
                    {{$donnees[0]['reference_contrat']}}
                    <br>
                    <div style="margin-bottom: 0px">&nbsp;</div>
                </div>
                <div class="col-xs-7">
                    <strong>{{$donnees[0]['delegation']}}</strong><br>
                    <div style="margin-bottom: 0px">&nbsp;</div>
                    <div style="margin-bottom: 0px">&nbsp;</div>
                    <strong>{{$facture->numero_facture}}</strong><br>
                    <strong>{{$donnees[0]['created_at']}}</strong><br>
                    {{$facture->periode}} <br>
                    Imputation budgétaire : {{$donnees[0]['imputation_budgetaire']}} <br>
                    Compte collectif : {{$donnees[0]['compte_collectif']}} <br>
                    Compte auxilliaire : {{$donnees[0]['compte_auxilliaire']}} <br>
                </div>
            </div>

            <div class="text-right">
                <div class="col-xs-7">
                    <strong>{{$donnees[0]['client']}}</strong><br>
                    <strong>{{$donnees[0]['code_postal']}}</strong><br>
                    <strong>{{$donnees[0]['ville']}}</strong><br>
                    Tél : {{$donnees[0]['telephone']}}
                    @if ($donnees[0]['telephone2'])
                        / {{$donnees[0]['telephone2']}}
                    @endif <br>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-5">
                    <div class="text-center">{{$donnees[0]['frais'][0]['frais_description']}}</div>
                    <div style="margin-bottom: 0px">&nbsp;</div>
                </div>
            </div>


            <table style="width:100%">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td>
                      <p><strong>{{$donnees[0]['frais'][0]['frais_name']}}</strong></p><br>
                  </td>
                  <td>
                  </td>
                </tr>
              </table>
              <div style="margin-bottom: 0px">&nbsp;</div>
              <p style="padding: 0 210px">Montant hors taxes  &nbsp;&nbsp;&nbsp;&nbsp;  {{$donnees[0]['frais'][0]['frais_montant']}}</p>
              <p style="padding: 0 210px">Net à payer  &nbsp;&nbsp;&nbsp;&nbsp;  {{$donnees[0]['frais'][0]['frais_montant']}} Fcfa</p>

                <div style="margin-bottom: 0px">&nbsp;</div>
              <p class="padding: 0 20px">Arrêté la présente facture à la somme de : {{$frais_chiffre}} Fcfa </p>
            </div>
    </body>
    </html>
