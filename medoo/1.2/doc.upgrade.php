<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>collaboration 与其它框架兼容使用-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
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
        <li id="api_list_new" class="on"><a href="doc.upgrade.php">Upgrade Guide</a></li>
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
<div id="main_body"><h3>升级到1.4</h3><p class="intro">Medoo由1.2之前的版本升级到1.4,会有一些不兼容的问题,这儿列举升级需要注意的一些事项</p><h4>安装版本</h4><p class="intro">Medoo1.2之前的版本支持php5.1,但1.2之后的仅支持php5.4及以上的版本</p>    <p class="intro">Medoo现在使用命名空间和PSR标准。所以必须在初始化之前使用Medoo\Medoo来声明命名空间,同时实例化的时候方法名将 new medoo() 更改为 new Medoo(),注意这个大小写</p>    <p class="intro">旧版本</p><pre class="prettyprint linenums">require 'vendor/autoload.php';$database = new medoo([	'database_type' => 'mysql',	'database_name' => 'name',	'server' => 'localhost',	'username' => 'your_username',	'password' => 'your_password',]);</pre>    <p class="intro">新版本</p>    <pre class="prettyprint linenums">require 'vendor/autoload.php';use Medoo\Medoo;$database = new Medoo([	'database_type' => 'mysql',	'database_name' => 'name',	'server' => 'localhost',	'username' => 'your_username',	'password' => 'your_password',]);</pre>    <h4>Last Insert ID</h4><p class="intro">在1.2之前,调用了insert()方法后将返回新插入的行号.但在1.2之后,你需要调用新增加的API方法 id() 来调用刚插入的id号</p><p class="intro">旧版本</p><pre class="prettyprint linenums">$account_id = $database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25]);</pre>    <p class="intro">新版本</p><pre class="prettyprint linenums">$database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25]);$account_id = $database->id();</pre>    <h4>新的API方法命名</h4>    <p class="intro">在1.2之后,取消了原来的驼峰命名,采用了更简单的命名方法</p>    <p class="intro">旧版本</p>    <pre class="prettyprint linenums">$database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25]);$database->last_query();</pre>    <p class="intro">新版本</p>    <pre class="prettyprint linenums">$database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25]);$database->last();</pre>    <h4>JSON 声明</h4>    <p class="intro">在升级1.4后,以前的json声明方式变成了[type],所以旧版本中insert() 和 update()方法的使用方法上也必须升级</p>    <p class="intro">旧版本</p>    <pre class="prettyprint linenums">$database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25,	"(JSON) lang" => ["en", "fr", "jp", "cn"]]);$database->update("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25,	"(JSON) lang" => ["en", "fr", "jp", "cn"]], [	"user_id" => 50]);</pre>    <p class="intro">新版本</p>    <pre class="prettyprint linenums">$database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25,	"lang [JSON]" => ["en", "fr", "jp", "cn"]]);$database->update("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25,	"lang [JSON]" => ["en", "fr", "jp", "cn"]], [	"user_id" => 50]);</pre>    <h4>Update, Insert 和 Delete 返回值</h4>    <p class="intro">在1.4之后,update(), insert()和delete()方法,将不再返回受影响的行数,所以你要使用其它的方法来调用受影响的行</p>    <p class="intro">旧版本</p>    <pre class="prettyprint linenums">$query = $database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25,	"(JSON) lang" => ["en", "fr", "jp", "cn"]]);echo $query; // The number of affected row</pre>    <p class="intro">新版本</p>    <pre class="prettyprint linenums">$query = $database->insert("account", [	"user_name" => "foo",	"email" => "foo@bar.com",	"age" => 25,	"lang [JSON]" => ["en", "fr", "jp", "cn"]]);echo $query->rowCount(); // The number of affected rowecho $query->errorInfo(); // Fetch extended error information for this query// Read more: http://php.net/manual/en/class.pdostatement.php</pre>        </div>    </div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="../index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
