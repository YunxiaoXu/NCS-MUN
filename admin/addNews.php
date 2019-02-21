<?php
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION['userrole']!=="admin") {
    header("Content-type:text/html;charset=uft-8");
    header("location:/login.php?from=".rawurlencode($_SERVER['REQUEST_URI']));
}

require "../sql/sql.php";
if ($_POST['action']=="new") {
    $insert = "INSERT INTO news (title, keywords, author, add_date, content) VALUE
     ('$_POST[title]', '$_POST[keywords]', '$_POST[author]', '$_POST[date]', '".addslashes($_POST["content"])."')";
    
    $query = $conn->query($insert);
    if ($query === true) {
        $id = $conn->insert_id;
        echo "<h1>Success</h1>";
        echo "<a href='/news/news.php?id=$id'>View</a>";
    }

    foreach ($_FILES["pics"]["error"] as $key => $error) {
        if ($error > 0) {
            echo "Error: " . $_FILES["pics"]["error"][$key] . "<br/>";
        } else {
            $tmp_name = $_FILES["pics"]["tmp_name"][$key];
            $name = $_FILES["pics"]["name"][$key];
            move_uploaded_file($tmp_name, "../assets/pic/upload/$name");
        }
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>News Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/assets/js/showdown.min.js"></script>
    <script>
        var $ = document.querySelector.bind(document);
        var converter = new showdown.Converter();
        function getBasename(path) {
            index = path.lastIndexOf("/");
            if (index<0) {
                index = path.lastIndexOf("\\");
            }
            return path.substr(index+1);
        }
        function find(imgs, basename) {
            for (i=0; i<imgs.length; i++) {
                if (imgs[i].name == basename) return imgs[i];
            }
            return false;
        }
        function view() {
            newsContent = $("textarea");
            viewer = $("div#viewer")
            text = newsContent.value;
            html = converter.makeHtml(text);
            viewer.innerHTML = html;
            imgs = $("input[type='file']").files;
            document.querySelectorAll("img").forEach((img)=>{
                basename = getBasename(img.src);
                if (find(imgs, basename)) {
                    img.src=window.URL.createObjectURL(find(imgs, basename));
                } else {
                    img.src = "/assets/pic/ncmunc_rect.png";
                }
            })
        }
    </script>
    <style>
        .option { float:left; }
        .user { float: right; }
        table { border-collapse: collapse; }
        td { padding: 5px 10px; }
        input, textarea { border-width: 1px; }
        input[type="text"], input[type="date"] { width: 60%; }

        #viewer {
            width: 84%;
            margin: 0 auto;
            font-size: 18px;
            line-height: 24px;
        }
        #viewer p, #viewer li {
            text-indent: 2em;
        }
        #viewer ol, #viewer ul {
            padding-left: 0;
        }
        #viewer li {
            display: block;
            margin: 1em 0;
        }
        #viewer img {
            width: 90%;
            margin-left: -1em;
        }
        @media only screen and (max-width:700px) {
            #viewer {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<?php
echo "<span class='option'>";
// echo "<a href='download.php?db=volunteer";
// echo isset($_GET["filter"])?"&filter=".$_GET["filter"]:"";
// echo "'>Download</a>";
echo "<span>NorthCross Model UN Conference</span>";
echo "</span>";

echo "<span class='user'>";
echo "user:".$_SESSION['username'];
echo " | <a href='/login.php?logout=true'>logout</a>";
echo "</span>";
?>

    <br/>
    <h1> NCMUNC News Editor </h1>
    <form action="addNews.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="new"/>
        <table border="0">
        <tbody>
            <tr>
                <td style="width:100px;">title: </td>
                <td><input type="text" name="title"/></td>
            </tr>
            <tr>
                <td>keywords: </td>
                <td><input type="text" name="keywords" placeholder="用“, ”分隔"/></td>
            </tr>
            <tr>
                <td>author: </td>
                <td><input type="text" name="author"/></td>
            </tr>
            <tr>
                <td>date: </td>
                <td><input type="date" name="date"/></td>
            </tr>
            <tr>
                <td>file: </td>
                <td><input type="file" name="pics[]" multiple="true"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="content" wrap="hard" rows="19" cols="100" placeholder="使用markdown语法
图片地址为 /assets/pic/upload/<filename>
例：
图片为 201902201045.jpg
地址为 /assets/pic/upload/201902201045.jpg
* 图片建议用时间命名，以防重复
                    "></textarea>
                </td>
            </tr>
            <tr>
                <td colspan='2'><button type="button" onclick="view();">View</button> <input type="submit"/></td>
            </tr>
        </tbody>
        </table>
    </form>
    <div id="viewer"></div>

</body>
</html>