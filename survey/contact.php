<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<style>
body {
    margin: 0;
}

nav ul{
        list-style: none;
        display: flex;
        justify-content: center;
    }

    nav ul li{
        margin-right: 20px;
    }

    nav li a {
        border: 1px solid #5e9ad0;
        padding: 8px;
        text-decoration: none;
        border-radius: 5px;
    }

    nav li a:hover {
        background: #2b97ba;
        color: white;
    }

    .topbar{
        background-color:#e8e8e8;
        text-align:center;
    }

    .topbar img{
        width: 100%;
        max-height:350px;
    }

    .declaration{
        border: 1px solid;
        margin: 12px;
        padding: 12px;
    }

    .start{
        text-align:center;
    }

.main {
    background-color: #e8e8e8;
    margin: 12px;
    padding: 5px;
}
.content {
    background-color: white;
    border: 1px solid;
    margin: 12px;
    padding: 12px;
}

.contact_detail{
    display: flex;
    justify-content: space-around;
}

.contact_detail .email, .contact_detail .phone{
    text-align:center;
}
</style>

<body>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </nav>
    <div class="topbar">
        <h2>Contact us!</h2>
    </div>
    <div class="main">
        <div class="content">
            <p>
                If you wish to ask any questions feel free to contact us using details given below.
            </p>
            <br><br>

            <div class="contact_detail">
                <div class="email">
                    <h2>By email</h2>
                    <img src="email.jpeg" alt="mail" style="width:40px"> <br>
                    Email: umairww@hotmail.com
                </div>
                <div class="phone">
                    <h2>By phone</h2>
                    <img src="phone.png" alt="mail" style="width:40px"> <br>
                    number: 07930422301
                </div>
            </div>

        </div>
    </div>
    <br><br>
</body>

</html>