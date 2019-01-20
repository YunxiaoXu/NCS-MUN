<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>MUN Sign Up</title>
    <meta name="keywords" content="NorthCross, MUN, Model UN, NCMUNC">
    <meta name="discription" content="NorthCross Mun Conference Sign Up">
    <meta name="render" content="webkit">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script>
        var inputs = {cname:"Chinese Name", ename:"English Name", grade:"School Year", email:"E-mail",
            wechat:"WeChat",team:"Team", job:"Job", chief1:"First Question for Chief",
            chief2:"Second Question for Chief", vol1:"Question for Vol"};
        var $ = document.querySelector.bind(document);
        function show(c) {
            $("."+c+".hidden").classList.remove("hidden");
        }
        function hide(c) {
            $("."+c).classList.add("hidden");
        }
        function enableChief() {
            $('#chief').disabled=false;
            $('#chief+label').onclick = "show('vol-question');hide('chief-question');";
        }
        function disableChief() {
            $('#chief').disabled=true;
            $('#vol+label').click();
            $('#chief+label').onclick = "";
        }
        function showError() {
            var errorText = document.querySelector("div.error");
            errorText.innerHTML="";
            document.querySelectorAll("input").forEach(q=>{
                if (!q.checkValidity()) {
                    errorText.innerHTML += "* Error in " + inputs[q.name] + "!<br/>";
                }
            });
            document.querySelectorAll("textarea").forEach(q=>{
                if(q.textLength>1200) {
                    errorText.innerHTML += "* Error in " + inputs[q.name] + "! Too many words!<br/>";
                }
            });
            if (errorText.innerHTML=="") {
                errorText.innerHTML = "Your have completed all required questions."
            }
        }
    </script>
    <style>
        html, body {
            margin: 0px;
            height: 100%;
        }
        .wrapper {
            position: absolute;
            height: 100%;
            width: 100%;
            /*top: 1.4rem;
            bottom: 1.4rem;*/
        }
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 30px;
            background-color: rgba(200,200,200,.5);
            z-index: 1000;
            display: flex;
            display: -webkit-flex;
            justify-content: flex-end;
            align-items: center;
        }
        .login {
            padding-right: 16px;
        }
        .bg {
            position: fixed;
            top: 20px;
            height: 90%;
            width: 100%;
            background-image: url(/assets/pic/ncmunc.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size:contain;
            filter: blur(2px);
            -webkit-filter: blur(2px);
            opacity: 0.6;
            z-index: -1;
        }
        .content {
            position: relative;
            /* top: 22px; */
            /* bottom: 22px; */
            min-height: 100%;
            width: 64%;
            padding: 0 8%;
            margin: 0 10% 0px 10%;
            background-color: rgba(33,29,243,.03);
            /* overflow-x: hidden; */
            overflow-y: auto;
        }
        h1 {
            margin-top: 80px;
        }
        h2 {
            margin-top: 60px;
        }
        ul {
            list-style: none;
            padding-left: 16px;
            margin-bottom: 26px;
        }
        li {
            display: inline;
            line-height: 44px;
        }
        label {
            padding: 5px 10px;
            border: solid 1px #dadce0;
            border-radius: 3pt;
            color: #1a73e8;
            background-image: linear-gradient(to bottom, rgba(200,200,200,0.12), rgba(200,200,200,0.12));
            background-color: white;
            cursor: pointer;
        }
        .nowrap {
            white-space: nowrap;
        }
        input[type=radio]:checked+label {
            background-image: linear-gradient(to bottom, rgba(66, 133,244,.08), rgba(66, 133,244,.32));
        }
        input[type=radio]:disabled+label {
            cursor: not-allowed;
            color: gray;
            background-image: linear-gradient(to bottom, rgba(128, 128,128,.2), rgba(128, 128,128,.2));
        }
        input {
            width: 100%; /* 128px;*/
            border: solid 1px gray;
        }
        button {
            margin-bottom: 30px;
        }
        .hidden {
            display: none;
        }
        textarea {
            resize:none;
            box-sizing: border-box;
            width: 100%;
            border: solid 1px gray;
        }
        .questions span {
            padding: 3px;
        }
        .error {
            color: red;
        }
        .footer {
            position: fixed;
            bottom: 0;
            /* height: 22px; */
            line-height: 40px;
            text-align: center;
            vertical-align: bottom;
            width: 100%;
            background-color: antiquewhite;
        }
        .narrow {
            display: none;
        }
        @media only screen and (max-width:500px) {
            .header {
                height: 22px;
            }
            .footer {
                line-height: 22px;
            }
            .wide {
                display: none;
            }
            .narrow {
                display: initial;
            }
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <span class="login"> 

<?php
if (!isset($_SESSION["userid"])) {
    echo "<a href='/login.php?from=/signUp/'>login</a";
} else {
    echo $_SESSION["username"]." | <a href='/login.php?logout=true'>logout</a>";
}
?>

            </span>
        </div>
        <div class="bg"></div>
        <div class="content">
            <form action="submit.php" method="POST" onkeydown="if(event.keyCode==13)return false;">
                <div class="welcome">
                    <h1>NCS MUN Sign Up</h1>
                    <p>Welcome to NCS MUN!</p>
                    <p>Some Introduction.</p>
                    <br/>
                    <button type="button" onclick="hide('welcome');show('team')">Next</button>
                </div>
                <div class="team hidden">
                    <h2>Team:</h2>
                    <ul class="team-selector">
                        <li>
                            <input type="radio" name="team" value="staff" id="staff" style="display:none;" checked="checked"/>
                            <label for="staff" class="nowrap" onclick="enableChief();">Member of Staff</label>
                        </li>
                        <li>
                            <input type="radio" name="team" value="operation" id="operation" style="display:none;"/>
                            <label for="operation" class="nowrap" onclick="enableChief();">Member of Operation</label>
                        </li>
                        <li>
                            <input type="radio" name="team" value="media" id="media" style="display:none;"/>
                            <label for="media" class="nowrap" onclick="enableChief();">Member of Media</label>
                        </li>
                        <li>
                            <input type="radio" name="team" value="communication" id="communication" style="display:none;"/>
                            <label for="communication" class="nowrap" onclick="enableChief();">Member of Communication</label>
                        </li>
                    </ul>
                    <ul class="team-selector">
                        <li>
                            <input type="radio" name="team" value="general" id="general" style="display:none;"/>
                            <label for="general" class="nowrap" onclick="disableChief();">General Conference Volunteer</label>
                        </li>
                    </ul>
                    <br/>
                    <button type="button" onclick="hide('team');show('welcome')">Back</button>
                    <button type="button" onclick="hide('team');show('job')">Next</button>
                </div>
                <div class="job hidden">
                    <h2>Job:</h2>
                    <ul class="job-selector">
                        <li>
                            <input type="radio" name="job" value="chief" id="chief" style="display:none;" checked="checked"/>
                            <label for="chief" onclick="show('chief-question');hide('vol-question');">chief</label>
                        </li>
                        <li>
                            <input type="radio" name="job" value="vol" id="vol" style="display:none;"/>
                            <label for="vol" onclick="show('vol-question');hide('chief-question');">vol</label>
                        </li>
                    </ul>
                    <br/>
                    <button type="button" onclick="hide('job');show('team')">Back</button>
                    <button type="button" onclick="hide('job');show('questions')">Next</button>
                </div>
                <div class="questions hidden">
                    <h2>Personal Introduction:</h2>
                    <div class="chief-question">
                        <p style="color:red">Up to 150 words for the question.</p>
                        <span>Why are you qualified for this position?</span><br/>
                        <textarea rows="8" cols="64" name="chief1" wrap="hard" maxlength="1200"></textarea><br/>
                        <!-- <span>What characteristic do you have for this position?</span><br/>
                        <textarea rows="8" cols="64" name="chief2" wrap="hard"></textarea>-->
                    </div>
                    <div class="vol-question hidden">
                        <p style="color:red">Up to 150 words for the question.</p>
                        <span>Why are you applying for this position?</span><br/>
                        <textarea rows="8" cols="64" name="vol1" wrap="hard" maxlength="1200"></textarea>
                        <br/> 
                    </div>
                    <br/>
                    <button type="button" onclick="hide('questions');show('job')">Back</button>
                    <button type="button" onclick="hide('questions');show('info')">Next</button>
                </div>
                <div class="info hidden">
                    <h2>Personal Information:</h2>
                    <table style="padding-left: 20px;">
                        <tbody>
                            <tr>
                                <td>Chinese name:</td>
                                <td>
                                    <span class="nowrap">
                                        <input type="text" name="cname" pattern="^[\u4e00-\u9fa5]+$" required="required"/>
                                        <span class="error">*</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>English name:</td>
                                <td>
                                    <span class="nowrap">
                                        <input type="text" name="ename" pattern="^[a-zA-z \._-]+$" required="required">
                                        <span class="error">*</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>School year:</td>
                                <td>
                                    <span class="nowrap">
                                        <input type="text" name="grade" pattern="^[1-9][0-2]?$" required="required">
                                        <span class="error">*</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td>
                                    <span class="nowrap">
                                        <input type="email" name="email" required="required">
                                        <span class="error">*</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>WeChat:</td>
                                <td>
                                    <span class="nowrap">
                                        <input type="text" name="wechat" required="required">
                                        <span class="error">*</span>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <button type="button" onclick="hide('info');show('questions')">Back</button>
                    <button type="button" onclick="hide('info');show('submit');showError();">Next</button>
                </div>
                <div class="submit hidden">
                    <h2>Review:</h2>
                    <div class="error"></div>
                    <br/>
                    <button type="button" onclick="hide('submit');show('info')">Back</button>
                    <hr/>
                    <input type="submit" value="submit" style="padding:5px 16px;margin-top:5px;"/>
                </div>
            </form>
            <br/>
        </div>
        <div class="footer">
            &copy; 2018-<?php echo date("Y")?>&nbsp;
            <span class="narrow">NCMUNC</span><span class="wide">NorthCross MUN Conference</span>&nbsp;
            <a href="mailto:contact@ncmunc.org">contact@ncmunc.org</a>
        </div>
    </div>
</body>
</html>

