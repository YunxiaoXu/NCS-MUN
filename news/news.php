<?php
session_start();

require "../sql/sql.php";

if (!isset($_GET["id"])) {
    header("Content-type:text/html;charset=uft-8");
    header("location:/news/");
}
$id = $_GET["id"];
$select = "select * from news where id=$id";
$query = $conn->query($select);
if (!$query) {
    header("status: 404 Not Found");
    exit('<h1>Not Found</h1><a href="javascript:history.go(-1);">back</a>');
}
$news = $query->fetch_assoc();
if (!$news) {
    header("status: 404 Not Found");
    exit('<h1>Not Found</h1><a href="javascript:history.go(-1);">back</a>');
}
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
    <script src="/assets/js/showdown.min.js"></script>
    <script>
        function changeMenuBar() {
            var menubar = $(".headerMiddle").classList;
            var menubtn = $(".headerRight .narrow a.iconfont").classList;
            if (menubar.contains("active")) {
                menubar.remove("active");
                menubtn.remove("icon-close");
                menubtn.add("icon-menu");
            } else {
                menubar.add("active");
                menubtn.remove("icon-menu");
                menubtn.add("icon-close");
            }
        }
        var converter = new showdown.Converter();
    </script>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/iconfont.css" />
    <style>
        .header {
            /* background-color: rgba(255, 255, 255, 0.5); */
            height: 48px;
        }
        .content {
            margin: 48px 0 0 0;
            padding: 0;
            width: 100%;
        }
        .footer {
            position: relative;
            background-color: #f4f4f4;
        }   
        .headerLeft {
            font-family: "Times New Roman",Georgia,Serif;
            font-size: larger;
            padding-left: 32px;
            margin-right: -10%;
        }
        .headerMiddle {
            /* padding-right: 32px; */
            font-weight: bold;
            font-size: large;
        }
        .headerRight {
            padding-right: 32px;
        }
        .header li {
            margin: 0 10px;
        }
        .header .headerMiddle a {
            color: initial;
        }
        .header .headerMiddle a:hover {
            color: #b81a2f;
        }
        .header .headerRight a {
            position: relative;
            color: black;
            font-size: large;   
            display: inline-block;
            transition: all 0.4s;
        }
        .header .headerRight a:hover {
            color: #b81a2f;
            transform: translateY(-2px);
        }
        .header .headerRight a span {
            display: block;
            position: absolute;
            top: 0;
            left: 50%;
            margin-top: 30px;
            transform: translateX(-50%) scaleY(0);
            font-family: Arial, Serif;
            opacity: 0;
        }
        .header .headerRight a:hover span {
            opacity: 1;
            transform: translateX(-50%) scaleY(1);
        }
        .headerRight img {
            height: 14px;
            vertical-align: text-top;
        }
        .wechat {
            opacity
        }
        .headerMiddle a:visited {
            color: initial;
        }
        .container {
            margin: 0 48px;
            padding: 48px 10px;
            background-color: rgba(255,255,255,.6);
        }
        .mainContent {
            /* float: right;
            width: 65%; */
        }
        .mainContent .title {
            text-align: center;
        }
        .info {
            color: #757575;
            margin: 5px 10px;
        }
        .newsContent {
            width: 90%;
            margin: 0 auto;
            font-size: 18px;
            line-height: 24px;
        }
        .newsContent p {
            text-indent: 2em;
        }
        .newsContent ol {
            padding-left: 0;
        }
        .newsContent img {
            width: 90%;
        }
        .clearfix:before, .clearfix:after {
            display: table;
            content: "";
        }
        .clearfix:after {
            clear: both;
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
                right: -160px;
                height: 100%;
                width: 160px;
                background-color: #f8f8f8;
                /* display: block; */
                transition: all 0.4s;
            }
            .headerMiddle.active {
                right: 0px;
            }
            .headerMiddle ul {
                padding-left: 20px;
            }
            .headerMiddle li {
                display: list-item;
                padding-bottom: 10px;
            }
            .header .headerRight a {
                font-size: medium;
            }
            .container {
                margin: 0 24px;
            }
            .newsContent {
                width: 100%;
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
            <div class="headerMiddle">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#news">News</a></li>
                    <li><a href="/#application">Application</a></li>
                </ul>
            </div>
            <div class="headerRight">
                <ul>
                    <li>
                        <a class="iconfont icon-mail-fill" href="javascript:void(0);">
                            <span>contact@ncmunc.org</span>
                        </a>
                    </li>
                    <li>
                        <a class="iconfont icon-wechat-fill" href="javascript:void(0);">
                            <span>N/A</span>
                        </a>
                    </li>
                    <li class="narrow">
                        <a class="iconfont icon-menu" href="javascript:changeMenuBar();">
                            <!--img src="/assets/pic/menubar.png"/-->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg"></div>
        <div class="content">
            <div class="container clearfix">
                <div class="mainContent">
                    <?php
                    echo "
                    <h1 class='title'>{$news[title]}</h1>
                    <div style='text-align:center;'>
                        <span class='info'>Date: {$news[add_date]}</span>
                        <span class='info'>Author: {$news[author]}</span>
                    </div>
                    <hr class='newsContent'/>
                    <br/>
                    <div class='newsContent'>{$news[content]}</p>
                    "
                    ?>
                </div>
                <script>
                    newsContent = document.querySelector("div.newsContent");
                    text = newsContent.innerHTML;
                    html = converter.makeHtml(text);
                    newsContent.innerHTML = html;
                </script>
            </div>
        </div>
        <div class="footer">
            &copy; 2018-<?php echo date("Y")?>&nbsp;
            <span class="narrow">NCMUNC</span><span class="wide">NorthCross MUN Conference</span>&nbsp;
            <a href="mailto:contact@ncmunc.org">contact@ncmunc.org</a>
        </div>
    </div>
</body>
</html>