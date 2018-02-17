<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>中文文档-中文帮助手册-Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
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
<li id="api_list_new" class="on"><a href="doc.php">new medoo()</a></li>
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
</div><div id="main_body"><h3>开始</h3><p class="intro">使用Medoo是非常简单的事!</p><h4>要求</h4><ul id="requirement_list">    <li>PHP 5.1+, 推荐 PHP 5.4+ ， PDO 支持.</li>    <li>支持 MySQL, MSSQL, SQLite 等数据库.</li>    <li>如果使用 php_pdo_xxx (xxx = 数据库类型) 你需要在 php.ini 中启用相关扩展.</li>    <li>需要懂一些SQL语法.</li></ul><h4>Tips</h4><p class="intro">在 PHP 5.4+ 中你可以使用 <b>[]</b> 作为参数，否则只能使用 array().</p><pre class="prettyprint linenums">// On PHP 5.1var data = array("foo", "bar");// On PHP 5.4+var data = ["foo", "bar"];</pre><h4>php_pdo　扩展列表</h4><ul id="requirement_list">    <li>MySQL, MariaDB -> php_pdo_mysql</li>    <li>MSSQL (Windows) -> php_pdo_sqlsrv</li>    <li>MSSQL (Liunx/UNIX) -> php_pdo_dblib</li>    <li>Oracle -> php_pdo_oci</li>    <li>SQLite -> php_pdo_sqlite</li>    <li>PostgreSQL -> php_pdo_pgsql</li>    <li>Sybase -> php_pdo_dblib</li></ul><h4>PHP PDO安装</h4><p class="intro">medoo需要PHP支持PDO扩展，请在安装相关扩展后继续以下操作</p><pre class="prettyprint linenums">// 打开php.ini找到你想要的相应扩展,去掉前面的;号即可// 将;extension=php_pdo_mysql.dll// 修改成extension=php_pdo_mysql.dll// 保存，重启你的PHP或者服务器//如果PDO安装成功，你可以通过phpinfo()查看到它.</pre><div class="note">如果你通过终端(linux)命令行安装，系统会自动安装配置相应扩展</div><pre class="prettyprint linenums">$ sudo apt-get install php5-mysql</pre><h4>PHP依赖安装</h4><div class="note">如果你通过php自带的依赖扩展安装它，可以使用下面的命令，或者你根据自己的需要修改即可。</div><pre class="prettyprint linenums">$ composer require catfan/Medoo</pre><div class="note">升级方法</div><pre class="prettyprint linenums">$ composer update</pre><h4>安装源文件安装</h4><div class="note">这是最简单的方法，下载medoo源文件，放到你的PHP开发目录里，载入即可</div><pre class="prettyprint linenums">require  'medoo.php';</pre><h4>配置</h4><p class="intro">这儿提供三种数据库的连接演示.</p><pre class="prettyprint linenums">$database = new medoo([    // 必须配置项    'database_type' => 'mysql',    'database_name' => 'name',    'server' => 'localhost',    'username' => 'your_username',    'password' => 'your_password',    'charset' => 'utf8',    // 可选参数    'port' => 3306,    // 可选，定义表的前缀    'prefix' => 'PREFIX_',    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php    'option' => [        PDO::ATTR_CASE => PDO::CASE_NATURAL    ]]);$database->insert("account", [    "user_name" => "foo",    "email" => "foo@bar.com"]);</pre><h4>For MSSQL</h4><div class="note">如果你要使用Medoo连接你的MSSQL数据库，你需要安装相关扩展：Windows安装<b>pdo_sqlsrv</b>、Linux/UNIX安装<b>pdo_dblib</b>. pdo_mssql 扩展已被PHP废弃，不建议使用.</div><h4>For SQLite</h4><pre class="prettyprint linenums">$database = new medoo([    'database_type' => 'sqlite',    'database_file' => 'my/database/path/database.db']);$database->insert("account", [    "user_name" => "foo",    "email" => "foo@bar.com"]);</pre>        </div>    </div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
