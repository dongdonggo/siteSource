<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>where 查询条件-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
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
<li id="api_list_where" class="on"><a href="doc.where.php">where</a></li>
</ul>

<h4>查询</h4>
<ul class="api_list">
<li id="api_list_select"><a href="doc.select.php">select</a></li>
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
<div id="main_body"><h3>WHERE 语句</h3><p class="intro">SQL中使用where可能会有一些不安全的动态参数传入或者一些复杂的SQL语句,但是Medoo提供非常简介和安全的方法来实现这些．</p><h4>基本使用</h4><p class="intro">在基本使用中. 你可以使用一些符号对参数进行过滤</p><pre class="prettyprint linenums">$database->select("account", "user_name", [	"email" => "foo@bar.com"]);// WHERE email = 'foo@bar.com'$database->select("account", "user_name", [	"user_id" => 200]);// WHERE user_id = 200$database->select("account", "user_name", [	"user_id[>]" => 200]);// WHERE user_id > 200$database->select("account", "user_name", [	"user_id[>=]" => 200]);// WHERE user_id >= 200$database->select("account", "user_name", [	"user_id[!]" => 200]);// WHERE user_id != 200$database->select("account", "user_name", [	"age[<>]" => [200, 500]]);// WHERE age BETWEEN 200 AND 500$database->select("account", "user_name", [	"age[><]" => [200, 500]]);// WHERE age NOT BETWEEN 200 AND 500// [><] and [<>] is also available for datetime$database->select("account", "user_name", [	"birthday[<>]" => [date("Y-m-d", mktime(0, 0, 0, 1, 1, 2015)), date("Y-m-d")]]);// WHERE ("birthday" BETWEEN '2015-01-01' AND '2017-01-01')$database->select("account", "user_name", [	"birthday[><]" => [date("Y-m-d", mktime(0, 0, 0, 1, 1, 2015)), date("Y-m-d")]]);// WHERE ("birthday" NOT BETWEEN '2015-01-01' AND '2017-01-01')// You can use not only single string or number value, but also array$database->select("account", "user_name", [	"OR" => [		"user_id" => [2, 123, 234, 54],		"email" => ["foo@bar.com", "cat@dog.com", "admin@medoo.in"]	]]);// WHERE// user_id IN (2,123,234,54) OR// email IN ('foo@bar.com','cat@dog.com','admin@medoo.in')// [Negative condition]$database->select("account", "user_name", [	"AND" => [		"user_name[!]" => "foo",		"user_id[!]" => 1024,		"email[!]" => ["foo@bar.com", "cat@dog.com", "admin@medoo.in"],		"city[!]" => null,		"promoted[!]" => true	]]);// WHERE// `user_name` != 'foo' AND// `user_id` != 1024 AND// `email` NOT IN ('foo@bar.com','cat@dog.com','admin@medoo.in') AND// `city` IS NOT NULL// `promoted` != 1// Or fetched from select() or get() function$database->select("account", "user_name", [	"user_id" => $database->select("post", "user_id", ["comments[>]" => 40])]);// WHERE user_id IN (2, 51, 321, 3431)</pre><h4>带有相对条件使用</h4><pre class="prettyprint linenums">$database->select("account", "user_name", [	"AND" => [		"user_id[>]" => 200,		"age[<>]" => [18, 25],		"gender" => "female"	]]);// Medoo 默认使用AND连接各个条件$database->select("account", "user_name", [	"user_id[>]" => 200,	"age[<>]" => [18, 25],	"gender" => "female"]);// WHERE user_id > 200 AND age BETWEEN 18 AND 25 AND gender = 'female'$database->select("account", "user_name", [	"OR" => [		"user_id[>]" => 200,		"age[<>]" => [18, 25],		"gender" => "female"	]]);// WHERE user_id > 200 OR age BETWEEN 18 AND 25 OR gender = 'female'</pre><h4>复合条件</h4><pre class="prettyprint linenums">$database->has("account", [	"AND" => [		"OR" => [			"user_name" => "foo",			"email" => "foo@bar.com"		],		"password" => "12345"	]]);// WHERE (user_name = 'foo' OR email = 'foo@bar.com') AND password = '12345'// [IMPORTANT]// Because Medoo is using array data construction to describe relativity condition,// array with duplicated key will be overwritten.//// This will be error:$database->select("account", '*', [	"AND" => [		"OR" => [			"user_name" => "foo",			"email" => "foo@bar.com"		],		"OR" => [			"user_name" => "bar",			"email" => "bar@foo.com"		]	]]);// [X] SELECT * FROM "account" WHERE ("user_name" = 'bar' OR "email" = 'bar@foo.com')// To correct that, just assign a comment for each AND and OR key name. The comment content can be everything.$database->select("account", '*', [	"AND #Actually, this comment feature can be used on every AND and OR relativity condition" => [		"OR #the first condition" => [			"user_name" => "foo",			"email" => "foo@bar.com"		],		"OR #the second condition" => [			"user_name" => "bar",			"email" => "bar@foo.com"		]	]]);// SELECT * FROM "account"// WHERE (// 	(// 		"user_name" = 'foo' OR "email" = 'foo@bar.com'// 	)// 	AND// 	(// 		"user_name" = 'bar' OR "email" = 'bar@foo.com'// 	)// )</pre><h4>列的关系处理</h4><pre class="prettyprint linenums">$database->select("post", [		"[>]account" => ["author_id" => "user_id"],	], [		"post.id",		"post.content"	], [		"AND" => [			// Connect two column with condition sign like [=], [>], [<], [!=] as one of array value			"post.restrict[<]account.age",			"account.user_name" => "foo",			"account.email" => "foo@bar.com",		]	]);// WHERE "post"."restrict" < "account"."age" AND "account"."user_name" = 'foo' AND "account"."email" = 'foo@bar.com'</pre><h4>模糊匹配 like</h4><p class="intro">LIKE 使用语法 [~] .</p><pre class="prettyprint linenums">// 默认情况下，使用%在前后包含关键词$database->select("person", "id", [	"city[~]" => "lon"]);WHERE "city" LIKE '%lon%'// Array support$database->select("person", "id", [	"city[~]" => ["lon", "foo", "bar"]]);WHERE "city" LIKE '%lon%' OR "city" LIKE '%foo%' OR "city" LIKE '%bar%'// Negative condition [!~]$database->select("person", "id", [	"city[!~]" => "lon"]);WHERE "city" NOT LIKE '%lon%'</pre>	<h4>通配符的使用</h4><pre class="prettyprint linenums">// You can use SQL wildcard to match more complex situation$database->select("person", "id", [	"city[~]" => "%stan" // Kazakhstan,  Uzbekistan, Türkmenistan]);$database->select("person", "id", [	"city[~]" => "Londo_" // London, Londox, Londos...]);$database->select("person", "id", [	"name[~]" => "[BCR]at" // Bat, Cat, Rat]);$database->select("person", "id", [	"name[~]" => "[!BCR]at" // Eat, Fat, Hat...]);</pre>	<h4>复合条件</h4><pre class="prettyprint linenums">// 你可以使用通配符查询$database->select("person", "id", [	"content[~]" => ["AND" => ["lon", "on"]]]);// WHERE ("content" LIKE '%lon%' AND "content" LIKE '%on%')$database->select("person", "id", [	"content[~]" => ["OR" => ["lon", "on"]]]);// WHERE ("content" LIKE '%lon%' OR "content" LIKE '%on%')</pre><h4>排序</h4><pre class="prettyprint linenums">$database->select("account", "user_id", [	// Single condition	"ORDER" => "user_id",	// Multiple condition	"ORDER" => [		// Order by column with sorting by customized order.		"user_id" => [43, 12, 57, 98, 144, 1],		// Order by column		"register_date",		// Order by column with descending sorting		"profile_id" => "DESC",		// Order by column with ascending sorting		"date" => "ASC"	]]);</pre><h4>全文检索</h4>    <p class="note">MySQL支持全文检索高级查询</p>	<table class="table">		<tbody>		<tr>			<td>natural</td>			<td>IN NATURAL LANGUAGE MODE</td>		</tr>		<tr>			<td>natural+query</td>			<td>IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION</td>		</tr>		<tr>			<td>boolean</td>			<td>IN BOOLEAN MODE</td>		</tr>		<tr>			<td>query</td>			<td>WITH QUERY EXPANSION</td>		</tr>		</tbody>	</table><pre class="prettyprint linenums">// [MATCH]$database->select("post_table", "post_id", [	"MATCH" => [		"columns" => ["content", "title"],		"keyword" => "foo",		// [optional] Search mode		"mode" => "natural"	]]);// WHERE MATCH (content, title) AGAINST ('foo' IN NATURAL LANGUAGE MODE)</pre><h4>使用正则</h4><pre class="prettyprint linenums">$data = $database->select('account', [	'user_id',	'user_name'], [	'user_name[REGEXP]' => '[a-z0-9]*']);// SELECT "user_id","user_name"// FROM "account"// WHERE "user_name" REGEXP '[a-z0-9]*'</pre><h4>使用SQL函数</h4><p class="intro">处理SQL内置函数的方法在1.2之后做了修改，与以前的不兼容。详情可阅读 <a href="doc.raw.php">Raw object</a>章节</p><pre class="prettyprint linenums">$data = $database->select('account', [	'user_id',	'user_name'], [	'datetime' => Medoo::raw('NOW()')]);// SELECT "user_id","user_name"// FROM "account"// WHERE "datetime" = NOW()</pre><h4>LIMIT 和 OFFSET</h4><pre class="prettyprint linenums">$database->select("account", "user_id", [	// Get the first 100 of rows	'LIMIT' => 100	// Started from the top 20 rows, and get the next 100	'LIMIT' => [20, 100],	// For Oracle and MSSQL database, you also need to use with GROUP by together	'GROUP' => 'location']);</pre>    <h4>GROUP 和 HAVING</h4>    <pre class="prettyprint linenums">$database->select("account", "user_id", [	'GROUP' => 'type',	// GROUP by array of values	'GROUP' => [		'type',		'age',		'gender'	],	// Must have to use it with GROUP together	'HAVING' => [		'user_id[>]' => 500	]]);</pre>        </div>    </div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="../index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
