<div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baptismal Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .certificate-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid black;
        }
        .certificate-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 20px;
        }
        .form-group {
            margin: 10px 0;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
            outline: none;
            font-size: 16px;
        }
        .print-only {
            display: none;
        }
        .witness-section {
            margin-top: 20px;
            text-align: center;
        }
        .witness-section p {
            margin: 5px 0;
        }
        .signature-section {
            margin-top: 20px;
            text-align: center;
        }
        .signature-section p {
            margin: 5px 0;
        }
        @media print {
    body * {
        visibility: hidden;
    }
    .certificate-container, .certificate-container * {
        visibility: visible;
    }
    .certificate-container {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        border: none;
        padding: 10px;
        font-size: 14px;
    }
    .no-print {
        display: none;
    }
    .form-group input {
        display: none; /* Hides input fields during printing */
    }
    .print-only {
        display: block;
        font-size: 14px;
        font-weight: normal;
    }
    .form-group label {
        font-weight: bold;
    }
    .witness-section, .signature-section {
        display: block;
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-title">Baptismal Certificate</div>
        <form id="baptismalForm">
            <div class="grid-container">
                <div class="grid-item">
                    <div class="form-group">
                        <label for="dateOfBaptism">Date of Baptism:</label>
                        <input type="date" id="dateOfBaptism">
                        <div class="print-only" id="printDateOfBaptism"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="nameOfChild">Name of Child:</label>
                        <input type="text" id="nameOfChild">
                        <div class="print-only" id="printNameOfChild"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="dateOfBirth">Date of Birth:</label>
                        <input type="date" id="dateOfBirth">
                        <div class="print-only" id="printDateOfBirth"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="placeOfBirth">Place of Birth:</label>
                        <input type="text" id="placeOfBirth">
                        <div class="print-only" id="printPlaceOfBirth"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="legitimacy">Legitimacy:</label>
                        <input type="text" id="legitimacy">
                        <div class="print-only" id="printLegitimacy"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="nameOfFather">Name of Father:</label>
                        <input type="text" id="nameOfFather">
                        <div class="print-only" id="printNameOfFather"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="nameOfMother">Name of Mother:</label>
                        <input type="text" id="nameOfMother">
                        <div class="print-only" id="printNameOfMother"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="residence">Residence:</label>
                        <input type="text" id="residence">
                        <div class="print-only" id="printResidence"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="paternalGrandparents">Paternal Grandparents:</label>
                        <input type="text" id="paternalGrandparents">
                        <div class="print-only" id="printPaternalGrandparents"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="maternalGrandparents">Maternal Grandparents:</label>
                        <input type="text" id="maternalGrandparents">
                        <div class="print-only" id="printMaternalGrandparents"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="sponsors">Sponsors:</label>
                        <input type="text" id="sponsors">
                        <div class="print-only" id="printSponsors"></div>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="form-group">
                        <label for="officiatingPriest">Officiating Priest:</label>
                        <input type="text" id="officiatingPriest">
                        <div class="print-only" id="printOfficiatingPriest"></div>
                    </div>
                </div>
            </div>
            <div class="no-print" style="text-align: center; margin-top: 20px;">
                <button type="button" onclick="preparePrint()">Print Certificate</button>
            </div>
        </form>

        <!-- Witness and Signature Section -->
        <div class="witness-section print-only">
            <p>IN WITNESS WHEREOF, I hereby sign this Certificate of Baptism</p>
            <p>this day of July 10, 2024 at Ramos, Tarlac.</p>
        </div>
        <div class="signature-section print-only">
            <p>BOOK # 07</p>
            <p>PAGE # 309</p>
            <p style="margin-top: 30px;">REV. FR. RAYMUNDO N. TEJERO</p>
            <p>Parish Priest</p>
        </div>
    </div>

    <script>
        function preparePrint() {
            // Transfer input values to print-only divs
            document.getElementById('printDateOfBaptism').innerText = document.getElementById('dateOfBaptism').value;
            document.getElementById('printNameOfChild').innerText = document.getElementById('nameOfChild').value;
            document.getElementById('printDateOfBirth').innerText = document.getElementById('dateOfBirth').value;
            document.getElementById('printPlaceOfBirth').innerText = document.getElementById('placeOfBirth').value;
            document.getElementById('printLegitimacy').innerText = document.getElementById('legitimacy').value;
            document.getElementById('printNameOfFather').innerText = document.getElementById('nameOfFather').value;
            document.getElementById('printNameOfMother').innerText = document.getElementById('nameOfMother').value;
            document.getElementById('printResidence').innerText = document.getElementById('residence').value;
            document.getElementById('printPaternalGrandparents').innerText = document.getElementById('paternalGrandparents').value;
            document.getElementById('printMaternalGrandparents').innerText = document.getElementById('maternalGrandparents').value;
            document.getElementById('printSponsors').innerText = document.getElementById('sponsors').value;
            document.getElementById('printOfficiatingPriest').innerText = document.getElementById('officiatingPriest').value;


            window.print();
        }
    </script>
</body>
</html>
</div>
