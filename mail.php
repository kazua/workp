<?php
header("Content-Type:text/html;charset=UTF-8");
if (isset($_POST['body'])) {
?>
<html>
<head>
<title>メール送信結果</title>
</head>
<body>
    <?php
    $wsp = '[\x20\x09]';
    $vchar = '[\x21-\x7e]';
    $quoted_pair = "\\\\(?:$vchar|$wsp)";
    $qtext = '[\x21\x23-\x5b\x5d-\x7e]';
    $qcontent = "(?:$qtext|$quoted_pair)";
    $quoted_string = "\"$qcontent*\"";
    $atext = '[a-zA-Z0-9!#$%&\'*+\-\/\=?^_`{|}~]';
    $dot_atom_text = "$atext+(?:[.]$atext+)*";
    $dot_atom = $dot_atom_text;
    $local_part = "(?:$dot_atom|$quoted_string)";
    $domain = $dot_atom;
    $addr_spec = "${local_part}[@]$domain";
    $mail = strip_tags($_POST['mail']);
    $name = strip_tags($_POST['name']);
    $subject = strip_tags($_POST['subject']);
    $body = strip_tags($_POST['body']);
    if (!preg_match("/\A$addr_spec\z/", $mail)) {
    ?>
    <p>メールアドレスに異常がある可能性があります。</p>
    <?php
    } else {
        if (!mb_send_mail("kakeibo@****.***",
                $subject,
                $body,
                "From: " . $name . "<" . $mail . ">")) {
    ?>
    <p>メールの送信に失敗しました。</p>
    <?php
        } else {
    ?>
    <p>メールが送信されました。</p>
    <?php
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="submit" id="return" value="戻る" />
    </form>
</body>
</html>
<?php
} else {
?>
<html>
<head>
<title>メール送信</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        メールアドレス：<br /> <input type="text" name="mail" size="50"
            value="" /><br /> タイトル：<br /> <input type="text"
            name="subject" size="50" value="" /><br /> 送信者名：<br /> <input
            type="text" name="name" size="50" value="" /><br /> 本文：<br />
        <textarea name="body" cols="50" rows="5"></textarea>
        <br /> <br /> <input type="submit" value="送信" />
    </form>
</body>
</html>
<?php
}
?>