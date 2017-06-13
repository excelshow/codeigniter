#Codeigniter后台
文件目录树
appliction
│  .htaccess
│  index.html│  
├─cache//缓存目录
│      .htaccess
│      index.html
│      
├─config//配置目录
│      autoload.php
│      config.php //配置文件
│      constants.php
│      database.php//数据库配置文件
│      doctypes.php
│      foreign_chars.php
│      hooks.php
│      index.html
│      memcached.php
│      migration.php
│      mimes.php
│      profiler.php
│      routes.php
│      smileys.php
│      user_agents.php
│      
├─controllers//控制器目录
│      Admin.php //管理类
│      Client.php//客户端接受数据类
│      index.html
│      Login.php//默认界面，登录类
│      Manage_goods.php//商品管理类，继承于管理类
│      Post.php//暂作为接受数据接口
│      
├─core//核心文件夹
│      index.html
│      
├─helpers//辅助函数文件夹
│      index.html
│      
├─hooks//钩子函数文件夹
│      index.html
│      
├─language//语言文件夹
│  │  index.html
│  │  
│  └─english
│          index.html
│          
├─libraries//类库文件夹
│      index.html
│      
├─logs//日志文件夹
│      index.html
│      
├─models//模块文件夹
│      index.html
│      Op_admin_model.php//管理员操作模块
│      Op_good_model.php//操作商品模块
│          
├─third_party
│      index.html
│      
└─views//视图文件夹
    │  dash.php//仪表盘视图
    │  footer.php//页脚视图
    │  header.php//页头视图
    │  index.html
    │  login.php//登录视图
    │  sidermenu.php//侧边菜单栏视图
    │  successed.php//登录成功视图
    │  tip.php//提示视图
    │  welcome_message.php//默认的欢迎消息界面，目前用作测试页
    │  
    ├─errors
    │  │  index.html
    │  │  
    │  ├─cli
    │  │      error_404.php
    │  │      error_db.php
    │  │      error_exception.php
    │  │      error_general.php
    │  │      error_php.php
    │  │      index.html
    │  │      
    │  └─html
    │          error_404.php
    │          error_db.php
    │          error_exception.php
    │          error_general.php
    │          error_php.php
    │          index.html
    │          
    └─good_manage//商品管理子菜单文件夹
            goods_class.php//商品分类视图
            goods_list.php//商品列表视图
            goods_new.php//添加新商品视图
            good_save.php
            upload_success.php//上传成功反馈视图
            user_ag.php
