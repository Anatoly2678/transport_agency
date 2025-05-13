<style>
    label.error {
        color: red !important;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/cupertino/jquery-ui.css" rel="stylesheet"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.css">

    <title>
        <?php if (isset($title)) {
            echo $title;
        }
        ; ?>
    </title>
</head>

<style>
    /* html, body {
        background-color: #EEEAF3;
        background-image: url(https://aeroporttransfer.ru/wp-content/uploads/2025/04/back_header.jpg);
        background-position: top center;
        background-repeat: no-repeat;
        background-size: cover;
    } */
    body::after {
        background-image: url(https://aeroporttransfer.ru/wp-content/uploads/2025/04/back_header.jpg);
        background-position: top center;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.1;
        z-index: -1;
        content: "";
        width: auto;
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

    input, textarea,select, .accordion-item {
        background-color: #9e90c161 !important;
    }

    .bootstrap-table .fixed-table-container .table td,
    .bootstrap-table .fixed-table-container .table th {
        background-color : #9e90c161 !important;
    }
</style>