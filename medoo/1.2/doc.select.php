<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>select 查询-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
    <meta name="keywords" content="Medoo,PHP,MySQL,sqlite,mssql,database framework,轻量级,数据库框架,中文文档,开发手册" />
    <meta name="description" content="高效的轻量级PHP数据库框架, 提高开发效率！中文使用文档手册" />
    <script type="text/javascript" src="../js/qatrix-1.0.2.min.js"></script>
    <script type="text/javascript" src="../js/prettify.js"></script>
    <script type="text/javascript">$ready(function (){ prettyPrint(); });</script>
    <link rel="stylesheet" href="../css/core.css"/>
    <link rel="shortcut icon" href="http://medoo.lvtao.net/1.2/favicon.png" />
</head>
<body>
<header>
    <div id="header_body" class="clearfix">
        <a href="../index.html" title="medoo中文网"><img width="297" height="58" id="head_logo" title="medoo 轻量级的php数据库框架" src="../images/medoo-logo.png" /><h1 class="logo">Medoo</h1></a>
        <h2 class="logo">Medoo是一款超轻量级的PHP SQL数据库框架，由社交网站Catfan和开源项目Qatrix的创始人开发。提供了简单，易学，灵活的API，提升开发Web应用的效率与性能，而且体积只有22KB不到。</h2>
        <nav>
            <ul class="clearfix">
                <li><a href="../index.php" title="medoo中文网首页">首页</a></li>
                <li><a href="../doc.php" title="medoo 开发中文手册,中文文档">中文文档(<1.2)</a></li>
                <li><a href="doc.php" title="medoo最新 开发中文手册,中文文档">中文文档(当前更新至1.5.3)</a></li>
                <li><a href="http://www.lvtao.net">滔哥</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="doc_container" class="clearfix"><div id="api_list_wrap">
<h4>开始</h4 >
<ul class="api_list">
<li id="api_list_new"><a href="doc.php">new medoo()</a></li>
<li id="api_list_new"><a href="doc.collaboration.php">collaboration</a></li>
</ul>
    <h4>Medoo 1.4</h4 >
    <ul class="api_list">
        <li id="api_list_new"><a href="doc.upgrade.php">Upgrade Guide</a></li>
    </ul>
<h4>Where 语句</h4 >
<ul class="api_list">
<li id="api_list_where"><a href="doc.where.php">where</a></li>
</ul>

<h4>查询</h4>
<ul class="api_list">
<li id="api_list_select" class="on"><a href="doc.select.php">select</a></li>
<li id="api_list_insert"><a href="doc.insert.php">insert</a></li>
<li id="api_list_update"><a href="doc.update.php">update</a></li>
<li id="api_list_delete"><a href="doc.delete.php">delete</a></li>
<li id="api_list_replace"><a href="doc.replace.php">replace</a></li>
<li id="api_list_get"><a href="doc.get.php">get</a></li>
<li id="api_list_has"><a href="doc.has.php">has</a></li>
<li id="api_list_count"><a href="doc.count.php">count</a></li>
<li id="api_list_max"><a href="doc.max.php">max</a></li>
<li id="api_list_min"><a href="doc.min.php">min</a></li>
<li id="api_list_avg"><a href="doc.avg.php">avg</a></li>
<li id="api_list_sum"><a href="doc.sum.php">sum</a></li>
</ul>

<h4>Fetch</h4>
<ul class="api_list">
<li id="api_list_action"><a href="doc.id.php">id</a></li>
</ul>

<h4>Transaction</h4>
<ul class="api_list">
<li id="api_list_action"><a href="doc.action.php">action</a></li>
</ul>

<h4>原生SQL查询</h4>
<ul class="api_list">
<li id="api_list_query"><a href="doc.query.php">query</a></li>
<li id="api_list_quote"><a href="doc.quote.php">quote</a></li>
</ul>

<h4>Raw object</h4>
<ul class="api_list">
<li id="api_list_raw"><a href="doc.raw.php">Medoo::raw</a></li>
</ul>

<h4>PDO object</h4>
<ul class="api_list">
<li id="api_list_pdo"><a href="doc.pdo.php">pdo</a></li>
</ul>

<h4>Debug</h4>
<ul class="api_list">
<li id="api_list_debug"><a href="doc.debug.php">debug</a></li>
<li id="api_list_error"><a href="doc.error.php">error</a></li>
<li id="api_list_log"><a href="doc.log.php">log</a></li>
<li id="api_list_last_query"><a href="doc.last.php">last</a></li>
</ul>

