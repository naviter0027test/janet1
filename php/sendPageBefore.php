<html>
    <head>
        <title>寄送頁面</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <form action="sendPage.php" method="post">
            <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
            要寄到(E-Mail):<input type="text" name='mailTo' /><br />
            您的名稱:<input type="text" name='mailName' /><br />
            <button>send</button>
        </form>
    </body>
</html>
