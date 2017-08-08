<!-- Bootstrap 3.3.6 -->
<script src="<?=SERVER?>/bootstrap/js/bootstrap.min.js"></script> 
<!-- SlimScroll -->
<!--<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
<!-- FastClick -->
<!--<script src="../plugins/fastclick/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="<?=SERVER?>/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../dist/js/demo.js"></script>-->
<script language="javascript" type='text/javascript'>
    function session(){
        window.location="index.php?p=Utilisateur/deconnexion"; //page de déconnexion
    }
    setTimeout("session()",600000); //ça fait bien 5min??? c'est pour le test
</script>