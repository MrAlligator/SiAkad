<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="<?= base_url('assets/') ?>img/logosmk.png" type="image/png">
    <title>SMK Darus Salam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/') ?>css/stylelogin.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="main">
        <div class="user">
            <img src="images/user.png" alt="">
        </div>
        <div class="login">
            <div class="inset">
                <form action="cek_log.php" method="POST">
                    <div>
                        <span><label>Username</label></span>
                        <span><input type="text" class="textbox" name="username" placeholder="NIM / NIP"></span>
                    </div>
                    <div>
                        <span><label>Password</label></span>
                        <span><input type="password" id="pass" name="pass" class="password" placeholder="Password"></span>
                        <span><input type="checkbox" id="show-pass" name="show-pass"> Show password<br><br></span>
                    </div>
                    <hr>
                    <div class="sign">
                        <div class="submit">
                            <input type="submit" value="LOGIN">
                        </div>
                        <span class="forget-pass">
                            <a class="genric-btn danger circle" href="<?= base_url() ?>">Kembali</a>
                        </span>
                        <div class="clear"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    (function() {
        var _show = function(element, field) {
            this.element = element;
            this.field = field;
            this.toggle();
        };
        _show.prototype = {
            toggle: function() {
                var self = this;
                self.element.addEventListener("change", function() {
                    if (self.element.checked) {
                        self.field.setAttribute("type", "text");
                    } else {
                        self.field.setAttribute("type", "password");
                    }
                }, false);
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
            var checkbox = document.querySelector("#show-pass"),
                pass = document.querySelector("#pass"),
                _form = document.querySelector("form");
            var toggler = new _show(checkbox, pass);
        });
    })();
</script>