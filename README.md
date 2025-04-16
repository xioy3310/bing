# 介绍

Bing壁纸，是微软Bing搜索引擎推出的一项服务，每天都会推送高质量壁纸。本项目可以简单、快速地获取每日壁纸，每日自动更新。

# 项目

受[https://github.com/mike126126/bing/](https://github.com/mike126126/bing/)项目启发才有了这个项目，原项目中没有UHD在本项目中已补充。

本项目面向生产环境专门优化了代码：
 * 如果在同一天内多次请求图片，优先从缓存中读取，避免重复请求和图片下载，提高了响应速度。
 * 禁用了所有错误显示，防止在生产环境中暴露敏感的错误信息，提高了系统的安全性。
 * 如果找不到图片，则会返回预设好的图片，提供了更好的用户体验。

您可以通过[https://api.tntsec.com/bing/](https://api.tntsec.com/bing/)来访问本项目。
我的博客：[https://blog.tntsec.com/](https://blog.tntsec.com/)

# 文件说明

每种分辨率都写了两种获取方式：服务器显示、302跳转直链显示

服务器显示方式会消耗大量的流量，速度会受服务器限制。建议优先使用302跳转直链显示方式，该方法是通过解析图片地址，直接跳转到Bing图片直链。不会消耗服务器流量，速度也不会受服务器限制，减少运营成本。

如果你不想自己部署，可以直接使用[https://api.tntsec.com/bing/](https://api.tntsec.com/bing/)提供的API服务。

# 使用方法

在需要引用图片的地方插入url即可，不同url参数说明如下：

| 请求方式 | 作用 |
| :----- | :----- |
|[https://api.tntsec.com/bing/UHD.php](https://api.tntsec.com/bing/UHD.php)                    |输出为3840×2160分辨率的图片        |
|[https://api.tntsec.com/bing/1920×1080.php](https://api.tntsec.com/bing/1920x1080.php)        |输出为1920×1080分辨率的图片        |
|[https://api.tntsec.com/bing/1366×768.php](https://api.tntsec.com/bing/1366x768.php)          |输出为1366×768分辨率的图片         |
|[https://api.tntsec.com/bing/m.php](https://api.tntsec.com/bing/m.php)                        |输出为1080×1920分辨率的图片        |
|[https://api.tntsec.com/bing/UHD_302.php](https://api.tntsec.com/bing/UHD_302.php)            |输出为3840×2160分辨率的Bing直链图片|
|[https://api.tntsec.com/bing/1920x1080_302.php](https://api.tntsec.com/bing/1920x1080_302.php)|输出为1920×1080分辨率的Bing直链图片|
|[https://api.tntsec.com/bing/1366x768_302.php](https://api.tntsec.com/bing/1366x768_302.php)  |输出为1366×768分辨率的Bing直链图片 |
|[https://api.tntsec.com/bing/m_302.php](https://api.tntsec.com/bing/m_302.php)                |输出为1080×1920分辨率的Bing直链图片|

# 更新记录

2025.04.16 - 1.0
