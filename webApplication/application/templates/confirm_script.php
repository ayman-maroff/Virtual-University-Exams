
<?php 
// echo $_SESSION['alert_text'];
// echo $_SESSION['alert_code'];
// echo $_SESSION['ref'];

echo $_SESSION['alert_code'];
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> 
// swal({
//     text: "<?php echo $_SESSION['alert_text']; ?>",
//     icon: '<?php echo $_SESSION['alert_code']; ?>'
// }).then(function() {
//     window.location = "<?php echo URL ?><?php echo $_SESSION['ref']?>";
// });

swal("Your Exam will start now, continue?", {
  buttons: {
    cancel: "cancel",
    catch: {
      text: "Start Exam Now",
      value: "catch",
    },
    // defeat: true,
  },
})
.then((value) => {
  switch (value) {
 
    // case "defeat":
    //   swal("Pikachu fainted! You gained 500 XP!");
    //   break;
 
    case "catch":
    //   swal("Delete Completed!", "", "success");
      window.location = "<?php echo URL ?><?php echo $_SESSION['delete_path']?>";
      break;
 
    default:
      swal("Start Exam canceled.");
      window.location = "<?php echo URL ?><?php echo $_SESSION['canceled_path']?>";

  }
});
</script>