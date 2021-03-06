<?php
session_start();

require "../sql/sql.php";
$select = "select * from news order by id desc";
$query = $conn->query($select);
$news = [];
while ($news[] = $query->fetch_assoc()){
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>NCMUNC News</title>
    <meta name="keywords" content="Northcross, MUN, NCMUNC, NCMUNC News, MUN News, News">
    <meta name="discription" content="NorthCross MUN Coference News">
    <meta name="render" content="webkit">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="/assets/js/common.js"></script>
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
            margin: 0 48px 0 48px;
            padding: 48px 32px;
            background-color: rgba(255,255,255,.6);
        }
        .mainContent {
            /* float: right;
            width: 65%; */
        }
        .mainContent .title {
            text-align: center;
        }
        .mainContent ul {
            padding-left: 0;
        }
        li.news {
            display: list-item;
        }
        li.news a {
            color: initial;
        }
        li.news a:visited {
            color: initial;
        }
        .newstitle {
            height: 90px;
            font-size: 20px;
            overflow: hidden;
            font-family: arial;
        }
        .newsfooter {
            padding: 15px 0;
            margin-bottom: 16px;
            border-bottom: 1px solid #c5c5c5;
        }
        .time {
            float: left;
            font-family: "times new roman";
        }
        .date {
            display: block;
            font-size: 30px;
            line-height: 30px;
            padding-bottom: 10px;
        }
        .year {

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
                margin: 0 24px 0 24px;
                padding: 48px 16px;
            }
            .container img {
                width: 40% !important;
                margin: 0 30%;
                padding: 0 0 5px 0!important;
                float: none !important;
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
                    <h1 class="title">News</h1>
                    <ul>
                        <?php
                        foreach($news as $n){
                            if (!$n) {continue;}
                            echo '
                        <li class="news">
                            <a href="/news/news.php?id='.$n['id'].'">
                                <img src="/assets/pic/ncmunc_rect.png" style="float:left;width:10%;padding:0 10px 90px 0;">
                                <div class="newsinfo">
                                    <div class="newstitle">'.$n['title'].'</div>
                                    <div class="newsfooter clearfix">
                                        <div class="time">
                                            <span class="date">'.substr($n['add_date'],5,5).'</span>
                                            <span class="year">'.substr($n['add_date'],0,4).'</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>';
                        }
                        ?>
                    </ul>
                </div>
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