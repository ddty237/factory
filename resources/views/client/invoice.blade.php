<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #fff;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3 style="text-align: center">RÉPUBLIQUE DU CAMEROUN</h3>
                <pre style="text-align: center">
                    Paix - Travail - Patrie
                    ---------------
                    AGENCE DE REGULATION
                    DES TELECOMMUNICATIONS
                    ---------------
                    DIRECTION DU RECOUVREMENT
                    ---------------

                    <br />
                </pre>

            </td>
            <td align="center">
                <img src="../public/ARTLogo_0.jpg" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3 style="text-align: center">REPUBLIC OF CAMEROON</h3>
                <pre style="text-align:center">

                    Peace - Work -Fatherland
                    ---------------
                    TELECOMMUNICATIONS
                    REGULATORY BOARD
                    ---------------
                    RECOVERY DEPARTMENT
                    -----------------
                </pre>
            </td>
        </tr>

    </table>
</div>

<br/>

<div class="invoice">
    <h3 style="text-align: center">{{$client->designation}}</h3>
    <div style="padding-left: 8px">
        <div align="left">
            <div>Designation :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->designation}}</span>
        </div>
        <div align="left">
            <div>Delegation :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->ville->delegation->name}}</span>
        </div>
        <div align="left">
            <div>Categorie :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->categorie->name}}</span>
        </div>
        <div align="left">
            <div>Ville :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->ville->name}}</span>
        </div>
        <div align="left">
            <div>Code Postal :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->code_postal}}</span>
        </div>
        <div align="left">
            <div>Addresse :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->adresse}}</span>
        </div>
        <div align="left">
            <div>Téléphone :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->phone}}</span>
        </div>
        <div align="left">
            <div>Téléphone 2 :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->secondary_phone}}</span>
        </div>
        <div align="left">
            <div>Site web :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->website}}</span>
        </div>
        <div align="left">
            <div>Reference du titre :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->reference_titre}}</span>
        </div>
        <div align="left">
            <div>Email :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->email}}</span>
        </div>
        <div align="left">
            <div>Compte auxilliaire :
            <span style="color: rgba(55, 65, 81, 1);">{{$client->compte_auxilliaire}}</span>
        </div>
    </div>

</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="center" style="width: 50%;">
                &copy; - {{ date('Y') }} - ART - All rights reserved.
            </td>
        </tr>

    </table>
</div>
</body>
</html>
