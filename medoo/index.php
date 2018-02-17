<!DOCTYPE HTML>
<html>
<head>
    <meta name="author" content="memory" />
    <meta charset="utf-8" />
    <title>Medoo - 高效的轻量级PHP数据库框架, 提高开发效率！</title>
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
<div id="container">    <div id="section1">        <img width="256" height="256" id="medoo_logo" src="images/medoo-logo-256.png" />        <h4 id="title_desc">轻量级的PHP数据库框架, 提高开发效率！</h4>        <h5 id="title_version">Version: 1.1.2 [23KB]</h5>        <a href="https://github.com/catfan/Medoo/archive/v1.1.2.tar.gz" target="_blank" class="download_btn">点击下载</a>        <h5 id="title_version">Version: 1.4.5 [32KB]</h5>        <a href="https://github.com/catfan/Medoo/archive/v1.4.5.tar.gz" target="_blank" class="download_btn">点击下载</a>        <div id="social_wrap">            <h5>喜欢 Medoo?</h5>            <div id="social_btn_wrap">                <div id="fb-root"></div>                <div id="facebook_btn" class="fb-like" data-layout="button_count" data-href="http://medoo.in" data-width="250" data-show-faces="true"></div>                <a href="https://twitter.com/share" class="twitter-share-button"></a>                <div class="g-plusone" data-size="medium"></div>                <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=catfan&amp;repo=Medoo&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="94px" height="20px"></iframe>                <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=catfan&amp;repo=Medoo&amp;type=fork&amp;count=true" allowtransparency="true" frameborder="0" scrolling="0" width="94px" height="20px"></iframe>            </div>        </div>    </div>    <div id="section2">        <h3>为什么选择 Medoo</h3>        <ul class="clearfix">        <li><h5>非常的轻量</h5><p>未压缩只有 23KB。</p></li>        <li><h5>简单</h5><p>非常的容易学习，快速上手。</p></li>        <li><h5>强大</h5><p>支持各种常见的SQL查询。</p></li>        <li><h5>兼容</h5><p>支持各种数据：MySQL, MSSQL, SQLite, MariaDB, Oracle, Sybase, PostgreSQL等等</p></li>        <li><h5>安全</h5><p>防止SQL注入</p></li>        <li><h5>免费</h5><p>MIT 协议, 你可以进行任何修改。</p></li>        </ul>    </div>    <div id="section3">        <h3>使用步骤</h3>        <p>依赖安装</p>        <pre class="prettyprint linenums">$ composer require catfan/Medoo</pre>        <p>更新</p>        <pre class="prettyprint linenums">$ composer update</pre>        <p>开始</p><pre class="prettyprint linenums">// 如果你使用php的依赖安装。可以使用以下方法自动载入require 'vendor/autoload.php';// 或者将你下载的medoo文件拷贝到你相应的目录，然后载入即可require_once 'medoo.php';// 初始化配置$database = new medoo([    'database_type' => 'mysql',    'database_name' => 'name',    'server' => 'localhost',    'username' => 'your_username',    'password' => 'your_password',    'charset' => 'utf8']);// 插入数据示例$database->insert('account', [    'user_name' => 'foo',    'email' => 'foo@bar.com',    'age' => 25,    'lang' => ['en', 'fr', 'jp', 'cn']]);</pre>        <div class="tips">* 只有在 PHP 5.4+,  你可以使用<b>[]</b> 作为语法.</div>        </div>    </div><footer>
<div id="footer_body" class="clearfix">
<a id="github_link" href="https://github.com/catfan/Medoo" target="_blank" rel="nofollow">
<div id="github_text">Fork me on Github</div>
</a><p id="footer_text">The Medoo project, All Rights Reserved, 2013. <a href="index.html" target="_blank">MEDOO.IN</a> </p>
</div>
</footer></body>
</html>
