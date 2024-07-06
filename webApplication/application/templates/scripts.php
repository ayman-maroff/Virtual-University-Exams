<?php 
// echo $_SESSION['alert_text'];
// echo $_SESSION['alert_code'];
// echo $_SESSION['ref'];

echo $_SESSION['alert_code'];
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> swal({
    text: "<?php echo $_SESSION['alert_text']; ?>",
    icon: '<?php echo $_SESSION['alert_code']; ?>'
}).then(function() {
    window.location = "<?php echo URL ?><?php echo $_SESSION['ref']?>";
});

</script>