<?php
   include "header.php";
?>
<section>
        <div class="container">
            <div class="sign-up">
                <h1>Daftar</h1>
                <form action="logsys.php" method="post">
                <input type="text" name="nama" placeholder="Nama">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="daftar">Daftar</button>
                </form>
            </div>
        </div>
    </section>
<?php
   include "footer.php";
?>