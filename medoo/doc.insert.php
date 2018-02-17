<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>insert 插入-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
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
<li id="api_list_where"><a href="doc.where.php">where</a></li>
</ul>

<h4>查询</h4>
<ul class="api_list">
<li id="api_list_select"><a href="doc.select.php">select</a></li>
<li id="api_list_insert" class="on"><a href="doc.insert.php">insert</a></li>
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
</div><div id="main_body"><h3>insert</h3><p class="desc">插入数据到表中</p><div class="function_name">insert($table, $data)</div><ul class="para_list"><li><h5>table [string]</h5><p>表名.</p></li><li><h5>data [array]</h5><p>插入到表里的数据.</p></li></ul><div class="function_return">Return: [number] 返回插入的id</div><pre class="prettyprint linenums">$last_user_id = $database->insert("account", [    "user_name" => "foo",    "email" => "foo@bar.com",    "age" => 25]);</pre><h4>序列化数组</h4><p class="intro">默认情况下，你要将数组插入会被序列化<code>serialize()</code>, 也可以使用 JSON <code>json_encode()</code>.</p><pre class="prettyprint linenums">$last_user_id = $database->insert("account", [    "user_name" => "foo",    "email" => "foo@bar.com",    "age" => 25,    "lang" => ["en", "fr", "jp", "cn"] // => 'a:4:{i:0;s:2:"en";i:1;s:2:"fr";i:2;s:2:"jp";i:3;s:2:"cn";}']);$last_user_id = $database->insert("account", [    "user_name" => "foo",    "email" => "foo@bar.com",    "age" => 25,    "(JSON) lang" => ["en", "fr", "jp", "cn"] // => '["en","fr","jp","cn"]']);</pre><h4>多条数据插入</h4><p class="intro">可以同时插入多条数据.</p><pre class="prettyprint linenums">$last_user_id = $database->insert("account", [    [        "user_name" => "foo",        "email" => "foo@bar.com",        "age" => 25,        "city" => "New York",        "(JSON) lang" => ["en", "fr", "jp", "cn"]    ],    [        "user_name" => "bar",        "email" => "bar@foo.com",        "age" => 14,        "city" => "Hong Kong",        "(JSON) lang" => ["en", "jp", "cn"]    ]]);</pre><h4>使用 SQL 函数</h4><p class="intro">在一些特殊的情况下,您可能需要使用SQL函数来处理数据。在字段前加入#号即可</p><pre class="prettyprint linenums">$last_user_id = $database->insert("account", [    "user_name" => "bar",    "#uid" => "UUID()"]);</pre>	</div></div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
