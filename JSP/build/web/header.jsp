<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <title>Page d'accueil</title>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/jsp/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div id="titre">
                        <a href="index.jsp"><h1>Gestion de la mobilité des étudiants</h1></a>
                    </div>
                    <div class="container">
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li><form action="AccueilController" method="post">
                                    <input type="hidden" name="action" value="mobilite">
                                    <input type="submit" value="Demandes mobilités">
                                </form></li>
                                <li><form action="AccueilController" method="post">
                                    <input type="hidden" name="action" value="financier">
                                    <input type="submit" value="Demandes financières">
                                </form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">