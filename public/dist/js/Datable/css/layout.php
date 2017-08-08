<!DOCTYPE html>
<html lang="fr">
	<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="LONAB Burkina - PMU Info">
            <meta name="author" content="AvePLUS">
            <title>LONAB - Accueil pmu info</title>
            <link href="../style/style.css" rel="stylesheet" type="text/css" />
            <link rel="shortcut icon" type="image/ico" href="../images/ico.png">
            <script type="text/javascript" src="../scripts/fonction.js"></script>
	</head>
	<body>
        <div align="center">
        <div id="body" align="center">
            <div id="entete">
                <?php
                    include('header.php');
                ?>
            </div>
            <div id="contenu">
                    <div id="contenu-top">
                            <table align="left" cellspacing="2" width="100%">
                                    <tr> 
                                            <td width="8%">
                    <input id="1" class="boutonMenuClic" name="BtnAccueil" type="button"  value="Accueil" onclick="ongletClic(this);"/>
                </td> 
                                            <input id="menuSelect" name="tmpSelect" type="hidden"  value="1" />
                                            <?php /*if($_SESSION['idMedia']=="9") {*/ ?>
                                                    <td width="10%">
                                                            <input id="2" class="boutonMenu" name="BtnParametre" type="button"  value="Paramètres" onclick="ongletClic(this);"/> 
                                                    </td>
                                            <?php /*}*/ ?>
                <td style="float:right; font-weight:bold; color:<?=$_SESSION['couleur']?>"><?=$_SESSION['description']?>&nbsp;</td>
            </tr>
                            </table>					
                    </div>
                    <div id="contenu-bottom">
                            <iframe id="if" src="menu-principal.php" style="border:hidden; width:100%; height:100%;"></iframe>
                    </div>
            </div>
            <div id="pied">
                    Copyright 2016 AvePlus. Tous droits r&eacute;serv&eacute;s<br/>
                    Respect de la vie priv&eacute;e et Mentions l&eacute;gales.<br/> 
                    Designed by www.aveplus.net.
            </div>
        </div>
        </div>
	</body>
</html>