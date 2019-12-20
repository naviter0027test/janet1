<?php
require_once(__DIR__. '/sendmail.php');
$mailTo = isset($_POST['mailTo']) ? $_POST['mailTo'] : '';
if($mailTo == '') {
    echo "mailTo: required"; exit;
}
$mailName = isset($_POST['mailName']) ? $_POST['mailName'] : '';
$referer = isset($_POST['referer']) ? $_POST['referer'] : '';

$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $referer);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
 
curl_close($ch);

$isSuccess = phpmail($mailTo,$mailName,'[Test]租屋相關資訊',$output);
if($isSuccess) { ?>
<script>
    alert('send success');
    location.href="<?php echo $referer; ?>";
</script>
<?php } ?>

