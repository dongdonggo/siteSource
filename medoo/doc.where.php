<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>where 查询条件-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
    <meta name="keywords" content="Medoo,PHP,MySQL,sqlite,mssql,database framework,轻量级,数据库框架,中文文档,开发手册" />
    <meta name="description" content="高效的轻量级PHP数据库框架, 提高开发效率！中文使用文档手册" />
    <script type="text/javascript" src="js/qatrix-1.0.2.min.js"></script>
    <script type="text/javascript" src="js/prettify.js"></script>
    <script type="text/javascript">$ready(function (){ prettyPrint(); });</script>
    <link rel="stylesheet" href="css/core.css"/>
    <link rel="shortcut icon" href="favicon.png" />
</head>
<body>
<header>
    <div id="header_body" class="clearfix">
        <a href="index.html" title="medoo中文网"><img width="297" height="58" id="head_logo" title="medoo 轻量级的php数据库框架" src="images/medoo-logo.png" /><h1 class="logo">Medoo</h1></a>
        <h2 class="logo">Medoo是一款超轻量级的PHP SQL数据库框架，由社交网站Catfan和开源项目Qatrix的创始人开发。提供了简单，易学，灵活的API，提升开发Web应用的效率与性能，而且体积只有22KB不到。</h2>
        <nav>
            <ul class="clearfix">
                <li><a href="index.php" title="medoo中文网首页">首页</a></li>
                <li><a href="doc.php" title="medoo 开发中文手册,中文文档">中文文档(<1.2)</a></li>
                <li><a href="1.2/doc.php" title="medoo最新 开发中文手册,中文文档">中文文档(当前更新至1.5.3)</a></li>
                <li><a href="http://www.lvtao.net">滔哥</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="doc_container" class="clearfix"><div id="api_list_wrap">
<h4>开始</h4 >
<ul class="api_list">
<li id="api_list_new"><a href="doc.php">new medoo()</a></li>
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

<h4>Transaction</h4>
<ul class="api_list">
<li id="api_list_action"><a href="doc.action.php">action</a></li>
</ul>

<h4>原生SQL查询</h4>
<ul class="api_list">
<li id="api_list_query"><a href="doc.query.php">query</a></li>
<li id="api_list_quote"><a href="doc.quote.php">quote</a></li>
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
<li id="api_list_last_query"><a href="doc.last_query.php">last_query</a></li>
</ul>