<h4>数据库信息</h4>
<ul class="api_list">
<li id="api_list_info"><a href="doc.info.php">info</a></li>
</ul>
</div>
<div id="main_body"><h3>select</h3><p class="desc">数据库查询</p><div class="function_name">select($table, $columns, $where)</div><ul class="para_list">    <li><h5>table [string]</h5><p>表名.</p></li>    <li><h5>columns [string/array]</h5><p>要查询的字段名.</p></li>    <li><h5>where (optional) [array]</h5><p>查询的条件.</p></li></ul><div class="function_name">select($table, $join, $columns, $where)</div><ul class="para_list">    <li><h5>table [string]</h5><p>表名.</p></li>    <li><h5>join [array]</h5><p>多表查询,不使用可以忽略.</p></li>    <li><h5>columns [string/array]</h5><p>要查询的字段名.</p></li>    <li><h5>where (optional) [array]</h5><p>查询的条件.</p></li></ul><div class="function_return">返回: [array]</div><div class="note">你可以使用*来匹配所有字段, 但如果你指名字段名可以很好的提高性能.</div><pre class="prettyprint linenums">$database = new medoo();$datas = $database->select("account", [    "user_name",    "email"], [    "user_id[>]" => 100]);// $datas = array(//  [0] => array(//      "user_name" => "foo",//      "email" => "foo@bar.com"//  ),//  [1] => array(//      "user_name" => "cat",//      "email" => "cat@dog.com"//  )// )foreach($datas as $data){    echo "user_name:" . $data["user_name"] . " - email:" . $data["email"] . "<br/>";}// Select all columns$datas = $database->select("account", "*");// Select a column$datas = $database->select("account", "user_name");// $datas = array(//  [0] => "foo",//  [1] => "cat"// )</pre><h4>表关联</h4><p class="intro">多表查询SQL较为复杂，使用Medoo可以轻松的解决它</p><pre class="prettyprint linenums">// [>] == LEFT JOIN// [<] == RIGH JOIN// [<>] == FULL JOIN// [><] == INNER JOIN$database->select("post", [	// Here is the table relativity argument that tells the relativity between the table you want to join. 	// The row author_id from table post is equal the row user_id from table account	"[>]account" => ["author_id" => "user_id"], 	// The row user_id from table post is equal the row user_id from table album.	// This is a shortcut to declare the relativity if the row name are the same in both table.	"[>]album" => "user_id", 	// [post.user_id is equal photo.user_id and post.avatar_id is equal photo.avatar_id]	// Like above, there are two row or more are the same in both table.	"[>]photo" => ["user_id", "avatar_id"], 	// If you want to join the same table with different value,	// you have to assign the table with alias.	"[>]account (replyer)" => ["replyer_id" => "user_id"], 	// You can refer the previous joined table by adding the table name before the column.	"[>]account" => ["author_id" => "user_id"],	"[>]album" => ["account.user_id" => "user_id"], 	// Multiple condition	"[>]account" => [		"author_id" => "user_id",		"album.user_id" => "user_id"	]], [	"post.post_id",	"post.title",	"account.user_id",	"account.city",	"replyer.user_id",	"replyer.city"], [	"post.user_id" => 100,	"ORDER" => ["post.post_id" => "DESC"],	"LIMIT" => 50]); // SELECT// 	`post`.`post_id`,// 	`post`.`title`,// 	`account`.`city`// FROM `post`// LEFT JOIN `account` ON `post`.`author_id` = `account`.`user_id`// LEFT JOIN `album` USING (`user_id`)// LEFT JOIN `photo` USING (`user_id`, `avatar_id`)// WHERE// 	`post`.`user_id` = 100// ORDER BY `post`.`post_id` DESC// LIMIT 50</pre><h4>数据映射</h4><p class="intro">根据您所需要的数据结构，自定义输出的数据格式</p><pre class="prettyprint linenums">$data = $database->select("post", [	"[>]account" => ["user_id"]], [	"post.post_id",	"post.content", 	"userData" => [		"account.user_id",		"account.email", 		"meta" => [			"account.location",			"account.gender"		]	]], [	"LIMIT" => [0, 2]]); echo json_encode($data); // Outputed data[	{		post_id: "1",		content: "Hello world!",		userData: {			user_id: "1",			email: "foo@example.com",			meta: {				location: "New York",				gender: "male"			}		}	},	{		post_id: "2",		content: "Hey everyone",		userData: {			user_id: "2",			email: "bar@example.com",			meta: {				location: "London",				gender: "female"			}		}	}]</pre>    <h4>数据类型声明</h4>    <p class="intro">设置输出的类型</p>    <pre class="prettyprint linenums">// 可声明的类型: [String | Bool | Int | Number | Object | JSON]// [String] 默认类型.// [Object] is a PHP object data decoded by serialize(), and will be unserialize()// [JSON] is a valid JSON, and will be json_decode()$data = $database->select("post", [	"[>]account" => ["user_id"]], [	"post.post_id",	"profile" => [		"account.age [Int]",		"account.is_locked [Bool]",		"account.userData [JSON]"	]], [	"LIMIT" => [0, 2]]);echo json_encode($data);// Output data[	{		post_id: "1",		profile: {			age: 20,			is_locked: true,			userData: ["foo", "bar", "tim"]		}	},	{		post_id: "2",		profile: {			age: 25,			is_locked: false,			userData: ["mydata1", "mydata2"]		}	}]// Store an object into database, and get it backclass Foo {	var $bar = "cat";	public function __wakeup()	{		$this->bar = "dog";	}}$object_data = new Foo();$database->insert("account", [	"data" => $object_data]);$data = $database->select("account", [	"data [object]"], [	"id" => 10]);echo $data[ 0 ][ "data" ]->bar;// The object's __wakeup function will be called and update the value// So the output will be "dog""dog"</pre><h4>字段别名</h4><p class="intro">你可以使用别名，以防止字段冲突</p><pre class="prettyprint linenums">$data = $database->select("account", [	"user_id",	"nickname(my_nickname)"], [	"LIMIT" => 20]); // $data = array(// 	[0] => array(// 		"user_id" => "1",// 		"my_nickname" => "foo"// 	),// 	[1] => array(// 		"user_id" => "2",// 		"my_nickname" => "bar"// 	)// ) $data = $database->select("post (content)", [	"[>]account (user)" => "user_id",], [	"content.user_id (author_id)",	"user.user_id"], [	"LIMIT" => 20]); // SELECT// 	"content"."user_id" AS author_id,// 	"user"."user_id"// FROM// 	"post" AS "content"// LEFT JOIN "account" AS "user" USING ("user_id")// LIMIT 2 // $data = array(// 	[0] => array(// 		"author_id" => "1",// 		"user_id" => "321"// 	),// 	[1] => array(// 		"author_id" => "2",// 		"user_id" => "322"// 	)// )</pre></div></div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="../index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
