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
    <script src="/assets/js/common.js"></script>
    <script>
        var inputs = {cname:"Chinese Name", ename:"English Name", grade:"School Year", email:"E-mail",
            wechat:"WeChat",team:"Team", job:"Job", chief1:"First Question for Chief",
            chief2:"Second Question for Chief", vol1:"Question for Vol", school:"School", idnumber:"ID Number"};
        function setDefaultJobs() {
            $('#chief').disabled=false;
            $('#chief+label').onclick = "show('chief-question');hide('vol-question');";
            $('#chief+label').innerText = "chief";
            $('#vol+label').innerText = "vol";
        }
        function addMedia() {
            $('#chief+label').innerText = "Chief of Media";
            $('#vol+label').innerText = "Vol of Media";
        }
        function disableChief() {
            $('#chief').disabled = true;
            $('#vol').checked = true;
            $('#chief+label').onclick = "";
        }
        function setJobs() {
            setDefaultJobs();
            switch(true) {
                case $("#media").checked:
                    addMedia();
                    break;
                case $("#general").checked:
                    disableChief();
                    break;
            }
        }
        function setQuestion() {
            hide('chief-question');
            hide('vol-question');
            switch(true) {
                case $("#chief").checked:
                    show('chief-question');
                    break;
                case $("#vol").checked:
                    show('vol-question');
                    break;
            }
        }
        function showError() {
            var section = document.querySelector(".<?php echo $_GET['role']?>");
            var errorText = section.querySelector("div.error");
            errorText.innerHTML="";
            section.querySelectorAll("input").forEach(q=>{
                if (!q.checkValidity()) {
                    errorText.innerHTML += "* Error in " + inputs[q.name] + "!<br/>";
                }
            });
            section.querySelectorAll("textarea").forEach(q=>{
                if(q.textLength>1200) {
                    errorText.innerHTML += "* Error in " + inputs[q.name] + "! Too many words!<br/>";
                }
            });
            if (errorText.innerHTML=="") {
                errorText.innerHTML = "Your have completed all required questions."
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css" />
    <style>
        .login {
            padding-right: 16px;
        }
        .bg {
            top: 20px;
            height: 90%;
        }
        h1 {
            margin-top: 80px;
        }
        h2 {
            margin-top: 60px;
        }
        ul {
            padding-left: 16px;
            margin-bottom: 26px;
        }
        li {
            line-height: 44px;
        }
        button {
            margin-bottom: 30px;
        }
        textarea {
            resize:none;
            box-sizing: border-box;
            width: 100%;
            border: solid 1px gray;
        }
        select {
            width: 100%;
            border: solid 1px gray;
        }
        .questions span {
            padding: 3px;
        }
    </style>
</head>
<body onload="show('<?php echo $_GET['role'] ?? 'default';?>');">
    <div class="wrapper">
        <div class="header">
            <p style="font-family:'times new roman';padding-left:16px;">NorthCross Model UN Conference</p>
            <!-- <span class="login"> 

<?php
if (!isset($_SESSION["userid"])) {
    echo "<a href='/login.php?from=/signUp/'>login</a>";
} else {
    echo $_SESSION["username"]." | <a href='/login.php?logout=true'>logout</a>";
}
?>

            </span> -->
        </div>
        <div class="bg"></div>
        <div class="content">
            <div class="default hidden">
                <h1 style="text-align:center">NCMUNC_2019 Sign Up</h1>
                <h2>Choose the type you are going to apply:</h2>
                <ul style="list-style:disc">
                    <li style="display:list-item"><a href="?role=volunteer">volunteer</a></li>
                    <li style="display:list-item"><a href="?role=delegate">delegate</a></li>
                </ul>
            </div>
            <div class="volunteer hidden">
                <form action="submit.php" method="POST" onkeydown="if(event.keyCode==13)return false;">
                    <input type="hidden" name="role" value="volunteer"/>
                    <div class="welcome" style="text-align:center">
                        <h1>NCMUNC_2019 Volunteer Sign Up</h1>
                        <p>Welcome to the registration system for NorthCross MUN Conference_2019!</p>
                        <p>Annually Model UN Conference</p>
                        <br/>
                        <button type="button" onclick="hide('welcome');show('team')">Next</button>
                    </div>
                    <div class="team hidden">
                        <h2>Team:</h2>
                        <ul class="team-selector">
                            <li>
                                <input type="radio" name="team" value="staff" id="staff" style="display:none;" checked="checked"/>
                                <label for="staff" class="nowrap">Member of Staff</label>
                            </li>
                            <li>
                                <input type="radio" name="team" value="operation" id="operation" style="display:none;"/>
                                <label for="operation" class="nowrap">Member of Operation</label>
                            </li>
                            <li>
                                <input type="radio" name="team" value="media" id="media" style="display:none;"/>
                                <label for="media" class="nowrap">Member of Media & Tech</label>
                            </li>
                            <li>
                                <input type="radio" name="team" value="communication" id="communication" style="display:none;"/>
                                <label for="communication" class="nowrap">Member of Communication</label>
                            </li>
                        </ul>
                        <ul class="team-selector">
                            <li>
                                <input type="radio" name="team" value="general" id="general" style="display:none;"/>
                                <label for="general" class="nowrap">General Conference Volunteer</label>
                            </li>
                        </ul>
                        <br/>
                        <button type="button" onclick="hide('team');show('welcome')">Back</button>
                        <button type="button" onclick="setJobs();hide('team');show('job')">Next</button>
                    </div>
                    <div class="job hidden">
                        <h2>Job:</h2>
                        <ul class="job-selector">
                            <li>
                                <input type="radio" name="job" value="chief" id="chief" style="display:none;" checked="checked"/>
                                <label for="chief" class="nowrap">chief</label>
                            </li>
                            <li>
                                <input type="radio" name="job" value="vol" id="vol" style="display:none;"/>
                                <label for="vol" class="nowrap">vol</label>
                            </li>
                        </ul>
                        <br/>
                        <button type="button" onclick="hide('job');show('team')">Back</button>
                        <button type="button" onclick="setQuestion();hide('job');show('questions')">Next</button>
                    </div>
                    <div class="questions hidden">
                        <h2>Personal Introduction:</h2>
                        <div class="chief-question">
                            <p style="color:red">Up to 150 words for the question.</p>
                            <span>Why are you qualified for this position?</span><br/>
                            <textarea rows="8" cols="64" name="chief1" wrap="hard" maxlength="1200"></textarea><br/>
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
            </div>
            <div class="delegate hidden">
                <form action="submit.php" method="POST" onkeydown="if(event.keyCode==13)return false;">
                    <input type="hidden" name="role" value="delegate"/>
                    <div class="welcome" style="text-align:center">
                        <h1>NCMUNC_2019 Delegate Sign Up</h1>
                        <p>Welcome to the registration system for NorthCross MUN Conference_2019!</p>
                        <p>Annually Model UN Conference</p>
                        <br/>
                        <button type="button" onclick="hide('welcome');show('info')">Next</button>
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
                                    <td>ID Number:</td>
                                    <td>
                                        <span class="nowrap">
                                            <input type="text" name="idnumber" pattern="^[1-9]\d{17}$" required="required">
                                            <span class="error">*</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>School:</td>
                                    <td>
                                        <span class="nowrap">
                                            <input type="text" name="school" required="required">
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
                                <tr>
                                    <td>Committee Preferrence:</td>
                                    <td>
                                        <span class="nowrap">
                                            <select name="committee" required="required">
                                                <option>CSW</option>
                                                <option>DISEC</option>
                                                <!-- <option>Third</option> -->
                                            </select>
                                            <span class="error">*</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br/>
                        <button type="button" onclick="hide('info');show('welcome')">Back</button>
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
            </div>
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

