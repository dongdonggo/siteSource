<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>pdo-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
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
<div id="doc_container" class="clearfix">
<div id="api_list_wrap">
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
<li id="api_list_raw" class="on"><a href="doc.raw.php">Medoo::raw</a></li>
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
<div id="main_body">

<h3>Raw Object</h3>
<p class="desc">Medoo可以使用原始表达式来进行复杂的或自定义的查询，尤其是在使用SQL内置函数的时候.支持占位符号，以防止注入和优化语法.</p>
<pre>
Medoo::raw($query, $map)
</pre>

<h4>查询列中使用</h4>
<div class="note">可以直接在select()中做为字段查出，这时候key值将做为别名使用</div>
<pre class="prettyprint linenums">
$data = $database->get('account', [
	'user_name',
	'user_id',
	'score' => Medoo::raw('SUM(<age> + <experience>)')
], [
	'user_id' => 100
]);

// SELECT "user_name", "user_id", SUM("age" + "experience") AS "score"
// FROM "WP_account"
// WHERE "user_id" > 100
</pre>

<h4>在Update和Insert使用</h4>
<pre class="prettyprint linenums">
$data = $database->insert('account', [
	'user_name' => 'apple',
	'user_id' => Medoo::raw('UUID()')
]);

$data = $database->update('account', [
	'user_name' => 'apple',
	'user_id' => Medoo::raw('UUID()')
], [
	'age[>]' => 10
]);
</pre>

<h4>Where条件中使用</h4>
<pre class="prettyprint linenums">
$data = $database->select('account', [
	'user_name',
	'user_id',
], [
	'datetime' => Medoo::raw('NOW()'),
	'ORDER' => Medoo::raw('RAND()'),
	'LIMIT' => Medoo::raw('AVG(<age>)')
]);
</pre>

<h4>调用变量或传参数</h4>
<div class="note">使用变量或者传入参数进来，可以防止SQL注入等问题</div>
<pre class="prettyprint linenums">
$today = "2017-05-01";

$database->select('account', [
	'user_id',
	'user_name'
], [
	'datetime' => Medoo::raw('DATE_ADD(:today, INTERVAL 10 DAY)', [
		':today' => $today
	])
]);
</pre>

<h4>直接做为where条件</h4>
<div class="note">可以直接使用原始对象来构建条件语句</div>
<pre class="prettyprint linenums">
$data = $database->select('account', [
		'user_id',
		'email'
	],
	Medoo::raw('WHERE
		LENGTH(<user_name>) > 5
        ORDER BY RAND()
        LIMIT 10
    ')
);
</pre>

</div>
</div>
<footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="../index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
