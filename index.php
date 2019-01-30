<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>NorthCross Model UN Conference</title>
    <meta name="keywords" content="NorthCross, MUN, Model UN, NCMUNC, Model UN Conference">
    <meta name="discription" content="NorthCross Model UN Conference">
    <meta name="render" content="webkit">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="/assets/js/common.js"></script>
    <script>
        function changeMenuBar() {
            menubar = $(".headerMiddle.wide").classList;
            if (menubar.contains("show")) {
                menubar.remove("show");
            } else {
                menubar.add("show");
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css" />
    <style>
        h2 {
            padding: 48px 0 0 16px;
        }
        .content p {
            margin: 4px 4px 4px 20px;
        }
        .header {
            /* background-color: rgba(255, 255, 255, 0.5); */
            height: 48px;
        }
        .content {
            margin: 30px 0 0 0;
            padding: 0 16px;
            width: 100%;
        }
        .headerLeft {
            font-family: "Times New Roman",Georgia,Serif;
            font-size: larger;
            padding-left: 32px;
            margin-right: -48px;
        }
        .headerMiddle {
            padding-right: 32px;
            font-weight: bold;
            font-size: large;
        }
        .headerRight {
            font-family: Arial, Serif;
            padding-right: 32px;
        }
        .header li {
            margin: 0 10px;
        }
        .headerRight img {
            height: 14px;
            vertical-align: text-top;
        }
        @media only screen and (max-width:700px) {
            .header .narrow {
                display: initial;
            }
            .header .wide {
                display: none;
            }
            .header li {
                margin: 0 6px;
            }
            .header {
                height: 32px;
            }
            .headerLeft,.headerRight {
                padding: 0;
                font-size: smaller;
            }
            .headerMiddle {
                position: fixed;
                top: 32px;
                right: 0px;
                height: 100%;
                background-color: #f8f8f8;
                /* display: block; */
            }
            .headerMiddle li {
                display: list-item;
            }
        }
        </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="headerLeft">
                <p class="wide">NorthCross Model UN Conference</p>
                <p class="narrow">NorthCross MUN Conference</p>
            </div>
            <div class="headerMiddle wide">
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#application">Application</a></li>
                </ul>
            </div>
            <div class="headerRight">
                <ul>
                    <li>Email</li>
                    <li>WeChat</li>
                    <li class="narrow"><a href="javascript:changeMenuBar();"><img src="/assets/pic/menubar.png"/></a></li>
                </ul>
            </div>
        </div>
        <div class="bg"></div>
        <div class="content">
            <img class="wide" src="/assets/pic/ncmunc_long.png" width="100%"/>
            <img class="narrow" src="/assets/pic/ncmunc.png" width="100%"/>
            <h2 id="about">About</h2>
            <p> NorthCross Model UN Conference Introduction </p>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <h2 id="news">News</h2><br/>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <h2 id="application">Application</h2>
            <p> Volunteer Application: <a href="/signUp/">Sign Up</a></p>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
        <div class="footer">
            &copy; 2018-<?php echo date("Y")?>&nbsp;
            <span class="narrow">NCMUNC</span><span class="wide">NorthCross MUN Conference</span>&nbsp;
            <a href="mailto:contact@ncmunc.org">contact@ncmunc.org</a>
        </div>
    </div>
</body>
</html>
