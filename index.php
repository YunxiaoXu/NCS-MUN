<?php
session_start();

require "sql/sql.php";
$select = "select * from news order by id desc limit 0,3";
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
    <title>NorthCross Model UN Conference</title>
    <meta name="keywords" content="NorthCross, MUN, Model UN, NCMUNC, Model UN Conference">
    <meta name="discription" content="NorthCross Model UN Conference">
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
        window.onscroll = function() {
            var position = document.documentElement.scrollTop;
            var height = document.documentElement.clientHeight*0.6;
            var up = $(".up")
            if (position > height) {
                up.style.display = "initial";
            } else {
                up.style.display = "none";
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/iconfont.css" />
    <style>
        h1 {
            padding: 48px 0 0 16px;
        }
        .content p {
            margin: 4px 4px 4px 20px;
            font-size: large;
        }
        .header {
            /* background-color: rgba(255, 255, 255, 0.5); */
            height: 48px;
        }
        .content {
            margin: 30px 0 0 0;
            padding: 0;
            width: 100%;
        }
        .footer {
            position: relative;
            background-color: #f4f4f4;
        }
        .mainContent {
            padding: 0 16px;
        }
        .up {
            position: fixed;
            bottom: 12%;
            right: 10px;
            font-size: xx-large;
            color: white;
            padding: 5px 6px;
            background-color: gray;
            border-radius: 3px;
            z-index: 1000;
        }
        .up:hover {
            background-color: #f44444;
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
        .whitebg {
            background-color: rgba(255,255,255,.6);
        }
        .clearfix:before, .clearfix:after {
            display: table;
            content: "";
        }
        .clearfix:after {
            clear: both;
        }
        .news ul {
            margin: 40px 16px 0;
            padding: 0;
        }
        .news li {
            display: list-item;
            width: 30%;
            float: left;
            padding: 0 1.5%;
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
        .news li a.iconfont {
            display: block;
            float: right;
            text-align: center;
            line-height: 60px;
            height: 60px;
            width: 60px;
            font-size: 20px;
            color: white;
            background-color: #b81a2f;
            border-radius: 50%;
            transform: rotate(90deg);
        }
        .morenews {
            background-color:rgba(255,255,255,.5);
            border: solid #b81a2f 1px;
            border-radius: 2px;
            padding: 3px 12px;
            margin: 20px auto -20px;
            text-align: center;
            width: 85px;
        }
        .morenews a {
            color: #b81a2f;
            font-size: large;
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
            .mainContent #news+ul li {
                display: list-item;
                width: 100%;
                margin: 32px auto;
                padding: 5px 4px 0;
                background-color: rgba(255, 255, 255, .5);
                float: none;
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#application">Application</a></li>
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
            <img class="wide" src="/assets/pic/ncmunc_long.png" width="100%"/>
            <img class="narrow" src="/assets/pic/ncmunc.png" width="100%"/>
            <a class="iconfont icon-up up" href="#"></a>
            <div class="mainContent">
                <div class="about whitebg">
                    <h1 id="about">About</h2>
                    <p style="line-height:32px;"> NCMUN Conference 是由North Cross Shanghai MUN Team 筹办的为期三天（9.6-9.8）的模拟联合国会议。其目的在于用真实的会议项目扩大MUN影响力，训练新手，提高学生对于国际事务的关注度，同时增进我校与全国各地高校的友好交流。以共同成长为目标，在活动中锻炼自我。</p>
                    <br/><br/>
                </div>
                <div class="news whitebg">
                    <h1 id="news">News</h2>
                    <ul class="clearfix">
                        <li>
                            <div class="newstitle">
                                <a><?php echo $news[0]["title"]?></a>
                            </div>
                            <div class="newsfooter clearfix">
                                <div class="time">
                                    <span class="date"><?php echo substr($news[0]["add_date"],5,5)?></span>
                                    <span class="year"><?php echo substr($news[0]["add_date"],0,4)?></span>
                                </div>
                                <a href="/news/news.php?id=<?php echo $news[0]["id"]?>" class="iconfont icon-up"></a>
                            </div>
                        </li>
                        <li>
                            <div class="newstitle">
                                <a><?php echo $news[1]["title"]?></a>
                            </div>
                            <div class="newsfooter clearfix">
                                <div class="time">
                                    <span class="date"><?php echo substr($news[1]["add_date"],5,5)?></span>
                                    <span class="year"><?php echo substr($news[1]["add_date"],0,4)?></span>
                                </div>
                                <a href="/news/news.php?id=<?php echo $news[1]["id"]?>" class="iconfont icon-up"></a>
                            </div>
                        </li>
                        <li>
                            <div class="newstitle">
                                <a><?php echo $news[2]["title"]?></a>
                            </div>
                            <div class="newsfooter clearfix">
                                <div class="time">
                                    <span class="date"><?php echo substr($news[2]["add_date"],5,5)?></span>
                                    <span class="year"><?php echo substr($news[2]["add_date"],0,4)?></span>
                                </div>
                                <a href="/news/news.php?id=<?php echo $news[2]["id"]?>" class="iconfont icon-up"></a>
                            </div>
                        </li>
                    </ul>
                    <div class="morenews"><a href="/news/"><span style="padding-right:10px;">More</span> ></a></div>
                    <br/><br/>
                </div>
                <div class="application whitebg">
                    <h1 id="application">Application</h2>
                    <!--<p> Volunteer Application: <a href="javascript:void(0);"><s>Sign Up</s></a></p>-->
                    <p> Volunteer Application: <a href="/signUp/?role=volunteer">Sign Up</a></p>
                    <p> Delegate Application: <a href="/signUp/?role=delegate">Sign Up</a></p>
                    <br/><br/><br/><br/><br/><br/>
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
