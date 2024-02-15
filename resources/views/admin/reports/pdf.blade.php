<!DOCTYPE html>
<html>
<head>
    <title>Invoice - {{ $data['invoice_number'] }}</title>
    <style>
        /* Add your CSS styles for the PDF here */
    </style>
</head>
<body>
    <h1>Invoice #{{ $data['invoice_number'] }}</h1>
    <p>Customer: {{ $data['customer_name'] }}</p>
    </body>
</html>