<h4>数据库信息</h4>
<ul class="api_list">
<li id="api_list_info"><a href="doc.info.php">info</a></li>
</ul>
</div><div id="main_body"><h3>WHERE 语句</h3><p class="intro">SQL中使用where可能会有一些不安全的动态参数传入或者一些复杂的SQL语句,但是Medoo提供非常简介和安全的方法来实现这些．</p><h4>基础使用</h4><p class="intro">在基础使用中. 你可以使用一些符号对参数进行过滤</p><pre class="prettyprint linenums">$database->select("account", "user_name", [    "email" => "foo@bar.com"]);// WHERE email = 'foo@bar.com'$database->select("account", "user_name", [    "user_id" => 200]);// WHERE user_id = 200$database->select("account", "user_name", [    "user_id[>]" => 200]);// WHERE user_id > 200$database->select("account", "user_name", [    "user_id[>=]" => 200]);// WHERE user_id >= 200$database->select("account", "user_name", [    "user_id[!]" => 200]);// WHERE user_id != 200$database->select("account", "user_name", [    "age[<>]" => [200, 500]]);// WHERE age BETWEEN 200 AND 500$database->select("account", "user_name", [    "age[><]" => [200, 500]]);// WHERE age NOT BETWEEN 200 AND 500// [><] 和 [<>] 可以用于 datetime$database->select("account", "user_name", [    "birthday[><]" => [date("Y-m-d", mktime(0, 0, 0, 1, 1, 2015)), date("Y-m-d")]]);//WHERE `birthday` BETWEEN '2015-01-01' AND '2017-01-16' (now)// 你不仅可以使用字符串和数字，还可以使用数组$database->select("account", "user_name", [    "OR" => [        "user_id" => [2, 123, 234, 54],        "email" => ["foo@bar.com", "cat@dog.com", "admin@medoo.in"]    ]]);// WHERE// user_id IN (2,123,234,54) OR// email IN ('foo@bar.com','cat@dog.com','admin@medoo.in')// 多条件查询$database->select("account", "user_name", [    "AND" => [        "user_name[!]" => "foo",        "user_id[!]" => 1024,        "email[!]" => ["foo@bar.com", "cat@dog.com", "admin@medoo.in"],        "city[!]" => null,        "promoted[!]" => true    ]]);// WHERE// `user_name` != 'foo' AND// `user_id` != 1024 AND// `email` NOT IN ('foo@bar.com','cat@dog.com','admin@medoo.in') AND// `city` IS NOT NULL// `promoted` != 1// 或者嵌套 select() ak  get() 方法$database->select("account", "user_name", [    "user_id" => $database->select("post", "user_id", ["comments[>]" => 40])]);// WHERE user_id IN (2, 51, 321, 3431)</pre><h4>条件搜索</h4><p class="intro">你可以使用"AND" 或 "OR" 来拼接非常复杂的SQL语句</p><pre class="prettyprint linenums">// 基础使用$database->select("account", "user_name", [    "AND" => [        "user_id[>]" => 200,        "age[<>]" => [18, 25],        "gender" => "female"    ]]);// WHERE user_id > 200 AND age BETWEEN 18 AND 25 AND gender = 'female'$database->select("account", "user_name", [    "OR" => [        "user_id[>]" => 200,        "age[<>]" => [18, 25],        "gender" => "female"    ]]);// WHERE user_id > 200 OR age BETWEEN 18 AND 25 OR gender = 'female'// 复合条件$database->has("account", [    "AND" => [        "OR" => [            "user_name" => "foo",            "email" => "foo@bar.com"        ],        "password" => "12345"    ]]);// WHERE (user_name = 'foo' OR email = 'foo@bar.com') AND password = '12345'// 注意// 因为medoo使用的是数组传参，所以下面这种用法是错误的。$database->select("account", '*', [    "AND" => [        "OR" => [            "user_name" => "foo",            "email" => "foo@bar.com"        ],        "OR" => [            "user_name" => "bar",            "email" => "bar@foo.com"        ]    ]]);// [X] SELECT * FROM "account" WHERE ("user_name" = 'bar' OR "email" = 'bar@foo.com')// 正确的方式是使用如下方式定义复合条件$database->select("account", '*', [    "AND" => [  //实际应用时这儿可以使用AND或者OR        "OR" => [  //第一个条件            "user_name" => "foo",            "email" => "foo@bar.com"        ],        "OR" => [ //第二个条件            "user_name" => "bar",            "email" => "bar@foo.com"        ]    ]]);// SELECT * FROM "account"// WHERE (//  (//      "user_name" = 'foo' OR "email" = 'foo@bar.com'//  )//  AND//  (//      "user_name" = 'bar' OR "email" = 'bar@foo.com'//  )// )</pre><h4>模糊匹配 like</h4><p class="intro">LIKE 使用语法 [~] .</p><pre class="prettyprint linenums">// 默认情况下，使用%在前后包含关键词$database->select("person", "id", [    "city[~]" => "lon"]);WHERE "city" LIKE '%lon%'// 数组形式，查询多个关键词$database->select("person", "id", [    "city[~]" => ["lon", "foo", "bar"]]);WHERE "city" LIKE '%lon%' OR "city" LIKE '%foo%' OR "city" LIKE '%bar%'// 不包含 [!~]$database->select("person", "id", [    "city[!~]" => "lon"]);WHERE "city" NOT LIKE '%lon%'// 使用SQL自带的一些通配符// 你可以使用sql自带的一些通配符来完成较复杂的查询$database->select("person", "id", [    "city[~]" => "stan%" // Kazakhstan,  Uzbekistan, Türkmenistan]);$database->select("person", "id", [    "city[~]" => "Londo_" // London, Londox, Londos...]);$database->select("person", "id", [    "name[~]" => "[BCR]at" // Bat, Cat, Rat]);$database->select("person", "id", [    "name[~]" => "[!BCR]at" // Eat, Fat, Hat...]);</pre><h4>排序使用</h4><pre class="prettyprint linenums">$database->select("account", "user_id", [ 	// Single condition	"ORDER" => "user_id", 	// Multiple condition	"ORDER" => [		// Order by column with sorting by customized order.		"user_id" => [43, 12, 57, 98, 144, 1], 		// Order by column		"register_date", 		// Order by column with descending sorting		"profile_id" => "DESC", 		// Order by column with ascending sorting		"date" => "ASC"	]]);</pre><h4>全文检索</h4><pre class="prettyprint linenums">// [MATCH]$database->select("post_table", "post_id", [    "MATCH" => [        "columns" => ["content", "title"],        "keyword" => "foo"    ]]);// WHERE MATCH (content, title) AGAINST ('foo')</pre><h4>使用SQL函数</h4><p class="intro">在一些特殊的情况下，你可能需要使用SQL系统函数，只需要字段名前加上#号即可</p><pre class="prettyprint linenums">$data = $database->select('account', [    'user_id',    'user_name'], [    '#datetime' => 'NOW()']);// SELECT "user_id","user_name"// FROM "account"// WHERE "datetime" = NOW()// [IMPORTANT] Keep in mind that, the value will not be quoted should be matched as XXX() uppercase.// The following sample will be failed.$database->select('account', [    'user_id',    'user_name'], [    '#datetime2' => 'now()',    'datetime3' => 'NOW()',    '#datetime4' => 'NOW']);</pre><h4>其它参数</h4><pre class="prettyprint linenums">$database->select("account", "user_id", [    "GROUP" => "type",    // Must have to use it with GROUP together    "HAVING" => [        "user_id[>]" => 500    ],    // LIMIT => 20    "LIMIT" => [20, 100]]);//  SELECT user_id FROM account//  GROUP BY type//  HAVING user_id > 500//  LIMIT 20,100</pre>        </div>    </div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
