<div class="navbar navbar-expand-lg bg-success-subtle  bg-primary px-3">
    <div class=" d-flex align-content-baseline justify-content-center gap-2">
        <i class=" fa-regular fa-user "></i>
        <a class="nav-link" href=""> Welcome
            <?php if(isset($_SESSION["username"])){echo $_SESSION["name"]."<a href='index.php?logout'><button class='ms-3 btn btn-danger' name='logout'>Logout</button></a>";}else{echo"Guest";} ?></a>
    </div>
</div>