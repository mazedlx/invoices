<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Rechnung {{ $invoice->number }}</title>
        <style type="text/css">
            * {
                font-family: Arial, sans-serif;
                font-size: 1em;
                color: #040404;
            }

            body {
                width: 700px;
            }

            .container {
                display: inline-block;
            }

            .header {
                font-size: 2em;
                padding-left: 0.5em;
                padding-top: 0.25em;
                padding-bottom: 0.25em;
            }

            .main {
                padding: 0.5em;
            }

            .address {
                padding-bottom: 0.5em;
            }

            div {
                /*line-height: 1.5em;*/
            }

            h1 {
                font-size: 1.25em;
                text-transform: uppercase;
            }

            .small {
                font-size: 0.5em;
                line-height: 1.5em
            }

            .footer {
                width: 100%;
                font-size: 0.75em;
            }

            table, tr, td, th {
                white-space: nowrap;
                width: 100%;
                border-collapse: collapse;
                padding: 0.45em;
            }

            th {
                text-align: left;
                background-color: #0099cc;
                color: #fff;
            }

            th:not(:last-child) {
                border-right: 1px dashed #fff;
            }
            td:not(:last-child) {
                border-right: 1px dashed #0099cc;
            }
            .is-text-right {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="header">
            mazedlx.net webproductions<br>
            <p class="small">DI(FH) Christian Leo-Pernold<br>
            Glockenblumengasse 36/6/2<br>
            1220 Wien<br>
            Österreich<br>
            +43 660 456 3193<br>
            christian@mazedlx.net</p>
        </div>
        <div class="container">
            <div class="main">
                <h1>Rechnung</h1>
                <div class="address">
                    {{ $invoice->company }}<br>
                    {{ $invoice->customer }}<br>
                    {{ $invoice->address }}<br>
                    {{ $invoice->zip }} {{ $invoice->city }}<br>
                    {{ $invoice->country }}
                </div>
                <br>
                Datum: {{ $invoice->date->format('d.m.Y') }}<br>
                Rechnungsnummer: {{ $invoice->number }}<br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Beschreibung</th>
                            <th>Menge (h)</th>
                            <th>&euro;/h</th>
                            <th>Kosten</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice->lines as $line)
                        <tr>
                            <td>{{ $line->task }}</td>
                            <td>{{ $line->timeInHours }}</td>
                            <td>{{ $line->rateInEuros }}</td>
                            <td class="is-text-right">&euro; {{ $line->amountInEuros }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="is-text-right">Gesamt</th>
                            <th class="is-text-right">&euro; {{ $invoice->amountInEuros }}</th>
                        </tr>
                    </tfoot>
                </table>
                Steuerbefreit – Kleinunternehmer gemäß &sect;6(1)27 UStG<br>
                Wir danken f&uuml;r Ihren Auftrag!<br>
                <br>
                Mit freundlichen Gr&uuml;&szlig;en<br>
                <br>
                DI(FH) Christian Leo-Pernold<br>
                <br>
                mazedlx.net webproductions<br>
                <p class="footer">Bitte &uuml;berweisen Sie den Betrag innerhalb von 14 Tagen auf folgendes Konto:<br>
                Inhaber: DI(FH) Christian Leo-Pernold<br>
                IBAN: AT30 1400 0018 1094 4907<br>
                BIC: BAWAATWW
                </p>
            </div>
        </div>
    </body>
</html>
