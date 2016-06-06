<!DOCTYPE html>
<html>
<head>
    <title>LsW Mitglieder - Übersicht</title>
    <!-- my own stylesheet -->
    <link rel="stylesheet" href="stylesheet.css">
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- MDL -->
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
    <!-- for different devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="mdl-color--grey-100 mdl-color-text--grey-700">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--seamed mdl-color--primary">
        <div class="mdl-layout__header-row"><h3>LsW - Team</h3></div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            <h4>Eine kleine Übersicht des gesamten Teams von lsw.io</h4>
        </div>
        <br>
    </header>
    <main class="mdl-layout__content mdl-base">
        <?php include 'showMember.php'; ?>
    </main>
</div>
</body>
</html>

